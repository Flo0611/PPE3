<?php
session_start();
include'../../inc/icons.php';
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
    <title>Ajouter des chevaux</title>

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
                   <h2>Ajouter un cheval </h2>
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
       			  		Le cheval a bien été ajouté.
       					</div>
       					<?php
       				}


       				?>

            <form action="../../traitement/ajout_chevaux.trait.php" method="post" enctype="multipart/form-data">
              <label>Prénom :</label><br>
             <input type="text" name="prenom_che" placeholder="Veuillez entrer le prénom du cheval"><br>

             <label class="float">Nom :</label><br>
             <input type="text" name="nom_che" class="float" placeholder="Veuillez entrer le nom du cheval"><br>

             <label>Date de naissance :</label><br>
             <input type="text" id="datepicker" name="daten_che" placeholder="Veuillez entrer la date de naissance du cheval"><br>

             <label class="float">Race :</label><br>
             <select class="float select" name="race_che">
               <?php
                $req = $une_race->select_race_chevaux($conn);
                while($res = $req->fetch())
                {
                  $id_race = $res['id_race_chevaux'];
                  $lib_race = $res['lib_race_chevaux'];
                  ?>
                  <option value="<?php echo $id_race ?>"><?php echo $lib_race ?></option>
                  <?php
                }
               ?>
             </select>

             <label>Date d'arriver au centre</label><br>
             <input type="text" name="datea_che" value="<?php echo date('d\/m\/Y') ?>"><br>

             <label class="float">Sexe :</label><br>
             <select class="float select" name="sexe">
               <option value="nul" selected>Choisissez une option...</option>
               <option value="male">Mâle</option>
               <option value="femelle">Femelle</option>
             </select>

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
