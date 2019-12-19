<?php
ini_set("display_errors","off");

include'../all.class.php';
include'../inc/bdd.inc.php';
$une_balades = new balades(" ", " ", " ", " ", " ", " ", " ", " ", " ");

if (isset($_POST['valider']))
{
  if (!empty($_POST['titre_bal']) AND !empty($_POST['des_bal']) AND !empty($_POST['date_bal']) AND !empty($_POST['debut_bal']) AND !empty($_POST['duree_balade'])AND !empty($_POST['galop_bal']))
  {
    $num_rand = rand(1,1000000);
    include'../inc/upload_file_balade.php';


    $titre_balades = $_POST['titre_bal'];
    $description_balades = $_POST['des_bal'];
    $date_balades = $_POST['date_bal'];
    $galop_balades = $_POST['galop_bal'];
    $debut_balades = $_POST['debut_bal'];
    $duree_balades = $_POST['duree_balade'];
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

if ($_GET['action'] == "supprimer")
{
  $id_balades = $_GET['id'];
  $une_balades->supr_balades($id_balades, $conn);

  header("location:../public/admin/balades.php?success=supprimer");
}
?>
