<?php
session_start();
try
{
// Connexion a la base de donnees..
$bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
//$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
?>