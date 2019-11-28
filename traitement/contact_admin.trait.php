<?php
include'../all.class.php';
include'../inc/bdd.inc.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php

    $un_contact = new contact(" ", " ", " ", " ", " ");

    $req = $un_contact->max_id($conn);
    $nombre = $req->fetch();
    $nb_contact = $nombre['max_id'];
    echo "L'id max est ".$nb_contact."<br>";
    if (isset($_POST['lu_button']))
    {
      for ($i=0; $i <= $nb_contact; $i++)
      {
        echo $_POST['lu_cocher'.$i];
        if(isset($_POST['lu_cocher'.$i]))
        {
          $un_contact->msg_lu($i, $conn);
          echo "L'id ".$i." a bien été modifier <br>";
        }
      }
      header("location:../public/admin/form_contact.php");
    }

if (isset($_POST['archive_button']))
{
  for ($i=0; $i <= $nb_contact; $i++)
  {
    echo $_POST['recup'.$i];
    if(isset($_POST['recup'.$i]))
    {
      $un_contact->msg_recup($i, $conn);
      echo "L'id ".$i." a bien été récupérer <br>";
    }
  }
  header("location:../public/admin/archives_msg.php");
}


    ?>

  </body>
</html>
