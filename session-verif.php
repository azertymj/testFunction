<?php
session_start();
if(!isset($_SESSION["logged"]) || !$_SESSION['logged'] ){
    header('location: session.php?error=3');
}
$name = isset($_SESSION['name']) ? $_SESSION['name'] :'';

?>