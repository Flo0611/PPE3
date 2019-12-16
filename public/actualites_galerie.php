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

    <link rel="stylesheet" href="../css/animate.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/style_gal.css">

</head>

<body>
  <?php include'../inc/nav_public.php'; ?>

  <div id="container" style="margin-left:auto; margin-right:auto; margin-top:5%;margin-bottom:5%;">
    <img src="../images/images-profil/<?php echo $lib_photo_membre ?>" id="img_profil">
    <h1><?php echo $titre_actu ?></h1>
    <h2>Écrit par <?php echo $prenom_auteur." ".$nom_auteur." le ".$date_actu ?></h2><br>
    <p><?php echo $text_actu ?></p>

    <div id="colorlib-main">
      <section class="test">
        <div class="photograhy">
          <div class="row no-gutters">
    <?php
    $req_images = $une_image_actu->select_all_images_actu($id_actu, $conn);
    while ($res_images = $req_images->fetch())
    {
      $chemin = "../images/uploads-actu/".$res_images['lib_photo'];
      ?>
        <div class="col-md-4 ftco-animate">
					<a href="<?php echo $chemin ?>" class="photography-entry img image-popup d-flex justify-content-center align-items-center" style="background-image: url(<?php echo $chemin ?>);">
						<div class="overlay"></div>
					</a>
				</div>
      <?php
    }

    ?>

  </div>
</div>
</section>
</div>
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  </div>

  <?php include'../inc/footer_public.php'; ?>

  <script src="../js/jquery1.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="../js/main.js"></script>

</body>

</html>
