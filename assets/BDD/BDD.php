<?php


try {
  $con = new PDO ('mysql:host=localhost;dbname=reservme','root','papounetsql');
  echo "connecté";
}
  catch (PDOException $e)
{
  echo "error".$e->getMessage();
}

?>
