<?php
//inclusion de la fonction qui permet de se connecter à la base de données
include('connection.php');
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
 $num=$_GET['numero'];
 if (isset($num))
  {
 	 $delete=$bdd->query("DELETE from voiture where numero='$num' ");
     header('location:aceuil.php');
 }
 $numcli=$_GET['number'];
 if (isset($numcli)) 
 {
 	 $delete=$bdd->query("DELETE from locataire where numero='$numcli' ");
     header('location:insertLocataire.php');
  }

  $numlocation=$_GET['numlocation'];
  if (isset($numlocation))
   {
    //on recupere d'abord le numero du voiture
    $numdaba=$bdd->query("select voiture.numero from location,voiture where voiture.numero=location.numvoiture and location.numlocation='$numlocation'");
    $numvoiture=$numdaba->fetch();
    $numdaba1=$numvoiture['numero'];
    //puis on fait use mise à jour le table voiture
    $bdd->query("UPDATE voiture set state='ok' where numero='$numdaba1'");
    $bdd->query("UPDATE location set disonibility='dispo' where numlocation='$numlocation'");
    header('location:location.php');
  }

  if (isset($_GET['numerodelete'])) 
  {
    $number=$_GET['numerodelete'];
    $bdd->query("DELETE from location where numlocation='$number'");
    header('location:location.php');
  }

  if (isset($_POST['okay1l']))
       {
        header('location:location.php');
      }

      if (isset($_POST['okayl']))
      {
         $nbjours=$_POST['newdate'];
         $newnumber=$_POST['newnumber'];
         $requete2=$bdd->query("SELECT dateDepart from location where numlocation='$newnumber'");
         $listrequet2=$requete2->fetch();
         $date1=$listrequet2['dateDepart'];
         $date1_ok=strtotime($date1);
        $newdatetime=(($nbjours*24*3600)+$date1_ok);
        $newdate=date('Y-m-d h:i:s',$newdatetime);
        $newtime=strtotime($newdate);
           if ($newtime>=time())
           {
            $prix=$bdd->query("select voiture.loyer_journalier from voiture,location where voiture.numero=location.numvoiture and location.numlocation='$newnumber'");
          $prix_ok=$prix->fetch();
          $prixfix=$prix_ok['loyer_journalier'];
          $newMontant=($prixfix*$nbjours);
          $miseAjour=$bdd->query("UPDATE location set dateDarrive='$newdate',nbjours='$nbjours',montant='$newMontant' where numlocation='$newnumber'");
           }
       header('location:location.php');
      }
?>