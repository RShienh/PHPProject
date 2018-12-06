<?php
require 'api/config/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $mysqli->escape_string($_POST['Email']);
    $result = $mysqli->query("SELECT * FROM accounts WHERE Email='$email'");

    if ($result->num_rows == 0) {
        $_SESSION['message'] = "Email does not exists";
        header("location: error.php");
    } else {
        $user = $result->fetch_assoc();
        $email = $user['Email'];
        $hash = $user['hash'];
        $FirstName = $user['FirstName'];

        $_SESSION['message'] = "<p>Please check your $email for a password reset link.</p>";

        $to = $email;
        $subject = 'Password Reset Link from slatedcravings.com';
        $body = 'Hello ' . $FirstName . '<br>
        You have requested for password reset. Click on the this link to reset your password: 
        http://192.168.64.2/PHPProject/main/reset.php?Email=' .
            $email . '&hash=' . $hash;
        mail($to, $subject, $body);
        header("location: success.php");
    }
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
                <h1>Reset your password</h1>
                <form action="forgot.php" method="post">
                    <div class="field-wrap">
                        <label>Email Address: </label>
                        <input type="email" required name="Email" autocomplete="off"/>
                    </div>
                    <a href="" class="bttn shadow fadeInUp animated"
                       style="vertical-align: bottom; margin-top: 125%">Reset</a>
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