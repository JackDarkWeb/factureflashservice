<?php
if(isset($_POST['submit']))
{
	$pseudo = htmlspecialchars(trim($_POST['pseudo']));
	$profession = htmlspecialchars($_POST['profession']);
	$note = htmlspecialchars($_POST['note']);
	$recommander = htmlspecialchars(strtoupper($_POST['recommander']));
	$message = htmlspecialchars($_POST['message']);
	$avatar = 'defaut.png';
	$date = date("j/n/y H:i", time());
	
	if(!empty($pseudo) and !empty($message) and !empty($profession))
	{
		
	 if(holds_string($pseudo) == 1)
	{
		if(empty($note))
		{
			if($recommander == 'OUI' or $recommander == 'NON' or empty($recommander))
			{
				$req = $bdd->prepare("INSERT INTO commentaires(pseudo,profession,note,recommander,message,avatar,date) VALUES(?,?,?,?,?,'defaut.png',?)");
				$req->execute(array($pseudo,$profession,$note,$recommander,$message,$date));
				$success = "Merci pour votre commentaires";
			}
			else
			{
				$error = "Taper simplement Oui ou Non ";
			}
		}
		else
		{
			if(!empty($note))
			{
		   if(holds_int1($note) == 1)
		   {
		   if(0 <= $note and $note <= 10)
		   {
			  if($recommander == 'OUI' or $recommander == 'NON' or empty($recommander))
			{
				$req = $bdd->prepare("INSERT INTO commentaires(pseudo,profession,note,recommander,message,avatar,date) VALUES(?,?,?,?,?,'defaut.png',?)");
				$req->execute(array($pseudo,$profession,$note,$recommander,$message,$date));
				$success = "Merci pour votre commentaires";
			}
			else
			{
				$error = "Tapez simplement Oui ou Non ";
			}
		   }
		   else
		   {
			$error = "Donnez une note comprise entre 0 et 10";
		   }
		 }
		 else
		 {
			$error = "Mettez seulement une note ";
		 }
		 
		 }
		 
		}
		
    }
     else
    {
	$error = "Votre nom ou prénom contient des caractères non autorisés"; 
     }
 }
 else
	
 {
	$error = "Les champs prenom, profession et message doivent être remplis ";
 }
}







function holds_int1($note)
   {
     return preg_match("/^-?[0-9]+$/", $note);
   }
   
   
   
   
   
   /* La fonction qui verifie si une chaine contient un entier*/
function holds_string($pseudo)
   {
     return preg_match("/^-?[A-Za-z\-\ ]+$/", $pseudo);
   }
   
   
 
?>