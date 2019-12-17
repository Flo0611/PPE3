<?php
session_start();
include'../../inc/icons.php';
ini_set("display_errors","on");
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

</head>
<body>

  <?php
	$un_contact = new contact(" ", " ", " ", " ", " ");
  include'assets/inc/nav.php';
  ?>

    <div id="wrapper">
      <?php include'assets/inc/top_bleu.php'; ?>

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Archives des messages lus</h2>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <form action="../../traitement/contact_admin.trait.php" method="post">
                 <div style="width:90%;">
                     <table id="tableau" class="table table-striped table-bordered" style="width:100%">
                         <thead>
                             <tr>
                                 <th>Nom</th>
                                 <th>Adresse mail</th>
                                 <th>Sujet</th>
                                 <th>Message</th>
                                 <th>Répondre</th>
                                 <th>Récupérer</th>
                             </tr>
                         </thead>
                         <tbody>

                           <?php
                             $req = $un_contact->select_contact_oui($conn);
                             while ($res = $req->fetch())
                             {
                               $nom = $res['nom_contact'];
                               $adresse_mail = $res['adresse_mail_contact'];
                               $sujet = $res['sujet_contact'];
                               $message = $res['message_contact'];
                               $id_contact = $res['id_contact'];
                               ?>
                               <tr>
                                 <td><?php echo $nom ?></td>
                                 <td><?php echo $adresse_mail ?></td>
                                 <td><?php echo $sujet ?></td>
                                 <td><?php echo $message ?></td>
                                 <td><a href="mailto:<?php echo $adresse_mail ?>"><span class="badge badge-pill badge-info">Répondre</span></a></td>
                                 <td style="text-align:center"><input type="checkbox" name="<?php echo "recup".$id_contact; ?>" value="<?php echo $id_contact; ?>"></td>
                               </tr>
                               <?php
                             }
                           ?>

                         </tbody>
                         <tfoot>
                             <tr>
                               <th style="text-align:center" colspan="5">Valider ?</th>
                               <th style="text-align:center"><button type="submit" name="archive_button" class="badge badge-pill badge-danger">Valider</button></th>
                             </tr>
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
