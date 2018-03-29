<?php

$horaires[1]='8h à 10h';
$horaires[2]='10h30 à 12h30';
$horaires[3]='13h à 15h';
$horaires[4]='15h30 à 17h30';
$horaires[5]='18h00 à 20h00';
$horaires[6]='20h30 22h30';

$date=$_GET['jour'];
$numseance=$_GET['seance'];
$heure=$horaires[$numseance];


echo 'vous desirez reserver le '.$date.' de '.$heure .'?'
;echo'<br>';
echo 'vous devez vous inscrire';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="resaMembre.php" method="POST">
	
	  <input type="radio" name="x" value="oui"  ><label>oui</label> 
  <input type="radio" name="y" value="non" ><label>non</label><br>
	<input type="texte" name="nom"><label>nom</label></br>
	<input type="texte" name="prenom"><label>prenom</label></br>
	<input type="submit" name="confirmez">
</form>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="KUJP6WTPNMXAW">
<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/fr_FR/FR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
</form>

</body>
</html>
