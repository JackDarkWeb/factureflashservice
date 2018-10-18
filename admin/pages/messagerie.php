<?php
if(isset($_SESSION['email']))
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
<link rel="stylesheet" media="only screen and (min-width:320px) and (max-width:959px)"  href="css/mobile.css"/>
<link rel="stylesheet" media="only screen and (min-width:960px)"                        href="css/normales.css"/>
<meta name="viewport"  content="width=device-width"/>
<script src="scr/autocomplete.js"></script>
<script src="scr/index.js"></script>
</head>
<body>
<div id="contener">
<?php include('pages/header.php');?>
<div class="messages">
<h1>Les messages recus</h1><br/>

<?php
$lu = 0;
$reqinfo = $bdd->prepare("SELECT * FROM conversations_messages WHERE pseudo_exp != '6' and lu = '$lu'");
$reqinfo->execute(array());
while($result = $reqinfo->fetch())
{
	     
?>
               <div class="message_recus">
                  <p><a href="index.php?page=conversations&id_client=<?php echo $result['pseudo_exp'];?>"><?php echo "identité du client est: ". $result['pseudo_exp'];?><br/>
				  Envoyé le : <?php echo date('d-m-Y  à  H:i:s',strtotime($result['date_message']));?></a></p>
               </div><br/>
<?php
		
}
$reqinfo->closeCursor();
?>
      
</div>
</div>
</body>
</html>
<?php
				  
				  }
 }
else
{
	 header('Location:index.php?pages=admin');
}
?>
