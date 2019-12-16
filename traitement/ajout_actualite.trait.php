<?php
ini_set("display_errors","on");
session_start();
include'../all.class.php';
include'../inc/bdd.inc.php';
$id_membre = $_SESSION['id_membre'];
$une_image_actu = new images_actu(" ", " ", " ");
if (isset($_POST['valider']))
{
  if (isset($_POST['titre_actu']) AND isset($_POST['description_actu']))
  {
    $num_rand = rand(1,1000000);
    include'../inc/upload_actu.php';
    $une_actu = new actu(" ", " ", " ", " ", " ", " ", " ");
    $titre = $_POST['titre_actu'];
    $des = $_POST['description_actu'];
    //$photo = $_FILES["fileToUpload"]["name"].$num_rand;
    $prenom = $_GET['prenom'];
    $nom = $_GET['nom'];
    $date = $_GET['date'];
    $lien = " ";

    if ($uploadOk != 0)
    {
      $une_actu->ajouter_actu($id_membre, $nom, $prenom, $des, $lien, $date, $titre, $conn);
      $id_actu = $conn->lastinsertid();
      $photo = 0;
      while ($photo < $cpt)
      {
        $lib_image = $_FILES["fileToUpload"]["name"][$photo].$num_rand;
        echo "lib : ".$lib_image;
        $une_image_actu->ajouter_images_actu($lib_image, $id_actu, $conn);
        $photo++;
      }
      header("location:../public/admin/actualites.php?succes=upload");
    }
    else
    {
      header("location:../public/admin/actualites.php?erreur=erreur");
    }
  }
  else
  {
    header("location:../public/admin/actualites.php?erreur=champs");
  }
}
?>
