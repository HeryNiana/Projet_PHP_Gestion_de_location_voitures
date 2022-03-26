<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>contenu du recherche locataire</title>
</head>
<body>
	<h1>liste des client</h1>
	<table  class="table1" style="text-align: center;font-size: 15px;width: 600px;">
		<tr>
 		<th style="color:#ED0000;">Numero locataires</th>
 		<th style="color:#ED0000;">Noms locataires</th>
 		<th style="color:#ED0000;">Adresse</th>
 		<th style="color:#ED0000;">Actions</th>
 		</tr>
 	
<?php
//inclusion de la fonction qui permet de se connecter à la base de données
include('connection.php');
   $mot_cle='NULL';
   if (isset($_POST["locatairename"])) 
   {
   	$mot_cle=$_POST['locatairename'];
   }

	$nom=$bdd->query("SELECT *from locataire where nom like '%mot_cle%'");
	while ($listnom=$nom->fetch())
	 {
	 	echo "<tr><td>".$listnom['numero']."</td><td>".$listnom['designation']."</td><td>".$listnom['louer_journalier']."</td><td><img src='photos'".$listnom['photos']."</td></tr>";
	 }
	$nom->closeCursor();
?>
</table>
</body>
</html>