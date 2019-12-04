<?php
  //connexion à la base de données
  //nouvelle méthode
  /*
  $serveur = '109.234.164.138';
  $db = 'gofl9607_PPE3';
  $user = 'gofl9607_PPE3';
  $pass = 'Centreequestre';
  $conn = new PDO("mysql:host=$serveur;dbname=$db;charset=utf8", $user, $pass);
*/


$serveur = 'localhost';
$db = 'PPE3';
$user = 'root';
$pass = '';
$conn = new PDO("mysql:host=$serveur;dbname=$db;charset=utf8", $user, $pass);

?>
