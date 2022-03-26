<?php
include "code.php";
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
  	<h4 id="h4"><a href="bord.php" style="cursor: pointer; color: #0131B4;text-decoration:  none;"> <img src="sary/disponible.png" width="45" height="45"> Tableau de bord</a></h4>
  	<h4 id="h4"><a href="aceuil.php" style="color: #0131B4;cursor: pointer;text-decoration: none;"> <img src="sary/vehicule.png" width="45" height="45"> Tous les voitures</a></h4>
  	<h4 id="h3" style="color: #3F2204;text-shadow: 2px 2px 2px #ED0000;"><img src="sary/reservation-car.png" width="45" height="45"> Locataires</h4>
  	<h4 id="h4"><a href="location.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/louer.png" width="45" height="45">Gestion locations</a></h4>
  	<h4 id="h4"><a href="comptabilite.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/images1.jpg" width="45" height="45">Comptabilité</a></h>
  	<h4 id="h4"><a href="document.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/document2.jpg" width="45" height="45">Documents</a></h4>
  	<h4 id="h4"><a href="aceuil2.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/disconnect.png" width="45" height="45">Deconnecter</a></h1>
  </div> 
 <div class="a3">
 	<?php
 	//inclusion de la fonction qui permet de se connecter à la base de données
include('connection.php');
	$nombre=$bdd->query(" SELECT count(*) as total1 from locataire");
	$number2=$nombre->fetch();

 	?>
 	<h1 class="titre_locataire" style="text-align: center; text-decoration: underline;">Liste des locataires (<?php echo $number2['total1']." sur la liste)" ?></h1>
 	<table  class="table1 table table-bordered" style="text-align: center;font-size: 15px;width: 60%;">
 		<th style="color:#ED0000;">Numero locataires</th>
 		<th style="color:#ED0000;">Noms locataires</th>
 		<th style="color:#ED0000;">Adresse</th>
 		<th style="color:#ED0000;">Actions</th>

 		<?php

/* $nombre3=3;
	if(isset($_GET["page"]))
	{
		$page=$_GET["page"];
	}

	else{
		$page=1;
	}*/
	$nb=0;
	//$partir=($page-1)*$nombre3;
	//$locataire=$bdd->query("SELECT *from locataire order by numero asc LIMIT $partir,$nombre3");
	while ($locataire1=$locataire->fetch())
	{
		$nb++;
 			echo "<tr class='okay'>
 			<td style='font-size:15px;'>".$locataire1['numero']."</td><td style='font-size:15px;'>".$locataire1['nom'].
 			"</td><td style='font-size:15px;'>".$locataire1['adresse'];
 			?>
 			<td>
 		 			<a href="modifLocataire.php?numero=<?php echo ($locataire1['numero']) ?>" style="text-decoration: none;"><img src="sary/images.png" width="30" height="25"></a>
 		 			<a href="maj.php?number=<?php echo($locataire1['numero']) ?>" style="text-decoration: none;"><img src="sary/delete.png" width="30" height="25"></a>
 		 		</td>
 		</tr><?php
 		}
 		$locataire->closeCursor();
 		?>
 	</table>
 	<?php
 	$voiture=$bdd->query("SELECT *from locataire");
 	$row=$voiture->rowCount();
 	if($row==0)
 	{
 		echo " <strong>il n'y a aucun enregistrement</strong>";
 	}
 	else if($row<3){
 		echo "<strong>Enregistrement 1 à ".$row."</strong>";
 	}
 	else{
 		?>
 	<p style="left: 40%;"><strong>Enregistrement: <?php echo ($nb) ." sur ".($row); }?></strong></p>
 	<?php 
	 	?><ul class="pagination">
	 			<li class="<?php if($current=='1') {echo "disabled";} ?>">
	 				<a href="?p=<?php if($current !='1'){echo $current-1;}else{echo $current;} ?>">&laquo;</a></li>
	 			<?php 
	 			 for($i=1;$i<=$page;$i++)
	 			 {
	 			 	if ($i==$current)
	 			 	 {
	 			 		?>
	 			 		<li class="active"><a href="?p=<?php echo $i ?>"><?php echo $i ?></a></li>
	 			 	<?php
	 			 	}else{?>
	 			 		<li><a href="?p=<?php echo $i ?>"><?php echo $i ?></a></li>
	 			 	<?php
	 			    }
	 			 }

	 			 ?>
	 		
	 			<li class="<?php if($current==$page) {echo "disabled";} ?>">
	 				<a href="?p=<?php if($current !=$page ){echo $current+1;}else{echo $current;} ?>">&raquo;</a></li>
	 		</ul>
	 <br>
 	<button style="margin-left:30%;" type="submit" class="btn btn-sm btn-info" id="plus"> + nouveau locataire</button>
 	<button type="submit" class="btn btn-sm btn-success" id="search"><img src="sary/loupemobile.png" width="20" height="20"> recherche locataire</button>
<hr>
 </div>
 <div class="col-sm-7 col-sm-push-1" id="Ajouter" style="background-color: #BBAE98;">
 	<h1>Nouveau locataire</h1>
 	<div class="form-group">
 	<form method="post" action="insert.php">
 			<label for="nom">Nom du locataire :</label>
 			<input type="text" class="form-control" name="name" placeholder="locataire">
 			<label for="Loyer journalier">Adresse locataire :</label>
 			<input type="text" class="form-control" name="adresse" placeholder="adresse">
 			<hr>
 			<button type="submit" class="btn btn-md btn-success 2" name="okayl" id="ajoutL">Ajouter</button>
 			<button class="btn btn-md btn-danger"  id="ajout1" name="okay1l" onclick="this.reset">Annuler</button>
 			</form> 
 		</div>
 </div>
 <!--pour la recherche du loctaire-->
 <div class="col-md-8 " id="searchL" style="background-color:white;border: 2px solid white;">
<div>
<style>
.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<script src="js/jquery.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readCountry.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
</head>
<body>
<h3 style="text-decoration: underline;color: #00FF00;">Recherche locataire</h3>
<div class="frmSearch">
<div class="input-group input-group-md m-bot15">
<form method="post" action="insertLocataire.php"> 
<input class="form-control" placeholder="nom locataire" id="search-box" name="locatairename" type="text">
<button class="btn btn-md btn-info" id="info" name="info">Plus d'info</button>
</form>
</div>
 
<div id="suggesstion-box"></div>
<br><br>
<?php
if (isset($_POST['info']))
 {
 	echo "<table class='table1 table table-bordered'><th>Numero</th><th>Nom</th><th>Adresse</th>";
	$nameL=$_POST['locatairename'];
	$requete=$bdd->query("SELECT *from locataire where nom='$nameL'");
	while ($requeteF=$requete->fetch()) 
	{
		echo "<tr><td>".$requeteF['numero']."</td><td>".$requeteF['nom']."</td><td>".$requeteF['adresse']."</td></tr>";
	}
	$requete->closeCursor();
	echo "</table>";
}
?>
</div>
<button class="btn btn-md btn-danger"  id="cancel" name="cancel" onclick="this.reset">annuler</button>
</div>
</div>
 <!--fermeture de l'attribut container-->
 </div>
 <script type="text/javascript" src="js/jquery.js"></script>
 <script type="text/javascript">
 	//$("#pagination").attr("disabled",true);
 	$("#searchL").hide();

	$(document).ready(function(){

	$("#Ajouter").hide();
 	$("#searchlocataire").hide();
	$("h4[id*='h4']").on({mouseover:function(){
			$(this).css('border-top','0.2px solid blue').css('border-bottom','1px solid blue');
			var line=$(this).css('border-top','0.2px solid blue').css('border-bottom','1px solid blue');
			$(this).fadeTo(100,0.5);
		},mouseout:function(){
			$(this).css('border-top','1px solid white').css('border-bottom','1px solid white');
			var line1=$(this).css('border-top','1px solid white').css('border-bottom','1px solid white');
			line1.fadeTo(100,1)
		}});

		$("#plus").click(function(){
			$("#Ajouter").show();
			$(".a3").hide();
		});

		$("#search").click(function(){
			$("#searchL").show();
			$("#Ajouter").hide();
			$(".a3").hide();
			//$("#search_client").load("index3.php");
		});
		$("#info").click(function(){
			$("#searchL").show();
			$("#Ajouter").hide();
			$(".a3").hide();
			//$("#search_client").load("index3.php");
		});
		$("#cancel").click(function(){
			$("#searchL").hide();
			$("#Ajouter").hide();
			$(".a3").show();

		});
	  if($("a[id='pagination']:clicked").val())
	  {
	  	$(this).css("background-color","white");
	  }
	});
</script>
</body>
 </html>
<?php
}
?>