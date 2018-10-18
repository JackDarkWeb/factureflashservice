
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
</head>
<body>
<div id="contener">
<?php include('pages/header.php');?>

     <div class="nos_clients">
	 <p><strong>LA LISTE DE NOS CLIENTS</strong></p><br/>
	 <div class="contentClients">
       <?php
	    $infos = infos_clients();
		foreach($infos as $info)
		{
		?>
		
		
		<table id="t00">
   <tr>
    <th class="th"><strong>ID_client</strong></th>
	<td><em class="donnees"><?php  echo $info['id_client'];?></em></td>
   </tr>
   
   <tr>
    <th><strong>Nom</strong></th>
    <td><em class="donnees"><?php  echo $info['nom'];?></em></td>	
   </tr>
   
   <tr>
    <th><strong>Prénom</strong></th>
	<td><em class="donnees"><?php echo $info['prenom'];?></em></td>
   </tr>
   
   <tr>
	<th><strong>Email</strong></th>
	<td><em class="donnees"><?php echo $info['email'];?></em></td>
  </tr>
  
  <tr>
	<th><strong>Numéro de téléphone</strong></th>
	<td><em class="donnees"><?php echo $info['phone'];?></em></td>
  </tr>
  
</table><br/>  
		
		<table id="t01">
   <tr>
    <th class="th"><strong>ID_client</strong></th>
    <th><strong>Nom</strong></th> 
    <th><strong>Prénom</strong></th>
	<th><strong>Email</strong></th>
	<th><strong>Numéro de téléphone</strong></th>
	
  </tr>
			   
	<tr>
    <td><em class="donnees"><?php  echo $info['id_client'];?></em></td>
    <td><em class="donnees"><?php  echo $info['nom'];?></em></td>
    <td><em class="donnees"><?php echo $info['prenom'];?></em></td>
	<td><em class="donnees"><?php echo $info['email'];?></em></td>
	<td><em class="donnees"><?php echo $info['phone'];?></em></td>
	
  </tr>	
</table><br/> 
			   		   
			   
		<?php
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
	 header('Location:index.php?pages=login_admin');
}
?>