<?php
session_start();
// Connexion a la base de donnees..
try
{
     $bdd = new PDO ('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
     //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
  //$bdd = new PDO ('mysql:host=localhost;dbname=id2084383_ffs;charset=utf8','id2084383_jacknouatin','97098482jn');
}
catch(Exception $e)
{
	 die('Erreur :'.$e->getMessage());
}
?>