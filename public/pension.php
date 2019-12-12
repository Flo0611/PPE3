<!DOCTYPE html>
<html>
<title>Centre équestre - Pension</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/.css">
<body>
<?php include'../inc/nav_public.php';
      include'../inc/bdd.inc.php';
      include'../all.class.php';
      ?>



  <section class="projects py-5" id="gallery">

          <h3 class="tittle-w3ls mb-5" style="text-align:center"><span class="pink">Notre</span> pensionnat</h3>
          <div class="row news-grids  text-center">
            <div class="row news-grids mt-md-5 mt-4 text-center">
            <p style="margin:5%; text-align:center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
  Mauris at sagittis elit, vitae maximus nibh. Proin maximus varius augue, malesuada suscipit risus accumsan sit amet.
  Cras sit amet feugiat neque. Proin lacus lorem, maximus eu suscipit vitae, aliquet sit amet tellus.
  Phasellus consequat id urna sed mattis. Maecenas id vehicula sapien.
  Integer ac ligula imperdiet, molestie justo ut, tristique leo. Quisque ultrices elementum arcu ut eleifend.</p><br>
<!-- popup-->
<?php
          for($i=1;$i<5;$i++)
          {
          $sql = "SELECT placemax FROM pension
          WHERE idpen = $i";

          $req = $conn->query($sql);
          while ($res = $req->fetch())
          {
            $place[$i] = $res['placemax'];
          }


          $sql = "SELECT COUNT(*) as nb FROM chevaux
          WHERE type_pension_che = $i";

          $req = $conn->query($sql);
          while ($res = $req->fetch())
          {
            $occ[$i] = $res['nb'];
          }

          $libre[$i] = $place[$i] - $occ[$i];
        }

            ?>
  <div id="pen1" class="pop-overlay">
            
                <div class="popup">
                    <img src="../images/z3.jpg" alt="Popup Image" class="img-fluid-pop-up"  />
                    <div class="mt-4 desc-chevaux-popup">
                      <h1 style="font-size:1.5em;"><b>Box internes</b></h1><br>
                      <p>
                        <span class="label-pop-up">Prix : </span> <span class="text-popup"><b>30€</b></span><br>
                        <span class="label-pop-up">Surface : </span> <span class="text-popup"><b>12m²</b></span><br>
                        <span class="label-pop-up">Box disponible : </span> <span class="text-popup"><b><?php echo $libre[1] ?></b></span><br>
                        <span class="label-pop-up">Description : </span> <span class="text-popup"><b>Box comfortable</b></span><br>
                      </p>
                      <?php
                      $pension = 1;
                      ?>

                      <!-- <form action="../traitement/ajout_favoris_chevaux.trait.php?id_cheval=<?php echo $id_cheval ?>" method="POST"> -->
                      <form action= "form_pension.php" method="POST">
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
                <div id="pen2" class="pop-overlay">
                <div class="popup">
                    <img src="../images/z3.jpg" alt="Popup Image" class="img-fluid-pop-up"  />
                    <div class="mt-4 desc-chevaux-popup">
                      <h1 style="font-size:1.5em;"><b>Box externes</b></h1><br>
                      <p>
                        <span class="label-pop-up">Prix : </span> <span class="text-popup"><b>30€</b></span><br>
                        <span class="label-pop-up">Surface : </span> <span class="text-popup"><b>12m²</b></span><br>
                        <span class="label-pop-up">Box disponible : </span> <span class="text-popup"><b><?php echo $libre[2] ?></b></span><br>
                        <span class="label-pop-up">Description : </span> <span class="text-popup"><b>Box comfortable</b></span><br>
                      </p>
                      <?php
                      $pension = 2;
                      ?>
                      <form action= "form_pension.php" method="POST">
                      <!-- <form action="../traitement/ajout_favoris_chevaux.trait.php?id_cheval=<?php echo $id_cheval ?>" method="POST"> -->
                        <button type="submit" class="btn btn-warning" style="margin-top:5%;"
                        <?php if (empty($_SESSION))
                        {
                          ?>
                          
                          <?php
                        } ?>>Soumettre un formulaire</button>

                        <?php if (empty($_SESSION))
                        {
                          ?>
                          <p style="color:rgba(255,0,0,0.7)">Vous devez être connecté pour pouvoir<br> ajouter un cheval en favoris.</p>
                          <?php
                        } ?>

                      </form>

                    </div>
                    <a class="close" href="#gallery">&times;</a>
                </div>


                </div>
                <div id="pen3" class="pop-overlay">
                <div class="popup">
                    <img src="../images/z3.jpg" alt="Popup Image" class="img-fluid-pop-up"  />
                    <div class="mt-4 desc-chevaux-popup">
                      <h1 style="font-size:1.5em;"><b>Pré</b></h1><br>
                      <p>
                        <span class="label-pop-up">Prix : </span> <span class="text-popup"><b>30€</b></span><br>
                        <span class="label-pop-up">Surface : </span> <span class="text-popup"><b>100m²</b></span><br>
                        <span class="label-pop-up">Place disponible : </span> <span class="text-popup"><b><?php echo $libre[3] ?></b></span><br>
                        <span class="label-pop-up">Description : </span> <span class="text-popup"><b>Grand pré</b></span><br>
                      </p>
                      <?php
                      $pension = 3;
                      ?>
                      <form action= "form_pension.php" method="POST">
                      <!-- <form action="../traitement/ajout_favoris_chevaux.trait.php?id_cheval=<?php echo $id_cheval ?>" method="POST"> -->
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
                          <p style="color:rgba(255,0,0,0.7)">Vous devez être connecté pour pouvoir<br> ajouter un cheval en favoris.</p>
                          <?php
                        } ?>

                      </form>

                    </div>
                    <a class="close" href="#gallery">&times;</a>
                </div>


                </div>
                <div id="pen4" class="pop-overlay">
                <div class="popup">
                    <img src="../images/z3.jpg" alt="Popup Image" class="img-fluid-pop-up"  />
                    <div class="mt-4 desc-chevaux-popup">
                      <h1 style="font-size:1.5em;"><b>Paddock</b></h1><br>
                      <p>
                        <span class="label-pop-up">Prix : </span> <span class="text-popup"><b>30€</b></span><br>
                        <span class="label-pop-up">Surface : </span> <span class="text-popup"><b>100m²</b></span><br>
                        <span class="label-pop-up">Place disponible : </span> <span class="text-popup"><b><?php echo $libre[4] ?></b></span><br>
                        <span class="label-pop-up">Description : </span> <span class="text-popup"><b>Grand pré</b></span><br>
                      </p>
                      <?php
                      $pension = 4;
                      ?>
                      <form action= "form_pension.php" method="POST">
                      <!-- <form action="../traitement/ajout_favoris_chevaux.trait.php?id_cheval=<?php echo $id_cheval ?>" method="POST"> -->
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
                          <p style="color:rgba(255,0,0,0.7)">Vous devez être connecté pour pouvoir<br> ajouter un cheval en favoris.</p>
                          <?php
                        } ?>

                      </form>

                    </div>
                    <a class="close" href="#gallery">&times;</a>
                </div>


                </div>
            <?php

          ?>
  </div>
  </section>
  </div>
