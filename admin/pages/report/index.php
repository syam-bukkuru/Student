<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Visit Reports</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <h2>Student Visit Report</h2>

    <form id="reportForm">
        <label for="reportType">Select Report Type:</label>
        <select id="reportType">
            <option value="daily">Daily</option>
            <option value="weekly">Weekly</option>
            <option value="monthly">Monthly</option>
            <option value="yearly">Yearly</option>
        </select>

        <div id="dateSelection">
            <label for="dateInput">Select Date:</label>
            <input type="date" id="dateInput">
        </div>

        <div id="yearSelection" style="display: none;">
            <label for="yearInput">Select Year:</label>
            <input type="number" id="yearInput" min="2000" max="2099">
        </div>

        <label for="branch">Select Branch:</label>
        <select id="branch">
            <option value="All">All</option>
            <option value="CSE">CSE</option>
            <option value="ECE">ECE</option>
            <option value="AIML">AIML</option>
            <option value="Civil">Civil</option>
            <option value="Mech">Mech</option>
            <option value="EEE">EEE</option>
        </select>

        <button type="button" id="loadReport">Load Report</button>
    </form>

    <iframe id="reportFrame" style="width: 100%; height: 500px; border: none;"></iframe>

    <script>
        $(document).ready(function () {
            // Set default date to today
            $("#dateInput").val(new Date().toISOString().split('T')[0]);
            $("#yearInput").val(new Date().getFullYear());

            $("#reportType").change(function () {
                let selectedType = $(this).val();

                $("#dateSelection").hide();
                $("#yearSelection").hide();

                if (selectedType === "daily" || selectedType === "weekly") {
                    $("#dateSelection").show();
                } else if (selectedType === "monthly" || selectedType === "yearly") {
                    $("#yearSelection").show();
                }
            });

            $("#loadReport").click(function () {
                let reportType = $("#reportType").val();
                let date = $("#dateInput").val();
                let year = $("#yearInput").val();
                let branch = $("#branch").val();
                let url = "";

                if (reportType === "daily") {
                    if (!date) {
                        alert("Please select a date.");
                        return;
                    }
                    url = "daily_report.php?date=" + date + "&branch=" + branch;
                } else if (reportType === "weekly") {
                    if (!date) {
                        alert("Please select a date.");
                        return;
                    }
                    url = "weekly_report.php?date=" + date + "&branch=" + branch;
                } else if (reportType === "monthly") {
                    if (!year) {
                        alert("Please enter a valid year.");
                        return;
                    }
                    url = "monthly_report.php?year=" + year + "&branch=" + branch;
                } else if (reportType === "yearly") {
                    if (!year) {
                        alert("Please enter a valid year.");
                        return;
                    }
                    url = "yearly_report.php?year=" + year + "&branch=" + branch;
                }

                $("#reportFrame").attr("src", url);
            });
        });
    </script>

</body>

</html>