<?php
session_start();
if (!isset($_SESSION['admin']) OR isset($_SESSION['super_admin']))
{
	header("location:../../index.php");
}

include'../inc/bdd.inc.php';
include'../all.class.php';
$une_maladie = new maladie(" ", " ");
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Maladie - Centre équestre</title>

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
    <link href="../css/font-awesome.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  	<link href='https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css' />

  	<link href='https://cdn.datatables.net/plug-ins/1.10.20/i18n/French.json' rel='stylesheet' type='text/css' />

  </head>
  <body>
    <?php
    include'../inc/nav_public.php';

    if ($_GET['success'] == "ajout")
    {
      ?>
      <div class="alert alert-success" role="alert">
        La maladie a bien été ajoutée.
      </div>
      <?php
    }

    if ($_GET['erreur'] == "champs")
    {
      ?>
      <div class="alert alert-danger" role="alert">
        Veuillez remplir tous les champs.
      </div>
      <?php
    }

    if ($_GET['success'] == "suppression")
    {
      ?>
      <div class="alert alert-warning" role="alert">
        La maladie a bien été supprimer.
      </div>
      <?php
    }
    ?>

    <div id="container" style="margin-bottom:6%; padding:5%;">

      <?php
        if ($_GET['action'] == "modification")
        {
          $id_maladie = $_GET['id'];
          $req_maladie = $une_maladie->select_maladie($id_maladie, $conn);
          $res_maladie = $req_maladie->fetch();
          $lib_maladie = $res_maladie['lib_maladie'];
          ?>
            <h1>Modifier une maladie</h1>
            <form action="../traitement/maladie.trait.php" method="post">
              <input type="text" id="lib_maladie" name="lib_maladie" value="<?php echo $lib_maladie ?>"><br><br>
              <input type="hidden" value="<?php echo $id_maladie ?>" name="id_maladie">
              <button type="submit" class="btn btn-warning" name="modifier">Modifier</button>
            </form>

            <form action="vierge.php" method="post">
            <button type="submit" class="btn btn-success" name="annuler" style="margin-top:-6%; margin-left:13%;">Annuler</button><br><br>
          </form>
          <?php
        }
        else
        {
          ?>
            <h1>Ajouter une maladie</h1>
            <form action="../traitement/maladie.trait.php" method="post">
              <input type="text" id="lib_maladie" name="lib_maladie" placeholder="Entrez le nom de la maladie"><br><br>
              <button type="submit" class="btn btn-success" name="valider">Valider</button><br><br>
            </form>
          <?php
        }
      ?>
      <h1>Maladies listées</h1>
      <table id="tableau" class="table table-striped table-bordered" style="width:100%; z-index:0">
          <thead>
              <tr>
                  <th>libellé maladie</th>
                  <th>Modifier</th>
                  <th>Supprimer</th>
              </tr>
          </thead>
          <tbody>

            <?php
              $req = $une_maladie->select_all_maladies($conn);
              while ($res = $req->fetch())
              {
                $id_maladie = $res['id_maladie'];
                $lib_maladie = $res['lib_maladie'];
                ?>
                <tr>
                  <td><?php echo $lib_maladie ?></td>
                  <td><a href="../traitement/maladie.trait.php?action=modifier&id=<?php echo $id_maladie ?>"><i style="color:orange" class="fas fa-edit fa-2x"></i></a></td>
                  <td><a href="../traitement/maladie.trait.php?action=supprimer&id=<?php echo $id_maladie ?>"><i style="color:red" class="fa fa-minus-circle fa-2x"></i></a></td>
                  </tr>
                <?php
              }
            ?>

          </tbody>
      </table>
    </div>



    <?php
    include'../inc/footer_public.php';
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
