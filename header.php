<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle ?></title>
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- bootstrap CSS optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
<?php
//database commands to get logo
if (!empty($_GET['logoID'])) {
    $logoID = $_GET['logoID'];
}
else {
    $logoID = null;
}
$logo = null;
if (!empty($logoID)) {
    require('db.php');
    $sql = "SELECT * FROM tbl_logos WHERE logoID = :logoID";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':logoID', $logoID, PDO::PARAM_INT);
    $cmd->execute();
    $logoImage = $cmd->fetch();
    $conn = null;
    $logo = $logoImage['logo'];
}
?>
<?php
require_once('navigation.php');
?>
