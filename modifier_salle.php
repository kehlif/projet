<?php
session_start();

  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');

  echo "connecté";

      $statement = $con->prepare("SELECT * FROM salle WHERE id_salle = :id LIMIT 1");
      $statement->bindValue(":id", $_GET['id_s'], PDO::PARAM_INT);
      $statement->execute();
      $data = $statement->fetch();

      echo var_dump($_GET);
      var_dump($data);

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modifications salle</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <form class="" action="traitement-modif-salle.php" method="post">
      <input type="hidden" name="id" value="<?php echo $data['id_salle'] ?>">
      <input name="nom" type="text" value="<?php echo $data['nom'];?>" required><br>
      <input type="submit" name="modifier" value="Modifier">
    </form>
  </body>
</html>
