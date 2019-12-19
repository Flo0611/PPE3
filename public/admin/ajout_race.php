<?php
include'../../inc/icons.php';
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
    <title>Ajouter des chevaux</title>

<!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
   <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
      <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />

  <link href="assets/css/ajout_chevaux.css" rel="stylesheet" />

   <!-- GOOGLE FONTS-->
 <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

 <link href='https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css' />
</head>
<body>


<?php include'assets/inc/nav.php'; ?>

  <div id="wrapper">
    <?php include'assets/inc/top_bleu.php'; ?>

      <div id="page-wrapper" >
          <div id="page-inner">
              <div class="row">
                  <div class="col-md-12">
                   <h2>Ajouter une race </h2>
                  </div>
              </div>
               <!-- /. ROW  -->
               <?php
       				if ($_GET['erreur'] == "existe")
       				{
       					?>
       					<div class="alert alert-danger" role="alert">
       			  		Une erreur est survenue lors du traitement, veuillez ré-essayer.
       					</div>
       					<?php
       				}

              if ($_GET['succes'] == "ajouter")
       				{
       					?>
       					<div class="alert alert-info" role="alert">
       			  		La race vient d'être ajouter avec succes.
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

              if ($_GET['succes'] == "supprimer")
       				{
       					?>
       					<div class="alert alert-warning" role="alert">
       			  		La race vient d'être supprimer avec succes.
       					</div>
       					<?php
       				}
       				?>

            <form action="../../traitement/ajout_race.trait.php" method="post" enctype="multipart/form-data">
              <label>Nom de la race :</label><br>
             <input type="text" name="nom_race" placeholder="Veuillez entrer le nom de la race" style="padding-left:5px"><br><br>


             <button type="submit" class="btn btn-success" name="valider">Valider</button>



           <div style="width:60%; margin-left:5%; margin-top:5%;">
               <table id="tableau" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                       <tr>
                           <th>Nom de la race</th>
                           <th>Supprimer</th>
                       </tr>
                   </thead>
                   <tbody>

                     <?php
                       $req = $une_race->select_race_chevaux($conn);
                       while ($res = $req->fetch())
                       {
                         $race = $res['lib_race_chevaux'];
                         $id_race = $res['id_race_chevaux'];
                         ?>
                         <tr>
                           <td style="text-align:center; width:100%;"><?php echo $race ?></td>
                           <td><input style="text-align:center;" type="checkbox" name="<?php echo "supr_cocher".$id_race; ?>" value="<?php echo $id_race; ?>"></td>
                         </tr>
                         <?php
                       }
                     ?>

                   </tbody>
                   <tfoot>
                     <th>Supprimer ?</th>
                     <th style="text-align:center"><button type="submit" name="supr_button" class="badge badge-pill badge-danger">Valider</button></th>
                   </tfoot>

               </table>
             </div>
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

  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<script type="text/javascript">
	$(document).ready(function() {
	$('#tableau').DataTable( {
			"language": {
					"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
			}
	} );
} );
	</script>


</body>
</body>
</html>
