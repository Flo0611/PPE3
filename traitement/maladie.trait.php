<?php
  include'../inc/bdd.inc.php';
  include'../all.class.php';
  $une_maladie = new maladie(" ", " ");

  $lib_maladie = $_POST['lib_maladie'];
  echo $lib_maladie;

  if (isset($_POST['valider']))
  {
    if (!empty($_POST['lib_maladie']))
    {
      $une_maladie->ajout_maladie($lib_maladie, $conn);

      header("location:../public/vierge.php?success=ajout");
    }
    else
    {
      header("location:../public/vierge.php?erreur=champs");
    }
  }

  if ($_GET['action'] == "supprimer")
  {
    $id_maladie = $_GET['id'];
    $une_maladie->suppression_maladie($id_maladie, $conn);
    header("location:../public/vierge.php?success=suppression");
  }

  if ($_GET['action'] == "modifier")
  {
    $id_maladie = $_GET['id'];
    header("location:../public/vierge.php?action=modification&id=$id_maladie");
  }

  if (isset($_POST['modifier']))
  {
    $id_maladie = $_POST['id_maladie'];
    $lib_maladie = $_POST['lib_maladie'];
    $une_maladie->modifier_maladie($id_maladie, $lib_maladie, $conn);

    header("location:../public/vierge.php?success=modification");
  }
?>
