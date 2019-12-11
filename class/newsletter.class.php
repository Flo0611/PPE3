<?php

Class news_letter
{
	private $id_news_letter;
  private $mail_news_letter;

	Public function __construct($i, $m)
    {
      $this->id_news_letter = $i;
      $this->mail_news_letter = $m;
    }


//*****************************************GETTER**********************************


Public function get_id_news_letter()
	{
		Return $this->id_news_letter;
  }

Public function get_mail_news_letter()
	{
		Return $this->mail_news_letter;
  }


  //*****************************************SETTER**********************************

Public function set_id_news_letter($i)
	{
		$this->id_news_letter = $i;
  }

Public function set_mail_news_letter($m)
	{
		$this->mail_news_letter = $m;
  }


//***********************************Function******************************
Public function ajouter_news_letter($mail_news_letter, $conn)
{
	$sql = "INSERT INTO inscription_newsletter (id_news, mail_news) VALUES(NULL,'$mail_news_letter')";
	$req = $conn->query($sql);
	return $req;
}

Public function select_news_by_mail($mail, $conn)
{
	$sql = "SELECT count(*) as nb_news FROM inscription_newsletter where mail_news = '$mail'";
	$req = $conn->query($sql);
	return $req;
}


}
?>
