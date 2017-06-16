<?php
    $logoID = $_POST['logoID'];
    $logoFileName = $_FILES['logo']['name'];
    $logoFileType = $_FILES['logo']['type'];
    $logoFileTmpLocation = $_FILES['logo']['tmp_name'];

if (!empty($logoID) && empty($logoFileName)) {
    require ('db.php');
    $sql = "SELECT logo FROM logos WHERE logoID = :logoID";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':logoID',$logoID, PDO::PARAM_INT);
    $cmd->execute();
    $file = $cmd->fetch();
    $fileName = $file['logo'];
}
else {
    $validFileTypes = ['image/jpg', 'image/png', 'image/svg', 'image/gif', 'image/jpeg'];
    $fileType = mime_content_type($logoFileTmpLocation);
    if (in_array($fileType, $validFileTypes)) {
        $fileName = "uploads/" . uniqid("", true) . "-" . $logoFileName;
        move_uploaded_file($logoFileTmpLocation, $fileName);
    }
}
require('db.php');
if (!empty($logoID)){
    $sql = "UPDATE logos  
                   SET logo = :logo
                WHERE logoID = :logoID";}
else {
    $sql = "INSERT INTO logos (logo) 
                        VALUES (:logo);";
}
$cmd = $conn->prepare($sql);
$cmd->bindParam(':logo',$fileName, PDO::PARAM_STR, 100);
if (!empty($logoID))
    $cmd->bindParam(':logoID', $logoID, PDO::PARAM_INT);
$cmd->execute();
$conn = null;
header('location:index.php');
?>