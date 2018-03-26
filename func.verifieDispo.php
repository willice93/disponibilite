<?php

function verifieDispo($jour,$salle){

include ('connexion.php');

if ($salle==1) {
	$resultat = mysqli_query($bdd, 'SELECT * FROM reservation INNER JOIN dateresa ON reservation.iddate=dateresa.iddate INNER JOIN usager ON reservation.idusage=usager.idusage WHERE idsalle=1 AND jour="'.$jour.'"'); 

}
elseif ($salle==2) {
	$resultat = mysqli_query($bdd, 'SELECT * FROM reservation INNER JOIN dateresa ON reservation.iddate=dateresa.iddate INNER JOIN usager ON reservation.idusage=usager.idusage WHERE idsalle=2 AND jour="'.$jour.'"');
}
else { $resultat = mysqli_query($bdd, 'SELECT * FROM reservation INNER JOIN dateresa ON reservation.iddate=dateresa.iddate INNER JOIN usager ON reservation.idusage=usager.idusage WHERE idsalle=3 AND jour="'.$jour.'"');}
$i=0;
while ($row = mysqli_fetch_row($resultat)) {
      $tab[$i]=$row[2];
        $i++;
        }
mysqli_free_result($resultat);
$tab2[0]=0;
if(isset($tab)==true)
return $tab;
else{$tab2;}


}
?>

