<?php
session_start();
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
								 <form action="../../traitement/ajout_balade.trait.php" method="post" enctype="multipart/form-data">
 		              <label>Titre de la balade :</label><br>
 		             <input type="text" name="titre_bal" placeholder="Veuillez entrer le titre de la balade"><br>

 		             <label class="float">Description de la balade  :</label><br>
 		             <input type="text" name="description_bal" class="float" placeholder="Veuillez entrer le nom du cheval"><br>

 		             <label>Date de la balade :</label><br>
 		             <input type="text" name="date_bal" value="<?php echo date('d\/m\/Y') ?>"><br>

								 <label>Début de la balade :</label><br>
									<input type="text" id="datepicker" name="debut_bal" placeholder="Veuillez entrer la date de la balade"><br>

									<label class="float">Durée de la balade :</label><br>


										<select class="float select" name="galop_bal">
											<option value="nul" selected>Choisissez un Galop...</option>
											<?php
											 $req = $une_race->select_race_chevaux($conn);
											 while($res = $req->fetch())
											 {
												 $idg = $res['id_race_chevaux'];
												 $libg = $res['lib_race_chevaux'];
												 ?>
												 <option value="<?php echo $id_race ?>"><?php echo $lib_race ?></option>
												 <?php
											 }
											?>
										</select>
										<option value="1">1 heure</option>
									</select>

									<label class="float">Durée de la balade :</label><br>
		              <select class="float select" name="Duree_bal">
		                <option value="nul" selected>Choisissez une heures...</option>
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
