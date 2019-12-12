<?php
ini_set("display_errors","on");

include'../all.class.php';
include'../inc/bdd.inc.php';
if (isset($_POST['valider']))
{
  if (isset($_POST['titre_bal']) AND isset($_POST['description_bal']) AND isset($_POST['date_bal']) AND isset($_POST['debut_bal']) AND isset($_POST['Duree_bal']) AND isset($_POST['galop_bal']))
  {
    $num_rand = rand(1,1000000);
    include'../inc/upload_file_balade.php';
    $une_balades = new balades(" ", " ", " ", " ", " ", " ", " ", " ", " ");

    $titre_balades = $_POST['titre_bal'];
    $description_balades = $_POST['description_bal'];
    $date_balades = $_POST['date_bal'];
    $galop_balades = $_POST['galop_bal'];
    $debut_balades = $_POST['debut_bal'];
    $duree_balades = $_POST['Duree_bal'];
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
