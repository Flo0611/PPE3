<?php

  $req_debut = $une_horaire->select_horaires_by_id($heure_debut, $conn); //lib debut horaires
  $res_debut = $req_debut->fetch();

  $req_fin = $une_horaire->select_horaires_by_id($fin_cours, $conn); //lib fin horaires
  $res_fin = $req_fin->fetch();

  $req_galop = $un_galop->select_galop_by_id($galop_cours, $conn);
  $res_galop = $req_galop->fetch();

  $req_jour = $un_jour->select_jour_by_id($jour_cours, $conn);
  $res_jour = $req_jour->fetch();

  $debut_horaires = $res_debut['lib_horaires'];

  $fin_horaires = $res_fin['lib_horaires'];

  $lib_galop = $res_galop['lib_galop'];

  $lib_jour = $res_jour['lib_jour'];
?>
