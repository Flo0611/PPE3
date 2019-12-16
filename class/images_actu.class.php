<?php

  class images_actu
  {
    private $id_images_actu;
    private $lib_image;
    private $id_actu;

    function __construct($i_i, $l, $i_a)
    {
      $this->id_images_actu = $i_i;
      $this->lib_image = $l;
      $this->id_actu = $i_a;
    }

    //*****************************************GETTER**********************************


    Public function get_id_images_actu()
    	{
    		Return $this->id_images_actu;
      }

    Public function get_lib_image()
    	{
    		Return $this->lib_image;
      }

    Public function get_id_actu()
    	{
    		Return $this->id_actu;
      }

      //*****************************************SETTER**********************************

    Public function set_id_images_actu($i_i)
    	{
    		$this->id_images_actu = $i_i;
      }

    Public function set_lib_image($l)
    	{
    		$this->lib_image = $l;
      }

    Public function set_id_actu($i_a)
    	{
    		$this->id_actu = $i_a;
      }


//***********************************Function******************************
Public function ajouter_images_actu($lib_image, $id_actu, $conn)
  {
    $sql = "INSERT INTO images_actu (id_images_actu, lib_photo, id_actu) VALUES(NULL,'$lib_image', '$id_actu')";
    $req = $conn->query($sql);
    return $req;
  }

Public function select_all_images_actu($id_actu, $conn)
{
  $sql = "SELECT * from images_actu where id_actu = '$id_actu'";
  $req = $conn->query($sql);
  return $req;
}

Public function count_all_images_actu($id_actu, $conn)
{
  $sql = "SELECT count(*) as nb from images_actu where id_actu = '$id_actu'";
  $req = $conn->query($sql);
  return $req;
}

Public function select_images_actu($id_photo, $conn)
{
  $sql = "SELECT lib_images_actu from images_actu where id_images_actu = '$id_photo'";
  $req = $conn->query($sql);
  return $req;
}

public function suppression_images_actu($id_image, $conn)
{
  $sql = "DELETE FROM images_actu where id_images_actu = '$id_image'";
  $req = $conn->query($sql);
  return $req;
}


  }
?>
