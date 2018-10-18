<!DOCTYPE html>
<html>
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
</head>
<body>
<?php include('pages/reseaux.php');?>
<div id="content">
<?php include('pages/header.php');?>

	<div class="mentions">
	 
	       <h1>mentions légales</h1>
		   <h3>Informations éditeur</h3>
		   <p>Le site factureflashservice.com est conçu et géré par TIC Building Entreprise. L'animation éditoriale et les mises à jour du site sont assurées par elle.</p>
		   <p>Pour  toute suggestion, information, réaction concernant ce site, n'hésitez pas à écrire au webmaster :</p>
		                <ul>
						   <li>• par voie électronique : <span><a href=""><?php printf("<span style='color:#%x%x%x'>contact@factureflashservice.com</span><br/>",65, 127, 245);?></a></span> </li>
						   <li>• par téléphone : <?php printf("<span style='color:#%x%x%x'>+22997098482</span><br/>",65, 127, 245);?></li>
						</ul>
		   
		   <h3>Droit d'auteur et reprise du contenu mis en ligne</h3>
		   <p>Sous  réserve des exceptions légales, tous les contenus présents sur le site factureflashservice.com <br/> sont couverts par le droit d'auteur. Toute reprise est dès lors conditionnée à l'accord de l'auteur en vertu de l'article L.122-4 du Code de la Propriété Intellectuelle.</p>
		   
		   <h3>Les différents contenus présents sur le site : </h3>
		   <p>Tous les contenus écrits et/ou mis en ligne par la rédaction du site factureflashservice.com ne peuvent être reproduits librement sans l'autorisation de leur auteur.</p>

          <p>Toutes les photographies, vidéos, infographies et autres éléments techniques et graphiques disponibles sur le site  sont couverts par des droits de propriété intellectuelle. Toute reproduction ou représentation partielle ou totale pour quelque usage que ce soit est interdite sans l'accord préalable des titulaires de droits.</p>

          <p>Toute demande de représentation ou reproduction intégrale ou partielle doit être adressée à TIC Building Entreprise par <span><a href="">courrier électronique</a><span></p>


</div>
<?php include('pages/footerbook.php');?>
</div>
<?php include('pages/footer.php');?>
<?php include('pages/footermobile.php');?>
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