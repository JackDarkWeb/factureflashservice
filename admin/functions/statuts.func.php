<?php
//la function qui va retourner tous les commandes en cours et en traitement

function commande_en_cours_et_en_traitement()
{
	  $confirme = 'EN COURS';
	  $confirmes = 'Traitement';
	  $commandes = array();
	  $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	  //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	  $req = $bdd->prepare("SELECT * FROM payer WHERE confirme = '$confirme' or confirme = '$confirmes' ");
      $req->execute(array($confirme, $confirmes));
	  while($result = $req->fetch())
	  {
		  $commandes[] = $result;
	  }
	     return $commandes;
}


// la function qui va transmettre au client que sa commande est en traitement
function TRAITEMENT()
{
	if(isset($_SESSION['email']))
{
	  $a = htmlspecialchars($_POST['a']);
	  $b = htmlspecialchars($_POST['b']);
	  $const = 'Traitement';
	 $bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	 //$bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	 $update = $bdd->query("UPDATE payer SET confirme = '$const' WHERE id_client = '$a'  and id_payer = '$b' ");
	 $update->execute(array($a, $b));
	 
	 $query = $bdd->prepare('SELECT email FROM clients WHERE id_client = ?');
	 $query->execute(array($a));
	 while($result = $query->fetch())
	 {
		 $email = $result['email'];
		 $header="MIME-Version: 1.0\r\n";
                                         $header.='From:"Facture Flash Service" <contact@factureflashservice.com>'."\n";
                                        $header.='Content-Type:text/html;charset="utf-8"'."\n";
                                        $header.='Content-Transfer-encoding: 8bit';
										$sujet = "Alerte de commande";
                                         $message='
                                          <html>
                                           <body>
                                               <div align="center">Bienvenue sur Facture Flash Service <b></b>,</div>
											   <p>Votre commande est actuellement entrain d\'être payée </p><br/>
											   <p> Aller sur <a href="factureflashservice.com">factureflashservice.com</a></p>
											  
                                           </body>
                                         </html>
                                                ';

                                     mail($email,$sujet,$message,$header);
	 }
	 $query->closeCursor();
}
}


// la function qui va transmettre au client que sa commande est deja paye
function DEJA_PAYER()
{
	if(isset($_SESSION['email']))
{
	  $a = htmlspecialchars($_POST['a']);
	  $b = htmlspecialchars($_POST['b']);
	  $const = 'DEJA PAYE';
	 //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	 $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	 $update = $bdd->query("UPDATE payer SET confirme = '$const' WHERE id_client = '$a'  and id_payer = '$b' ");
	 $update->execute(array($a, $b));
	 
	 $query = $bdd->prepare('SELECT email FROM clients WHERE id_client = ?');
	 $query->execute(array($a));
	 while($result = $query->fetch())
	 {
		 $email = $result['email'];
		 $header="MIME-Version: 1.0\r\n";
                                         $header.='From:"Facture Flash Service" <contact@factureflashservice.com>'."\n";
                                        $header.='Content-Type:text/html;charset="utf-8"'."\n";
                                        $header.='Content-Transfer-encoding: 8bit';
										$sujet = "Alerte de commande";
                                         $message='
                                          <html>
                                           <body>
                                               <div align="center">Bienvenue sur Facture Flash Service <b></b>,</div>
											   <p>Votre commande a été déjà payé. Vous recevrez votre facture dans une minute </p><br/>
											   <p> Aller sur <a href="factureflashservice.com">factureflashservice.com</a></p>
											  
                                           </body>
                                         </html>
                                                ';

                                     mail($email,$sujet,$message,$header);
	 }
	 $query->closeCursor();
}
}





// la function qui va liberer l acces au client a une autre commande lorsque sa commande est en traitement
function ACCES_PAYER()
{
	if(isset($_SESSION['email']))
{
	  $a = htmlspecialchars($_POST['a']);
	  $const = '1';
	 $bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	 //$bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	 $update = $bdd->query("UPDATE commandes SET activer = '$const' WHERE id_client = '$a' ");
	 $update->execute(array($a));
}
}






?>