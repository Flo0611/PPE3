<?php
session_start();
include'../../inc/icons.php';
include'../../inc/bdd.inc.php';
include'../../all.class.php';
$une_race = new race_chevaux(" ", " ");
$un_cheval = new chevaux(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ");
$une_note = new note(" ", " ", " ", " ");
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

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<link href='https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css' />

	<link href='https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json' rel='stylesheet' type='text/css' />

   <!-- GOOGLE FONTS-->
 <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
<?php
$affichage = $_POST['name'];

if ($affichage == 2)
{
  ?>
  <table id="tableau" class="table table-striped table-bordered" style="width:100%; z-index:0">
      <thead>
          <tr>
              <th>Nom cheval</th>
              <th>Prénom cheval</th>
              <th>Date de naissance</th>
              <th>Sexe</th>
              <th>Race</th>
              <th>Date arrivé</th>
              <th>Note moyenne</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>

        <?php
          $req = $un_cheval->select_chevaux($conn);
          while ($res = $req->fetch())
          {
            $id_cheval = $res['id_chevaux'];
            $nom = $res['nom_chevaux'];
            $prenom = $res['prenom_chevaux'];
            $Daten = $res['daten_chevaux'];
            $Datea = $res['datea_chevaux'];
            $sexe = $res['sexe_chevaux'];
            $race = $res['race_chevaux'];

            $req_race = $une_race->select_lib_race_chevaux($race, $conn);
            $res_race = $req_race->fetch();
            $lib_race = $res_race['lib_race_chevaux'];

            $req_note = $une_note->moyenne_cheval($id_cheval, $conn);
            $res_race = $req_note->fetch();
            $moy = $res_race['moyenne'];
            $moyenne = round($moy, 1)
            ?>
            <tr>
              <td><?php echo $nom ?></td>
              <td><?php echo $prenom ?></td>
              <td><?php echo $Daten ?></td>
              <td><?php echo $sexe ?></td>
              <td><?php echo $lib_race ?></td>
              <td><?php echo $Datea ?></td>
              <td><?php echo $moyenne ?></td>
              <td><a href="../../traitement/ajout_chevaux.trait.php?action=supprimer&id_cheval=<?php echo $id_cheval ?>"><i style="color:red" class="fa fa-minus-circle fa-2x"></i></a></td>
              </tr>
            <?php
          }
        ?>

      </tbody>
  </table>
  <?php
}
else
{
  ?>
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

 if ($_GET['succes'] == "upload")
 {
   ?>
   <div class="alert alert-info" role="alert">
     Le cheval a bien été ajouté.
   </div>
   <?php
 }


 ?>

<form action="../../traitement/ajout_chevaux.trait.php" method="post" enctype="multipart/form-data">
 <label>Prénom :</label><br>
<input type="text" name="prenom_che" placeholder="Veuillez entrer le prénom du cheval"><br>

<label class="float">Nom :</label><br>
<input type="text" name="nom_che" class="float" placeholder="Veuillez entrer le nom du cheval"><br>

<label>Date de naissance :</label><br>
<input type="text" id="datepicker" name="daten_che" placeholder="Veuillez entrer la date de naissance du cheval"><br>

<label class="float">Race :</label><br>
<select class="float select" name="race_che">
  <?php
   $req = $une_race->select_race_chevaux($conn);
   while($res = $req->fetch())
   {
     $id_race = $res['id_race_chevaux'];
     $lib_race = $res['lib_race_chevaux'];
     ?>
     <option value="<?php echo $id_race ?>"><?php echo $lib_race ?></option>
     <?php
   }
  ?>
</select>

<label>Date d'arriver au centre</label><br>
<input type="text" name="datea_che" value="<?php echo date('d\/m\/Y') ?>"><br>

<label class="float">Sexe :</label><br>
<select class="float select" name="sexe">
  <option value="nul" selected>Choisissez une option...</option>
  <option value="male">Mâle</option>
  <option value="femelle">Femelle</option>
</select>

<input type="file" name="fileToUpload" id="fileToUpload">
<button type="submit" class="btn btn-success" name="valider">Valider</button>

</form>
  <?php
}
?>

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
