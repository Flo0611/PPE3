<?php
ini_set("display_errors", "on");
session_start();
include'../inc/bdd.inc.php';
require_once'../all.class.php';

$un_membre = new membre(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ");

$adresse_mail = $_POST['adresse_mail_conn']; //adresse mail ou id rentrer dans le formulaire de la page d'avant
$mdp = $_POST['mdp_conn']; //mot de passe rentrer dans la page d'avant

if (isset($_POST['connexion'])) //test si on appuie sur le bouton se connecter
{
  if (!empty($_POST['adresse_mail_conn']) && !empty($_POST['mdp_conn'])) //test si les cases sont remplis (mot de passe et identifiant)
  {
    $req = $un_membre->compte_email_membre($adresse_mail, $conn);
  	$nombre_membre = $req->fetch();
    if ($nombre_membre['nb'] == 0) //si il n'y a pas de lignes, l'identifiant n'existe pas
    {
    header("location:../public/connexion.php?erreur=adresse_mail"); //l'adresse mail n'exsite pas
    }
    else
    {
      $req_mdp = $un_membre->mdp_niveau_membre($adresse_mail, $conn);
      while ($res = $req_mdp->fetch()) //sinon tant qu'il y a des resultats on recupere le mot de passe qui correspond dans la bdd
      {
        $mdp_bdd = $res['mdp_membre'];
        $niveau_acces = $res['niveau_acces_membre'];
        $nom_membre = $res['nom_membre'];
        $prenom_membre = $res['prenom_membre'];
        $id_membre = $res['id_membre'];
      }
      if ($mdp == $mdp_bdd) // on test si le mdp de la bdd correspond avec le mdp rentrer dans la page d'avant
      {
        if ($niveau_acces == "1")
        {
          $_SESSION['membre_connecter'] = "oui";
          $_SESSION['nom'] = $nom_membre;
          $_SESSION['prenom'] = $prenom_membre;
          $_SESSION['id_membre'] = $id_membre;
        }

        if ($niveau_acces == "2")
        {
          $_SESSION['admin'] = "oui";
          $_SESSION['nom'] = $nom_membre;
          $_SESSION['prenom'] = $prenom_membre;
          $_SESSION['id_membre'] = $id_membre;
        }

        if ($niveau_acces == "3")
        {
          $_SESSION['super_admin'] = "oui";
          $_SESSION['nom'] = $nom_membre;
          $_SESSION['prenom'] = $prenom_membre;
          $_SESSION['id_membre'] = $id_membre;
        }
        header("location:../index.php?success=connecter"); //si ca correspond on est bien connecter
      }
      else
      {
      header("location:../public/connexion.php?erreur=mdp_faux"); // sinon le mdp ne correspond pas
      }
    }
  }
  else
  {
  header("location:../public/connexion.php?erreur=remplissage");//si les cases ne sont pas remplis (le 2eme if)
  }

}
?>
