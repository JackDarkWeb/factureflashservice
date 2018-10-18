<?php
if(isset($_POST['commander']))
{
	
	if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
	{
		$confirme = "EN COURS";
		$mont_vos_fact     = htmlspecialchars($_POST['mont']);
	    $tva     = htmlspecialchars($_POST['tva']);
		$pt     = htmlspecialchars($_POST['pt']);
		$date = date("Y-m-j");
		
		$id_client = htmlspecialchars($_SESSION['id_client']);
		$reqstockage = $bdd->prepare("SELECT id_client,confirme FROM payer WHERE id_client = ? and confirme = ?");
		$reqstockage->execute(array($id_client,$confirme));
		
		if($infosstockage = $reqstockage->rowcount() == 0)
			
		{
			
			
	         $mont_vos_fact     = htmlspecialchars($_POST['mont']);
	         $tva     = htmlspecialchars($_POST['tva']);
		     $pt     = htmlspecialchars($_POST['pt']);
	         $id_client = htmlspecialchars($_SESSION['id_client']);

	         $stockage = $bdd->prepare("INSERT INTO payer(id_client, mont_vos_fact, tva, prix_total, date, confirme) VALUES(:id_client,:mont_vos_fact, :tva, :prix_total, NOW(),'EN COURS') ");
	        $stockage->execute(array('id_client' => $id_client,
			                         'mont_vos_fact' => $mont_vos_fact,
                                     'tva' => $tva,
									 'prix_total' => $pt
									 ));
									 
									 
									 
									 
		 $email_alerte = array('jacknouatin@yahoo.fr','beniahouanto@gmail.com');   				   
         $result = $bdd->query("SELECT COUNT(*) AS nb FROM payer WHERE confirme = '$confirme' ");
         $columns = $result->fetch();
         $nb = $columns['nb'];
        
		if($nb == 1)
		{
			 for($i = 0; $i < 3; $i++)
			   {
			                             $header="MIME-Version: 1.0\r\n";
                                         $header.='From:"Facture Flash Service" <contact@factureflashservice.com>'."\n";
                                        $header.='Content-Type:text/html;charset="utf-8"'."\n";
                                        $header.='Content-Transfer-encoding: 8bit';
										$sujet = "Alerte de commande";
                                         $message='
                                          <html>
                                           <body>
                                               <div align="center">Bonjour <b></b>,</div>
											   <p>Vous avez une commade en cours de paiement</p>
											  
                                           </body>
                                         </html>
                                                ';

                                     mail($email_alerte[$i],$sujet,$message,$header); 
			   }
		}
		else
		{
			
			for($i = 0; $i < 3; $i++)
			   {
			                             $header="MIME-Version: 1.0\r\n";
                                         $header.='From:"Facture Flash Service" <contact@factureflashservice.com>'."\n";
                                        $header.='Content-Type:text/html;charset="utf-8"'."\n";
                                        $header.='Content-Transfer-encoding: 8bit';
										$sujet = "Alerte de commande";
                                         $message='
                                          <html>
                                           <body>
                                               <div align="center">Bonjour <b></b>,</div>
											   <p>Vous avez '.$nb.' commandes en cours de traitement</p>
											  
                                           </body>
                                         </html>
                                                ';

                                     mail($email_alerte[$i],$sujet,$message,$header); 
			   }
		}
		
		                    
		                    $query = $bdd->prepare('SELECT * FROM payer WHERE id_client = ? and confirme = ?');
	                        $query->execute(array($id_client, $confirme));
							if($row = $query->rowCount() == 1)
	                          {

 
        
			                            $header="MIME-Version: 1.0\r\n";
                                        $header.='From:"Facture Flash Service" <contact@factureflashservice.com>'."\n";
                                        $header.='Content-Type:text/html;charset="utf-8"'."\n";
                                        $header.='Content-Transfer-encoding: 8bit';
										$sujet = "Alerte de commande";
                                        $alerte='
                                          <html>
                                           <body>
                                               <div align="center">Bienvenue sur Facture Flash Service <b></b>,</div>
											   <p>Vous venez d\'enregistrer une commande</p>
											   <p> Aller sur <a href="factureflashservice.com">http://www.factureflashservice.com</a></p>
											  
                                           </body>
                                         </html>
                                                ';

                                     mail($_SESSION['email'],$sujet,$alerte,$header);
	                      }
		
		
		}
		
		 
		
		
	}
}


	
	
	
	
	
		
		
		
		
		
		
/* Traitement des tarif */
		
if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
	{
		
  		
        $id_client = htmlspecialchars($_SESSION['id_client']);
       $req = $bdd->prepare("SELECT SUM(montant_f) AS nb FROM commandes WHERE id_client = '$id_client' and activer = '0' ");
       $req->execute();
       $columns = $req->fetch();
       $nb = $columns['nb']; 
	   $mont = $nb;
	   if(0 <= $mont and $mont <= 2000)
	   {
		   $tva = 0;
		   $pt = $mont + $tva;
	   }
	   elseif(2001 <= $mont and $mont <= 10000)
	   {
		   $tva = 400;
		   $pt = $mont + $tva;
	   }
	   elseif(10001 <= $mont and $mont <= 20000)
	   {
		   $tva = 650;
		   $pt = $mont + $tva;
	   }
	   elseif(20001 <= $mont and $mont <= 30000)
	   {
		   $tva = 800;
		   $pt = $mont + $tva;
	   }
	   elseif(30001 <= $mont and $mont <= 40000)
	   {
		   $tva = 950;
		   $pt = $mont + $tva;
	   }
	   elseif(40001 <= $mont and $mont <= 50000)
	   {
		   $tva = 1200;
		   $pt = $mont + $tva;
	   }
	   elseif(50001 <= $mont and $mont <= 60000)
	   {
		   $tva = 1400;
		   $pt = $mont + $tva;
	   }
	   elseif(60001 <= $mont and $mont <= 70000)
	   {
		   $tva = 1600;
		   $pt = $mont + $tva;
	   }
	   elseif(70001 <= $mont and $mont <= 100000)
	   {
		   $tva = 1800;
		   $pt = $mont + $tva;
	   }
	   elseif(10001 <= $mont)
	   {
		   $tva = 2000;
		   $pt = $mont + $tva;
	   }
	   
	   
	}
	
	
	
// la function qui va supprimer les facture en traitement
function supp()
{
	 $bdd = new PDO('mysql:host=localhost; dbname=ffs; charset=utf8', 'root', '');
	 //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	 $a = htmlspecialchars($_POST['a']);
	 $b = htmlspecialchars($_POST['b']);
	 
		 if(!empty($a)and !empty($b))
		 {
			 $deletecommande = $bdd->prepare('DELETE FROM commandes WHERE id_comm = \'' .$_POST['b']. '\' and id_client = \'' .$_POST['a']. '\'');
	         $deletecommande->execute(array($b, $a));
		 }
}
		
?>

