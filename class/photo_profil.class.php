<?php

  class photo_profil
  {
    private $id_photo_profil;
    private $lib_photo;


    function __construct($i_p, $l)
    {
      $this->id_photo_profil = $i_p;
      $this->lib_photo = $l;

    }

    //*****************************************GETTER**********************************


    Public function get_id_photo_profil()
    	{
    		Return $this->id_photo_profil;
      }

    Public function get_lib_photo()
    	{
    		Return $this->lib_photo;
      }

      //*****************************************SETTER**********************************

    Public function set_id_photo_profil($i_p)
    	{
    		$this->id_photo_profil = $i_p;
      }

    Public function set_lib_photo($l)
    	{
    		$this->lib_photo = $l;
      }


//***********************************Function******************************
Public function ajouter_photo_profil($lib_photo, $conn)
  {
    $sql = "INSERT INTO images_profil (id_images_profil, lib_images_profil) VALUES(NULL,'$lib_photo')";
    $req = $conn->query($sql);
    return $req;
  }

Public function select_all_photo_profil($conn)
{
  $sql = "SELECT * from images_profil";
  $req = $conn->query($sql);
  return $req;
}

Public function select_photo_profil($id_photo, $conn)
{
  $sql = "SELECT lib_images_profil from images_profil where id_images_profil = '$id_photo'";
  $req = $conn->query($sql);
  return $req;
}


  }
?>
