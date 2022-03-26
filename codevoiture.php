<?php
//inclusion de la fonction qui permet de se connecter à la base de données
include('connection.php');
	$afficheParPage=5;
$req=$bdd->query("SELECT count(*) as total from location");
$req1=$req->fetch();
$total=$req1['total'];
//echo "$total";
$page=ceil($total/$afficheParPage);
if(isset($_GET['p']) && !empty($_GET['p']) && ctype_digit($_GET['p'])==1 )// cette fonction va vérifie si c'est un chiffre qui est envoyé par le formulaire
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
	//echo $current;
 $partir=($current-1)*$afficheParPage;
$data=$bdd->query("SELECT *from voiture order by numero asc LIMIT $partir,$afficheParPage");
?>