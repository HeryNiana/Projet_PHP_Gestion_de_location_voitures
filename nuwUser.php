<?php

session_start();
  if (!isset($_SESSION['name']))
 {
   echo "<script>location.href='index.php'</script>";
 }
 else{
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>edition en pdf des donnés MYSQL</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container" style="background-color: #D2CAEC;border-radius: 10px;">
	<h1>AJOUTER UN NOUVEAU UTILISATEUR</h1>
	<form method="post">
	<table class="table-bordered">
		<tr>
			<th>Nom utilisateur</th>
			<th><input type="text" name="nom" class="form-control" placeholder="Nom utilisateur"></th>
		</tr>
		<tr>
			<td><strong>Adresse e-mails</td>
			<td>
				<input type="email" name="email" class="form-control" placeholder="Adresse e-mails">
			</strong></td>
		</tr>
		<tr>
			<th colspan="2"><input type="submit" class="btn btn-info" name="ok" value="Ajouter">
				<input type="submit" class="btn btn-danger" name="cancel" value="Annuler"></th>
		</tr>
	</table>
	</form>
</div>
<?php
 //inclusion de la fonction qui permet de se connecter à la base de données
include('connection.php');
      if (isset($_POST['ok'])) 
      {
      	$nom=$_POST['nom'];
      	$mail=$_POST['email'];
      	$ajout=$bdd->query("INSERT into users(noms,emails) values('$nom','$mail') ");
      	header('location:aceuil1.php');
      }
      if (isset($_POST['cancel'])) 
      {
      	header('location:aceuil1.php');
      }
?>
</body>
</html>
<?php
}
?>