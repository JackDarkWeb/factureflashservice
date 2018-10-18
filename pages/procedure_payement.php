<?php
include('functions/profil.func.php');
if(isset($_SESSION['nom']) or isset($_SESSION['prenom']) or isset($_SESSION['email'] ) or isset($_SESSION['phone'] )  or isset($_SESSION['id_client'] ))
{
	              $infos = infos_membre_connecte();
                  foreach($infos as $info)
				  {
					  $confirme = "EN COURS";
					  $id_client = htmlspecialchars($_SESSION['id_client']);
	                  $reqcommande = $bdd->prepare("SELECT * FROM payer WHERE id_client = '$id_client' and confirme = '$confirme'");
	                  $reqcommande->execute(array($id_client,$confirme));
					  
				   ?>
				   
 
 <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<link rel="shortcut icon" href="images/logo.png"/>
<link rel="stylesheet" media="only screen and (min-width:320px) and (max-width:479px)"  href="css/mobile.css"/>
<link rel="stylesheet" media="only screen and (min-width:480px) and (max-width:767px)"  href="css/ipad.css"/>
<link rel="stylesheet" media="only screen and (min-width:768px) and (max-width:799px)"  href="css/tablette.css"/>
<link rel="stylesheet" media="only screen and (min-width:800px) and (max-width:959px)"  href="css/tabl_normale.css"/>
<link rel="stylesheet" media="only screen and (min-width:960px) and (max-width:1079px)" href="css/normaux.css"/>
<link rel="stylesheet" media="only screen and (min-width:1080px)"                       href="css/styles.css"/>
<meta name="viewport"  content="width=device-width"/>
<script src="scr/autocomplete.js"></script>
<script src="scr/index.js"></script>
</head>
<body>
<?php include('pages/reseaux.php');?>
<div id="contener">
    <?php include('pages/menu.php');?>


<div id="procedure">

  <h1>PROCEDURE DE PAIEMENT</h1>
  <h3>A- Tapez *400# à partir de votre téléphone portable.</h3>
   <h3>A1- Choisissez 2 pour paiement Mobile Money </h3>
   <h3>A2- Choisissez 1 pour Achat de Bien et Services</h3>
   <h3>A3- Entrez le numéro <?php printf("<span style='color:#%x%x%x'>(96940764)</span>",65, 127, 245);?></h3>
   <h3>A4- Entrez à nouveau le numéro <?php printf("<span style='color:#%x%x%x'>(96940764)</span>",65, 127, 245);?> pour confirmer </h3>
   <?php
          
		   while($commandeinfo = $reqcommande->fetch())
            {
	       ?>
   <h3>A5- Entrez le prix total à payer(<span><?=$commandeinfo['prix_total'];?></span>)</h3>
			<?php
			}
			?>
   <h3>A6- Entrez votre code confidentiel </h3>
   <h3>A7- Vous recevrez un SMS de notre part pour vous confirmer
       la reception de votre paiement</h3>
  
  
  
  
 </div><br/><br/><br/><br/>
  <?php include('pages/foot.php');?>
</div>
  </body>
  </html>
  <?php
					  
      }
				  
 }
else
{
	 header('Location:index.php?pages=accueil');
}
?>