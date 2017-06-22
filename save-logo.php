<?php
    $logoID = $_POST['logoID'];
    $logoName = $_FILES['logo']['name'];
    $logoType = $_FILES['logo']['type'];
    $logoTmpLocation = $_FILES['logo']['tmp_name'];

if (!empty($logoID) && empty($logoName)) {
    require ('db.php');
    $sql = "SELECT logo FROM tbl_logos WHERE logoID = :logoID";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':logoID',$logoID, PDO::PARAM_INT);
    $cmd->execute();
    $file = $cmd->fetch();
    $fileName = $file['logo'];
}
else {
    $validFileTypes = ['image/jpg', 'image/png', 'image/svg', 'image/gif', 'image/jpeg'];
    $fileType = mime_content_type($logoTmpLocation);
    if (in_array($fileType, $validFileTypes)) {
        $fileName = "uploads/" . uniqid("", true) . "-" . $logoName;
        move_uploaded_file($logoTmpLocation, $fileName);
    }
}
require('db.php');
$sql = "INSERT INTO tbl_logos (logo) 
        VALUES (:logo);";
$cmd = $conn->prepare($sql);
$cmd->bindParam(':logo', $fileName, PDO::PARAM_STR, 100);
if (!empty($logoID))
    $cmd->bindParam(':logoID', $logoID, PDO::PARAM_INT);
$cmd->execute();
$conn = null;
header('location:index.php');
?>