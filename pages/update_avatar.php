<?php
include('functions/profil.func.php');
?>
<br/>
<h3>Ajouter une photo de profil</h3><br/>
<?php
if(isset($_POST['websubmit']))
{
	if(isset($_FILES['avatar'])and !empty($_FILES['avatar']['name']))
	{
		
		$extensionValides = array('jpg','jpeg','gif','png');
		
			$extensionUloap = strtolower(end(explode('.',$_FILES['avatar']['name'])));
			if(in_array($extensionUloap, $extensionValides))
			{
				$chemin = "avatar/".$_FILES['avatar']['name'];
				$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
				if($resultat)
				{
					$insertphoto = $bdd->prepare("UPDATE clients SET avatar = '{$_FILES['avatar']['name']}' WHERE email = '{$_SESSION['email']}'");
					$insertphoto->execute(array(
					'avatar' => $_SESSION['email'].".".$extensionUloap,
					'avatar' => $_SESSION['email']
					));
					
					header('Location:index.php?page=profil');
					
				}
				else
				{
					$msg = "Erreur durant le téléchargement";
				}
			}
			else
			{
				$msg = "Le format de votre photo n'est pas acceptable";
			}
		
	}
	else
	{
		$extensionValides = array('jpg','jpeg','gif','png');
		
			$extensionUloap1 = strtolower(end(explode('.',$_FILES['avatar']['name'])));
			if(in_array($extensionUloap1, $extensionValides))
			{
				$chemin = "avatar/".$_FILES['avatar']['name'];
				$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
				if($resultat)
				{
					$insertphoto = $bdd->prepare("UPDATE clients SET avatar = '{$_FILES['avatar']['name']}' WHERE phone = '{$_SESSION['email']}'");
					$insertphoto->execute(array(
					'avatar' => $_SESSION['phone'].".".$extensionUloap1,
					'avatar' => $_SESSION['phone']
					));
					
					header('Location:index.php?page=profil');
					
				}
				else
				{
					$msg = "Erreur durant le téléchargement";
				}
			}
			else
			{
				$msg = "Le format de votre photo n'est pas acceptable";
			}
		
	
       }
	
}


 $infos = infos_membre_connecte();
 foreach($infos as $info)
 {
?>
<img src="avatar/<?php echo $info['avatar'];?>" height="150" width="150" alt="avatar"/>
<?php
 }
?>
<br/>
<form method="post" action="" enctype="multipart/form-data">
<input type="file" name="avatar"/><br/><br/>
<input type="submit" value="Ajouter" name="websubmit"/>
</form>