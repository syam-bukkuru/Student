<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Faculty</title>
</head>

<body>
    <h2>Insert Faculty Manually</h2>
    <form action="../controller/faculty_insertion.php" method="POST">
        <label>Faculty Number:</label>
        <input type="text" name="number" required>
        <label>Name:</label>
        <input type="text" name="name" required>
        <label>Branch:</label>
        <input type="text" name="branch" required>
        <button type="submit" name="submit_manual">Insert Faculty</button>
    </form>

    <h2>Upload Faculty Data (CSV)</h2>
    <form action="../controller/faculty_insertion.php" method="POST" enctype="multipart/form-data">
        <label>Select CSV File:</label>
        <input type="file" name="csv_file" required>
        <button type="submit" name="submit_csv">Upload CSV</button>
    </form>

    <?php
    if (isset($_GET['message'])) {
        echo "<p>" . htmlspecialchars($_GET['message']) . "</p>";
    }
    ?>
</body>

</html>