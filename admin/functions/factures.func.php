<?php
//la function qui va retourner tous les commandes en cours et en traitement

function FACTURES_PAYES()
{
	  $id = htmlspecialchars($_GET['id_client']);
	  $activer = '0';
	  $factures = array();
	  $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	  $req = $bdd->prepare("SELECT * FROM resumes
                             INNER JOIN compteurs ON resumes.id_resume = compteurs.id_client and resumes.n_police = compteurs.num_police
							 INNER JOIN commandes ON resumes.id_resume = commandes.id_client and resumes.n_police = commandes.num_police
							  and commandes.activer = '$activer'
							 WHERE id_resume = '$id' ");
      $req->execute(array($activer, $id));
	  while($result = $req->fetch())
	  {
		  $factures[] = $result;
	  }
	     return $factures;
}

//la function qui va retourner le resume des factures commandees

function RESUMES()
{
	  $id = htmlspecialchars($_GET['id_client']);
	  $confirme = 'EN COURS';
	  $resumes = array();
	  $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	  $req = $bdd->prepare("SELECT * FROM payer WHERE confirme = '$confirme' and id_client = '$id' ");
      $req->execute(array($confirme, $id));
	  while($result = $req->fetch())
	  {
		  $resumes[] = $result;
	  }
	     return $resumes;
}

?>