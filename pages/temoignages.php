
<!DOCTYPE html>
<html>
<head>
<title>Facture Flash service</title>
<meta charset="utf-8"/>
<link rel="shortcut icon" href="images/logo.png"/>
<link rel="stylesheet" media="only screen and (min-width:320px) and (max-width:479px)"  href="css/mobile.css"/>
<link rel="stylesheet" media="only screen and (min-width:480px) and (max-width:767px)"  href="css/ipad.css"/>
<link rel="stylesheet" media="only screen and (min-width:768px) and (max-width:799px)"  href="css/tablette.css"/>
<link rel="stylesheet" media="only screen and (min-width:800px) and (max-width:959px)"  href="css/tabl_normale.css"/>
<link rel="stylesheet" media="only screen and (min-width:960px) and (max-width:1079px)" href="css/normaux.css"/>
<link rel="stylesheet" media="only screen and (min-width:1080px)"                       href="css/styles.css"/>
<meta name="viewport"  content="width=device-width"/>
<script src="scr/jquery.js"></script>
<script src="scr/jquery.validate.js"></script>

<script>

    $(document).ready(function()
		 {
			 $(".tem").click(function()
			 {
				 $(".pop-tem").css('position', 'relative')
				 $(".pop-tem").css('top', '0')
				 $(".pop-tem").css('left', '0')
			 });
			 
			 $(".close").click(function()
			 {
				$(".pop-tem").css('position', 'absolute')
				 $(".pop-tem").css('top', '-9999px')
				 $(".pop-tem").css('left', '-9999px')
			 });
		 });  

// script pour le formulaire de pc 

$(document).ready(function()
		 {
			 $(".tem").click(function()
			 {
				 $(".pop-tem-pc").fadeIn('slow')
			 });
			 
			 $(".close-pc").click(function()
			 {
				 $(".pop-tem-pc").fadeOut('slow')
			 });
		 }); 


$().ready(function() {
	$("#signupForm-pc").validate({
		rules: {
			pseudo: {required: true},
			profession: {required: true},
			note: {number: true, max: 10},
			recommander:{maxlength: 3, minlength: 3},
			message: {required: true},
		},
		messages: {
			pseudo:{
			       required: "Nom et prénom",
				   accept: 'Nom et prénom ne doivent pas être un chiffre'
			},
			profession: "profession",
			note: {
				number: 'entrer un chiffre',
				max: "Une note de 1 à 10"
				
			},
			
			recommander: {
				minlength: 'Entrez oui ou non',
				maxlength: 'Entrez oui ou non',
				
			},
			message: {
				required: "Votre message"
			}
			
			
		}
	});
});  		 
		 
		 
// commentaires
$().ready(function() {
	$("#signupForm").validate({
		rules: {
			pseudo: {required: true},
			profession: {required: true},
			note: {number: true, max: 10},
			recommander:{maxlength: 3, minlength: 3},
			message: {required: true},
		},
		messages: {
			pseudo:{
			       required: "Nom et prénom",
				   accept: 'Nom et prénom ne doivent pas être un chiffre'
			},
			profession: "profession",
			note: {
				number: 'entrer un chiffre',
				max: "Une note de 1 à 10"
				
			},
			
			recommander: {
				minlength: 'Entrez oui ou non',
				maxlength: 'Entrez oui ou non',
				
			},
			message: {
				required: "Votre message"
			}
			
			
		}
	});
});
</script>
</head>
<body>
<?php include('pages/reseaux.php');?>
<div id="content">
<?php include('pages/header.php');?>

<div class="temoignages">
	
	<div class="facture20">
	
	<div id="gauche"></div><h1>témoignages</h1> <div id="droit"></div>
	 <?php 
	
	if(isset($error))
	{
		echo '<br/>';
		echo '<div class="attention">'.$error.'</div>';
	}
	if(isset($success))
	{	
        echo '<br/>';
		echo '<div class="success">'.$success.'</div>';
	}
	?>
		 
		 
	  <div class="service20">
		 
		      <div class="comm">
			  <h2>NOS CLIENTS TÉMOIGNENT</h2>
			  <?php
$reqinfo = $bdd->prepare("SELECT * FROM commentaires LIMIT 0, 10");
$reqinfo->execute(array());
while($result = $reqinfo->fetch())
{
?>
<div class="profil">
                <img src="avatar/defaut.png" alt="profil" title="Profil" height="30" width="30" id="avatar"/>
				<p id="pseudo"><?php echo $result['pseudo'];?></p>
				<p id="date"><?php echo $result['date'];?></p>
				<br/><br/>
		        <p><?php echo $result['message'];?></p><br/>
				<?php 
				 if($result['recommander'] != '')
				{
				?>
				<p class="recomm">Recommanderiez-vous : <?php echo $result['recommander'];?></p>
				<?php
				}
				?>
				<?php 
				 if($result['note'] != '')
				{
				?>
				      <p class="not">Note : <?php echo $result['note'];?>/10</p>
				<?php
				}
				?>
</div>

<?php
}
$reqinfo->closecursor();
?>
<div class="pagination">
  <a href="#">&laquo;</a>
  <a class="active" href="index.php?page=temoignages">1</a>
  <a href="index.php?page=temoignages2">2</a>
  <a href="index.php?page=temoignages3">3</a>
  <a href="index.php?page=temoignages4">4</a>
  <a href="index.php?page=temoignages5">5</a>
  <a href="index.php?page=temoignages6">6</a>
  <a href="index.php?page=temoignages7">7</a>
  <a href="index.php?page=temoignages8">8</a>
  <a href="index.php?page=temoignages9">9</a>
  <a href="index.php?page=temoignages10">10</a>
  <a href="#">&raquo;</a>
