<!--header page-->
<?php
if (!empty($_GET['pageID'])) {
    $pageID = $_GET['pageID'];
    require('db.php');
    $sql = "SELECT * FROM tbl_pages WHERE pageID = :pageID";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':pageID', $pageID, PDO::PARAM_INT);
    $cmd->execute();
    $page = $cmd->fetch();
    $pageTitle = $page['pageTitle'];
    $conn = null;
}
else {
    $pageTitle = 'Home';
}
require_once('header.php');
?>
<main class="container-fluid background1 text-center">
    <?php
    if (!empty($_GET['pageID']))
        $pageID = $_GET['pageID'];
    if (!empty($pageID)) {
        require('db.php');
        $sql = "SELECT * FROM tbl_pages WHERE pageID = :pageID";
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':pageID', $pageID, PDO::PARAM_INT);
        $cmd->execute();
        $page = $cmd->fetch();
        $pageHeading = $page['pageHeading'];
        $pageContent = $page['pageContent'];
        $conn = null;

        echo '<h1>'.$pageHeading.'</h1>
              <p>'.$pageContent.'</p>';
    }
    else {
        echo '<h1>COMP-1006</h1>
              <img src="images/index.png" class="img-circle" alt="Web Developer">
              <h2>Content Management Site</h2>';
    }
    ?>
</main>
<!--footer page-->
<?php require_once('footer.php') ?>