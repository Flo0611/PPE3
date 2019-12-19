<?php

Class stage
{
  private $id_stage;
  private $date_stage;
  private $heure_stage;
  private $description_stage;
  private $galop_stage;
  private $titre_stage;
  private $photo_stage;
  private $valide;


  Public function __construct($i, $date_s, $h_d, $des_s, $gal_s, $tit_s, $pht_s, $v)
  {
    $this->id_stage = $i;
    $this->date_stage = $date_s;
    $this->heure_stage = $h_d;
    $this->description_stage = $des_s;
    $this->galop_stage = $gal_s;
    $this->titre_stage = $tit_s;
    $this->photo_stage= $pht_s;
    $this->valide= $v;

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

  Public function get_description_stage()
  {
    Return $this->desription_stage;
  }

  Public function get_galop_stage()
  {
    Return $this->galop_stage;
  }

  Public function get_titre_stage()
  {
    Return $this->titre_stage;
  }

  Public function get_photo_stage()
  {
    Return $this->photo_stage;
  }

  Public function get_valide()
  {
    Return $this->valide;
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

  Public function set_description_stage($des_s)
  {
    $this->description_stage = $des_s;
  }

  Public function set_galopst($gal_s)
  {
    $this->galopst = $gal_s;
  }

  Public function set_titre_stage($tit_s)
  {
    $this->titre_stage = $tit_s;
  }

  Public function set_photo_stage($pht_s)
  {
    $this->photo_stage = $pht_s;
  }

  Public function set_valide($v)
  {
    $this->valide = $v;
  }


    public function select_stage($conn)
    {
      $sql = "SELECT * from stage where valide = 'oui' ORDER BY id_stage DESC";
      $req = $conn->query($sql);
      return $req;

    }


    public function ajouter_stages($date_stage, $description_stage ,$heure_stage, $galop_stage, $titre_stage, $photo_stage, $conn)
    {
      $sql = "INSERT INTO stage (id_stage, date_stage, heure_stage, description_stage, galop_stage, titre_stage, photo_stage, valide) VALUES(NULL,'$date_stage','$heure_stage',' $description_stage','$galop_stage','$titre_stage','$photo_stage','$valide')";
      $req = $conn->query($sql);
      return $req;
    }

    public function supr_stages($id_stage,$conn)
    {
      $sql = "UPDATE stage SET valide='non' WHERE id_stage = $id_stage";
      $req = $conn->query($sql);
      return $req;
    }


}


?>
