<?php

Class stage
{
  private $id_stage;
  private $date_stage;
  private $heure_stage;
  private $des_stage;
  private $heure_fin_stage;
  private $pdfst;
  private $galopst;
  private $titrest;
  private $photost;

  Public function __construct($i, $date_s, $h_d, $des_s, $h_f, $pdf_s, $gal_s, $tit_s, $pht_s)
  {
    $this->id_stage = $i;
    $this->date_stage = $date_s;
    $this->heure_stage = $h_d;
    $this->des_stage = $des_s;
    $this->heure_fin_stage = $h_f;
    $this->pdfst = $pdf_s;
    $this->galopst = $gal_s;
    $this->titrest = $tit_s;
    $this->photost= $pht_s;

  }

  //*******************************GETTER************************************

  Public function get_id_stage()
  {
    Return $this->id_stage;
  }

  Public function get_date_stage()
  {
    Return $this->date_stage;
  }

  Public function get_heure_stage()
  {
    Return $this->heure_stage;
  }

  Public function get_des_stage()
  {
    Return $this->des_stage;
  }

  Public function get_heure_fin_stage()
  {
    Return $this->heure_fin_stage;
  }

  Public function get_pdfst()
  {
    Return $this->pdfst;
  }

  Public function get_galopst()
  {
    Return $this->galopst;
  }

  Public function get_titrest()
  {
    Return $this->titrest;
  }

  Public function get_photost()
  {
    Return $this->photost;
  }



  //*******************************SETTER************************************


  Public function set_id_stage($i)
  {
    $this->id_stage = $i;
  }

  Public function set_date_stage($date_s)
  {
    $this->date_stage = $date_s;
  }

  Public function set_heure_stage($h_d)
  {
    $this->heure_stage = $h_d;
  }

  Public function set_des_stage($des_s)
  {
    $this->des_stage = $des_s;
  }

  Public function set_heure_fin_stage($h_f)
  {
    $this->heure_fin_stage = $h_f;
  }

  Public function set_pdfst($pdf_s)
  {
    $this->pdfst = $pdf_s;
  }

  Public function set_galopst($gal_s)
  {
    $this->galopst = $gal_s;
  }

  Public function set_titrest($tit_s)
  {
    $this->titrest = $tit_s;
  }

  Public function set_photost($pht_s)
  {
    $this->photost = $pht_s;
  }

  //*******************************Function************************************


  public function select_stage($conn)
  {
    $sql = "SELECT * from stage";
    $req = $conn->query($sql);
    return $req;
}

public function ajouter_stages($date_stage, $heure_stage, $heure_fin_stage, $pdfst, $galopst, $titrest, $photost, $conn)
{
  $sql = "INSERT INTO stage (id_stage, date_stage, heure_stage, des_stage, heure_fin_stage, pdfst, galopst, titrest, photost) VALUES(NULL, '$date_stage','$date_stage','$heure_stage', '$des_stage', '$heure_fin_stage','$pdfst','$galopst','$titrest','$photost')";
  $req = $conn->query($sql);
  return $req;
}




}


?>
