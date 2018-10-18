<?php
if(isset($_POST['submit']))
{
	$user         = htmlspecialchars(trim($_POST['user']));
	$password         = htmlspecialchars(sha1($_POST['password']));
	$confirm_password = htmlspecialchars(sha1($_POST['confirm_password']));
	if($user)
	{
		$requser = $bdd->prepare('SELECT user FROM clients WHERE username = ?');
		$requser->execute(array($user));
		
		$result = $requser->rowcount();
		if($result == 0)
		{
			
			$insert = $bdd->prepare("INSERT INTO admin(user,password,avatar) VALUE(?,?,'defaut')");
			$insert->execute(array($user,$password));
			header('Location:index.php?page=login_admin'); 
		
                      
	    }
	    else
	      {
		     $error = "Cet username existe déjà";
	      }
	}
	
}
?>