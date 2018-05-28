<?php

session_start();

try {
  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//pour activer l'affichage des erreurs pdo
  echo "connecté";


  if(isset($_POST['reserver'])) {
    $dateDebut = $_POST['db'];
    $dateFin = $_POST['df'];
    $heureDebut = $_POST['hd'];
    $heureFin = $_POST['hf'];
    $idSalle = $_POST['choix'];
    $id = $_SESSION['id_utilisateur'];


    $insert = $con->prepare("INSERT INTO reservation (heure_debut, heure_fin, date_debut, date_fin, id_salle, id_u) VALUES (:heureDebut, :heureFin, :dateDebut, :dateFin, :idSalle, :id)");
    $insert->bindParam(':dateDebut',$dateDebut);
    $insert->bindParam(':dateFin',$dateFin);
    $insert->bindParam(':heureDebut',$heureDebut);
    $insert->bindParam(':heureFin',$heureFin);
    $insert->bindParam(':idSalle', $idSalle, PDO::PARAM_INT);
    $insert->bindParam(":id", $id, PDO::PARAM_INT);
    $insert->execute();
}

header("Location:reservation.php");
}
catch (PDOException $e)
{
echo "error".$e->getMessage();
}
 ?>
