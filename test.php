  <section class="projects py-5" id="gallery">
      <div class="container py-md-5">
        <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Nos chevaux</span> titrés</h3>
        <input type="text" name="chercher" placeholder="Chercher un cheval ou race" style="float:right; margin-top:-7%; margin-right:10%; border-radius:5px; width:200px; height:40px; padding:5px">
        <div class="row news-grids  text-center">
          <div class="row news-grids mt-md-5 mt-4 text-center">


        <?php
        $un_cheval = new chevaux(" ", " ", " ", " ", " ", " ", " ", " ");
        $une_photo = new photo_cheval(" ", " "," ");
        $une_race = new race_chevaux(" ", " ");

        $req = $un_cheval->select_by_id_limit3_chevaux($conn);
        while ($res = $req->fetch())
        {
          $id_cheval = $res['id_chevaux'];
          $nom = $res['nom_chevaux'];
          $prenom = $res['prenom_chevaux'];
          $sexe = $res['sexe_chevaux'];
          $race = $res['race_chevaux'];
          $daten = $res['daten_chevaux'];
          $datea = $res['datea_chevaux'];
          $id_photo = $res['photo_chevaux'];

          $req_photo = $une_photo->select_photo_cheval($id_photo, $conn);
          $photo = $req_photo->fetch();

          $req_race = $une_race->select_lib_race_chevaux($race, $conn);
          $race_cheval = $req_race->fetch();

          ?>


          <div class="col-md-4 gal-img">
              <a href="#gal<?php echo $id_cheval ?>"><img src="../images/uploads-chevaux/<?php echo $photo['lib_photo'] ?>"  alt="w3pvt" class="img-fluid"></a>
              <div class="gal-info">
                  <h5><?php echo $nom." ".$prenom ?><span class="decription"><?php echo $race?></span></h5>
              </div>
          </div>





          <!-- popup-->
          <div id="gal<?php echo $id_cheval ?>" class="pop-overlay">
              <div class="popup">
                  <img src="../images/uploads-chevaux/<?php echo $photo['lib_photo'] ?>" alt="Popup Image" class="img-fluid-pop-up"  />
                  <div class="mt-4 desc-chevaux-popup">
                    <h1 style="font-size:1.5em;"><b><?php echo $prenom." ".$nom; ?></b></h1><br>
                    <p>
                      <span class="label-pop-up">Sexe : </span> <span class="text-popup"><b><?php echo $sexe ?></b></span><br>
                      <span class="label-pop-up">Race : </span> <span class="text-popup"><b><?php echo $race_cheval['lib_race_chevaux'] ?></b></span><br>
                      <span class="label-pop-up">Date de naissance : </span> <span class="text-popup"><b><?php echo $daten ?></b></span><br>
                      <span class="label-pop-up">Date d'arriver au centre : </span> <span class="text-popup"><b><?php echo $datea ?></b></span><br>
                    </p>

                    <form action="../traitement/ajout_favoris_chevaux.trait.php?id_cheval=<?php echo $id_cheval ?>" method="POST">
                      <button type="submit" class="btn btn-warning" style="margin-top:5%;"
                      <?php if (empty($_SESSION))
                      {
                        ?>
                        disabled
                        <?php
                      } ?>>Ajouter aux favoris</button>

                      <?php if (empty($_SESSION))
                      {
                        ?>
                        <p style="color:rgba(255,0,0,0.7)">Vous devez être connecté pour pouvoir<br> ajouter un cheval en favoris.</p>
                        <?php
                      } ?>

                    </form>

                  </div>
                  <a class="close" href="#gallery">&times;</a>
                  <?php if (isset($_SESSION['admin']) OR isset($_SESSION['super_admin']))
                  {
                    ?>
                  <a class="modif" href="#galmodif<?php echo $id_cheval ?>"><i class="fas fa-edit"></i></a>
                  <?php
                } ?>
              </div>


              </div>

              <!-- popup modif-->
              <div id="galmodif<?php echo $id_cheval ?>" class="pop-overlay">
                <form action="../traitement/modif_chevaux.trait.php?id_cheval=<?php echo $id_cheval ?>" method="POST">
                  <div class="popup">
                      <img src="../images/uploads-chevaux/<?php echo $photo['lib_photo'] ?>" alt="Popup Image" class="img-fluid-pop-up"  />
                      <div class="mt-4 desc-chevaux-popup">
                        <h1 style="font-size:1.5em;"><b><input style="margin-right:2%;" type="text" name="prenom_modif" value="<?php echo $prenom?>"><input type="text" name="nom_modif" value="<?php echo $nom?>"></b></h1><br>
                        <p>
                          <span class="label-pop-up">Sexe : </span> <span class="text-popup"><input type="text" name="sexe_modif" value="<?php echo $sexe ?>"></span><br>
                          <span class="label-pop-up">Race : </span> <span class="text-popup">
                            <select class="float select" name="race_modif">
                            <option value="<?php echo $race; ?>"><?php echo $race_cheval['lib_race_chevaux']; ?></option>
                            <?php
                             $req_select = $une_race->select_race_chevaux($conn);
                             while($res = $req_select->fetch())
                             {
                               $id_race = $res['id_race_chevaux'];
                               $lib_race = $res['lib_race_chevaux'];
                               ?>
                               <option value="<?php echo $id_race ?>"><?php echo $lib_race ?></option>
                               <?php
                             }
                            ?>
                          </select></span><br>
                          <span class="label-pop-up">Date de naissance : </span> <span class="text-popup"><input type="text" name="daten_modif" value="<?php echo $daten ?>"></span><br>
                          <span class="label-pop-up">Date d'arriver au centre : </span> <span class="text-popup"><input type="text" name="datea_modif" value="<?php echo $datea ?>"></span><br>
                        </p>


                          <button type="submit" class="btn btn-success" style="margin-top:5%;"
                          <?php if (empty($_SESSION))
                          {
                            ?>
                            disabled
                            <?php
                          } ?>>Valider</button>

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
        }
        ?>
</div>

</section>
