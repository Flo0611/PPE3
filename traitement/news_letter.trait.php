<?php
include'../public/admin/assets/inc/uploads_mail.php';

$photo = $_FILES["fileToUpload"]["name"];


$pour = $_POST['to'];
$subject = $_POST['subject'];
$corps = $_POST['corps'];

$from = "centre.equestre.brive@myd0main.fr";
$to = "$pour"; //On envoi le mail a l'adresse mail rentrée avec le formulaire
$email_subject = "$subject";
$email_body = "$corps";
$headers = "From: Centre equestre\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
mail($to,$email_subject,$email_body,$headers);

echo $from."<br>".$to."<br>".$subject."<br>".$corps;
?>
