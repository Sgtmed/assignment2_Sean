<?php
$pageTitle = 'Pages';
require_once('header.php');
?>
    <main class="container-fluid background1">
        <h1>Pages</h1>
        <a href="add-page.php" class="btn btn-info btn-sm">Add Page</a>
            <?php
            //database commands
            require('db.php');
            $sql = "SELECT * FROM tbl_pages";
            $cmd = $conn->prepare($sql);
            $cmd->execute();
            $tbl_pages = $cmd->fetchAll();
            $conn = null;

            //create a table headers
            echo '<table class="table table-bordered">
                    <tr><th>Page</th>
                    <th>Edit</th>
                    <th>Delete</th>';
            echo '</tr>';
            //loop through data and display the results
            foreach($tbl_pages as $page) {
                echo '<tr><td>'.$page['pageTitle'].'</td>
                          <td><a href="edit-pages.php?pageID='.$page['pageID'].'"
                                            class="btn btn-primary">Edit</a></td>
                          <td><a href="delete-pages.php?pageID='.$page['pageID'].'" 
                                            class="btn btn-danger confirmation">Delete</a></td>';
                }
                echo '</tr>';
            echo '</table></main>';
            ?>
<?php
require_once ('footer.php');
?>