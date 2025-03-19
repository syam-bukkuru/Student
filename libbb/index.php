<?php
// Start PHP session if needed
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Portal</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
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
    <div class="header">
        <img src="college_logo.png" alt="College Logo">
        <h1>Seshadri Rao Gudlavalleru Engineering College</h1>
    </div>

    <div class="slideshow-container">
        <img class="slide" src="images/mine1.png" alt="Slide 1">
        <img class="slide" src="images/mine2.jpeg" alt="Slide 2">
        <img class="slide" src="images/mine3.jpg" alt="Slide 3">
    </div>
    <div id="messageBox"></div>
    <form id="attendanceForm" action="process.php" method="POST">
        <input type="text" name="number" id="number" placeholder="Enter your Roll Number" required>
        <button type="submit">Submit</button>
    </form>



</body>

</html>