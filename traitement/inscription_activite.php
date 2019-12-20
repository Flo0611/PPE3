<?php
ini_set("display_errors","on");
include'../inc/bdd.inc.php';
require_once'../all.class.php';
$une_inscription_activite = new inscription_activite(" ", " ", " ", " ");
session_start();



if(isset($_POST['envoyer']))
{
  $id_membre = $_SESSION['id_membre'];
  $id_activite = $_GET['activite'];
    if($id_activite == 1)
    {
        $id_balade = $_GET['balade'];

        $req = $une_inscription_activite->verif_existe_activite($id_membre, $id_activite, $id_balade, $conn);
        $res = $req->fetch();

        $nb = $res['nb'];
        $id_inscription_act = $res['id_inscription_act'];
        $id_membre_req = $res['id_membre'];
        $id_balade_req = $res['id_spe'];
        $id_activite_req = $res['id_acti'];
        if (!isset($nb))
        {
          $une_inscription_activite->ajouter_inscription_act($id_membre, $id_activite, $id_balade, $conn);
          header("location:../public/balades.php?success=inscris");
        }
        else
        {
          header("location:../public/balades.php?erreur=deja_inscris");
        }


    }
    else
    {
      $id_stage = $_GET['stage'];

      $req = $une_inscription_activite->verif_existe_activite($id_membre, $id_activite, $id_stage, $conn);
      $res = $req->fetch();

      $nb = $res['nb'];
      $id_inscription_act = $res['id_inscription_act'];
      $id_membre_req = $res['id_membre'];
      $id_stage_req = $res['id_spe'];
      $id_activite_req = $res['id_acti'];

      if (!isset($nb))
      {
        $une_inscription_activite->ajouter_inscription_act($id_membre, $id_activite, $id_stage, $conn);

        header("location:../public/stage.php?success=inscris");
      }
      else
      {
        header("location:../public/stage.php?erreur=deja_inscris");
      }
    }

}


if (isset($_GET['action']) == "desinscription")
{
  echo "etape 1";
  if (isset($_POST['desinscription_balade']))
  {
    echo "etape 2";
    $id_membre = $_SESSION['id_membre'];
    $id_balade = $_GET['balade'];
    $id_activite = $_GET['activite'];

    $une_inscription_activite->supprimer_insc_act($id_membre, $id_balade, $id_activite, $conn);
    header("location:../public/balades.php?success=desinscris");
  }

  if (isset($_POST['desinscription_stage']))
  {
    echo "etape 2";
    $id_membre = $_SESSION['id_membre'];
    $id_balade = $_GET['stage'];
    $id_activite = $_GET['activite'];

    $une_inscription_activite->supprimer_insc_act($id_membre, $id_balade, $id_activite, $conn);
    header("location:../public/stage.php?success=desinscris");
  }
}

?>
