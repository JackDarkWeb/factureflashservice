<?php
if(isset($_POST['submit']))
{
	$premier = htmlspecialchars(trim($_POST['premier']));
	$deuxieme = htmlspecialchars(trim($_POST['deuxieme']));
	
	if((!empty($premier) and !empty($deuxieme)))
	{
		
		if(($deuxieme >= $premier))
		{
			
			$totauxkw = ($deuxieme)-($premier);
		    $tva1     = 0;
			$tva2     = 100;
		    $totauxmontant = $totauxkw * 78;
			$totauxmontant1 = ($totauxkw * 78) + $tva2;
			
			if(($totauxkw <= 20 and $totauxkw >=0))
		     { 
			      
			      
			     
			          	$montant = <<<_END
						<table id='t012'>
                                  <tr>
                                     <th>Prix total sans TVA</th>
                                     <th>Prix du TVA</th> 
                                     <th>Prix total avec TVA</th>
                                  </tr>
                                  <tr>
                                     <td>$totauxmontant FCFA</td>
                                     <td>$tva1 FCFA</td>
                                     <td>$totauxmontant FCFA</td>
                                  </tr>
                           </table>
_END;
						   
			  }
			 elseif(($totauxkw > 20 and $totauxkw <= 250) )
			 {
				 $montant = <<<_END
				 <table id='t012'>
                                  <tr>
                                     <th>Prix total sans TVA</th>
                                     <th>Prix du TVA</th> 
                                     <th>Prix total avec TVA</th>
                                  </tr>
                                  <tr>
                                     <td>$totauxmontant FCFA</td>
                                     <td>$tva2 FCFA</td>
                                     <td>$totauxmontant1 FCFA</td>
                                  </tr>
                           </table>
_END;
					   
			 }
		  else
		  {
			$error = "Je calcule seulement la quantité de votre consommation";
		  }
	  }
	  else
	  {
		$error = "Je n'arrive pas à calculer,merci de vérifier les nombres entrés";
	  }
		
  }
  else
  {
	$error = "Entrez le premier et le deuxième relevé de votre compteur";
  }
}
?>
<head>
   <link rel="stylesheet" href="css/style.css"/>
   <style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
    text-align: left;
}
table#t012 {
    width: 100%;    
    background-color: #f1f1c1;
}
</style>
</head>
<body>
     <div id="content">
	      <div id="calculer">
               <h1>CALCULER VOS CONSOMMATIONS</h1><br/>
			   <?php if(isset($error)) echo '<div id="error">'.$error.'</div>';?><br/>
			   <form method="post" action="">
			         <input type="text" name="deuxieme" placeholder="Entrez deuxième relevé" value="<?php echo(isset($deuxieme))? $deuxieme:'';?>"/>
			         <input type="text" name="premier" placeholder="Entrez le premier relevé" value="<?php echo(isset($premier))? $premier:'';?>"/>
					 <br/><br/>
					 
					 <input type="submit" name="submit" value="CALCULER"/><br/><br/>
					  <?php if(isset($montant)) echo $montant;?><br/>
			   <form>
		  </div>
     </div>
</body>
