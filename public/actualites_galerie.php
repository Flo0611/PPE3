<?php
    include'../inc/bdd.inc.php';
    include'../all.class.php';
    $id_actu = $_GET['id'];
    $une_actu = new actu(" ", " ", " ", " ", " ", " ", " ");
    $req = $une_actu->select_actu_by_id($id_actu, $conn);
    $res = $req->fetch();
    $id_membre = $res['id_membre'];
    $nom_auteur = $res['nom_actu'];
    $prenom_auteur = $res['prenom_actu'];
    $text_actu = $res['text_actu'];
    $date_actu = $res['date_actu'];
    $titre_actu = $res['titre_actu'];

    $un_membre = new membre(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ");
    $req_photo = $un_membre->select_photo_membre($id_membre, $conn);
    $res_photo = $req_photo->fetch();
    $lib_photo_membre = $res_photo['photo_membre'];

    $une_image_actu = new images_actu(" ", " ", " ");
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Galerie image</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style_galerie.css" type="text/css" media="all" />


</head>

<body>
  <?php include'../inc/nav_public.php'; ?>

  <div id="container" style="margin-left:auto; margin-right:auto; margin-top:5%">
    <img src="../images/images-profil/<?php echo $lib_photo_membre ?>" id="img_profil">
    <h1><?php echo $titre_actu ?></h1>
    <h2>Écrit par <?php echo $prenom_auteur." ".$nom_auteur." le ".$date_actu ?></h2><br>
    <p><?php echo $text_actu ?></p>

    <?php
    $req_images = $une_image_actu->select_all_images_actu($id_actu, $conn);
    while ($res_images = $req_images->fetch())
    {
      ?>
      <a href="../images/uploads-actu/<?php echo $res_images['lib_photo'] ?>"><img src="../images/uploads-actu/<?php echo $res_images['lib_photo'] ?>" class="img-thumbnail rounded" alt="..." style="width:150px;height:140px; margin-right:2%; margin-bottom:5%;"></a>
      <?php
    }

    ?>

  </div>

  <?php include'../inc/footer_public.php'; ?>

</body>

</html>
