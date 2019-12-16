<?php
ini_set("display_errors","on");

include'../all.class.php';
include'../inc/bdd.inc.php';
echo $_POST['titre_bal'];
echo $_POST['description_bal'];
echo $_POST['date_bal'];
echo $_POST['debut_bal'];
echo $_POST['duree_bal'];
echo $_POST['galop_bal'];

if (isset($_POST['valider']))
{
  if (!empty($_POST['titre_stage']) AND !empty($_POST['description_stage']) AND !empty($_POST['date_stage']) AND !empty($_POST['heure_stage']) AND !empty($_POST['galop_stage']) AND !empty($_POST['heure_fin_stage']) AND !empty($_POST['pdf_stage']))
  {
    $num_rand = rand(1,1000000);
    include'../inc/upload_file_stage.php';
    $un_stage = new stages(" ", " ", " ", " ", " ", " ", " ", " ", " ");

    $id_stage = $_POST['idst'];
    $date_stage = $_POST['datest'];
    $heure_stage = $_POST['heurest'];
    $description_stage = $_POST['desst'];
    $heure_fin_stage = $_POST['heurefin'];
    $pdf_stage = $_POST['pdfst'];
    $galop_stage = $_POST['galopst'];
    $titre_stage = $_POST['titrest'];
    $photo_stage = $_FILES["fileToUpload"]["name"].$num_rand;




    if ($uploadOk != 0)
    {
      $un_stage->ajouter_stages($date_stage, $heure_stage, $description_stage, $heure_fin_stage, $pdf_stage, $galop_stage, $titre_stage,$photo_stage, $conn);
      header("location:../public/admin/stage.php?succes=upload");
    }
    else
    {

      header("location:../public/admin/stage.php?erreur=erreur");
    }
  }
  else
  {
    echo "Veuillez remplir tous les champs";
    header("location:../public/admin/balades.php?erreur=champs");
  }
}
?>
