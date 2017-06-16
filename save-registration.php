<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;

//form validation
if ($password != $confirm) {
    echo 'Passwords do not match <br />';
    $ok = false;
}
if (strlen($password) < 8) {
    echo 'Passwords must contain 8 or more characters <br />';
    $ok = false;
}
if (empty($email)) {
    echo 'You must enter an email address <br />';
    $ok = false;
}
//if form validation is complete
if ($ok) {
    //db commands to register new user
    //hash password
    //try to insert email and throw exception if email is already inserted
    require_once ('db.php');
    $sql = "INSERT INTO tbl_users VALUES (:fname, :lname, :email, :username, :password)";
    $password = password_hash($password, PASSWORD_DEFAULT);
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':fname', $fname, PDO::PARAM_STR, 50);
    $cmd->bindParam(':lname', $lname, PDO::PARAM_STR, 50);
    $cmd->bindParam(':email', $email, PDO::PARAM_STR, 120);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $cmd->bindParam(':password', $password, PDO::PARAM_STR, 255);
    try{
        $cmd->execute();
    }
    catch (Exception $e) {
        if (strpos($e->getMessage(),'Integrity constraint violation: 1062') == true){
            header('location:registration.php?errorMessage=email-already-exists');
        }
    }
    $conn = null;
    header('location:login.php');
}
?>
