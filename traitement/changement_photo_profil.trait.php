<?php
ini_set("display_errors", "on");
include'../inc/bdd.inc.php';
include'../all.class.php';

$id_photo = $_GET['id_photo'];
$type = $_GET['photo'];

$une_photo_profil = new photo_profil(" ", " ");
$un_membre = new membre(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ");
$une_images_membre = new images_membre(" ", " ", " ");

if ($type == "avatar")
{
  $id_membre = $_GET['id_membre'];
  $req_photo_profil = $une_photo_profil->select_photo_profil($id_photo, $conn);
  $res_photo_profil = $req_photo_profil->fetch();
  $lib_photo = $res_photo_profil['lib_images_profil'];

  $un_membre->changement_photo_profil($id_membre, $lib_photo, $conn);
}

if ($type == "perso")
{
  $id_membre = $_GET['id_membre'];
  $req = $une_images_membre->select_images_membre($id_photo, $conn);
  $res = $req->fetch();
  $lib_photo = $res['lib_images_membre'];

  $un_membre->changement_photo_profil($id_membre, $lib_photo, $conn);
}

if ($type == "suppression")
{
  $une_images_membre->suppression_images_membre($id_photo, $conn);
}


header("location:../public/info.php");

?>
