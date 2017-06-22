<!--navigation menu-->
<nav class="navbar navbar-default">
    <ul class="nav navbar-nav">
        <img height="40" class="pull-left" id="logo" src=<?php echo $logo?>>
        <li><a href="index.php" class="navbar-brand">Home</a></li>
        <?php
        session_start();
        //public links
        if (empty($_SESSION['email'])) {
            require('db.php');
            $sql = "SELECT * FROM tbl_pages";
            $cmd = $conn->prepare($sql);
            $cmd->execute();
            $tbl_pages = $cmd->fetchAll();
            foreach ($tbl_pages as $page) {
                echo '<li><a href="index.php?pageID='.$page['pageID'].'">'.$page['pageTitle'].'</a></li>';
            }
            $conn = null;
            echo '<li><a href="registration.php" class="pull-right">Register</a></li>
                  <li><a href="login.php" class="pull-right">Login</a></li>';
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
