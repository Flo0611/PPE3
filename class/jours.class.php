<?php

Class jour
{
	private $id_jour;
  private $lib_jour;

	Public function __construct($i, $l)
    {
      $this->id_jour = $i;
      $this->lib_jour = $l;
    }


//*****************************************GETTER**********************************


Public function get_id_jour()
	{
		Return $this->id_jour;
  }

Public function get_lib_jour()
	{
		Return $this->lib_jour;
  }


  //*****************************************SETTER**********************************

Public function set_id_jour($i)
	{
		$this->id_jour = $i;
  }

Public function set_lib_jour($l)
	{
		$this->lib_jour = $l;
  }



//***********************************Function******************************

Public function select_jour($conn)
{
  $sql = "SELECT * FROM jour";
  $req = $conn->query($sql);
  return $req;
}

Public function select_jour_by_id($id_jour, $conn)
{
  $sql = "SELECT * FROM jour where id_jour = '$id_jour'";
  $req = $conn->query($sql);
  return $req;
}


}
?>
