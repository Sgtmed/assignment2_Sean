<?php
$email = $_POST['email'];
$password = $_POST['password'];
//db commands with form validation
require_once ('db.php');
$sql = "SELECT * FROM tbl_users WHERE email = :email";
$cmd = $conn->prepare($sql);
$cmd->bindParam(':email',$email,PDO::PARAM_STR, 120);
$cmd->execute();
$user = $cmd->fetch();

if (password_verify($password, $user['password'])){
    //validation passed
    session_start();
    $_SESSION['fname']  = $user['fname'];
    $_SESSION['lname']  = $user['lname'];
    $_SESSION['email']  = $user['email'];
    $_SESSION['username'] = $user['username'];
    header('location:index.php');
}
else{
    //validation failed
    header('location:login.php?invalid=true');
    exit();
}
$conn=null;
?>
