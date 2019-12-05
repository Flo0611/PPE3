<?php
session_start();
ini_set("display_errors","on");
include'../../inc/bdd.inc.php';
include'../../all.class.php';
include'../../traitement/count.trait.php';
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
                   <h2>Quelques chiffres </h2>
                  </div>
              </div>
               <!-- /. ROW  -->

           <div style="width:60%; margin-left:5%;">
               <table id="tableau" class="table table-striped table-bordered" style="width:100%">
                   <thead>
                       <tr>
                           <th>Tables</th>
                           <th>Nombre de données</th>
                       </tr>
                   </thead>
                   <tbody>
                     <tr>
                       <td>Nombre de membres</td>
                       <td><?php echo $nb_membre['nb']." membres enregistrés" ?></td>
                     </tr>

                     <tr>
                       <td>Nombre de chevaux</td>
                       <td><?php echo $nb_chevaux['nb']." chevaux enregistrés" ?></td>
                     </tr>

                     <tr>
                       <td>Nombre de races</td>
                       <td><?php echo $nb_race['nb']." races enregistrés" ?></td>
                     </tr>

                     <tr>
                       <td>Nombre de formulaire de contact lu</td>
                       <td><?php echo $nb_contact_oui['nb']." formulaires lu enregistrés" ?></td>
                     </tr>

                     <tr>
                       <td>Nombre de formulaire de contact non lu</td>
                       <td><?php echo $nb_contact_non['nb']." formulaires non lu enregistrés" ?></td>
                     </tr>
                   </tbody>
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
  $('#tableau').DataTable();
  </script>


</body>
</body>
</html>
