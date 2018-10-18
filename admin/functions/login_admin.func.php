<?php
if(isset($_POST['submit']))
{
	$email       = htmlspecialchars(($_POST['email']));
	$password1  = htmlspecialchars(sha1($_POST['password1']));
	
	  if(!empty($email) and !empty($password1))
	  {
		   $requser = $bdd->prepare("SELECT * FROM clients WHERE email = ? and password = ? ");
		   $requser->execute(array($email,$password1));
		   $userexiste = $requser->rowCount();
		    if($userexiste == 1)
		     {
			    
			    $userinfo = $requser->fetch();
			    $_SESSION['email'] = $userinfo['email'];
			    $_SESSION['prenom'] = $userinfo['prenom'];
				
			    header('Location:index.php?page=admin');
		     }
			 
			 else
			 {
					$error = "Identifiant ou mot de passe incorrect";
			 }
			
	  
			        	
	 }
     else
	 {
	   $error = "Entrez identifiant et mot de passe";
	 }
}
?>