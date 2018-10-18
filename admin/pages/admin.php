
<?php
if(isset($_SESSION['email']))
{
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>
<link rel="shortcut icon" href="images/logo.png"/>
<link rel="stylesheet" media="only screen and (min-width:320px) and (max-width:959px)"  href="css/mobile.css"/>
<link rel="stylesheet" media="only screen and (min-width:960px)"                        href="css/normales.css"/>
<meta name="viewport"  content="width=device-width"/>
<script src="scr/autocomplete.js"></script>
<script src="scr/index.js"></script>
</head>
<body>
<div id="contener">
<?php include('pages/header.php');?>
  
  
  
  <div id="infos">
<p>
Telephone est une chanson sortie en 2010, enregistrée et écrite par la chanteuse américaine Lady Gaga, issue de son second album The Fame Monster avec la participation de Beyoncé Knowles. Gaga écrit initialement la chanson pour Britney Spears, toutefois, cette dernière refuse finalement d’ajouter le morceau sur son album Circus. Gaga récupère alors la chanson pour son album, invitant Beyoncé Knowles en tant que collaboratrice vocale à la suite de sa propre invitation sur le titre Video Phone de Beyoncé. Le sujet d'inspiration de cette chanson est la peur de suffocation de Gaga, d’être si oppressée par le travail au point de ne plus avoir de temps libre. Gaga explique que dans la chanson, l’interlocutrice du téléphone lui dit de travailler encore plus dur. Musicalement, Telephone est d’un style très diversifié, abordant un genre pop, électronique et dance. La chanson contient également quelques lignes R&B chantées par Beyoncé.

Telephone est apprécié par la critique contemporaine, celle-ci décrivant ce single comme une chanson très entrainante. Le morceau se classe dans les hit-parades de plusieurs pays, principalement en raison des ventes numériques lors de la sortie de The Fame Monster et, par la suite, des ventes physiques, atteignant ainsi de bonnes positions dans les classements en Australie, au Canada, aux États-Unis, en Hongrie, en Nouvelle-Zélande, aux Pays-Bas, en Suède et même la première place en Belgique, au Danemark, en Norvège et au Royaume-Uni. La chanson est interprétée pour la première fois en direct et en version acoustique lors des Brit Awards 2010, le 16 février 2010. La performance est un medley avec Dance in the Dark interprété en hommage au défunt styliste Alexander McQueen. Telephone est également ajoutée au Monster Ball européen, n’étant pas présente dans la partie américaine de la tournée.

Gaga explique que le vidéoclip de cette chanson est une continuation de celui de Paparazzi, et qu’il est aussi présenté comme un court métrage. Il présente Gaga dans une prison de laquelle Beyoncé l’aide à se libérer afin de se venger de son petit copain. Il rend un hommage à la carrière du cinéaste Quentin Tarantino. Le clip est accueilli de manière très mitigée par la critique.
</p>
<p>
Telephone est une chanson sortie en 2010, enregistrée et écrite par la chanteuse américaine Lady Gaga, issue de son second album The Fame Monster avec la participation de Beyoncé Knowles. Gaga écrit initialement la chanson pour Britney Spears, toutefois, cette dernière refuse finalement d’ajouter le morceau sur son album Circus. Gaga récupère alors la chanson pour son album, invitant Beyoncé Knowles en tant que collaboratrice vocale à la suite de sa propre invitation sur le titre Video Phone de Beyoncé. Le sujet d'inspiration de cette chanson est la peur de suffocation de Gaga, d’être si oppressée par le travail au point de ne plus avoir de temps libre. Gaga explique que dans la chanson, l’interlocutrice du téléphone lui dit de travailler encore plus dur. Musicalement, Telephone est d’un style très diversifié, abordant un genre pop, électronique et dance. La chanson contient également quelques lignes R&B chantées par Beyoncé.

Telephone est apprécié par la critique contemporaine, celle-ci décrivant ce single comme une chanson très entrainante. Le morceau se classe dans les hit-parades de plusieurs pays, principalement en raison des ventes numériques lors de la sortie de The Fame Monster et, par la suite, des ventes physiques, atteignant ainsi de bonnes positions dans les classements en Australie, au Canada, aux États-Unis, en Hongrie, en Nouvelle-Zélande, aux Pays-Bas, en Suède et même la première place en Belgique, au Danemark, en Norvège et au Royaume-Uni. La chanson est interprétée pour la première fois en direct et en version acoustique lors des Brit Awards 2010, le 16 février 2010. La performance est un medley avec Dance in the Dark interprété en hommage au défunt styliste Alexander McQueen. Telephone est également ajoutée au Monster Ball européen, n’étant pas présente dans la partie américaine de la tournée.

Gaga explique que le vidéoclip de cette chanson est une continuation de celui de Paparazzi, et qu’il est aussi présenté comme un court métrage. Il présente Gaga dans une prison de laquelle Beyoncé l’aide à se libérer afin de se venger de son petit copain. Il rend un hommage à la carrière du cinéaste Quentin Tarantino. Le clip est accueilli de manière très mitigée par la critique.
</p>


</div>




<?php include('pages/foot.php');?>
</div>
</body>
</html>
<?php
 }
else
{
	 header('Location:index.php?pages=login_admin');
}
?>