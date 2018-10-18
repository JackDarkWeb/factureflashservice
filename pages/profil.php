
<?php
if(isset($_SESSION['nom']) or isset($_SESSION['prenom']) or isset($_SESSION['email'] ) or isset($_SESSION['phone'] ))
{
?>
<html>
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
</head>
<body>
<?php include('pages/reseaux.php');?>
<div id="contener">
    <?php include('pages/menu.php');?>

        <div id="infos">
		          <?php
				  $infos = infos_membre_connecte();
                  foreach($infos as $info)
                  {
                  ?>
                    
                    <p><img src="avatar/defaut.png" height="100" width="100" title="Profil" id="photo"alt="avatar"/></p>
					<p><strong>Nom</strong> : <em class="donnees"><?php  echo $info['nom'];?></em></p>
					<p><strong>Prénom</strong> : <em class="donnees"><?php echo $info['prenom'];?></em></p>
                    <p><strong>Email</strong> : <em class="donnees"><?php echo $info['email'];?></em></p>
                    <p><strong>Numéro de téléphone </strong> : <em class="donnees"><?php echo $info['phone'];?></em></p>
       </div>
               <?php
                }
                ?>
       



<?php include('pages/foot.php');?>
</div>

</body>
</html>
<?php
 }
else
{
	 header('Location:index.php?pages=accueil');
}
?>