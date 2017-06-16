<?php
$email = $_POST['email'];
require_once ('db.php');
$password=$email;
$password = password_hash($password, PASSWORD_DEFAULT);
$sql = "UPDATE tbl_users SET password = :password WHERE email=:email";
$cmd = $conn->prepare($sql);
$cmd->bindParam(':email', $email, PDO::PARAM_STR, 120);
$cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
$cmd->execute();
$to = $email;
$subject = 'Password Reset';
$message = 'Your password has been reset to '.$email.'.  Login into the system'.
    ' and reset your password';
mail($to, $subject, $message, 'from: gc200362901@student.georgianc.on.ca');
header('location:login.php?pwReset=true');
?>