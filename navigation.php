<!--navigation menu-->
<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <img height="50" class="pull-left" src=<?php echo $logo?>>
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
                echo '<li><a href="index.php?'.$page['pageID'].'">'.$page['pageTitle'].'</a></li>';
            }
            $conn = null;
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
