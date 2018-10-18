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
   <link rel="stylesheet" media="only screen and (min-width:960px) and (max-width:1079px)"   href="css/normaux.css"/>
   <link rel="stylesheet" media="only screen and (min-width:1080px)"                       href="css/styles.css"/>
   <meta name="viewport"  content="width=device-width"/>
 
</head>
<body>
<?php include('pages/reseaux.php');?> 
<div id="content">
     <?php include('pages/header.php');?>
	 
	 
	 
	 
	<div class="propos">
	 
	       <h1>QU’EST-CE QUE FACTUREFLASHSERVICE.COM?</h1>
		   
		   <p>Conçu pour apporter la solution aux problèmes de longues files d’attentes liés au paiement
		   des factures d’électricité et d’eau au Bénin, <?php printf("<span style='color:#%x%x%x'>TIC Building Entreprise</span>",65, 127, 245);?> 
		   vous a trouvé une solution innovante.</p>
		   <p><span>factureflashservice.com </span>est un site de paiement des factures en ligne. A travers l’application factureflashservice, 
		   vous pouvez commander en 1 clique seulement le paiement de vos factures d’électricité et d’eau.</p>
		   
		   <p>Avec factureflashservice.com, fini les pertes de temps aux guichets. Nous éffectuons le paiement pour vous.</p>
		   
		   
		   <p>Nous payons toutes les factures enregistrées et soldées tous les jours ouvrables aux guichets de la SBEE et de la SONEB et vos 
		   quittances de paiements vous sont envoyées instantanément.</p>

          <p>Pour comprendre comment fonctionne le service, <span><a href="index.php?page=assistance">cliquez ici</a></span> pour découvrir
		  notre page d’assistance.</p> 

          <p>Lire les <a href="index.php?page=conditions">Conditions Générales d’Utilisation</a>.</p>
		  
		  <div id="contact">
		   <h1>NOS CONTACTS</h1>
		   <div class="contact">
		     <p>Tel : (+229)96940764  (Disponible sur WhatsApp et Viber)</p>
			 <p>Email :<?php printf("<span style='color:#%x%x%x'>contact@factureflashservice.com</span>",65, 127, 245);?> </p>
			 <p class="ph"><?php printf("<span style='color:#%x%x%x'>factureflashservice@gmail.com</span>",65, 127, 245);?></p>
			 </div>
		  </div>
		  <p>Notre moteur : SERVIR.</p>
		  <p>Notre but : FACILITER LA VIE A NOS CLIENTS POUR LE PAIEMENT DES FACTURES D’ELECTRICITE ET D’EAU AU BENIN.</p>
		  <p><span>FACTURE</span> FLASH Service, la solution pour le paiement des factures d’électricité et d’eau en ligne au Bénin. </p>
		  <p><strong>Simple - rapide - sécurisé.</strong></p>


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