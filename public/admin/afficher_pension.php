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
<?php

 $id_pension = $_POST['name'];
 $req_lib_pens = $une_pension->select_pension_by_id($id_pension, $conn);
 $res_lib_pens = $req_lib_pens->fetch();

 $lib_pension = $res_lib_pens['lib_pension']; //libellé de la pension
   ?>
   <br>
   <table id="tableau" class="table table-striped table-bordered" style="width:100%; z-index:0">
       <thead>
           <tr>
               <th>Pension</th>
               <th>Nom du cheval</th>
               <th>Prenom du cheval</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>

         <?php
         $req_id_che = $un_box->select_id_cheval($id_pension, $conn);
         while ($res_id_che = $req_id_che->fetch())
         {
           $id_box = $res_id_che['id_box'];
           $id_cheval = $res_id_che['id_cheval'];

           $req_n_p_c = $un_cheval->select_nom_chevaux_by_id($id_cheval, $conn);
           $res_n_p_c = $req_n_p_c->fetch();
           $nom_che = $res_n_p_c['nom_chevaux'];
           $prenom_che = $res_n_p_c['prenom_chevaux'];
         ?>
             <tr>
               <td><?php echo $lib_pension ?></td>
               <td><?php echo $prenom_che ?></td>
               <td><?php echo $nom_che ?></td>
               <td><a href="../../traitement/ajout_pension.trait.php?action=supprimer&id=<?php echo $id_box ?>"><i style="color:red" class="fa fa-minus-circle fa-2x"></i></a></td>
               </tr>
             <?php
           }
         ?>

       </tbody>
   </table>

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
