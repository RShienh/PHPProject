<?php session_start(); ?>
<html lang="txt/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <title>Success!</title>
</head>
<body>
<canvas id="background"></canvas>
<div class="grid">
    <?php include 'navbar.php' ?>
    <div class="header"></div>
    <div class="sidebar">
        <div class="container shadow fadeInDown animated" style="text-align: center">
            <h1><?= 'Success'; ?></h1>
            <p>
                <?php
                if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
                    echo $_SESSION['message'];
                else:
                    header("location: index.php");
                endif;
                ?>
            </p>
            <br>
            <a href="" class="bttn shadow fadeInUp animated"
               style="vertical-align: bottom; margin-top: 125%">Home</a>
        </div>
    </div>
    <div class="footer"></div>
</div>
<script src="js/canvas.js"></script>
<script src="js/wow.js"></script>
</body>
</html>