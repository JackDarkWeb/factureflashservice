<?php
include('functions/profil.func.php');
if(isset($_SESSION['nom']) or isset($_SESSION['prenom']) or isset($_SESSION['email'] ) or isset($_SESSION['phone'] ) or isset($_SESSION['id_client'] ))
{
	              $infos = infos_membre_connecte();
                  foreach($infos as $info)
				  {
					  if(isset($_GET['admin']) and $_GET['admin']== 6)
					  {
						  message_lus();
						  
				   ?>
				   
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<link rel="shortcut icon" href="images/logo.png"/>
<link rel="stylesheet" media="only screen and (min-width:320px) and (max-width:479px)"  href="css/mobile.css"/>
<link rel="stylesheet" media="only screen and (min-width:480px) and (max-width:767px)"  href="css/ipad.css"/>
<link rel="stylesheet" media="only screen and (min-width:768px) and (max-width:799px)"  href="css/tablette.css"/>
<link rel="stylesheet" media="only screen and (min-width:800px) and (max-width:959px)"  href="css/tabl_normale.css"/>
<link rel="stylesheet" media="only screen and (min-width:960px) and (max-width:1079px)" href="css/normaux.css"/>
<link rel="stylesheet" media="only screen and (min-width:1080px)"                       href="css/styles.css"/>
<meta name="viewport"  content="width=device-width"/>
<script src="scr/autocomplete.js"></script>
<script src="scr/index.js"></script>
<script src="scr/jquery.js"></script>

</head>
<body>
<?php include('pages/reseaux.php');?>
<div id="contener">
    <?php include('pages/menu.php');?>
<div class="messages">




<div class="message">
    <div class="contentMessages">
<?php
$messages = message_client();
   foreach($messages as $message)
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
</div>
</div>

		
             <div class="chat">
		         <form method="post" action="">
			         <textarea name="message" placeholder="Saisir un message"></textarea><input type="submit" name="submit" value="Envoyer"/>
			     </form>
            </div>         
        
</div>
</div>


</body>
</html>
<?php
				  }
				  else
				  {
					  header('Location:index.php?page=messages&admin=6');
				  }
				}
 }
else
{
	 header('Location:index.php?pages=accueil');
}
?>
