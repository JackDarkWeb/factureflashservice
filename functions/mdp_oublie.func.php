<?php
if(isset($_POST['submit']))
{
	$num_mail = htmlspecialchars(trim($_POST['num_mail']));
	if(!empty($num_mail))
	{
		if(filter_var($num_mail,FILTER_VALIDATE_EMAIL))
		{
		        $reqnum_mail = $bdd->prepare("SELECT email FROM clients WHERE email = ? ");
	            $reqnum_mail->execute(array($num_mail));
	            $userexiste = $reqnum_mail->rowCount();
		        if($userexiste == 1)
			    {
					$infos_email = $reqnum_mail->fetch();
					
				    
					$_SESSION['num_mail'] = $infos_email['num_mail'];
					$_SESSION['num_mail'] = $num_mail;
					
				    $recup_code = "";
						for($i = 0; $i < 8; $i++)
						{
							$recup_code .= mt_rand(0,9);
						}
						
						       $req_recup_email= $bdd->prepare("SELECT id FROM recuperation WHERE num_mail = ?"); // ...pour si l adresse e-mail existe deja dans la base de donnees..
					           $req_recup_email->execute(array($num_mail));
					           $recup_emailexiste = $req_recup_email->rowCount();
					             if($recup_emailexiste == 1)
								  {
									 
									$recup_insertmbre = $bdd->prepare("UPDATE recuperation SET code = ? WHERE num_mail = ?");    // cette partie me permet de faire mise a jour du code seulement si email existe deja dans ma bdd..
							        $recup_insertmbre ->execute(array($recup_code,$num_mail)); 
								 }
								 else
								 {
									 $recup_insertmbre = $bdd->prepare("INSERT INTO recuperation(code,num_mail) VALUES(:code,:num_mail)");    // cette partie me permet de recuperer les variables dans ma bdd..
							         $recup_insertmbre ->execute(array(
									 'code' => $recup_code,
									 'num_mail' => $num_mail));
								 }


                         $header="MIME-Version: 1.0\r\n";
                                         $header.='From:"Facture Flash Service" <contact@factureflashservice.com>'."\n";
                                        $header.='Content-Type:text/html;charset="utf-8"'."\n";
                                        $header.='Content-Transfer-encoding: 8bit';
										$sujet = "Recuperation de mot de passe";
                                         $message='
                                          <html>
                                           <body>
                                               <div align="center">Bonjour <b></b>,</div>
											   <p>Voici votre code '.$recup_code.' pour réinitialiser votre mot de passe</p>
											  
                                           </body>
                                         </html>
                                                ';

                                     mail($num_mail,$sujet,$message,$header); 
									 header("Location:index.php?page=code");
	  
	  
	                 
									 
                        					  
			    }
			    else
			    {
				  $message = "Votre email ne correspond pas à un client";
			    }
			
	  
		}
	    else
	    {
		  $message = "Votre adresse e-mail n'est valide pas !";
	    }
		
	}
	else
	{
		$message = "Entrez votre email";
	}
}
?>