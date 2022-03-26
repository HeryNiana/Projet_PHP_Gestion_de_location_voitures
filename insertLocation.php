<?php
include('connection.php');


function datediff($date1,$date2)
{
	$diff=abs($date1-$date2);//abs retourne la valeur absolue
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
$depart=$_POST['date1'];
$depart1=strtotime($depart);
$daynb=$_POST['date2'];
$arrive=(($daynb*24*3600)+$depart1);
$arrive1=date('Y-m-d h:i:s',$arrive);
//$day=datediff($arrive1,$depart1);
//$daynb=$day['day'];
 if (isset($_POST['ajoutloct']))
     {
        $numcli=$_POST['numcli'];
        $numVoiture=$_POST['numvoiture'];
        //on recupere le prix d'un de la voiture
        $prix=$bdd->query("SELECT loyer_journalier from voiture where numero='$numVoiture'");
        $prix_fetch=$prix->fetch();
        $prixday=$prix_fetch['loyer_journalier'];
        //on calcul le montant
        $montant=($daynb*$prixday);

        $insert=$bdd->query("INSERT into location(numcli,numvoiture,dateDepart,dateDarrive,nbjours,montant,disonibility) values('$numcli','$numVoiture','$depart','$arrive1','$daynb','$montant','okay')");

        $bdd->query("UPDATE voiture set state='ko' where numero='$numVoiture'");

        header('location:location.php');
     }
     else {
      ?> <script>
       var ok= alert('La date de retour doit être supérieure à la date de depart');
       if(ok='OK')
       {
        document.write("<p>Cliquer <a href='location.php'><strong> ici </strong></a> pour corriger</p>");
       }
    </script>
      <?php
     }
  if (isset($_POST['annulLocat'])) 
   {
   	header('location:location.php');
   }
?>