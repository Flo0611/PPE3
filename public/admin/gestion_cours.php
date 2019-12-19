<?php
ini_set("display_errors", "off");
session_start();
include'../../inc/icons.php';
include'../../inc/bdd.inc.php';
include'../../all.class.php';
$un_jour = new jour(" ", " ");
$une_horaire = new horaires(" ", " ");
$un_cour = new cours(" ", " ", " ", " ", " ", " "," ");
$un_galop = new galop(" "," ");
if (!isset($_SESSION['admin']) OR isset($_SESSION['super_admin']))
{
	header("location:../../index.php");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajouter un cours</title>

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


   <!-- GOOGLE FONTS-->
 <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

 <script src="../../js/gestion_cours.js"></script>
</head>
<body>


<?php include'assets/inc/nav.php'; ?>

  <div id="wrapper">
    <?php include'assets/inc/top_bleu.php'; ?>

      <div id="page-wrapper" >
          <div id="page-inner">
              <div class="row">
                  <div class="col-md-12">
                   <h2>Ajouter un cours </h2>
                  </div>
              </div>
               <!-- /. ROW  -->
               <?php
       				if ($_GET['erreur'] == "champs")
       				{
       					?>
       					<div class="alert alert-danger" role="alert">
       			  		Veuillez remplir tous les champs.
       					</div>
       					<?php
       				}

       				if ($_GET['success'] == "ajouter")
       				{
       					?>
       					<div class="alert alert-info" role="alert">
       			  		Le cours a bien été ajouté.
       					</div>
       					<?php
       				}

              if ($_GET['action'] == "supprimer")
       				{
       					?>
       					<div class="alert alert-warning" role="alert">
       			  		Le cours a bien été supprimé.
       					</div>
       					<?php
       				}


       				?>

            <form action="../../traitement/gestion_cours.trait.php" method="post">


              <div class="row">
                  <div class="col-lg-4 col-md-4">
                      <div class="form-group">

                          <label>Titre du cours :</label><br>
                          <input type="text" name="titre_cours" class="form-control" placeholder="Nommer le cours">

                          <label>Heure du cours :</label><br>
                          <select class="select" name="heure_debut_cours" style="width:30%">
                            <option value="nul" selected>Choisissez une option...</option>

                            <?php
                            $req_horaires = $une_horaire->select_horaires($conn);
                            while ($res_horaires = $req_horaires->fetch())
                            {
                              $id_horaires = $res_horaires['id_horaires'];
                              $lib_horaires = $res_horaires['lib_horaires'];

                               ?>
                               <option value="<?php echo $id_horaires ?>"><?php echo $lib_horaires ?></option>
                               <?php
                             }
                            ?>

                          </select>
                          <label>-</label>

                          <select class="select" name="heure_fin_cours" style="width:30%">
                            <option value="nul" selected>Choisissez une option...</option>

                            <?php
                            $req_horaires = $une_horaire->select_horaires($conn);
                            while ($res_horaires = $req_horaires->fetch())
                            {
                              $id_horaires = $res_horaires['id_horaires'];
                              $lib_horaires = $res_horaires['lib_horaires'];

                               ?>
                               <option value="<?php echo $id_horaires ?>"><?php echo $lib_horaires ?></option>
                               <?php
                             }
                            ?>

                          </select><br>

                          <label>Nombre de Galop :</label><br>
         				             <select class="float encadre" name="galop_cours" style="width:40%;">
        											 <option value="0" selected>Choisissez le nombre de Galop...</option>
         				               <?php

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
         				             </select><br>

                          <label>Jour du cours :</label><br>
                          <select class="select" name="jour_cours">
                            <option value="nul" selected>Choisissez une option...</option>

                            <?php
                            $req_jour = $un_jour->select_jour($conn);
                            while ($res_jour = $req_jour->fetch())
                            {
                              $id_jour = $res_jour['id_jour'];
                              $lib_jour = $res_jour['lib_jour'];

                               ?>
                               <option value="<?php echo $id_jour ?>"><?php echo $lib_jour ?></option>
                               <?php
                             }
                            ?>

                          </select><br><br>

                          <button type="submit" class="btn btn-success" name="valider">Valider</button>

                      </div>
                  </div>
                </div>

           </form>

           <h2>Voir les cours</h2>
           <form action="../../traitement/gestion_cours.trait.php?action=detail" method="post">
             <select class="select" name="cours_detail" id="cours_detail" onchange="affiche_tableaux()">
               <option value="nul" selected>Choisissez une option...</option>
               <?php
               $req_jour = $un_jour->select_jour($conn);
               while ($res_jour = $req_jour->fetch())
               {
                 $id_jour = $res_jour['id_jour'];
                 $lib_jour = $res_jour['lib_jour'];

                  ?>
                  <option value="<?php echo $id_jour ?>"><?php echo $lib_jour ?></option>
                  <?php
                }
               ?>
           </select><br><br>
           </form>

           <div id="tableaux_cours"></div>

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
</html>
