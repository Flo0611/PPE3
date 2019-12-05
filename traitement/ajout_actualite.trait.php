<?php
ini_set("display_errors","on");
session_start();
include'../all.class.php';
include'../inc/bdd.inc.php';
if (isset($_POST['valider']))
{
  if (isset($_POST['titre_actu']) AND isset($_POST['description_actu']))
  {
    $num_rand = rand(1,1000000);
    include'../inc/upload_actu.php';
    $une_actu = new actu(" ", " ", " ", " ", " ", " ", " ", " ");
    $titre = $_POST['titre_actu'];
    $des = $_POST['description_actu'];
    $photo = $_FILES["fileToUpload"]["name"].$num_rand;
    $prenom = $_GET['prenom'];
    $nom = $_GET['nom'];
    $date = $_GET['date'];
    $lien = " ";

    if ($uploadOk != 0)
    {
      $une_actu->ajouter_actu($nom, $prenom, $des, $lien, $photo, $date, $titre, $conn);

      header("location:../public/admin/actualites.php?succes=upload");
    }
    else
    {
      header("location:../public/admin/actualites.php?erreur=erreur");
    }
  }
  else
  {
    echo "Veuillez remplir tous les champs";
    header("location:../public/admin/actualites.php?erreur=champs");
  }
}
?>
