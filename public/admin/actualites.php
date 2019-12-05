<?php
session_start();
include'../../inc/bdd.inc.php';
include'../../all.class.php';
$une_race = new race_chevaux(" ", " ");
if (!isset($_SESSION['admin']) OR isset($_SESSION['super_admin']))
{
	header("location:../../index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajouter une actualitée</title>

<!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
   <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
      <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />

  <link href="assets/css/ajout_chevaux.css" rel="stylesheet" />

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
                   <h2>Ajouter une actualitée </h2>
                  </div>
              </div>
               <!-- /. ROW  -->
               <?php
       				if ($_GET['erreur'] == "erreur")
       				{
       					?>
       					<div class="alert alert-danger" role="alert">
       			  		Une erreur est survenue lors du traitement, veuillez ré-essayer.
       					</div>
       					<?php
       				}

              if ($_GET['erreur'] == "champs")
       				{
       					?>
       					<div class="alert alert-danger" role="alert">
       			  		Veuillez renseigner tous les champs.
       					</div>
       					<?php
       				}

       				if ($_GET['succes'] == "upload")
       				{
       					?>
       					<div class="alert alert-info" role="alert">
       			  		L'actualité a bien été ajoutée.
       					</div>
       					<?php
       				}


       				?>
							<?php
								$prenom = $_SESSION['prenom'];
								$nom = $_SESSION['nom'];
								$date = date('d\/m\/Y');
							?>
            <form action="../../traitement/ajout_actualite.trait.php?prenom=<?php echo $prenom ?>&nom=<?php echo $nom ?>&date=<?php echo $date ?>" method="post" enctype="multipart/form-data">

						<label>Publié par :</label><br>
						<?php echo $prenom." ".$nom."<br>" ?>

            <label>Titre de l'actualité :</label><br>
             <input type="text" name="titre_actu" placeholder="Veuillez entrer le titre de l'actualité"><br>

             <label>Description :</label><br>
             <textarea name="description_actu" placeholder="Veuillez entrer une description de l'actualité" style="width:300px"></textarea><br>

             <label>Date du post :</label><?php echo "<b> <u>".$date."</u></b><br>" ?>

						 <label>Ajouter une photo : </label><br>
             <input type="file" name="fileToUpload" id="fileToUpload">

             <button type="submit" class="btn btn-success" name="valider">Valider</button>

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
</body>
</html>
