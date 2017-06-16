<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle ?></title>
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- bootstrap CSS optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
<?php
//database commands to get logo
if (!empty($_GET['logoID'])) {
    $logoID = $_GET['logoID'];
}
else {
    $logoID = null;
}
$logo = null;
if (!empty($logoID)) {
    require('db.php');
    $sql = "SELECT * FROM logos WHERE logoID = :logoID";
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':logoID', $logoID, PDO::PARAM_INT);
    $cmd->execute();
    $logoImage = $cmd->fetch();
    $conn = null;
    $logo = $logoImage['logo'];
}
?>
<!--navigation menu-->
<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <img height="50" class="pull-left" src=<?php echo $logo?>>
        <li><a href="index.php" class="navbar-brand">Home</a></li>
        <?php
        session_start();
        //public links
        if (empty($_SESSION['email'])) {
            echo '<li><a href="registration.php">Register</a></li>
                  <li><a href="login.php">Login</a></li>';
        }
        //private links
        else {
            echo '<li><a href="pages.php">Pages</a></li>
                  <li><a href="logo.php">Logo</a></li>
                  <li><a href="users.php">User List</a></li>
                  <li><a href="logout.php">Logout</a></li>';
        }
        ?>
    </ul>
</nav>
