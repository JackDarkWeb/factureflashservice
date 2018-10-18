<?php
// La function qui vq supprimer une commande

function DETELE_COMMANDE($id_comm)
{
	 $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	 $id_comm = htmlspecialchars($_GET['id_comm']);
	 $deletecommande = $bdd->prepare('DELETE FROM commandes WHERE id_comm = \'' .$_GET['id_comm']. '\'');
	 $deletecommande->execute(array($id_comm));
}
?>