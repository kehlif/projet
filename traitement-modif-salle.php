<?php
session_start();

  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');

  echo "connecté";

      $statement = $con->prepare("UPDATE salle SET nom = :nom WHERE id_salle = :id LIMIT 1");
      $statement->bindValue(":id", $_POST['id'], PDO::PARAM_INT);
      $statement->bindValue(":nom", $_POST['nom'], PDO::PARAM_STR);
      $data = $statement->execute();

var_dump($data);
      if($data){
        $message = 'modification reussi';
        header('Location:listeSalle.php');
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
