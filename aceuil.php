
<?php
session_start();
include "codevoiture.php";
include('connection.php');
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
	<title>Insertion voiture</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<script type="text/javascript" src="js/jquery.js"></script>
<div class="row">
	<div class="col-md-2 col-md-push-10">
		<a href="aceuil2..php" style="text-decoration: none;font-size: 15px;color: #FD3F92;">
		<img src="image/maison.png" width="25" height="30"><strong>aceuil</strong>
	    </a></div>   
	 <div class="col-md-2 col-md-push-6">
	 	<img src="sary/avatar.png" width="30" height="30">
	 	<a href="create_user.php" style="text-decoration: none;font-size: 15px;color: #FD3F92;"><strong>Nouveau utilisateur</strong></a></div> 
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
  	<h4 id="h4" style="cursor: pointer; color: #0131B4;"> <a href="bord.php" style="text-decoration: none;"><img src="sary/disponible.png" width="45" height="45">  Tableau de bord</h4>
  	<h4 id="h3" style="color: #3F2204;text-shadow: 2px 2px 2px #ED0000;"> <img src="sary/vehicule.png" width="45" height="45"> Tous les voitures</h1>
  	<h4 id="h4" style="cursor: pointer; color: #0131B4;"><a href="insertLocataire.php" style="text-decoration: none;"><img src="sary/reservation-car.png" width="45" height="45">  Locataires</a></h1>
  	<h4 id="h4" style="cursor: pointer; color: #0131B4;"><a href="location.php" style="text-decoration: none;"><img src="sary/louer.png" width="45" height="45">Gestion locations</a></h1>
  	<h4 id="h4" style="cursor: pointer; color: #0131B4;"><a href="comptabilite.php" style="text-decoration: none;"><img src="sary/images1.jpg" width="45" height="45">Comptabilité</a></h1>
  	<h4 id="h4" style="cursor: pointer; color: #0131B4;"><a href="document.php" style="text-decoration: none;"><img src="sary/document2.jpg" width="45" height="45">Documents</a></h1>
  	<h4 id="h4" style="cursor: pointer; color: #0131B4;"><a href="aceuil2.php" style="text-decoration: none;"><img src="sary/disconnect.png" width="45" height="45">Deconnecter</a></h1>
  </div>
 <div class="a3">
 <div id="pagination">
 	<h1>Gestion des voitures</h1>
 	<h3 id="list_voiture" style="font-style: italic;font-family: 'Lucida Handwriting'; color: #DB0073;  font-size: 15px;">=>Nombres total des voitures:
 		<?php
 		$nombre=$bdd->query("SELECT count(*) as total from voiture");
 		while ($nombre1=$nombre->fetch()) 
 		{
 			echo $nombre1['total'];
 		}
 		?>
 	</h3>
 	<h3 id="list_voiture" style="font-style: italic;font-family: 'Lucida Handwriting'; color: #DB0073; font-size: 15px;">=> Disponibles:
 		<?php
 		$nombre=$bdd->query("SELECT count(*) as total from voiture where state='ok'");
 		while ($nombre1=$nombre->fetch()) 
 		{
 			echo $nombre1['total'];
 		}
 		?>
 		&nbsp;=>voitures en location:
 		<?php
 		$nombre=$bdd->query("SELECT count(*) as total from voiture where state='ko'");
 		while ($nombre1=$nombre->fetch()) 
 		{
 			echo $nombre1['total'];
 		}
 		?>
 	</h3>
 	<table class="table1 table table-bordered" style="border-collapse: collapse;text-align: center; width: 70%; border: 1px solid blue;border-left:5px solid white;">
 		<tr>
 			<th style="text-align: center;font-size: 15px">Numero voiture</th>
 			<th style="text-align: center;font-size: 15px">Designation</th>
 			<th style="text-align: center;font-size: 15px">Loyer journalier</th>
 			<th style="text-align: center;font-size: 15px">Phtos</th>
 			<th style="text-align: center;font-size: 15px">Etat</th>
 			<th style="text-align: center;font-size: 15px">Actions</th>
 		</tr>
 <?php 
	$nb=0;
	while ($tab=$data->fetch())
	{
		$nb++;
    ?>
 		 		<tr class="okay">
 		 		<td style="font-size: 13px"><?php echo $tab['numero'] ?></td>
 		 		<td style="font-size: 13px"><?php echo $tab['designation'] ?></td>
 		 		<td style="font-size: 13px"><?php echo $tab['loyer_journalier'] ?></td>
 		 		<td style="font-size: 13px"><img  src="photos<?php echo $tab['photos']?>" width="45" height="30"></td>
 		 		<td style="font-size: 13px"><?php 
 		 		  if($tab['state']=='ok')
 		 		  {
 		 		  	echo "disponible";
 		 		  }
 		 		  else
 		 		  {
 		 		  	echo "Louée";
 		 		  }
 		 		 ?></td>
 		 		<td style="font-size: 13px">
 		 			<?php
 		 			if($tab['state']=='ok')
 		 			{
 		 				?>
 		 			<a href="modif.php?numero1=<?php echo $tab['numero'] ?>" style="cursor: pointer;text-decoration: none;" id="Modification"><img src="sary/images.png" width="25" height="20"></a>
 		 			<a href="maj.php?numero=<?php echo $tab['numero'] ?>" style="text-decoration: none;"><img src="sary/delete.png" width="25" height="20"></a>
 		 			<a href="detailvoitures.php?numero=<?php echo $tab['numero'] ?>" style="text-decoration: none;"><img src="sary/images (1).png" width="30" height="30"></a>
 		 				<?php
 		 			}
 		 			else{
 		 				?>
 		 				<a href="modif.php?numero1=<?php echo $tab['numero'] ?>" style="cursor: pointer;text-decoration: none;" id="Modification"><img src="sary/images.png" width="25" height="20">  </a>
 		 				<a href="detailvoitures.php?numero=<?php echo $tab['numero'] ?>" style="text-decoration: none;"><img src="sary/images (1).png" width="30" height="30"></a>
 		 			 <?php

 		 			}
 		 			?>
 		 		</td>
 		 	</tr>
 		<?php	
 	}
 		$data->closeCursor();
	 ?>
 	</table>
 	<?php
 	$voiture=$bdd->query("SELECT *from voiture");
 	$row=$voiture->rowCount();
 	if($row==0)
 	{
 		echo "<strong>il n'y a aucun enregistrement</strong>";
 	}
 	else if($row<3){
 		echo "<strong>Enregistrement 1 à ".$row."</strong>";
 	}
 	else{
 		?>
 	<p style=" float: left; left: 50%;"><strong>&nbsp;&nbsp;&nbsp;&nbsp;Enregistrement: <?php echo $nb ."  sur  ".$row; }?></strong></p>&nbsp;&nbsp;&nbsp;&nbsp;
 <ul class="pagination">
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
          <a href="?p=<?php if($current !=$page){echo $current+1;}else{echo $current;} ?>">&raquo;</a></li>
      </ul>	
	</div>
 	<button style="margin-left:30%;" type="submit" class="btn btn-sm btn-info" id="plus" > + nouveau vehicule</button>
 	<button type="submit" class="btn btn-sm btn-primary" id="search"><img src="sary/loupemobile.png" width="20" height="20"> recherche véhicule</button>
 	<hr>
 </div>
 <div class="col-md-5 col-md-push-1" id="Ajouter" style="background-color: #DFFF00;">
 	<h3 style="color: #E73E01;text-align: center;text-decoration: underline;
 	font-family: Consolas">Nouveau vehicules</h3>
 		<div class="form-group" style="top: 28%">
 			<form method="post" action="insert.php" enctype="multipart/form-data">
 			<label for="Designation">Designation de la voiture</label>
 			<input type="text" class="form-control" name="designation" placeholder="voiture">
 			<label for="Loyer journalier">Loyer journalier</label>
 			<input type="number" class="form-control" name="loyer" placeholder="Loyer journalier">
 			<label for="photos">photos</label>
 			<input type="file" class="form-control" name="photos">
 			<button type="submit" class="btn btn-md btn-success 2" name="okay" id="ajout">Ajouter</button>
 			<button class="btn btn-md btn-danger"  id="ajout1" name="okay1" onclick="this.reset">Annuler</button>
 			</form> 
 		</div>
 	
 </div>
  <div class="col-md-8 " id="searchlocataire" style="background-color:white;border: 2px solid white;">
