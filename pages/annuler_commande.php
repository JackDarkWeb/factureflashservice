<?php
if(isset($_SESSION['nom']) or isset($_SESSION['prenom']) or isset($_SESSION['email'] ) or isset($_SESSION['phone'] )  or isset($_SESSION['id_client'] ))
{
	      $id_client = ($_SESSION['id_client']);
		  $confirme = "EN COURS";
          $deleteemail = $bdd->prepare("DELETE FROM payer WHERE id_client = '$id_client' and confirme = '$confirme'");
	      $deleteemail->execute(array($id_client, $confirme));
		  header("Location:index.php?page=payer_facture");
		  
}
else
{
	 header('Location:index.php?pages=accueil');
}
?>