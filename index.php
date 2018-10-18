<?php
include('functions/config.php');
$page = htmlspecialchars($_GET['page']); //  $page : c'est une variable qui va contenir la page qu'on veut afficher à notre utilisateur
include('functions/'.$page.'.func.php');
 
$pages = scandir('pages'); //  La fonction scandir va me permettre de scanner le contenir de mon dossier pages...

if(!empty($page) and (in_array($_GET['page'].".php",$pages))) // Si utilisateur fait entrer une page par url notre fonction va scanner pour verifier si la page existe dans le dosier pages
{
	$content = 'pages/'.$_GET['page'].".php";
}
else
{
	header("Location:index.php?page=accueil");
}
if((isset($_SESSION['email']) or isset($_SESSION['phone'])) and $page != 'client' and $page != 'profil'
 and $page != 'update_avatar' and $page != 'mes_compteurs' and $page != 'ajout_compteur' and $page != 'payer_facture' 
 and $page != 'traitement' and $page != 'procedure_payement' and $page != 'vos_commandes' and $page != 'annuler_commande' and $page != 'messages' and $page != 'load'
  )
{
	header("Location:index.php?page=client");
}

?>
<!DOCTYPE html>
<html>
   <head>
   <title><?php echo $_GET['page'];?></title>
   <meta charset="utf-8"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="images/logo.png"/>
   
   </head>
   <body>
      <div id="contentindex">
	  <?php include($content); ?>
	  </div>
   </body>
   </html>