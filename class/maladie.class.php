<?php

Class maladie
{
	private $id_maladie;
  private $lib_maladie;

	Public function __construct($i, $l)
    {
      $this->id_maladie = $i;
      $this->lib_maladie = $l;
    }


//*****************************************GETTER**********************************


Public function get_id_maladie()
	{
		Return $this->id_maladie;
  }

Public function get_lib_maladie()
	{
		Return $this->lib_maladie;
  }



  //*****************************************SETTER**********************************

Public function set_lib_maladie($l)
	{
		$this->lib_maladie = $l;
  }



//***********************************Function******************************

public function ajout_maladie($lib_maladie, $conn)
{
  $sql = "INSERT INTO maladie (id_maladie, lib_maladie) VALUES(NULL, '$lib_maladie')";
  $req = $conn->query($sql);
  return $req;
}

public function modifier_maladie($id_maladie, $lib_maladie, $conn)
{
  $sql = "UPDATE maladie SET lib_maladie = '$lib_maladie' where id_maladie = '$id_maladie'";
  $req = $conn->query($sql);
  return $req;
}

Public function suppression_maladie($id_maladie, $conn)
{
	$sql = "UPDATE maladie SET valide = 'non' where id_maladie = '$id_maladie'";
	$req = $conn->query($sql);
	return $req;
}

Public function select_all_maladies($conn)
{
  $sql = "SELECT * FROM maladie where valide = 'oui'";
  $req = $conn->query($sql);
  return $req;
}

public function select_maladie($id_maladie, $conn)
{
  $sql = "SELECT * FROM maladie where id_maladie = '$id_maladie'";
  $req = $conn->query($sql);
  return $req;
}

}
?>
