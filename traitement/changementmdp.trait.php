<?php
include'../inc/bdd.inc.php';
include'../all.class.php';
ini_set("display_errors", "on");
$un_membre = new membre(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ");
$id_membre_recup = $_GET['id_membre'];
$mdp_recup = $_POST['mot_de_passe'];

$un_membre->changement_mdp_membre($mdp_recup, $id_membre_recup, $conn);

header("location:../public/connexion.php?success=mdp_changer");

?>
