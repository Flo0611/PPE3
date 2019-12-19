<?php
ini_set("display_errors","on");
include'../all.class.php';
include'../inc/bdd.inc.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Centre équestre - Équipe</title>
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
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />

    <link rel="stylesheet" href="../css/menu.css" type="text/css">
    <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->

</head>

<body>
  <?php
  include'../inc/nav_public.php';
  ?>

  <section class="banner_bottom py-5">
    <h3 class="tittle-w3ls mb-3" style="margin-left:4%;"><span class="pink">Présentation </span></h3>
      <div class="container py-md-5">
          <div class="row inner_sec_info">

              <div class="col-md-6 banner_bottom_grid help">
                  <img src="../images/z1.jpg" alt=" " class="img-fluid">
              </div>
              <div class="col-md-6 banner_bottom_left mt-lg-0 mt-4">
                  <h4>Centre Équestre de Brive</h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur quis nibh dictum, volutpat turpis sit amet, pharetra lectus. Duis nec porta libero, vitae ultrices metus. Nunc congue egestas rhoncus. Aenean vitae ornare lorem. Nulla dictum, nisl a rutrum scelerisque, magna nisi tristique turpis, sit amet posuere dolor ipsum id est. Nulla a arcu ligula. Pellentesque eleifend sem dolor, sit amet ultricies est iaculis vitae. In fermentum interdum magna.</p>

                          <p>Quisque imperdiet nunc erat, quis sagittis mi vestibulum ornare. Sed molestie eget erat eu pretium. Aliquam feugiat lorem erat, a accumsan lectus tempor id. Aenean fermentum velit eleifend, hendrerit orci id, efficitur felis. Donec a auctor nunc. Pellentesque vulputate pharetra enim sed lacinia. Sed finibus sed quam at porttitor. Phasellus finibus interdum elit, nec egestas velit pretium nec. Aenean sit amet eros magna.</p>
              </div>
          </div>
      </div>
  </section>


  <section class="projects py-5" id="gallery">
      <div class="container py-md-5">
          <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Notre </span>Équipe</h3>
          <div class="row news-grids  text-center">

          <?php
          $une_presentation = new presentation(" ", " ", " ", " ", " ", " ", " ");
          $une_designation = new designation(" ", " ");

          $req = $une_presentation->select_all_pres($conn);
          while ($res = $req->fetch())
          {
            $id_presentation = $res['id_presentation'];
            $nom = $res['nom_presentation'];
            $prenom = $res['prenom_presentation'];
            $age = $res['age_presentation'];
            $photo = $res['photo_presentation'];
            $designation = $res['designation_presentation'];

            $req_designation = $une_designation->select_designation_by_id($designation, $conn);
            $res_des = $req_designation->fetch();
            $lib_designation = $res_des['lib_designation'];
            ?>


                <div class="col-md-4 mt-md-5 mt-4 gal-img">
                    <img src="../images/uploads-membre-equipe/<?php echo $photo ?>" alt="<?php echo $photo ?>" class="img-fluid-chevaux">
                    <div class="gal-info">
                        <h5><?php echo $prenom." ".$nom; ?><span class="decription"><?php echo $age." ans<br>".$lib_designation ?></span></h5>
                    </div>
                </div>
              <?php }?>
              </div>
            </div>
          </section>

            <?php include'../inc/footer_public.php'; ?>

</body>

</html>
