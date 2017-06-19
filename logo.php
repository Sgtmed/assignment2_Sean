<!--header page-->
<?php
$pageTitle = 'Edit User';
require_once('header.php');
?>
<main class="container">
    <h1>Upload logo</h1>
    <form method="post" action="save-logo.php" enctype="multipart/form-data">
        <fieldset class="form-group">
            <label for="logo" class="col-sm-2">Logo</label>
            <input name="logo" id="logo" type="file"/>
        </fieldset>
        <input name="logoID" id="logoID" value="<?php echo $logoID?>" type="hidden"/>
        <button class="btn btn-success col-sm-offset-2">Submit</button>
    </form>
</main>
</body>
<!--footer page-->
<?php require_once('footer.php') ?>