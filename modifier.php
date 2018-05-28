<?php
session_start();

  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');

  // echo "connecté";

      $statement = $con->prepare("SELECT r.id_reservation, r.heure_debut, r.heure_fin, r.date_debut, r.date_fin, s.nom as label, u.nom
      FROM reservation r, salle s, utilisateur u WHERE id_reservation = :id LIMIT 1");
      $statement->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
      $statement->execute();
      $data = $statement->fetch();

      // echo var_dump($_GET);
      // var_dump($data);

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
    <title>Modifications Réservation</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/tablet.css">
    <link rel="stylesheet" href="assets/css/tabletxs.css">
    <link rel="stylesheet" href="assets/css/phone.css">
    <link rel="stylesheet" href="assets/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css">
    <link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
  </head>
  <body>
    <header id="haut-page">
      <div class="entete">
        <img class="logo-accueil" src="assets/img/R-logo-bis.png" alt="logo">
        <h2>Reserv'me</h2>
      </div>
          <a href="deconnexion.php"><i class="fas fa-power-off"></i></a>
    </header>
    <a href="accueil.php"><i class="fas fa-angle-left retour"></i></a>
    <h1 class="titre-modif">Modifier une réservation</h1>
    <form id="modification" class="" action="traitement-modif-reservation.php" method="post">
      <input type="hidden" name="id" value="<?php echo $data['id_reservation'] ?>">
      <label for="">Nom Salle</label>
      <input type="text" name="nom" value="<?php echo $data['label'] ?>"><br>
      <label for="">Date de Début</label>
      <input type="date" name="db" value="<?php echo $data['date_debut'] ?>"><br>
      <label for="">Date de fin</label>
      <input type="date" name="df" value="<?php echo $data['date_fin'] ?>"><br>
      <label for="">Heure de Début</label>
      <input type="time" name="hd" value="<?php echo $data['heure_debut'] ?>"><br>
      <label for="">Heure de fin</label>
      <input type="time" name="hf" value="<?php echo $data['heure_fin'] ?>"><br>
      <input type="submit" name="modifier" value="Modifier">
    </form>
  </body>
</html>
