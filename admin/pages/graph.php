<!DOCTYPE html>
<html lang="en">

<head>
    <title>Visit Statistics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .form-container {
            display: flex;
            gap: 15px;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        select,
        input,
        button {
            padding: 8px;
            font-size: 14px;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>

    <h2>View Visit Data</h2>
    <form method="POST" action="" class="form-container">
        <label>User Type:</label>
        <select name="user_type">
            <option value="Student">Student</option>
            <option value="Faculty">Faculty</option>
        </select>

        <label>Time Range:</label>
        <select name="time_range" id="time_range" onchange="toggleInputs()">
            <option value="date" selected>Date</option>
            <option value="weekly">Weekly</option>
            <option value="monthly">Monthly</option>
            <option value="yearly">Yearly</option>
        </select>

        <input type="date" id="date_input" name="date">
        <input type="number" id="year_input" name="year" class="hidden" min="2000" max="2100" placeholder="Enter Year">

        <label>Department:</label>
        <select name="department">
            <option value="All">All</option>
            <option value="CSE">CSE</option>
            <option value="ECE">ECE</option>
            <option value="AIML">AIML</option>
            <option value="Civil">Civil</option>
            <option value="Mech">Mech</option>
            <option value="EEE">EEE</option>
        </select>

        <button type="submit" name="submit">Show Data</button>
    </form>

    <canvas id="visitsChart"></canvas>

    <script>
        function toggleInputs() {
            let timeRange = document.getElementById("time_range").value;
            let dateInput = document.getElementById("date_input");
            let yearInput = document.getElementById("year_input");

            // Reset both fields
            dateInput.classList.add("hidden");
            yearInput.classList.add("hidden");

            if (timeRange === "date" || timeRange === "weekly") {
                dateInput.classList.remove("hidden");
            } else if (timeRange === "monthly") {
                yearInput.classList.remove("hidden");
            }
        }

        // Ensure correct visibility when the page loads
        window.onload = function () {
            toggleInputs();
        };
    </script>

    <?php
    if (isset($_POST['submit'])) {
        $user_type = $_POST['user_type'];
        $time_range = $_POST['time_range'];
        $department = $_POST['department'];
        $selected_date = $_POST['date'] ?? null;
        $selected_year = $_POST['year'] ?? null;

        $conn = new mysqli("localhost", "root", "", "your_database");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Dynamic query based on filters
        $query = "SELECT ";
        if ($time_range == "date") {
            $query .= "visit_date as label, COUNT(*) as count ";
            $query .= "FROM visits WHERE user_type = '$user_type' AND visit_date = '$selected_date' ";
        } elseif ($time_range == "weekly") {
            $query .= "DATE(visit_date) as label, COUNT(*) as count ";
            $query .= "FROM visits WHERE user_type = '$user_type' ";
            $query .= "AND visit_date BETWEEN DATE_SUB('$selected_date', INTERVAL 6 DAY) AND '$selected_date' ";
        } elseif ($time_range == "monthly") {
            $query .= "MONTHNAME(visit_date) as label, COUNT(*) as count ";
            $query .= "FROM visits WHERE user_type = '$user_type' AND YEAR(visit_date) = '$selected_year' ";
        } else {
            $query .= "YEAR(visit_date) as label, COUNT(*) as count ";
            $query .= "FROM visits WHERE user_type = '$user_type' ";
        }

        if ($department != "All") {
            $query .= "AND department = '$department' ";
        }
        $query .= "GROUP BY label";

        $result = $conn->query($query);
        $labels = [];
        $values = [];
        while ($row = $result->fetch_assoc()) {
            $labels[] = $row['label'];
            $values[] = $row['count'];
        }
        $conn->close();
        ?>
        <script>
            var ctx = document.getElementById('visitsChart').getContext('2d');
            var visitsChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: "<?php echo $user_type; ?> Visits",
                        data: <?php echo json_encode($values); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        </script>
    <?php } ?>

</body>

</html>