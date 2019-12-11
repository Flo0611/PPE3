<?php
ini_set("display_errors","on");
session_start();
include'../all.class.php';
include'../inc/bdd.inc.php';

$une_note = new note(" ", " ", " ", " ");

$id_membre = $_SESSION['id_membre'];
$nb_etoile = $_POST['nbetoile'];
$id_cheval = $_POST['id_cheval'];
echo $nb_etoile;

$req = $une_note->verif_exist($id_cheval, $id_membre, $conn);
$res = $req->fetch();
$id_note = $res['id_note'];
if ($res['nb'] == 0)
{
  $une_note->ajouter_note($id_cheval, $id_membre, $nb_etoile, $conn);
}
else
{
  $une_note->modifier_note($id_note, $nb_etoile, $conn);
}

?>
