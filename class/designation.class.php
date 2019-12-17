<?php

Class designation
{
	private $id_designation;
  private $lib_designation;

	Public function __construct($i, $l)
    {
      $this->id_designation = $i;
      $this->lib_designation = $l;
    }


//*****************************************GETTER**********************************


Public function get_id_designation()
	{
		Return $this->id_designation;
  }

Public function get_lib_designation()
	{
		Return $this->lib_designation;
  }



  //*****************************************SETTER**********************************

Public function set_id_designation($i)
	{
		$this->id_designation = $i;
  }

Public function set_lib_designation($l)
	{
		$this->lib_designation = $l;
  }



//***********************************Function******************************


Public function select_all_designation($conn)
{
	$sql = "SELECT * from designation";
	$req = $conn->query($sql);
	return $req;
}

Public function select_designation_by_id($id_designation, $conn)
{
	$sql = "SELECT * from designation where id_designation = '$id_designation'";
	$req = $conn->query($sql);
	return $req;
}



}
?>
