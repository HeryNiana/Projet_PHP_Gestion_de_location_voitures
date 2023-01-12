<?php
	try {

		$bdd = new PDO('mysql:host=localhost;dbname=gestion_location', 'root', '');
	} catch (exeption $e) {
		die('erreur' . $e->getMessage());
	}
	if (isset($_POST['btn-submit'])) {
		$nom = $_POST['name'];
		$pass = $_POST['email'];
		$list = $bdd->query("SELECT emails,noms from users where noms='$nom' and emails='$pass'");
		$rows = $list->rowCount();
		if ($rows == 0) {
			header("location:welcome.php");
		} else {
			session_start();
			$_SESSION['name'] = $_POST['name'];
			header("location:aceuil1.php");
		}
	}
	?>