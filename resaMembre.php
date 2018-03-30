<?php
//$iddate, $jour, $idusage, $nom, $prenom
// include du fichier de connexion à SQL.
include ('connexion.php');

$numseance = $_POST['seance'];
$idsalle = $_POST['salle'];
$jour =$_POST['jour'];
$nom = $_POST['nom'];
$mail = $_POST['email'];
$iddate = NULL;
$idusage = NULL;
$etat = 1;




// verifie si la date existe deja dans la bdd
$resultat = mysqli_query($bdd, 'SELECT * FROM dateresa');

$i=0;
while($row= mysqli_fetch_row($resultat))
{


	$jourtab[$i]=$row[1];
	$iddatetab[$i] = $row[0];

	$i++;


}
mysqli_free_result($resultat);

$fin=count($jourtab);
for ($j=0; $j < $fin; $j++) {
	if ($jourtab[$j] == $jour) {

		$verif=true;
	}
	else {

$verif=false;

	}

}


					// Si la date exite pas creer la

if ($verif == false) {
		$req_date = mysqli_prepare($bdd, 'INSERT INTO dateresa(jour) VALUES (?)');
					mysqli_stmt_bind_param($req_date, "s", $jour) ;
					mysqli_stmt_execute($req_date);

		$resultat = mysqli_query($bdd, 'SELECT iddate FROM dateresa WHERE jour = "'.$jour.'"');
while($donnees = mysqli_fetch_assoc($resultat))
	{

		$iddate = $donnees['iddate'];
	}
	mysqli_free_result($resultat);




}

		else { 				// la date exite, on recupere son iddate.
			$resultat = mysqli_query($bdd, 'SELECT iddate FROM dateresa WHERE jour = "'.$jour.'"');
			while($donnees = mysqli_fetch_assoc($resultat))
		{

			$iddate = $donnees['iddate'];
		}
		mysqli_free_result($resultat);

}




//------------------------------------------------------------------------------------------------------------------------

	$resultat2 = mysqli_query($bdd, 'SELECT * FROM usager');

$x=0;
while($row= mysqli_fetch_row($resultat2))
{


	$mailtab[$x]=$row[2];
	$idusagetab[$x] = $row[0];

	$x++;

}
mysqli_free_result($resultat2);

$fin_user=count($mailtab);
for ($z=0; $z < $fin_user; $z++) {
	if ($mailtab[$z] == $mail) {

		$verif_user=true;
	}
	else {

$verif_user=false;

	}

}


					// Si la date exite pas creer la

if ($verif_user == false) {
		$req_user = mysqli_prepare($bdd, 'INSERT INTO usager(nom, mail) VALUES (?,?)');
					mysqli_stmt_bind_param($req_user, "ss", $nom, $mail) ;
					mysqli_stmt_execute($req_user);

		$resultat3 = mysqli_query($bdd, 'SELECT idusage FROM usager WHERE mail = "'.$mail.'"');
while($donnees = mysqli_fetch_assoc($resultat3))
	{

		$idusage = $donnees['idusage'];
	}
	mysqli_free_result($resultat3);

			echo 'Bienvenue '. $nom . ' votre compte a bien été creer ' . $mail;


}

		else { 				// la date exite, on recupere son iddate.
			$resultat3 = mysqli_query($bdd, 'SELECT idusage FROM usager WHERE mail = "'.$mail.'"');
			while($donnees = mysqli_fetch_assoc($resultat3))
		{

			
			$idusage = $donnees['idusage'];

		}
		mysqli_free_result($resultat3);
echo 'Bonjour <b>'. $nom .'</b> content de vous revoir' ;
}


//------------------------------------------------------------------------------------------------------------------------




/*quelques lignes de code qui vont nous permettre que reservation ne doit inséré qu'une fois et pas plus !
à optimiser avec la fonction "verifieDispo()" */

$resultat5 = mysqli_query($bdd, 'SELECT * FROM reservation INNER JOIN dateresa ON reservation.iddate=dateresa.iddate INNER JOIN usager ON reservation.idusage=usager.idusage');
	while($donnees = mysqli_fetch_assoc($resultat5)) {
		if ($jour == $donnees['jour'] AND $numseance == $donnees['numseance'] AND $mail = $donnees['mail']) {
			$existe = true;
		} else {
			$existe = false;
		}
	}

if ($existe == false) {
	$req_resa = mysqli_prepare($bdd, 'INSERT INTO reservation (idreservation, etat, numseance, iddate, idusage, idsalle) VALUES (?,?,?,?,?,?)');
	mysqli_stmt_bind_param($req_resa, "iiiiii", $idreservation, $etat, $numseance, $iddate, $idusage, $idsalle) ;
	mysqli_stmt_execute($req_resa);
	echo "<br>La réservation pour le<b> $jour </b>pour la<b> $numseance</b> ème séance à bien été prise en compte. <br>
	Vous allez recevoir un mail de confirmation à l'adresse suivante :<b> $mail";
} else {
echo '<br> Votre reservation à déja été prise en compte';
}



?>
