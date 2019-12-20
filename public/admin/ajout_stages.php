<?php
session_start();
ini_set("display_errors","off");
include'../../inc/icons.php';
include'../../inc/bdd.inc.php';
include'../../all.class.php';
$un_stage = new stage(" ", " ", " ", " ", " ", " ", " ", " ");


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
							 <option value="1 heure">1 heure</option>
							 <option value="2 heures">2 heures</option>
							 <option value="3 heures">3 heures</option>
							 <option value="4 heures">4 heures</option>
							 <option value="5 heures">5 heures</option>
							 <option value="6 heures">6 heures</option>
							 <option value="7 heures">7 heures</option>
							 <option value="8 heures">8 heures</option>
							 <option value="Toute la journée">Toute la journée</option>
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

								<label>Nombre de place du stage :</label><br>
	 							<input type="number" name="place_max" id="place_max">

								<br>
						 <label>Photos du stage :</label><br>
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
														<th>Photos</th>
														<th>Supprimer</th>
												</tr>
										</thead>
										<tbody>

											<?php
												$req = $un_stage->select_stage($conn);
												while ($res = $req->fetch())
												{
													$id_stage = $res['id_stage'];
													$date_stage = $res['date_stage'];
													$heure_stage = $res['heure_stage'];
													$description_stage = $res['description_stage'];
													$galop_stage = $res['galop_stage'];
													$titre_stage = $res['titre_stage'];
													$photo_stage = $res['photo_stage'];

													?>


													<tr>
														<td><?php echo $id_stage ?></td>
														<td><?php echo $date_stage?></td>
														<td><?php echo $heure_stage ?></td>
														<td><?php echo $description_stage?></td>
														<td><?php echo $galop_stage ?></td>
														<td><?php echo $titre_stage ?></td>
														<td><?php echo $photo_stage ?></td>
														<td><a href="../../traitement/ajout_stages.trait.php?action=supprimer&id=<?php echo $id_stage ?>"><i style="color:red" class="fa fa-minus-circle fa-2x"></i></a></td>
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
          </div>
				</div>

       <!-- /. PAGE WRAPPER  -->
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
</body>
</html>
