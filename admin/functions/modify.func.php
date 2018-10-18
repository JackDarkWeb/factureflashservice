<?php
// la function qui va changer le statut traitement en deja paye
function dejas_payes()
{
	  $i = htmlspecialchars($_GET['non']);
	  $id_cl = htmlspecialchars($_GET['bnc']);
	  $stat = 'DEJA PAYE';
	 //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	 $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	 $update = $bdd->query("UPDATE payer SET confirme = '$stat' WHERE id_client = '$id_cl'  and id_payer = '$i' ");
}
?>