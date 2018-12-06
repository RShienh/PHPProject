<?php
$_SESSION['Email'] = $_POST['Email'];
$_SESSION['FirstName'] = $_POST['FirstName'];
$_SESSION['LastName'] = $_POST['LastName'];

$firstname = $mysqli->escape_string($_POST['FirstName']);
$lastname = $mysqli->escape_string($_POST['LastName']);
$email = $mysqli->escape_string($_POST['Email']);
$password = $mysqli->escape_string(password_hash($_POST['Password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string(md5(rand(0, 1000)));

$result = $mysqli->query("SELECT * FROM ACCOUNTS WHERE Email='$email'") or die($mysqli->error());

if ($result->num_rows > 0) {
    $_SESSION['message'] = "Email already exists";
    header("location: error.php");
} else {
    $sql = "INSERT INTO accounts (FirstName,LastName,Email,Password,hash)" .
        "VALUES ('$firstname','$lastname','$email','$password','$hash')";
    if ($mysqli->query($sql)) {
        $_SESSION['active'] = 0;
        $_SESSION['logged_in'] = true;
        $_SESSION['message'] = "Confirmation link has been sent to $email, please verify your account by clicking on the link in the message.";

        //sending confirmation link via verify.php

        $to = $email;
        $subject = 'Account Verification SlatedCravings.com';
        $body - 'Hello ' . $firstname . '
        Thank you for signing up!. Click on the this link to activate your account: 
        http://192.168.64.2/PHPProject/main/verify.php?Email=' .
        $email . '&hash' . $hash;
        mail($to, $subject, $body);
        header("location: profile.php");
    } else {
        $_SESSION['message'] = 'Registration Failed';
        header("location: error.php");
    }
}
