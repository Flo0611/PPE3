<?php
session_start();
include'../../inc/icons.php';
include'../../inc/bdd.inc.php';
include'../../all.class.php';
$un_cheval = new chevaux(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ");
$une_pension = new pension(" ", " ", " ", " ", " ", " ", " ");
$un_box = new box(" ", " ", " ");
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

  <link href='https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css' />

  <link href='https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json' rel='stylesheet' type='text/css' />

	<script src="../../js/gestion_pension.js"></script>


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
                   <h2>Ajouter un cheval à une pension</h2>
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

              if ($_GET['action'] == "supprimer")
       				{
       					?>
       					<div class="alert alert-warning" role="alert">
       			  		Le cheval a bien été supprimé de la pension.
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
             <select class="select" name="pension_detail" id="pension_detail" onchange="affiche_pension()">
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

           <div id="voir_pension"></div>

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
      "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
      }
  } );
} );
  </script>


</body>
</body>
</html>
