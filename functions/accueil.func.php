<?php
function nombre_visiteur()
{
	 $bdd = new PDO('mysql:host=localhost; dbname=ffs; charset=utf8', 'root', '');
     $ip = $_SERVER['REMOTE_ADDR'];
	 $instant = time();
     $dure_visite =  $instant - 86400 ;
    
    $query = $bdd->prepare('SELECT * FROM visiteurs WHERE ip = ? ');
    $query->execute(array($ip));
    if($row = $query->rowCount() == 0)
    {
	   $query = $bdd->prepare('INSERT INTO visiteurs(ip, date) VALUES(?, ?)');
	   $query->execute(array($ip, $instant));
    }else
	{
		$update = $bdd->prepare('UPDATE visiteurs SET date = ? WHERE ip = ?');
		$update->execute(array($instant, $ip));
	}
	
	$del_ip = $bdd->prepare('DELETE FROM visiteurs WHERE date < ? ');
	$del_ip->execute(array($dure_visite));
}

?>