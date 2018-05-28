<?php
session_start();
?>

 <!-- WELCOME: -->

<?php
session_start();


try {
  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');
  // echo "connecté";

    $query2 = "SELECT r.id_reservation, r.heure_debut, r.heure_fin, r.date_debut, r.date_fin, s.nom as label, u.nom
    FROM reservation r, salle s, utilisateur u WHERE u.id_utilisateur = r.id_u AND r.id_salle = s.id_salle ORDER BY id_reservation ASC";
    $select = $con->prepare($query2);
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $data=$select->fetchAll();

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
    <title>Accueil</title>
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
      <?php
      echo $_SESSION['nom'];
      echo $_SESSION['id_utilisateur'];
      ?>
          <a href="deconnexion.php"><i class="fas fa-power-off"></i></a>
    </header>
    <nav class="nav-accueil">
      <ul>
        <li><i class="fas fa-home"></i><a href="accueil.php">Accueil</a></li>
        <li><i class="fas fa-plus"></i><a href="reservation.php">Reservations</a></li>
        <li><i class="fas fa-info-circle"></i><a href="details.php">Détails</a></li>
      </ul>
    </nav>
    <h1 class="titre-liste">Liste des réservations</h1>
    <table class="tab">
      <thead>
      <tr>
      <th>id</th>
      <th>Nom Salle</th>
      <th>Heure-Debut</th>
      <th>Heure-fin</th>
      <th>Date-Debut</th>
      <th>Date-fin</th>
      <th>Nom réserveur</th>
      <th><i class="far fa-edit"></i></th>
      <th><i class="far fa-trash-alt"></i></th>
      </tr>
    </thead>
            <tbody>
                          <?php
                            foreach ($data as $data):?>
                            <tr>
                              <td><?php echo $data['id_reservation']; ?></td>
                              <td><?php echo $data['label']; ?></td>
                              <td><?php echo $data['heure_debut']; ?></td>
                              <td><?php echo $data['heure_fin']; ?></td>
                              <td><?php echo strftime('%d-%m-%y',strtotime($data['date_debut'])); ?></td>
                              <td><?php echo strftime('%d-%m-%y',strtotime($data['date_fin'])); ?></td>
                              <td><?php echo $data['nom']; ?></td>

                              <td><a style="" href="modifier.php?id=<?php echo $data['id_reservation']; ?>">modifier</a></td>
                              <td><a style="background: red; text-decoration: none; color:white; margin:10px; border-radius:5px; padding:5px;" href="supprimer.php?id=<?php echo $data['id_reservation']; ?>">supprimer</a></td>
                            </tr>
                          <?php endforeach; ?>
                  </tbody>
              </table>
        </body>
</html>
