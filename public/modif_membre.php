<?php
ini_set("display_errors", "on");

include'../inc/bdd.inc.php';
require_once'../all.class.php';

$id_membre = $_GET['id'];

$un_membre = new membre(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ");

$req = $un_membre->select_by_id($id_membre, $conn);
while ($res = $req->fetch()) //sinon tant qu'il y a des resultats on recupere le mot de passe qui correspond dans la bdd
{
  $prenom_membre = $res['prenom_membre'];
  $nom_membre = $res['nom_membre'];
  $email_membre = $res['email_membre'];
  $tel_membre = $res['tel_membre'];
  $adresse_membre = $res['adresse_membre'];
  $daten_membre = $res['daten_membre'];
  $complement_membre = $res['complement_membre'];
  $num_rue_membre = $res['num_rue_membre'];
  $code_p_membre = $res['code_p_membre'];
}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Centre équestre - Modifier membres</title>
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="../fonts/inscription.font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="../fonts/inscription.iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    	<link rel="stylesheet" type="text/css" href="../css/connexion.util.css">
    	<link rel="stylesheet" type="text/css" href="../css/connexion.main.css">
    <!--===============================================================================================-->

    <link rel="stylesheet" href="../css/inscription_bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="../css/style_nav_insc.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="../css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  </head>
  <body style="background-color:#EDEDED">
    <?php include'../inc/nav_public.php'; ?>
    <div style="width:600px; height:550px; background-color:orange; margin-right:auto; margin-left:auto; padding:2%; margin-top: 3%; margin-bottom:10;">
      <h1 style="font-size:1.8em; text-align:center;">Modifier mes informations</h1>
      <div style="margin-left:auto; margin-right:auto">
        <form action="../traitement/membre_admin.trait.php?action=modif_membre&id=<?php echo $id_membre ?>" method="post" style="margin-top:5%; margin-left:10%;">

          <div class="form-group" style="width:40%; float:left; ">
              <label>Nom :</label>
              <input class="form-control" name="nom" value="<?php echo $nom_membre ?>"/>
          </div>
          <div class="form-group" style="width:40%; float:left; margin-left:12%;">
              <label>Prénom :</label>
              <input class="form-control" name="prenom" value="<?php echo $prenom_membre ?>" />
          </div>

          <div class="form-group" style="width:40%; float:left; ">
              <label>Téléphone :</label>
              <input class="form-control" name="telephone" value="<?php echo $tel_membre ?>"/>
          </div>
          <div class="form-group" style="width:40%; float:left; margin-left:12%;">
              <label>Date de naissance :</label>
              <input class="form-control" name="daten" value="<?php echo $daten_membre ?>" type="date"/>
          </div>

          <div class="form-group" style="width:92%; float:left;">
              <label>Adresse mail :</label>
              <input class="form-control" name="mail" value="<?php echo $email_membre ?>" />
          </div>

          <div class="form-group" style="width:25%; float:left; ">
              <label>n° de rue :</label>
              <input class="form-control" name="num_rue" value="<?php echo $num_rue_membre ?>"/>
          </div>
          <div class="form-group" style="width:55%; float:left; margin-left:12%;">
              <label>Rue :</label>
              <input class="form-control" name="rue" value="<?php echo $adresse_membre ?>" />
          </div>

          <div class="form-group" style="width:55%; float:left; ">
              <label>Complément :</label>
              <input class="form-control" name="complement" value="<?php echo $complement_membre ?>"/>
          </div>
          <div class="form-group" style="width:25%; float:left; margin-left:12%;">
              <label>Code postal :</label>
              <input class="form-control" name="code_postal" value="<?php echo $code_p_membre ?>" />
          </div>

          <div class="form-group" style="width:25%; margin-left:auto; margin-right:auto; margin-top:10%;">
            <button type="submit" class="btn btn-warning">Valider</button>
          </div>
        </form>
      </div>
    </div>


  </body>
</html>
