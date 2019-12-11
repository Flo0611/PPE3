<?php

Class note
{
	private $id_note;
  private $id_cheval;
  private $nb_etoile;
	private $id_membre;

	Public function __construct($i, $i_c, $nb, $i_m)
    {
      $this->id_note = $i;
      $this->id_cheval = $i_c;
      $this->nb_etoile = $nb;
			$this->id_membre = $i_m;
    }


//*****************************************GETTER**********************************


Public function get_id_note()
	{
		Return $this->id_note;
  }

Public function get_id_cheval()
	{
		Return $this->id_cheval;
  }

Public function get_nb_etoile()
	{
		Return $this->nb_etoile;
  }

Public function get_id_membre()
	{
		Return $this->id_membre;
  }


  //*****************************************SETTER**********************************

Public function set_id_note($i)
	{
		$this->id_note = $i;
  }

Public function set_id_cheval($i_c)
	{
		$this->id_cheval = $i_c;
  }

Public function set_nb_etoile($nb)
	{
		$this->nb_etoile = $nb;
  }

Public function set_id_membre($i_m)
	{
		$this->id_membre = $i_m;
  }


//***********************************Function******************************
Public function ajouter_note($id_cheval, $id_membre, $nb_etoile, $conn)
{
	$sql = "INSERT INTO note_chevaux (id_note, id_cheval, id_membre, nb_etoile) VALUES(NULL,'$id_cheval', '$id_membre', '$nb_etoile')";
	$req = $conn->query($sql);
	return $req;
}

Public function verif_exist($id_cheval, $id_membre, $conn)
{
	$sql = "SELECT id_note, count(*) as nb FROM note_chevaux where id_cheval = '$id_cheval' AND id_membre = '$id_membre' GROUP BY id_note";
	$req = $conn->query($sql);
	return $req;
}

Public function modifier_note($id_note, $nb_etoile, $conn)
{
	$sql = "UPDATE note_chevaux SET nb_etoile = '$nb_etoile' where id_note = '$id_note'";
	$req = $conn->query($sql);
	return $req;
}

Public function moyenne_cheval($id_cheval, $conn)
{
	$sql = "SELECT AVG(nb_etoile) as moyenne FROM note_chevaux where id_cheval = '$id_cheval'";
	$req = $conn->query($sql);
	return $req;
}

Public function select_nb_etoile($id_cheval, $id_membre, $conn)
{
	$sql = "SELECT id_note, nb_etoile FROM note_chevaux where id_cheval = '$id_cheval' AND id_membre = '$id_membre'";
	$req = $conn->query($sql);
	return $req;
}

}
?>
