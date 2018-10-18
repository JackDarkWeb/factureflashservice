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
</head>
<body>
<div id="contener">
<?php include('pages/header.php');?>
  <div class="les_commandes">
  
  <p><strong>LA LISTE DES COMMANDES</strong></p><br/>
 <div class="contentCommandes">
  <?php 
  $infos_commandes = infos_commandes($bdd);
  foreach($infos_commandes as $commandeinfo)
		{
		?> 
  
  
  
  
   <table id='t011'>
                                   <tr>
								      <th>ID_comm</th>
									  <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['id_payer'];?>"/></td>
								   </tr>
								   
								   <tr>
									  <th>ID_client</th>
									  <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['id_client'];?>"/></td>
								   </tr>
								   
                                   <tr>
                                     <th>Montants des factures</th>
									 <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['mont_vos_fact'];?>"/></td>
                                   </tr>
								   
								   <tr>
                                     <th>Prix de la commission</th>
									 <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['tva'];?>"/></td>
								   </tr>
								   
								   <tr>
									  <th>Prix total à payer</th>
									  <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['prix_total'];?>"/></td>
								   </tr>
								   
								   <tr>
									  <th>La date de commande</th>
									  <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['date'];?>"/></td>
								   </tr>
								   
								   <tr>
									  <th>Statut</th>
									  <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['confirme'];?>"/></td>
                                  </tr>
								 
  </table><br/>
  
  <table id='t012'>
                                   <tr>
								      <th>ID_comm</th>
									  <th>ID_client</th>
                                     
                                     <th>Montants des factures</th> 
                                     <th>Prix de la commission</th>
									  <th>Prix total à payer</th>
									  <th>La date de commande</th>
									  <th>Statut</th>
                                  </tr>
								  
		
                                  <tr>
								  <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['id_payer'];?>"/></td>
								  <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['id_client'];?>"/></td>
                                     
                                     <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['mont_vos_fact'];?>"/></td>
                                     <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['tva'];?>"/></td>
									 <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['prix_total'];?>"/></td>
									 <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['date'];?>"/></td>
									 <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['confirme'];?>"/></td>
                                  </tr>
	          
	          
 </table><br/>
  
  
  <?php
		}
		?>
  
  
  
  </div>
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