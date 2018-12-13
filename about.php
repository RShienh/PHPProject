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
<body>
<canvas id="background"></canvas>
<div class="grid">
    <?php include 'navbar.php' ?>
    <div class="header"></div>
    <div class="sidebar">
        <div class="container shadow fadeInDown animated">
        </div>
        <div class="footer"></div>
    </div>
    <script src="js/canvas.js"></script>
    <script src="js/wow.js"></script>
</body>
</html>
