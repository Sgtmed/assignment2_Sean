<!--header page-->
<?php
$pageTitle = 'Add page';
require_once('header.php');
?>
<main class="container-fluid background1">
    <h1>User Registration</h1>
    <!--colored banner message-->
    <?php
    if (!empty($_GET['errorMessage'])) {
        echo '<div class="alert alert-danger" id="message">Page already exists</div>';
    }
    else {
        echo '<div class="alert alert-info" id="message">Please create your page</div>';
    }
    ?>
    <!--registration form-->
    <form method="post" action="save-newpage.php">
        <fieldset class="form-group">
            <label for="pageTitle" class="col-sm-2">Page Title: </label>
            <input name="pageTitle" id="pageTitle" required placeholder="page title"/>
        </fieldset>
        <button class="btn btn-success col-sm-offset-2">Submit</button>
    </form>
</main>
<!--footer page-->
<?php require_once('footer.php') ?>
