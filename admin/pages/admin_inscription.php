




<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Facture flash service</title>

<!-- chargement des feuilles de style -->
<link rel="stylesheet" media="screen" href="css/cmxform.css" />
<link rel="shortcut icon" href="images/logo.png"/>
<meta charset="utf-8"/>


<!--[if lte IE 7]>
<link rel="stylesheet" href="site_ie.css"/>
<![endif]-->

<!--[if lte IE 9]>
<script src= "http://html5shim.googlecode.com/svn/trunk/html5.js"</script>
<![endif]-->


<!-- chargement des scripts -->	
<script src="scr/jquery.js"></script>
<script src="scr/jquery.validate.js"></script>

<!-- Initialisation de la fonction -->		
<script>

// les règles se fixent dans la partie "rules"
// exemple : password: {required: true,minlength: 5},
// 			password -> nom du champs
//			required=true -> obligatoire
//			minlength:5 -> la valeur saisie doit comporter 5 caractères au moins
// les messages associés se fixent dans la partie "messages"

$().ready(function() {
	$("#signupForm").validate({
		rules: {
			username: {required: true},
			prenom: {required: true},
			password: {required: true,minlength: 8},
			confirm_password: {required: true,minlength: 8,	equalTo: "#password"},
			email: {required: true,	email: true	},
		},
		messages: {
			username: "Indiquez votre username",
			prenom: "Indiquez votre prénom",
			password: {
				required: "Votre mot de passe",
				minlength: "8 caractères au moins"
			},
			confirm_password: {
				required: "Confirmez mot de passe",
				minlength: " 8 caractères au moins",
				equalTo: "N'est pas identique"
			},
			email: "Format invalide"
		}
	});
});
</script>
</head>
<body>
<!-- Emplacement du formulaire -->		
<div id="main">
   
   <div id="center">

<p><a href="index.php"><img src="images/logo.png" alt="facture flash client" title="facture flash sercive" id="logo4"/></a></p>
	    <h2><a href="index.php"><span>F</span>FS</a></h2>
	   <p><img src="images/trait.png" alt="facture flash client" id="trait4"/></p><br/><br/>
	   
	   
	   
	<form class="cmxform" id="signupForm" method="post" action="">
		
		 <?php if(isset($error)) echo '<div id="error">'.$error.'</div>';?>
	   
			<h3>Administarteur</h3>
		<div id="p">	
			<p><label for="nom" class="obl">Username: </label> <input type="text" id="nom" name="user" value="<?php echo(isset($username))? $username:'';?>"/></p>
			<p><label for="password" class="obl">Mot de passe : </label> <input id="password" name="password" type="password" /></p>
			<p><label for="confirm_password" class="obl">Confirmation mot de passe : </label> <input id="confirm_password" name="confirm_password" type="password" /></p>
			<p><input class="submit" type="submit" name="submit" value="S'INSCRIRE"/></p>
		</div>
	</form>
	</div>
</div>

</body>
</html>