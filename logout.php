<?php
//start a session
session_start();
//destroy the session
session_destroy();
header('location:index.php');
?>
