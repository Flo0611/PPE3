<?php

Class actu
{
	private $id_actu;
	private $id_membre;
  private $nom_actu;
  private $prenom_actu;
  private $text_actu;
  private $date_actu;
	private $titre;

	Public function __construct($i, $i_m, $n, $p, $t, $d, $titre)
    {
      $this->id_actu = $i;
			$this->id_membre = $i_m;
      $this->nom_actu = $n;
      $this->prenom_actu = $p;
      $this->text_actu = $t;
      $this->date_actu = $d;
			$this->titre_actu = $titre;
    }


//*****************************************GETTER**********************************


Public function get_id_actu()
	{
		Return $this->id_actu;
  }

Public function get_id_membre()
	{
		Return $this->id_membre;
  }

Public function get_nom_actu()
	{
		Return $this->nom_actu;
  }

Public function get_prenom_actu()
	{
		Return $this->prenom_actu;
  }

Public function get_text_actu()
	{
		Return $this->text_actu;
  }

Public function get_date_actu()
	{
		Return $this->date_actu;
  }

Public function get_titre_actu()
	{
		Return $this->titre_actu;
  }


  //*****************************************SETTER**********************************

Public function set_id_actu($i)
	{
		$this->id_actu = $i;
  }

Public function set_id_membre($i_m)
	{
		$this->id_membre = $i_m;
  }

Public function set_nom_actu($n)
	{
		$this->nom_actu = $n;
  }

Public function set_prenom_actu($p)
	{
		$this->prenom_actu = $p;
  }

Public function set_text_actu($t)
	{
		$this->text_actu = $t;
  }

Public function set_date_actu($d)
	{
		$this->date_actu = $d;
  }

Public function set_titre_actu($titre)
	{
		$this->titre_actu = $titre;
  }

//***********************************Function******************************
Public function ajouter_actu($id_membre, $nom_actu, $prenom_actu, $text_actu, $date_actu, $titre, $conn)
{
	$sql = "INSERT INTO actualites (id_actu, id_membre, nom_actu, prenom_actu, text_actu, date_actu, titre_actu) VALUES(NULL, '$id_membre', '$nom_actu', '$prenom_actu', '$text_actu', '$date_actu', '$titre')";
	$req = $conn->query($sql);
	return $req;
}

public function select_actu_recente($conn)
{
	$sql = "SELECT id_actu, id_membre, nom_actu, prenom_actu, text_actu, date_actu FROM actualites order by id_actu desc limit 0,5 ";
	$req = $conn->query($sql);
	return $req;
}

public function select_actu_by_id($id_actu, $conn)
{
	$sql = "SELECT id_actu, id_membre, nom_actu, prenom_actu, text_actu, titre_actu, date_actu FROM actualites where id_actu = '$id_actu'";
	$req = $conn->query($sql);
	return $req;
}

function resume_xmots($MaChaine,$xmots)
{
	 $msg= " ";
   $ChaineTab=explode(" ",$MaChaine);
   for($i=0;$i < $xmots;$i++)
   {
      $msg.=" "."$ChaineTab[$i]";
   }
   return $msg;
}


}
?>
