<?php
 //la function qui va creer lamitier entre client et admin
   
   function amitie()
   {
	   if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
	{
		 $id_client = htmlspecialchars($_SESSION['id_client']);
		 $admin = '6';
	     $bdd = new PDO('mysql:host=localhost;dbname=ffs','root','');
	     $reqamis = $bdd->prepare("SELECT * FROM amis WHERE id_clien = ? and id_admin = ?");
				 $reqamis->execute(array($id_client, $admin));
				 $amis = $reqamis->rowCount();
		             if($amis == 0)
		             {
		                 $insert =  $bdd->prepare("INSERT INTO amis(id_clien, id_admin, date) VALUES(?, ?, NOW())");
		                 $insert->execute(array($id_client, $admin));
					 }
	}
   }
   
   
// la function qui va localiser l'adresse ip du  client
function LOCATION()
{
	 if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
	{
	     $ip = $_SERVER['REMOTE_ADDR'];
	     $bdd = new PDO('mysql:host=localhost;dbname=ffs','root','');
		 $id_client = htmlspecialchars($_SESSION['id_client']);
         $query = $bdd->prepare('SELECT * FROM localisation WHERE id_client = ? and adresse_ip = ? ');
         $query->execute(array($id_client, $ip));	
         if($show = $query->rowCount() == 0)
		 {
			 $insert = $bdd->prepare('INSERT INTO localisation(id_client, adresse_ip) VALUES(:id_client, :adresse_ip)');
			 $insert->execute(array(
			      'id_client'  => $id_client,
				  'adresse_ip' => $ip
			 ));
		 }else{
			 $Update = $bdd->query("UPDATE localisation SET adresse_ip = '$ip' WHERE id_client = '$id_client' and adresse_ip = '$ip' ");
		 }			 
	}
	
}
?>
