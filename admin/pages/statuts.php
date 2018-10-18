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





<script>
	     $(document).ready(function()
		 {
			 $(".change").click(function()
			 {
				 $(".pop-outer").fadeIn('slow')
			 });
			 
			 $(".close").click(function()
			 {
				 $(".pop-outer").fadeOut('slow')
			 });
		 });
		 
		 
		 
		 $(document).ready(function()
		 {
			 $(".modify").click(function()
			 {
				 $(".pop-out").fadeIn('slow')
			 });
			 
			 $(".closing").click(function()
			 {
				 $(".pop-out").fadeOut('slow')
			 });
		 });
</script>

</head>
<body>
<div id="contener">
<?php include('pages/header.php');?>

<?php 
	
	
	if(isset($success))
	{	
        echo "<br/>";
		echo '<div class="success">'.$success.'</div>';
		echo "<br/>";
	}
	if(isset($error))
	{
        		
		echo '<div class="attention">'.$error.'</div>';
		
	}
?>


<div class="statuts">
  
     <p><strong>Changer le statut d'une commande</strong></p><br/>
    <div class="contentStatuts">
  
<?php

if(isset($_POST['traite']))
{
	 if(TRAITEMENT() == NULL)
	 {
		 ACCES_PAYER();
	     echo '<div class="success">Opération réussite !</div><br/>';
	 }
	 else
	 {
		 echo '<div class="attention">Echec de l\' pération !</div><br/>';
	 }
}elseif(isset($_POST['paye']))
{
	 if(DEJA_PAYER() == NULL)
	 {
		 echo '<div class="success">Opération réussite !</div><br/>';
	 }else
	 {
		 echo '<div class="attention">Echec de l\' pération !</div><br/>';
	 }
}

if(commande_en_cours_et_en_traitement() == TRUE)
{
$commandes = commande_en_cours_et_en_traitement();

foreach($commandes as $commande)
{
     
?>
     <div class="CMD">
         <p><?php echo "Commande N° : ". $commande['id_payer'];?><br/>
	     commandé le : <?php echo date('d-m-Y' ,strtotime($commande['date']));?></p>
		 <a href="index.php?page=qui_est_ce&id_client=<?php echo $commande['id_client'];?>"><button class="qui">Qui-est-ce ?</button></a>
		 <?php
		    if($commande['confirme'] == 'EN COURS')
			{
		    ?>
		      <a href="index.php?page=factures&id_client=<?php echo $commande['id_client'];?>"><button class="qui">Factures</button></a>
			 <?php
			}
			?>
		  
		 <form method="post" action="" id="formP">
		    <input type="text" name="a" value="<?=$commande['id_client'];?>" readonly="readonly" class="cache"/>
		     <input type="text" name="b" value="<?=$commande['id_payer'];?>" readonly="readonly" class="cache"/>
		    
		 <?php
		     if($commande['confirme'] == 'Traitement')
			 {
			 ?>
				  <input type="submit" class="modify"  value="Déjà payé ?" name="paye"/>
			  <?php
			 }
			 else
			 {
			  ?>
			     <input type="submit" class="change" value="Traitement ?" name="traite"/>
				 <input type="submit" class="modify" value="Déjà payé ?" name="paye"/>
			 <?php
			 }
		 ?>
		 </form>
     </div><br/>
	 
	 
<?php
} 
}
else
{
	     echo  "<div class='attention'>Il n'y a aucune commande actuellement</div>";
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
	 header('Location:index.php?pages=admin');
}
?>		