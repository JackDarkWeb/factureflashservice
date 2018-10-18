<?php
if(isset($_SESSION['email']))
{
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<link rel="shortcut icon" href="images/logo.png"/>
<link rel="stylesheet" media="only screen and (min-width:320px) and (max-width:959px)"  href="css/mobile.css"/>
<link rel="stylesheet" media="only screen and (min-width:960px)"                        href="css/normales.css"/>
<meta name="viewport"  content="width=device-width"/>
<script src="scr/autocomplete.js"></script>
<script src="scr/index.js"></script>
<script src="scr/jquery.js"></script>
</head>
<body>
<div id="contener">
<?php include('pages/header.php');?>
<?php


$factures = FACTURES_PAYES();
foreach($factures as $facture)
{
?>
<div class="contentFactures">
<div class="FACTURES">
     <li>Nom du propriétaire : <span class="CLT"><?php echo $facture['nom_proprietaire'].'<br/>';?></span></li>
     <li>Numéro de police : <span class="CLT"><?php echo $facture['num_police'].'<br/>';?></span></li>
     <li>Type de compteur : <span class="CLT"><?php echo $facture['type_compteur'].'<br/>';?></span></li>
     <li>Ville : <span class="CLT"><?php echo $facture['ville'];?></span></li>
     <li>Montant de la facture : <span class="CLT"><?php echo $facture['montant_f'];?></span></li>
</div>
	 
<?php
}
?>
<br/>

<p><strong>Résumé</strong></p>
<?php
$resumes = RESUMES();
foreach($resumes as $resume)
{
?>
<div class="resumes">
     <li>Montant des factures : <span class="CLT"><?php echo $resume['mont_vos_fact'].'<br/>';?></span></li>
     <li>Commission : <span class="CLT"><?php echo $resume['tva'].'<br/>';?></span></li>
     <li>Total : <span class="CLT"><?php echo $resume['prix_total'].'<br/>';?></span></li>
</div>
<?php
}
?>
<a href="index.php?page=statuts"><button class="retour">Retouner</button></a>
 </div>
<?php include('pages/foot.php');?>
</div>
</body>
</html>
<?php
 }
else
{
	 header('Location:index.php?pages=login_admin');
}
?>