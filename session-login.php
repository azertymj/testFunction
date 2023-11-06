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

$name = isset($_POST["name"]) ? $_POST["name"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

// Vérifier les informations dans la base de données
$sql = "SELECT * FROM users WHERE nom = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si l'utilisateur existe dans la base de données
    while ($row = $result->fetch_assoc()) {
        // Vérifier le mot de passe, vous devez utiliser des méthodes de hachage sécurisées comme bcrypt pour stocker les mots de passe dans la base de données
        if ($row["password"] === $password) {
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $password;
            $_SESSION['logged'] = true;
            header('location: session-bienvenue.php');
        } else {
            header('location: session.php?error=2&password=' . $password);
        }
    }
} else {
    header('location: session.php?error=1');
}

// Fermer la connexion
$conn->close();
?>
