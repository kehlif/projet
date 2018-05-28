<?php
session_start();

try {
  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');
  // echo "connecté";

if(isset($_POST["connecter"])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];


    $select = $con->prepare("SELECT * FROM utilisateur WHERE email='$email' AND mdp='$mdp'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $data=$select->fetch();

    if(empty($email) && empty($mdp)){
      echo "<br><div style=background:coral;border-radius:8px;height:50px;width:350px;opacity:.8;>
      <p style=color:red;text-align:center;>
       Veuillez saisir les tout les champs
       </p></div>";
    }
    elseif($data['email'] != $email OR $data['mdp'] != $mdp)
    {
      echo "<p style=color:red;>Email ou mot de passe invalide</p>";
    }
    elseif($data['email'] == $email AND $data['mdp'] == $mdp)
    {
      $_SESSION['email']=$data['email'];
      $_SESSION['nom']=$data['nom'];
      $_SESSION['id_utilisateur']=$data['id_utilisateur'];

      header("Location: accueil.php");

    }
    if($data['email'] == 'admin@admin.com' AND $data['mdp'] == 'admin') {
      header("Location: ajoutSalle.php");
    }
}
}
  catch (PDOException $e)
{
  echo "error".$e->getMessage();
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="keyword" content="application web reservation salle reunion">
    <meta name="description" content="salaries entreprises">
    <meta name="author" content="KEHLI Fatima">
    <meta name="identifier-URL" content="www.monsite.com">
    <meta name="robots" content="index,follow">
    <meta name="revisit-after" content="5 days">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/tablet.css">
    <link rel="stylesheet" href="assets/css/tabletxs.css">
    <link rel="stylesheet" href="assets/css/phone.css">
    <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
  </head>
  <body>
    <img class="img-connect" src="assets/img/R-logo.png" alt="logo">
    <h1>Reserv'me</h1>
    <form id="connect" class="connect" action="connexion.php" method="post">
      <input type="email" name="email" value="" placeholder="Email"><br>
      <input type="password" name="mdp" value="" placeholder="Mot de passe"><br>
      <input type="submit" name="connecter" value="Se connecter !"><br>
      <p>Pas encore inscrit ? Créer un <a href="inscription.php">compte</a></p>
    </form>
  </body>
</html>
