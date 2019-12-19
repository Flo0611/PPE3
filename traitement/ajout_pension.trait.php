<?php
include'../inc/bdd.inc.php';
include'../all.class.php';

$un_box = new box(" ", " ", " ");
$une_pension = new pension(" ", " ", " ", " ", " ", " ", " ");

if (isset($_POST['valider']))
{
$id_cheval = $_POST['id_cheval'];
$id_pension = $_POST['id_pension'];

echo $id_cheval."<br>".$id_pension;

$req = $un_box->select_cheval($id_cheval, $conn);
$res = $req->fetch();

$nb_box = $res['nb'];

echo $nb_box;

if ($nb_box == 0)
{
  $req_place = $un_box->select_nb_place($id_pension, $conn);
  $res_place = $req_place->fetch();
  $nb_place = $res_place['nb_pension'];

  $req_place_max = $une_pension->select_place_dispo_pension($id_pension, $conn);
  $res_place_max = $req_place_max->fetch();
  $place_max = $res_place_max['place_max'];

  $place_dispo = $place_max - $nb_place;

  if ($place_dispo != 0)
  {
    $un_box->ajout_cheval_favoris($id_pension, $id_cheval, $conn);

    header("location:../public/admin/ajout_pension.php?success=ajouter");
  }
  else
  {
    header("location:../public/admin/ajout_pension.php?erreur=pas_place");
  }
}
else
{
  header("location:../public/admin/ajout_pension.php?erreur=erreur");
}
}


if (isset($_POST['valider_detail']))
{
  $id_pension = $_POST['pension_detail'];
  header("location:../public/admin/ajout_pension.php?action=detail&id_pension=$id_pension");
}

if ($_GET['action'] == "supprimer")
{
  $id_box = $_GET['id'];
  $un_box->delete_box($id_box, $conn);
  
  header("location:../public/admin/ajout_pension.php?action=supprimer");
}

?>
