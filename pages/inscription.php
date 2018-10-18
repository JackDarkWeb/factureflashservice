
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
			nom: {required: true},
			prenom: {required: true},
			password: {required: true,minlength: 8},
			confirm_password: {required: true,minlength: 8,	equalTo: "#password"},
			
			phone: {required: true, number: true, minlength: 8,maxlength: 8},
			email: {required: true,	email: true	}
			
		},
		messages: {
			nom: "Indiquez votre nom",
			prenom: "Indiquez votre prénom",
			password: {
				required: "Votre mot de passe",
				minlength: "8 caractères au moins"
			},
			
			phone: {
				required: "Votre numéro de téléphone",
				number: "Entrer des chiffres",
				maxlength: "Le numéro doit avoir 8 chiffres maximum",
				minlength: "le numéro doit avoir 8 chiffres au moins"
			},
			confirm_password: {
				required: "Confirmez votre mot de passe",
				minlength: " 8 caractères au moins",
				equalTo: "Vos mots de passes ne sont pas identiques"
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

        <a href="index.php"><img src="images/logo.png" alt="facture flash client" title="facture flash sercive" id="logo4"/></a>
	    <h2><a href="index.php"><span>F</span>FS</a></h2>
	   <p><img src="images/trait.png" alt="facture flash client" id="trait4"/></p>
	   <h3>Merci de remplir ce formulaire</h3>
	   
	   
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
	   
    </div>
	      
	   
	<form class="cmxform" id="signupForm" method="post" action="">
	   
			
		
			<label for="nom" class="obl">Nom  </label> 
			<input type="text" id="nom" class="input" name="nom" value="<?php echo(isset($nom))? $nom:'';?>"/>
			
			<label for="prenom" class="obl">Prénom  </label> 
			<input type="text" id="prenom" class="input" name="prenom" value="<?php echo(isset($prenom))? $prenom:'';?>" />
			
			<label for="cemail" class="obl">E-Mail  </label> 
			<input id="cemail" type="email" class="input" name="email" value="<?php echo(isset($email))? $email:'';?>" />
			
            <label for="tel"    class="obl">Sélectionnez indicatif </label>
                 <select class="select" name="indic" id="indic">
			          <option value="0" selected="1">Indicatif</option>
			           <option value="+229">+229</option>
                 </select>
						 
			<label for="tel" class="obl">Téléphone  </label> 
			<input id="curl" type="tel" class="input" name="phone" value="<?php echo(isset($phone))? $phone:'';?>" />
			
			<label for="password" class="obl">Mot de passe  </label> 
			<input id="password" class="input" name="password" type="password" />
			
			<label for="confirm_password" class="obl">Confirmation mot de passe  </label>
			<input id="confirm_password" class="input" name="confirm_password" type="password" />
			
			
			<input class="submit" type="submit" name="submit" value="S'INSCRIRE"/>
		
	</form>
	
</div>

</body>
</html>