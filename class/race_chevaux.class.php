<?php

Class race_chevaux
{
	private $id_race_chevaux;
  private $lib_race_chevaux;

	Public function __construct($i, $n)
    {
      $this->id_race_chevaux = $i;
      $this->lib_race_chevaux = $n;
    }


//*****************************************GETTER**********************************


Public function get_id_race_chevaux()
	{
		Return $this->id_race_chevaux;
  }

Public function get_lib_race_chevaux()
	{
		Return $this->lib_race_chevaux;
  }



  //*****************************************SETTER**********************************

Public function set_id_race_chevaux($i)
	{
		$this->id_race_chevaux = $i;
  }

Public function set_lib_race_chevaux($n)
	{
		$this->lib_race_chevaux = $n;
  }



//***********************************Function******************************

public function ajout_race_cheval($lib_race_chevaux, $conn)
{
  $sql = "INSERT INTO race_chevaux (id_race_chevaux, lib_race_chevaux) VALUES(NULL, '$lib_race_chevaux')";
  $req = $conn->query($sql);
  return $req;
}

public function select_race_chevaux($conn)
{
	$sql = "SELECT * from race_chevaux";
	$req = $conn->query($sql);
	return $req;
}

public function select_lib_race_chevaux($id_race, $conn)
{
	$sql = "SELECT lib_race_chevaux from race_chevaux where id_race_chevaux = '$id_race'";
	$req = $conn->query($sql);
	return $req;
}

public function max_id($conn)
{
	$sql = "SELECT max(id_race_chevaux) as max_id from race_chevaux";
	$req = $conn->query($sql);
	return $req;
}

public function supr_race($id_race, $conn)
{
	$sql = "DELETE FROM race_chevaux WHERE id_race_chevaux = $id_race";
	$req = $conn->query($sql);
	return $req;
}

public function compte_nb_race($conn)
{
	$sql = "SELECT COUNT(*) as nb FROM race_chevaux";
	$req = $conn->query($sql);
	return $req;
}



}
?>
