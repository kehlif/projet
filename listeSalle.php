<?php
session_start();

  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//pour activer l'affichage des erreurs pdo
  echo "connecté";

  $sql="SELECT * FROM salle";
  $stmt=$con->prepare($sql);
  $stmt->execute();
  $results=$stmt->fetchAll();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Liste des Salles</title>
  </head>
  <body>
    <h1>Liste des salles</h1>
    <table>
      <tr>
      <th><p class="text">id</p></th>
      <th><p class="text">Nom</p></th>
      <th><p class="text">Modifier<p></th>
      <th><p class="text">Supprimer</p></th>
      </tr>
      <tbody>
        <?php
          foreach ($results as $result):?>
          <tr>
            <td><?php echo $result['id_salle']; ?></td>
            <td><?php echo $result['nom']; ?></td>
            <td><a href="modifier_salle.php?id_s=<?php echo $result['id_salle']; ?>">modifier</a></td>
            <td><a href="supprimer_salle.php?id_s=<?php echo $result['id_salle']; ?>">supprimer</a></td>
          </tr>
        <?php endforeach; ?>
            </tbody>
        </table>
  </body>
</html>
