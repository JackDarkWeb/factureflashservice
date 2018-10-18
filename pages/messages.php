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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>  
 $(document).ready(function(){ 
       $("#message").focus();
       $("<audio id='beepAudio'><source type='audio/mpeg' src='viber.mp3'>").appendTo('body'); 
       $('#submit').click(function(){   
            var message = $('#message').val();
            var date_recus = '';		   
            var date_recus = $().val();
            var recus_message = '';		   
           var recus_message = $().val();  
           var id = $('#id').val();  
           var admin = $('#admin').val();  
           var id_client = $('#id_client').val();   
           if(message == '')  
           {  
                  
           }  
           else  
           {  
                $('#msg').html('');
				$("#message").focus();
                 $("#beepAudio")[0].play();				
				
                $.ajax({  
                     url:"MSGES.php",  
                     method:"POST",  
                     data:{message:message, date_recus:date_recus, recus_message:recus_message,
					        id:id, admin:admin, id_client:id_client},  
                     success:function(data){  
                          $("form").trigger("reset");  
                          
						  
                     }  
                });
                
           }
		   
		   
            		   
      }); 
         setInterval(function(){  
                               $('.contentMessages').load('index.php?page=load').fadeIn("Slow");
                                							   
                          }, 1000);	  
 });  
 </script>  

</head>
<body>
<?php include('pages/reseaux.php');?>
<div id="contener">
    <?php include('pages/menu.php');?>
<div class="messages">




<div class="message">
    <div class="contentMessages"></div>
</div>

		
             
		         <form class="chat">
                     <input type="text" name="id" id="id" value="<?= $_SESSION['id_client'];?>"/>				
                     <input type="text" name="admin" id="admin" value="6"/>				
                     <input type="text" name="id_client" id="id_client" value="<?= $_SESSION['id_client'];?>"/>				
                     <textarea name="message" id="message" placeholder="Saisir un message"></textarea>  
                     <input type="button" name="submit" id="submit" value="Submit" />  
                     <span id="msg" class="text-danger"></span>  
                     <span id="success_message" class="text-success"></span>  
                </form>  
                    
        
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
