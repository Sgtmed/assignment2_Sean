<?php
$pageID = $_POST['pageID'];
$pageTitle = $_POST['pageTitle'];
$pageHeading = $_POST['pageHeading'];
$pageContent = $_POST['pageContent'];
$ok = true;
//validation of page edit
if (empty($pageTitle)) {
    echo 'You must enter a page title <br />';
    $ok = false;
}
if ($ok) {
//database commands to edit page information
    require('db.php');
    $sql = "UPDATE tbl_pages  
            SET pageTitle = :pageTitle,
                pageHeading = :pageHeading,
                pageContent = :pageContent
            WHERE pageID = :pageID";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':pageTitle', $pageTitle, PDO::PARAM_STR, 30);
    $cmd->bindParam(':pageHeading', $pageHeading, PDO::PARAM_STR, 30);
    $cmd->bindParam(':pageContent', $pageContent, PDO::PARAM_STR, 500);
    $cmd->bindParam(':pageID', $pageID, PDO::PARAM_INT);
    $cmd->execute();
    $conn = null;
    header('location:pages.php');
}
?>