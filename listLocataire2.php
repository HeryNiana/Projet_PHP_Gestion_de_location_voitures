<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Effetctif et montant</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container" style="background-color: #D2CAEC;border-radius: 10px;">
 	<p style="text-align: center;font-size: 15px; color: red">Effectif et montant total  des locations par voiture </h4>
 	<h4 style="text-decoration: underline;">Entre:<?php echo"  ". $_POST['date21']."  et  "."  ".$_POST['date22']; 
 	?>	
 	</h4>
 	<div class="table-responsive">
 		<br>
 		<table class="table-bordered">
 			 <tr>
		         <th font-size="20px" align="center">Designation voiture</th>
		         <th font-size="20px" align="center">Nombre de location</th>
		         <th font-size="20px" align="center">Total</th>
		     </tr>
 	<?php
 //inclusion de la fonction qui permet de se connecter à la base de données
include('connection.php');
	if (isset($_POST['Effectif'])) 
	{
		$date1=$_POST['date21'];
		$date2=$_POST['date22'];
$requete=$bdd->query("select voiture.designation, count(location.numvoiture)as effectif,sum(montant)as total from location,voiture where
 (location.numvoiture=voiture.numero) and (location.dateDepart between'$date1' and '$date2') group by location.numvoiture asc");
	while($list=$requete->fetch())
		{
			echo "<tr>
    				<td style='width:160px;text-align:center;font-size20px'>".$list['designation']."</td>
    				<td style='width:160px;text-align:center;font-size20px'>".$list['effectif']."</td>
    				<td style='width:160px;text-align:center;font-size20px'>".$list['total']."</td>
    				</tr>";
		}
		$requete->closeCursor();

	}
?>
</table>
 </div>
 <form method="post" action="versionPDF2.php">
 	<button class="btn btn-success" name="edit">Editer la version PDF</button>
 	<button class="btn btn-danger" name="Retour">Retour à la page précedente</button>
 </form>
</body>
</html>