<?php

Class chevaux_fav
{
	private $id_chevaux_fav;
  private $prenom_chevaux_fav;

	Public function __construct($i, $n)
    {
      $this->id_chevaux_fav = $i;
      $this->prenom_chevaux_fav = $n;
    }


//*****************************************GETTER**********************************


Public function get_id_chevaux_fav()
	{
		Return $this->id_chevaux_fav;
  }

Public function get_prenom_chevaux_fav()
	{
		Return $this->prenom_chevaux_fav;
  }



  //*****************************************SETTER**********************************

Public function set_id_chevaux_fav($i)
	{
		$this->id_chevaux_fav = $i;
  }

Public function set_prenom_chevaux_fav($n)
	{
		$this->prenom_chevaux_fav = $n;
  }



//***********************************Function******************************

public function ajout_cheval_favoris($id_membre, $id_cheval, $conn)
{
  $sql = "INSERT INTO chevaux_favoris (id_chevaux_fav, id_cheval, id_membre) VALUES(NULL, '$id_cheval', '$id_membre')";
  $req = $conn->query($sql);
  return $req;
}

public function supprimer_cheval_favoris($id_membre, $id_cheval, $conn)
{
  $sql = "DELETE FROM chevaux_favoris where id_membre = '$id_membre' AND id_cheval = '$id_cheval'";
  $req = $conn->query($sql);
  return $req;
}

Public function select_by_id_membre($id_membre, $conn)
{
	$sql = "SELECT * from chevaux_favoris where id_membre = '$id_membre'";
	$req = $conn->query($sql);
	return $req;
}

Public function select_by_id_membre_chevaux($id_membre, $id_cheval, $conn)
{
	$sql = "SELECT id_chevaux_fav from chevaux_favoris where id_membre = '$id_membre' AND id_cheval = '$id_cheval'";
	$req = $conn->query($sql);
	return $req;
}


}
?>
