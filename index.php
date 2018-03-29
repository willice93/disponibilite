<?php include ('connexion.php');
include('func.verifieDispo.php');
include('func.afficherJour.php');?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css"
	<title></title>
</head>
<body>
	<div class="container">
            <div class="row">
            <div id="envoyer" class="col-lg-6">
	   <form action="disponible.php" method="POST" class="form-group col-lg-2" >
	<div class="input-group">
	<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
	<input type="date" name="jour" class="form-control col-lg-2">
	</div>	
<br>
<input type="submit" name="validez" class="btn btn-success">
	</form>
	        </div>
	        </div>
	<?php $today=date('Y-m-d');?>

	<div class="row">
	<div class="col-lg-6">
		<?php echo $today;?>
<table class="table table-bordered table-striped table-condensed">
	<thead>
		<tr class="success">
	    <th>Bora Bora</th>
		<th>Miami</th>
		<th>Phuket</th>
		</tr>
	</thead>
	<tbody>
  <tr class="succes">
    <th class="tg-yw4l"><?php $dispo=verifieDispo($today,1);$jour=afficherJour($dispo,1);echo $jour; ?> </th>
    <th class="tg-yw4l"><?php $dispo=verifieDispo($today,2);$jour=afficherJour($dispo,2); echo $jour; ?></th>
    <th class="tg-yw4l"><?php $dispo=verifieDispo($today,3);$jour=afficherJour($dispo,3); echo $jour; ?></th>
  </tr>
  </tbody>
</table>
</div>
</div>
</div>
</body>
</html>