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


echo 'vous desirez reserver le '.$date.' de '.$heure .'?';


?>