<?php
   nombre_visiteur();
?>
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
<section>
       <div class="facture2">
	               <h3>Bienvenue sur notre site de paiement des factures d’Electricité et d’Eau</h3><br/>
                   <p><em>(Ce site n’est pas celui de la structure émettrice de vos factures)</em></p>
	   </div>
</section>

<section> <!--  section 2 -->
       <div class="facture3">
	        <h3>Gérer vos factures en ligne</h3>
			
			<img src="images/trait.png" id="trait"/><br/><br/>
			
			<img src="images/close.jpg" alt="admin" title="Admin TIC Building Entreprise" id="photo"/>
             <p class="flash3">Vous êtes fatigué(e)s des longues files d’attentes pour le paiement
              de vos factures d’électricité et d’eau ? <span>Nous vous facilitons la vie!</span>
                TIC Building Entreprise vous propose de commander le paiement
                de vos factures en ligne sur son site web <span>factureflashservice.com</span>
                Simple d’utilisation, il vous permet de payer vos factures
                rapidement, sans perdre votre temps precieux.</p>
				
				
				
	   </div>
</section>
<section><!-- section 3 -->
       <div class="facture4">
	
		<h3>NOS ENGAGEMENTS </h3>
             <p><img src="images/trait.png" id="trait1"/></p><br/>
			 <h4>Notre moteur : SERVIR</h4><br/>
			 <h4>Notre but : FACILITER LA VIE A NOS CLIENTS POUR LE PAYEMENT DES FACTURES D’ELECTRICITE ET D’EAU AU BENIN</h4><br/>
			 <h5>Sur la plateforme de paiement en ligne factureflashservice.com nous assurons:</h5><br/>
			 
			     <div class="flash4">
				     <h1>Simplicité</h1>
				   
				   <img src="images/gage1.jpg" alt="gage" title="Simplicité" id="gage1"/>
				 </div>
				
				 <div class="flash5">
				     <h1>Rapidité</h1>
				    
				    <img src="images/gage2.jpg" alt="gage" title="Rapidité" id="gage2"/>  
				 </div>
				
				 <div class="flash6">
				     <h1>Sécurité</h1>
				   
				   <img src="images/gage3.jpg" alt="gage" title="Sécurité" id="gage3"/>
				 </div>
	   </div>
</section>
<section><!-- section 4 -->
       <div class="facture5">
	     <h3>Comment ça marche?</h3>
	         
 
             <p><img src="images/trait.png" id="trait1"/></p>
			 <p>Commander le paiement de vos factures en trois étapes simples</p>
			     <br/><br/>
				<div class="flash7">
		          <img src="images/logo1.png" class="logo1"/>
		             <div class="flashe7">
			            <p>Vous devez créer un compte sur <span>factureflashservice.com</span> pour utiliser ce service.</p>
                        <p>Cliquez ci-dessous pour s’inscrire.</p>
			         </div>
				  <h4><a href="index.php?page=login">Identifiez-vous</a></h4>
			    </div>
			  
			       
			    <div class="flash8">
			       <img src="images/logo2.png" class="logo2"/>
			       <div class="flashe8">
			           <p>Enregistrez dans votre espace client les numéros de police de vos compteurs.</p>
                       <p>Cliquez sur PAYER FACTURE pour commander le paiement d'une facture.</p>
                    </div>
				  
				  <h4><a href="index.php?page=login">Payer facture</a></h4>
		   
				</div>
                <div class="flash9">				 
                   <img src="images/logo3.png" class="logo3"/>			
			       <div class="flashe9">
			             <p>Vous recevrez dans votre compte 
				        et par mail la quittance de 
				         paiement de votre facture (à téléchager) </p>
				   </div>
				  <h4><a href="index.php?page=login">Mon espace client</a></h4>
			    </div>
			  
	   </div>
</section>


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