
<?php

if(isset($_POST['submit']))
{
	$user      = htmlspecialchars(($_POST['identifiant']));
	$password1  = htmlspecialchars(sha1($_POST['password1']));
	
	  if(!empty($user) and !empty($password1))
	  {
		   $requser = $bdd->prepare("SELECT * FROM clients WHERE email = ? and password = ? ");
		   $requser->execute(array($user,$password1));
		   $userexiste = $requser->rowCount();
		    if($userexiste == 1)
		     {
			    
			    $userinfo = $requser->fetch();
			        $_SESSION['email']     = $userinfo['email'];
				    $_SESSION['nom']       = $userinfo['nom'];
				    $_SESSION['prenom']    = $userinfo['prenom'];
				    $_SESSION['id_client'] = $userinfo['id_client'];
			
			    header('Location:index.php?page=client');
		     }
			 else
	         {
		         $requser = $bdd->prepare("SELECT * FROM clients WHERE phone = ? and password = ? ");
		         $requser->execute(array($user,$password1));
		
		         $userexiste = $requser->rowCount();
		       if($userexiste == 1)
		        {
			        
			        
			        $userinfo = $requser->fetch();
			        $_SESSION['email']     = $userinfo['email'];
				    $_SESSION['nom']       = $userinfo['nom'];
				    $_SESSION['prenom']    = $userinfo['prenom'];
				    $_SESSION['id_client'] = $userinfo['id_client'];
			        header('Location:index.php?page=client');
		        }
				else
				{
					$error = "Identifiant ou mot de passe incorrect";
				}
			}
	  
			        	
	 }
     else
	 {
	   $error = "Entrez identifiant et mot de passe";
	 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Facture flash service</title>
<meta charset="utf-8"/>
<meta name="Robots" content="all"/>
<meta charset="utf-8"/>
<link rel="shortcut icon" href="images/logo.png"/>
<link rel="stylesheet" media="only screen and (min-width:320px) and (max-width:479px)"  href="css/mobile.css"/>
<link rel="stylesheet" media="only screen and (min-width:480px) and (max-width:767px)"  href="css/ipad.css"/>
<link rel="stylesheet" media="only screen and (min-width:768px) and (max-width:799px)"  href="css/tablette.css"/>
<link rel="stylesheet" media="only screen and (min-width:800px) and (max-width:959px)"  href="css/tabl_normale.css"/>
<link rel="stylesheet" media="only screen and (min-width:960px) and (max-width:1079px)" href="css/normaux.css"/>
<link rel="stylesheet" media="only screen and (min-width:1080px)"                       href="css/styles.css"/>
<meta name="viewport"  content="width=device-width"/>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="scr/jquery.label_better.js"></script>

<script>
	  $(document).ready( function() {
	    $(".label_better").label_better({
	      easing: "bounce"
	    });
	  });
	</script>
</head>
<body id="body">
   <div id="espace_client">
       <p><a href="index.php?page=accueil"><img src="images/logo.png" alt="facture flash client" title="facture flash sercive" id="logo4"/></a></p>
	    <h2><a href="index.php?page=accueil"><span>F</span>FS</a></h2><br/>
	   <p><img src="images/trait.png" alt="facture flash client" id="trait4"/></p><br/><br/>
	    <h3 id="ident">Identifiez-vous chez FFS</h3><br/><br/>
		
		    <?php 
	
	if(isset($error))
	{
        		
		echo '<div class="attention">'.$error.'</div>';
		
	}
	if(isset($success))
	{
        		
		echo '<div class="success">'.$success.'</div>';
	}
	?>
		
	   <div id="form">
	       
	       <form method="post" action="" autocomplete="on">
		       <input type="text" class="label_better" name="identifiant" placeholder="téléphone ou email" data-new-placeholder="Indiquez votre identifiant"/><br/>
			   <input type="password" class="label_better" name="password1" placeholder="Mot de passe" data-new-placeholder="Saisissez votre mot de passe"/><br/><br/>
			   <input type="submit" name="submit" value="CONNEXION"/>
			   <p class="keeplogin"> 
			    <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
				 <label for="loginkeeping">Maintenir ma session ouverte</label>
			</p>
		   </form><br/><br/>
		   <h3><a href="index.php?page=mdp_oublie"><span class="passe">Mot de passe oublié?</span></a></h3><br/>
		   
		   <h3><a href="index.php?page=inscription"><span class="creer">Créer un compte</span></a></h3>
		   
		   
	   </div>
   </div>
   
</body>
</html>