<?php
session_start();
include'../../inc/icons.php';
if (!isset($_SESSION['admin']) OR isset($_SESSION['super_admin']))
{
	header("location:../../index.php");
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Envoie de mails</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />

    <link href="assets/css/news_letter.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>


  <?php include'assets/inc/nav.php'; ?>

    <div id="wrapper">
      <?php include'assets/inc/top_bleu.php'; ?>

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Envoie news letter </h2>
                    </div>
                </div>
                 <!-- /. ROW  -->

                 <form action="../../traitement/news_letter.trait.php" method="post" enctype="multipart/form-data">

                   <label for="to">À :</label>
                   <input type="text" name="to" class="float" placeholder="Destinataire"><br>


                   <label for="subject">Sujet :</label>
                  <input type="text" name="subject" placeholder="Sujet"><br>

                  <label for="corps">Corps : </label>
                  <textarea name="corps" placeholder="Votre message..."></textarea>
                  <b><p style="color: rgba(178,172,172,0.7); width:250px; margin-left:65%; margin-top:-30%; margin-bottom:20%">* Pour choisir l'empacement de votre photo, veuillez marquer votre photo avec la balise [photo].</p></b>

                  <input type="file" name="fileToUpload" id="fileToUpload">
                  <button type="submit" class="btn btn-success" name="envoyer">Envoyer</button>

                </form>

                 <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <?php include'assets/inc/footer.php'; ?>


     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
