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
    <link rel="stylesheet" type="text/css" href="date/jquery.datetimepicker.min.css">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<script src="date/jquery.js"></script>
<script src="date/jquery.datetimepicker.full.js"></script>
<script src="js/jquery-ui.js"></script>
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
<div class="container" style="background-color:white;" id="page3">
  <div class="a2">
    <h4 id="h4"><a href="bord.php" style="cursor: pointer; color: #0131B4;text-decoration:  none;"> <img src="sary/disponible.png" width="45" height="45">Tableau de bord</a></h4>
  	<h4 id="h4"><a href="aceuil.php" style="color: #0131B4;cursor: pointer;text-decoration: none;"> <img src="sary/vehicule.png" width="45" height="45"> Tous les voitures</a></h4>
  	<h4 id="h4"><a href="insertLocataire.php" style="color: #0131B4;cursor: pointer;text-decoration: none;"><img src="sary/reservation-car.png" width="45" height="45"> Locataires</a></h4>
  	<h4 id="h3" style="color: #3F2204;text-shadow: 2px 2px 2px #ED0000;"><img src="sary/louer.png" width="45" height="45">Gestion locations</a></h4>
  	<h4 id="h4"><a href="comptabilite.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/images1.jpg" width="45" height="45">Comptabilité</a></h4>
  	<h4 id="h4"><a style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/document2.jpg" width="45" height="45">Documents</a></h4>
    <h4 id="h4"><a href="aceuil2.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/disconnect.png" width="45" height="45">Deconnecter</a></h4>
  </div>
  <div class="change">
  	<h1 style="text-align:center;">Modification d'une location</h1>
  	<p style="font-family: Consolas;font-size: 15px;color: #6E0B14"><span style="text-decoration: underline;font-size: 20px;color: #6E0B14">NB:</span>La modification consiste à modifier la date de retour et elle doit être suprieure ou égale à la date d'aujourdhui</p>
  <div class="col-md-6 col-md-push-1" id="Ajouter" style="background-color: #BBAE98;">
  	<div class="form-group">
  	<form method="post" action="maj.php">
  <?php
  		$numero=$_GET['numero1'];
  	    $requete1=$bdd->query("SELECT *from location where numlocation='$numero'");
  	   $listrequet=$requete1->fetch();
  	   // $date1=$listrequet['dateDepart'];
  		//while ( $listrequet=$requete1->fetch())
  	   ?>
  		<label>Numero du location</label>
  		<input type="text" readonly='' name="newnumber" class="form-control" value="<?php echo $listrequet['numlocation'] ?>">
  		<label>Date de départ de la location</label>
  		<input type="text" class="form-control" value="<?php echo $listrequet['dateDepart'] ?>" readonly=''>
  		<label>Nombre du jour de location</label>
  		<input type="number" name="newdate" class="form-control" placeholder="<?php echo $listrequet['nbjours'] ?>">
  		<br><button type="submit" class="btn btn-md btn-success 2" name="okayl" id="ajoutL">Modifier</button>
 			<button class="btn btn-md btn-danger"  id="ajout1" name="okay1l" onclick="this.reset">Annuler la modification</button>
  	</form>
  	</div>
  </div>
  </div>
</div>
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
   $("#date2").datetimepicker(
  		{
  			timepicker:false,
  		});
</script>
</body>
</html>
<?php
}
?>