<?php

Class inscription_activite
{
	private $id_inscription_activite;
  private $id_activite_inscription_activite;
	private $id_spe;
  private $id_membre;

	Public function __construct($i, $i_a, $i_s, $i_m)
    {
      $this->id_inscription_activite = $i;
      $this->id_activite_inscription_activite = $i_a;
			$this->id_spe = $i_s;
      $this->id_membre = $i_m;
    }


//*****************************************GETTER**********************************


Public function get_id_inscription_activite()
	{
		Return $this->id_inscription_activite;
  }

Public function get_id_activite_inscription_activite()
	{
		Return $this->id_activite_inscription_activite;
  }

Public function get_id_spe()
	{
		Return $this->id_spe;
  }

Public function get_id_membre()
	{
		Return $this->id_membre;
  }


  //*****************************************SETTER**********************************

Public function set_id_inscription_activite($i)
	{
		$this->id_inscription_activite = $i;
  }

Public function set_id_activite_inscription_activite($i_a)
	{
		$this->id_activite_inscription_activite = $i_a;
  }

Public function set_id_spe($i_s)
	{
		$this->id_spe = $i_s;
  }

Public function set_id_membre($i_m)
	{
		$this->id_membre = $i_m;
  }



//***********************************Function******************************

public function ajouter_inscription_act($id_membre, $id_activite, $id_balade, $conn)
{
  $sql = "INSERT INTO inscription_activite (id_inscription_act, id_membre, id_acti, id_spe) VALUES(NULL, '$id_membre', '$id_activite', '$id_balade' )";
  $req = $conn->query($sql);
  return $req;
}

Public function verif_existe_activite($id_membre, $id_activite, $id_spe, $conn)
{
  $sql = "SELECT id_inscription_act, id_acti, id_membre, id_spe, count(*) as nb from inscription_activite where id_membre = '$id_membre' AND id_acti = '$id_activite' AND id_spe = '$id_spe' GROUP BY id_inscription_act";
  $req = $conn->query($sql);
  return $req;
}

public function supprimer_insc_act($id_membre, $id_spe, $id_activite_inscription_activite, $conn)
{
  $sql = "DELETE from inscription_activite where id_membre = '$id_membre' AND id_spe = '$id_spe' AND id_acti = '$id_activite_inscription_activite'";
  $req = $conn->query($sql);
  return $req;
}


}
?>
