
<?php
$error = isset($_GET["error"]) ? $_GET["error"] :"";
$password= isset($_GET["password"]) ? $_GET["password"] :"";

?>
<!DOCTYPE html>
<html>
<head>
<title>Formulaire de login</title>
</head>
<body>

<h2>Se connecter</h2>

<form action="session-login.php" method="post">
  <div>
    <label for="name">Nom d'utilisateur:</label><br>
    <input type="text" id="name" name="name"><br>
  </div>
  <div>
    <label for="password">Mot de passe:</label><br>
    <input type="password" id="password" name="password"><br>
  </div>
  <br>
  <input type="submit" value="Se connecter">
</form>

<?php
  switch ($error) {
      case '1':
        echo"nom incorrect";
        break;
   
        case "2":
          echo"le mdp saisi : $password n'est pas correct...";
        break;

        case "3":
          echo "Session deconnecté";
          break;
    }  

?>

</body>
</html>

