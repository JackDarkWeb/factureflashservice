<?php
 if(isset($_GET['close']) and isset($_GET['bncp']))
 {
     $ii = htmlspecialchars($_GET['close']);
     $id_c = htmlspecialchars($_GET['bncp']);
	 deja_paye();
	 header('Location:index.php?page=statuts');
 }
 else
 {
	  header('Location:index.php?page=statuts');
 }
     
?>