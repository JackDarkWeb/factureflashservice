
<?php




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


$messages = message_client();
   foreach($messages as $message)
   {
?>
                     <?php
					     if($message['date_message'] != '' and $message['corps_message'] != '')
						 {
					 ?>
					      <div class="messageRigth">
                                 <img src="avatar/defaut.png" alt="profil" title="Profil" height="30" width="30" id="avatar"/><span><?php echo $message['prenom'];?></span>
				
				             <div class="envo">
				                 <p><?php echo $message['corps_message'];?></p>
					             <p id="date"><?php echo date('d-m-Y  à  H:i:s',strtotime($message['date_message']));?></p>
							 </div>
						 </div><br/>
					 <?php
					     }
					     elseif($message['date_recus'] != '' and $message['recus_message']!= '')
						 {
					 ?>
					      <div class="messageLeft">
				                 <img src="avatar/defaut.png" alt="profil" title="Profil" height="30" width="30" id="avatar"/><span>Admin</span> 
				 
				             <div class="recu">
				                 <p><?php echo $message['recus_message'];?></p>
					             <p id="date"><?php echo date('d-m-Y  à  H:i:s',strtotime($message['date_recus']));?></p>
							 </div>
						  </div><br/>
					 <?php
					     }
					 ?>
				             
			 		 
<?php
   }
?>