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
	<title>Insertion locataire</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="row">
	<div class="col-md-2 col-md-push-10">
		<a href="aceuil2..php" style="text-decoration: none;font-size: 15px;color: #FD3F92;">
		<img src="image/maison.png" width="25" height="30">aceuil
	    </a></div>   
	 <div class="col-md-2 col-md-push-6">
	 	<img src="sary/avatar.png" width="30" height="30">
	 	<a href="nuwUser.php" style="text-decoration: none;font-size: 15px;color: #FD3F92;">nouveau utilisateur</a></div> 
</div>
<div class="row">
	<div class="col-md-2 col-md-push-1 okay">
		<a href="aceuil1.php" style="text-decoration: none;cursor: pointer;color: red;">
			<img src="sary/eni.png" width="30" height="30">MENU</a>
	</div>
    <div class="col-md-4 col-md-push-3" id="montre" style="font-size: 18px;">
    	<img src="image/montre.GIF" width="30" height="30" style="left: 3px;">
    	<?php
    	echo date('l,j F Y');
    	?>
    	<span id="date"></span>
	 	<script type="text/javascript">
	 		var heure = document.getElementById('date');
            var markReel = setInterval(horloge, 1000);
	        
   function horloge()
{
	var d = new Date();
	heure.innerHTML = d.toLocaleTimeString();
	var stop=document.getElementById('hery');

}
	</script>
	</div>
</div>

</div>
<div class="container" style="background-color:white;" id="page3">
  <div class="a2">
  	<h4 id="h4"><a href="aceuil.php" style="color: #0131B4;cursor: pointer;text-decoration: none;"> <img src="sary/vehicule.png" width="45" height="45"> Tous les voitures</a></h4>
  	<h4 id="h3" style="color: #3F2204;text-shadow: 2px 2px 2px #ED0000;"><img src="sary/reservation-car.png" width="45" height="45"> Locataires</h4>
  	<h4 id="h4"><a style="cursor: pointer; color: #0131B4;text-decoration:  none;"> <img src="sary/disponible.png" width="45" height="45"> Voitures disponibles</a></h4>
  	<h4 id="h4"><a style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/louer.png" width="45" height="45">Louer</a></h4>
  	<h4 id="h4"><a style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/images1.jpg" width="45" height="45">Comptabilité</a></h>
  	<h4 id="h4"><a style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/document2.jpg" width="45" height="45">Documents</a></h4>
  	  <h4 id="h4" style="cursor: pointer; color: #0131B4;"><a href="aceuil2.php" style="text-decoration: none;<img src="sary/disconnect.png" width="45" height="45">Deconnecter</a></h1>
  </div>
</div>
<div class="col-md-5 col-md-push-1" id="Ajouter" style="background-color: #BBAE98;">
 	<h3>Nouveau locataire</h3>
 </div>
</body>
</html>
<?php
}
?>