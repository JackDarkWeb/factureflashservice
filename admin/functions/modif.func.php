<?php
// la function qui va changer le statut traitement en deja paye
function deja_paye()
{
	  $ii = htmlspecialchars($_GET['close']);
	  $id_c = htmlspecialchars($_GET['bncp']);
	  $sta = 'Traitement';
	 //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	 $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	 $update = $bdd->query("UPDATE payer SET confirme = '$sta' WHERE id_client = '$id_c'  and id_payer = '$ii' ");
}
?>