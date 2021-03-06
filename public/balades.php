<?php
ini_set("display_errors", "off");
    include"../inc/bdd.inc.php";
    include"../all.class.php";
    $un_galop = new galop(" "," ");
    $une_inscription_activite = new inscription_activite(" ", " ", " ", " ");
    $une_horaire = new horaires(" ", " ");
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Balades - Centre équestre</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->

</head>

<body>
  <?php
  include'../inc/nav_public.php';
  ?>
  <?php
  if ($_GET['success'] == "inscris")
  {
    ?>
    <div class="alert alert-success" role="alert" >
      Votre inscription a bien été pris en compte.
    </div>
    <?php
  }

  if ($_GET['erreur'] == "deja_inscris")
  {
    ?>
    <div class="alert alert-warning" role="alert" >
      Vous êtes déjà inscris a cette balade.
    </div>
    <?php
  }

  if ($_GET['success'] == "desinscris")
  {
    ?>
    <div class="alert alert-info" role="alert" >
      Vous êtes maintenant désinscris de la balade.
    </div>
    <?php
  }
  ?>
        <div class="container py-md-5">
            <div class="about-hny-info text-left pr-lg-5">
                <h3 class="tittle-w3ls mb-3"><span class="pink">Nos</span> Balades</h3>
                <p class="sub-tittle mt-3 mb-4 pr-lg-5">Les Balades sont animées tout les week-ends.</p>
            </div>
        </div>
        <?php
        $une_balades = new balades(" ", " ", " ", " ", " ", " ", " ", " ", " ");

        $req = $une_balades->select_balades($conn);
        while ($res = $req->fetch())
        {
          $id_balades = $res['id_bal'];
          $date_balades = $res['date_bal'];
          $id_horaires = $res['heure_bal'];
          $description_balades = $res['des_bal'];
          $galop_balades = $res['galop_bal'];
          $titre_balades = $res['titre_bal'];
          $photo_balades = $res['photo_bal'];
          $duree_balades = $res['duree_balade'];

          $req_heure = $une_horaire->select_horaires_by_id($id_horaires, $conn);
          $res_heure = $req_heure->fetch();
          $lib_horaires = $res_heure['lib_horaires'];

          $req_galop = $un_galop->select_galop_by_id($galop_balades, $conn);
          $res_galop = $req_galop->fetch();
          $lib_galop = $res_galop['lib_galop'];

          $req_place_max = $une_balades->select_nbplace_balades($id_balades, $conn);
          $res_place_max = $req_place_max->fetch();
          $place_max = $res_place_max['place_max'];

          $sql = "SELECT count(*) as nb_balade from inscription_activite where id_spe = '$id_balades' and id_acti = '1'";
          $req_nbplace = $conn->query($sql);
          $res_nbplace = $req_nbplace->fetch();
          $nb_place = $res_nbplace['nb_balade'];

          $place_dispo = $place_max - $nb_place;

         ?>
            <div class="container py-md-5">
                <div class="row inner_sec_info">

                    <div class="col-md-6 banner_bottom_grid help">
                        <img src="../images/uploads-balades/<?php echo $photo_balades; ?>" alt=" " class="img-fluid">
                    </div>
                    <div class="col-md-6 banner_bottom_left">
                        <h3>
                        <span class="pink">Balades : </span><?php echo $titre_balades; ?> </a></h3>
                        <p><?php echo $description_balades; ?></p>
                        <p> Galop requis : <?php echo $lib_galop; ?></p>
                        <p> Date de la balade : <b><u><?php echo $date_balades; ?></u></b></p>
                        <p> Debut de la balade : <?php echo $lib_horaires; ?></p>
                        <p> Durée : <?php echo $duree_balades."h"; ?></p>
                        <p>Places disponibles : </span><b><?php echo $place_dispo ?>
                        <?php
                                if ($place_dispo > 0)
                                {
                                  echo "<img src='../images/point_vert.jpg'>";
                                }
                                else {
                                  echo "<img src='../images/point_rouge.jpg'>";
                                }
                        ?></span><br>


                          <?php
                          if (empty($_SESSION))
                                {
                                  ?>
                                  <button class="btn more black mt-3" name="envoyer" disabled>Inscription</button>
                                  <?php
                                }
                                else
                                {
                                  $id_membre = $_SESSION['id_membre'];
                                  $id_activite = 1;
                                  $req_balade = $une_inscription_activite->verif_existe_activite($id_membre, $id_activite, $id_balades, $conn);
                                  $res_balade = $req_balade->fetch();

                                  $nb = $res_balade['nb'];
                                  if (!isset($nb))
                                  {
                                    ?>
                                    <form class="login100-form validate-form" method="post" action="../traitement/inscription_activite.php?activite=1&balade=<?php echo $id_balades ?>">
                                    <button class="btn more black mt-3" name="envoyer">Inscription</button>
                                        </form>
                                    <?php
                                  }
                                  else
                                  {
                                    ?>
                                    <form action="../traitement/inscription_activite.php?action=desinscription&activite=1&balade=<?php echo $id_balades ?>" method="POST">
                                    <button class="btn more black mt-3" type="submit" name="desinscription_balade">Se désinscrire</button>
                                  </form>
                                    <?php
                                  }

                                }
                          ?>



                    </div>
                </div>
            </div>
              <?php
                     }
                ?>

            <?php include'../inc/footer_public.php'; ?>

</body>

</html>
