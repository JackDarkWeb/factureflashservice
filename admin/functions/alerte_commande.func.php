<?php
// la function qui va nous alerter si une commande a ete effectuee

function alerte_commande()
{
    //$bdd = new PDO('mysql:host=localhost;dbname=inscription','root','');
	$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
    $result = $bdd->query('SELECT COUNT(*) AS nb FROM payer');
    $columns = $result->fetch();
    $nb = $columns['nb'];
    return $nb;
}
?>