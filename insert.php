<?php
//inclusion de la fonction qui permet de se connecter à la base de données
include('connection.php');
     if (isset($_POST['okay']))
      {
        $designation1=$_POST['designation'];
        $designation=strtoupper($designation1);
        $loyer1=$_POST['loyer'];
        $loyer=strtoupper($loyer1);
        $nomphoto=$_FILES['photos']['name'];
        $file_tmp_name=$_FILES['photos']['tmp_name'];
        $upload_dir="photos";
        $imgExt=strtolower(pathinfo($nomphoto,PATHINFO_EXTENSION));
        $valid_extension= array('jpg','jpeg','png','gif','pdf');
        $picprofile=rand(1000,100000).'.'.$imgExt;
        move_uploaded_file($file_tmp_name,$upload_dir.$picprofile);
        $insert=$bdd->query("INSERT into voiture(designation,loyer_journalier,photos,state) values ('$designation',$loyer,'$picprofile','ok')");
        header('location:aceuil.php');
      }
     if (isset($_POST['okay1']))
     {
        header('location:aceuil.php');
     }

     if (isset($_POST['okayl']))
      {
        if(!empty($_POST['name']) && (!empty($_POST['adresse'])))
        {
          $nom=$_POST['name'];
          $nom1=strtoupper($nom);
          $adresse=$_POST['adresse'];
          $adresse1=strtoupper($adresse);
          $bdd->query("INSERT into locataire(nom,adresse) values ('$nom1','$adresse1')");
          header('location:insertLocataire.php');
        }
        else
        {
            echo "<script>alert('veuillez remplir ces formulaire')</script>";
        }
         
     }

     if (isset($_POST['okay1l'])) 
     {
         header('location:insertLocataire.php');
     }

?>
