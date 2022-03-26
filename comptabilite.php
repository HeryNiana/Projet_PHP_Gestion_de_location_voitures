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
  	<h4 id="h4"><a href="insertLocataire.php" style="color: #0131B4;cursor: pointer;text-decoration: none;"><img src="sary/reservation-car.png" width="45" height="45"> Locataires</h4>
  	<h4 id="h4"><a href="location.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/louer.png" width="45" height="45">Gestion locations</a></h4>
  	<h4 id="h3" style="color: #3F2204;text-shadow: 2px 2px 2px #ED0000;"><img src="sary/images1.jpg" width="45" height="45">Comptabilité</h4>
  	<h4 id="h4"><a href="document.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/document2.jpg" width="45" height="45">Documents</a></h4>
    <h4 id="h4"><a href="aceuil2.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px"><img src="sary/disconnect.png" width="45" height="45">Deconnecter</a></h4>
  </div>
  <div class="change">
  	<h1 style="text-align:center;">Exports du comptabilité</h1>
  	<div class="col-md-8 col-md-push-1" id="Ajouter" style="background-color: white;border:2px solid white;">
      <h2 style="color: red;font-style: italic;text-decoration: underline;">Editer:</h2>
      <form method="post" action="listLocataire1.php">
  		<label id="liste" style="font-size: 15px;color: olive;">
      <strong>=>La liste des locataires de la voiture numero
        <select name="numvoiture">
      <?php
    //inclusion de la fonction qui permet de se connecter à la base de données
    include('connection.php');
      $requete=$bdd->query("SELECT numero from voiture");
      while ($requeteFetch=$requete->fetch()) 
      {
        ?>
        <option class="form-control" value="<?php echo $requeteFetch['numero'] ?>">
       <?php echo $requeteFetch['numero'] ?></option>
       <?php
      }
      ?>
      </select>
      entre:</strong></label> 
  		<div class="form-inline" id="div1">
  		<input type="text" id="date1" name="date1" class="form-control" placeholder="première date"><label>&nbsp;et&nbsp</label>
  		<input type="text" id="date2" name="date2" class="form-control" placeholder="deuxiéme date"><br>
  		<button class="btn btn-sm btn-info" name="liste" id="voiture1">Ok</button>
  		</form>
      <br><br>
  		</div>
  		<p id="effectif" style="font-size: 15px;color: olive;"> <strong> =>Ou l'ffectif et monatant total des locations par voiture de:</strong></p>
  		<div id="div2" class="form-inline">
  		<form method="post" action="listLocataire2">
  		<input type="text" id="date21" name="date21" class="form-control" placeholder="date1"><label>&nbsp;&nbsp</label>
  		<input type="text" id="date22" name="date22" class="form-control" placeholder="date2"><br>
  		<button class="btn btn-sm btn-primary" name="Effectif" id="voiture2">Valider</button>
  		</form>
  		</div>
  	</div>
  </div>
  <!--fermeture de div class container-->
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

    $("#voiture1").click(function(){
    	$("#effectif").hide();
    	$("#div2").hide();

    })
  });
  $("#date1").datetimepicker(
  		{
  			timepicker:false
  		});
  	$("#date2").datetimepicker(
  		{
  			timepicker:false,
  			//format:'Y-m-d h:i:s a'
  		});
  	$("#date21").datetimepicker(
  		{
  			timepicker:false
  		});
  	$("#date22").datetimepicker(
  		{
  			timepicker:false,
  			//format:'Y-m-d h:i:s a'
  		});
 </script>
</body>
</html>
<?php
}
?>