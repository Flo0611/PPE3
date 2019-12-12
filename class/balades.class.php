<?php

Class balades
{
  private $id_balades;
  private $date_balades;
  private $heure_balades;
  private $des_balades;
  private $galopbalades;
  private $titrebalades;
  private $photobalades;
  private $duree_balades;
  private $valide;

  Public function __construct($i, $date_bal, $h_bal, $des_bal, $gal_bal, $tit_bal, $pht_bal, $duree_bal, $v)
  {
    $this->id_balades = $i;
    $this->date_balades = $date_bal;
    $this->heure_balades = $h_bal;
    $this->des_balades = $des_bal;
    $this->galopbalades = $gal_bal;
    $this->titrebalades = $tit_bal;
    $this->photobalades= $pht_bal;
    $this->duree_balades= $duree_bal;
    $this->valide= $v;

  }

  //*******************************GETTER************************************

  Public function get_id_balades()
  {
    Return $this->id_balades;
  }

  Public function get_date_balades()
  {
    Return $this->date_balades;
  }

  Public function get_heure_balades()
  {
    Return $this->heure_balades;
  }

  Public function des_balades()
  {
    Return $this->des_balades;
  }


  Public function get_galopbalades()
  {
    Return $this->galopbalades;
  }

  Public function get_titrebalades()
  {
    Return $this->titrebalades;
  }

  Public function get_photobalades()
  {
    Return $this->photobalades;
  }

Public function get_duree_balade()
{
  Return $this->duree_balades;
}

Public function get_valide_balade()
{
  Return $this->valide;
}



  //*******************************SETTER************************************


  Public function set_id_balades($i)
  {
    $this->id_balades = $i;
  }

  Public function set_date_balades($date_bal)
  {
    $this->date_balades = $date_bal;
  }

  Public function set_heure_balades($h_bal)
  {
    $this->heure_balades = $h_bal;
  }

  Public function set_des_balades($des_bal)
  {
    $this->des_balades = $des_bal;
  }


  Public function set_galopbalades($gal_bal)
  {
    $this->galopbalades = $gal_bal;
  }

  Public function set_titrebalades($tit_bal)
  {
    $this->titrebalades = $tit_bal;
  }

  Public function set_photobalades($pht_bal)
  {
    $this->photobalades = $pht_bal;
  }

  Public function set_duree_balades($duree_bal)
  {
    $this->duree_balades = $duree_bal;
  }

  Public function set_valide_balades($v)
  {
    $this->valide = $v;
  }


  //*******************************Fonctions************************************


  public function ajouter_balades($date_bal, $h_bal, $des_bal, $gal_bal, $tit_bal, $pht_bal, $duree_bal, $conn)
  {
    $sql = "INSERT INTO balades (id_bal, date_bal, heure_bal, des_bal, galop_bal, titre_bal, photo_bal, duree_balade) VALUES(NULL, '$date_bal','$h_bal','$des_bal', '$gal_bal', '$tit_bal','$pht_bal','$duree_bal')";
    $req = $conn->query($sql);
    return $req;
  }


  public function select_balades($conn)
  {
    $sql = "SELECT * from balades where valide = 'oui'";
    $req = $conn->query($sql);
    return $req;

  }

}


?>
