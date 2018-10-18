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
<script src="scr/jquery.js"></script>

<script>
	     $(document).ready(function()
		 {
			 $(".delete").click(function()
			 {
				 $(".pop-outer").fadeIn('slow')
			 });
			 
			 $(".close").click(function()
			 {
				 $(".pop-outer").fadeOut('slow')
			 });
		 });
</script>

</head>
<body>
<?php include('pages/reseaux.php');?>
<div id="contener">
<?php include('pages/menu.php');?>
<div class="traitement">
    


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



<h1>Traitement......</h1>
  
 
 <div class="contentTraitement">       
		
<?php 

if(isset($_POST['oui']))
{
	 supp();
	 echo '<div class="success"> Facture supprimée !</div><br/>';
}


$confirme = "EN COURS";
$id_client = htmlspecialchars($_SESSION['id_client']);
$reqstockage = $bdd->prepare("SELECT id_client,confirme FROM payer WHERE id_client = ? and confirme = ?");
$reqstockage->execute(array($id_client,$confirme));
		
if($infosstockage = $reqstockage->rowcount() == 0)		
{		
		
		 $active = 0;
		 $id_client = htmlspecialchars($_SESSION['id_client']);
         $result = $bdd->query("SELECT COUNT(*) AS nb FROM commandes WHERE id_client = '$id_client' and activer = '$active' ");
         $columns = $result->fetch();
         $nb = $columns['nb'];
        
		if($nb >=1)
		{	
	        $active = 0;
	       $id_client = htmlspecialchars($_SESSION['id_client']);
	       $reqcommande = $bdd->prepare("SELECT * FROM commandes WHERE id_client = '$id_client' and activer = '$active' ");
	       $reqcommande->execute(array($id_client, $active));
		   
		   while($commandeinfo = $reqcommande->fetch())
            {
	    ?>
		<table id="t011">
                                  <tr>
								     <th>ID de commande</th>
									 <th><input type="text" readonly="readonly" class="input" id="none"  name="num_police_t" value="<?=$commandeinfo['id_comm'];?>"/></th>
                                  </tr>
								  
								  <tr>
                                     <th>Numéro de la police</th>
									 <th><input type="text" readonly="readonly" class="input"  name="num_police_t" value="<?=$commandeinfo['num_police'];?>"/></th>
                                  </tr>
								  
		
                                  <tr>
                                     <th>Montant de la facture</th> 
                                     <th><input type="text" readonly="readonly" class="input" name="montant_f_t" value="<?=$commandeinfo['montant_f'];?> FCFA"/></th>
                                  </tr>
								  
								  <tr>
                                    <th>La date de traitement</th>
									 <th><input type="text" readonly="readonly" class="input"  name="" value="<?=$commandeinfo['date'];?>"/></th>
                                  </tr>
	          
         </table>
		
		
		
		
         <table id="t012">
                                  <tr>
								     <th>ID de commande</th>
                                     <th>Numéro de la police</th>
                                     <th>Montant de la facture</th> 
									  <th>La date de traitement</th>
                                  </tr>
								  
		
                                  <tr>
								     <td><input type="text" readonly="readonly" class="input" id="none"  name="num_police_t" value="<?=$commandeinfo['id_comm'];?>"/></td>
                                     <td><input type="text" readonly="readonly" class="input"  name="num_police_t" value="<?=$commandeinfo['num_police'];?>"/></td>
                                     <td><input type="text" readonly="readonly" class="input" name="montant_f_t" value="<?=$commandeinfo['montant_f'];?> FCFA"/></td>
									 <td><input type="text" readonly="readonly" class="input"  name="" value="<?=$commandeinfo['date'];?>"/></td>
                                  </tr>
	          
         </table>
		  <form method="post" action="">
		      <input type="" name="a" value="<?=$commandeinfo['id_client'];?>" readonly="readonly"  class="cache"/>
		      <input type="" name="b" value="<?=$commandeinfo['id_comm'];?>" readonly="readonly"  class="cache"/>
              <span><input type="submit" name="oui" value="Supprimer" class="delete"/></span><br/><br/>
		 </form>			  				   
						    
	<?php
	}
	      $reqcommande->closecursor();
	}
	else
	{
		echo "<div class='attention'>Pas de traitement de facture en cours.Veuillez ajouter une facture</div>";
	}
    ?>   
	
						   
			
			
			
			
		<?php
		 $active = 0;
		 $id_client = htmlspecialchars($_SESSION['id_client']);
         $result = $bdd->query("SELECT COUNT(*) AS nb FROM commandes WHERE id_client = '$id_client' and activer = '$active' ");
         $columns = $result->fetch();
         $nb = $columns['nb'];
        
		if($nb >=1)
		{	
	    ?>
		
		
		
		
		
		<br/><br/><br/><br/>
			     <form method="post" action="index.php?page=traitement">
				 
				  <table id="t011">
                                  <tr>
								     <th>Montant de vos factures</th> 
									  <th><input type="text" readonly="readonly" class="input"  name="mont" value="<?php if(isset($mont)) echo $mont. 'FCFA' ;?>"/></th>
                                  </tr>
								  
								  <tr>
                                     <th>Prix de la commission</th>
									 <th><input type="text" readonly="readonly" class="input"  name="tva" value="<?php if(isset($tva)) echo $tva. 'FCFA' ;?>"/></th>
                                  </tr>
								  
		
                                  <tr>
                                     <th>Prix total à payer</th>
                                    <th><input type="text" readonly="readonly" class="input"  name="pt" value="<?php if(isset($pt)) echo $pt. 'FCFA' ;?>"/></th>
                                  </tr>
								  
								  
	          
                  </table><br/>
				 
				
				 
				 
				  <table id='t012'>
                                  <tr>
                                     <th>Montant de vos factures</th> 
									  <th>Prix de la commission</th>
									  <th>Prix total à payer</th>
                                  </tr>
								  
		
                                  <tr>
								     <td><input type="text" readonly="readonly" class="input"  name="mont" value="<?php if(isset($mont)) echo $mont. 'FCFA' ;?>"/></td>
                                     <td><input type="text" readonly="readonly" class="input"  name="tva" value="<?php if(isset($tva)) echo $tva. 'FCFA' ;?>"/></td>
                                     <td><input type="text" readonly="readonly" class="input"  name="pt" value="<?php if(isset($pt)) echo $pt. 'FCFA' ;?>"/></td>
                                  </tr>
	          
                  </table><br/>
				 
			             <input type="submit" class="input" name="commander" value="COMMANDER"/><br/><br/><br/><br/><br/><br/>
			     </form>
				 
				 
				 
				 
		<?php
		}
		?>
			
			
			
			






<?php

}
		else
		{
			echo "<div class='success'>MESSAGE :<br/> Votre demande a été prise en compte.
									 Nous attendons votre paiement à partir de votre MTN Mobile Money ou Moov.
									 <a href='index.php?page=procedure_payement'>CLIQUEZ ICI</a>
			 ou <a href='index.php?page=annuler_commande1'>ANNULER</a></div>";
		}	
?>


</div>
<p class="ajoutez"><a href="index.php?page=payer_facture">AJOUTEZ UNE AUTRE FACTURE A PAYER</a></p>
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