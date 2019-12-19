<?php
ini_set("display_errors","off");
include'../all.class.php';
include'../inc/bdd.inc.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Galerie photo</title>

    <link href="../css/font-awesome.css" rel="stylesheet">

    <link href="../css/style_page_galerie.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/animate.css">

    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/style_gal.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
  <body>

    <?php include'../inc/nav_public.php'; ?>

    <?php
    $une_actu = new actu(" ", " ", " ", " ", " ", " ", " ");
    $une_image_actu = new images_actu(" ", " ", " ");
    ?>

    <div id="container">
      <h1><span class="pink">Notre</span> Galerie</h1>

      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque cursus a dui a hendrerit.
        In in eros metus. Aliquam dignissim faucibus orci eu congue. Pellentesque condimentum vitae nunc ac consequat.
        Quisque ligula metus, fringilla ac lorem sed, sodales iaculis lorem.
        Nam in metus egestas, facilisis diam laoreet, blandit ipsum. Etiam eget dapibus mi.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis egestas tincidunt neque, sed condimentum magna luctus at.
        Nunc congue iaculis fringilla. Praesent ac ligula in libero tempor tempor.
        Aliquam eu felis laoreet, maximus quam eu, suscipit massa. Vestibulum eget viverra tellus, ac rhoncus lorem.
        Fusce tincidunt dignissim libero, sed sagittis purus semper ut. Aenean ornare urna sed metus ultricies, ac egestas ex ultrices.
      </p>

      <?php
        $req_actu = $une_actu->select_all_actu($conn);
        while ($res_actu = $req_actu->fetch())
        {
          $id_actu = $res_actu['id_actu'];
          $nom_auteur = $res_actu['nom_actu'];
          $prenom_auteur = $res_actu['prenom_actu'];
          $text_actu = $res_actu['text_actu'];
          $date_actu = $res_actu['date_actu'];
          $titre_actu = $res_actu['titre_actu'];
          ?>

          <div class="w3-light-grey" style="width:80%; margin-left:auto; margin-right:auto;">
            <button onclick="myFunction('actu<?php echo $id_actu ?>')" class="w3-button w3-block">
              <?php echo $titre_actu." (".$date_actu.")" ?>
            </button>
            <div id="actu<?php echo $id_actu ?>" class="w3-hide" >
              <h3><?php echo $titre_actu ?></h3>
              <div style="padding:3%;"><?php echo $text_actu ?></div>
              <div id="colorlib-main">
                <section class="test">
                  <div class="photograhy">
                    <div class="row no-gutters">
              <?php
              $req_image = $une_image_actu->select_all_images_actu($id_actu, $conn);
              while ($res_image = $req_image->fetch())
              {
                $lib_photo = $res_image['lib_photo'];
                $chemin = "../images/uploads-actu/".$lib_photo;
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
            </div>
          </div>
          <?php
        }
      ?>

    </div> <!-- fin div container -->





<script>
function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>

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

<?php include'../inc/footer_public.php'; ?>
  </body>
</html>
