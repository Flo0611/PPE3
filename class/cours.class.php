<?php

Class cours
{
	private $id_cours;
  private $titre_cours;
  private $debut_cours;
  private $fin_cours;
  private $jour_cours;
  private $galop_cours;
  private $valide;

	Public function __construct($i, $t, $d, $f, $j, $g, $v)
    {
      $this->id_cours = $i;
      $this->titre_cours = $t;
      $this->debut_cours = $d;
      $this->fin_cours = $f;
      $this->jour_cours = $j;
      $this->galop_cours = $g;
      $this->valide = $v;
    }


//*****************************************GETTER**********************************


Public function get_id_cours()
	{
		Return $this->id_cours;
  }

Public function get_titre_cours()
	{
		Return $this->titre_cours;
  }

Public function get_debut_cours()
	{
		Return $this->debut_cours;
  }

Public function get_fin_cours()
	{
		Return $this->fin_cours;
  }

Public function get_jour_cours()
	{
		Return $this->jour_cours;
  }

Public function get_galop_cours()
	{
		Return $this->galop_cours;
  }

Public function get_valide_cours()
	{
		Return $this->valide;
  }


  //*****************************************SETTER**********************************

Public function set_id_cours($i)
	{
		$this->id_cours = $i;
  }

Public function set_titre_cours($t)
	{
		$this->titre_cours = $t;
  }

Public function set_debut_cours($d)
	{
		$this->debut_cours = $d;
  }

Public function set_fin_cours($f)
	{
		$this->fin_cours = $f;
  }

Public function set_jour_cours($j)
	{
		$this->jour_cours = $j;
  }

Public function set_galop_cours($g)
	{
		$this->galop_cours = $g;
  }

Public function set_valide_cours($v)
	{
		$this->valide = $v;
  }



//***********************************Function******************************

Public function ajouter_cours($titre_cours, $debut_cours, $fin_cours, $jour_cours, $id_galop, $conn)
{
	$sql = "INSERT INTO cours(id_cours, titre_cours, debut_cours, fin_cours, jour_cours, id_galop) VALUES(NULL, '$titre_cours', '$debut_cours', '$fin_cours', '$jour_cours', '$id_galop')";
	$req = $conn->query($sql);
	return $req;
}

Public function select_cours_jour($id_jour, $conn)
{
  $sql = "SELECT * FROM cours where jour_cours = '$id_jour' AND valide = 'oui'";
  $req = $conn->query($sql);
  return $req;
}

Public function select_cours_jour_filtre($id_jour, $conn)
{
  $sql = "SELECT * FROM cours where jour_cours = '$id_jour' AND valide = 'oui' ORDER BY debut_cours";
  $req = $conn->query($sql);
  return $req;
}

Public function select_lib_cours($id_cours, $conn)
{
  $sql = "SELECT id_cours, titre_cours FROM cours where id_cours = '$id_cours'";
  $req = $conn->query($sql);
  return $req;
}

Public function supprimer_cours($id_cours, $conn)
{
  $sql = "UPDATE cours SET valide = 'non' where id_cours = '$id_cours'";
  $req = $conn->query($sql);
  return $req;
}


}
?>
