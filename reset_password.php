<?php

require 'api/config/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['newPassword'] == $_POST['confirmPassword']) {
        $newPassword = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);

        $email = $mysqli->escape_string($_POST['Email']);
        $hash = $mysqli->escape_string($_POST['hash']);

        $sql = "UPDATE accounts SET Password='$newPassword', hash='$hash' WHERE Email='$email'";

        if ($mysqli->query($sql)) {
            $_SESSION['message'] = "Your Password has been reset!";
            header("location: success.php");
        }
    } else {
        $_SESSION['message'] = "New Password and confirm Password did not match. Try again!";
        header("location: error.php");
    }
}