<?php

Class inscription_cours
{
	private $id_inscription_cours;
  private $id_cours_inscription_cours;
	private $id_membre_inscription_cours;

	Public function __construct($i, $i_c, $i_m)
    {
      $this->id_inscription_cours = $i;
      $this->id_cours_inscription_cours = $i_c;
			$this->id_membre_inscription_cours = $i_m;
    }


//*****************************************GETTER**********************************


Public function get_id_inscription_cours()
	{
		Return $this->id_inscription_cours;
  }

Public function get_id_cours_inscription_cours()
	{
		Return $this->id_cours_inscription_cours;
  }

Public function get_id_membre_inscription_cours()
	{
		Return $this->id_membre_inscription_cours;
  }



  //*****************************************SETTER**********************************

Public function set_id_inscription_cours($i)
	{
		$this->id_inscription_cours = $i;
  }

Public function set_id_cours_inscription_cours($i_c)
	{
		$this->id_cours_inscription_cours = $i_c;
  }

Public function set_id_membre_inscription_cours($i_m)
	{
		$this->id_membre_inscription_cours = $i_m;
  }



//***********************************Function******************************

public function ajout_inscription_cours($id_cours, $id_membre, $conn)
{
  $sql = "INSERT INTO inscription_cours (id_inscription_cours, id_cours, id_membre) VALUES(NULL, '$id_cours', '$id_membre')";
  $req = $conn->query($sql);
  return $req;
}

Public function verif_existe_cours($id_membre, $id_cours, $conn)
{
  $sql = "SELECT id_inscription_cours, id_cours, count(*) as nb from inscription_cours where id_membre = '$id_membre' AND id_cours = '$id_cours' GROUP BY id_inscription_cours";
  $req = $conn->query($sql);
  return $req;
}

Public function select_by_id_cours($id_cours, $conn)
{
	$sql = "SELECT * from inscription_cours where id_cours = '$id_cours'";
	$req = $conn->query($sql);
	return $req;
}

Public function supprimer_membre($id_insc_cours, $conn)
{
	$sql = "DELETE FROM inscription_cours where id_inscription_cours = '$id_insc_cours'";
	$req = $conn->query($sql);
	return $req;
}

Public function select_cours_by_id($id_membre, $id_cours, $conn)
{
  $sql = "SELECT id_inscription_cours from inscription_cours where id_membre = '$id_membre' AND id_cours = '$id_cours'";
  $req = $conn->query($sql);
  return $req;
}


}
?>
