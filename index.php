<?php
require 'api/config/db.php';
session_start();
?>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <title>Slated Cravings</title>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        require 'login.php';
    } elseif (isset($_POST['register'])) {
        require 'register.php';
    }
}
?>
<body>
<canvas id="background"></canvas>
<div class="grid">
    <?php include 'navbar.php' ?>
    <div class="header"></div>
    <div class="sidebar">
        <div class="container shadow fadeInDown animated">
            <div class="fleft"><a href="SignIn.php" class="bttn shadow fadeInUp animated"
                                  style="vertical-align: bottom; margin-top: 125%">
                    Let's get started !</a></div>
            <div class="fright"><a href="SignIn.php">
                    <div class="fright_container shadow fadeInUp animated"></div>
                </a></div>
        </div>
    </div>
    <div class="footer"></div>
</div>
<script src="js/canvas.js"></script>
<script src="js/wow.js"></script>
</body>
</html>
