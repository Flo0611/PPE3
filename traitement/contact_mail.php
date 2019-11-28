<?php
include'../inc/bdd.inc.php';
require_once'../all.class.php';

$un_contact = new contact(" ", " ", " ", " ", " ");

if(isset($_POST['envoyer'])){
    $sujet = $_POST['sujet'];
    $nom = $_POST['nom'];
    $adresse_mail = $_POST['adresse_mail'];
    $message = $_POST['message'];

    $email = "centre.equestre.brive@myd0main.fr";

    $to = "$email"; //On envoi le mail a l'adresse mail rentrée avec le formulaire
    $email_subject = "$sujet";
    $email_body = "Un email a été recu depuis la page contact. Voici le resumer : \n
                  Le message a été envoye par : $nom \n
                  L'adresse email renseignee est : $adresse_mail \n
                  Le sujet du message est : $sujet\n
                  Voici le message : $message \n\n
                  Cordialement, \n
                  Le centre equestre de Brive.";
    $headers = "From: Centre equestre - Page contact\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    mail($to,$email_subject,$email_body,$headers);


    $req = $un_contact->ajouter_contact($nom, $adresse_mail, $sujet, $message, $conn);

    header("location:../public/contact.php?success=mail_envoyer");
}
else
{
  header("location:../index.php");
}
?>
