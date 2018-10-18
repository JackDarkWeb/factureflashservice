<?php
if(isset($_POST['submit']))
{
	if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
	{
	    $id_client = htmlspecialchars($_POST['id_client']);
	    $id =  htmlspecialchars($_POST['id_client']);
	    $message = htmlspecialchars(trim($_POST['message']));
	    $admin = htmlspecialchars($_POST['admin']);
		$date_recus = '';
		$recus_message = '';
	    if(!empty($message))
	    {
		   $insert = $bdd->prepare("INSERT INTO conversations() VALUES()");
		   $insert->execute(array());
		   
		   $insert = $bdd->prepare("INSERT INTO conversations_messages(id_client, pseudo_exp, corps_message, recus_message, date_message, date_recus, lu) VALUES(?, ?, ?, ?, NOW(), ?, '0')");
		   $insert->execute(array($id_client, $id, $message, $recus_message, $date_recus));
		   
		   $insert = $bdd->prepare("INSERT INTO conversations_clients(pseudo_dest) VALUES(?)");
		   $insert->execute(array($admin));
		  
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
}


// la function qui va recuperer les messages
function message_client()
{
	if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
	{
		 $id_client = htmlspecialchars($_SESSION['id_client']);
		 $admin = htmlspecialchars($_GET['admin']);
	  
	     $messages = array();
	     $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	   //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	     $reqmessage = $bdd->prepare("SELECT * FROM amis
	         INNER JOIN conversations_messages ON ((conversations_messages.id_client = '$id_client' and conversations_messages.pseudo_exp = '$admin')
	         or (conversations_messages.pseudo_exp = '$id_client' and conversations_messages.id_client = '$id_client'))
			 WHERE id_clien = '$id_client' and id_admin = '$admin' ");
								  
	            $reqmessage->execute(array());
	 
	                 while($messageinfo = $reqmessage->fetch())
	                {
		                 $messages[] = $messageinfo;
	                }
	                     return $messages;
	}
	 
}


// la function qui va rendre les messages deja lu
function message_lus()
{
	if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
	{
	   $lu = '1';
	   $ad = htmlspecialchars($_GET['admin']);
	   $id = htmlspecialchars($_SESSION['id_client']);
	   $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	   //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	   $update = $bdd->query("UPDATE conversations_messages SET lu = '$lu' WHERE id_client = '$id' and pseudo_exp = '$ad'  ");
	}
}





function message_vu()
{
	if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
	{
	     $id_client = htmlspecialchars($_SESSION['id_client']);
	     $lu = 0;
	     $bdd = new PDO('mysql:host=localhost;dbname=ffs','root','');
	     $reqvu = $bdd->prepare("SELECT * FROM conversations_messages WHERE pseudo_exp = ? and lu = ? ");
		   $reqvu->execute(array($id_client, $lu));
		   $vuexiste = $reqvu->rowCount();
		   return $vuexiste;
	}
}


?>


