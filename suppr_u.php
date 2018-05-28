<?php
session_start();

  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');

  echo "connecté";

      $statement = $con->prepare('DELETE FROM utilisateur WHERE id_utilisateur=:id');
      $statement->bindValue(":id", $_GET['id_u'], PDO::PARAM_INT);
      $data = $statement->execute();


      var_dump($data);
      if($data){
        $message = 'suppression reussi';
        header('Location:ajoutSalle.php');
      }else{
        $message = 'echec de la suppression';
      }


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Suppression</title>
  </head>
  <body>
    <h1>Suppression de salle</h1>
    <p><?php echo $message; ?></p>
  </body>
</html>
