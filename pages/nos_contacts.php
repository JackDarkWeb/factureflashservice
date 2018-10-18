<!DOCTYPE html>
<html>
<head>
<title>Facture Flash service</title>
<meta charset="utf-8"/>
<link rel="shortcut icon" href="images/logo.png"/>
<link rel="stylesheet" media="only screen and (min-width:320px) and (max-width:479px)"  href="css/mobile.css"/>
<link rel="stylesheet" media="only screen and (min-width:480px) and (max-width:767px)"  href="css/ipad.css"/>
<link rel="stylesheet" media="only screen and (min-width:768px) and (max-width:799px)"  href="css/tablette.css"/>
<link rel="stylesheet" media="only screen and (min-width:800px) and (max-width:959px)"  href="css/tabl_normale.css"/>
<link rel="stylesheet" media="only screen and (min-width:960px) and (max-width:1079px)" href="css/normaux.css"/>
<link rel="stylesheet" media="only screen and (min-width:1080px)"                       href="css/styles.css"/>
<meta name="viewport"  content="width=device-width"/>
</head>
<body>
<?php include('pages/reseaux.php');?>
<div id="content">
<?php include('pages/header.php');?>
<div class="nos_contacts">
	
	<div id="gauche"></div><h1>nos contacts</h1> <div id="droit"></div>
	<?php 
	
	if(isset($error))
	{
        echo "<br/>";		
		echo '<div class="attention">'.$error.'</div>';
		
	}
	if(isset($success))
	{
        echo "<br/>";		
		echo '<div class="success">'.$success.'</div>';
	}
	?>
	
	
	<div class="facture30">
	
	     
		 <div class="service30">
		      <p>Bienvenue sur votre espace contact. Vous avez besoin d'aide, vous avez des questions sur <br/>votre commande ou sur le site.</p>
		      <p> Nous mettons à votre disposition plusieurs moyens de répondre à vos demandes.</p>
		 </div>
		 
		 
		 <div class="service31">
		      <p>Téléphone</p>
		      <img src="images/phone.png" alt="phone" title="Téléphone" id="phone"/><span class="numero">(+229)96940764 ou 64295788</span>
			  <p>Nous répondrons à toutes vos demandes par téléphone.</p>
			  <p><strong>Du lundi au samedi de 8H00 à 20h00</strong></p>
		 </div>
		 
		 
		 <div class="service32">
		      <p>Mail</p><img src="images/email.jpg" alt="email" title="Email" id="email"/>
			  <p>Vous pouvez nous contacter par e-mail à l’adresse :<?php printf("<span style='color:#%x%x%x'>contact@factureflashservice.com</span><br/>",65, 127, 245);?></p>
			  <p>Notre service client met tout en oeuvre pour répondre à votre demande dans les meilleurs délais.</p>
		 </div>
	</div>
		 
	<div class="facture31">
	
	
		 <div class="flash_get">
		     <h3>VOTRE DEMANDE CONCERNE UNE COMMANDE </h3> 
		 </div>
         <div class="formule flash_contacte">
		      <p><a href="index.php?page=login">Accédez à vos commandes</a></p>
		 </div>
		 
		 <div class="flash_get2">
		     <h3>VOUS SOUHAITEZ CONNAÎTRE, MODIFIER OU EFFACER LES DONNÉES VOUS CONCERNANT </h3> 
		 </div>
         <div class="formule2 flash_contacte2">
		     <form method="post" action="">
	           <input type="text" name="email" placeholder="Indiquez votre e-mail" class="email"/>
		       <textarea name="message" placeholder="Laissez votre message ici" class="textarea"></textarea>
		       <input type="submit" name="submit1" value="ENVOYEZ" class="submit"/>
	         </form>
		 </div>
		 
		 
		 <div class="flash_get3">
		     <h3>VOUS SOUHAITEZ DEVENIR PARTENAIRE DE FACTURE FLASH Service </h3> 
		 </div>
         <div class="formule3 flash_contacte3">
		     <form method="post" action="">
	           <input type="text" name="email" placeholder="Indiquez votre e-mail" class="email"/>
		       <textarea name="message" placeholder="Laissez votre message ici" class="textarea"></textarea>
		       <input type="submit" name="submit2" value="ENVOYEZ" class="submit"/>
	         </form>
	         </form>
		 </div>
 
	</div>
	
	
	
	</div>
<?php include('pages/footerbook.php');?>
</div>
	<?php include('pages/footer.php');?>
	<?php include('pages/footermobile.php');?>

<script>
    

   var btn1 = document.querySelector('.flash_get');
   var nav1 = document.querySelector('.flash_contacte');

btn1.onclick = function()
{
	nav1.classList.toggle('flash_open');
}



   var btn2 = document.querySelector('.flash_get2');
   var nav2 = document.querySelector('.flash_contacte2');

btn2.onclick = function()
{
	nav2.classList.toggle('flash_open2');
}



   var btn3 = document.querySelector('.flash_get3');
   var nav3 = document.querySelector('.flash_contacte3');

btn3.onclick = function()
{
	nav3.classList.toggle('flash_open3');
}  

</script>

<script>
   var btn = document.querySelector('.togget');
   var nav = document.querySelector('.navm');

btn.onclick = function()
{
	nav.classList.toggle('nav_open');
}
</script>

</body>
</html>
</body>