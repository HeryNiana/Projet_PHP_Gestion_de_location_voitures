<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>edition en pdf des donnés MYSQL</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container" style="background-color: #D2CAEC;border-radius: 10px;">
 	<h4 style="text-align: center;text-decoration: underline; color: red">LISTE DES LOCATAIRE </h4>
 	<h4 style="text-decoration: underline;"> VOITURE NUMERO :<?php echo $_POST['numvoiture']."  "; ?></h4>
 	<h4 style="text-decoration: underline;">Entre:<?php echo"  ". $_POST['date1']."  et  "."  ".$_POST['date2']; ?></h4>
 	<div class="table-responsive">
 		<br>
 		<table class="table-bordered">
 			 <tr>
		     <th font-size="20px" align="center">LOCATAIRE</th>
		     <th font-size="20px" align="center">Date</th>
		     <th font-size="20px" align="center">loyer_journalier</th>
		     <th font-size="20px" align="center">Nombre du jours</th>
		     <th font-size="20px" align="center">Montant</th>
		     </tr>
<?php
//inclusion de la fonction qui permet de se connecter à la base de données
include('connection.php');
    $date1=$_POST['date1'];
    $time1=strtotime($_POST['date1']);
	$date2=$_POST['date2'];
	$time2=strtotime($_POST['date2']);
if ((isset($_POST['numvoiture'])) && ($time1 <= $time2))
 {
    $numvoiture=$_POST['numvoiture'];
	$reque=$bdd->query("select locataire.nom,location.dateDepart,voiture.loyer_journalier,location.nbjours,location.montant from location,voiture,locataire where(location.numvoiture=voiture.numero and locataire.numero=location.numcli) and(location.dateDepart between'$date1' and '$date2') and voiture.numero='$numvoiture' order by location.numlocation ");
	$row=$reque->rowCount();
	if($row >0)
	{
		session_start();
		$_SESSION['numvoiture']=$_POST['numvoiture'];
		$_SESSION['date1']=$_POST['date1'];
		$_SESSION['date2']=$date2=$_POST['date2'];
	}
	else
	{
		echo "<script> alert(' Il n'y a pas de location entre ces 2 dates')</script>";
	}
    while ($listFetch=$reque->fetch()) 
    {
    	echo "<tr>
    				<td style='width:160px;text-align:center;font-size20px'>".$listFetch['nom']."</td>
    				<td style='width:160px;text-align:center;font-size20px'>".$listFetch['dateDepart']."</td>
    				<td style='width:160px;text-align:center;font-size20px'>".$listFetch['loyer_journalier']."</td>
    				<td style='width:160px;text-align:center;font-size20px'>".$listFetch['nbjours']."</td>
    				<td style='width:160px;text-align:center;font-size20px'>".$listFetch['montant']."</td>
    			</tr>";
    }
   $reque->closeCursor();
 	$montant=$bdd->query("select sum(location.montant)as total from location,voiture where(location.numvoiture=voiture.numero) and(location.dateDepart between'$date1' and '$date2') and voiture.numero='$numvoiture' ");
 	$total=$montant->fetch();
 		 	 echo "<tr>
 		 	         <td colspan='4' style='text-align:center;'>TOTAL</td>
 		 	         <td style='text-align:center;'>".$total['total'].
 		 	         "</td>
 		 	      </tr>";
  }
  else
  {
  	echo "<script> alert('le prémier date doit être inférieur de la deuxième date')</script>";
  	//header('location:comptabilite.php');
  }
?>
 	
 </table>
 <form method="post" action="versionPDF1.php">
 	<button class="btn btn-success" name="retour">Retour à la page precédente</button>
 	<button class="btn btn-info" name="pdf">Editer le format PDF</button>
 </form>
</div>
</div>
 </body>
 </html>
