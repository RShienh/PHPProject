<?php

require 'api/config/db.php';
session_start();

if (isset($_GET['Email']) && !empty($_GET['Email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
    $email = $mysqli->escape_string($_GET['Email']);
    $hash = $mysqli->escape_string($_GET['hash']);

    $result = $mysqli->query("SELECT * FROM accounts WHERE Email='$email' AND hash='$hash' AND active='0'");

    if ($result->num_rows == 0) {
        $_SESSION['message'] = "Account is already active";
        header("location: error.php");
    } else {
        $_SESSION['message'] = "Your account has been activated";
        $mysqli->query("UPDATE accounts SET active='1' WHERE Email='$email'") or die($mysqli->error);
        $_SESSION['active'] = 1;
        header("location: success.php");
    }
} else {
    $_SESSION['message'] = "Invalid parameters!";
    header("location:error.php");
}
