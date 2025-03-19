<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Library Attendance System</title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            document.getElementById("attendanceForm").addEventListener("submit", function (event) {
                event.preventDefault(); // Prevent default form submission

                let formData = new FormData(this);

                fetch("process.php", {
                    method: "POST",
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        let messageBox = document.getElementById("messageBox");
                        messageBox.innerHTML = data.message;
                        messageBox.style.color = (data.status === "success") ? "green" : "red";
                    })
                    .catch(error => console.error("Error:", error));
            });
        });
    </script>
</head>

<body>
    <h2>Scan ID Card:</h2>
    <form id="attendanceForm">
        <input type="text" name="rollnum_or_number" id="rollnum_or_number" required autofocus
            placeholder="Scan barcode or type manually">
        <button type="submit">Submit</button>
    </form>
    <p id="messageBox"></p> <!-- Message display area -->
</body>

</html>