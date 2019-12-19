<?php
ini_set("display_errors","on");

include'../all.class.php';
include'../inc/bdd.inc.php';

if (isset($_POST['valider']))
{
  if (!empty($_POST['titre_stage']) AND !empty($_POST['description_stage']) AND !empty($_POST['date_stage']) AND !empty($_POST['heure_stage']) AND !empty($_POST['galop_stage']))
  {
    $num_rand = rand(1,1000000);
    include'../inc/upload_file_stage.php';
    $un_stage = new stage(" ", " ", " ", " ", " ", " ", " ");

    $date_stage = $_POST['date_stage'];
    $heure_stage = $_POST['heure_stage'];
    $description_stage = $_POST['description_stage'];
    $galop_stage = $_POST['galop_stage'];
    $titre_stage = $_POST['titre_stage'];
    $photo_stage = $_FILES["fileToUpload"]["name"].$num_rand;




    if ($uploadOk != 0)
    {
      $un_stage->ajouter_stages($date_stage, $heure_stage, $description_stage, $galop_stage, $titre_stage,$photo_stage, $conn);
      header("location:../public/admin/ajout_stages.php?succes=upload");
    }
    else
    {
      header("location:../public/admin/ajout_stages.php?erreur=erreur");
    }
  }
  else
  {
    echo "Veuillez remplir tous les champs";
    header("location:../public/admin/ajout_stages.php?erreur=champs");
  }
}
?>
