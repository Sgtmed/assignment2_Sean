<?php
$pageTitle = $_POST['pageTitle'];
$ok = true;
//validation of page creation
if (empty($pageTitle)) {
    echo 'You must enter a page title <br />';
    $ok = false;
}
if ($ok) {
    //db commands to register new user
    //try to insert pageTitle and throw exception if pageTitle is already inserted
    require_once ('db.php');
    $sql = "INSERT INTO tbl_pages (pageTitle) 
            VALUES (:pageTitle)";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':pageTitle', $pageTitle, PDO::PARAM_STR, 30);
    try{
        $cmd->execute();
    }
    catch (Exception $e) {
        if (strpos($e->getMessage(),'Integrity constraint violation: 1062') == true){
            header('location:add-page.php?errorMessage=page-already-exists');
            exit();
        }
    }
    $conn = null;
    header('location:pages.php');
}
?>
