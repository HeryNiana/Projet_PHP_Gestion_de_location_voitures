<?php

try{

		$bdd=new PDO('mysql:host=localhost;dbname=gestion_location','root','');
	}
	catch(exeption $e)
	{
		die('erreur'.$e->getMessage());
	}
?>