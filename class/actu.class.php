<?php

Class actu
{
	private $id_actu;
  private $nom_actu;
  private $prenom_actu;
  private $text_actu;
  private $lien_actu;
  private $photo_actu;
  private $date_actu;

	Public function __construct($i, $n, $p, $t, $l, $photo, $d)
    {
      $this->id_actu = $i;
      $this->nom_actu = $n;
      $this->prenom_actu = $p;
      $this->text_actu = $t;
      $this->lien_actu = $l;
      $this->photo_actu = $photo;
      $this->date_actu = $d;
    }


//*****************************************GETTER**********************************


Public function get_id_actu()
	{
		Return $this->id_actu;
  }

Public function get_nom_actu()
	{
		Return $this->nom_actu;
  }

Public function get_prenom_actu()
	{
		Return $this->prenom_actu;
  }

Public function get_text_actu()
	{
		Return $this->text_actu;
  }

Public function get_lien_actu()
	{
		Return $this->lien_actu;
  }

Public function get_photo_actu()
	{
		Return $this->photo_actu;
  }

Public function get_date_actu()
	{
		Return $this->date_actu;
  }


  //*****************************************SETTER**********************************

Public function set_id_actu($i)
	{
		$this->id_actu = $i;
  }

Public function set_nom_actu($n)
	{
		$this->nom_actu = $n;
  }

Public function set_prenom_actu($p)
	{
		$this->prenom_actu = $p;
  }

Public function set_text_actu($t)
	{
		$this->text_actu = $t;
  }

Public function set_lien_actu($l)
	{
		$this->lien_actu = $l;
  }

Public function set_photo_actu($photo)
	{
		$this->photo_actu = $photo;
  }

Public function set_date_actu($d)
	{
		$this->date_actu = $d;
  }

//***********************************Function******************************
Public function ajouter_actu($nom_actu, $prenom_actu, $text_actu, $lien_actu, $photo_actu, $date_actu, $conn)
{
	$sql = "INSERT INTO actu (id_actu, nom_actu, prenom_actu, text_actu, lien_actu, photo_actu, date_actu) VALUES(NULL,'$nom_actu', '$prenom_actu', '$text_actu', '$lien_actu', '$photo_actu', '$date_actu')";
	$req = $conn->query($sql);
	return $req;
}

public function select_actu_recente($conn)
{
	$sql = "SELECT id_actu, nom_actu, prenom_actu, text_actu, lien_actu, photo_actu, date_actu FROM actualites order by id_actu desc limit 0,5 ";
	$req = $conn->query($sql);
	return $req;
}


}
?>
