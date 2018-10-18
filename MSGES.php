 <?php  
 $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');  
    
      
        $id_client = htmlspecialchars($_POST['id_client']);
	    $id =  htmlspecialchars($_POST['id_client']);
	    $message = htmlspecialchars(trim($_POST['message']));
	    $admin = htmlspecialchars(($_POST['admin']));
		$date_recus = '';
		$recus_message = ''; 
     if(isset($message))
	    {
		   $insert = $bdd->prepare("INSERT INTO conversations() VALUES()");
		   $insert->execute(array());
		   
		   $insert = $bdd->prepare("INSERT INTO conversations_messages(id_client, pseudo_exp, corps_message, recus_message, date_message, date_recus, lu, alerte) VALUES(?, ?, ?, ?, NOW(), ?, '0', '0')");
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
      
		  


?>
 
 