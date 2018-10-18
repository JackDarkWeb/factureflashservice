<?php
function nouveau_message()
{
	if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
	{
	     $id_client = htmlspecialchars($_SESSION['id_client']);
	     $id = '6';
	     $lu = 0;
	     $bdd = new PDO('mysql:host=localhost;dbname=ffs','root','');
	     $reqmessage = $bdd->prepare("SELECT * FROM conversations_messages WHERE id_client = ? and pseudo_exp = ? and lu = ? ");
		   $reqmessage->execute(array($id_client, $id, $lu));
		   $nouvo_message = $reqmessage->rowCount();
		   return $nouvo_message;
	}
}

//La function qui va retourner nombres de commandes en cours 
function commande_non_paye()
{
	if(isset($_SESSION['email']) or isset($_SESSION['id_client']) or isset($_SESSION['phone']))
	{
	     $id_client = htmlspecialchars($_SESSION['id_client']);
	     $confirme = 'EN COURS';
	     $bdd = new PDO('mysql:host=localhost;dbname=ffs','root','');
	     $reqcommande = $bdd->prepare("SELECT * FROM payer WHERE id_client = ? and confirme = ? ");
		   $reqcommande->execute(array($id_client, $confirme));
		   $commandeexiste = $reqcommande->rowCount();
		   return $commandeexiste;
	}
}

$adm = '6';
?>
<div id="menu">
                 <img src="images/logo.png" alt="logo" title="facture flash sercive" id="logo"/>
                 <h3><span>FACTURE</span> FLASH Service</h3>
         <div class="menus_togget">
		     <div class="barre"></div>			 
		     <div class="barre"></div>			 
		     <div class="barre"></div>			 			 
         </div>
		 <?php if(nouveau_message()>1) echo '<div class="n">'."<span>".'Vous avez '.nouveau_message().' nouveaux messages'."</span>".'</div>'; elseif(nouveau_message()==1)
                   			 echo '<div class="n">'."<span>".'Vous avez un nouveau message'."</span>".'</div>'; ?>
         <div class="menues menus">
		    <p><a href="index.php?page=profil"><img src="avatar/defaut.png" height="100" width="100" title="Profil" id="photo"alt="avatar"/>
			<span class="client"><?php echo $_SESSION['prenom'].'   '.($_SESSION['nom']); ?></span></a></p>
		    <ul>
	          <li><a href="index.php?page=ajout_compteur">Inscrire un compteur</a></li>
              <li><a href="index.php?page=mes_compteurs">Mes compteurs</a></li>
              <li><a href="index.php?page=vos_commandes"><?php echo commande_non_paye()>=1? "<span class='m'>".commande_non_paye()."</span>".' '.'commande(s)':'Commande';?></a></li>
	         <li><a href="index.php?page=messages&admin='<?php echo $adm;?>'"><?php echo nouveau_message()>=1? "<span class='m'>".nouveau_message()."</span>".' '.'message(s)':'Message';?></a></li>
	          <li><a href="index.php?page=payer_facture">Payer facture</a></li>
	          <li><a href="index.php?page=logout">Déconnexion</a></li>
			</ul>
			<p><a href="index.php?page=profil"><img src="avatar/defaut.png" height="100" width="100" title="Profil" id="photo"alt="avatar"/>
			<span class="client"><?php echo $_SESSION['prenom'].'   '.($_SESSION['nom']); ?></span></a></p>
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