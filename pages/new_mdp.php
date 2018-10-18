<?php
if($_SESSION['num_mail'])
{
	if($_SESSION['code'])
	{
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Facture flash service</title>

<meta charset="utf-8"/>
<link rel="shortcut icon" href="images/logo.png"/>
<link rel="stylesheet" media="only screen and (min-width:320px) and (max-width:479px)"  href="css/mobile.css"/>
<link rel="stylesheet" media="only screen and (min-width:480px) and (max-width:767px)"  href="css/ipad.css"/>
<link rel="stylesheet" media="only screen and (min-width:768px) and (max-width:799px)"  href="css/tablette.css"/>
<link rel="stylesheet" media="only screen and (min-width:800px) and (max-width:959px)"  href="css/tabl_normale.css"/>
<link rel="stylesheet" media="only screen and (min-width:960px) and (max-width:1079px)" href="css/normaux.css"/>
<link rel="stylesheet" media="only screen and (min-width:1080px)"                       href="css/styles.css"/>
<meta name="viewport"  content="width=device-width"/>
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
			new_mdp: {required: true,minlength: 8},
			conf_new_mdp: {required: true,minlength: 8,	equalTo: "#password"},
			email: {required: true,	email: true	},
		},
		messages: {
			username: "Indiquez votre username",
			prenom: "Indiquez votre prénom",
			new_mdp: {
				required: "Votre mot de passe",
				minlength: "8 caractères au moins"
			},
			conf_new_mdp: {
				required: "Confirmez votre mot de passe",
				minlength: " 8 caractères au moins",
				equalTo: "Vos mots de passes ne sont pas identique"
			},
			email: "Votre email est invalide"
		}
	});
});
</script>
</head>
<body>
<!-- Emplacement du formulaire -->		
<div id="inscription">
   
   <div id="center">

<p><a href="index.php"><img src="images/logo.png" alt="facture flash client" title="facture flash sercive" id="logo4"/></a></p>
	    <h2><a href="index.php"><span>F</span>FS</a></h2>
	   <p><img src="images/trait.png" alt="facture flash client" id="trait4"/></p><br/><br/>
	   <h3>Nouveau mot de passe </h3>
	   
	   
	<form class="cmxform" id="signupForm" method="post" action="">
	
			<label for="password" class="obl">Mot de passe  </label> 
			<input id="password" class="input" name="new_mdp" type="password" />
			
			<label for="confirm_password" class="obl">Confirmation mot de passe  </label> 
			<input id="confirm_password" class="input" name="conf_new_mdp" type="password" />
			<input class="submit" type="submit" name="submit" value="Enregistrer"/>
		
	</form>
	</div>
</div>

</body>
</html>
<?php
	}
	else
    {
	 header("Location:index.php?page=code");
    }
	
}
else
{
	 header("Location:index.php?page=mdp_oublie");
}
	?>