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
  	<h4 id="h3" style="color: #3F2204;text-shadow: 2px 2px 2px #ED0000;"><img src="sary/reservation-car.png" width="45" height="45"> Locataires</h4>
  	<h4 id="h4"><a href="location.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/louer.png" width="45" height="45">Gestion locations</a></h4>
  	<h4 id="h4"><a style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/images1.jpg" width="45" height="45"><a href="comptabilite.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px">Comptabilité</a></h>
  	<h4 id="h4"><a href="document.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/document2.jpg" width="45" height="45">Documents</a></h4>
    <h4 id="h4"><a href="aceuil2.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/disconnect.png" width="45" height="45">Deconnecter</a></h4>
  </div>
  <div class="col-md-5 col-md-push-1" id="Ajouter" style="background-color: #BBAE98;">
 	<h3>Modification locataire</h3>
 	<div class="form-group">
 	<form method="post">
   	<?php
  //inclusion de la fonction qui permet de se connecter à la base de données
  include('connection.php');
  $numeroL=$_GET['numero'];
  $listL=$bdd->query("SELECT *from locataire where numero='$numeroL'");
  while ($listLF=$listL->fetch()) 
  {
  	?>
 			<label for="number">Numero du locataire</label>
 			<input type="number" name="nombre" class="form-control" readonly="" value="<?php echo($listLF['numero']) ?>">
 			<label for="nom">Nom du locataire</label>
 			<input type="text" class="form-control" name="name" placeholder=" Nouveau nom locataire">
 			<label for="Loyer journalier">Adresse locataire</label>
 			<input type="text" class="form-control" name="adresse" placeholder="Nouveau adresse">
 			<?php
 			}
 			$listL->closeCursor();

 			if (isset($_POST['okayl']))
 			{
 			$newname=$_POST['name'];
      $newname1=strtoupper($newname);
 			$newadresse=$_POST['adresse'];
      $newadresse1=strtoupper($newadresse);
 			$newvalue=$bdd->query("UPDATE locataire set nom='$newname1',adresse='$newadresse1' where numero='$numeroL'");
 			header('location:insertLocataire.php');
 			}

 			if (isset($_POST['okay1l']))
 			 {
 				header('location:insertLocataire.php');
 			}
 			?>
 			<button type="submit" class="btn btn-md btn-success 2" name="okayl" id="ajoutL">Modifier</button>
 			<button class="btn btn-md btn-danger"  id="ajout1" name="okay1l" onclick="this.reset">Annuler la modification</button>
 			</form> 
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
}?>