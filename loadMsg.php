<?php
	 $connect = mysqli_connect("localhost", "root", "", "livres");  
	$req = $connect->query("SELECT * FROM messages");
	while($result = $req->fetch_array())
	{
		 echo $result['message'].'<br/>';
		 echo '<div class="left">'.$result['id'].'</div><br/>';
	}
?>	