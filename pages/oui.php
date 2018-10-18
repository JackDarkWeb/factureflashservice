<?php
$bdd = new PDO('mysql:host=localhost; dbname=ffs; charset=utf8', 'root', '');
function produits()
{
	 $commandes = array();
	 $id_client = 1;
     $bdd = new PDO('mysql:host=localhost; dbname=ffs; charset=utf8', 'root', '');
     $req = $bdd->prepare("SELECT * FROM commandes WHERE id_client = ?");
     $req->execute(array($id_client));
	 while($result = $req->fetch())
	 {
		 $commandes[] = $result;
	 }
	         return $commandes;
}

function supp()
{
	 $errors = array();
	 $bdd = new PDO('mysql:host=localhost; dbname=ffs; charset=utf8', 'root', '');
	 $a = htmlspecialchars($_POST['id_client']);
	 $b = htmlspecialchars($_POST['id_comm']);
	 
		 if(!empty($a)and !empty($b))
		 {
			 $deletecommande = $bdd->prepare('DELETE FROM commandes WHERE id_comm = \'' .$_POST['id_comm']. '\' and id_client = \'' .$_POST['id_client']. '\'');
	          $deletecommande->execute(array($b, $a));
			  $errors[] = 'Supprimer !';
		 }else
	 {
		 $errors[] = 'Tous les champs doivent etre remplis';
	 }
	 
	 return $errors;
}
if(isset($_POST['submit']))
{
     supp();
}
	 
echo '<br/><br/>';

$commandes = produits();
     foreach($commandes as $commande)
	 {
	 ?>
	  <form method="post" action="">
	      <?= $commande['num_police'].'<br/>';?>
		  <div class="sup">
		  <input type="text" name="id_client" value="<?= $commande['id_client'];?>"/><br/>
		  <input type="text" name="id_comm" value="<?= $commande['id_comm'];?>"/><br/>
		  </div>
		  <input type="submit" name="submit" value="Supprimer"/><br/><br/><br/>
	  </form>
	 <?php
	 }



echo '<br/><br/><br/>';

function message_client()
{
	 $messages = array();
	 $bdd = new PDO('mysql:host=localhost;dbname=ffs;charset=utf8','root','');
	   //$bdd = new PDO ('mysql:host=localhost;dbname=id2084383_ffs;charset=utf8','id2084383_jacknouatin','97098482jn');
	   //$bdd = new PDO ('mysql:host=mysql.hostinger.fr;dbname=u974008334_ffs;charset=utf8','u974008334_ffs','97098482ffs');
	 $reqmessage = $bdd->prepare("SELECT * FROM amis
	                               INNER JOIN conversations_messages ON ((conversations_messages.id_client = '1' and conversations_messages.pseudo_exp = '6')
	                               or (conversations_messages.pseudo_exp = '1' and conversations_messages.id_client = '1'))
								   WHERE id_clien = '1' and id_admin = '6'
								   
								  ");
								  
	 $reqmessage->execute(array());
	 
	 while($messageinfo = $reqmessage->fetch())
	   {
		     $messages[] = $messageinfo;
	   }
	  return $messages;
	
	 
}

$messages = message_client();
   foreach($messages as $message)
   {
	   echo $message['corps_message'].'<br/>';
	   echo $message['recus_message'].'<br/>';
   }



   
   
   
   
   
   // la function qui va compter nmbres de  messages recus


	function nbre_inscrite()
{
	$id =6;
	$id_client = 1;
$bdd = new PDO('mysql:host=localhost;dbname=ffs','root','');
$result = $bdd->prepare('SELECT COUNT(*) AS nb FROM amis 
                      INNER JOIN conversations_messages ON conversations_messages.pseudo_exp = "$id"
                        and conversations_messages.id_client = "$id_client" ');
$result->execute(array());
$columns = $result->fetch();
$nb = $columns['nb'];
return $nb;
}

$n = nbre_inscrite();

echo $n.'<br/>';



// la function qui va envoyer si le message est vu ou non

function message_vu()
{
	
	 $pseudo_exp = 2;
	 $id_client = '2';
	 $lu = 0;
	 $bdd = new PDO('mysql:host=localhost;dbname=ffs','root','');
	  $requser = $bdd->prepare("SELECT * FROM conversations_messages WHERE id_client = ? and pseudo_exp = ? and lu = ? ");
		   $requser->execute(array($id_client, $pseudo_exp, $lu));
		   $userexiste = $requser->rowCount();
		   return $userexiste;
}
		   var_dump(message_vu());
		   
		   
		   
	?>	
	<style>
	 .sup
	 {
		  display:none;
	 }
	</style>