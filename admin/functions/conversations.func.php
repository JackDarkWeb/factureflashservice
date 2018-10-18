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
}





if(isset($_POST['submit']))
{
	
	if(isset($_SESSION['email']))
	{
	    $pseudo_exp = '6';
		$date_message = '';
		$corps_message = '';
	    $message = htmlspecialchars(trim($_POST['message']));
	    $id_client = htmlspecialchars(($_GET['id_client']));
	    $id = htmlspecialchars(($_GET['id_client']));
	    if(!empty($message))
	    {
		   $insert = $bdd->prepare("INSERT INTO conversations() VALUES()");
		   $insert->execute(array());
		   
		   $insert = $bdd->prepare("INSERT INTO conversations_messages(id_client, pseudo_exp, corps_message, recus_message, date_message, date_recus, lu, alerte) VALUES(?, ?, ?, ?, ?, NOW(), '0', '0')");
		   $insert->execute(array($id_client, $pseudo_exp, $corps_message, $message, $date_message));
		   
		   $insert = $bdd->prepare("INSERT INTO conversations_clients(pseudo_dest) VALUES(?)");
		   $insert->execute(array($id));
		   
		   $reqamis = $bdd->prepare("SELECT * FROM amis WHERE id_client = ? and id_admin = ?");
				 $reqamis->execute(array($id_client, $pseudo_exp));
				 $amis = $reqamis->rowCount();
		             if($amis == 0)
		             {
		                 $insert =  $bdd->prepare("INSERT INTO amis(id_client, id_admin, date) VALUES(?, ?, NOW())");
		                 $insert->execute(array($id_client, $pseudo_exp));
					 }
		   
	    }
	}
}





// la function qui va recuperer les messages
function message_client()
{
	
		 $id_client = htmlspecialchars($_GET['id_client']);
		 $admin = '6';
	  
	     $messages = array();
	     $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	   //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	     $reqmessage = $bdd->prepare("SELECT * FROM amis
	         INNER JOIN conversations_messages ON ((conversations_messages.id_client = '$id_client' and conversations_messages.pseudo_exp = '$admin')
	         or (conversations_messages.pseudo_exp = '$id_client' and conversations_messages.id_client = '$id_client'))
			 INNER JOIN clients ON clients.id_client = amis.id_clien
			 WHERE id_clien = '$id_client' and id_admin = '$admin' ");
								  
	            $reqmessage->execute(array());
	 
	                 while($messageinfo = $reqmessage->fetch())
	                {
		                 $messages[] = $messageinfo;
	                }
	                     return $messages;
	
	 
}



// la function qui va rendre les messages deja lu
function message_lu()
{
	   $lu = '1';
	   $id = htmlspecialchars($_GET['id_client']);
	   $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	   //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	   $update = $bdd->query("UPDATE conversations_messages SET lu = '$lu' WHERE id_client = '$id' and pseudo_exp = '$id'  ");
}

?>