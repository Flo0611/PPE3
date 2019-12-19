<?php
session_start();
include'../../inc/icons.php';
include'../../all.class.php';
include'../../inc/bdd.inc.php';
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
    <title>Simple Responsive Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />

		<link rel="stylesheet" href="css/bootstrap.css">
		<!-- Bootstrap-Core-CSS -->
		<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />

		<link rel="stylesheet" href="css/menu.css" type="text/css">
		<!-- Style-CSS -->
		<!-- font-awesome-icons -->
		<link href="css/font-awesome.css" rel="stylesheet">
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
                     <h2>Gérer les Balades </h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
								 <?php
								 if (


									 $_GET['succes'] == "upload")
								 {
									 ?>
									 <div class="alert alert-info" role="alert">
										 Votre balade a bien été ajoutée.
									 </div>
									 <?php
								 }

								 if ($_GET['erreur'] == "erreur")
								 {
									 ?>
									 <div class="alert alert-danger" role="alert">
										 Un problème est survenue lors de l'ajout de la balade. Veuillez ré-essayer.
									 </div>
									 <?php
								 }

								 if ($_GET['erreur'] == "champs")
								 {
									 ?>
									 <div class="alert alert-danger" role="alert">
										 Veuillez remplir tous les champs.
									 </div>
									 <?php
								 }
								 ?>
								 <form action="../../traitement/ajout_balade.trait.php" method="post" enctype="multipart/form-data">
 		              <label>Titre de la balade :</label><br>
 		             <b>Balade : </b> <input type="text" name="titre_bal" style="width:34%; padding-left:10px;" class="encadre" placeholder="Veuillez entrer le titre de la balade"><br>

 		             <label class="float">Description de la balade  :</label><br>
								 <textarea name="description_bal" style="width:40%; padding-left:10px;" class="float encadre" placeholder="Veuillez entrer le nom du cheval"></textarea><br>

 		             <label>Date de la balade :</label><br>
 		             <input type="text" name="date_bal" class="encadre" style="width:40%; padding-left:10px;" value="<?php echo date('d\/m\/Y') ?>"><br>

								 <label>Début de la balade :</label><br>
									<input type="text" id="datepicker" class="encadre" style="width:40%; padding-left:10px;" name="debut_bal" placeholder="Veuillez entrer la date de la balade"><br>

									<label>Nombre de Galop :</label><br>
 				             <select class="float encadre" name="galop_bal" style="width:40%;">
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
									<label class="float">Durée de la balade :</label><br>
		              <select class="float encadre" name="duree_bal" style="width:40%;">
		                <option selected>Choisissez une heures...</option>
		                <option value="1">1 heure</option>
		                <option value="2">2 heures</option>
										<option value="3">3 heures</option>
										<option value="4">4 heures</option>
										<option value="5">5 heures</option>
										<option value="6">6 heures</option>
										<option value="7">7 heures</option>
										<option value="8">8 heures</option>
		              </select>
									<br>

									<label>Photos de la Balade :</label><br>
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


</body>
</html>
