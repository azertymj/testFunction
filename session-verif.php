<?php
session_start();
if(!isset($_SESSION["logged"]) || !$_SESSION['logged'] ){
    header('location: session.php?error=3');
}
$name = isset($_SESSION['name']) ? $_SESSION['name'] :'';
if (isset($_SESSION['type'])) {
    $type = $_SESSION['type'];

    // Utilisez la variable $user_type comme nécessaire dans cette page
    echo "Le type d'utilisateur est : " . $type;
} else {
    // Redirigez l'utilisateur vers une page de connexion ou une page d'erreur s'il n'y a pas de type d'utilisateur défini
    
   
header('Location: login.php');
    exit();
}

?>