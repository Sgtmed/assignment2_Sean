<!--header page-->
<?php
$pageTitle = 'Edit User';
require_once('header.php');
?>
<main class="container-fluid background1">
    <h1>Edit User Information</h1>
    <!--colored banner message-->
    <?php
    if (!empty($_GET['errorMessage'])) {
        echo '<div class="alert alert-danger" id="message">Email address already exists</div>';
    }
    else {
        echo '<div class="alert alert-warning" id="message">Edit user information</div>';
    }
    ?>
    <?php
    //database commands to edit user information
    if (!empty($_GET['email']))
        $email = $_GET['email'];
    //load the user from the DB
    if (!empty($email)) {
        require('db.php');
        $sql = "SELECT * FROM tbl_users WHERE email = :email";
        $cmd = $conn->prepare($sql);
        $cmd->bindParam(':email', $email, PDO::PARAM_STR, 120);
        $cmd->execute();
        $user = $cmd->fetch();

        $fname = $user['fname'];
        $lname = $user['lname'];
        $email = $user['email'];
        $username = $user['username'];
        $password = null;
        $conn = null;
    }
    ?>

    <!--registration form-->
    <form method="post" action="save-registration.php">
        <fieldset class="form-group">
            <label for="fname" class="col-sm-2">First Name: </label>
            <input name="fname" id="fname" required placeholder="first name" value="<?php echo $fname ?>"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="lname" class="col-sm-2">Last Name: </label>
            <input name="lname" id="lname" required placeholder="last name" value="<?php echo $lname ?>"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="email" class="col-sm-2">Email: </label>
            <input name="email" id="email" type="email" required placeholder="user@email.com" value="<?php echo $email ?>"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="username" class="col-sm-2">User Name: </label>
            <input name="username" id="username" required placeholder="Username" <?php echo $username ?>/>
        </fieldset>
        <fieldset class="form-group">
            <label for="password" class="col-sm-2">Password: </label>
            <input name="password" id="password" type="password" required placeholder="Password"/>
        </fieldset>
        <fieldset class="form-group">
            <label for="confirm" class="col-sm-2">Re-enter Password: </label>
            <input name="confirm" id="confirm" type="password" required placeholder="Confirm Password"/>
        </fieldset>
        <button class="btn btn-success col-sm-offset-2">Save</button>
    </form>
</main>
<!--footer page-->
<?php require_once('footer.php') ?>