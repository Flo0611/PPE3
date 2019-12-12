<?php

Class pension
{
	private $id_pension;
  private $lib_pension;
  private $surface_pension;
  private $place_pension;
  private $description_pension;
  private $photo_pension;
  private $prix_pension;

	Public function __construct($i, $lib, $s, $p, $desc, $photo, $prix)
    {
      $this->id_pension = $i;
      $this->lib_pension = $prix;
      $this->surface_pension = $s;
      $this->place_pension = $p;
      $this->description_pension = $desc;
      $this->photo_pension = $photo;
      $this->prix_pension = $prix;
    }


//*****************************************GETTER**********************************


Public function get_id_pension()
	{
		Return $this->id_pension;
  }

Public function get_lib_pension()
	{
		Return $this->lib_pension;
  }

Public function get_surface_pension()
	{
		Return $this->surface_pension;
  }

Public function get_place_pension()
	{
		Return $this->place_pension;
  }

Public function get_description_pension()
	{
		Return $this->description_pension;
  }

Public function get_photo_pension()
	{
		Return $this->photo_pension;
  }

Public function get_prix_pension()
	{
		Return $this->prix_pension;
  }


  //*****************************************SETTER**********************************

Public function set_id_pension($i)
	{
		$this->id_pension = $i;
  }

Public function set_lib_pension($lib)
	{
		$this->lib_pension = $lib;
  }

Public function set_surface_pension($s)
	{
		$this->surface_pension = $s;
  }

Public function set_place_pension($p)
	{
		$this->place_pension = $p;
  }

Public function set_description_pension($desc)
	{
		$this->description_pension = $desc;
  }

Public function set_photo_pension($photo)
	{
		$this->photo_pension = $photo;
  }

Public function set_prix_pension($prix)
	{
		$this->prix_pension = $prix;
  }


//***********************************Function******************************

Public function select_pension($conn)
{
  $sql = "SELECT * FROM pension";
  $req = $conn->query($sql);
  return $req;
}

}
?>
