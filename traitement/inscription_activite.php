<?php
ini_set("display_errors","on");
include'../inc/bdd.inc.php';
require_once'../all.class.php';
session_start();


$id_membre = $_SESSION['id_membre'];
$id_activite = $_GET['activite'];
if(isset($_POST['envoyer'])){
    if($id_activite = 1)
    {
        $id_balade = $_GET['balade'];
        $sql = "INSERT INTO inscription_activite (id_membre, id_acti, id_spe) VALUES('$id_membre', '$id_activite', '$id_balade' )";
        $req = $conn->query($sql);
        header("location:../index.php");
    }
    else
    {

    }
    
}
else
{
  header("location:../index.php");
}
?>