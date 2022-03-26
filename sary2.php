<?php
//inclusion de la fonction qui permet de se connecter à la base de données
include('connection.php');
$anne=date('Y');
$data1=$bdd->query("select sum(montant) as bizna,count(numlocation)as nombre,month(dateDepart)as mois from location where year(dateDepart)='$anne' group by month(dateDepart)");
//on déclare les données à faire en objet JSON
$data=array();
$mois=array();
$newtab=array();
while ($datafetch=$data1->fetch()) 
{
	$jsonArrayItem=array();
	$jsonArrayItems=array();
	//on afetcte le donnés dans un tableau
	$jsonArrayItems=$datafetch['mois'];
	$jsonArrayItem=$datafetch['nombre'];
	array_push($data,$jsonArrayItem);
	array_push($mois,$jsonArrayItems);
}
$data1->closeCursor();
$data2=array();
for ($i=1; $i <=12 ; $i++) 
{ 
	$j=0;
	$b=0;
	foreach ($mois as $value) {
		 if($i==$value)
		{
			$b=$data[$j];
		}
		$j=$j+1;	
	}
	$newdata['nombre'] = $b;
	array_push($data2, $newdata);

}

print_r( json_encode($data2));
?>