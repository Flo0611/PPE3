<?php
session_start();
include'../../inc/icons.php';
include'../../inc/bdd.inc.php';
include'../../all.class.php';
$une_designation = new designation(" ", " ", " ", " ", " ", " ");
$une_presentation = new presentation(" ", " ", " ", " ", " ", " ", " ");
$une_designation = new designation(" ", " ");
if (!isset($_SESSION['admin']) OR isset($_SESSION['super_admin']))
{
	header("location:../../index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajouter un membre d'équipe - Centre équestre</title>

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
                   <h2>Ajouter un membre d'équipe </h2>
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
       			  		Le nouveau membre d'équipe a bien été ajouter.
       					</div>
       					<?php
       				}

						 if ($_GET['success'] == "supprimer")
						 {
							 ?>
							 <div class="alert alert-warning" role="alert">
								 Le membre a bien été supprimé.
							 </div>
							 <?php
						 }


       				?>

            <form action="../../traitement/ajout_membre_equipe.trait.php" method="post" enctype="multipart/form-data">
              <label>Nom :</label><br>
             <input type="text" name="nom_membre" placeholder="Veuillez entrer le nom de la personne"><br>

             <label class="float">Prénom :</label><br>
             <input type="text" name="prenom_membre" class="float" placeholder="Veuillez entrer le prénom de la personne"><br>

             <label>Âge : </label><br>
             <input type="number" name="age_membre" placeholder="Veuillez entrer l'âge de la personne"><br>

             <label class="float">Designation :</label><br>
             <select class="float select" name="designation">
               <?php
                $req = $une_designation->select_all_designation($conn);
                while($res = $req->fetch())
                {
                  $id_des = $res['id_designation'];
                  $lib_des = $res['lib_designation'];
                  ?>
                  <option value="<?php echo $id_des ?>"><?php echo $lib_des ?></option>
                  <?php
                }
               ?>
             </select>

             <input type="file" name="fileToUpload" id="fileToUpload" style="margin-bottom:3%">
             <button type="submit" class="btn btn-success" name="valider">Valider</button>

           </form><br>


					 <h2>Gestion membre d'équipe </h2>

					 <table id="tableau" class="table table-striped table-bordered" style="width:100%; z-index:0">
							 <thead>
									 <tr>
											 <th>Nom</th>
											 <th>Prénom</th>
											 <th>age</th>
											 <th>Designation</th>
											 <th>photo</th>
											 <th>Action</th>
									 </tr>
							 </thead>
							 <tbody>

								 <?php
									 $req = $une_presentation->select_all_pres($conn);
									 while ($res = $req->fetch())
									 {
										 $id_presentation = $res['id_presentation'];
										 $nom = $res['nom_presentation'];
										 $prenom = $res['prenom_presentation'];
										 $age = $res['age_presentation'];
										 $photo = $res['photo_presentation'];
										 $designation = $res['designation_presentation'];

										 $req_designation = $une_designation->select_designation_by_id($designation, $conn);
				             $res_des = $req_designation->fetch();
				             $lib_designation = $res_des['lib_designation'];
										 ?>
										 <tr>
											 <td><?php echo $nom ?></td>
											 <td><?php echo $prenom ?></td>
											 <td><?php echo $age ?></td>
											 <td><?php echo $lib_designation ?></td>
											 <td><?php echo $photo ?></td>
											 <td><a href="../../traitement/ajout_membre_equipe.trait.php?action=supprimer&id=<?php echo $id_presentation ?>"><i style="color:red" class="fa fa-minus-circle fa-2x"></i></a></td>
											 </tr>
										 <?php
									 }
								 ?>

							 </tbody>
					 </table>






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
