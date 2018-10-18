<?php

 // la function qui va recuperer les infos sur les compteurs 
function infos_compteur()
{
	$infos1 = array();
	if(isset($_SESSION['email']) or isset($_SESSION['id_client']))
	{
	   $id_client = htmlspecialchars($_SESSION['id_client']);
	 
		  $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
		   
	   $requser = $bdd->prepare("SELECT * FROM compteurs WHERE id_client = '$id_client' ");
	   $requser->execute(array($id_client));
	
	   while($userinfo = $requser->fetch(PDO::FETCH_ASSOC))
	   {
		$infos1[] = $userinfo;
	   }
	  return $infos1;
	}
	else
	{
		$phone = htmlspecialchars($_SESSION['phone']);
	    
		  $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
		   
	    $requser = $bdd->prepare("SELECT * FROM compteurs WHERE  id_client = '$id_client' ");
	    $requser->execute(array($id_client));
	
	while($userinfo = $requser->fetch(PDO::FETCH_ASSOC))
	{
		$infos1[] = $userinfo;
	}
	return $infos1;
	}
}



/*--- Traitement de payement de la facture*/
if(isset($_POST['submit']))
{
	
	if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
	{
	
     $activer = '0';	
	$confirme = "EN COURS";
	$num     = htmlspecialchars($_POST['num']);
	$montant = htmlspecialchars($_POST['montant']);
	$id_client = ($_SESSION['id_client']);
	
	if(!empty($num) and !empty($montant))
	{
		if(holds_montant($montant) == 1)
		{
			
			if($montant >= 0)	
			{				
		/*$reqstockage = $bdd->prepare("SELECT num_police,montant_f, id_client FROM commandes WHERE num_police =? and montant_f = ? and id_client = ? ");
		$reqstockage->execute(array($num,$montant,$id_client));
	 if($infosstockage = $reqstockage->rowcount() == 0)
	 {
		     $reqstockage = $bdd->prepare("SELECT activer id_client FROM commandes WHERE activer = ? and id_client = ? ");
		      $reqstockage->execute(array($activer,$id_client));
	    if($infosstockage = $reqstockage->rowcount() == 0)
		{*/
		 
		 $id_client = htmlspecialchars($_SESSION['id_client']);
         $result = $bdd->query("SELECT COUNT(*) AS nb FROM commandes WHERE id_client = '$id_client' and activer = '$activer'");
         $columns = $result->fetch(PDO::FETCH_ASSOC);
         $nb = $columns['nb'];
		 
        
		if($nb <= 2)
		{
		 /*
		if(0 < $montant and $montant <= 1000)
		{*/
			
			$pc = 50;
			$totauxmontant = $pc + $montant;
			$stockage = $bdd->prepare("INSERT INTO commandes(id_client,num_police,montant_f ,date,activer) VALUES(:id_client,:num_police,:montant_f, NOW(), :activer)");
	        $stockage->execute(array('id_client' => $id_client,
			                         'num_police' => $num,
                                     'montant_f' => $montant, 
									 
									 'activer' => $activer));
									 
				 $req = $bdd->prepare('SELECT * FROM resumes WHERE id_resume = ? and n_police = ?');
                 $req->execute(array($id_client, $num));
                 if($ressult = $req->rowCount() == 0)
				 {
					   $stockage = $bdd->prepare("INSERT INTO resumes(id_resume, n_police) VALUES(:id_resume, :n_police)");
			                 $stockage->execute(array('id_resume' => $id_client,
			                          'n_police' => $num ));
				 }
                 			 
				            
	             header('location:index.php?page=traitement');
				
		/*
		}
		
		elseif(1001 <= $montant and $montant <= 10000)
		{
			
			$pc = 400;
			$totauxmontant = $pc + $montant;
		    $stockage = $bdd->prepare("INSERT INTO commandes(id_client,num_police,montant_f,prix_c,prix_t,date,activer) VALUES(:id_client,:num_police,:montant_f,:prix_c,:prix_t,NOW(), :activer)");
	        $stockage->execute(array('id_client' => $id_client,
			                         'num_police' => $num,
                                     'montant_f' => $montant, 
									 'prix_c' => $pc, 
									 'prix_t' => $totauxmontant,
									 'activer' => $activer));
	             header('location:index.php?page=traitement');
		}
		elseif(10001 <= $montant and $montant <= 20000)
		{
			
			$pc = 650;
			$totauxmontant = $pc + $montant;
		    $stockage = $bdd->prepare("INSERT INTO commandes(id_client,num_police,montant_f,prix_c,prix_t,date,activer) VALUES(:id_client,:num_police,:montant_f,:prix_c,:prix_t,NOW(),:activer)");
	        $stockage->execute(array('id_client' => $id_client,
			                         'num_police' => $num,
                                     'montant_f' => $montant, 
									 'prix_c' => $pc, 
									 'prix_t' => $totauxmontant,
									 'activer' => $activer));
	             header('location:index.php?page=traitement');
		}
		elseif(20001 <= $montant and $montant <= 30000)
		{
			
			$pc = 800;
			$totauxmontant = $pc + $montant;
		    $stockage = $bdd->prepare("INSERT INTO commandes(id_client,num_police,montant_f,prix_c,prix_t,date,activer) VALUES(:id_client,:num_police,:montant_f,:prix_c,:prix_t,NOW(), :activer)");
	        $stockage->execute(array('id_client' => $id_client,
			                         'num_police' => $num,
                                     'montant_f' => $montant, 
									 'prix_c' => $pc, 
									 'prix_t' => $totauxmontant,
									 'activer' => $activer));
	             header('location:index.php?page=traitement');
		}
		elseif(30001 <= $montant and $montant <= 40000)
		{
			
			$pc = 925;
			$totauxmontant = $pc + $montant;
		    $stockage = $bdd->prepare("INSERT INTO commandes(id_client,num_police,montant_f,prix_c,prix_t,date,activer) VALUES(:id_client,:num_police,:montant_f,:prix_c,:prix_t,NOW(),:activer)");
	        $stockage->execute(array('id_client' => $id_client,
			                         'num_police' => $num,
                                     'montant_f' => $montant, 
									 'prix_c' => $pc, 
									 'prix_t' => $totauxmontant,
									 'activer' => $activer));
	             header('location:index.php?page=traitement');
		}
		elseif(40001 <= $montant and $montant <= 50000)
		{
			
			$pc = 1200;
			$totauxmontant = $pc + $montant;
		    $stockage = $bdd->prepare("INSERT INTO commandes(id_client,num_police,montant_f,prix_c,prix_t,date,activer) VALUES(:id_client,:num_police,:montant_f,:prix_c,:prix_t,NOW(),:activer)");
	        $stockage->execute(array('id_client' => $id_client,
			                         'num_police' => $num,
                                     'montant_f' => $montant, 
									 'prix_c' => $pc, 
									 'prix_t' => $totauxmontant,
									 'activer' => $activer));
	             header('location:index.php?page=traitement');
		}
		elseif(50001 <= $montant and $montant <= 60000)
		{
			
			$pc = 1400;
			$totauxmontant = $pc + $montant;
		    $stockage = $bdd->prepare("INSERT INTO commandes(id_client,num_police,montant_f,prix_c,prix_t,date,activer) VALUES(:id_client,:num_police,:montant_f,:prix_c,:prix_t,NOW(),:activer)");
	        $stockage->execute(array('id_client' => $id_client,
			                         'num_police' => $num,
                                     'montant_f' => $montant, 
									 'prix_c' => $pc, 
									 'prix_t' => $totauxmontant,
									 'activer' => $activer));
	             header('location:index.php?page=traitement');
		}
		elseif(60001 <= $montant and $montant <= 70000)
		{
			
			$pc = 1600;
			$totauxmontant = $pc + $montant;
		    $stockage = $bdd->prepare("INSERT INTO commandes(id_client,num_police,montant_f,prix_c,prix_t,date,activer) VALUES(:id_client,:num_police,:montant_f,:prix_c,:prix_t,NOW(),:activer)");
	        $stockage->execute(array('id_client' => $id_client,
			                         'num_police' => $num,
                                     'montant_f' => $montant, 
									 'prix_c' => $pc, 
									 'prix_t' => $totauxmontant,
									 'activer' => $activer));
	             header('location:index.php?page=traitement');
		}
		elseif(70001 <= $montant and $montant <= 80000)
		{
			
			$pc = 1650;
			$totauxmontant = $pc + $montant;
		    $stockage = $bdd->prepare("INSERT INTO commandes(id_client,num_police,montant_f,prix_c,prix_t,date,activer) VALUES(:id_client,:num_police,:montant_f,:prix_c,:prix_t,NOW(),:activer)");
	        $stockage->execute(array('id_client' => $id_client,
			                         'num_police' => $num,
                                     'montant_f' => $montant, 
									 'prix_c' => $pc, 
									 'prix_t' => $totauxmontant,
									 'activer' => $activer));
	             header('location:index.php?page=traitement');
		}
		elseif(80001 <= $montant and $montant <= 100000)
		{
			
			$pc = 1825;
			$totauxmontant = $pc + $montant;
		   $stockage = $bdd->prepare("INSERT INTO commandes(id_client,num_police,montant_f,prix_c,prix_t,date,activer) VALUES(:id_client,:num_police,:montant_f,:prix_c,:prix_t,NOW(),:activer)");
	        $stockage->execute(array('id_client' => $id_client,
			                         'num_police' => $num,
                                     'montant_f' => $montant, 
									 'prix_c' => $pc, 
									 'prix_t' => $totauxmontant,
									 'activer' => $activer));
	             header('location:index.php?page=traitement');
		}
		elseif(100001 <= $montant)
		{
			
			$pc = 2050;
			$totauxmontant = $pc + $montant;
		    $stockage = $bdd->prepare("INSERT INTO commandes(id_client,num_police,montant_f,prix_c,prix_t,date,activer) VALUES(:id_client,:num_police,:montant_f,:prix_c,:prix_t,NOW(),:activer)");
	        $stockage->execute(array('id_client' => $id_client,
			                         'num_police' => $num,
                                     'montant_f' => $montant, 
									 'prix_c' => $pc, 
									 'prix_t' => $totauxmontant,
									 'activer' => $activer));
	             header('location:index.php?page=traitement');
		}
		else
		{
			$error = "Une erreur s'est produite lors du calcule";
		}
		*/
	  
	  }
	  else
	  {
		$error = "Vous ne pouvez payer que trois factures à la fois. Accédez à vos factures en cours de traitement <a href='index.php?page=traitement'>CONTINUER</a>"; 
	  }
	 
	   /* }
	    else
	    {
		$error = "Vous avez toujours des commandes non payées.   <a href='index.php?page=vos_commandes'>CONSULTER</a>"; 
	    }
	 
	 }
	 else
	 {
		$error = "Ce paiement était déjà en cours.   <a href='index.php?page=traitement'>CONTINUER</a>"; 
	 }*/
	       }
	        else
	       {
		       $error = "Nous vous demandons d'entrer une somme numérique positive";
	       }
		
		}
	    else
	    {
		    $error = "Nous vous demandons d'entrer une somme numérique";
	    }
	}
	else
	{
		$error = "Tous les champs doivent être remplis";
	}
 }
}

