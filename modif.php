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
	<title>Modification véhcule</title>
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
	 	<a href="create_user.php" style="text-decoration: none;font-size: 15px;color: #FD3F92;"><strong>Nouveau utilisateur</strong></a></div> 
</div>
<div class="row">
	<div class="col-md-2 col-md-push-1 okay">
		<a href="aceuil1.php" style="text-decoration: none;cursor: pointer;color: red;">
			<img src="sary/eni.png" width="30" height="30"><strong>MENU</strong></a>
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
    <h4 id="h4"><a href="bord.php"  style="cursor: pointer; color: #0131B4;text-decoration:  none;"> <img src="sary/disponible.png" width="45" height="45"> Tableau de bord</a></h4>
  	<h4 id="h3" style="color: #3F2204;text-shadow: 2px 2px 2px #ED0000;"><img src="sary/vehicule.png" width="45" height="45"> Tous les voitures</a></h4>
  	<h4 id="h4"><a href="insertLocataire.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/reservation-car.png" width="45" height="45"> Locataires</a></h4>
  	<h4 id="h4"><a href="location.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/louer.png" width="45" height="45">Gestion locations</a></h4>
  	<h4 id="h4"><a href="comptabilite.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/images1.jpg" width="45" height="45">Comptabilité</a></h4>
  	<h4 id="h4"><a style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/document2.jpg" width="45" height="45">Documents</a></h4>
     <h4 id="h4"><a href="aceuil2" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/disconnect.png" width="45" height="45">Deconnecter</a></h1>
      <img src="sary/eni.png" width="60" height="50" style="left: 200px;">
  </div>

  <div class="col-md-5 col-md-push-1" id="Modifier" style="background-color: #DFFF00;">
 			<h3 style="color: #E73E01;">Modification véhicule</h3>
 		       <div class="form-group" style="top: 28%">
 						<form method="post" enctype="multipart/form-data">
              <?php
 							 //inclusion de la fonction qui permet de se connecter à la base de données
              include('connection.php');
 			            $number=$_GET['numero1'];
 			            $voiture= $bdd->query("SELECT *from voiture where numero='$number' ");
 			            while($voiture1=$voiture->fetch())
 			            {?>
 			            <label for="Numero">Numero du véhicule</label>
 			            <input type="number" name="number" class="form-control" value="<?php echo($voiture1['numero']) ?>" readonly="">
 			            <label for="Designation">Designation de la voiture</label>	             
 			            <input type="text" class="form-control" name="name" value="<?php echo($voiture1['designation']) ?>" readonly="">
 			            <?php
 			           }
 			           $voiture->closeCursor();

 			            if (isset($_POST['okay1']))
     {
        header('location:aceuil.php');
     }

     if (isset($_POST['okayl']))
      {
         $nom=$_POST['name'];
         $adresse=$_POST['adresse'];
         $bdd->query("INSERT into locataire(nom,adresse) values ('$nom','$adresse')");
         header('location:insertLocataire.php');
     }

     if (isset($_POST['okay1l'])) 
     {
         header('location:insertLocataire.php');
     }
        if (isset($_POST['okaym']))
         {
             $num1=$_POST['loyer'];
             $nomphoto=$_FILES['photos']['name'];
             $file_tmp_name=$_FILES['photos']['tmp_name'];
             $upload_dir="photos";
             $imgExt=strtolower(pathinfo($nomphoto,PATHINFO_EXTENSION));
             $valid_extension= array('jpg','jpeg','png','gif','pdf');
             $picprofile=rand(1000,100000).'.'.$imgExt;
             move_uploaded_file($file_tmp_name,$upload_dir.$picprofile);
             $modif=$bdd->query("UPDATE voiture set loyer_journalier='$num1', photos='$picprofile' where numero= '$number'");
             header("location:aceuil.php");
         }
 			            ?>
 			            <label for="Loyer journalier">Loyer journalier</label>
 			            <input type="number" class="form-control" name="loyer" placeholder="Nouvel loyer journalier">
 			            <label for="photos">photos</label>
 			            <input type="file" class="form-control" name="photos">
 			            <button type="submit" class="btn btn-md btn-success 2" name="okaym" id="ajout">Modifier</button>
 			            <button class="btn btn-md btn-danger"  id="ajout1" name="okay1" onclick="this.reset">Annuler la modification</button>
 			            </form>
 					</div>

 </div>
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