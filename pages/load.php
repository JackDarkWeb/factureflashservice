
<?php
if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
{
		 $id_client = htmlspecialchars($_SESSION['id_client']);
		 $admin = '6';
	  
	     $messages = array();
	     $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	   //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	     $reqmessage = $bdd->prepare("SELECT * FROM amis
	         INNER JOIN conversations_messages ON ((conversations_messages.id_client = '$id_client' and conversations_messages.pseudo_exp = '$admin')
	         or (conversations_messages.pseudo_exp = '$id_client' and conversations_messages.id_client = '$id_client'))
			 WHERE id_clien = '$id_client' and id_admin = '$admin' ");
								  
	            $reqmessage->execute(array());
	 

while($message = $reqmessage->fetch())

   {
?>
                     <?php
					     if($message['date_recus'] != '' and $message['recus_message']!= '')
						 {
					 ?>
					      <div class="messageRigth">
                                 
				                
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
	}
?>