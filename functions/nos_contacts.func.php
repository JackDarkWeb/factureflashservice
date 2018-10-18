<?php
if(isset($_POST['submit1']))
{
	$email   = htmlspecialchars(trim($_POST['email']));
	$mg = htmlspecialchars($_POST['message']);
	$facture_mail = 'factureflashservice@gmail.com';
	if(!empty($email) and !empty($mg))
	{
		if(filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			
			                            $header="MIME-Version: 1.0\r\n";
                                        $header.='From:"Client" <'.$email.'>'."\n";
                                        $header.='Content-Type:text/html;charset="utf-8"'."\n";
                                        $header.='Content-Transfer-encoding: 8bit';
										$sujet = "Questions";
										$sujet = "Questions";
										$messages='
                                          <html>
                                           <body>
											   <div>'.$mg.'</div>
											  
                                           </body>
                                         </html>
                                                ';
										
                                     mail($facture_mail,$sujet,$messages,$header);
			
			
			
			
			$success = <<<_END
			Nous vous remercions de nous avoir adressé votre requête; Nous vous repondrons dans 24 heures.
_END;
		}
		else
		{
			$error = <<<_END
			Votre adresse e-mail n'est pas valide.
_END;
		}
	}
	else
	{
		$error = <<<_END
		Tous les champs doivent êtres remplis.
_END;
	}
}





if(isset($_POST['submit2']))
{
	$email   = htmlspecialchars(trim($_POST['email']));
	$mg = htmlspecialchars($_POST['message']);
	$facture_mail = 'factureflashservice@gmail.com';
	if(!empty($email) and !empty($mg))
	{
		if(filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			
			                            $header="MIME-Version: 1.0\r\n";
                                        $header.='From:"Partenariat" <'.$email.'>'."\n";
                                        $header.='Content-Type:text/html;charset="utf-8"'."\n";
                                        $header.='Content-Transfer-encoding: 8bit';
										$sujet = "Questions";
										$messages='
                                          <html>
                                           <body>
											   <div>'.$mg.'</div>
											  
                                           </body>
                                         </html>
                                                ';
										
                                     mail($facture_mail,$sujet,$messages,$header);
			
			
			
			$success = <<<_END
			Nous vous remercions de nous avoir adressé votre requête; Nous vous repondrons dans 24 heures.
_END;
		}
		else
		{
			$error = <<<_END
			Votre adresse e-mail n'est pas valide.
_END;
		}
	}
	else
	{
		$error = <<<_END
		Tous les champs doivent êtres remplis.
_END;
	}
}
	
?>