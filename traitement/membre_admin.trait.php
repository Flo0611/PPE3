<?php
include'../all.class.php';
include'../inc/bdd.inc.php';
$un_membre = new membre(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ");
$id_membre = $_GET['id'];

if ($_GET['action'] == "modifier")
{
  header("location:../public/modif_membre.php?id=$id_membre");
}

if ($_GET['action'] == "supprimer")
{
  $id_membre = $_GET['id'];
  $un_membre->suppression_membre($id_membre, $conn);
  header("location:../public/admin/membres_admin.php?succes=supr");
}

if ($_GET['action'] == "modif_membre")
{
  $id_membre = $_GET['id'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $tel = $_POST['telephone'];
  $adresse_mail = $_POST['mail'];
  $adresse = $_POST['rue'];
  $complement = $_POST['complement'];
  $date_naiss = $_POST['daten'];
  $num_rue_membre = $_POST['num_rue'];
  $code_p_membre = $_POST['code_postal'];

  $un_membre->modif_membre($id_membre, $nom, $prenom, $adresse_mail, $tel, $adresse, $complement, $date_naiss, $code_p_membre, $num_rue_membre, $conn);
  header("location:../index.php?action=modif_membre");
}
?>
