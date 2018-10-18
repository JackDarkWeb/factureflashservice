<?php
if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
{
	 $id_client = htmlspecialchars($_SESSION['id_client']);
     $confirme = 'EN COURS';
     $traitement = 'Traitement';
     $dejapaye = 'DEJA PAYE';
	 
	 $query = $bdd->prepare('SELECT * FROM payer WHERE id_client = ? and confirme = ?');
	 $query->execute(array($id_client; $confirme))
	 
	 $query2 = $bdd->prepare('SELECT * FROM payer WHERE id_client = ? and confirme = ?');
	 $query2->execute(array($id_client; $traitement))
	 
	 $query3 = $bdd->prepare('SELECT * FROM payer WHERE id_client = ? and confirme = ?');
	 $query3->execute(array($id_client; $dejapaye))
	 
	 if($row = $query->rowCount() == 1)
	 {

 
        
			  $header="MIME-Version: 1.0\r\n";
                                         $header.='From:"Facture Flash Service" <contact@factureflashservice.com>'."\n";
                                        $header.='Content-Type:text/html;charset="utf-8"'."\n";
                                        $header.='Content-Transfer-encoding: 8bit';
										$sujet = "Alerte de commande";
                                         $message='
                                          <html>
                                           <body>
                                               <div align="center">Bienvenue sur Facture Flash Service <b></b>,</div>
											   <p>Vous venez d\'enregistr une commande</p><br/>
											   <p> Aller sur <a href="factureflashservice.com">factureflashservice.com</a></p>
											  
                                           </body>
                                         </html>
                                                ';

                                     mail($_SESSION['email'],$sujet,$message,$header);
	 }
}
?>