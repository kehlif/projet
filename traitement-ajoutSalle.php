<?php
session_start();

try {
  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//pour activer l'affichage des erreurs pdo
  echo "connecté";

  if(isset($_POST['ajout'])) {
    $salle = $_POST['salle'];

    $insert = $con->prepare("INSERT INTO salle (nom) VALUES (:nom) ");
    $insert->bindParam(':nom',$salle);
    $insert->execute();

}

header("Location:listeSalle.php");
}
catch (PDOException $e)
{
echo "error".$e->getMessage();
}


 ?>
