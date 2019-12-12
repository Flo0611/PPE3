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
  if (!empty($_POST['titre_bal']) AND !empty($_POST['description_bal']) AND !empty($_POST['date_bal']) AND !empty($_POST['debut_bal']) AND !empty($_POST['duree_bal']))
  {
    $num_rand = rand(1,1000000);
    include'../inc/upload_file_balade.php';
    $une_balades = new balades(" ", " ", " ", " ", " ", " ", " ", " ", " ");

    $titre_balades = $_POST['titre_bal'];
    $description_balades = $_POST['description_bal'];
    $date_balades = $_POST['date_bal'];
    $galop_balades = $_POST['galop_bal'];
    $debut_balades = $_POST['debut_bal'];
    $duree_balades = $_POST['duree_bal'];
    $photo_balades = $_FILES["fileToUpload"]["name"].$num_rand;




    if ($uploadOk != 0)
    {
      $une_balades->ajouter_balades($date_balades, $debut_balades, $description_balades, $galop_balades, $titre_balades, $photo_balades, $duree_balades, $conn);
      header("location:../public/admin/balades.php?succes=upload");
    }
    else
    {

      header("location:../public/admin/balades.php?erreur=erreur");
    }
  }
  else
  {
    echo "Veuillez remplir tous les champs";
    header("location:../public/admin/balades.php?erreur=champs");
  }
}
?>
