<?php
session_start();

// Check if user is logged in using the session variable
if ($_SESSION['logged_in'] != 1) {
    $_SESSION['message'] = "You must log in before viewing your profile page!";
    header("location: error.php");
} else {
    // Makes it easier to read
    $first_name = $_SESSION['FirstName'];
    $last_name = $_SESSION['LastName'];
    $email = $_SESSION['Email'];
    $active = $_SESSION['active'];
} ?>

<html lang="txt/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <title>Welcome <?= $first_name . ' ' . $last_name ?></title>
</head>
<body>
<canvas id="background"></canvas>
<div class="grid">
    <div class="title shadow fadeInRight animated">
        <div class="logo"><a href="index.php" class="bttn">Home</a></div>
        <div class="nav"></div>
        <div class="lang"><a href="index_fr.php" class="bttn">En/Fr</a></div>
        <div class="about"><a href="about.php" class="bttn">About</a></div>
        <div class="contact"><a href="contact.php" class="bttn">Contact</a></div>
        <div class="sign"><a href="logout.php" class="bttn">logout</a></div>
    </div>
    <div class="header"></div>
    <div class="sidebar">
        <div class="container shadow fadeInDown animated">
            <h2><?php echo $first_name; ?></h2>

        </div>
    </div>
    <div class="footer"></div>
</div>
<script src="js/canvas.js"></script>
<script src="js/wow.js"></script>
</body>
</html>