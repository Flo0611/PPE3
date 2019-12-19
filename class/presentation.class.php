<?php

  class presentation
  {
    private $id_presentation;
    private $nom_presentation;
    private $prenom_presentation;
    private $age_presentation;
    private $photo_presentation;
    private $designation_presentation;
    private $valide;

    function __construct($i, $n, $p, $a, $photo, $d, $v)
    {
      $this->id_presentation = $i;
      $this->nom_presentation = $n;
      $this->prenom_presentation = $p;
      $this->age_presentation = $a;
      $this->photo_presentation = $photo;
      $this->designation_presentation = $d;
      $this->valide = $v;
    }

    //*****************************************GETTER**********************************


    Public function get_id_presentation()
    	{
    		Return $this->id_presentation;
      }

    Public function get_nom_pres()
    	{
    		Return $this->nom_presentation;
      }

    Public function get_prenom_pres()
    	{
    		Return $this->prenom_presentation;
      }

    Public function get_age_pres()
      {
      Return $this->age_presentation;
      }

    Public function get_photo_pres()
      {
      Return $this->photo_presentation;
      }

    Public function get_designation_pres()
      {
      Return $this->designation_presentation;
      }

    Public function get_valide_pres()
      {
      Return $this->valide;
      }


      //*****************************************SETTER**********************************

      Public function set_id_presentation($i)
      	{
      		$this->id_presentation = $i;
        }

      Public function set_nom_pres($n)
      	{
      		$this->nom_presentation = $n;
        }

      Public function set_prenom_pres($p)
      	{
      		$this->prenom_presentation = $p;
        }

      Public function set_age_pres($a)
        {
        $this->age_presentation = $a;
        }

      Public function set_photo_pres($photo)
        {
        $this->photo_presentation = $photo;
        }

      Public function set_designation_pres($d)
        {
        $this->designation_presentation = $d;
        }

      Public function set_valide_pres($v)
        {
        $this->valide = $v;
        }


//***********************************Function******************************
public function ajout_presentation($nom, $prenom, $age, $photo, $designation, $conn)
{
  $sql = "INSERT INTO presentation (id_presentation, nom_presentation, prenom_presentation, age_presentation, photo_presentation, designation_presentation) VALUES(NULL, '$nom', '$prenom', '$age', '$photo', '$designation')";
  $req = $conn->query($sql);
  return $req;
}

Public function select_all_pres($conn)
{
  $sql = "SELECT * FROM presentation where valide = 'oui'";
  $req = $conn->query($sql);
  return $req;
}


Public function supprimer_pres($id_presentation, $conn)
{
  $sql = "UPDATE presentation SET valide = 'non' where id_presentation = '$id_presentation'";
  $req = $conn->query($sql);
  return $req;
}


  }
?>
