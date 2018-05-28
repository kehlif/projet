<?php
session_start();


try {
  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');
  $sql="SELECT * FROM salle";
  // echo "connecté";

  $stmt=$con->prepare($sql);
  $stmt->execute();
  $results=$stmt->fetchAll();

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
    <title>Réservation</title>
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
    <nav class="nav-accueil">
      <ul>
        <li><i class="fas fa-home"></i><a href="accueil.php">Accueil</a></li>
        <li><i class="fas fa-plus"></i><a href="reservation.php">Reservations</a></li>
        <li><i class="fas fa-info-circle"></i><a href="details.php">Détails</a></li>
      </ul>
    </nav>
    <h1 class="titre-reservation">Réserver une salle</h1>
    <form id="reservation" action="traitement-reservation.php" method="post">
      <label for="">Nom Salle</label>
      <select name="choix">
      <option value="">Choisir une salle</option>
      <?php foreach ($results as $res) { ?>
        <option value="<?php echo $res["id_salle"]; ?>"><?php echo $res["nom"]; ?></option>
      <?php } ?>
      </select><br>
      <label for="">Date de Début</label>
      <input type="date" name="db" value=""><br>
      <label for="">Date de Fin</label>
      <input type="date" name="df" value=""><br>
      <label for="">Heure de Début</label>
      <input type="time" name="hd" value=""><br>
      <label for="">Heure de Fin</label>
      <input type="time" name="hf" value=""><br>
      <input type="submit" name="reserver" value="Réserver ">
    </form>

  </body>
</html>
