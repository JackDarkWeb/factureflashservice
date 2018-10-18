<?php


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





$messages = message_client();
   foreach($messages as $message)
   {
?>
                     <?php
					     if($message['date_recus'] != '' and $message['recus_message']!= '')
						 {
					 ?>
					      <div class="messageRigth">
                                 
				                 <img src="avatar/defaut.png" alt="profil" title="Profil" height="30" width="30" id="avatar"/><span>Admin</span> 
				             <div class="envo">
							     <p><?php echo $message['recus_message'];?></p>
					             <p id="date"><?php echo date('d-m-Y  à  H:i:s',strtotime($message['date_recus']));?></p>
							 </div>
							 
							 
						 </div><br/>
					 <?php
						 }
						
					     elseif($message['date_message'] != '' and $message['corps_message'] != '')
						 {
					 ?>
					      <div class="messageLeft">
				                 <img src="avatar/defaut.png" alt="profil" title="Profil" height="30" width="30" id="avatar"/><span><?php echo $info['prenom'];?></span>
				 
				             <div class="recu">
				                 <p><?php echo $message['corps_message'];?></p>
					             <p id="date"><?php echo date('d-m-Y  à  H:i:s',strtotime($message['date_message']));?></p>
							 </div><br/>
						  </div>
					 <?php
					     }
					 ?>
				             
			 		 
<?php
   }
?>
<?php
if(message_vu()>= 1)
{
	echo <<<_END
	     <div id="lu">
             <div class="envoye"><p>envoyé</p></div>
         </div>
_END;
}
else
{
	 echo <<<_END
	     <div id="lu">
             <div class="vu"><p>vu</p></div>
         </div>
_END;
}
?>