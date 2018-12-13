<?php
include 'api/config/db.php';
$email = $mysqli->escape_string($_POST['Email']);
$result = $mysqli->query("SELECT * FROM accounts WHERE Email='$email'");

if ($result->num_rows == 0) {
    $_SESSION['message'] = "User does not exists";
    header("location: error.php");
} else {
    $user = $result->fetch_assoc();
    if (password_verify($_POST['Password'], $user['Password'])) {
        $_SESSION['Email'] = $user['Email'];
        $_SESSION['FirstName'] = $user['FirstName'];
        $_SESSION['LastName'] = $user['LastName'];
        $_SESSION['active'] = $user['active'];

        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    } else {
        $_SESSION['message'] = 'Invalid credentials';
        header("location: error.php");
    }
}