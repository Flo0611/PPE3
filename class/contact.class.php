<?php

Class contact
{
  private $id_contact;
  private $nom_contact;
  private $adresse_mail_contact;
  private $sujet_contact;
  private $message_contact;

  Public function __construct($i, $n, $m, $s, $msg)
  {
    $this->id_contact = $i;
    $this->nom_contact = $n;
    $this->adresse_mail_contact = $m;
    $this->sujet_contact = $s;
    $this->message_contact = $msg;
  }

  //*******************************GETTER************************************

  Public function get_id_contact()
  {
    Return $this->id_contact;
  }

  Public function get_nom_contact()
  {
    Return $this->nom_contact;
  }

  Public function get_adresse_mail_contact()
  {
    Return $this->adresse_mail_contact;
  }

  Public function get_sujet_contact()
  {
    Return $this->sujet_contact;
  }

  Public function get_message_contact()
  {
    Return $this->message_contact;
  }


  //*******************************SETTER************************************


  Public function set_id_contact($i)
  {
    $this->id_contact = $i;
  }

  Public function set_nom_contact($n)
  {
    $this->nom_contact = $n;
  }

  Public function set_adresse_mail_contact($m)
  {
    $this->adresse_mail_contact = $m;
  }

  Public function set_sujet_contact($s)
  {
    $this->sujet_contact = $s;
  }

  Public function set_message_contact($msg)
  {
    $this->message_contact = $msg;
  }

//***********************************Function******************************


  Public function ajouter_contact($nom, $adresse_mail, $sujet, $message, $conn)
  {
  	$sql = "INSERT INTO contact (id_contact, nom_contact, adresse_mail_contact, sujet_contact, message_contact) VALUES(NULL,'$nom', '$adresse_mail', '$sujet', '$message')";
  	$sql = $conn->query($sql);
  	return $sql;
  }

  Public function select_contact_non($conn)
  {
    $sql = "SELECT id_contact, nom_contact, adresse_mail_contact, sujet_contact, message_contact FROM contact where vu = 'non' ";
    $req = $conn->query($sql);
    return $req;
  }

  Public function select_contact_oui($conn)
  {
    $sql = "SELECT id_contact, nom_contact, adresse_mail_contact, sujet_contact, message_contact FROM contact where vu = 'oui' ";
    $req = $conn->query($sql);
    return $req;
  }

  public function compte_nb_msg_oui($conn)
  {
  	$sql = "SELECT COUNT(*) as nb FROM contact where vu = 'oui'";
  	$req = $conn->query($sql);
  	return $req;
  }

  public function compte_nb_msg_non($conn)
  {
  	$sql = "SELECT COUNT(*) as nb FROM contact where vu = 'non'";
  	$req = $conn->query($sql);
  	return $req;
  }

  public function msg_lu($id, $conn)
  {
    $sql = "UPDATE contact SET vu = 'oui' where id_contact = $id";
    $req = $conn->query($sql);
  }

  public function msg_recup($id, $conn)
  {
    $sql = "UPDATE contact SET vu = 'non' where id_contact = $id";
    $req = $conn->query($sql);
  }

  public function max_id($conn)
  {
    $sql = "SELECT max(id_contact) as max_id from contact";
    $req = $conn->query($sql);
    return $req;
  }

}
?>
