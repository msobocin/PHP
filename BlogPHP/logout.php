<?php
session_start();
$_SESSION['author']['logged'] = false;
session_destroy();
header('Location: index.php');
exit();

?>