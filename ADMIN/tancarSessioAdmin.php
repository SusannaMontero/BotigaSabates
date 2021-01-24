<?php 
session_start();
unset ($_SESSION['accesAdmin']);
header('Location: login.php');


?>