<?php

 // la function qui va recuperer les infos de l utilisateur connecter
function infos_membre_connecte()
{
	$infos = array();
	if(isset($_SESSION['email']))
	{
	   $email = $_SESSION['email'];
	  
	   $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	   //$bdd = new PDO ('mysql:host=localhost;dbname=id2084383_ffs;charset=utf8','id2084383_jacknouatin','97098482jn');
	   //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	   $requser = $bdd->prepare("SELECT * FROM clients WHERE email = '$email' ");
	   $requser->execute(array($email));
	
	   while($userinfo = $requser->fetch())
	   {
		$infos[] = $userinfo;
	   }
	  return $infos;
	}
	else
	{
		$phone = $_SESSION['phone'];
	    $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
		//$bdd = new PDO ('mysql:host=localhost;dbname=id2084383_ffs;charset=utf8','id2084383_jacknouatin','97098482jn');
		//$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	    $requser = $bdd->prepare("SELECT * FROM clients WHERE  phone = '$phone' ");
	    $requser->execute(array($phone));
	
	while($userinfo = $requser->fetch())
	{
		$infos[] = $userinfo;
	}
	return $infos;
	}
}
?>