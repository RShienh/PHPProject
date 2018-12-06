<?php
session_start();
session_unset();
session_destroy();
?>
<html>
<head>
    <title>
        Error
    </title>
</head>
<body>
<canvas id="background"></canvas>
<div class="grid">
    <?php include 'navbar.php' ?>
    <div class="header"></div>
    <div class="sidebar">
        <div class="container shadow fadeInDown animated" style="text-align: center">
            <p><?= 'You have been logged out!' ?></p>
            <a href="index.php" class="bttn shadow fadeInUp animated"
               style="vertical-align: bottom; margin-top: 125%">Home</a>
        </div>
    </div>
    <div class="footer"></div>
</div>
<script src="js/canvas.js"></script>
<script src="js/wow.js"></script>
</body>
</html>