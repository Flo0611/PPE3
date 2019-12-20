<?php
ini_set("display_errors","on");

include'../all.class.php';
include'../inc/bdd.inc.php';
$un_stage = new stage(" ", " ", " ", " ", " ", " ", " ", " ");
$une_inscription_activite = new inscription_activite(" ", " ", " ", " ");

if (isset($_POST['valider']))
{
  if (!empty($_POST['titre_stage']) AND !empty($_POST['description_stage']) AND !empty($_POST['date_stage']) AND !empty($_POST['heure_stage']) AND !empty($_POST['galop_stage']))
  {
    $num_rand = rand(1,1000000);
    include'../inc/upload_file_stage.php';

    $date_stage = $_POST['date_stage'];
    $heure_stage = $_POST['heure_stage'];
    $description_stage = $_POST['description_stage'];
    $galop_stage = $_POST['galop_stage'];
    $titre_stage = $_POST['titre_stage'];
    $place_max =$_POST['place_max'];
    $photo_stage = $_FILES["fileToUpload"]["name"].$num_rand;




    if ($uploadOk != 0)
    {
      $un_stage->ajouter_stages($date_stage, $description_stage ,$heure_stage, $galop_stage, $titre_stage, $photo_stage, $place_max, $conn);
      header("location:../public/admin/ajout_stages.php?succes=upload");
    }
    else
    {
      header("location:../public/admin/ajout_stages.php?erreur=erreur");
    }
  }
  else
  {
    header("location:../public/admin/ajout_stages.php?erreur=champs");
  }

}

if ($_GET['action'] == "supprimer")
{
  $id_stage = $_GET['id'];
  $un_stage->supr_stages($id_stage, $conn);

  header("location:../public/admin/ajout_stages.php?success=supprimer");
}




?>
