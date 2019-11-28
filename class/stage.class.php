<?php

Class stage
{
  private $id_stage;
  private $date_stage;
  private $heure_stage;
  private $des_stage;
  private $heure_fin_stage;

  Public function __construct($i, $date_s, $h_d, $des_s, $h_f)
  {
    $this->id_stage = $i;
    $this->date_stage = $date_s;
    $this->heure_stage = $h_d;
    $this->des_stage = $des_s;
    $this->heure_fin_stage = $h_f;
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

}
?>
