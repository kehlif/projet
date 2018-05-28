<?php
session_start();

try {
  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');
  echo "connecté";

if(isset($_POST["connecter"])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];


    $select = $con->prepare("SELECT * FROM utilisateur WHERE email='$email' AND mdp='$mdp'");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();
    $data=$select->fetch();

    if(empty($email) && empty($mdp)){
      echo "<div style=background:coral;border-radius:8px;height:50px;width:250px;opacity:.8;><p style=color:red;text-align:center;> Veuillez saisir les tout les champs</p></div>";
    }
    // header("Location:connexion.php");
    elseif($data['email'] != $email OR $data['mdp'] != $mdp)
    {
      echo "<p style=color:red;>Email ou mot de passe invalide</p>";
    }
    elseif($data['email'] == $email AND $data['mdp'] == $mdp)
    {
      $_SESSION['email']=$data['email'];
      $_SESSION['nom']=$data['nom'];
      $_SESSION['id_utilisateur']=$data['id_utilisateur'];

      header("Location: accueil.php");

    }
    if($data['email'] == 'admin@admin.com' AND $data['mdp'] == 'admin') {
      header("Location: ajoutSalle.php");
    }
}
}
  catch (PDOException $e)
{
  echo "error".$e->getMessage();
}

?>
