<?php
session_start();
if (isset($_SESSION['membre_connecter']) OR isset($_SESSION['admin']) OR isset($_SESSION['super_admin']))
{
	header("location:../index.php");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Mot de passe - Centre équestre</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
<body>
	<?php include'../inc/nav_public.php'; ?>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../images/fond_connexion.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="../traitement/mdp_oublie.trait.php">
					<span class="login100-form-logo">
            <i class="fas fa-user-lock"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Mot de passe oublié
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Entrez votre adresse mail">
						<input class="input100" type="text" name="adresse_mail" placeholder="xxxxx@xxxx.xxx">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="confirmer" type="submit">
							Confirmer
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
	if ($_GET['erreur'] == "adresse_mail")
	{
		?>
		<div class="alert alert-danger" role="alert" style="margin-top:-58.2%; margin-bottom: 48%; width: 100%; z-index:10">
			L'adresse mail rentrée n'existe pas.
		</div>
		<?php
	}

  if ($_GET['success'] == "envoyer")
	{
		?>
		<div class="alert alert-success" role="alert" style="margin-top:-58.2%; margin-bottom: 48%; width: 100%; z-index:10">
			Un email a été envoyé à l'adresse suivante : <?php echo $_GET['adresse_mail'] ?>.
		</div>
		<?php
	}
	?>

	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/connexion.main.js"></script>

<?php include'../inc/footer_public.php'; ?>
</body>
</html>
