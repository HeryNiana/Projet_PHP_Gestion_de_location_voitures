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
	<title>Documents</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
  <style type="text/css">
    #lien:hover
    {
      color: #800080;
    }
  </style>
</head>
<body>
<div class="row">
	<div class="col-md-2 col-md-push-10">
		<a href="aceuil2.php" style="text-decoration: none;font-size: 15px;color: #FD3F92;">
		<img src="image/maison.png" width="25" height="30"><strong>aceuil</strong>
	    </a></div>   
	 <div class="col-md-2 col-md-push-6">
	 	<img src="sary/avatar.png" width="30" height="30">
	 	<a href="nuwUser.php" style="text-decoration: none;font-size: 15px;color: #FD3F92;"><strong>Nouveau utilisateur</strong></a></div> 
</div>
<div class="row">
	<div class="col-md-2 col-md-push-1 okay">
		<a href="aceuil1.php" style="text-decoration: none;cursor: pointer;color: red;">
			<img src="sary/menumobile.png" width="30" height="30"><strong>MENU</strong></a>
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
    <h4 id="h4"><a href="bord.php" style="cursor: pointer; color: #0131B4;text-decoration:  none;"> <img src="sary/disponible.png" width="45" height="45">Tableau de bord</a></h4>
  	<h4 id="h4"><a href="aceuil.php" style="color: #0131B4;cursor: pointer;text-decoration: none;"> <img src="sary/vehicule.png" width="45" height="45"> Tous les voitures</a></h4>
  	 <h4 id="h4"><a href="insertLocataire.php" style="cursor: pointer; color: #0131B4;text-decoration:  none;"><img src="sary/reservation-car.png" width="45" height="45"> Locataires</h4>
  	<h4 id="h4"><a href="location.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/louer.png" width="45" height="45">Gestion locations</a></h4>
  	<h4 id="h4"><a style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/images1.jpg" width="45" height="45"><a href="comptabilite.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px">Comptabilité</a></h>
  	<h4 id="h3" style="color: #3F2204;text-shadow: 2px 2px 2px #ED0000;"><img src="sary/document2.jpg" width="45" height="45">Documents</a></h4>
    <h4 id="h4"><a href="aceuil2.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/disconnect.png" width="45" height="45">Deconnecter</a></h4>
  </div>
  <div class="col-sm-9" id="Ajouter" style="background-color: white;">
  <h1>Documents partagés</h1>
  <p style="font-size:25px;color: #800080">  Telechargement d'un fichier:
  </p>
    <div class="row" style="background-color: #BBD2E1;border-radius: 10px">
      <div class="col-sm-2">
        <a href="document/premieresapplicationsweb20avecajaxetphp.rar" style="text-decoration: none;"> 
          <img src="sary/download.jpeg" width="80" height="70"> <br><strong>Ajax_et_php.rar</strong></a>
      </div>
      <div class="col-sm-2 col-sm-push-1">
        <a href="document/Expert_in_MySQL.rar" id="lien" style="text-decoration: none;"> <img src="sary/logo-word.png" width="80" height="70">  <strong>Expert_in_MySQL.rar</strong></a>
      </div>
      <div class="col-sm-2 col-sm-push-2"><a href="document/PHP_Solution.rar" id="lien" style="text-decoration: none;"> <img src="sary/photo_1549530041.png" width="80" height="70"><strong>PHP_Solution.rar</strong> </a></div>
      <div class="col-sm-2 col-sm-push-3"><a href="document/Charts_cours.rar" id="lien" style="text-decoration: none;"> <img src="sary/Maple.gif" width="80" height="70">  <strong>Charts_cours.rar</strong></a></div>
    </div>
<br>
  <p style="font-size:25px;color: red;text-decoration: underline;"> Les framework javascript et css:
  </p>
  <div class="row">
    <div class="col-sm-2">
        <a href="chart/Chart(graphique).rar" style="text-decoration: none;"> 
          <img src="sary/photo_1549530041.png" width="80" height="70"> <br><strong>Librairie graphique</strong></a>
      </div>
      <div class="col-sm-2 col-sm-push-1">
        <a href="css/Framework_CSS.rar" id="lien" style="text-decoration: none;"> <img src="sary/document.jpg" width="80" height="70">  <strong>Framework_CSS.zip</strong></a>
      </div>
      <div class="col-sm-2 col-sm-push-2"><a href="js/framework_JS.rar" id="lien" style="text-decoration: none;"> <img src="sary/document.jpg" width="80" height="70"><strong>FRAMEWORK javascript</strong> </a></div>
  </div>
</div>
   </div>
  <!--fermeture de l'attribut container-->
 </div>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript">
   $(document).ready(function(){
    $("h4[id*='h4']").on({mouseover:function(){
      $(this).css('border-top','0.2px solid blue').css('border-bottom','1px solid blue');
      var line=$(this).css('border-top','0.2px solid blue').css('border-bottom','1px solid blue');
      line.fadeTo(100,1);
    },mouseout:function(){
      $(this).css('border-top','1px solid white').css('border-bottom','1px solid white');
      var line1=$(this).css('border-top','1px solid white').css('border-bottom','1px solid white');
      line1.fadeTo(100,1)
    }});
  });
 </script>
</body>
</html>
<?php
}
?>