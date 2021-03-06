<?php
/* Registration process, inserts user info into the database
and sends account confirmation email message
*/
require 'api/config/db.php';

// Set session variables to be used on profile.php page
$_SESSION['Email'] = $_POST['Email'];
$_SESSION['FirstName'] = $_POST['FirstName'];
$_SESSION['LastName'] = $_POST['LastName'];

// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['FirstName']);
$last_name = $mysqli->escape_string($_POST['LastName']);
$email = $mysqli->escape_string($_POST['Email']);
$password = $mysqli->escape_string(password_hash($_POST['Password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string(md5(rand(0, 1000)));

// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM accounts WHERE Email='$email'") or die($mysqli->error);

// We know user email exists if the rows returned are more than 0
if ($result->num_rows > 0) {
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: error.php");
} else { // Email doesn't already exist in a database, proceed...
// active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO accounts (FirstName, LastName, Email, Password, hash) "
        . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

// Add user to the database
    if ($mysqli->query($sql)) {
        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =

            "Confirmation link has been sent to $email, please verify
your account by clicking on the link in the message!";

// Send registration confirmation link (verify.php)
        $to = $email;
        $subject = 'Account Verification (slatedcravings.com )';
        $message_body = '
Hello ' . $first_name . ',
Thank you for signing up!
Please click this link to activate your account:
http://localhost/login-system/verify.php?Email=' . $email . '&hash=' . $hash;
        mail($to, $subject, $message_body);
        header("location: profile.php");
    } else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}