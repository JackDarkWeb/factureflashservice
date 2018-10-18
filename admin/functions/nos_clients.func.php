<?php
// la function qui va recuperer les infos de tous nos clients
function infos_clients()
{
	   $infos = array();
	
	   $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	   //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	   $requser = $bdd->query("SELECT * FROM clients WHERE id_client != '30'");
	
	   while($userinfo = $requser->fetch())
	   {
		$infos[] = $userinfo;
	   }
	  return $infos;
}
	?>