<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle ?></title>
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- bootstrap CSS optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <!--stylesheet-->
    <link rel="stylesheet" href="css/styles.css"
</head>
<body>

<?php
    //database commands to get logo
    require('db.php');
    $sql = "SELECT logo FROM tbl_logos WHERE logoID=(SELECT MAX(logoID) FROM tbl_logos)";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':logoID', $logoID, PDO::PARAM_INT);
    $cmd->execute();
    $logoImage = $cmd->fetch();
    $logo = $logoImage['logo'];
    $conn = null;
?>
<?php require_once('navigation.php'); ?>