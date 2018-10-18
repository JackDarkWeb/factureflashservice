<?php
if(isset($_SESSION['email']))
{
	              $infos = infos_membre_connecte();
                  foreach($infos as $info)
				  { 
					  message_lu();
				   ?>
				   
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<link rel="shortcut icon" href="images/logo.png"/>
<link rel="stylesheet" media="only screen and (min-width:320px) and (max-width:959px)"  href="css/mobile.css"/>
<link rel="stylesheet" media="only screen and (min-width:960px)"                        href="css/normales.css"/>
<meta name="viewport"  content="width=device-width"/>
<script src="scr/autocomplete.js"></script>
<script src="scr/index.js"></script>
<script src="scr/jquery.js"></script>


<script>
	     $(document).ready(function()
		 {
			 $(".connection").click(function()
			 {
				 $(".pop-outer").fadeIn('slow')
			 });
			 
			 $(".close").click(function()
			 {
				 $(".pop-outer").fadeOut('slow')
			 });
		 });
		 
		 
// La function qui va afficher le fichier selectionner avant l'envoi

$(window).load(function(){
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
             
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
             
            reader.readAsDataURL(input.files[0]);
        }
    }
     
    $("#imgInp").change(function(){
        readURL(this);
    });
});
</script>

</head>
<body>
<div id="contener">
<?php include('pages/header.php');?>
<div class="messages">




<div class="message">
        <div class="contentMessages">
<?php

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
</div>
</div>


     
	  <div class="chat">
		     <form method="post" action="">
			     <textarea name="message" placeholder="Saisir un message"></textarea>
			     <label class='connection'><img src="../images/trb.jpg" title="Choisir un fichier" alt="fichier" class="trb"/></label>
			     <input type="submit" name="submit" value="Envoyer"/>
			 </form>
      </div>
	  
	  
	   
	 
	<div class="pop-outer">
	
	     <div class="pop-isser">
		      <span class="close">&times;</span>
			     <div class="top_input">
				          <form method="post" action="" enctype="multipart/data-form">
			                  <label for="imgInp" class="label-file" title="Choisir un fichier"><img src="../images/photogallery.png" id="blah" width='200' height='150' /></label>
			                  <input  id="imgInp" name="message"  type="file"/><br/>
			                  <input type="submit" name="submit" id="inputFichier" value="Envoyer"/>
				         </form>
				 </div>
		 </div>
	     
    </div>	
	  
	  

</div>
</div>


</body>
</html>
<?php
				  }
 }
else
{
	 header('Location:index.php?pages=admin');
}
?>