/*
if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
	{
		     $id_client = ($_SESSION['id_client']);
		    $activer = 1;
	        $deleteemail = $bdd->prepare("DELETE FROM commandes WHERE id_client = '$id_client' and activer = '$activer'");
	        $deleteemail->execute(array($id_client,$activer));
	}
/*
if(isset($_POST['commander']))
{
	$num     = htmlspecialchars($_POST['num']);
	$montant = htmlspecialchars($_POST['montant']);
	$totauxmontant = $pc + $montant;
	
	$reqcommande = $bdd->prepare("INSERT INTO commandes(num_police,montant_f,prix_c,prix_t) VALUES(:num_police,:montant_f,:prix_c,:prix_t)");
	$reqcommande->execute(array('num_police' => $num,
'montant_f' => $montant, 'prix_c' => $pc, 'prix_t' => $totauxmontant));
	die('Bien enregistre');
}
*/









/* La fonction qui verifie si le montant est numerique */
function holds_montant($montant)
   {
     return preg_match("/^-?[0-9]+$/", $montant);
   }
   
   
   
   
   // la function de la table resumes 
   
   function resumesTable()
   {
			$bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
			$stockage = $bdd->prepare("INSERT INTO resumes(id_resume, n_police) VALUES(:id_resume, :n_police)");
			$stockage->execute(array('id_resume' => $id_client,
			                          'n_police' => $num ));		  
   }

?>
