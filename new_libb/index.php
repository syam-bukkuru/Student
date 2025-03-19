<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Portal</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>

<body>
    <header class="header">
        <img src="college_logo.png" alt="College Logo" class="logo">
        <h1>Seshadri Rao Gudlavalleru Engineering College</h1>
    </header>

    <div class="main-container">
        <img src="statue1.png" alt="Statue" class="statue">

        <div class="slideshow-container">
            <img class="slide" src="images/mine1.png" alt="Slide 1">
            <img class="slide" src="images/mine2.jpeg" alt="Slide 2">
            <img class="slide" src="images/mine3.jpg" alt="Slide 3">
        </div>

        <img src="statue2.png" alt="Statue" class="statue">
    </div>

    <div id="messageBox">Welcome messages display here</div>

    <form id="attendanceForm">
        <input type="text" name="number" id="number" placeholder="Enter your Roll Number" required>
        <button type="submit">Submit</button>
    </form>
</body>

</html>