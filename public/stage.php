<?php
    include"../inc/bdd.inc.php";
    include"../all.class.php";
 ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Infinitude Corporate Category Bootstrap Responsive Web Template | About :: W3layouts</title>
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
                <h3 class="tittle-w3ls mb-3"><span class="pink">Nos</span> Stages</h3>
                <p class="sub-tittle mt-3 mb-4 pr-lg-5">Les stages à thème sont proposés les lundi, jeudi et vendredi, de 14h à 16h et sont aussi proposés pendant les vacances scolaires.</p>
            </div>
        </div>
        <?php
        $un_stage = new stage(" ", " ", " ", " ", " ", " ", " ");
        $un_galop = new galop(" ", " ");

        $req = $un_stage->select_stage($conn);
        while ($res = $req->fetch())
        {
          $id_stage = $res['id_stage'];
          $date_stage = $res['date_stage'];
          $heure_stage = $res['heure_stage'];
          $description_stage = $res['description_stage'];
          $galop_stage = $res['galop_stage'];
          $titre_stage = $res['titre_stage'];
          $photo_stage = $res['photo_stage'];

          $req_galop = $un_galop->select_galop_by_id($galop_stage, $conn);
          $res_galop = $req_galop->fetch();
          $lib_galop = $res_galop['lib_galop'];


         ?>
            <div class="container py-md-5">
                <div class="row inner_sec_info">

                    <div class="col-md-6 banner_bottom_grid help">
                        <img src="../images/uploads_stage/<?php echo $photo_stage; ?>" alt=" " class="img-fluid">
                    </div>
                    <div class="col-md-6 banner_bottom_left">
                        <h3>
                        <span class="pink">Stages : </span><?php echo $titre_stage; ?> </a></h3>
                        <p><?php echo $description_stage; ?></p>
                        <p> Galop Requis : <?php echo $lib_galop; ?></p>
                        <p> Nombre d'heure de stage : <?php echo $heure_stage; ?></p>
                        <p> Date du stage : <?php echo $date_stage; ?></p>
                    </div>
                </div>
            </div>
              <?php
                     }
                ?>

            <?php include'../inc/footer_public.php'; ?>

</body>

</html>
