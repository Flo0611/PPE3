<?php

Class galop
{
	private $id_galop;
  private $lib_galop;

	Public function __construct($id_g, $lib_g)
    {
      $this->id_galop = $id_g;
      $this->lib_galop = $lib_g;
    }


//*****************************************GETTER**********************************


Public function get_id_galop()
	{
		Return $this->id_galop;
  }

Public function get_lib_galop()
	{
		Return $this->lib_galop;
  }



  //*****************************************SETTER**********************************

Public function set_id_galop($id_g)
	{
		$this->id_race_chevaux = $id_g;
  }

Public function set_lib_race_chevaux($lib_g)
	{
		$this->lib_galop= $lib_g;
  }



//***********************************Function******************************

public function ajout_galop($lib_galop, $conn)
{
  $sql = "INSERT INTO galop (id_galop, lib_galop) VALUES(NULL, '$lib_galop')";
  $req = $conn->query($sql);
  return $req;
}

public function select_galop($conn)
{
  $sql = "SELECT * from galop";
  $req = $conn->query($sql);
  return $req;

}

}
