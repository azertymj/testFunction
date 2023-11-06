<?php
$name = isset($_POST["name"]) ? $_POST["name"] :"";
$password= isset($_POST["password"]) ? $_POST["password"] :"";

// if($name != "Azertymj23") {
if($name == ''){
    header('location: session.php?error=1');
}elseif($password != "toto"){
    header('location: session.php?error=2&password='.$password);
}else{
    session_start();
    $_SESSION['name'] = $name;
    $_SESSION['password']= $password;
    $_SESSION['logged'] = true;
    
    header('location: session-bienvenue.php');
}


?>