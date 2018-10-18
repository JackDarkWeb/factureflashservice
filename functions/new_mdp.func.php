<?php
// la function qui va modifier le mot de passe
function modifier_mot_de_passe($passe)
{
	if(isset($_SESSION['num_mail']))
	{
	   $email = $_SESSION['num_mail'];
	
	   $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	   //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	   //$bdd = new PDO ('mysql:host=localhost;dbname=id2084383_ffs;charset=utf8','id2084383_jacknouatin','97098482jn');
	   $update = $bdd->query("UPDATE clients SET password = '$passe' WHERE email = '$email'  ");
	}
	else
	{
		$phone = $_SESSION['num_mail'];
		//$bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
		$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
		//$bdd = new PDO ('mysql:host=localhost;dbname=id2084383_ffs;charset=utf8','id2084383_jacknouatin','97098482jn');
	    $update = $bdd->query("UPDATE clients SET password = '$passe' WHERE phone = '$phone'  ");
	}
	
}




          
		  
		  
		  
		  
		  
	 if(isset($_POST['submit']))
	 {
		 if($_SESSION['num_mail'])
		 {
		   if($_SESSION['code'])
		   {		  
		     if(!empty($_POST['new_mdp']) and !empty($_POST['conf_new_mdp']))
			 { 
		          $passe1 = htmlspecialchars(sha1($_POST['conf_new_mdp']));
			      $passe = htmlspecialchars(sha1($_POST['new_mdp']));
		        
				  modifier_mot_de_passe($passe);
				  header("Location:index.php?page=login");
				
			 }
		   }
		   else
	       {
		      header("Location:index.php?page=code");
	       }
		 }
		 else
	     {
		   header("Location:index.php?page=mdp_oublie");
	     }
			 
	 }

?>