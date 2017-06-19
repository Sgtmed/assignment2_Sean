<?php
$pageTitle = '404';
$content = 'My page data';
require_once ('header.php');
echo '<main class="container">
        <section class="jumbotron">
            <h1>Sorry!  This link is broken</h1>
            <img height="400" src="images/404.jpg">
        </section> 
       </main>';
require_once ('footer.php');
?>