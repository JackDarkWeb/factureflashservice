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
	 
	<div class="confidentialite">
	 
	       <h1>CONFIDENTIALITÉ</h1>
		   <h3>ARTICLE 1 – TRAITEMENT DES DONNÉES À CARACTÈRE PERSONNEL</h3>
		   <p>TIC Building Entreprise s’engage à ne pas faire un usage contraire à la législation en vigueur en matière des données à caractère 
		   personnel que vous pourriez lui fournir. Les données à caractère personnel que TIC Building Entreprise
		   collecte auprès de vous sont les suivantes : E-mail, Nom, Prénom, Téléphone. Ces informations sont utilisées uniquement 
		   pour vous permettre de recevoir et d’utiliser le service proposé par FACTURE FLASH Service.</p>
		   <p>« Conformément aux dispositions de la loi 78-17 du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés, tout utilisateur
		   dispose d’un droit d’accès, de rectification et d’opposition aux données personnelles le concernant, en effectuant sa demande écrite et signée, 
		   accompagnée d’une copie du titre d’identité avec signature du titulaire de la pièce, en précisant l’adresse à laquelle la réponse doit être envoyée. »</p>
		                
		   
		   <h3>ARTICLE 2 –CONTENU DU SITE ET LIMITE DE RESPONSABILITÉ</h3>
		   <p>Nous sommes tenus d’une obligation de moyens concernant les informations que nous mettons à votre disposition et nous effectuons toutes les démarches pour nous 
		   assurer de la fiabilité de ces informations sur notre site. Malgré une veille et une mise à jour quotidienne, factureflashservice.com ne peut encourir de responsabilité 
		   du fait d’inexactitudes techniques, erreurs typographiques ou omissions que le contenu du site peut comporter ou pour les résultats qui pourraient être obtenus par l'usage
		   de ces informations. Si vous constatez ce type de problème, vous pouvez nous en faire part en nous écrivant.</p>
		   
		   <h3>ARTICLE 3 – LIEN HYPERTEXTE ET REFERENCEMENT </h3>
		   <p>Toute création d’un lien hypertexte vers le présent site et tout référencement de celui-ci sont interdits sans l’autorisation expresse et écrite de notre part.</p>
		   
           <h3>ARTICLE 4 – MODIFICATIONS DES INFORMATIONS LEGALES DU SITE</h3>
          <p>TIC Building Entreprise se réserve le droit de modifier à tout moment les présentes informations légales, notamment en cas de changement de la législation en vigueur pour les mettre en conformité avec celle-ci.</p> 

         


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