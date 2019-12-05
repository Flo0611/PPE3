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
        $une_race = new stage(" ", " ", " ", " ", " ", " ", " ");

        $req = $une_race->select_stage($conn);
        while ($res = $req->fetch())
        {
          $id_stage = $res['idst'];
          $date_stage = $res['datest'];
          $heure_stage = $res['heurest'];
          $description_stage = $res['desst'];
          $heure_fin_stage = $res['heurefin'];
          $pdf_stage = $res['pdfst'];
          $galop_stage = $res['galopst'];
          $titre_stage = $res['titrest'];


         ?>
            <div class="container py-md-5">
                <div class="row inner_sec_info">

                    <div class="col-md-6 banner_bottom_grid help">
                        <img src="../images/image_balade.jpg" alt=" " class="img-fluid">
                    </div>
                    <div class="col-md-6 banner_bottom_left">
                        <h3>
                        <span class="pink">Stages :</span><?php echo $titre_stage; ?> </a></h3>
                        <p><?php echo $description_stage; ?></p>
                        <p><?php echo $galop_stage; ?></p>
                        <a class="btn more black mt-3" href="planning.php" role="button">Nos tarif</a>
                    </div>
                </div>
            </div>
              <?php
                     }
                ?>

            <?php include'../inc/footer_public.php'; ?>

</body>

</html>
