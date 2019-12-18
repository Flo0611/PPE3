<?php
ini_set("display_errors","on");

include'../all.class.php';
include'../inc/bdd.inc.php';
?>
<!DOCTYPE html>
<html>
<title>Centre équestre - Pension</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/style_pension.css">
<link rel="stylesheet" href="../css/bootstrap.css">
<body>
<?php include'../inc/nav_public.php'; ?>

<!-- /projects -->
<section class="projects py-5">
    <div class="container py-md-5">
      <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Nos chevaux</span> titrés</h3>
      <div class="row news-grids  text-center">
        <div class="row news-grids mt-md-5 mt-4 text-center">


          <?php
          $une_pension = new pension(" ", " ", " ", " ", " ", " ", " ");
          $req_pension = $une_pension->select_pension($conn);
          while($res_pension = $req_pension->fetch())
          {
            $id_pension = $res_pension['id_pension'];
            $lib_pension = $res_pension['lib_pension'];
            $place_max = $res_pension['place_max'];
            $photo = $res_pension['photo_pension'];
            $desc_pension = $res_pension['desc_pension'];
            $surface_pension = $res_pension['surface_pension'];
            $prix_pension = $res_pension['prix_pension'];
          ?>

            <div class="card col-md-3" style="margin-left:5%; margin-top:3%; margin-left:auto; margin-right:auto; padding-top:3%;">
              <img class="card-img-top" src="../images/<?php echo $photo ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $lib_pension ?></h5>
                <p class="card-text"><?php echo $desc_pension ?></p>
                <a href="#pension<?php echo $id_pension ?>" class="btn btn-secondary">En savoir plus</a>
              </div>
            </div>





        <!-- popup-->
        <div id="pension<?php echo $id_pension ?>" class="pop-overlay">
                      <?php
                      $un_box = new box(" ", " ", " ");
                      $une_pension = new pension(" ", " ", " ", " ", " ", " ", " ");
                      $req_place = $un_box->select_nb_place($id_pension, $conn);
                      $res_place = $req_place->fetch();
                      $nb_place = $res_place['nb_pension'];

                      $req_place_max = $une_pension->select_place_dispo_pension($id_pension, $conn);
                      $res_place_max = $req_place_max->fetch();
                      $place_max = $res_place_max['place_max'];

                      $place_dispo = $place_max - $nb_place;
                      ?>
                      <div class="popup">
                          <img src="../images/<?php echo $photo ?>" alt="Popup Image" class="img-fluid-pop-up-pension"  />
                          <div class="mt-4 <?php if (!empty($_SESSION['membre_connecter']) OR !empty($_SESSION['admin']) OR !empty($_SESSSION['super_admin'])){echo "desc-chevaux-popup-pension";}else{echo "desc-chevaux-popup-deco-pension";} ?>">
                            <h1 style="font-size:1.5em; margin-top:-75%; margin-left:20%;"><b><?php echo $lib_pension ?></b></h1><br>
                            <p>
                              <span class="label-pop-up">Prix : </span> <span class="text-popup"><b><?php echo $prix_pension ?></b></span><br>
                              <span class="label-pop-up">Surface : </span> <span class="text-popup"><b><?php echo $surface_pension ?></b></span><br>
                              <span class="label-pop-up">Places disponibles : </span> <span class="text-popup" style="margin-left:8%;"><b><?php echo $place_dispo ?>
                                <?php
                                if ($place_dispo != 0)
                                {
                                  echo "<img src='../images/point_vert.jpg'>";
                                }
                                else {
                                  echo "<img src='../images/point_rouge.jpg'>";
                                }
                                ?>
                             </b></span><br>
                              <span class="label-pop-up">Description : </span> <span class="text-popup"><b><?php echo $desc_pension ?></b></span><br>
                            </p>

                            <form action= "form_pension.php?pension=<?php echo $id_pension ?>" method="POST">
                              <button type="submit" class="btn btn-warning" style="margin-top:5%; margin-left:20%;"
                              <?php if (empty($_SESSION))
                              {
                                ?>
                                disabled
                                <?php
                              } ?>>Soumettre un formulaire</button>

                              <?php if (empty($_SESSION))
                              {
                                ?>
                                <p style="color:rgba(255,0,0,0.7); margin-left:20%;">Vous devez être connecté pour pouvoir<br> ajouter un cheval à la pension.</p>
                                <?php
                              } ?>

                            </form>

                          </div>
                          <a class="close" href="#gallery">&times;</a>
                      </div>


                      </div>
      <?php
      }
      ?>
      </div>
      </div>
      </div>
    </section>

<?php include'../inc/footer_public.php'; ?>

</body>
</html>
