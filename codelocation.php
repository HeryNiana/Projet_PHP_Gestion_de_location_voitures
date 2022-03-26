<?php
//inclusion de la fonction qui permet de se connecter à la base de données
include('connection.php');
//noumbre des données affiché par page
$afficheParPage=5;
$req=$bdd->query("SELECT count(*) as total from location");
$req1=$req->fetch();
$total=$req1['total'];
$page=ceil($total/$afficheParPage);
if(isset($_GET['p']) && !empty($_GET['p']) && ctype_digit($_GET['p'])==1 )
	{
		if($_GET['p'] > $page)
		{
			$current=$page;
		}
		else
		{
			$current=$_GET['p'];
		}
	}else
	{
		$current=1;
	} 
 $partir=($current-1)*$afficheParPage;
 $data=$bdd->query("SELECT location.numlocation,locataire.nom,voiture.designation,location.dateDepart,location.dateDarrive,location.disonibility,voiture.loyer_journalier*location.nbjours as montant_total from locataire,location,voiture where (location.numcli=locataire.numero and location.numvoiture=voiture.numero) order by location.numlocation asc LIMIT $partir,$afficheParPage");
?>