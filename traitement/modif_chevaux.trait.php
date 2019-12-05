<?php
include'../inc/bdd.inc.php';
include'../all.class.php';

$un_cheval = new chevaux(" ", " ", " ", " ", " ", " ", " ", " ", " ");

$id_cheval = $_GET['id_cheval'];
$nom = $_POST['nom_modif'];
$prenom = $_POST['prenom_modif'];
$race = $_POST['race_modif'];
$sexe = $_POST['sexe_modif'];
$daten = $_POST['daten_modif'];
$datea = $_POST['datea_modif'];

$un_cheval->modifier_cheval($id_cheval, $nom, $prenom, $sexe, $race, $daten, $datea, $conn);

header("location:../public/chevaux.php");

?>
