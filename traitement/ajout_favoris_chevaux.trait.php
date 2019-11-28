<?php
ini_set("display_errors","on");
session_start();
include'../inc/bdd.inc.php';
include'../all.class.php';

$un_cheval_favoris = new chevaux_fav(" ", " ");

$id_cheval = $_GET['id_cheval'];

$id_membre = $_SESSION['id_membre'];

echo "id cheval : ".$id_cheval." <br> id membre = ".$id_membre;

$un_cheval_favoris->ajout_cheval_favoris($id_membre, $id_cheval, $conn);

header("location:../public/chevaux.php");
?>
