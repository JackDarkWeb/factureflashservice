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
$id = htmlspecialchars($_GET['id_client']);
$quis = client_choisir($id);
foreach($quis as $qui)
{
?>
<div class="contentIdentite">
<div class="client">
        <img src="avatar/defaut.png" width='100' height='100' id="avat"/><br/>
     <li>Nom : <span class="CLT"><?php echo $qui['nom'].'<br/>';?></span></li>
     <li>Prénom : <span class="CLT"><?php echo $qui['prenom'].'<br/>';?></span></li>
     <li>Email : <span class="CLT"><?php echo $qui['email'].'<br/>';?></span></li>
     <li>Téléphone : <span class="CLT"><?php echo $qui['phone'];?></span></li>
</div>
	 
<?php
}
?>
<br/>
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