<?php
ini_set("display_errors","on");
include'../all.class.php';
include'../inc/bdd.inc.php';
$une_race = new race_chevaux(" ", " ");

if (isset($_POST['valider']))
{
  if (!empty($_POST['nom_race']))
  {
    $nom_race = $_POST['nom_race'];
    $une_race->ajout_race_cheval($nom_race, $conn);

    header("location:../public/admin/ajout_race.php?succes=ajouter");
  }
  else
  {
    header("location:../public/admin/ajout_race.php?erreur=champs");
  }
}
?>

<?php
if (isset($_POST['supr_button']))
{
  $req = $une_race->max_id($conn);
  $nombre = $req->fetch();
  $nb_race = $nombre['max_id'];
  for ($i=0; $i <= $nb_race; $i++)
  {
    echo $_POST['supr_cocher'.$i];
    if(isset($_POST['supr_cocher'.$i]))
    {
      $une_race->supr_race($i, $conn);
      echo "L'id ".$i." a bien été modifier <br>";
    }
  }
  header("location:../public/admin/ajout_race.php?succes=supprimer");
}
?>
