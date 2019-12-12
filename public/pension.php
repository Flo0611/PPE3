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
<link rel="stylesheet" href="../css/bootstrap.css">
<body>
<?php include'../inc/nav_public.php'; ?>

  <section class="projects py-5" id="gallery">

          <h3 class="tittle-w3ls mb-5" style="text-align:center"><span class="pink">Notre</span> pensionnat</h3>
          <div class="row news-grids  text-center">
            <div class="row news-grids mt-md-5 mt-4 text-center py-md-5">
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
              <div class="col-md-4 mt-md-5 mt-4 gal-img " style="margin-left:2%; margin-bottom:5%; width:90%;">
                <div class="card" style="width: 18rem; float:left; margin-left:5%;">
                  <img class="card-img-top" src="../images/<?php echo $photo ?>" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $lib_pension ?></h5>
                    <p class="card-text"><?php echo $desc_pension ?></p>
                    <a href="#pension<?php echo $id_pension ?>" class="btn btn-secondary">En savoir plus</a>
                  </div>
                </div>
              </div>
              </div>
</section>



<!-- popup-->



  <div id="pension<?php echo $id_pension ?>" class="pop-overlay">

                <div class="popup">
                    <img src="../images/<?php echo $photo ?>" alt="Popup Image" class="img-fluid-pop-up"  />
                    <div class="mt-4 desc-chevaux-popup">
                      <h1 style="font-size:1.5em;"><b><?php echo $lib_pension ?></b></h1><br>
                      <p>
                        <span class="label-pop-up">Prix : </span> <span class="text-popup"><b><?php echo $prix_pension ?></b></span><br>
                        <span class="label-pop-up">Surface : </span> <span class="text-popup"><b><?php echo $surface_pension ?></b></span><br>
                        <span class="label-pop-up">Box disponible : </span> <span class="text-popup"><b></b></span><br>
                        <span class="label-pop-up">Description : </span> <span class="text-popup"><b><?php echo $desc_pension ?></b></span><br>
                      </p>

                      <!-- <form action="../traitement/ajout_favoris_chevaux.trait.php?id_cheval=<?php echo $id_cheval ?>" method="POST"> -->
                      <form action= "form_pension.php?pension=<?php echo $id_pension ?>" method="POST">
                        <button type="submit" class="btn btn-warning" style="margin-top:5%;"
                        <?php if (empty($_SESSION))
                        {
                          ?>
                          disabled
                          <?php
                        } ?>>Soumettre un formulaire</button>

                        <?php if (empty($_SESSION))
                        {
                          ?>
                          <p style="color:rgba(255,0,0,0.7)">Vous devez être connecté pour pouvoir<br> ajouter un cheval à la pension.</p>
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



<?php include'../inc/footer_public.php'; ?>

</body>
</html>
