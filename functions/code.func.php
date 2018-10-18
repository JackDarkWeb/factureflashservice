<?php
if(isset($_POST['code0']))
{
	
	$code = htmlspecialchars(trim($_POST['code']));
	if(!empty($code))
	{
		$num_mail = $_SESSION['num_mail'];
		$select_code = $bdd->prepare("SELECT code FROM recuperation WHERE code = ? and num_mail = ?");
		$select_code->execute(array($code,$num_mail));
		
		if($info = $select_code->rowcount()== 1)
		{
			 $infos_code = $select_code->fetch();
			 
			 $_SESSION['code'] = $infos_email['code'];
			 $_SESSION['code'] = $code;
			 header("Location:index.php?page=new_mdp");
		}
		else
		{
			 $message = "Le code n'est pas correct";
		}
	}
	else
	{
		 $message = "Veuillez entrer le code";
	}
	
}


?>