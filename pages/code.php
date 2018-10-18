<?php
if($_SESSION['num_mail'])
{
?>
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
<link rel="stylesheet" media="only screen and (min-width:960px) and (max-width:1079px)" href="css/normaux.css"/>
<link rel="stylesheet" media="only screen and (min-width:1080px)"                       href="css/styles.css"/>
<meta name="viewport"  content="width=device-width"/>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script type="text/javascript" src="scr/jquery.label_better.js"></script>

<script>
	  $(document).ready( function() {
	    $(".label_better").label_better({
	      easing: "bounce"
	    });
	  });
	</script>
</head>
<body id="body">
   <div id="espace_client">
       <p><a href="index.php?page=accueil"><img src="images/logo.png" alt="facture flash client" title="facture flash sercive" id="logo4"/></a></p>
	    <h2><a href="index.php?page=accueil"><span>F</span>FS</a></h2><br/>
	   <p><img src="images/trait.png" alt="facture flash client" id="trait4"/></p><br/><br/>
	    <h3 id="ident">Entrez le code envoyé par notre service </h3><br/><br/>
		
		<?php 
	
	if(isset($message))
	{
        		
		echo '<div class="attention">'.$message.'</div>';
		
	}
	echo '<div class="success">Nous vous avions envoyé le code dans votre boite mail</div>';
	?>
		
	   <div id="form">
	   
	       
	       <form method="post" action="">
		       <input type="text" class="label_better" name="code" placeholder="Entrez le code " data-new-placeholder="Entrez le code"/><br/><br/>
			   <input type="submit" name="code0" value="VALIDER"/>
			   
		   </form><br/><br/>
		   
		   
		   
	   </div>
   </div>
   
</body>
</html>
<?php
}
	else
	{
		 header("Location:index.php?page=mdp_oublie");
	}
	?>