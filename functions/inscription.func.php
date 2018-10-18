<?php
if(isset($_POST['submit']))
{
	$nom              = htmlspecialchars(trim(strtoupper($_POST['nom'])));
	$prenom           = htmlspecialchars(trim($_POST['prenom']));
	$email            = htmlspecialchars(trim($_POST['email']));
	$indic            = htmlspecialchars(trim($_POST['indic']));
	$phone            = htmlspecialchars(trim($_POST['phone']));
	$password         = htmlspecialchars(sha1($_POST['password']));
	$confirm_password = htmlspecialchars(sha1($_POST['confirm_password']));
		
	if(holds_string($nom,$prenom) == 1)
	{
		if(holds_string_second($prenom,$nom) == 1)
		{
		$reqemail = $bdd->prepare('SELECT email FROM clients WHERE email = ?');
		$reqemail->execute(array($email));
		
		$result = $reqemail->rowcount();
		if($result == 0)
		{
		
                      if(!empty($indic))
	                    {
		                 if(is_numeric($phone))
		                  { 
					          $prefixe = substr($phone,0,2); /* La fonction substr soustrait dans une chaine, cette ligne qui
                 							                 signifie prend les deux premiers chiffres du numero entrer par utilisateur*/
							  
					         if($prefixe == 61 or $prefixe == 62 or $prefixe == 63 or $prefixe == 94 or $prefixe == 64
							 or $prefixe == 95 or $prefixe == 66 or $prefixe == 96 or $prefixe == 67 or $prefixe == 97       
							   )
							 {
							                $reqphone = $bdd->prepare('SELECT phone FROM clients WHERE phone = ?');
		                                    $reqphone->execute(array($phone));
		
		                                    $result1 = $reqphone->rowcount();
		                             if($result1 == 0)
							          {
								        $insert = $bdd->prepare("INSERT INTO clients(nom,prenom,email,indicatif,phone,password,avatar) VALUES(?,?,?,?,?,?,'defaut.png')");
			                            $insert->execute(array($nom,$prenom,$email,$indic,$phone,$password));
			                            header('Location:index.php?page=login'); 
							          }
							          else
							          {
								        $error = "ce numéro est lié à un compte déjà";
							          }
			                }
							else
							{
								 $error = "Votre numéro doit être MTN ou Moov";
							}
		                 }
		                 else
		                 {
			               $error = "Ce n'est pas un numéro de téléphone";
		                 }
		  
	                    }
	                    else
	                    {
		                 $error = "Sélectionnez l'indicatif";
	                    }
		
	      }
	      else
	      {
		     $error = "Cet email existe déjà";
	      }
	}
 else
 {
	$error = "Votre prénom contient des caractères non autorisés"; 
 }
	
 }
 else
 {
	$error = "Votre nom contient des caractères non autorisés"; 
 }
		
}



/* La fonction qui verifie si une chaine contient un entier*/
function holds_string($nom,$prenom)
   {
     return preg_match("/^-?[A-Za-z\ ]+$/", $nom,$prenom);
   }
   
   
 function holds_string_second($prenom,$nom)
   {
     return preg_match("/^-?[A-Za-z\-\ ]+$/", $prenom,$nom); // ici (\-) me permet d'autoriser '-' dans un prenom 
   }
   
   
  
   
?>