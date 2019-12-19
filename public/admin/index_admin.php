<?php
ini_set("display_errors", "on");
include'../../inc/bdd.inc.php';
include'../../all.class.php';
include'../../inc/icons.php';
session_start();
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
    <title>Centre équestre - Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


</head>
<body>


  <?php
	include'assets/inc/nav.php';
	$un_contact = new contact(" ", " ", " ", " ", " ");
	?>

    <div id="wrapper">
      <?php include'assets/inc/top_bleu.php'; ?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                    	<h2>ADMIN DASHBOARD
                    </div>
                </div>
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Bonjour <?php echo $_SESSION['prenom']." " ?></strong>
                        </div>

                    </div>
                    </div>
                  <!-- /. ROW  -->
                            <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="stats.php" >
														 <i class="fas fa-chart-pie fa-5x"></i>
                      <h4>Statistiques</h4>
                      </a>
                      </div>


                  </div>

                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="form_contact.php" >
														 <?php
															$req = $un_contact->compte_nb_msg_non($conn);
															$nombre = $req->fetch();
															if ($nombre['nb'] != 0)
															{
																?>
																<span style="background-color:red; float:right;" class="badge badge-pill badge-danger"><?php echo $nombre['nb'] ?></span>
																<?php
															}
														 ?>
 															<i class="fa fa-envelope-o fa-5x" style="margin-left:13%;"></i>
			                      	<h4>Formulaire de contact</h4>
			                      </a>
                      </div>


                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="archives_msg.php" >
														 <i class="fa fa-inbox fa-5x"></i>
                      <h4>Messages archivés</h4>
                      </a>
                      </div>


                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="membres_admin.php" >
 <i class="fa fa-users fa-5x"></i>
                      <h4>Utilisateurs</h4>
                      </a>
                      </div>


                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="ajout_chevaux.php" >
<i class="fas fa-horse fa-5x"></i>
                      <h4>Ajouter des chevaux</h4>
                      </a>
                      </div>


                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="news_letter.php" >
 <i class="fa fa-comments-o fa-5x"></i>
                      <h4>Mails</h4>
                      </a>
                      </div>


                  </div>
              </div>
                 <!-- /. ROW  -->
                <div class="row text-center pad-top">

                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="ajout_race.php" >
<i class="fa fa-tasks fa-5x"></i>
                      <h4>Gestion des races</h4>
                      </a>
                      </div>


                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="actualites.php" >
 <i class="fas fa-newspaper fa-5x"></i>
                      <h4>Actualités</h4>
                      </a>
                      </div>


                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="balades.php" >
 													<i class="fas fa-walking fa-5x"></i>
                      <h4>Gérer les Balades</h4>
                      </a>
                      </div>


                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="ajout_stages.php" >
 <i class="fas fa-tasks fa-5x"></i>
                      <h4>Gérer les Stages </h4>
                      </a>
                      </div>


                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="ajout_membre_equipe.php" >
 <i class="fas fa-plus-circle fa-5x"></i>
                      <h4>Ajouter des membres d'équipe</h4>
                      </a>
                      </div>


                  </div>
                     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="ajout_pension.php" >
 <i class="fas fa-home fa-5x"></i>
                      <h4>Pension</h4>
                      </a>
                      </div>


                  </div>

              </div>

							<div class="row text-center pad-top">
							<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
							 <div class="div-square">
										<a href="gestion_cours.php" >
<i class="fas fa-briefcase fa-5x"></i>
							 <h4>Gestion de cours</h4>
							 </a>
							 </div>


					 </div>
				 </div>

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


</body>
</html>
