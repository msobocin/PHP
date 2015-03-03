<?php
session_start();
$_SESSION['author'] = null;
session_destroy();
header('Location: index.php');
exit();

?>