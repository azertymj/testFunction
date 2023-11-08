<?php

// Paramètres de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_functionbd";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}
session_start();
//utiliser des variables pour stocker les noms des champs du formulaire, puis les utiliser dans la vérification des valeurs de $_POST
$name_input = "name";
$password_input = "password";


if (isset($_POST[$name_input]) && isset($_POST[$password_input])) {
    $name = $_POST[$name_input];
    $password = $_POST[$password_input];

    // Vérifier le nom d'utilisateur
    $name_query = "SELECT * FROM users WHERE nom='$name'";
    $name_result = $conn->query($name_query);

    if ($name_result->num_rows > 0) {
        // Le nom d'utilisateur est valide

        // Vérifier le mot de passe
        $password_query = "SELECT * FROM users WHERE nom='$name' AND password='$password'";
        $password_result = $conn->query($password_query);

        if ($password_result->num_rows > 0) {
            // Le mot de passe est valide
	    $_SESSION['logged'] = true;
            // Votre code pour gérer la connexion réussie

	    //Code pour le recuperation et stockage du type
	    $type_query = "SELECT typeUser FROM users WHERE nom = '$name';";
    	$type_result = $conn->query($type_query);

            if ($type_result->num_rows > 0) {
                while ($row = $type_result->fetch_assoc()) {
                    // Stocker le type d'utilisateur dans une variable de session
                    $_SESSION['type']= $row["typeUser"];
                    switch ($_SESSION['type']) {
                        case "1":
                            header('Location: page_type_1.php?&type='. $_SESSION['type']);
                            break;
                        case "2":
                            header('Location: page_type_2.php');
                            break;
                        case "3":
                            header('Location: page_type_3.php');
                            break;
                    }
                }

                // Autres opérations après avoir récupéré le type d'utilisateur
            } else {
                // Le type d'utilisateur n'a pas été trouvé
                header('Location: session.php?error=4&type='.$_SESSION['type']);
            }
        } else {
            // Le mot de passe est invalide
            header('Location: session.php?error=2&password='.$password);
        }
    } else {
        // Le nom d'utilisateur est invalide
        header('Location: session.php?error=1');
    }
}
// Fermer la connexion
$conn->close();
?>