<?php
include('functions/profil.func.php');
if(isset($_SESSION['nom']) or isset($_SESSION['prenom']) or isset($_SESSION['email'] ) or isset($_SESSION['phone'] ) or isset($_SESSION['id_client'] ))
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
<div class="mes_compteurs">
     <h1>Mes compteurs</h1>
<div class="contentCompteur">
        
		     <?php 
		 $id_client = htmlspecialchars($_SESSION['id_client']);
         $result = $bdd->query("SELECT COUNT(*) AS nb FROM compteurs WHERE id_client = '$id_client' ");
         $columns = $result->fetch();
         $nb = $columns['nb'];
        
		if($nb >=1)
		{	
	       $id_client = htmlspecialchars($_SESSION['id_client']);
	       $reqcompteur = $bdd->prepare("SELECT * FROM compteurs WHERE id_client = '$id_client' ");
	       $reqcompteur->execute(array($id_client));
	   
          while($compteurinfo = $reqcompteur->fetch())
          {
          ?>
   
   
   

<table id="t00">
  <tr>
    <th class="th">Numéro de police</th>
	<td><?= $compteurinfo['num_police'];?></td>
  </tr>
  
  <tr>
    <th>Nom du propriétaire</th> 
	<td><?= $compteurinfo['nom_proprietaire'];?></td>
  </tr>
  
  <tr>
    <th>Type de compteur</th>
	 <td><?= $compteurinfo['type_compteur'];?></td>
  </tr>
  
  <tr>
	<th>Ville</th>
	<td><?= $compteurinfo['ville'];?></td>
  </tr>
  
  <tr>
	<th>Description</th>
	<td><?= $compteurinfo['description'];?></td>
  </tr>
	
</table>
   
   
   
   
   
   
   
   <br>

<table id="t01">
  <tr>
    <th class="th">Numéro de police</th>
    <th>Nom du propriétaire</th> 
    <th>Type de compteur</th>
	<th>Ville</th>
	<th>Description</th>
	
  </tr>
   
  <tr>
    <td><?= $compteurinfo['num_police'];?></td>
    <td><?= $compteurinfo['nom_proprietaire'];?></td>
    <td><?= $compteurinfo['type_compteur'];?></td>
	<td><?= $compteurinfo['ville'];?></td>
	<td><?= $compteurinfo['description'];?></td>
	
  </tr>
  
</table>
    <?php
	}
	   $reqcompteur->closecursor(); 
	}
	else
	{
		echo "<div class='attention'>Vous ne disposez pas de compteurs</div>";
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
 }
else
{
	 header('Location:index.php?pages=accueil');
}
?>
