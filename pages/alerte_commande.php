<?php
         $confirme = 'EN COURS';
         $result = $bdd->query("SELECT COUNT(*) AS nb FROM payer WHERE confirme = '$confirme' ");
         $columns = $result->fetch();
         $nb = $columns['nb'];
        
		if($nb == 1)
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

                                     mail('jacknouatin@yahoo.fr',$sujet,$message,$header); 
		}
		else
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

                                     mail('jacknouatin@yahoo.fr',$sujet,$message,$header); 
		}
?>			