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
	<title>Tableau de bord</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="row">
	<div class="col-md-2 col-md-push-10">
		<a href="aceuil2..php" style="text-decoration: none;font-size: 15px;color: #FD3F92;">
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
        //inclusion de la fonction qui permet de se connecter à la base de données
        include('connection.php');
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
<div class="container-fluid" style="background-color:white;" id="page3">
  <div class="a2" style="width: 180px;">
    <h5 id="h3" style="color: #3F2204;text-shadow: 2px 2px 2px #ED0000;font-size: 18px"><img src="sary/disponible.png" width="45" height="45">Tableau de bord</h5>
  	<h5 style="font-size: 17px;" id="h5"><a href="aceuil.php" style="color: #0131B4;cursor: pointer;text-decoration: none;"> <img src="sary/vehicule.png" width="45" height="45"> Tous les voitures</a></h5>
  	<h5 style="font-size: 17px;" id="h5"><a href="insertLocataire.php" style="color: #0131B4;cursor: pointer;text-decoration: none;"><img src="sary/reservation-car.png" width="45" height="45"> Locataires</a> </h5>
  	<h5 style="font-size: 17px;" id="h5"><a href="location.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/louer.png" width="45" height="45">Gestion locations</a></h5>
  	<h5 style="font-size: 17px;" id="h5"><a style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/images1.jpg" width="45" height="45"><a href="comptabilite.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px">Comptabilité</a></h>
  	<h5 style="font-size: 17px;" id="h5"><a href="document.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/document2.jpg" width="45" height="45">Documents</a></h5>
    <h5 style="font-size: 17px;" id="h5"><a href="aceuil2.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/disconnect.png" width="45" height="45">Deconnecter</a></h5>
  </div>

  <div class="col-sm-10" id="Ajouter" style="background-color: white;display: block;">
  <h1 style="text-align: left;color: green">Tableau de bord</h1>
 <div class="col-sm-5">
 	<img src="sary/bas.GIF" width="40" height="30" style="float: left;">
 	<h3 id="list_voiture" style="font-style: italic;text-decoration: underline;  font-size: 20px;font-family: 'Lucida Handwriting'; color: #DB0073;">=>Voiutres disponibles:
 		<?php 
 		$nombre=$bdd->query("SELECT * from voiture where state='ok'");
 		$nombre1=$nombre->rowCount();
 		echo $nombre1;
 		?></h3>
 		<table class="table1" style="border-collapse: collapse;text-align: center; width: 350px;">
      <tr>
        <th>Désignation</th>
        <th>Numero</th>
      </tr>

 		<?php
 		while ($nombre2=$nombre->fetch()) 
 		{
 			echo "<tr class='okay'><td>".$nombre2["designation"]."</td>";
 			echo "<td>".$nombre2["numero"]."</td></tr>";
 		}
 		?>
 	</table>
 </div>
<div class="col-sm-7">
	<img src="sary/disponible.png" width="60" height="50" style="float:left;">
	<h3 id="list_voiture" style="font-style: italic;text-decoration: underline;font-family: 'Lucida Handwriting'; color: #1B019B; font-size: 20px;">=>voitures en location:
		<?php
		$nombre3=$bdd->query("SELECT *from voiture where state='ko'");
 		$dispo=$nombre3->rowCount();
 		echo $dispo;
		?></h3>
		<table class="table1" style="border-collapse: collapse;text-align: center; width: 400px;">
      <tr>
        <th>Désignation</th>
        <th>Disponible dans</th>
      </tr>
 		<?php
 		 function datediff( $date2,$date1)
                 {
                   $diff=abs($date2-$date1);//abs retourne la valeur absolue
                   $retour=array();
                   $tmp=$diff;
                   $retour['second']=$tmp % 60;
                 
                   $tmp=floor(($tmp-$retour['second'])/60);
                   $retour['munite']=$tmp %24;
                 
                   $tmp=floor(($tmp-$retour['munite'])/60);
                 
                 $retour['hour']=$tmp% 24;
                 
                 $tmp=floor(($tmp-$retour['hour'])/24);
                 $retour['day']=$tmp;
                 
                 return $retour;
                 }
 		$list=$bdd->query("SELECT location.dateDarrive as date2,voiture.designation as libelle,voiture.numero from location,voiture where location.numvoiture=voiture.numero and location.disonibility='okay'");
 		while ($listFetch=$list->fetch())
 		 {
 			echo "<tr class='okay'><td>".$listFetch['libelle']."</td>";
 			$date=$listFetch['date2'];
 			//calcul du nombre des jours restant
                $now =time();
                 $rendre_time=strtotime($date);
                 if($now<$rendre_time)
                 {
                    $maj=datediff($rendre_time,$now);
                 echo "<td>reste ".$maj['day']." jours </td></tr>";
                 }
                 else {
                  echo "<td>date expiré</td></tr>";
                 }
 		}
 		?>
 	</table>
 </div>
  <div style="clear: both;" id="sary">
  	<!--on charge ici le fichier qui contient l'histogramme-->
  </div>
  </div>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript">
   $(document).ready(function(){
    $("h5[id*='h5']").on({mouseover:function(){
      $(this).css('border-top','0.2px solid blue').css('border-bottom','1px solid blue');
      var line=$(this).css('border-top','0.2px solid blue').css('border-bottom','1px solid blue');
      line.fadeTo(100,1);
    },mouseout:function(){
      $(this).css('border-top','1px solid white').css('border-bottom','1px solid white');
      var line1=$(this).css('border-top','1px solid white').css('border-bottom','1px solid white');
      line1.fadeTo(100,1)
    }});
    $("div#sary").load("sary.php");
  });
 </script>
</body>
</html>
<?php
}
?>