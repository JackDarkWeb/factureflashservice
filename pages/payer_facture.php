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
<div class="payer_facture">

   <div class="payer">
       <div class="forme">
        <h1>Payer votre facture</h1><br/>
		<?php if(isset($error)) echo '<div class="attention">'.$error.'</div><br/>';?>

		     <?php 
		 $id_client = htmlspecialchars($_SESSION['id_client']);
         $result = $bdd->query("SELECT COUNT(*) AS nb FROM compteurs WHERE id_client = '$id_client' ");
         $columns = $result->fetch();
         $nb = $columns['nb'];
		 
        
		if($nb >=1)
		{	
	         $id_client = ($_SESSION['id_client']);
		    $confirme = "EN COURS";
		    $reqstockage0 = $bdd->prepare("SELECT id_client, confirme FROM payer WHERE id_client = ? and confirme = ?");
		    $reqstockage0->execute(array($id_client,$confirme));
		
		    if($infosstockage0 = $reqstockage0->rowcount() == 0)
		    {
	         
		?>
			 
			 <form method="post" action="index.php?page=payer_facture">
			    <label>Sélectionnez le compteur à payer</label><br/>
			
			       <select name="num">
				   <option value="0" selected="1">Sélectionnez</option>
				   <?php
				   $infos1 = infos_compteur();
		           foreach($infos1 as $info1)
	               { 
	               ?>
				      
                      <option value="<?php echo $info1['num_police']; ?>"><?php echo $info1['num_police']; ?></option>
			     <?php
			      }
			      ?>
				   </select><br/><br/><br/>
				   <label>Entrez le montant à payer</label><br/>
				   <input type="text" name="montant" value="<?php echo(isset($montant))? $montant:'';?>" placeholder="Entrez le montant"/><br/><br/>
				   <input type="submit" value="VALIDER" name="submit"/><br/><br/><br/><br/><br/>
				   
			 </form>
			 
			 
			   
				  
			
			
		     <?php
	   
		
			}
            else
            {
				echo "<div class='attention'>Veuillez-vous patienter pendant 5 minutes une commande est en cours. Si vous voulez <a href='index.php?page=annuler_commande'>annuler</a> ou <a href='index.php?page=procedure_payement'>Cliquez-ici</a> pour payer </div>";
            }				
	}
	else
	{
		echo "<div class='attention'>Vous ne disposez pas de compteurs</div>";
	}
       ?>   
	   
        </div>
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