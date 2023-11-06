<?php
require_once("session-verif.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Page d'accueil</title>
<style>
  body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
    text-align: center;
  }

  .container {
    width: 50%;
    margin: auto;
    margin-top: 100px;
    padding: 20px;
    border-radius: 10px;
    background-color: #ffffff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  }

  h2 {
    color: #333;
  }
</style>
</head>
<body>

<div class="container">
  <h2>Bienvenue sur notre site <?php  echo $name ?></h2>
  <p>Ici, vous pouvez trouver toutes les informations dont vous avez besoin.</p>
</div>

</body>
</html>
