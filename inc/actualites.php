<?php
ini_set("display_errors","off");
include'all.class.php';
include'inc/bdd.inc.php';
$une_actu = new actu(" ", " ", " ", " ", " ", " ", " ");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/style_actu.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  </head>
  <body>

    <div class="testimonial-section">
      <div class="inner-width">
        <h1>Les actualités</h1>
        <div class="border"></div>

        <div class="slides owl-carousel">

    <?php
    $req = $une_actu->select_actu_recente($conn);
    while($res = $req->fetch())
    {
      $id_actu = $res['id_actu'];
      ?>
<a href="#gal<?php echo $id_actu ?>">
            <div class="testimonial">
              <div class="test-info">
                <img class="test-pic" src="images/<?php echo $res['photo_actu'] ?>" alt="">
                <div class="test-name">
                  <span><?php echo $res['prenom_actu']." ".$res['nom_actu'] ?></span>
                  <?php echo $res['date_actu'] ?>
                </div>
              </div>

              <p>
                <?php
                $msg = $res['text_actu'];
                echo $une_actu->resume_xmots($msg,25)."..." ; ?>
              </p>
            </div>
          </a>

      <?php
    }
    ?>

  </div>
</div>
</div>

<script type="text/javascript">
  $(".owl-carousel").owlCarousel({
    margin:10,
    responsiveClass:true,
    loop:true,
    autoplay:true,
    autoplayHoverPause:true,
    smartSpeed:500,
    responsive:{
      0:{
        items:1
      },
      680:{
        items:2
      },
      960:{
        items:3
      }
    }
  });
</script>

  </body>
</html>
