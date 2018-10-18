<?php
$id_comm = htmlspecialchars($_GET['id_comm']);
DETELE_COMMANDE($id_comm);
header('Location:index.php?page=traitement');
?>