<!--header page-->
<?php
$pageTitle = 'Registration';
require_once('header.php');
?>
    <main class="container">
        <h1>User Registration</h1>
        <!--colored banner message-->
        <?php
        if (!empty($_GET['errorMessage'])) {
            echo '<div class="alert alert-danger" id="message">Email address already exists</div>';
        }
        else {
            echo '<div class="alert alert-info" id="message">Please create your account</div>';
        }
        ?>
        <!--registration form-->
        <form method="post" action="save-registration.php">
            <fieldset class="form-group">
                <label for="fname" class="col-sm-2">First Name: </label>
                <input name="fname" id="fname" required placeholder="first name"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="lname" class="col-sm-2">Last Name: </label>
                <input name="lname" id="lname" required placeholder="last name"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="email" class="col-sm-2">Email: </label>
                <input name="email" id="email" type="email" required placeholder="user@email.com"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="username" class="col-sm-2">User Name: </label>
                <input name="username" id="username" required placeholder="Username"/>
            </fieldset>
            <fieldset class="form-group">
                <label for="password" class="col-sm-2">Password: </label>
                <input name="password" id="password" type="password" required placeholder="Password"
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                       autofocus title="Passwords must contain uppercase, lowercase and numbers"/>
                <span id="result"></span>
            </fieldset>
            <fieldset class="form-group">
                <label for="confirm" class="col-sm-2">Re-enter Password: </label>
                <input name="confirm" id="confirm" type="password" required placeholder="Confirm Password"
                       pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/>
            </fieldset>
            <button class="btn btn-success col-sm-offset-2">Register</button>
        </form>
    </main>
    </body>
<!--footer page-->
<?php require_once('footer.php') ?>