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


<?php
include'../inc/bdd.inc.php';
include'../all.class.php';
  if (isset($_POST['inscription_newsletter']))
  {
    $une_newsletter = new news_letter(" ", " ");
    $email = $_POST['mail'];
    $req = $une_newsletter->select_news_by_mail($email, $conn);
    $res = $req->fetch();
    $nb = $res['nb_news'];
    if ($nb == 0)
    {
      $une_newsletter->ajouter_news_letter($email, $conn);
      header("location:../index.php?news=inscrit");
    }
    else
    {
      header("location:../index.php?news=mail_existe");
    }
  }
?>