</div>

		      </div>
			  
			  
			  
		      <div class='comm1'>
		        <p>Vous êtes un client ? Vous avez utilisé nos services ? <br/><br/>
		           Laissez un témoignage sur notre site.</p><br/>
		        <p>Vous êtes nouveau ? Créer un compte.<br/><a href='index.php?page=inscription'>CREER UN COMPTE</a></p>
				  <button class='tem'>Témoigner</button>
		     
			  
			  
			  <div class="pop-tem">
			  
			  <div class="form-isser">
			      <span class="close">&times;</span>
				  
				   <div class="top_input">
				   
			     <form method="post" action=""  class="cmxform" id="signupForm">
				       <label class="obl">Nom et prénom </label>
				      <input type="text" id="prenom" name="pseudo" class="input" placeholder="Votre nom et prénom ⃰" value="<?php if(isset($pseudo))echo $pseudo;?>"/><br/>
					  
					  <label class="obl">Profession </label>
					  <input type="text" id="profession" name="profession"  class="input" placeholder="Votre profession ⃰"  value="<?php if(isset($profession))echo $profession;?>"/><br/>
					  
					  <label class="obl">Note sur 10 </label>
					  <input type="text" name="note" id="note" class="input" placeholder="Ex : 8/10" value="<?php if(isset($note))echo $note;?>"/><br/>
					  
					  <label class="obl">Recommandation </label>
					  <input type="text" name="recommander" class="input" id="recommander" placeholder="Ex : Oui" value="<?php if(isset($recommander))echo $recommander;?>"/><br/>
					  
					  <label class="obl">Avis </label>
					  <textarea name="message" id="message"  placeholder="Saisir un message" value="<?php isset($message)? $message:'';?>"></textarea>
					  
					  <input type="submit" name="submit" class="sendComment" value="ENVOYER"/>
				 </form>
				 </div>
		        </div>
			  </div>
			  
			  
			  
		</div>
		
		<!--  formulaire de commentaire pour le pc-->
		
		<div class="pop-tem-pc">
			  
			  <div class="form-isser">
			      <span class="close-pc">&times;</span>
				  
				   <div class="top_input">
				   
			     <form method="post" action=""  class="cmxform" id="signupForm-pc">
				       <label class="obl">Nom et prénom </label>
				      <input type="text" id="prenom" name="pseudo" class="input" placeholder="Votre nom et prénom ⃰" value="<?php if(isset($pseudo))echo $pseudo;?>"/><br/>
					  
					  <label class="obl">Profession </label>
					  <input type="text" id="profession" name="profession"  class="input" placeholder="Votre profession ⃰"  value="<?php if(isset($profession))echo $profession;?>"/><br/>
					  
					  <label class="obl">Note sur 10 </label>
					  <input type="text" name="note" id="note" class="input" placeholder="Ex : 8/10" value="<?php if(isset($note))echo $note;?>"/><br/>
					  
					  <label class="obl">Recommandation </label>
					  <input type="text" name="recommander" class="input" id="recommander" placeholder="Ex : Oui" value="<?php if(isset($recommander))echo $recommander;?>"/><br/>
					  
					  <label class="obl">Avis </label>
					  <textarea name="message" id="message"  placeholder="Saisir un message" value="<?php isset($message)? $message:'';?>"></textarea>
					  
					  <input type="submit" name="submit" class="sendComment" value="ENVOYER"/>
				 </form>
				 </div>
		        </div>
			  </div>
			  
			  
			  
			  
		 
		 </div>
		 
		 
	</div>
		 
		
		 
	</div>
	<?php include('pages/footerbook.php');?>
</div>
<?php include('pages/footer.php');?>
<?php include('pages/footermobile.php');?>
<script>
    
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}







/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function my1Function() {
    document.getElementById("my1Dropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn1')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList('show');
      }
    }
  }
}





/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function my2Function() {
    document.getElementById("my2Dropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn2')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList('show');
      }
    }
  }
}

</script>


<script>
   var btn = document.querySelector('.togget');
   var nav = document.querySelector('.navm');

btn.onclick = function()
{
	nav.classList.toggle('nav_open');
}
</script>

</body>
</html>