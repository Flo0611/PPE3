<?php
ini_set("display_errors", "on");
include'../inc/bdd.inc.php';
include'../all.class.php';

$un_jour = new jour(" ", " ");
$une_horaire = new horaires(" ", " ");
$un_cours = new cours(" ", " ", " ", " ", " ", " "," ");
$un_galop = new galop(" "," ");

if (!empty($_POST['titre_cours']) AND !empty($_POST['heure_debut_cours']) AND !empty($_POST['heure_fin_cours']) AND !empty($_POST['galop_cours']) AND !empty($_POST['jour_cours']))
{
  $titre_cours = $_POST['titre_cours'];
  $heure_debut = $_POST['heure_debut_cours'];
  $fin_cours = $_POST['heure_fin_cours'];
  $galop_cours = $_POST['galop_cours'];
  $jour_cours = $_POST['jour_cours'];

  $un_cours->ajouter_cours($titre_cours, $heure_debut, $fin_cours, $jour_cours, $galop_cours, $conn);
  header("location:../public/admin/gestion_cours.php?success=ajouter");
}
else
{
  header("location:../public/admin/gestion_cours.php?erreur=champs");
}

if ($_GET['action'] == "detail")
{
  $id_jour = $_POST['cours_detail'];
  header("location:../public/admin/gestion_cours.php?action=detail&id_jour=$id_jour");
}

if ($_GET['action'] == "supprimer")
{
  $id_cours = $_GET['id_cours'];
  $un_cours->supprimer_cours($id_cours, $conn);
  header("location:../public/admin/gestion_cours.php?action=supprimer");
}


?>
