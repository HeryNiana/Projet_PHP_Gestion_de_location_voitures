<?php
include "codelocation.php";
session_start();
  if (!isset($_SESSION['name']))
 {
   echo "<script>location.href='index.php'</script>";
 }
 else
 {
?>""
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Insertion locations</title>
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
//inclusion de la fonction qui permet de se connecter à la base de données
include('connection.php');
    echo date('l,j F Y');
    function datediff2($date1,$date2)
{
  $diff=($date1-$date2);//abs retourne la valeur absolue
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
  <div class="a2" style="width: 20%">
      <h4 id="h4">
        <a href="bord.php" style="cursor: pointer; color: #0131B4;text-decoration:  none;"> 
          <img src="sary/disponible.png" width="45" height="45"> Tableau de bord
        </a>
      </h4>
  	<h4 id="h4">
      <a href="aceuil.php" style="color: #0131B4;cursor: pointer;text-decoration: none;"> 
        <img src="sary/vehicule.png" width="45" height="45" /> Tous les voitures
      </a>
    </h4>
  	<h4 id="h4">
      <a href="insertLocataire.php" style="color: #0131B4;cursor: pointer;text-decoration: none;">
        <img src="sary/reservation-car.png" width="45" height="45" /> Locataires
      </a>
    </h4>
  	<h4 id="h3" style="color: #3F2204;text-shadow: 2px 2px 2px #ED0000;"> 
      <img src="sary/louer.png" width="45" height="45">Gestion locations</h4>
  	<h4 id="h4">
      <a href="comptabilite.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px">
        <img src="sary/images1.jpg" width="45" height="45" />Comptabilité
      </a>
    </h4>
  	<h4 id="h4">
      <a href="document.php" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px">
        <img src="sary/document2.jpg" width="45" height="45" />Documents
      </a>
    </h4>
  	<h4 id="h4">
      <a href="aceuil2" style="cursor: pointer; color: #0131B4; text-decoration: none; height: 50px">
        <img src="sary/disconnect.png" width="45" height="45" />Deconnecter
      </a>
    </h4>
  </div>
  <div class="a5">
  	<h1 style="text-align:center;">LOCATIONS</h1>
      <table class="table1 table table-stripped table-bordered" style="text-align: center; width: 80%; border: 1px solid blue;border-left: 5px solid white;">
  		<tr>
  			<th style="text-align: center;font-size: 12px">Numéros</th>
  			<th style="text-align: center;font-size: 12px">Locataire</th>
  			<th style="text-align: center;font-size: 12px">Voitures</th>
  			<th style="text-align: center;font-size: 12px">date location</th>
  			<th style="text-align: center;font-size: 12px">date retour voiture</th>
        <th style="text-align: center;font-size: 12px">Montant des locations</th>
  			<th style="text-align: center;font-size: 12px">voiture rendu</th>
  			<th style="text-align: center;font-size: 12px">Actions</th>
  			<th style="text-align: center;font-size: 12px">Amande</th>
  		</tr>
  <?php  
  $nb=0;
	while ($tab=$data->fetch())
	{
    $nb++;
    ?>
 		 		<tr class="okay">
 		 			<td style="font-size: 13px;"><?php echo $tab['numlocation']?></td>
 		 			<td style="font-size: 13px;"><?php echo $tab['nom'] ?></td>
 		 			<td style="font-size: 13px;"><?php echo $tab['designation'] ?></td>
 		 			<td style="font-size: 13px;"><?php echo $tab['dateDepart'] ?></td>
 		 			<td style="font-size: 13px;"><?php echo $tab['dateDarrive'] ?></td>
          <td style="font-size: 13px;"><?php echo $tab['montant_total'] ?></td>
 		 			<td style="font-size: 13px;"><?php 
           if ($tab['disonibility']=='okay')
            {
            echo "<input type='checkbox' disabled='true'>";
            } else
            {
              echo "<input type='checkbox' checked='checked' readonly='' disabled='true'>";
            }
             ?>
             </td>
            }
 		 			<td>
            <?php
            if($tab['disonibility']=='okay')
            {
              ?>
                <a href="modifLocation.php?numero1=<?php echo $tab['numlocation'] ?>" style="cursor: pointer;text-decoration: none;" id="Modification"><img src="sary/images.png" width="30" height="25"></a>
                <?php
            }
            else
             {
              ?>
              <a href="maj.php?numerodelete=<?php echo $tab['numlocation'] ?>" style="text-decoration: none;"><img src="sary/delete.png" width="30" height="25"></a>
              <?php
            }
            ?>
 		 			
 		 			</td>
          <td>
          <?php
          $dateDarrive=$tab['dateDarrive'];
          $dateDarrivetotime=strtotime($dateDarrive);
          if(($tab['disonibility']=='okay')&&(time()>$dateDarrivetotime))
          {
            $now=time();
            $maj=datediff2($dateDarrivetotime,$now);
            $loyer=$bdd->query("SELECT voiture.loyer_journalier from location,voiture where(location.numvoiture=voiture.numero) and location.dateDarrive='$dateDarrive' and location.disonibility='okay'");
            $loyerFetch=$loyer->fetch();
            $prix=$loyerFetch['loyer_journalier'];
            $amande=abs($maj['day']);
            $paye=2*$amande;
            echo $paye."%(".(($paye*$prix)/100)."Ar)";
          }
          ?>
 		 		</tr>
 		 	<?php
 	} 
 	$data->closeCursor();
  	?>
  	</table>
  <?php
  $location=$bdd->query("SELECT *from location");
 	$row=$location->rowCount();
 	if($row==0)
 	{
 		echo "<strong>il n'y a aucun enregistrement";
 	}
 	else if($row<3)
  {
 		echo "<strong>Enregistrement 1 à ".$row."</strong>";
 	}
 	else
  {
 		?>
 	  <p style="left: 40%;"><strong> Enregistrement:
      <?php echo ($nb) ."  sur  ".$row; 
  }?></strong></p>
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
 	<button style="margin-left: 5%;" type="submit" class="btn btn-sm btn-info" id="plus">nouvelle location</button>
  <button type="submit" class="btn btn-sm btn-primary" id="rendre">rendre une voiture</button><hr>
  <div id="alert">
 <?php
 $list=$bdd->query("SELECT *from location where disonibility='okay'");
 $nb=0;
 while ($list_result=$list->fetch())
 {
  $date=$list_result['dateDarrive'];
  $datetime=strtotime($date);
  $now=time();
  if ($now > $datetime)
   {
    $nb++;
   }
}
 if($nb>0)
 {
      echo  "<br><p style='color:red;text-align:center;font-size:20px;'> <img src='sary/alert.GIF' width='40' height='40'><strong>Alerte,il y a ".$nb." voitures dont la date de retour est expirée</strong></p>";
 }
   ?>
  </div>
  </div>
  <h1 style="text-align:center;" id="titre2">LOCATIONS</h1>
  <div class="col-sm-5 col-sm-push-2" id="Ajouter" style="background-color: #FE96A0;border: 2px solid white">
      <h3 class="h3" style="color: blue;font-family: Consolas">Nouvelle location</h3>
  	<div class="form-group">
  		<form class="form-inline" method="post" action="insertLocation.php">
  			<label class="form-control">Nom du locataire</label>
  			<select class="form-control" name="numcli"  class="input-small form-control">
  				<option>liste numéros clients</option>
  				<?php 
  				$numcli=$bdd->query("select *from locataire");
  				while ($listnumcli=$numcli->fetch())
  				 {?>
  				 	<option value="<?php echo($listnumcli['numero']) ?>"><?php echo($listnumcli['nom']) ?></option>
  				<?php	
  				}
  				$numcli->closeCursor();
  				 ?>
  				
  			</select>
  			<label class="form-control">Numero du véhicule</label>
  			<select class="form-control"  name="numvoiture" class="input-small form-control">
  				<option>

          <?php
          $label=$bdd->query("SELECT numero from voiture where state='ok'");
          $list_label=$label->rowCount();
          if($list_label==0)
          {
            echo "pas de voiture disponible";
          }
          else{
           echo "voiture(s) disponible";
          }
          ?>
          </option>
  				<?php
  				$numvoiture=$bdd->query("SELECT numero from voiture where state='ok'");
  				while ($listvoiture=$numvoiture->fetch()) 
  				{
  					?>
  				<option value="<?php echo $listvoiture['numero'] ?>"><?php echo $listvoiture['numero'] ?></option>
  				<?php
  				}
  				$numvoiture->closeCursor();
  				?>
  			</select>
  			<label class="form-control">Date départ location</label>
  			<input id="date1" class="form-control" name="date1" autocomplete="off" placeholder="année-mois-jour">
  			<label class="form-control">Durée location(jour)</label>
  			<input type="number" class="form-control" name="date2" placeholder="en jour">
        <hr>
  			<button type="submit" class="btn btn-md btn-success 2" name="ajoutloct" id="ajout">Ajouter</button>
 			<button class="btn btn-md btn-danger"  id="ajout1" name="annulLocat" onclick="this.reset">Annuler</button>
  		</form>
  	</div>
    </div>
    <h1 style="text-align:center;" id="renu">Location(s)</h1>
  <div class="col-sm-7 col-sm-push-1" id="rendrevoiture" style="background-color: white;border: 2px solid white;">
    <h3 class="h3" style="color: blue;font-family: Consolas;text-decoration:underline;">tous les voiture non rendu</h3>
    <table class="table1 table table-bordered" style=" border-collapse: collapse; text-align: center; width: 400px;">
      <tr>
        <th>Numero voiture</th>
        <th>Photos</th>
        <th>jours restant</th>
        <th>action</th>
      </tr>
      <?php
      $okay=$bdd->query("SELECT *from location where disonibility='okay'");
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
      while ($okay_list=$okay->fetch()) 
        {
          ?>
        <tr class="okay">
          <td><?php echo $okay_list['numvoiture'] ?></td>
          <td><?php 
          $numdaba=$okay_list['numvoiture'];
          $num_location=$okay_list['numlocation'];
          $photos=$bdd->query("select voiture.photos from location,voiture where voiture.numero=location.numvoiture and location.numvoiture='$numdaba' ");
          $daba=$photos->fetch();
          
             ?><img src="photos<?php echo $daba['photos'] ?>" width="30" height="25"></td>
             <td style="font-size: 15px;">
               <?php
               //calcul du nombre des jours restant
                $now =time();
                $rendre=$okay_list['dateDarrive'];
                 $rendre_time=strtotime($rendre);
                 if($now<$rendre_time)
                 {
                    $maj=datediff($rendre_time,$now);
                 echo $maj['day']." jours ";
                 }
                 else {
                  echo "date expirée";
                 }
               
               ?>
             </td>
             <td ><a href="majlocation.php?numlocation=<?php echo($okay_list['numlocation']) ?>" style='text-decoration: none;background-color: #FDE9E0;font-size: 15px;' id='mimpoly'>rendre</a></td>
        </tr>
        <?php
      }
      $okay->closeCursor();
      ?>
    </table>
    <label class=" label abel-md label-danger" style="cursor: pointer;" id="cancel">Annuler</label>
  </div>
  <!--fermeture div class container-->
  </div>
  <script type="text/javascript">
    $("#rendrevoiture").hide();
  	$("#Ajouter").hide();
    $("#titre2").hide();
    $("#renu").hide();
  	$(document).ready(function(){
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
			$("#Ajouter").show();
       $("#titre2").show();
			$(".a5").hide();
		});
    $("#rendre").click(function()
    {
       $("#rendrevoiture").show();
      $(".a5").hide();
       $("#renu").show();
    });
    $("#cancel").click(function(){
       $("#rendrevoiture").hide();
       $(".a5").show();
        $("#renu").hide();
    });

  	});
  	$("#date1").datetimepicker(
  		{
  			timepicker:false
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