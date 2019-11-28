<?php

  class photo_cheval
  {
    private $id_photo_cheval;
    private $lib_photo;
    private $id_cheval;


    function __construct($i_p, $l, $i_c)
    {
      $this->id_photo_cheval = $i_p;
      $this->lib_photo = $l;
      $this->id_cheval = $i_c;

    }

    //*****************************************GETTER**********************************


    Public function get_id_photo_cheval()
    	{
    		Return $this->id_photo_cheval;
      }

    Public function get_lib_photo()
    	{
    		Return $this->lib_photo;
      }

    Public function get_id_cheval()
    	{
    		Return $this->id_cheval;
      }


      //*****************************************SETTER**********************************

    Public function set_id_photo_cheval($i_p)
    	{
    		$this->id_photo_cheval = $i_p;
      }

    Public function set_lib_photo($l)
    	{
    		$this->lib_photo = $l;
      }

    Public function set_id_cheval($i_c)
    	{
    		$this->id_cheval = $i_c;
      }


//***********************************Function******************************
Public function ajouter_photo_cheval($lib_photo, $id_che, $conn)
  {
    $sql = "INSERT INTO photo_cheval (id_photo_cheval, lib_photo, id_cheval) VALUES(NULL,'$lib_photo', '$id_che')";
    $req = $conn->query($sql);
    return $req;
  }

Public function select_photo_cheval($id_photo, $conn)
{
  $sql = "SELECT lib_photo from photo_cheval where id_photo_cheval = '$id_photo'";
  $req = $conn->query($sql);
  return $req;
}


  }
?>
