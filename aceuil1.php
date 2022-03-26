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
	<title>Gestion commecriale</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="row">
	<div class="col-md-2 col-md-push-10">
		<a href="aceuil2.php" style="text-decoration: none;font-size: 15px;color: #FD3F92;">
		<img src="image/maison.png" width="25" height="30">Login
	    </a></div>   
	 <div class="col-md-2 col-md-push-6">
	 	<img src="sary/avatar.png" width="30" height="30">
	 	<a href="nuwUser.php" style="text-decoration: none;font-size: 15px;color: #FD3F92;">nouveau utilisateur</a></div> 
</div>
<div class="row">
	<div class="col-md-2 col-md-push-1 okay">
		<img src="sary/eni.png" width="35" height="35">
	</div>
    <div class="col-md-4 col-md-push-3" id="montre" style="font-size: 18px;">
    	<img src="image/montre.GIF" width="30" height="30" style="left: 3px;">
    	<?php
    	echo date('l,j F Y');
    	//echo $_SESSION['name'];
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
<div class="container">
	<nav id="nav" class="aceuil">
		<div class="row">
		<div class="col-md-9" style="background-color: #83A697;border: 10px;">
			<p id="Profil" style="text-decoration: underline;font-size: 20px;"><img src="sary/Maple.gif" width="25" height="25"><span>Profil</span></p>
		    <p class="nav"><strong>Admin Admin</strong></p>
			<p class="nav"><strong> statut:admin <span id="state"></span></strong></p>
			<p class="nav"><strong> Fonction:gerant<span id="function"></span></strong></p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-11" style="top: 10px; background-color: white">
			<p style="font-style: oblique;font-size: 18px;"><strong>VOUS ALLEZ ETRE SATISFAIT AVEC NOS</strong></p>
			<img src="sary/voiture12.jpg" width="150" height="110">
		</div>
	</div>
	</nav>

   <article class="aceuil">
		
		<div class="row" id="img1">
			<h1><strong>Bienvenu sur votre application de gestion des locataires des voitures</strong></h1>
			<div  class="col-md-3" id="img2" style="height: 230px;background-color: white">
				<a href="aceuil.php" id="voiture" style="text-decoration: none;">Tous les voitures
				<img src="sary/voiture.jpg" width="145" height="112"></a>
			</div>
			<div  class="col-md-3" id="img2" style="height: 230px;background-color: #FD3F92;">
				<a href="insertLocataire.php" id="voiture1" style="text-decoration: none;">Locataires
				<img src="sary/images.jpeg" width="150" height="155"></a>
			</div>
			<div  class="col-md-3" id="img2" style="height: 230px;background-color: #00FF00;">
				<a href="bord.php" id="voiture2" style="text-shadow: 3px 3px 3px white;">Tableau de bord<br></a>
				<img src="sary/voiture2.jpg" width="150" height="135">
			</div>
		</div>
		<div class="row" id="img1" >
			<div style="border:2px solid transparent;background-color:#BBD2E1;height: 230px" class="col-md-3">
<a href="location.php" id="voiture" style="float: left;text-decoration:none;">Alerte des retour
 <?php
//inclusion de la fonction qui permet de se connecter à la base de données
  include('connection.php');
 $list=$bdd->query("SELECT *from location where disonibility='okay'");
 $nb=0;
while ($list_result=$list->fetch())
 {
  $date=$list_result['dateDarrive'];
  $datetime=strtotime($date);
  $now=time();
  if ($now>$datetime)
   {
    $nb++;
   }
}
if($nb>0){
      echo  "<br><p style='color:red;text-align:center;clear:both;'>
      <a href='location.php' style='text-decoration:none;'> 
      <img src='sary/alert.GIF' width='40' height='40'>
      <strong>Alerte,il y a ".$nb." voitures dont la date de retour est expirée</strong></a></p>";
}
    ?></a>
		</div>
			<div  class="col-md-3" id="img2" style="height: 230px;background-color: #BABABA;">
				<a href="location.php" id="voiture">
				Gestion locations<br>
				<img src="sary/louer.png" width="150" height="120"></a>
			</div>
			<div  class="col-md-3" id="img2" style="height: 230px;background-color: #F7230C;" id="img2">
				<a href="comptabilite.php"  id="voiture4">Comptabilité
				<img src="sary/comptable.jpg" width="150" height="130"></a>
			</div>
			<div  class="col-md-3" id="img2" style="height: 230px;background-color: #6600FF;" id="img2">
				<a href="document.php" id="voiture3">Documents
					<img src="sary/document.jpg" width="170" height="140"></a>
				
			</div>
		</div>
		<br>
	</article>
<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		$("div[class*='col-md-3']").css("width","230px").css("height","230");
		$(document).ready(function()
		{
			$("div[class*='col-md-3']").on({mouseover:function(){
			$(this).css("color","pink").css("width","250").css("height","250");
		},mouseout:function(){
			$(this).css("color","blue").css("width","230px").css("height","230");
		}});

		});
			
	</script>
</div>

</body>
</html>
<?php
}
?>