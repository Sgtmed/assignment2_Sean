<?php
//database commands
require_once ('db.php');
$sql = "DELETE FROM tbl_pages WHERE pageID = :pageID";
$cmd = $conn->prepare($sql);
$cmd->bindParam(':pageID', $_GET['pageID'], PDO::PARAM_INT);
$cmd->execute();
$conn=null;
header('location:pages.php');
?>
