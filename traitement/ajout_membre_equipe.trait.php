<?php
ini_set("display_errors","on");
include'../all.class.php';
include'../inc/bdd.inc.php';
$une_presentation = new presentation(" ", " ", " ", " ", " ", " ", " ");
if (isset($_POST['valider']))
{
  if (isset($_POST['nom_membre']) AND isset($_POST['prenom_membre']) AND isset($_POST['age_membre']) AND isset($_POST['designation']))
  {
    $num_rand = rand(1,1000000);
    include'../inc/upload_membre_equipe.php';
    $nom = $_POST['nom_membre'];
    $prenom = $_POST['prenom_membre'];
    $age = $_POST['age_membre'];
    $designation = $_POST['designation'];
    $photo = $_FILES["fileToUpload"]["name"].$num_rand;

    if ($uploadOk != 0)
    {
      $une_presentation->ajout_presentation($nom, $prenom, $age, $photo, $designation, $conn);


      header("location:../public/admin/ajout_membre_equipe.php?succes=upload");
    }
    else
    {
      header("location:../public/admin/ajout_membre_equipe.php?erreur=erreur");
    }
  }
  else
  {
    echo "Veuillez remplir tous les champs";
    header("location:../public/admin/ajout_membre_equipe.php?erreur=champs");
  }
}

if ($_GET['action'] == "supprimer")
{
  $id_pres = $_GET['id'];
  $une_presentation->supprimer_pres($id_pres, $conn);
  header("location:../public/admin/ajout_membre_equipe.php?success=supprimer");
}
?>
