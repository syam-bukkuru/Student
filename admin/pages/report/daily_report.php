<?php
require_once __DIR__ . '/../../../config/dbconn.php';

$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

// Use prepared statement to prevent SQL injection
$sql = "SELECT branch, COUNT(*) AS total_students FROM main WHERE date = ? GROUP BY branch";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $date);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Report - Pie Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        .chart-container {
            width: 400px;
            height: 400px;
            margin: auto;
        }
    </style>
</head>

<body>

    <h3>Daily Report for <?= htmlspecialchars($date) ?></h3>

    <div class="chart-container">
        <canvas id="dailyPieChart"></canvas>
    </div>

    <script>
        let branches = <?= json_encode(array_column($data, 'branch')) ?>;
        let studentCounts = <?= json_encode(array_column($data, 'total_students')) ?>;

        let ctx = document.getElementById('dailyPieChart').getContext('2d');
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: branches,
                datasets: [{
                    label: 'Number of Students',
                    data: studentCounts,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4CAF50', '#FF9800', '#9C27B0', '#009688']
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        enabled: true,
                        callbacks: {
                            label: function (tooltipItem) {
                                let dataset = tooltipItem.dataset;
                                let index = tooltipItem.dataIndex;
                                let branch = dataset.labels[index];
                                let count = dataset.data[index];
                                return `${branch}: ${count} Students`;
                            }
                        }
                    },
                    datalabels: {
                        color: "#fff",
                        font: {
                            weight: "bold",
                            size: 14
                        },
                        formatter: (value) => value, // Show count values inside the chart
                        anchor: "center"
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>

</body>

</html>