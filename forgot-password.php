<?php
$pageTitle = 'Forgot Password';
require_once ('header.php');
?>
    <main class="container-fluid background1">
        <h1>Forgot Password</h1>
        <?php
        echo '<div class="alert alert-warning" id="message">A new password will be emailed to your account</div>';
        ?>
        <form method="post" action="password-reset.php">
            <fieldset class="form-group">
                <label  for="email" class="col-sm-1">Email: </label>
                <input name="email" id="email" />
            </fieldset>
            <button class="col-sm-offset-1 btn btn-success">Submit</button>
        </form>
    </main>
<?php
require_once ('footer.php');
?>