<div class="card-group" style="margin-left:2%; margin-bottom:5%; width:90%;">
  <div class="card" style="width: 18rem; float:left; margin-left:5%;">
    <img class="card-img-top" src="../images/z3.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Box internes</h5>
      <p class="card-text">Notre centre équestre peut mettre à votre disposition un pensionnat.</p>
      <a href="#pen1" class="btn btn-secondary">En savoir plus</a>
    </div>
  </div>

  <div class="card" style="width: 18rem; margin-left:5%;">
    <img class="card-img-top" src="../images/z3.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Box externes</h5>
      <p class="card-text">Notre centre équestre peut mettre à votre disposition un pensionnat.</p>
      <a href="#pen2" class="btn btn-secondary">En savoir plus</a>
    </div>
  </div>



  <div class="card" style="width: 18rem; margin-left:5%;">
    <img class="card-img-top" src="../images/z3.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Pré</h5>
      <p class="card-text">Notre centre équestre peut mettre à votre disposition un pensionnat.</p>
      <a href="#pen3" class="btn btn-secondary">En savoir plus</a>
    </div>
  </div>



  <div class="card" style="width: 18rem; margin-left:5%;">
    <img class="card-img-top" src="../images/z3.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Paddock</h5>
      <p class="card-text">Notre centre équestre peut mettre à votre disposition un pensionnat.</p>
      <a href="#pen4" class="btn btn-secondary">En savoir plus</a>
    </div>
  </div>
</div>



<?php include'../inc/footer_public.php'; ?>

</body>
</html>
