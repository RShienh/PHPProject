<?php
require 'api/config/db.php';

session_start();

if (isset($_GET['Email']) && !empty($_GET['Email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
    $email = $mysqli->escape_string($_GET['Email']);
    $hash = $mysqli->escape_string($_GET['hash']);

    $result = $mysqli->query("SELECT * FROM accounts WHERE Email='$email' AND hash='$hash'");

    if ($result->num_rows == 0) {
        $_SESSION['message'] = "Invalid Password Reset link";
        header("location: error.php");
    }
} else {
    $_SESSION['message'] = "Verification Failed, Try again";
    header("location: error.php");
} ?>
<html>
<head>
    <title>
        Reset your Password
    </title>
</head>
<body>
<canvas id="background"></canvas>
<div class="grid">
    <?php include 'navbar.php' ?>
    <div class="header"></div>
    <div class="sidebar">
        <div class="container shadow fadeInDown animated" style="text-align: center">
            <div class="form">
                <h1>Choose a new password</h1>
                <form action="reset.php" method="post">
                    <div class="field-wrap">
                        <label>New Password </label>
                        <input type="password" required name="newPassword" autocomplete="off" minlength="8"/>
                    </div>
                    <div class="field-wrap">
                        <label>Confirm Password </label>
                        <input type="password" required name="confirmPassword" autocomplete="off" minlength="8"/>
                    </div>
                    <input type="hidden" name="Email" value="<?= $email ?>">
                    <input type="hidden" name="hash" value="<?= $hash ?>">
                </form>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</div>
<script src="js/canvas.js"></script>
<script src="js/wow.js"></script>
</body>
</html>
