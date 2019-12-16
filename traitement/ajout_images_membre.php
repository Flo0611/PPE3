<?php
ini_set("display_errors","on");

include'../all.class.php';
include'../inc/bdd.inc.php';
$un_membre = new membre(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ");
$une_image_membre = new images_membre(" ", " ", " ");
$id_membre = $_GET['id_membre'];
if (isset($_POST['valider']))
{
  if (!empty($_FILES["fileToUpload"]))
  {
    $num_rand = rand(1,1000000);
    include'../inc/upload_images_membre.php';
    $photo = $_FILES["fileToUpload"]["name"].$num_rand;

    if ($uploadOk != 0)
    {
      $une_image_membre->ajouter_images_membre($photo, $id_membre, $conn);
      $un_membre->changement_photo_profil($id_membre, $photo, $conn);
      header("location:../public/info.php");
    }
    else
    {
      header("location:../public/info.php");
    }
  }
  else
  {
    header("location:../public/info.php?erreur=vide");
  }
}
?>
