<?php
//database commands
require_once ('db.php');
$sql = "DELETE FROM tbl_users WHERE email = :email";
$cmd = $conn->prepare($sql);
$cmd->bindParam(':email', $_GET['email'], PDO::PARAM_INT);
$cmd->execute();
$conn=null;
header('location:users.php');
?>