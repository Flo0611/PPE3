<?php
  ini_set("display_errors","off");
  session_start();
  include'../inc/bdd.inc.php';
  include'../all.class.php';
 ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Centre équestre</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />

    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />

    <link rel="stylesheet" href="../css/menu.css" type="text/css">
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="../css/font-awesome.css" rel="stylesheet">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script type="text/javascript" src="../js/etoile.js"></script>

    <script>
    function test(id_cheval)
    {
      var test = "gal" + id_cheval;
      test.document.getElementById("text_note").innerHTML ="Votre vote a bien été enregistrer " ;
    }
  </script>

</head>

<body>


  <?php include'../inc/nav_public.php'; ?>
  <section class="projects py-5" id="gallery">
      <div class="container py-md-5">
          <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Nos </span>chevaux</h3>
          <input type="text" name="chercher" placeholder="Chercher un cheval ou race" style="float:right; margin-top:-7%; margin-right:10%; border-radius:5px; width:200px; height:40px; padding:5px">
          <div class="row news-grids  text-center">

          <?php
          $un_cheval = new chevaux(" ", " ", " ", " ", " ", " ", " ", " ", " ");
          $une_photo = new photo_cheval(" ", " "," ");
          $une_race = new race_chevaux(" ", " ");
          $une_note = new note(" ", " ", " ", " ");

          $req = $un_cheval->select_by_id_chevaux($conn);
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


                <div class="col-md-4 mt-md-5 mt-4 gal-img">
                    <a href="#gal<?php echo $id_cheval ?>"><img src="../images/uploads-chevaux/<?php echo $photo['lib_photo'] ?>" alt="w3pvt" class="img-fluid-chevaux"></a>
                    <div class="gal-info">
                        <h5><?php echo $prenom." ".$nom; ?><span class="decription"><?php echo $race_cheval['lib_race_chevaux'] ?></span></h5>
                    </div>
                </div>





            <!-- popup-->
            <div id="gal<?php echo $id_cheval ?>" class="pop-overlay">
                <div class="popup">
                    <img src="../images/uploads-chevaux/<?php echo $photo['lib_photo'] ?>" alt="Popup Image" class="img-fluid-pop-up"  />
                    <?php
                      if (isset($_SESSION['membre_connecter']) OR isset($_SESSION['admin']) OR isset($_SESSSION['super_admin']))
                      {
                        $req_note = $une_note->moyenne_cheval($id_cheval, $conn);
                        $res_note = $req_note->fetch();
                        $moyenne = $res_note['moyenne'];
                        $moy = round($moyenne, 0);
                        ?>
                        <div id="note_chevaux">
                          <script>
                            var id = <?php echo $id_cheval ?>;
                          </script>
                          <?php
                            $id_membre = $_SESSION['id_membre'];
                            $req_verif = $une_note->verif_exist($id_cheval, $id_membre, $conn);
                            $res_verif = $req_verif->fetch();
                            $nb_verif = $res_verif['nb'];
                            if (!empty($nb_verif))
                            {
                              $req_nb_etoile = $une_note->select_nb_etoile($id_cheval, $id_membre, $conn);
                              $res_nb_etoile = $req_nb_etoile->fetch();
                              $nb_etoile = $res_nb_etoile['nb_etoile'];

                              ?>
                              <div>
                                <div type="button" id='<?php echo $id_cheval ?>'><script type='text/javascript'>CreateListeEtoile('<?php echo $id_cheval ?>',5);GestionHover('<?php echo $id_cheval ?>', <?php echo $nb_etoile ?>, 5);</script></div>
                              </div>
                              <input type="button" id="button-note" name="note<?php echo $id_cheval; ?>" value="Noter" onclick="envoiedonnee(<?php echo $id_cheval ?>); test(<?php echo $id_cheval ?>);">
                              <span id="text_note"></span>


                              <?php
                            }
                            else
                            {
                              ?>
                              <div>
                                <div type="button" id='<?php echo $id_cheval ?>'><script type='text/javascript'>CreateListeEtoile('<?php echo $id_cheval ?>',5);</script></div>
                              </div>
                              <input type="button" id="button-note" name="note<?php echo $id_cheval; ?>" value="Noter" onclick=" test()">

                            <?php
                          }
                          ?>
                      </div>
                        <?php
                      }
                      ?>

                    <div class="mt-4 <?php if (isset($_SESSION['membre_connecter']) OR isset($_SESSION['admin']) OR isset($_SESSSION['super_admin'])){echo "desc-chevaux-popup";}else{echo "desc-chevaux-popup-deco";} ?>">
                      <h1 style="font-size:1.5em; margin-left:28%;"><b><?php echo $prenom." ".$nom; ?></b></h1><br>
                      <p>
                        <span class="label-pop-up">Sexe : </span> <span class="text-popup"><b><?php echo $sexe ?></b></span><br>
                        <span class="label-pop-up">Race : </span> <span class="text-popup"><b><?php echo $race_cheval['lib_race_chevaux'] ?></b></span><br>
                        <span class="label-pop-up">Date de naissance : </span> <span class="text-popup"><b><?php echo $daten ?></b></span><br>
                        <span class="label-pop-up">Date d'arriver au centre : </span> <span class="text-popup"><b><?php echo $datea ?></b></span><br>
                      </p>



                      <form action="../traitement/ajout_favoris_chevaux.trait.php?id_cheval=<?php echo $id_cheval ?>" method="POST">
                        <button type="submit" class="btn btn-warning" style="margin-top:5%; margin-left:20%;"
                        <?php if (empty($_SESSION))
                        {
                        	?>
                          disabled
                          <?php
                        } ?>>Ajouter aux favoris</button>

                        <?php if (empty($_SESSION))
                        {
                          ?>
                          <p style="color:rgba(255,0,0,0.7); margin-left:20%;">Vous devez être connecté pour pouvoir<br> ajouter un cheval en favoris.</p>
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
                            <span class="label-pop-up">Sexe : </span> <span class="text-popup">
                              <select class="float select" name="sexe_modif">
                                <option value="<?php echo $sexe ?>" selected><?php echo $sexe ?></option>
                                <option value="mâle">Mâle</option>
                                <option value="femelle">Femelle</option>
                            </select></span><br>


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

<?php include'../inc/footer_public.php'; ?>
</body>
</html>
