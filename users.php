<?php
$pageTitle = 'Registered Users';
require_once('header.php');
?>
    <main class="container">
        <h1>Registered Users</h1>
            <?php
            //database commands
            require_once('db.php');
            $sql = "SELECT * FROM tbl_users";
            $cmd = $conn->prepare($sql);
            $cmd->execute();
            $tbl_users = $cmd->fetchAll();
            $conn = null;

            //create a table headers
            echo '<table class="table table-striped table-hover">
                        <tr><th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Hashed Password</th>';
            if (!empty($_SESSION['email'])){
                echo '<th>Edit</th>
                              <th>Delete</th>';
            }
            echo '</tr>';
            foreach($tbl_users as $user)
            {
                echo '<tr><td>'.$user['fname'].'</td>
                                  <td>'.$user['lname'].'</td>
                                  <td>'.$user['username'].'</td>
                                  <td>'.$user['email'].'</td>
                                  <td><'.$user['password'].'</td>';
                //make sure administrator is logged on to edit and delete entries
                if (!empty($_SESSION['email'])){
                    echo '<td><a href="edit-user.php?email='.$user['email'].'"
                                            class="btn btn-primary">Edit</a></td>
                                  <td><a href="delete-user.php?email='.$user['email'].'" 
                                            class="btn btn-danger confirmation">Delete</a></td>';
                }
                echo '</tr>';
            }
            echo '</table></main>';
            require_once ('footer.php');
            ?>