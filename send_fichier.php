<?php
if(isset($_POST['monfichier']))
{
	$no = $_FILES['monfichier']['name'];
	echo $no;
}
echo <<<_END
     <html><head><title>Formulaire de téléversement en PHP</title></head><body>
	     <form method='post' action='' enctype='multipart/form-data'>
		     Sélectionnez un fichier JPG, GIF, PNG ou TIF :
			     <label for="file" class="label-file">Choisir une image</label>
			     <input type='file' id ="file" class="a" name='monfichier' size='10'/>
				 <input type='submit' value='Déposer'/></form>
_END;



if($_FILES)
{
	 $nom = $_FILES['monfichier']['name'];
	 
	 switch($_FILES['monfichier']['type'])
	 {
		 case 'image/jpeg': $ext = 'jpg'; 
		      break;
			  
		 case 'image/gif': $ext = 'gif'; 
		      break;
			  
		 case 'image/png': $ext = 'png'; 
		      break;
			  
		 case 'image/tiff': $ext = 'tif'; 
		      break;
			  
		 default:           $ext = '';
		      break;
	 }
	 if($ext)
	 {
		 $n = "image.$ext";
		 move_uploaded_file($_FILES['monfichier']['tmp_name'], $n);
		 echo "Image téléchargée : '$nom' de type '$n': <br/>";
		 echo "<img src='$n' widt='100' height='100'";
	 }
	 else
	 {
		 echo "'$nom' n'est pas accepté comme fichier image";
	 }
}
else
{
	 echo "Aucune image chargée ";
}

echo "</body></html>";
?><br/><br/>
<style>
.label-file {
    cursor: pointer;
    color: #00b1ca;
    font-weight: bold;
}
.label-file:hover {
    color: #25a5c4;
}

.input-file, .a {
    display: none;
}
</style>

<label for="file" class="label-file">Choisir une image</label>
<input id="file" class="input-file" type="file">