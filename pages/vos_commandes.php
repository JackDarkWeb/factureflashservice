<?php
include('functions/profil.func.php');
if(isset($_SESSION['nom']) or isset($_SESSION['prenom']) or isset($_SESSION['email'] ) or isset($_SESSION['phone'] )  or isset($_SESSION['id_client'] ))
{
	              $infos = infos_membre_connecte();
                  foreach($infos as $info)
				  {
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
<div class="vos_commandes">
  
  <h1> Vos commandes </h1>
  <div id="infos_traitement">
 
 
		<?php 
		 $id_client = htmlspecialchars($_SESSION['id_client']);
         $result = $bdd->query("SELECT COUNT(*) AS nb FROM payer WHERE id_client = '$id_client' ");
         $columns = $result->fetch();
         $nb = $columns['nb'];
        
		if($nb >=1)
		{	
	       $id_client = htmlspecialchars($_SESSION['id_client']);
	       $reqcommande = $bdd->prepare("SELECT * FROM payer WHERE id_client = '$id_client' ");
	       $reqcommande->execute(array($id_client));
		   
		   while($commandeinfo = $reqcommande->fetch())
            {	
	    ?>
		<form>
		
		<table id="t011">
                                  <tr>
								     <th>Montant de vos factures</th> 
									 <th><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['mont_vos_fact'];?>"/></th>
                                  </tr>
								  
								  <tr>
                                     <th>Prix de la commission</th>
									 <th><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['tva'];?>"/></th>
                                  </tr>
								  
		
                                  <tr>
                                    <th>Prix total à payer</th>
                                     <th><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['prix_total'];?>"/></th>
                                  </tr>
								  
								  <tr>
                                     <th>La date de commande</th>
									 <th><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['date'];?>"/></th>
                                  </tr>
								  
								  <tr>
                                     <th>Statut</th>
									 <th><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['confirme'];?>"/></th>
                                  </tr>
	          
         </table><br/>
		
		
		
		
		</form>
		
		
		
		
		
		
		
		
		
		
		
		<form>
  <table id='t012'>
                                  <tr>
                                     
                                     <th>Montant de vos factures</th> 
                                     <th>Prix de la commission</th>
									  <th>Prix total à payer</th>
									  <th>La date de commande</th>
									  <th>Statut</th>
                                  </tr>
								  
		
                                  <tr>
                                     <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['mont_vos_fact'];?>"/></td>
                                     <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['tva'];?>"/></td>
                                     <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['prix_total'];?>"/></td>
									 <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['date'];?>"/></td>
									 <td><input type="text" readonly="readonly" class="input"  value="<?=$commandeinfo['confirme'];?>"/></td>
									 
                                  </tr>
	          
                           </table><br/>
						    
						   </form>
						   
						   
						    
	<?php
				
	}
	      $reqcommande->closecursor();
	}
	else
	{
		echo "<div class='attention'>Pas de commande en cours de paiement</div>";
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
				  
 }
else
{
	 header('Location:index.php?pages=accueil');
}
?>