<?php
ini_set("display_errors", "off");
session_start();
include'../inc/bdd.inc.php';
include'../all.class.php';
$id_membre = $_SESSION['id_membre'];
$un_membre = new membre(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ");
$un_cheval = new chevaux(" ", " ", " ", " ", " ", " ", " ", " ", " ");
$un_cheval_fav = new chevaux_fav(" ", " ");
$une_photo_cheval = new photo_cheval(" ", " ", " ");
$une_photo_profil = new photo_profil(" ", " ");
$une_images_membre = new images_membre(" ", " ", " ");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Centre équestre - Mon compte</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />


    <link rel="stylesheet" href="../css/info.css" type="text/css" media="all" />

    <script type="text/javascript" src="../function/info.js"></script>

</head>

<body>
  <?php include'../inc/nav_public.php'; ?>

  <?php
  $req_nom_prenom = $un_membre->select_nom_prenom($id_membre, $conn);
  $res_nom_prenom = $req_nom_prenom->fetch();
  $nom = $res_nom_prenom['nom_membre'];
  $prenom = $res_nom_prenom['prenom_membre'];
  $mail = $res_nom_prenom['email_membre'];

  $req_photo_membre = $un_membre->select_photo_membre($id_membre, $conn);
  $res_photo_membre = $req_photo_membre->fetch();
  $photo_membre = $res_photo_membre['photo_membre'];

  ?>

  <div class="pic"><img class="img_profil" src="../images/images-profil/<?php echo $photo_membre ?>"></div>
  <h1 class="titre_p_n"><?php echo $nom." ".$prenom; ?></h1>
  <div class="block" id="affiche_images" onclick="affiche_images_profil()">Modifier ma photo de profil <span class="fleche"> > </span></div>
  <a href="../index.php?mail=<?php echo $mail ?>"><div class="block">S'inscrire à la newsletter <span class="fleche"> > </span></div></a>
  <a href="modif_membre.php?id=<?php echo $id_membre ?>"><div class="block">Modifier mes données personnelles <span class="fleche"> > </span></div></a>
  <div class="block" id="modifier_mes_images" onclick="modifier_mes_images()">Modifier mes photos personnelles<span class="fleche"> > </span></div>

  <h2 class="titre_mes_chevaux">Mes chevaux favoris :</h2>
  <div class="imgs_fav">
    <div style="text-align:center">
      <?php
      $req_fav = $un_cheval_fav->select_by_id_membre($id_membre, $conn);
      while($res_fav = $req_fav->fetch())
      {
        $id_cheval = $res_fav['id_cheval'];
        $req_id_photo_che = $un_cheval->select_photo_cheval_by_id($id_cheval, $conn);
        $res_id_photo_che = $req_id_photo_che->fetch();
        $id_photo_che = $res_id_photo_che['photo_chevaux'];
        $req_photo_che = $une_photo_cheval->select_photo_cheval($id_photo_che, $conn);
        $res_photo_che = $req_photo_che->fetch();
        ?>
        <a href="chevaux.php#gal<?php echo $id_cheval ?>"><img src="../images/uploads-chevaux/<?php echo $res_photo_che['lib_photo']; ?>" class="img_che_fav" ></a>
        <?php
      }
      ?>
    </div>
  </div>

  <?php include'../inc/modifier_mes_images.php'; ?>

  <?php include'../inc/images_photo_profil.php'; ?>

  <?php include'../inc/footer_public.php'; ?>



</body>

</html>
