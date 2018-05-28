<?php
session_start();

  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');

  // echo "connecté";

      $statement = $con->prepare("UPDATE reservation  SET  heure_debut = :heureDebut, heure_fin = :heureFin, date_debut = :dateDebut, date_fin = :dateFin  WHERE id_reservation = :id LIMIT 1");
      $statement->bindValue(":id", $_POST['id'], PDO::PARAM_INT);
      // $statement->bindValue(":label", $_POST['nom'], PDO::PARAM_STR);
      $statement->bindValue(":heureDebut", $_POST['hd'], PDO::PARAM_STR);
      $statement->bindValue(":heureFin", $_POST['hf'], PDO::PARAM_STR);
      $statement->bindValue(":dateDebut", $_POST['db'], PDO::PARAM_STR);
      $statement->bindValue(":dateFin", $_POST['df'], PDO::PARAM_STR);
      $data = $statement->execute();

var_dump($data);
      if($data){
        $message = 'modification reussi';
        header('Location:accueil.php');
      }else{
        $message = 'echec de la modification';
      }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modification</title>
  </head>
  <body>
    <h1>Résultat de la modification</h1>
    <p><?php echo $message ?></p>
  </body>
</html>
