<?php

Class chevaux_fav
{
	private $id_chevaux_fav;
  private $prenom_chevaux_favcf;

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



}
?>
