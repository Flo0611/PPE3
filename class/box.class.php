<?php

Class box
{
	private $id_box;
  private $id_pension_box;
	private $id_cheval_box;

	Public function __construct($i, $i_p, $i_c)
    {
      $this->id_box = $i;
      $this->id_pension_box = $i_p;
			$this->id_cheval_box = $i_c;
    }


//*****************************************GETTER**********************************


Public function get_id_box()
	{
		Return $this->id_box;
  }

Public function get_id_pension_box()
	{
		Return $this->id_pension_box;
  }

Public function get_id_cheval_box()
	{
		Return $this->id_cheval_box;
  }



  //*****************************************SETTER**********************************

Public function set_id_box($i)
	{
		$this->id_box = $i;
  }

Public function set_id_pension_box($i_p)
	{
		$this->id_pension_box = $i_p;
  }

Public function set_id_cheval_box($i_c)
	{
		$this->id_cheval_box = $i_c;
  }



//***********************************Function******************************

public function ajout_cheval_favoris($id_pension, $id_cheval, $conn)
{
  $sql = "INSERT INTO box (id_box, id_pension, id_cheval) VALUES(NULL, '$id_pension', '$id_cheval')";
  $req = $conn->query($sql);
  return $req;
}

public function select_id_cheval($id_pension, $conn)
{
	$sql = "SELECT id_box, id_cheval from box where id_pension = '$id_pension'";
	$req = $conn->query($sql);
	return $req;
}

public function select_cheval($id_cheval, $conn)
{
	$sql = "SELECT count(*) as nb from box where id_cheval = '$id_cheval'";
	$req = $conn->query($sql);
	return $req;
}

public function select_nb_place($id_pension, $conn)
{
	$sql = "SELECT count(*) as nb_pension from box where id_pension = '$id_pension'";
	$req = $conn->query($sql);
	return $req;
}

Public function delete_box($id_box, $conn)
{
	$sql = "DELETE from box where id_box = '$id_box'";
	$req = $conn->query($sql);
	return $req;
}


}
?>
