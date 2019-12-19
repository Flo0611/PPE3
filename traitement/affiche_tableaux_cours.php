<?php
ini_set("display_errors", "on");
session_start();
include'../inc/bdd.inc.php';
include'../all.class.php';
$un_jour = new jour(" ", " ");
$une_horaire = new horaires(" ", " ");
$un_cour = new cours(" ", " ", " ", " ", " ", " "," ");
$un_galop = new galop(" "," ");
$id_jour = $_POST['name'];
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Ajouter un cours</title>

   <link href='https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css' />

   <link href='https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json' rel='stylesheet' type='text/css' />


    <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


 </head>
 <body>

   <br>
   <table id="tableau" class="table table-striped table-bordered" style="width:100%; z-index:0">
       <thead>
           <tr>
               <th>Jour</th>
               <th>Cours</th>
               <th>Horraires</th>
               <th>Galop</th>
               <th>Action</th>
           </tr>
       </thead>
       <tbody>

         <?php
         $req_cour_detail = $un_cour->select_cours_jour($id_jour, $conn);
         while ($res_cour_detail = $req_cour_detail->fetch())
         {
           $id_cours = $res_cour_detail['id_cours'];
           $titre_cours = $res_cour_detail['titre_cours'];
           $heure_debut = $res_cour_detail['debut_cours'];
           $fin_cours = $res_cour_detail['fin_cours'];
           $galop_cours = $res_cour_detail['id_galop'];
           $jour_cours = $res_cour_detail['jour_cours'];

             include'../inc/cours_convert_string.php';

             $debut_horaires = $res_debut['lib_horaires'];

             $fin_horaires = $res_fin['lib_horaires'];

             $lib_galop = $res_galop['lib_galop'];

             $lib_jour = $res_jour['lib_jour'];
          ?>
             <tr>
               <td><?php echo $lib_jour ?></td>
               <td><?php echo $titre_cours ?></td>
               <td><?php echo $debut_horaires."-".$fin_horaires ?></td>
               <td><?php echo $lib_galop ?></td>
               <td><a href="../../traitement/gestion_cours.trait.php?action=supprimer&id_cours=<?php echo $id_cours ?>"><i style="color:red" class="fa fa-minus-circle fa-2x"></i></a></td>
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
