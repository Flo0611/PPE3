<?php
    include"../inc/bdd.inc.php";
    include"../all.class.php";
    $un_galop = new galop(" "," ");
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>balade</title>
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
        <div class="container py-md-5">
            <div class="about-hny-info text-left pr-lg-5">
                <h3 class="tittle-w3ls mb-3"><span class="pink">Nos</span> Balades</h3>
                <p class="sub-tittle mt-3 mb-4 pr-lg-5">Les Balades sont annimées tout les week-ends.</p>
            </div>
        </div>
        <?php
        $une_balades = new balades(" ", " ", " ", " ", " ", " ", " ", " ", " ");

        $req = $une_balades->select_balades($conn);
        while ($res = $req->fetch())
        {
          $id_balades = $res['id_bal'];
          $date_balades = $res['date_bal'];
          $heure_balades = $res['heure_bal'];
          $description_balades = $res['des_bal'];
          $galop_balades = $res['galop_bal'];
          $titre_balades = $res['titre_bal'];
          $photo_balades = $res['photo_bal'];
          $duree_balades = $res['duree_balade'];

          $req_galop = $un_galop->select_galop_by_id($galop_balades, $conn);
          $res_galop = $req_galop->fetch();
          $lib_galop = $res_galop['lib_galop'];

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
                        <p> Debut de la balade : <?php echo $heure_balades; ?></p>
                        <p> Durée : <?php echo $duree_balades."h"; ?></p>
                        <form class="login100-form validate-form" method="post" action="../traitement/inscription_activite.php?activite=1&balade=<?php echo $id_balades ?>">
                        <button class="btn more black mt-3"name="envoyer">Inscription</button>
                        </form>
                    </div>
                </div>
            </div>
              <?php
                     }
                ?>

            <?php include'../inc/footer_public.php'; ?>

</body>

</html>
