<!--header page-->
<?php
$pageTitle = 'Edit Pages';
require_once('header.php');
?>
<main class="container-fluid background1">
    <h1>Edit Pages</h1>
    <!--colored banner message-->
    <?php echo '<div class="alert alert-warning" id="message">Edit page content</div>'; ?>

    <?php
    //database commands for page editing form
        if (!empty($_GET['pageID'])) {
            $pageID = $_GET['pageID'];
        }
        else {
            $pageID = null;
            $pageTitle = null;
            $pageHeading = null;
            $pageContent = null;
        }
        if (!empty($pageID)) {
            require_once('db.php');
            $sql = "SELECT * FROM tbl_pages WHERE pageID = :pageID";
            $cmd = $conn->prepare($sql);
            $cmd->bindParam(':pageID', $pageID, PDO::PARAM_INT);
            $cmd->execute();
            $page = $cmd->fetch();
            $pageTitle = $page['pageTitle'];
            $pageHeading = $page['pageHeading'];
            $pageContent = $page['pageContent'];
            $conn = null;
        }
        ?>
    <!--registration form-->
    <form method="post" action="save-pages.php">
        <fieldset class="form-group">
            <label for="pageTitle" class="col-sm-2">Page Title: *</label>
            <input name="pageTitle" id="pageTitle" required placeholder="page title" value="<?php echo $pageTitle ?>"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="pageHeading" class="col-sm-2">Page Heading: </label>
            <input name="pageHeading" id="pageHeading" placeholder="page heading" value="<?php echo $pageHeading ?>"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="pageContent" class="col-sm-2">Page Content: </label>
            <textarea name="pageContent" rows="7" cols="60" id="pageContent"><?php echo $pageContent ?></textarea>
        </fieldset>
        <input name="pageID" id="pageID" value="<?php echo $pageID?>" type="hidden"/>
        <button class="btn btn-success col-sm-offset-2">Save</button>
    </form>
</main>
<!--footer page-->
<?php require_once('footer.php') ?>