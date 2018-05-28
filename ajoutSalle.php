<?php
session_start();


try {
  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');
  echo "connecté";

    $query2 = "SELECT * FROM utilisateur";
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
    <title>Ajout Salle</title>
  </head>
  <body>
    <h1>Ajouter Salle</h1>
    <form class="" action="traitement-ajoutSalle.php" method="post">
      <input type="text" name="salle" value=""><br>
      <input type="submit" name="ajout" value="Ajouter">
    </form>
<hr>
    <h1>Utilisateur</h1>
    <h2>Liste des utilisateurs</h2>
    <table>
      <tr>
      <th><p class="text">id</p></th>
      <th><p class="text">Nom</p></th>
      <th><p class="text">Email<p></th>
      <th><p class="text">Mot de passe</p></th>
      <th><p class="text">Modifier</p></th>
      <th><p class="text">Supprimer</p></th>
      </tr>
            <tbody>
                          <?php
                            foreach ($data as $data):?>
                            <tr>
                              <td><?php echo $data['id_utilisateur']; ?></td>
                              <td><?php echo $data['nom']; ?></td>
                              <td><?php echo $data['email']; ?></td>
                              <td><?php echo $data['mdp']; ?></td>
                              <td><a href="modif_u.php?id_u=<?php echo $data['id_utilisateur']; ?>">modifier</a></td>
                              <td><a href="suppr_u.php?id_u=<?php echo $data['id_utilisateur']; ?>">supprimer</a></td>
                            </tr>
                          <?php endforeach; ?>
                  </tbody>
              </table>
  </body>
</html>
