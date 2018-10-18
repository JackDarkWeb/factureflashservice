<?php  
 //insert.php  
 $connect = mysqli_connect("localhost", "root", "", "livres");  
 if(isset($_POST["name"]))  
 {  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $date = 1;  
      
      $message = mysqli_real_escape_string($connect, $_POST["message"]);  
      $sql = "INSERT INTO messages(name, message, date) VALUES ('".$name."', '".$message."', '".$date."')";  
      if(mysqli_query($connect, $sql))  
      {  
           echo "Message Saved";  
      }  
 }  
 ?>  