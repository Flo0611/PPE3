<?php
session_start();
ini_set("display_errors","off");
include'../../inc/bdd.inc.php';
include'../../all.class.php';
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
    <title>Centre équestre - Formulaire de contact</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <link href='https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css' />

	 <link href='https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json' rel='stylesheet' type='text/css' />

</head>
<body>

  <?php
	$un_contact = new membre(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ");
  include'assets/inc/nav.php';
  ?>

    <div id="wrapper">
      <?php include'assets/inc/top_bleu.php'; ?>

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Liste des membres</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->

                 <?php
         				if ($_GET['succes'] == "supr")
         				{
         					?>
         					<div class="alert alert-warning" role="alert">
         			  		Le membre a bien été supprimé.
         					</div>
         					<?php
         				}
                ?>

                 <form action="" method="post">
                 <div style="width:90%;">
                     <table id="tableau" class="table table-striped table-bordered" style="width:100%; z-index:0">
                         <thead>
                             <tr>
                                 <th>Nom</th>
                                 <th>Prénom</th>
                                 <th>Adresse mail</th>
                                 <th>Téléphone</th>
                                 <th>Adresse</th>
                                 <th>Complément</th>
                                 <th>Code postal</th>
                                 <th>Numéro maison</th>
                                 <th>Date de naissance</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>

                           <?php
                             $req = $un_contact->select_membre_valide($conn);
                             while ($res = $req->fetch())
                             {
                               $id_membre = $res['id_membre'];
                               $nom = $res['nom_membre'];
                               $prenom = $res['prenom_membre'];
                               $tel = $res['tel_membre'];
                               $adresse_mail = $res['email_membre'];
                               $adresse = $res['adresse_membre'];
                               $complement = $res['complement_membre'];
                               $date_naiss = $res['daten_membre'];
                               $num_rue_membre = $res['num_rue_membre'];
                               $code_p_membre = $res['code_p_membre'];
                               ?>
                               <tr>
                                 <td><?php echo $nom ?></td>
                                 <td><?php echo $prenom ?></td>
                                 <td><?php echo $adresse_mail ?></td>
                                 <td><?php echo $tel ?></td>
                                 <td><?php echo $adresse ?></td>
                                 <td><?php echo $complement ?></td>
                                 <td><?php echo $code_p_membre ?></td>
                                 <td><?php echo $num_rue_membre ?></td>
                                 <td><?php echo $date_naiss ?></td>
                                 <td><a href="../../traitement/membre_admin.trait.php?action=modifier&id=<?php echo $id_membre ?>"><i style="color:orange" class="fa fa-edit fa-2x"></i></a>  <a href="../../traitement/membre_admin.trait.php?action=supprimer&id=<?php echo $id_membre ?>"><i style="color:red" class="fa fa-minus-circle fa-2x"></i></a></td>
                                 </tr>
                               <?php
                             }
                           ?>

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
    var supr_membre = document.querySelectorAll('#supprimer_membre')
    for (var i = 0; i < supr_membre.length; i++) {
      var supprime_membre = supr_membre[i]
      supprime_membre.addEventListener('click', function () {
        document.querySelector("#container").style.setProperty("display", "block")
      })
    }
    </script>

    <script>
    var hide_popup = document.querySelectorAll('#annuler_popup')
    for (var i = 0; i < hide_popup.length; i++) {
      var cache_popup = hide_popup[i]
      cache_popup.addEventListener('click', function () {
        document.querySelector("#container").style.setProperty("display", "none")
      })
    }
    </script>



</body>
</html>
