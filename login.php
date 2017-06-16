<!--header page-->
<?php
$pageTitle = 'Login';
require_once('header.php');
?>
    <main class="container">
        <h1>Login</h1>
        <!--colored banner message-->
        <?php
        if (!empty($_GET['invalid']))
            echo '<div class="alert alert-danger" id="message">Email or password was incorrect</div>';
        else if (!empty($_GET['pwReset']))
            echo '<div class="alert alert-info" id="message">Please check your email for the reset password</div>';
        else
            echo '<div class="alert alert-info" id="message">Please log into your account</div>';
        ?>

        <!--login form-->
        <form method="post" action="validation.php">
            <fieldset class="form-group">
                <label for="email" class="col-sm-1">Email: </label>
                <input name="email" id="email" required type="email" placeholder="user@email.com">
            </fieldset>
            <fieldset class="form-group">
                <label for="password"  class="col-sm-1">Password: </label>
                <input name="password" id="password" required type="password" placeholder="password">
            </fieldset>
            <fieldset class="form-group col-sm-offset-1">
                <button class="btn btn-success">Login</button>
            </fieldset>
        </form>
        <p><a href="forgot-password.php">Forgot my password</a></p>
    </main>
<!--footer page-->
<?php require_once('footer.php') ?>
