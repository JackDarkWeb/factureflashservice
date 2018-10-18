<?php
function nouveau_message($bdd)
{
	if(isset($_SESSION['email']))
	{
	     
	     $id = '6';
	     $lu = 0;
	     
	     $reqmessage = $bdd->prepare("SELECT * FROM conversations_messages WHERE  pseudo_exp != ? and lu = ? ");
		   $reqmessage->execute(array($id, $lu));
		   $nouvo_message = $reqmessage->rowCount();
		   return $nouvo_message;
	}
}


function visiteur($bdd)
{
	
	$query = $bdd->query('SELECT * FROM visiteurs');
	$row = $query->rowCount();
	return $row;
}

?>
<div id="menu">
                 <img src="images/logo.png" alt="logo" title="facture flash sercive" id="logo"/>
                 <h3><span>FACTURE</span> FLASH Service</h3>
         <div class="menus_togget">
		     <div class="barre"></div>			 
		     <div class="barre"></div>			 
		     <div class="barre"></div>			 			 
         </div>
		 <?php if(nouveau_message($bdd)>1) echo '<div class="n">'."<span>".'Vous avez '.nouveau_message($bdd).' nouveaux messages'."</span>".'</div>'; elseif(nouveau_message($bdd)==1)
                   			 echo '<div class="n">'."<span>".'Vous avez un nouveau message'."</span>".'</div>'; ?>
         <div class="menues menus">
		    <p><a href=""><img src="avatar/defaut.png" height="100" width="100" title="Profil" id="photo"alt="avatar"/>
			<span class="client"><?php echo $_SESSION['prenom']; ?></span></a></p>
		    <ul>
	          <li><a href="index.php?page=nos_clients">Nos clients</a></li>
              <li><a href="index.php?page=les_commandes">Les commandes</a></li>
              <li><a href="index.php?page=statuts">Les statuts</a></li>
	          <li><a href="index.php?page=messagerie"><?php echo nouveau_message($bdd)>=1? "<span class='m'>".nouveau_message($bdd)."</span>".' '.'message(s)':'Message';?></a></li>
	          <li><a href=""><?php echo visiteur($bdd)>=1? "<span class='m'>".visiteur($bdd)."</span>".' '.'visiteur(s)':'Visiteur';?></a></li>
	          <li><a href="index.php?page=logout">Déconnexion</a></li>
			</ul>
			<p><a href=""><img src="avatar/defaut.png" height="100" width="100" title="Profil" id="photo"alt="avatar"/>
			<span class="client"><?php echo $_SESSION['prenom']; ?></span></a></p>
		 </div>
		 
		 
		 
		 
		 
 <script>
   var btn = document.querySelector('.menus_togget');
   var nav = document.querySelector('.menus');

btn.onclick = function()
{
	nav.classList.toggle('menus_open');
}
</script>
</div>