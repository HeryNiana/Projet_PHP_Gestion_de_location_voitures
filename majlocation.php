<?php
//inclusion de la fonction qui permet de se connecter à la base de données
include('connection.php');
  $numlocation=$_GET['numlocation'];
  if (isset($numlocation))
   {
   	//on recupere d'abord le numero du voiture
  	$numdaba=$bdd->query("select voiture.numero from location,voiture where voiture.numero=location.numvoiture and location.numlocation='$numlocation'");
  	$numvoiture=$numdaba->fetch();
  	$numdaba1=$numvoiture['numero'];
  	//puis on fait use mise à jour le table voiture
  	$bdd->query("UPDATE voiture set state='ok' where numero='$numdaba1'");
  	$bdd->query("UPDATE location set disonibility='dispo' where numlocation='$numlocation'");
  	header('location:location.php');
  }

  if (isset($_GET['numerodelete'])) 
  {
  	$number=$_GET['numerodelete'];
  	$bdd->query("DELETE from location where numlocation='$number'");
  	header('location:location.php');
  }
?>