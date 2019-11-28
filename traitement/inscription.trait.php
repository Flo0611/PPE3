<?php
ini_set("display_errors", "on");
include'../inc/bdd.inc.php';
require_once'../all.class.php';

$un_membre = new membre(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ");

$email = $_POST['email_inscription'];
$mdp = $_POST['pass_inscription'];
$mdp_confirm = $_POST['pass_confirm_inscription'];
  if (isset($_POST['inscription_button']))
  {
    $sql = "SELECT COUNT(email_membre) as nb FROM membre where email_membre = '$email' ";
  	$req = $conn->query($sql);
  	$nombre_membre = $req->fetch();
    if ($nombre_membre['nb'] == 0)
    {
      if ($mdp == $mdp_confirm)
      {
        $prenom = $_POST['prenom_inscription'];
        $nom = $_POST['nom_inscription'];
        $email = $_POST['email_inscription'];
        $mdp = $_POST['pass_inscription'];
        $tel = $_POST['tel_inscription'];
        $adresse = $_POST['adresse_inscription'];
        $complement = $_POST['complement_inscription'];
        $date_naiss = $_POST['date_naiss_inscription'];
        $num_rue = $_POST['num_rue_inscription'];
        $code_p = $_POST['code_P'];
        $ville = $_POST['ville'];


        $un_membre->ajouter_membre($email, $mdp, $prenom, $nom, $tel, $adresse, $complement, $date_naiss, $code_p, $num_rue, $conn);

        //envoi du mail

        $to = "$email"; //On envoi le mail a l'adresse mail rentrée avec le formulaire
        $email_subject = "Confirmation d'inscription - Centre equestre de brive";
        $email_body = "Merci de vous être enregistré sur notre site ! Bienvenu parmis nous !\n\n"."Voici les détails :\n\nNom : $nom\n\n Prénom : $prenom\n\n Adresse email : $email\n\n Mot de passe : $mdp\n\n Téléphone : $tel\n\n Adresse : $adresse\n\n Complement : $complement\n\n Date de naissance : $date_naiss\n\n ";
        $headers = "From: Centre equestre de Brive <centre.equestre.brive@myd0main.fr>\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        mail($to,$email_subject,$email_body,$headers);


        //fin du mail

        header("location:../index.php?success=inscription");
      }
      else
      {
        header("location:../public/inscription.php?erreur=mdp_confirm");
      }
    }
    else
    {
      header("location:../public/inscription.php?erreur=adresse_mail");
    }
  }
else {
  header("location:../public/inscription.php?erreur=termes");
}


?>
