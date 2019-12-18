<?php
session_start();
include'../../inc/icons.php';
include'../../inc/bdd.inc.php';
include'../../all.class.php';
$un_cheval = new chevaux(" ", " ", " ", " ", " ", " ", " ", " ", " ");
$une_pension = new pension(" ", " ", " ", " ", " ", " ", " ");
if (!isset($_SESSION['admin']) OR isset($_SESSION['super_admin']))
{
	header("location:../../index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajouter un cheval à une pension</title>

<!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
   <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
      <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />

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
       			  		Le cheval est déjà dans une pension.
       					</div>
       					<?php
       				}

              if ($_GET['erreur'] == "pas_place")
       				{
       					?>
       					<div class="alert alert-danger" role="alert">
       			  		Il n'y a pas de places disponibles dans cette pension.
       					</div>
       					<?php
       				}

       				if ($_GET['success'] == "ajouter")
       				{
       					?>
       					<div class="alert alert-info" role="alert">
       			  		Le cheval a bien été ajouté a la pension.
       					</div>
       					<?php
       				}


       				?>

            <form action="../../traitement/ajout_pension.trait.php" method="post" enctype="multipart/form-data">

             <label>Selectionner un cheval :</label><br>
             <select class="select" name="id_cheval">
               <?php
                $req = $un_cheval->select_nom_chevaux($conn);
                while($res = $req->fetch())
                {
                  $id_chevaux = $res['id_chevaux'];
                  $nom_chevaux = $res['nom_chevaux'];
                  $prenom_chevaux = $res['prenom_chevaux'];
                  ?>
                  <option value="<?php echo $id_chevaux ?>"><?php echo $nom_chevaux." ".$prenom_chevaux ?></option>
                  <?php
                }
               ?>
             </select>

             <br>
             <label>Pension :</label><br>
             <select class="select" name="id_pension">
               <option value="nul" selected>Choisissez une option...</option>

               <?php
                $req_pension = $une_pension->select_pension($conn);
                while($res_pension = $req_pension->fetch())
                {
                  $id_pension = $res_pension['id_pension'];
                  $lib_pension = $res_pension['lib_pension'];

                  ?>
                  <option value="<?php echo $id_pension ?>"><?php echo $lib_pension ?></option>
                  <?php
                }
               ?>

             </select><br><br>

             <button type="submit" class="btn btn-success" name="valider">Valider</button>

           </form>

           <h2>Voir les pensions</h2>
           <form action="../../traitement/ajout_pension.trait.php?action=detail" method="get">
             <select class="select" name="pension_detail">
               <option value="nul" selected>Choisissez une option...</option>
             <?php
              $req_pension = $une_pension->select_pension($conn);
              while($res_pension = $req_pension->fetch())
              {
                $id_pension = $res_pension['id_pension'];
                $lib_pension = $res_pension['lib_pension'];

                ?>
                <option value="<?php echo $id_pension ?>"><?php echo $lib_pension ?></option>
                <?php
              }
             ?>
           </select><br><br>
             <button type="submit" class="btn btn-success" name="valider_detail">Voir le détail</button>
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
