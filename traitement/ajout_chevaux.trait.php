<?php
ini_set("display_errors","on");

include'../all.class.php';
include'../inc/bdd.inc.php';
if (isset($_POST['valider']))
{
  if (isset($_POST['prenom_che']) AND isset($_POST['nom_che']) AND isset($_POST['daten_che']) AND isset($_POST['race_che']) AND isset($_POST['datea_che']) AND isset($_POST['sexe']))
  {
    $num_rand = rand(1,1000000);
    include'../inc/upload_file.php';
    $un_cheval = new chevaux(" ", " ", " ", " ", " ", " ", " ", " ", " ");
    $une_photo = new photo_cheval(" ", " "," ");
    $nom = $_POST['nom_che'];
    $prenom = $_POST['prenom_che'];
    $sexe = $_POST['sexe'];
    $race = $_POST['race_che'];
    $daten = $_POST['daten_che'];
    $datea = $_POST['datea_che'];
    $photo = $_FILES["fileToUpload"]["name"].$num_rand;

    echo "prenom : ".$prenom." nom : ".$nom." sexe : ".$sexe." race : ".$race." date naiss : ".$daten." date arriver : ".$datea;
    if ($uploadOk != 0)
    {
      $un_cheval->ajouter_chevaux($nom, $prenom, $sexe, $race, $daten, $datea, $conn);
      $id_che = $conn->lastinsertid();
      $une_photo->ajouter_photo_cheval($photo, $id_che, $conn);
      $id_photo = $conn->lastinsertid();
      $un_cheval->modifier_photo($id_che, $id_photo, $conn);

      header("location:../public/admin/ajout_chevaux.php?succes=upload");
    }
    else
    {
      header("location:../public/admin/ajout_chevaux.php?erreur=erreur");
    }
  }
  else
  {
    echo "Veuillez remplir tous les champs";
    header("location:../public/admin/ajout_chevaux.php?erreur=champs");
  }
}
?>
