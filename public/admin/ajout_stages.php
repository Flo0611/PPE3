<?php
session_start();
ini_set("display_errors","off");
include'../../inc/bdd.inc.php';
include'../../all.class.php';

if (!isset($_SESSION['admin']) OR isset($_SESSION['super_admin']))
{
	header("location:../../index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajouter des Stages</title>

<!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
   <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
      <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />

  <link href="assets/css/ajout_chevaux.css" rel="stylesheet" />

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
                   <h2>Ajouter un stages </h2>
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
       			  		Le stage a bien été ajouté.
       					</div>
       					<?php
       				}


       				?>

            <form action="../../traitement/ajout_stages.trait.php" method="post" enctype="multipart/form-data">
              <label>Titre du stages :</label><br>
             <input type="text" name="titre_stage" placeholder="Veuillez entrer le titre du stage"><br>

             <label>Description du stages:</label><br>
             <textarea name="description_stage" style="width:40%; padding-left:10px;" class="encadre" placeholder="Veuillez entrer la description du stage"></textarea><br>

             <label>Date du stage</label><br>
             <input type="text" name="date_stage" value="<?php echo date('d\/m\/Y') ?>"><br>

						 <label>Nombre d'heure de stage :</label><br>
						 <select class="encadre" name="heure_stage" style="width:40%;">
							 <option selected>Choisissez la durée du stage...</option>
							 <option value="1">1 heure</option>
							 <option value="2">2 heures</option>
							 <option value="3">3 heures</option>
							 <option value="4">4 heures</option>
							 <option value="5">5 heures</option>
							 <option value="6">6 heures</option>
							 <option value="7">7 heures</option>
							 <option value="8">8 heures</option>
							 <option value="8">Toute la journée</option>
						 </select>
						 <br>

<br>
						 <label>Nombre de galop :</label><br>
						 <select class="encadre" name="galop_stage" style="width:40%;">

									<option value="0" selected>Choisissez le nombre de Galop...</option>
									<?php
									$un_galop = new galop(" "," ");

									 $req_g = $un_galop->select_galop($conn);
									 while($res_g = $req_g->fetch())
									 {
										 $id_g = $res_g['id_galop'];
										 $lib_g = $res_g['lib_galop'];
										 ?>
										 <option value="<?php echo $id_g ?>"><?php echo $lib_g?></option>
										 <?php
									 }
									?>
								</select>
								<br>
						 <label>Photos du stage :</label><br>
						<input type="file" name="fileToUpload" id="fileToUpload">
						<br>
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

	<script>
	$( function() {
	    $( "#datepicker" ).datepicker({
	      changeMonth: true,
	      changeYear: true
	    });
	  } );

	</script>


</body>
</body>
</html>
