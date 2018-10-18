<?php
function infos_montant_total()
{
	$infos1 = array();
	if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
	{
		$confirme = "EN COURS";
		$mont_vos_fact     = htmlspecialchars($_POST['mont']);
	         $tva     = htmlspecialchars($_POST['tva']);
		     $pt     = htmlspecialchars($_POST['pt']);
		$date = date("Y-m-j");
		$id_client = htmlspecialchars($_SESSION['id_client']);
		$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
		   //$bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
		   //$bdd = new PDO ('mysql:host=localhost;dbname=id2084383_ffs;charset=utf8','id2084383_jacknouatin','97098482jn');
		$reqstockage = $bdd->prepare("SELECT id_client,mont_vos_fact, prix_total, confirme FROM payer WHERE id_client = ? and mont_vos_fact = ? and prix_total = ? and confirme = ? ");
		$reqstockage->execute(array($id_client,$mont_vos_fact,$pt,$confirme));
	
	   while($userinfo = $requser->fetch(PDO::FETCH_ASSOC))
	   {
		$infos1[] = $userinfo;
	   }
	  return $infos1;
	}
	else
	{
		$phone = htmlspecialchars($_SESSION['phone']);
	    $bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
		   //$bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
		   //$bdd = new PDO ('mysql:host=localhost;dbname=id2084383_ffs;charset=utf8','id2084383_jacknouatin','97098482jn');
	    $id_client = htmlspecialchars($_SESSION['id_client']);
		$reqstockage = $bdd->prepare("SELECT id_client,mont_vos_fact, prix_total,confirme FROM payer WHERE id_client = ? and mont_vos_fact = ? and prix_total = ? and confirme = ? ");
		$reqstockage->execute(array($id_client,$mont_vos_fact,$pt,$confirme));
	
	while($userinfo = $requser->fetch(PDO::FETCH_ASSOC))
	{
		$infos1[] = $userinfo;
	}
	return $infos1;
	}
}
?>