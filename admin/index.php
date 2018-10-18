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
	header("Location:index.php?page=login_admin");
}
if((isset($_SESSION['user'])  and $page != 'admin' and $page != 'nos_clients' and $page != 'les_commandes' and $page != 'statuts' and $page != 'messagerie' 
and $page != 'alerte_commande' and $page != 'conversations'))
{
	header("Location:index.php?page=admin");
}

?>
<!DOCTYPE html>
<html>
   <head>
   <title>Facture flash service</title>
   <meta charset="utf-8"/>
   
   <link rel="shortcut icon" href="images/logo.png"/>
   
   </head>
   <body>
      <div id="contentindex">
	  <?php include($content); ?>
	  </div>
   </body>
   </html>