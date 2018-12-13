<?php
require 'api/config/db.php';
session_start(); ?>
<html lang="txt/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <title>Sign Up</title>
</head>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) { //user registering
        require 'register.php';
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
                <form action="SignUp.php" method="post" autocomplete="off">
                    <table>
                        <tr>
                            <td>First Name</td>
                            <td>
                                <input type="text" required autocomplete="off" name='FirstName'/></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>
                                <input type="text" required autocomplete="off" name='LastName'/></td>
                        </tr>
                        <tr>
                            <td>Email Address</td>
                            <td>
                                <input type="email" required autocomplete="off" name='Email'/></td>
                        </tr>
                        <tr>
                            <td>Set A Password</td>
                            <td>
                                <input type="password" required autocomplete="off" name='Password'/></td>
                        </tr>
                    </table>
                    <button class="bttn shadow fadeInUp animated" name="register">
                        Register
                    </button>

                </form>
            </div>
            <div class="footer"></div>
        </div>
        <script src="js/canvas.js"></script>
        <script src="js/wow.js"></script>
</body>
</html>