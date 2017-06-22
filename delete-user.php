<?php
//database commands
require_once ('db.php');
$sql = "DELETE FROM tbl_users WHERE email = :email";
$cmd = $conn->prepare($sql);
$cmd->bindParam(':email', $_GET['email'], PDO::PARAM_STR, 120);
$cmd->execute();
$conn=null;
header('location:users.php');
?>