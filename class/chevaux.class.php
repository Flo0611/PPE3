<?php

  class chevaux
  {
    private $id_cheval;
    private $nom_cheval;
    private $prenom_cheval;
    private $sexe_cheval;
    private $race_cheval;
    private $daten_cheval;
    private $datea_cheval;
    private $photo_cheval;
    private $type_pension;

    function __construct($i, $n, $p, $s, $r, $d_n, $d_a, $photo, $pension)
    {
      $this->id_cheval = $i;
      $this->nom_cheval = $n;
      $this->prenom_cheval = $p;
      $this->sexe_cheval = $s;
      $this->race_cheval = $r;
      $this->daten_cheval = $d_n;
      $this->datea_cheval = $d_a;
      $this->photo_cheval = $photo;
      $this->type_pension = $pension;
    }

    //*****************************************GETTER**********************************


    Public function get_id_cheval()
    	{
    		Return $this->id_cheval;
      }

    Public function get_nom_cheval()
    	{
    		Return $this->nom_cheval;
      }

    Public function get_prenom_cheval()
    	{
    		Return $this->prenom_cheval;
      }

    Public function get_sexe_cheval()
    	{
    		Return $this->sexe_cheval;
      }

    Public function get_race_cheval()
    	{
    		Return $this->race_cheval;
      }

    Public function get_daten_cheval()
    	{
    		Return $this->daten_cheval;
      }

    Public function get_datea_cheval()
    	{
    		Return $this->datea_cheval;
      }

    Public function get_photo_cheval()
    	{
    		Return $this->photo_cheval;
      }

    Public function get_pension_cheval()
    	{
    		Return $this->type_pension;
      }

      //*****************************************SETTER**********************************

    Public function set_id_cheval($i)
    	{
    		$this->id_cheval = $i;
      }

    Public function set_nom_cheval($n)
    	{
    		$this->nom_cheval = $n;
      }

    Public function set_prenom_cheval($p)
    	{
    		$this->prenom_cheval = $p;
      }

    Public function set_sexe_cheval($s)
    	{
    		$this->sexe_cheval = $s;
      }

    Public function set_race_cheval($r)
    	{
    		$this->race_cheval = $r;
      }

    Public function set_daten_cheval($d_n)
    	{
    		$this->daten_cheval = $d_n;
      }

    Public function set_datea_cheval($d_a)
    	{
    		$this->datea_cheval = $d_a;
      }

    Public function set_photo_cheval($photo)
    	{
    		$this->photo_cheval = $photo;
      }

    Public function set_pension_cheval($pension)
    	{
    		$this->type_pension = $pension;
      }

//***********************************Function******************************
Public function ajouter_chevaux($nom, $prenom, $sexe, $race, $date_n, $datea, $conn)
  {
    $sql = "INSERT INTO chevaux (id_chevaux, nom_chevaux, prenom_chevaux, sexe_chevaux, race_chevaux, daten_chevaux, datea_chevaux) VALUES(NULL,'$nom', '$prenom', '$sexe', '$race', '$date_n', '$datea')";
    $req = $conn->query($sql);
    return $req;
  }

public function modifier_photo($id_che, $id_photo, $conn)
{
  $sql = "UPDATE chevaux SET photo_chevaux = '$id_photo' where id_chevaux = '$id_che'";
  $req = $conn->query($sql);
  return $req;
}

public function select_chevaux($conn)
{
  $sql = "SELECT id_chevaux, nom_chevaux, prenom_chevaux, sexe_chevaux, race_chevaux, daten_chevaux, datea_chevaux, photo_chevaux from chevaux";
  $req = $conn->query($sql);
  return $req;
}

public function modifier_cheval($id_che, $nom, $prenom, $sexe, $race, $daten, $datea, $conn)
{
  $sql = "UPDATE chevaux SET nom_chevaux = '$nom', prenom_chevaux = '$prenom', sexe_chevaux = '$sexe', race_chevaux = '$race', daten_chevaux = '$daten', datea_chevaux = '$datea' where id_chevaux = '$id_che'";
  $req = $conn->query($sql);
  return $req;
}

public function compte_nb_chevaux($conn)
{
  $sql = "SELECT COUNT(*) as nb FROM chevaux";
  $req = $conn->query($sql);
  return $req;
}

public function select_by_id_limit3_chevaux($conn)
{
  $sql = "SELECT id_chevaux, nom_chevaux, prenom_chevaux, sexe_chevaux, race_chevaux, daten_chevaux, datea_chevaux, photo_chevaux from chevaux limit 3";
  $req = $conn->query($sql);
  return $req;
}

public function select_photo_cheval_by_id($id_cheval, $conn)
{
  $sql = "SELECT photo_chevaux from chevaux where id_chevaux = '$id_cheval'";
  $req = $conn->query($sql);
  return $req;
}

  }

?>
