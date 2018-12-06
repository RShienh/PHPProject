<?php
require 'api/config/db.php';
session_start(); ?>
<html lang="txt/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <title>Slated Cravings</title>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) { //user logging in
        require 'login.php';
    }
}
?>
<body>
<canvas id="background"></canvas>
<?php include "css/css.html"; ?>
<div class="grid">
    <?php include 'navbar.php' ?>
    <div class="header"></div>
    <div class="sidebar">
        <div class="container shadow fadeInDown animated">
            <div class="form shadow">

                <form action="master.php" method="post" autocomplete="off">
                    <table>
                        <tr>
                            <td>
                                Email Address
                            </td>
                            <td>
                                <input type="email" required autocomplete="off" name="Email"/></td>
                        </tr>
                        <tr>
                            <td>
                                Password
                            </td>
                            <td>
                                <input type="password" required autocomplete="off" name="Password" minlength="8"/></td>
                        </tr>

                        <tr>
                            <td colspan="2"><a href="forgot.php">Forgot Password?</a></td>
                        </tr>
                    </table>

                    <a href="" class="bttn shadow fadeInUp animated" name="login">
                        Log In</a>
                </form>

                <a href="signup.php" class="bttn shadow fadeInUp animated">Sign Up</a>
            </div>
        </div>
        <div class="footer"></div>
    </div>
    <script src="js/canvas.js"></script>
    <script src="js/wow.js"></script>
</body>
</html>