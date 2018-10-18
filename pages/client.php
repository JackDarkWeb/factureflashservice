
<?php
if(isset($_SESSION['nom']) or isset($_SESSION['prenom']) or isset($_SESSION['email']) or isset($_SESSION['id_client'] ))
{
	LOCATION();
	amitie();
?>
<!DOCTYPE html>
<html>
<head>
<title>facture flash sercive</title>
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
<div id="contener">
    <?php include('pages/menu.php');?>
	<div class="assistant">
	     <div class="facture7">
		     <h4><strong>Bienvenue  <?php printf("<span style='color:#%x%x%x'>" .$_SESSION['prenom']."</span>",79, 128, 280);?>  sur votre Espace Client</strong></h4>
		 </div>
		 
		 <div class="facture12">
	     <h5>Passer une commande</h5>
		 <p><?php printf("<span style='color:#%x%x%x'> Vous devez disposer d'un numéro de téléphone MTN Mobile Money ou Moov Flooz pour effectuer la commande d’une facture.</span>",65, 127, 245);?></span></p>
		 <p>Qu’est-ce que le numéro de police ?</p>
		  <p><?php printf("<span style='color:#%x%x%x'> Le numéro de police est un numéro à 6 caractères alphanumériques unique qui se trouve sur votre facture.</span>",65, 127, 245);?></p>
		 <p>Les étapes pour enregistrer une commande :</p>
		 
		 <ol>
		    <li>Se connecter à votre Espace Client</li>
			<li>Inscrire un ou plusieurs compteurs</li>
			<li>Cliquer sur << PAYER FACTURE >> </li>
			<li>Sélectionner le numéro de police du compteur que vous voulez payer</li>
			<li>Pour ajouter autre facture cliquez sur Ajoutez autre facture</li>
			<li>Indiquer votre numéro Mobile Money ou Moov Flooz</li>
			<li>Indiquer le montant de la facture</li>
			<li>Cliquer sur << COMMANDER >></li>
			<li>Lire la procédure de payement par Mobile Money et par Moov Flooz</li>
		 </ol>
		 <p>La commission à payer est appliqué au montant total des factures commandées.</p>
		 <p>Une fois le payement effectué, vous recevrez sur votre numéro un message de confirmation de factureflashservice.com</p>
		 
		 <h5>Quand est ce que ma facture est effectivement payée ?</h5>
		  <p>Les courtiers de factureflashservice payent aux guichets SBEE et SONEB toutes les factures enregistrées et soldées tous les jours ouvrables à 16h.</p>
		  <h5>Comment m’assurer que ma facture a été réellement payée au guichet ?</h5>
		  <p>Dès le payement de vos factures effectué, vous recevrez sur votre numéro un message de confirmation du payement et dans votre Espace Client sur factureflashservice.com, la quittance de payement à télécharger. </p>
		 
		 
		 
	    </div>
	</div><br/><br/><br/><br/>





<?php include('pages/foot.php');?>
</div>
</body>
</html>
<?php
 }
else
{
	 header('Location:index.php?pages=accueil');
}
?>