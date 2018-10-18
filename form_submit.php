
<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Multiple Image Upload</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 

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
			
                <form id="submit_form">  
                     <label>Nom</label>  
                     <input type="text" name="name" id="name" class="form-control" />  
                     
                     <br />  
                     <label>Message</label>  
                     <textarea name="message" id="message" class="form-control"></textarea>  
                     <br />  
                     <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
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
           var name = $('#name').val();  
           var message = $('#message').val();
		   var date = 1;
           var date = $().val();
           			
           if(name == '' || message == '')  
           {  
                  
           }  
           else  
           {  
                $('#msg').html('');
				$("#message").focus();
                 $("#beepAudio")[0].play();				
				
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:{name:name, date:date, message:message},  
                     success:function(data){  
                          $("form").trigger("reset");  
                          
						  
                     }  
                });
                
           }
		   
		   
            		   
      }); 
         setInterval(function(){  
                               $('#chatMsg').load('loadMsg').fadeIn("Slow");
                                							   
                          }, 1000);	  
 });  
 </script>  