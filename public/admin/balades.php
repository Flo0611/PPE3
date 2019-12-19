<?php
session_start();
ini_set("display_errors","off");
include'../../inc/icons.php';
include'../../all.class.php';
include'../../inc/bdd.inc.php';


$une_balade = new balades(" ", " ", " ", " ", " ", " ", " ", " ", " ");

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

		<link href='https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css' />

		<link href='https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json' rel='stylesheet' type='text/css' />
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




							 <div style="width:60%; margin-left:5%; margin-top:5%;">
									 <table id="tableau" class="table table-striped table-bordered" style="width:100%">
											 <thead>
													 <tr>
															 <th>Id</th>
															 <th>Date</th>
															 <th>Heure</th>
															 <th>Description</th>
															 <th>Galop</th>
															 <th>Titre</th>
															 <th>Photo</th>
															 <th>Durée</th>
															 <th>Supprimer</th>
													 </tr>
											 </thead>
											 <tbody>

												 <?php
													 $req = $une_balade->select_balades($conn);
													 while ($res = $req->fetch())
													 {
														 $id_balades = $res['id_bal'];
														 $date_balades = $res['date_bal'];
														 $heure_balades = $res['heure_bal'];
														 $des_balades = $res['des_bal'];
														 $galopbalades = $res['galop_bal'];
														 $titrebalades = $res['titre_bal'];
														 $photobalades = $res['photo_bal'];
														 $duree_balade = $res['duree_balade'];

														 ?>


														 <tr>
															 <td><?php echo $id_balades ?></td>
															 <td><?php echo $date_balades?></td>
															 <td><?php echo $heure_balades ?></td>
															 <td><?php echo $des_balades?></td>
															 <td><?php echo $galopbalades ?></td>
															 <td><?php echo $titrebalades ?></td>
															 <td><?php echo $photobalades ?></td>
															  <td><?php echo $duree_balade ?></td>

															 <td><a href="../../traitement/ajout_balade.trait.php?action=supprimer&id=<?php echo $id_balades ?>"><i style="color:red" class="fa fa-minus-circle fa-2x"></i></a></td>
															 </tr>


														 <?php
													 }
												 ?>
											 </tbody>
										 </table>
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

		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

		<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>

		<script type="text/javascript">
		$(document).ready(function() {
		$('#tableau').DataTable( {
				dom: 'Bfrtip',
				buttons: [
						'excel', 'pdf', 'print'
				],
				"language": {
						"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
				}
		} );
		} );
		</script>

</body>
</html>
