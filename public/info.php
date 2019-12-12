<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Centre équestre - info membre</title>
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
    <link rel="stylesheet" href="../css/equipe.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->

</head>

<body>
  <?php
  include'../inc/nav_public.php';
  ?>

  <section id="team">
      <!-- Selection du nom et du prenom en base de données(a réaliser) -->
    <h3 class="tittle-w3ls mb-3" style="margin-left:4%;"><span class="pink">George Amilton</span></h3>
  <br><br>
    <div class="container wow fadeInUp">
        <div class="section-header">
            <h3 class="tittle-w3ls mb-3"><span class="pink"><u>Vos</u> </span><u>Informations</u></h3>
            <p style="font-size: 18px; line-height:1.5rem;">
        </div>
        <div class="">
            <div class="col-lg-3 col-md-6">
                <div class="member">
                    <div class="pic"><img src="../images/p1.png" alt=""></div>
                    </div>
                    
                </div>
                <form class="login100-form validate-form" method="post" action="#">
                <table border="1" style="width:50%; text-align:left; margin-left:auto; margin-right:auto;">
                <div class="member">
                
                <tr style="height:  50px;"><td>Nom : Amilton</td>
                <td><button class="login100-form-btn" type="submit" name="inscription_button">
                        Modifier
                    </button></td><tr>
                <tr style="height:  50px;"><td>Prenom : George</td>
                <td><button class="login100-form-btn" type="submit" name="inscription_button">
                        Modifier
                    </button></td></tr>
                    <tr style="height:  50px;"><td><span>Membre</span></td>
                    <td></td><tr>
                    <tr style="height:  50px;"><td>Email : roger@gmail.com</td> 
                <td><button class="login100-form-btn" type="submit" name="inscription_button">
                        Modifier
                    </button></td></tr>
                    <tr style="height:  50px;"><td>Mot de passe : 123156</td> 
                <td><button class="login100-form-btn" type="submit" name="inscription_button">
                        Modifier
                    </button></td></tr>
                    <tr style="height:  50px;"><td>Téléphone : 0656254898</td> 
                <td><button class="login100-form-btn" type="submit" name="inscription_button">
                        Modifier
                    </button></td></tr>
                    <tr style="height:  50px;"><td>Date de naissance : 09/05/1995</td> 
                <td><button class="login100-form-btn" type="submit" name="inscription_button">
                        Modifier
                    </button></td></tr>
                    <tr style="height:  50px;"><td>Adresse : 153 rue du pin</td> 
                <td><button class="login100-form-btn" type="submit" name="inscription_button">
                        Modifier
                    </button></td></tr>
                    <tr style="height:  50px;"><td>complement : 458</td> 
                <td><button class="login100-form-btn" type="submit" name="inscription_button">
                        Modifier
                    </button></td></tr>
                </tr>

                    </table>
                </div>
            </div>
  </div>
                </section><!-- #team -->

            <?php include'../inc/footer_public.php'; ?>

</body>

</html>
