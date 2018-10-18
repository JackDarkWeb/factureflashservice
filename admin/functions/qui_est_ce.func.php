<?php
    // la function qui returne les informations sur un client choisir
function client_choisir($id)
{
	     $quis = array();
	     $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	   //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	     $reqclients = $bdd->prepare("SELECT * FROM clients WHERE id_client = '$id' ");				  
	     $reqclients->execute(array($id));
	 
	                 while($result = $reqclients->fetch())
	                {
		                 $quis[] = $result;
	                }
	                     return $quis;
	
	 
}
?>