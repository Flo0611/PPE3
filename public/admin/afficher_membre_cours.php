<?php
ini_set("display_errors", "off");
session_start();
include'../../inc/icons.php';
include'../../inc/bdd.inc.php';
include'../../all.class.php';
$un_cours = new cours(" ", " ", " ", " ", " ", " ", " ");
$une_inscription_cours = new inscription_cours(" ", " ", " ");
$un_membre = new membre(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ");
$id_cours = $_GET['id_cours'];
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Ajouter un cours</title>

     <link href="assets/css/bootstrap.css" rel="stylesheet" />
      <!-- FONTAWESOME STYLES-->
     <link href="assets/css/font-awesome.css" rel="stylesheet" />
         <!-- CUSTOM STYLES-->
     <link href="assets/css/custom.css" rel="stylesheet" />


      <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <link href='https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css' />

   <link href='https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json' rel='stylesheet' type='text/css' />


    <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


 </head>
 <body>

   <?php include'assets/inc/nav.php'; ?>

     <div id="wrapper">
       <?php include'assets/inc/top_bleu.php'; ?>

         <div id="page-wrapper" >
             <div id="page-inner">
                 <div class="row">
                     <div class="col-md-12">
                      <h2>Les membres du cours </h2>
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

          				if ($_GET['success'] == "supprimer")
          				{
          					?>
          					<div class="alert alert-warning" role="alert">
          			  		Le membre a bien été supprimé du cours.
          					</div>
          					<?php
          				}


          				?>

                  <br>
                  <table id="tableau" class="table table-striped table-bordered" style="width:100%; z-index:0">
                      <thead>
                          <tr>
                              <th>Cours</th>
                              <th>Nom</th>
                              <th>Prénom</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>

                        <?php
                        $req_insc_cours = $une_inscription_cours->select_by_id_cours($id_cours, $conn);
                        while ($res_insc_cours = $req_insc_cours->fetch())
                        {
                          $id_insc_cours = $res_insc_cours['id_inscription_cours'];
                          $id_membre = $res_insc_cours['id_membre'];

                          $req_cours = $un_cours->select_lib_cours($id_cours, $conn);
                          $res_cours = $req_cours->fetch();
                          $titre_cours = $res_cours['titre_cours'];

                          $req_membre = $un_membre->select_by_id($id_membre, $conn);
                          while($res_membre = $req_membre->fetch())
                          {
                            $nom_membre = $res_membre['nom_membre'];
                            $prenom_membre = $res_membre['prenom_membre'];
                          }
                         ?>
                            <tr>
                              <td><?php echo $titre_cours ?></td>
                              <td><?php echo $nom_membre ?></td>
                              <td><?php echo $prenom_membre ?></td>
                              <td><a href="../../traitement/inscription_cours.trait.php?action=supprimer&id_insc_cours=<?php echo $id_insc_cours ?>"><i style="color:red" class="fa fa-minus-circle fa-2x"></i></a></td>
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
 </html>
