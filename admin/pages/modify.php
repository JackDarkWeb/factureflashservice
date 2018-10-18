<?php
 if(isset($_GET['non']) and isset($_GET['bnc']))
 {
     $i = htmlspecialchars($_GET['non']);
     $id_cl = htmlspecialchars($_GET['bnc']);
	 dejas_payes();
	 header('Location:index.php?page=statuts');
 }
 else
 {
	  header('Location:index.php?page=statuts');
 }
     
?>