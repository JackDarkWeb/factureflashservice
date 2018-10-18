
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

<div class="ajout_compteur">
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
<h1>Inscrivez votre compteur</h1><br/><br/>


     <form name="theForm" method="post" action=""/>
           <label for="police">Numéro de police </label><br/>
           <input type="text" name="police" placeholder="Ex :CE124253" value="<?php echo(isset($police))? $police:'';?>"/><br/><br/><br/>
		   
           <label for="nom">Nom complet du propriétaire</label><br/>
           <input type="text" name="nom_prop" placeholder="Ex: Houeto Paul"  value="<?php echo(isset($nom_prop))? $nom_prop:'';?>"/><br/><br/><br/>
		   
           <label for="compteur">Sélectionnez le type de votre compteur</label><br/>
		   <select name="compteur">
		          <option value="0" selected="1">Compteur</option>
		          <option value="SBEE (compteur ordinaire)">SBEE (compteur ordinaire)</option>
				  <option value="SBEE (compteur à carte)"><span>SBEE (compteur à carte)</span></option>
				  <option value="SONEB">SONEB</option>
		   </select><br/><br/><br/>

          <label for="ville">Saisissez la ville où se trouve votre compteur</label><br/>
	          <input name="ville"  class="awesomplete" data-list="Abomey-Calavi, Godomey, Adjarra, Atchoukpa, Misserété, Dangbo, Gbodjè, Male, Tanzoun,Danto, Djougou, Bohicon, Natitingou, Savé, Abomey, Nikki, 
			  Cotonou, Porto-Novo, Parakou, Avrankou, Lokossa , Ouidah, Dogbo-Tota, Kandi, Cové, Malanville, Pobé, Kérou, Savalou, Sakété, Comè, Bembéréké, Bassila, Banikoara, Kétou, Dassa-Zoumè, Tchaourou,
			  Allada, Aplahoué, Tanguiéta, N'Dali, Segbana, Athiémé, Grand Popo, Kouandé " placeholder="Ex : Cotonou"/><br/><br/><br/>
	
	
        <label for="description" class="tt">Description</label><br/>
<!-- indiquez ci-dessous le nombre de caractères et de lignes  (nb car, nb lin,largeur de la zone) -->
       <textarea name="myText" placeholder="Ex:Compteur maison de papa" value="<?php echo(isset($myText))? $myText:'';?>" class="textarea" wrap="VIRTUAL" onKeyUp="textCounter(theForm.myText,theForm.remChars,remLines,86,2,40);"></textarea>
       <br><font face="Tahoma" size="2" >Il vous reste : <input name="remChars" type="text" class="chars" value="86" size="3" maxlength="86" readonly>caractères
         ou <input name="remLines" class="lines" type="text" value="2" size="3" maxlength="2" readonly> lignes</font><br/><br/><br/>
       <input type="submit"  name="submit" value="Valider"/>
  </form>
</div>

<?php include('pages/foot.php');?>
</div>

<Script>
function textCounter(theField,theCharCounter,theLineCounter,maxChars,maxLines,maxPerLine)
{
	var strTemp = "";
	var strLineCounter = 0;
	var strCharCounter = 0;
	for (var i = 0; i < theField.value.length; i++)
	{
		var strChar = theField.value.substring(i, i + 1);
		if (strChar == '\n')
		{
			strTemp += strChar;
			strCharCounter = 1;
			strLineCounter += 1;
		}
		else if (strCharCounter == maxPerLine)
		{
			strTemp += '\n' + strChar;
			strCharCounter = 1;
			strLineCounter += 1;
		}
		else
		{
			strTemp += strChar;
			strCharCounter ++;
		}
	}
	theCharCounter.value = maxChars - strTemp.length;
	theLineCounter.value = maxLines - strLineCounter;
}
//-->
</script>
</body>
</html>
                              
