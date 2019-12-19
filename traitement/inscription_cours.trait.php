<?php
ini_set("display_errors", "on");
include'../inc/bdd.inc.php';
include'../all.class.php';
$une_inscription_cours = new inscription_cours(" ", " ", " ");
if ($_GET['action'] == "ajouter")
{
  $id_cours = $_GET['id_cours'];
  $id_membre = $_GET['id_membre'];

  $req = $une_inscription_cours->verif_existe_cours($id_membre, $id_cours, $conn);
  $res = $req->fetch();
  $nb = $res['nb'];
  if ($nb == 0)
  {
    $une_inscription_cours->ajout_inscription_cours($id_cours, $id_membre, $conn);

    header("location:../public/cours.php?success=ajouter");
  }
  else
  {
    header("location:../public/cours.php?erreur=existe");
  }

}

if ($_GET['action'] == "supprimer")
{
  $id_insc_cours = $_GET['id_insc_cours'];
  $une_inscription_cours->supprimer_membre($id_insc_cours, $conn);
  header("location:../public/admin/afficher_membre_cours.php?success=supprimer");
}

if ($_GET['action'] == "annuler")
{
  $id_insc_cours = $_GET['id_insc_cours'];

  $une_inscription_cours->supprimer_membre($id_insc_cours, $conn);
  header("location:../public/cours.php?success=supprimer");
}

?>
