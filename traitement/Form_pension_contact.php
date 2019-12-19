<?php
ini_set("display_errors","on");
include'../inc/bdd.inc.php';
require_once'../all.class.php';
session_start();
$id_membre = $_SESSION['id_membre'];

$un_contact = new contact(" ", " ", " ", " ", " ");
$un_membre = new membre(" "," "," "," "," "," "," "," "," "," "," "," ");
$une_pension = new pension(" ", " ", " ", " ", " ", " ", " ");
$une_race = new race_chevaux(" ", " ");
if(isset($_POST['envoyer'])){
    $req = $un_membre->select_by_id($id_membre,$conn);
    while($res = $req->fetch())
     {
        $nom = $res['nom_membre'];
        $adresse_mail = $res['email_membre'];
     }
    $nom_che = $_POST['nom_che'];
    $prenom_che = $_POST['prenom_che'];
    $ddn_che = $_POST['ddn_che'];
    $race_che = $_POST['race_che'];
    $sexe_che = $_POST['sexe_che'];
    $pension = $_GET['id_pension'];

    $req_race = $une_race->select_lib_race_chevaux($race_che, $conn);
    $res_race = $req_race->fetch();
    $lib_race = $res_race['lib_race_chevaux'];

    $req_pension = $une_pension->select_pension_by_id($pension, $conn);
    $res_pension = $req_pension->fetch();
    $lib_pension = $res_pension['lib_pension'];


    $message = "nom cheval:$nom_che,
     prenom cheval:$prenom_che,
      date de naissance:$ddn_che,
       race du cheval:$lib_race,
        sexe cheval:$sexe_che
        type pension:$lib_pension.";

    $email = "centre.equestre.brive@myd0main.fr";

    $to = "$email"; //On envoi le mail a l'adresse mail rentrée avec le formulaire
    $email_subject = "Pension : $nom_che";
    $email_body = "Un email a été recu depuis la page contact. Voici le resumer : \n
                  Le message a été envoye par : $nom \n
                  L'adresse email renseignee est : $adresse_mail \n
                  Le sujet du message est : Pension : $nom_che\n
                  Voici le message : $message \n\n
                  Cordialement, \n
                  Le centre equestre de Brive.";
    $headers = "From: Centre equestre - Page contact\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    mail($to,$email_subject,$email_body,$headers);

    $un_contact->ajouter_contact($nom, $adresse_mail, "Pension", $message, $conn);

    header("location:../index.php?success=form_envoyer");
}
else
{
  header("location:../index.php");
}
?>