<div id="voiture_search">
 		<style type="text/css">
 		.frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
<script src="js/jquery.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "readCountry2.php",
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
<h3 style="text-decoration: underline;color: #00FF00;">Recherche véhicule</h3>
<div class="frmSearch">
<div class="input-group input-group-md m-bot15"> 
<div class="input-prepend">
<form method="post" action="detailvoitures.php">
<input class="search-query" type="text" placeholder="nom véhicule" id="search-box" name="locatairename">
<input type="submit" class="btn btn-primary" name="show" value="Voir details">
</form>
</div>
</form>
</div>
<div id="suggesstion-box"></div>
<br>
</div>	
</div>
 	<button class="btn btn-md btn-danger"  id="cancel" name="cancel" onclick="this.reset">annuler</button>
 </div>
</div>
<script type="text/javascript">

	$("#Ajouter").hide();
	$("#Modifier").hide();
	$("#searchlocataire").hide();
	
	$(document).ready(function()
	{
		$("h4[id*='h4']").on({mouseover:function(){
			$(this).css('border-top','0.2px solid blue').css('border-bottom','1px solid blue');
			var line=$(this).css('border-top','0.2px solid blue').css('border-bottom','1px solid blue');
			$(this).fadeTo(100,0.5);
		},mouseout:function(){
			$(this).css('border-top','1px solid white').css('border-bottom','1px solid white');
			var line1=$(this).css('border-top','1px solid white').css('border-bottom','1px solid white');
			line1.fadeTo(100,1);
		}});
		
		$("#plus").click(function(){
			$(".a3").hide();
			$("#Ajouter").show();
			$("#Ajouter").css('border','1px solide white');
		})

		$("div[class='col-sm-3 daba']").click(function(){
			$("nav").hide();
			$("article").hide();
			$("#page3").show();
			$("#h4").css('border-top','0.2px solid blue').css('border-bottom','1px solid blue');
		});

		$('.ajout').click(function(){
			$("nav").show();
			$("article").show();
			$("#page3").hide();
		});

		$("#search").click(function(){
			$("#searchlocataire").show();
			$("#Ajouter").hide();
			$(".a3").hide();
			$('#voiture_search').show();
		});
		$("#cancel").click(function(){
			$("#searchlocataire").hide();
			$("#Ajouter").hide();
			$(".a3").show();
		});
	})
</script>
</body>
</html>
<?php
}
?>