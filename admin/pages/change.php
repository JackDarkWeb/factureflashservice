<?php
 if(isset($_GET['oui']) and isset($_GET['bn']))
 {
     $id = htmlspecialchars($_GET['oui']);
     $id_cli = htmlspecialchars($_GET['bn']);
	 dejax_payex();
	 header('Location:index.php?page=statuts');
 }
 else
 {
	  header('Location:index.php?page=statuts');
 }
     
?>