<?php
ini_set("display_errors","off");
session_start();
include'inc/bdd.inc.php';
include'all.class.php';
 ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Centre équestre - Accueil</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Infinitude Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>

        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />

    <link rel="stylesheet" href="css/menu.css" type="text/css">
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


</head>

<body>

      <?php
      include'inc/nav_index.php';
      ?>

        <!-- banner slider -->
        <div id="homepage-slider" class="st-slider">
            <input type="radio" class="cs_anchor radio" name="slider" id="play1" checked="" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide1" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide2" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide3" />
            <div class="images">
                <div class="images-inner">
                    <div class="image-slide">
                        <div class="banner-w3pvt-1">
                            <div class="overlay-w3ls">

                            </div>

                        </div>
                    </div>
                    <div class="image-slide">
                        <div class="banner-w3pvt-2">
                            <div class="overlay-w3ls">

                            </div>
                        </div>
                    </div>
                    <div class="image-slide">
                        <div class="banner-w3pvt-3">
                            <div class="overlay-w3ls">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="labels">
                <div class="fake-radio" style="z-index:0;">
                    <label for="slide1" class="radio-btn"></label>
                    <label for="slide2" class="radio-btn"></label>
                    <label for="slide3" class="radio-btn"></label>
                </div>
            </div>
            <!-- banner-hny-info -->
            <div class="banner-hny-info" style="margin-top:12%;">
                <h3>Brive Centre équestre</h3>
                <div class="top-buttons mx-auto text-center mt-md-5 mt-3">
                    <a href="public/presentation.php" class="btn more mr-2">En savoir plus</a>
                    <a href="public/contact.php" class="btn">Contactez-nous</a>
                </div>
                <div class="d-flex hny-stats-inf">
                    <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                        <div class="d-md-flex justify-content-center">
                            <h5 class="counter">14</h5>
                            <p class="para-w3pvt">Hectares</p>
                        </div>
                    </div>
                    <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                        <div class="d-md-flex justify-content-center">
                            <h5 class="counter">23</h5>
                            <p class="para-w3pvt">Membres staff</p>
                        </div>
                    </div>
                    <div class="col-md-4 stats_w3pvt_counter_grid mt-3">
                        <div class="d-md-flex justify-content-center">
                            <h5 class="counter">550</h5>
                            <p class="para-w3pvt">Membres</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- //banner-hny-info -->
        </div>
        <!-- //banner slider -->
    </div>
    <!-- //banner -->

    <!-- //home -->

    <!-- about -->

    <section class="about py-5">
      <?php
      if ($_GET['success'] == "inscription")
      {
        ?>
        <div class="alert alert-success" role="alert" style="margin-top:-52%; margin-bottom: 48%; width:30%; left:65%;">
          Merci de votre inscription ! Vous pouvez désormais vous connecter dans l'espace connexion.
        </div>
        <?php
      }

      if ($_GET['success'] == "form_envoyer")
      {
        ?>
        <div class="alert alert-success" role="alert" style="margin-top:-52%; margin-bottom: 48%; width:30%; left:65%;">
          Votre formulaire a été transmis a notre équipe. Nous vous informerons de la réponse par mail.
        </div>
        <?php
      }

      if ($_GET['success'] == "deconnexion")
      {
        ?>
        <div class="alert alert-success" role="alert" style="margin-top:-52%; margin-bottom: 48%; width:30%; left:65%;">
          Vous êtes bien déconnecté ! Merci de votre visite, à  bientôt !
        </div>
        <?php
      }

      if ($_GET['success'] == "connecter")
      {
        ?>
        <div class="alert alert-success" role="alert" style="margin-top:-52%; margin-bottom: 48%; width:20%; left:70%;">
          Vous êtes désormais connecté !
        </div>
        <?php
      }

      if ($_GET['action'] == "modif_membre")
      {
        ?>
        <div class="alert alert-success" role="alert" style="margin-top:-52%; margin-bottom: 48%; width:20%; left:70%;">
          Vos informations ont bien été modifiés.
        </div>
        <?php
      }

      if ($_GET['news'] == "mail_existe")
      {
        ?>
        <div class="alert alert-danger" role="alert" style="margin-top:-52%; margin-bottom: 48%; width:30%; left:65%;">
          L'adresse mail rentrée existe déjà, veuillez entrer une autre adresse mail.
        </div>
        <?php
      }

      if ($_GET['news'] == "inscrit")
      {
        ?>
        <div class="alert alert-success" role="alert" style="margin-top:-52%; margin-bottom: 48%; width:30%; left:65%;">
          Merci de votre inscription, vous recevrez dès a présent toute l'actualité par mail.
        </div>
        <?php
      }

      ?>
      <div class="logopers">

        <a href= "https://www.instagram.com/centreequestrecebg/"target="_blank"><img src="https://img.icons8.com/color/60/000000/instagram-new.png"></a>
        <a href= "https://www.facebook.com/centreequestre.cebg.9"target="_blank"><img src="https://img.icons8.com/color/60/000000/facebook.png"></a>
      </div>


      <!-- about -->
      <section class="about py-5">
          <div class="container p-md-5">            
              <div class="about-hny-info text-left px-md-5">
                  <h3 class="tittle-w3ls mb-3"><span class="pink">Société  </span>Equitation CEBG</h3>
                  <p class="sub-tittle mt-3 mb-4">Notre centre équestre CEBG est l’un des plus beaux centres équestres de France et, plus que par sa taille ou par son ancienneté, c’est par son ambition pédagogique qu’elle se caractérise. École d’équitation,a pour vocation d’apprendre à tous à monter à cheval ou à poney et progresser à son rythme, de l’initiation jusqu’à la compétition (dressage, obstacle, voltige, travail à pied, attelage, éthologie…).

  <br>Le bien-être de nos chevaux est un souci de chaque instant et nous nous efforçons de leur accorder les meilleurs soins, que ce soit durant leur carrière chez nous, l’été au pré, ou lors de leur retraite via le programme Équidépart.

  Enfin, nous apportons une vraie bouffée d’air frais au coeur de Brive-la-Gaillard et permet aux adhérents de pouvoir se ressourcer et s’échapper, dans un ambiance familiale et conviviale. Que ce soit autour de la carrière et du grand manège lors des concours, ou au club house pour assister - en famille ou entre amis - aux animations.</p>
                  <a class="btn more black" href="public/presentation.php" role="button">+ D'info sur la Présentation</a>
              </div>
          </div>
      </section>
      <!-- //about -->


      <?php include'inc/actualites.php'; //la page actualités.php dans le dossier inc ?>

    <!--/ab-->
    <section class="banner_bottom py-5">
        <div class="container py-md-5">
            <div class="row inner_sec_info">

                <div class="col-md-6 banner_bottom_grid help">
                    <img src="images/pensionnat.jpg" alt=" " class="img-fluid">
                </div>
                <div class="col-md-6 banner_bottom_left mt-lg-0 mt-4">
                    <h4><a class="link-hny" href="public/pension.php">
                            Un pensionnat disponible pour vos chevaux</a></h4>
                    <p>Pour que vos chevaux soient en bonne santé, des box interrieurs ou exterrieurs sont disponible toute l'année</p>
                    <p>Si vous n'avez pas envie d'enfermer vos chevaux, des prés sont aussi disponible dans notre centre équestre</p>
                    <a class="btn more black mt-3" href="public/pension.php" role="button">En savoir plus</a>

                </div>
            </div>
        </div>
    </section>
    <!--//ab-->


    <!-- /projects -->
    <section class="projects py-5" id="gallery">
        <div class="container py-md-5">
          <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Nos chevaux</span> les mieux notés</h3>
          <div class="row news-grids  text-center">
            <div class="row news-grids mt-md-5 mt-4 text-center">


          <?php
          $un_cheval = new chevaux(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ");
          $une_photo = new photo_cheval(" ", " "," ");
          $une_race = new race_chevaux(" ", " ");
          $un_cheval_fav = new chevaux_fav(" ", " ");
          $id_membre = $_SESSION['id_membre'];

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
                <a href="#gal<?php echo $id_cheval ?>"><img src="images/uploads-chevaux/<?php echo $photo['lib_photo'] ?>"  alt="w3pvt" class="img-fluid-chevaux"></a>
                <div class="gal-info">
                    <h5><?php echo $prenom." ".$nom ?><span class="decription"><?php echo $race_cheval['lib_race_chevaux']?></span></h5>
                </div>
            </div>





            <!-- popup-->
            <div id="gal<?php echo $id_cheval ?>" class="pop-overlay">
                <div class="popup">
                    <img src="images/uploads-chevaux/<?php echo $photo['lib_photo'] ?>" alt="Popup Image" class="img-fluid-pop-up"  />
                    <div class="mt-4 desc-chevaux-popup-index">
                      <h1 style="font-size:1.5em;"><b><?php echo $prenom." ".$nom; ?></b></h1><br>
                      <p>
                        <span class="label-pop-up">Sexe : </span> <span class="text-popup"><b><?php echo $sexe ?></b></span><br>
                        <span class="label-pop-up">Race : </span> <span class="text-popup"><b><?php echo $race_cheval['lib_race_chevaux'] ?></b></span><br>
                        <span class="label-pop-up">Date de naissance : </span> <span class="text-popup"><b><?php echo $daten ?></b></span><br>
                        <span class="label-pop-up">Date d'arriver au centre : </span> <span class="text-popup"><b><?php echo $datea ?></b></span><br>
                      </p>

                      <form action="traitement/ajout_favoris_chevaux.trait.php?id_cheval=<?php echo $id_cheval ?>&page=index" method="POST">
                        <?php
                        $req_fav = $un_cheval_fav->select_by_id_membre_chevaux($id_membre, $id_cheval, $conn);
                        $res_fav = $req_fav->fetch();
                        $id_fav = $res_fav['id_chevaux_fav'];
                        if (empty($id_fav))
                        {
                          ?>
                          <button type="submit" name="ajout_fav" class="btn btn-warning" style="margin-top:5%; margin-left:20%;"
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
                          }
                        }
                        else
                        {
                          ?>
                          <button type="submit" name="supprimer_fav" class="btn btn-warning" style="margin-top:5%; margin-left:20%;">Supprimer de mes favoris</button>
                            <?php
                        }
                        ?>

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
    <!-- //projects -->
    <!-- /blogs -->
    <section class="blog-posts" id="blog" style="margin-top:5%;">
        <div class="blog-w3pvt-info-content container-fluid">
          <h3 class="tittle-w3ls text-center mb-5"><span class="pink">Installation</span> Aménagements</h3>
            <div class="blog-grids-main row text-left">
                <div class="col-lg-3 col-md-6 blog-grid-img px-0">
                    <img src="images/z1.jpg" alt="Popup Image" class="img-fluid" />
                </div>
                <div class="col-lg-3 col-md-6 blog-grid-info px-0">
                    <div class="date-post">
                        <h6 class="date">Carrière Cheval et Poney</h6>
                        <h4><a class="link-hny" href="single.php">CARRIÈRE</a></h4>
                        <p>La carrière, qui s’étend sur + de 3000 m², bénéficie d’un environnement exceptionnel.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 blog-grid-img px-0">
                    <img src="images/z2.jpg" alt="Popup Image" class="img-fluid" />
                </div>
                <div class="col-lg-3 col-md-6 blog-grid-info px-0 ">
                    <div class="date-post">
                        <h6 class="date">Le Grand Manège et le Manège rond</h6>
                        <h4><a class="link-hny" href="single.php">Manèges</a></h4>
                        <p>Le manège dispose d’une superficie de 13×25 m. Il accueille, été comme hiver, les cours chevaux et poneys. </p>
                    </div>
                </div>

            </div>
            <div class="blog-grids-main row text-left">

                <div class="col-lg-3 col-md-6 blog-grid-info px-0">
                    <div class="date-post">
                        <h6 class="date">Écuries</h6>
                        <h4><a class="link-hny" href="single.php">BOX</a></h4>
                        <p>La cour est également le lieu de rencontre des cavaliers chevaux ; en effet, vous y trouverez également le bureau des enseignants.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 blog-grid-img px-0">
                    <img src="images/z3.jpg" alt="Popup Image" class="img-fluid" />
                </div>

                <div class="col-lg-3 col-md-6 blog-grid-info px-0">
                    <div class="date-post">
                        <h6 class="date">Équipes / Cheveaux / Poneys</h6>
                        <h4><a class="link-hny" href="single.php">Selleries</a></h4>
                        <p>La SEP souhaite apporter le confort nécessaire à ses cavaliers. </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 blog-grid-img px-0">
                    <img src="images/z4.jpg" alt="Popup Image" class="img-fluid" />
                </div>

            </div>
        </div>

    </section>
    <!-- //blogs -->

    <div class="logoperso">
        <h3 class="tittle-w3ls mb-3"><span class="pink">Suivez-Nous  </span>sur les Réseaux</h3>

      <a href= "https://www.instagram.com/centreequestrecebg/"target="_blank"><img src="images/instagram.png" class="logo_RS"></a>
      <a href= "https://www.facebook.com/centreequestre.cebg.9"target="_blank"><img src="images/facebook.png" class="logo_RS"></a>
    </div>

    <!-- /news-letter -->
    <section class="news-letter-w3pvt py-5">
        <div class="container contact-form mx-auto text-left">
            <h3 class="title-w3ls two text-left mb-3">Newsletter </h3>
            <form method="post" action="traitement/news_letter.trait.php" class="w3ls-frm">
                <div class="row subscribe-sec">
                    <p class="news-para col-lg-3">Vous voulez être au courant ?</p>
                    <div class="col-lg-6 con-gd">
                      <?php
                      if (!empty($_GET['mail']))
                      {
                        $mail = $_GET['mail'];
                        ?>
                        <input type="email" class="form-control news_letter" id="email" value="<?php echo $mail ?>" placeholder="Votre email..." name="mail" required>
                        <?php
                      }
                      else {
                        ?>
                        <input type="email" class="form-control news_letter" id="email" placeholder="Votre email..." name="mail" required>
                        <?php
                      }
                      ?>
                    </div>

                    <div class="col-lg-3 con-gd news_letter">
                        <button type="submit" name="inscription_newsletter" class="btn submit">S'inscrire</button>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <!-- //news-letter -->

    <?php include'inc/footer_index.php'; ?>
</body>

</html>
