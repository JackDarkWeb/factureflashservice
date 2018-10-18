<?php
$bdd = new PDO('mysql:host=localhost; dbname=ffs; charset=utf8', 'root', '');
$req = $bdd->prepare("SELECT * FROM clients");
$req->execute();
while($res = $req->fetch())
{
	?>
<html>
<head>
<meta charset="utf-8"/>
<link rel="stylesheet" href="sty.css"/>
<script src="scr/jquery.js"></script>

<script>
	     $(document).ready(function()
		 {
			 $(".supprimer").click(function()
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
	 <?php echo "<li>".$res["nom"]."</li>";?><button class="supprimer">Supprimer</button>
	 
	 <div class="pop-outer">
	 
	     <div class="pop-isser">
		     <span class="close">&times;</span>
			     <div class="msg">
				     <p>Voulez-vous vraiment supprimer cette commande ?</p>
				 </div>
	        <span><a href="confirme.php&id_client=<?php echo $res["id_client"];?>"><input type="submit" value="Oui"/></a></span>
	        <span><a href="supprimer.php"><input type="submit" value="Non"/></a></span>
		 </div>
		 
	 </div>
</body>
</html>
<?php
}
$req->closeCursor();
?>	



