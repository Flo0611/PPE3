<?php

  $un_membre = new membre(" ", " ", " ", " ", " ", " ", " ", " ", " ", " ", " ");
  $une_race = new race_chevaux(" ", " ");
  $un_contact = new contact(" ", " ", " ", " ", " ");
  $un_cheval = new chevaux(" ", " ", " ", " ", " ", " ", " ", " ");

  $req_membre = $un_membre->compte_nb_membres($conn);
  $nb_membre = $req_membre->fetch();

  $req_race = $une_race->compte_nb_race($conn);
  $nb_race = $req_race->fetch();

  $req_contact_oui = $un_contact->compte_nb_msg_oui($conn);
  $nb_contact_oui = $req_contact_oui->fetch();

  $req_contact_non = $un_contact->compte_nb_msg_non($conn);
  $nb_contact_non = $req_contact_non->fetch();

  $req_chevaux = $un_cheval->compte_nb_chevaux($conn);
  $nb_chevaux = $req_chevaux->fetch();


?>
