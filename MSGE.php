

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>test</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
		   <link rel="stylesheet" media="only screen and (min-width:1080px)"                       href="css/styles.css"/>

<style>
#msg
{
	 color:black;
}
.left
{
	  margin-left:80px;
}

#chatMsg
{
	 max-height:100px;
	 overflow-y: auto;
	 border:1px solid red;
}
</style>		   
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:500px;">
		   
            <div id="chatMsg"></div>
			
                <form class="chat">
                     <input type="text" name="id" id="id" value="1"/>				
                     <input type="text" name="admin" id="admin" value="6"/>				
                     <input type="text" name="id_client" id="id_client" value="1"/>				
                     <textarea name="message" id="message" placeholder="Saisir un message"></textarea>  
                     <input type="button" name="submit" id="submit" value="Submit" />  
                     <span id="msg" class="text-danger"></span>  
                     <span id="success_message" class="text-success"></span>  
                </form>  
           </div>  
      </body>  
 </html>  
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
                               $('#chatMsg').load('req.php').fadeIn("Slow");
                                							   
                          }, 1000);	  
 });  
 </script>  