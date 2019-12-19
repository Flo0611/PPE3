<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Centre équestre - Contact</title>
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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body style="background: #F3F3F3">
    <?php include'../inc/nav_public.php'; ?>

    <?php
    if ($_GET['success'] == "mail_envoyer")
    {
      ?>
      <div class="alert alert-success" role="alert">
        Votre message a bien été envoyé. Merci de votre message, une réponse vous sera adressée dans les plus brefs délais.
      </div>
      <?php
    }

    if ($_GET['erreur'] == "captcha")
    {
      ?>
      <div class="alert alert-danger" role="alert">
        Veuillez remplir le captcha.
      </div>
      <?php
    }
    ?>

    <!-- Contact -->
    <section class="about-info py-5 px-lg-5">
        <div class="content-w3ls-inn px-lg-5">
            <div class="container py-md-5 py-3">
                <div class="px-lg-5">
                    <h3 class="tittle-w3ls mb-lg-5 mb-4"><span class="pink">Contactez </span> Nous</h3>
                    <p class="mt-5 pr-lg-5">Accumsan orci faucibus id eu lorem semper. Eu ac iaculis ac nunc nisi lorem vulputate lorem neque cubilia ac in adipiscing in curae lobortis tortor primis integer massa adipiscing id nisi accumsan pellentesque commodo blandit enim arcu non at amet id arcu magna. Accumsan orci faucibus id eu lorem semper nunc nisi lorem vulputate lorem neque cubilia.</p>


                    <div class="contact-hny-form mt-lg-5 mt-3">
                        <h3 class="title-hny mb-lg-5 mb-3">
                            Ecrire un message
                        </h3>
                        <form method="post" action="../traitement/contact_mail.php">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Vote Nom</label>
                                        <input type="text" name="nom" id="nom">
                                    </div>
                                    <div class="form-group">
                                        <label>Votre Email</label>
                                        <input type="email" name="adresse_mail" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Sujet</label>
                                        <input type="text" name="sujet" id="Sujet">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" id="message"></textarea>
                                    </div>
                                </div>

                                <div class="g-recaptcha" data-sitekey="6LeuQMgUAAAAAGov4m5atjZiat_rBJ_wOaVoNrnH"></div><br>

                                <div class="form-group mx-auto mt-3">
                                    <button type="submit" class="btn btn-default morebtn more black con-submit" name="envoyer">Envoyer</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="map-w3pvt mt-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1637.3814868898205!2d1.5294522955510472!3d45.14588001664177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f897fda278ba1f%3A0xe8f240a2d5bf1eee!2s41+Avenue+Edmond+Michelet%2C+19100+Brive-la-Gaillarde!5e0!3m2!1sfr!2sfr!4v1543918685201" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //Contact -->


    <!-- /news-letter -->

    <!-- //news-letter -->

    <?php include'../inc/footer_public.php'; ?>
</body>

</html>
