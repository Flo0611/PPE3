<?php

  class images_membre
  {
    private $id_images_membre;
    private $lib_image;
    private $id_membre;

    function __construct($i_i, $l, $i_m)
    {
      $this->id_images_membre = $i_i;
      $this->lib_image = $l;
      $this->id_membre = $i_m;
    }

    //*****************************************GETTER**********************************


    Public function get_id_images_membre()
    	{
    		Return $this->id_images_membre;
      }

    Public function get_lib_image()
    	{
    		Return $this->lib_image;
      }

    Public function get_id_membre()
    	{
    		Return $this->id_membre;
      }

      //*****************************************SETTER**********************************

    Public function set_id_images_membre($i_i)
    	{
    		$this->id_images_membre = $i_i;
      }

    Public function set_lib_image($l)
    	{
    		$this->lib_image = $l;
      }

    Public function set_id_membre($i_m)
    	{
    		$this->id_membre = $i_m;
      }


//***********************************Function******************************
Public function ajouter_images_membre($lib_image, $id_membre, $conn)
  {
    $sql = "INSERT INTO images_membre (id_images_membre, lib_images_membre, id_membre) VALUES(NULL,'$lib_image', '$id_membre')";
    $req = $conn->query($sql);
    return $req;
  }

Public function select_all_images_membre($id_membre, $conn)
{
  $sql = "SELECT * from images_membre where id_membre = '$id_membre'";
  $req = $conn->query($sql);
  return $req;
}

Public function count_all_images_membre($id_membre, $conn)
{
  $sql = "SELECT count(*) as nb from images_membre where id_membre = '$id_membre'";
  $req = $conn->query($sql);
  return $req;
}

Public function select_images_membre($id_photo, $conn)
{
  $sql = "SELECT lib_images_membre from images_membre where id_images_membre = '$id_photo'";
  $req = $conn->query($sql);
  return $req;
}

public function suppression_images_membre($id_image, $conn)
{
  $sql = "DELETE FROM images_membre where id_images_membre = '$id_image'";
  $req = $conn->query($sql);
  return $req;
}


  }
?>
