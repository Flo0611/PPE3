<?php
ini_set("display_errors", "off");
include'../inc/bdd.inc.php';
include'../all.class.php';
$un_jour = new jour(" ", " ");
$une_horaire = new horaires(" ", " ");
$un_cours = new cours(" ", " ", " ", " ", " "," ", " ");
$un_galop = new galop(" ", " ");
$une_inscription_cours = new inscription_cours(" ", " ", " ");
?>
<!DOCTYPE html>
<html>
<title>Cours - Centre équestre</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/planning.css">
<link rel="stylesheet" href="../css/bootstrap.css">
<script src="../js/cours.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<body>
<?php include'../inc/nav_public.php'; ?>


<div class="w3-bar w3-black">

<?php

$req_jour = $un_jour->select_jour($conn);
while ($res_jour = $req_jour->fetch())
{
  $id_jour = $res_jour['id_jour'];
  $lib_jour = $res_jour['lib_jour'];

  ?>

  <button class="w3-bar-item w3-button" onclick="affiche_jour(<?php echo $id_jour ?>)" ><?php echo $lib_jour ?></button>

<?php
}

?>

</div>

<?php
if ($_GET['success'] == "ajouter")
{
  ?>
  <div class="alert alert-success" role="alert" >
    Vous êtes bien inscris au cours choisis.
  </div>
  <?php
}
?>

<?php
if ($_GET['success'] == "supprimer")
{
  ?>
  <div class="alert alert-info" role="alert" >
    Vous avez bien annuler votre inscription.
  </div>
  <?php
}
?>

<?php
if ($_GET['erreur'] == "existe")
{
  ?>
  <div class="alert alert-danger" role="alert" >
    Vous êtes déjà inscris au cours.
  </div>
  <?php
}
?>


<div id="Contenu" style="margin-top:3%;"></div>

<div id="hide">

  <?php
  $jour_cours = 1;
  $req_jour = $un_jour->select_jour_by_id($jour_cours, $conn);
  $res_jour = $req_jour->fetch();
  $lib_jour = $res_jour['lib_jour'];
  ?>
  <div id="conteneur" style="margin-bottom:10%;">



  <h2 style="text-align:center"><span class="pink">Planning Cours</span></h2>


  <div id="<?php echo $lib_jour ?>" class="w3-container jour">
    <h2 style="margin:2%;text-align:center"><span class="pink"><?php echo $lib_jour ?></span></h2>


    <table border="1" style="width:90%; text-align:center; margin-left:auto; margin-right:auto;">
      <tr style="height: 50px;">
        <td>horaire</td>
        <td>Cours</td>
        <td>Galop requis</td>
        <td>Inscription</td>
      </tr>
  <?php

  $req_cours = $un_cours->select_cours_jour_filtre($jour_cours, $conn);
  while ($res_cours = $req_cours->fetch())
  {
  $id_cours = $res_cours['id_cours'];
  $titre_cours = $res_cours['titre_cours'];
  $heure_debut =$res_cours['debut_cours'];
  $fin_cours = $res_cours['fin_cours'];
  $galop_cours = $res_cours['id_galop'];

  include'../inc/cours_convert_string.php';
  ?>
  <tr style="height: 50px;">
    <td><?php echo $debut_horaires." - ".$fin_horaires ?></td>
    <td><?php echo $titre_cours ?></td>
    <td><?php echo $lib_galop ?></td>
    <td>
      <?php
      if (isset($_SESSION['admin']) OR isset($_SESSION['super_admin']) OR isset($_SESSION['admin']))
      {
        $id_membre = $_SESSION['id_membre'];
        $req_insc = $une_inscription_cours->verif_existe_cours($id_membre, $id_cours, $conn);
        $res_insc = $req_insc->fetch();
        $req_inscription = $une_inscription_cours->select_cours_by_id($id_membre, $id_cours, $conn);
        $res_inscription = $req_inscription->fetch();
        $id_inscription = $res_inscription['id_inscription_cours'];
        $nb = $res_insc['nb'];
        if ($nb != 0)
        {
          ?>
          <form action="../traitement/inscription_cours.trait.php?action=annuler&id_insc_cours=<?php echo $id_inscription ?>" method="post">
            <button type="submit" class="btn btn-warning" style="margin-top:3%; margin-bottom:3%;">Se désinscrire</button>
          </form>
          <?php
        }
        else
        {
        ?>
        <form action="../traitement/inscription_cours.trait.php?action=ajouter&id_membre=<?php echo $id_membre ?>&id_cours=<?php echo $id_cours?>" method="post">
          <button type="submit" class="btn btn-warning" style="margin-top:3%; margin-bottom:3%;">S'inscrire</button>
        </form>
        <?php
        }
      }
      else
      {
        ?>
        <button type="button" class="btn btn-warning" disabled style="margin-top:3%;">S'inscrire</button>
        <p style="color:red; opacity:0.5;">Veuillez vous connecter</p>
        <?php
      }
      ?>
    </td>
  </tr>

        <!--***************************Matin******************************* -->


        <?php
      }
      ?>
      </table>
    </div>




  </div>
</div>

<?php include'../inc/footer_public.php'; ?>

</body>
</html>
