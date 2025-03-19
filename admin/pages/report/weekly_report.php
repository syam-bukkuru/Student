<?php
require_once __DIR__ . '/../../../config/dbconn.php';

// Get the selected date (or default to current week)
$selectedDate = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

// Get start and end dates of the selected week
$startOfWeek = date('Y-m-d', strtotime('monday this week', strtotime($selectedDate)));
$endOfWeek = date('Y-m-d', strtotime('sunday this week', strtotime($selectedDate)));

// Fetch student counts per day in the selected week
$sql = "SELECT DATE(date) as visit_date, COUNT(*) as total_students 
        FROM main 
        WHERE date BETWEEN ? AND ?
        GROUP BY DATE(date)
        ORDER BY DATE(date)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $startOfWeek, $endOfWeek);
$stmt->execute();
$result = $stmt->get_result();

// Initialize array with default values for all days
$data = [
    "Monday" => 0,
    "Tuesday" => 0,
    "Wednesday" => 0,
    "Thursday" => 0,
    "Friday" => 0,
    "Saturday" => 0,
    "Sunday" => 0
];

while ($row = $result->fetch_assoc()) {
    $dayName = date('l', strtotime($row['visit_date'])); // Convert date to weekday name
    $data[$dayName] = $row['total_students'];
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script> <!-- Plugin for data labels -->
    <style>
        .chart-container {
            width: 600px;
            height: 400px;
            margin: auto;
        }
    </style>
</head>

<body>

    <h3>Weekly Report (<?= htmlspecialchars($startOfWeek) ?> to <?= htmlspecialchars($endOfWeek) ?>)</h3>

    <div class="chart-container">
        <canvas id="weeklyChart"></canvas>
    </div>

    <script>
        let days = <?= json_encode(array_keys($data)) ?>;
        let studentCounts = <?= json_encode(array_values($data)) ?>;

        let ctx = document.getElementById('weeklyChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: days,
                datasets: [{
                    label: 'Number of Students',
                    data: studentCounts,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF9800', '#9C27B0', '#009688'],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    datalabels: { // Display number of students on bars
                        anchor: 'end',
                        align: 'top',
                        formatter: (value) => value > 0 ? value : '', // Hide labels for 0 values
                        font: {
                            weight: 'bold'
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            },
            plugins: [ChartDataLabels] // Enable data labels plugin
        });
    </script>

</body>

</html>