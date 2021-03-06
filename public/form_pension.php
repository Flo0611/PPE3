<?php

include'../inc/bdd.inc.php';
include'../all.class.php';



?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Pension - Centre équestre</title>
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
	<link rel="stylesheet" type="text/css" href="../css/inscription_test.util.css">
	<link rel="stylesheet" type="text/css" href="../css/inscription_test.main.css">
<!--===============================================================================================-->

<link rel="stylesheet" href="../css/inscription_bootstrap.css">
<!-- Bootstrap-Core-CSS -->
<!-- <link rel="stylesheet" href="../css/style_nav_insc.css" type="text/css" media="all" /> -->
<!-- Style-CSS -->
<!-- font-awesome-icons -->
<link href="../css/font-awesome.css" rel="stylesheet">
<!-- //font-awesome-icons -->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">



</head>
<body>
	<?php include'../inc/nav_public.php'; ?>
	<div class="limiter">
		<div class="container-login100" >
			<div class="wrap-login100">
				<?php
				$id_pension = $_GET['pension'];
				?>
				<form class="login100-form validate-form" method="post" action="../traitement/Form_pension_contact.php?id_pension=<?php echo $id_pension ?>">

					<span class="login100-form-title p-b-34 p-t-27">
						Inscription Pension
					</span>


					<div class="wrap-input100 validate-input" data-validate="Veuillez saisir un nom">
						<span class="label-input100">Nom Cheval</span>
						<input class="input100" type="text" name="nom_che" placeholder="Entrez votre nom...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input float" data-validate="Veuillez saisir un prénom">
						<span class="label-input100">Prénom Cheval </span>
						<input class="input100" type="text" name="prenom_che" placeholder="Entrez votre prénom...">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Veuillez entrer une date">
						<span class="label-input100">Date de naissance Cheval</span>
						<input class="input100" type="date" name="ddn_che" placeholder="Entrez la date de naissance du cheval...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input float">
						<span class="label-input100">Race du cheval</span><br>
						<select class="select" name="race_che">
                         <?php
							$une_race = new race_chevaux(" ", " ");
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
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Veuillez entrer votre numéro de téléphone">
						<span class="label-input100">Sexe </span><br>
                        <select class="select" name="sexe_che">
               			<option value="nul" selected>Choisissez une option...</option>
               			<option value="male">Mâle</option>
               			<option value="femelle">Femelle</option>
             			</select>
						<span class="focus-input100"></span>
					</div>


					<div class="flex-m w-full p-b-33">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								<span class="txt1">
									J'accepte les
									<a href="#" class="txt2 hov1">
										termes d'utilisation
									</a>
								</span>
							</label>
						</div>


					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="envoyer">
								Envoyer formulaire
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>

	<?php include'../inc/footer_public.php'; ?>

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

</body>
</html>
