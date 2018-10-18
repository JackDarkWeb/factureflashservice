<?php
// la function qui va recuperer les infos sur les commandes
function infos_commandes($bdd)
{
	   $infos_commandes = array();
	
	   $reqcommande = $bdd->query("SELECT * FROM payer WHERE confirme = 'EN COURS' or confirme = 'Traitement' ");
	
	   while($commandesinfo = $reqcommande->fetch())
	   {
		$infos_commandes[] = $commandesinfo;
	   }
	  return $infos_commandes;
}
	?>