<?php
ini_set("display_errors", "on");
include'../inc/bdd.inc.php';

$adresse_mail = $_POST['adresse_mail'];

if (isset($_POST['confirmer']))
{
  $sql = "SELECT COUNT(email_membre) as nb FROM membre where email_membre = '$adresse_mail' ";
  $req = $conn->query($sql);
  $nombre_membre = $req->fetch();
  if ($nombre_membre['nb'] == 0) //si il n'y a pas de lignes, l'identifiant n'existe pas
  {
    header("location:../public/mdp_oublie.php?erreur=adresse_mail"); //l'adresse mail n'exsite pas
  }
  else
  {
    $sql = "SELECT (id_membre) FROM membre where email_membre = '$adresse_mail'";
    $req = $conn->query($sql);
    $res = $req->fetch();

    $id_recup = $res['id_membre'];
$to = "$adresse_mail"; //On envoi le mail a l'adresse mail rentrée avec le formulaire
    $email_subject = "Mot de passe oublie - Centre equestre de brive";
    $email_body = "Vous avez fait une demande de re-initialisation de votre mot de passe \n\n
    Pour changer votre mot de passe veuillez vous rendre sur ce lien : centre.equestre.myd0main.fr/public/changementmdp.php?15437=143&94827=65971@&1=$id_recup \n
    Cordialement, \n
    Centre equestre de Brive";
    $headers = "From: Centre equestre de Brive <centre.equestre.brive@myd0main.fr>\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    mail($to,$email_subject,$email_body,$headers);

    header("location:../public/mdp_oublie.php?success=envoyer&adresse_mail=$adresse_mail");

    //fin du mail
  }
}


?>
