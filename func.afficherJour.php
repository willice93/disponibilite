<?php
function AfficherJour($tab,$salle){
	if (isset($salle)==false) {
		$salle=0;
		
	}
	//fonction qui prend un tableau et renvoi les valeur des seance en tableau de chiffres
	//si le tableau existe
	if (isset($tab)==true) {
		//compter la taille du tableau
		$j=count($tab);
	}
	//sinon initialise le tableau et la variable j de la taille 
	else{$tab[0]=0;$j=0;}

//pour i allant de 1a7

	if(isset($_POST['jour'])){
	$date=$_POST['jour'];}

	else {$date=date('Y-m-d');}
for ($i=1; $i <7 ; $i++) {
//ecrire
            $seance[$i]='<div class="centrer"><div><a href="reservation.php?seance='.$i.'&jour='.$date.'&salle='.$salle.'"><img class="taille" src="val.png"></div><div><span class="vert"><ul>séance'.$i.'</ul></div></a></div>';
           for ($r=0; $r <$j ; $r++) { 
// r allant jusqua la taille du tableau s
                if ($i==$tab[$r]) {
                	$seance[$i]='<div class="centrer"><div><img class="taille" src="croix.png"></div><div><span class="rouge"><ul>séance'.$i.'</ul></div></div>';
                }           	
           } 
           	
           } 
echo $seance[1];
echo $seance[2];
echo $seance[3];
echo $seance[4];
echo $seance[5];
echo $seance[6];  }
?>