<?php

Class ville
{
  private $num_insee;
  private $cp_ville;
  private $nom_ville;

  Public function __construct($n_i, $cp, $n_v)
  {
    $this->num_insee = $n_i;
    $this->cp_ville = $cp;
    $this->nom_ville = $n_v;
  }

  //*******************************SETTER************************************

  Public function get_num_insee()
  {
    Return $this->num_insee;
  }

  Public function get_cp_ville()
  {
    Return $this->cp_ville;
  }

  Public function get_nom_ville()
  {
    Return $this->nom_ville;
  }


  //*******************************GETTER************************************


  Public function set_num_insee($n_i)
  {
    $this->num_insee = $n_i;
  }

  Public function set_cp_ville($cp)
  {
    $this->cp_ville = $cp;
  }

  Public function set_nom_ville($n_v)
  {
    $this->nom_ville = $n_v;
  }

}
?>
