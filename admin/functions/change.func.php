<?php
// la function qui va changer le statut traitement en deja paye
function dejax_payex()
{
	  $id = htmlspecialchars($_GET['oui']);
	  $id_cli = htmlspecialchars($_GET['bn']);
	  $st = 'DEJA PAYE';
	 //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	 $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	 $update = $bdd->query("UPDATE payer SET confirme = '$st' WHERE id_client = '$id_cli'  and id_payer = '$id' ");
}
?>