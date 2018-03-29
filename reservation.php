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
if ($date == NULL){$date=date('Y-m-d');}

echo '<p>vous desirez reserver le '.$date.' de '.$heure .'?</p>'
;echo'<br>';
echo '';
?>
<!DOCTYPE html>
<html>
<head>
	<title>confirmation</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div class="form-group col-lg-3 ">
<form action="resaMembre.php" method="POST" class="">
	
    <div class="input-group">
		<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	<input type="texte" name="nom" class="form-control">
	</div>
			<br>		<div class="input-group">
				<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
					<input type="texte" name="prenom" class="form-control">
					
					</div>
					<br>
					<input type="submit" name="confirmez" class="btn btn-success">
					<a href="index.php" class="btn btn-success">Annuler</a>
</form>

<br>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="KUJP6WTPNMXAW">
<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110306-1/fr_FR/FR/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
<img alt="" border="0" src="https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif" width="1" height="1">

</form>
</div>
</body>
</html>
