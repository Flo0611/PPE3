<?php

Class membre
{
	private $id_membre;
  private $nom_membre;
  private $prenom_membre;
  private $date_naissance_membre;
  private $mail_membre;
  private $telephone;
  private $rue;
  private $complement;
  private $pass_membre;
	private $code_p_membre;
	private $num_rue;
	private $photo_membre;
  //private $une_ville;

	Public function __construct($i, $n, $p, $dn, $m, $t, $r, $c, $pa, $c_p_m, $n_r, $p_m/*, $une_ville*/)
    {
      $this->id_membre = $i;
      $this->nom_membre = $n;
      $this->prenom_membre = $p;
      $this->date_naissance_membre = $dn;
      $this->mail_membre = $m;
      $this->telephone_membre = $t;
      $this->rue_membre = $r;
      $this->complement_membre = $c;
      $this->pass_membre = $pa;
			$this->code_p_membre = $c_p_m;
			$this->num_rue = $n_r;
			$this->photo_membre = $p_m;
      //$this->une_ville = $une_ville;
    }


//*****************************************GETTER**********************************


Public function get_id_membre()
	{
		Return $this->id_membre;
  }

Public function get_nom_membre()
	{
		Return $this->nom_membre;
  }

Public function get_prenom_membre()
	{
		Return $this->prenom_membre;
  }

Public function get_date_naissance_membre()
	{
		Return $this->date_naissance_membre;
  }

Public function get_mail_membre()
	{
		Return $this->mail_membre;
  }

Public function get_tel_membre()
	{
		Return $this->telephone_membre;
  }

Public function get_rue_membre()
	{
		Return $this->rue_membre;
  }

Public function get_complement_membre()
	{
		Return $this->complement_membre;
  }

Public function get_pass_membre()
	{
		Return $this->pass_membre;
  }

Public function get_code_p_membre()
{
	Return $this->code_p_membre;
}

Public function get_num_rue()
{
	Return $this->num_rue;
}

Public function get_photo_membre()
{
	Return $this->photo_membre;
}




  //*****************************************SETTER**********************************

Public function set_id_membre($i)
	{
		$this->id_membre = $i;
  }

Public function set_nom_membre($n)
	{
		$this->nom_membre = $n;
  }

Public function set_prenom_membre($p)
	{
		$this->prenom_membre = $p;
  }

Public function set_date_naissance_membre($dn)
	{
		$this->date_naissance_membre = $dn;
  }

Public function set_mail_membre($m)
	{
		$this->mail_membre = $m;
  }

Public function set_tel_membre($t)
	{
		$this->telephone_membre = $t;
  }

Public function set_rue_membre($r)
	{
		$this->rue_membre = $r;
  }

Public function set_complement_membre($c)
	{
		$this->complement_membre = $c;
  }

Public function set_pass_membre($pa)
	{
		$this->pass_membre = $pa;
  }

Public function set_code_p_membre($c_p_m)
{
	$this->code_p_membre = $c_p_m;
}

Public function set_num_rue($n_r)
	{
		$this->num_rue = $n_r;
  }

	Public function set_photo_membre($p_m)
		{
			$this->photo_membre = $p_m;
	  }

//***********************************Function******************************
Public function ajouter_membre($email, $mdp, $prenom, $nom, $tel, $adresse, $complement, $date_naiss, $code_p_membre, $num_rue, $conn)
{
	$sql_insc = "INSERT INTO membre (id_membre, email_membre, mdp_membre, prenom_membre, nom_membre, tel_membre, adresse_membre, complement_membre, daten_membre, code_p_membre, num_rue_membre) VALUES(NULL,'$email', '$mdp', '$prenom', '$nom', '$tel', '$adresse', '$complement', '$date_naiss', '$code_p_membre', '$num_rue')";
	$req_insc = $conn->query($sql_insc);
	return $req_insc;
}

Public function changement_mdp_membre($mdp_recup, $id_membre_recup, $conn)
{
	$sql = "UPDATE membre set mdp_membre = '$mdp_recup' where id_membre = '$id_membre_recup'";
	$req = $conn->query($sql);
	return $req;
}

public function mdp_niveau_membre($adresse_mail, $conn)
{
	$sql = "SELECT id_membre, nom_membre, prenom_membre, mdp_membre, niveau_acces_membre FROM membre where email_membre = '$adresse_mail' ";
	$req = $conn->query($sql);
	return $req;
}

public function compte_email_membre($adresse_mail, $conn)
{
	$sql = "SELECT COUNT(email_membre) as nb FROM membre where email_membre = '$adresse_mail' AND valide = 'oui' ";
	$req = $conn->query($sql);
	return $req;
}

public function select_membre_valide($conn)
{
	$sql = "SELECT id_membre, nom_membre, prenom_membre, email_membre, tel_membre, adresse_membre, complement_membre, daten_membre, code_p_membre, num_rue_membre FROM membre where valide = 'oui' ";
	$req = $conn->query($sql);
	return $req;
}

Public function suppression_membre($id_membre, $conn)
{
	$sql = "UPDATE membre set valide = 'non' where id_membre = '$id_membre'";
	$req = $conn->query($sql);
}

public function select_by_id($id_membre, $conn)
{
	$sql = "SELECT nom_membre, prenom_membre, email_membre, tel_membre, adresse_membre, complement_membre, daten_membre, code_p_membre, num_rue_membre FROM membre where id_membre = '$id_membre' ";
	$req = $conn->query($sql);
	return $req;
}

Public function modif_membre($id_membre, $nom, $prenom, $mail, $tel, $adresse, $complement, $daten, $code_p, $num_rue, $conn)
{
	$sql = "UPDATE membre set nom_membre = '$nom', prenom_membre = '$prenom', email_membre = '$mail', tel_membre ='$tel', adresse_membre = '$adresse', complement_membre = '$complement', daten_membre = '$daten', code_p_membre = '$code_p', num_rue_membre = '$num_rue' where id_membre = '$id_membre'";
	$req = $conn->query($sql);
}

public function compte_nb_membres($conn)
{
	$sql = "SELECT COUNT(*) as nb FROM membre where valide = 'oui'";
	$req = $conn->query($sql);
	return $req;
}

public function select_membre_actu_valide($conn)
{
	$sql = "SELECT id_membre, nom_membre, prenom_membre, email_membre, tel_membre, adresse_membre, complement_membre, daten_membre, code_p_membre, num_rue_membre FROM membre where valide = 'oui' order by id_membre desc limit 0,3 ";
	$req = $conn->query($sql);
	return $req;
}

public function select_photo_membre($id_membre, $conn)
{
	$sql = "SELECT photo_membre From membre where id_membre = '$id_membre'";
	$req = $conn->query($sql);
	return $req;
}


}
?>
