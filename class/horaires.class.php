<?php

Class horaires
{
	private $id_horaires;
  private $lib_horaires;

	Public function __construct($i, $l)
    {
      $this->id_horaires = $i;
      $this->lib_horaires = $l;
    }


//*****************************************GETTER**********************************


Public function get_id_horaires()
	{
		Return $this->id_horaires;
  }

Public function get_lib_horaires()
	{
		Return $this->lib_horaires;
  }


  //*****************************************SETTER**********************************

Public function set_id_horaires($i)
	{
		$this->id_horaires = $i;
  }

Public function set_lib_horaires($l)
	{
		$this->lib_horaires = $l;
  }



//***********************************Function******************************

Public function ajouter_horaires($lib_horaires, $conn)
{
	$sql = "INSERT INTO horaires(id_horaires, lib_horaires) VALUES(NULL, '$lib_horaires')";
	$req = $conn->query($sql);
	return $req;
}

Public function select_horaires($conn)
{
  $sql = "SELECT * FROM horaires";
  $req = $conn->query($sql);
  return $req;
}

Public function select_horaires_by_id($id_horaires, $conn)
{
  $sql = "SELECT * FROM horaires where id_horaires = '$id_horaires'";
  $req = $conn->query($sql);
  return $req;
}


}
?>
