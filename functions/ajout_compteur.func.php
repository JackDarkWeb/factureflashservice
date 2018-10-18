<?php
include('functions/profil.func.php');
if(isset($_SESSION['nom']) or isset($_SESSION['prenom']) or isset($_SESSION['email'] ) or isset($_SESSION['phone'] )  or isset($_SESSION['id_client'] ))
{
	            $infos = infos_membre_connecte();
                foreach($infos as $info)
				{

				   ?>
					 


<?php
if(isset($_POST['submit']))
{
  $police     = htmlspecialchars(trim(strtoupper($_POST['police'])));
  $nom_prop   = htmlspecialchars(trim($_POST['nom_prop']));
  $ville      = htmlspecialchars(trim($_POST['ville']));
  $compteur   = htmlspecialchars(trim($_POST['compteur']));
  $myText     = htmlspecialchars(trim($_POST['myText']));
  $remChars   = htmlspecialchars(trim($_POST['remChars']));
  $remLines   = htmlspecialchars(trim($_POST['remLines']));
  $id_client  = $info['id_client'];
 
	if(!empty($ville) and !empty($compteur) and !empty($police) and !empty($nom_prop) and !empty($myText))
	{
		if(strlen($police) == 8)
		{
			$prefixe = substr($police,0,2); /* La fonction substr soustrait dans une chaine, cette ligne qui
                 							                 signifie prend les deux premiers chiffres du numero entrer par utilisateur*/
			if(prefixe_string($prefixe) == 1)												 
			{												 
															 
		if($remChars >= '0' and $remLines >= '0')
		{
			 $reqnum_compteur = $bdd->prepare('SELECT id_compteur FROM compteurs WHERE num_police = ? and id_client = ? ');
			 $reqnum_compteur->execute(array($police,$id_client));
		     
	         $result = $reqnum_compteur->rowcount();
		        if($result == 0)
				{
					  
			 
		          $insert = $bdd->prepare("INSERT INTO compteurs(id_client,num_police,nom_proprietaire,type_compteur,ville,description,date) VALUES(:id_client,:num_police,:nom_proprietaire,:type_compteur,:ville,:description,NOW())");
			      $insert->execute(array('id_client' => $id_client,
			          'num_police' => $police,
			          'nom_proprietaire' => $nom_prop,
			          'type_compteur' => $compteur,
			          'ville' => $ville,
			          'description' => $myText));
				       $success = <<<_END
					   Votre compteur a été bien enregistré
_END;
					  					   
				}
				else
				{
					$error = <<<_END
					
					Ce compteur est déjà enregistré en votre nom. <a href='index.php?page=mes_compteurs'>CLIQUEZ ICI</a>
_END;

				}
		}
		else
		{
			$error = "La description est beaucoup";
		}
		
		}
	    else
	    {
		   $error = "Les deux premiers caractères de votre numéro de police doit être alpha ";
	    }
		
		
		}
	    else
	    {
		   $error = "Le numéro de police doit avoir 8 caractères";
	    }
		
	}
	else
	{
		$error = "Tous les champs doivent être remplis";
	}
}






				}
 }
else
{
	 header('Location:index.php?pages=accueil');
}
  
  
  
 /*---- La fonction qui verifier si les deux premiers caractères de numero police sont des lettres*/ 
  
  function prefixe_string($prefixe)
   {
     return preg_match("/^-?[A-Za-z]+$/", $prefixe);
   }
?>