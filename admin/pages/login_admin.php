
<!DOCTYPE html>
<html>
<head>
<title>Facture flash service</title>
<meta charset="utf-8"/>
<meta name="Robots" content="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/style.css"/>
<link rel="shortcut icon" href="images/logo.png"/>
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
       <p><a href="index.php?page=login_admin"><img src="images/logo.png" alt="facture flash client" title="facture flash sercive" id="logo4"/></a></p>
	    <h2><a href="index.php?page=login_admin"><span>F</span>FS</a></h2><br/>
	   <p><img src="images/trait.png" alt="facture flash client" id="trait4"/></p><br/><br/>
	    <h3 id="ident"> Administration de la FFS</h3><br/><br/>
		
		
	   <div id="form">
	       <?php if(isset($error)) echo '<div id="error">'.$error.'</div>';?>
	       <form method="post" action="" autocomplete="on">
		       <input type="text" class="label_better" name="email" placeholder="EmailAdmin" data-new-placeholder="Indiquez votre EmailAdmin"/><br/>
			   <input type="password" class="label_better" name="password1" placeholder="Mot de passe" data-new-placeholder="Saisissez votre mot de passe"/><br/><br/>
			   <input type="submit" name="submit" value="CONNEXION"/>
			   <p class="keeplogin"> 
			    <input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
				 <label for="loginkeeping">Maintenir ma session ouverte</label>
			</p>
		   </form><br/><br/>
		   <h3><a href=""><span class="passe">Mot de passe oublié?</span></a></h3><br/>
		   
		   <h3><a href="index.php?page=admin_inscription"><span class="creer">Créer un compte</span></a></h3>
		   
		   
	   </div>
   </div>
   
</body>
</html>