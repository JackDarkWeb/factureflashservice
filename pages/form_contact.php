<?php 
if(isset($_POST['submit']))
{
	$error ="ok";
}
?>
	
<!DOCTYPE html>
<html>
<head>
<style>





.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}


#myDropdown
{
	margin-top:5px;
}

#my1Dropdown
{
	margin-top:10px;
}

#my2Dropdown
{
	margin-top:10px;
}
</style>
</head>
<body>

<div class="dropdown">
<h3 onclick="myFunction()" class="dropbtn">VOTRE DEMANDE CONCERNE UNE COMMANDE.</h3>
  <div id="myDropdown" class="dropdown-content">
    <a href="">Accédez à vos commande</a>
  </div>
</div>
<br/>

<div class="dropdown">
<h3 onclick="my1Function()" class="dropbtn1">VOUS SOUHAITEZ CONNAÎTRE, MODIFIER OU EFFACER LES DONNÉES VOUS CONCERNANT.</h3>
  <div id="my1Dropdown" class="dropdown-content">
    <form method="post" action="">
	    <input type="text" name="email" placeholder="Indiquez votre e-mail"/>
	</form>
  </div>
  
  <br/>
  
  <div class="dropdown">

  <div id="my4Dropdown" class="dropdown-content">
    <?php if(isset($error)) echo $error;?>
  </div>
  
</div>
  
  <br/>
  <div class="dropdown">
<h3 onclick="my4Function()" class="dropbtn4">VOUS  <span class="color">FACTURE</span> FLASH Service</h3>
  <div id="my4Dropdown" class="dropdown-content">
    <form method="post" action="">
	    <input type="submit" name="submit" value="envoyer" onclick="my4Function()" class="dropbtn4"/>
	</form>
  </div>
  
  
</div>

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
function my4Function() {
    document.getElementById("my4Dropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn4')) {

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

</body>
</html>
