<html>

<head>
	<meta charset="utf-8">
	<title>Login administrateur</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style>
		#btn-submit {
			padding: 10px 20px;
			background: #555;
			border: 0;
			color: #FFF;
			display: inline-block;
			margin-top: 20px;
			cursor: pointer;
		}

		#btn-submit:disabled {
			padding: 10px 20px;
			background: #CCC;
			border: 0;
			color: #FFF;
			display: inline-block;
			margin-top: 20px;
			cursor: no-drop;
		}

		.validation-error {
			color: #FF0000;
		}

		.input-control {
			padding: 10px;
		}

		.input-group {
			margin-top: 10px;
		}

		h1 {
			color: white;
			text-align: center;
			text-shadow: 2px 3px 3px rgb(255, 170, 0) inset;
			text-decoration: underline;
			font-style: italic;
			font-family: Consolas;
			font-size: 25px;
			margin-top: 30px;
		}

		div.div {
			background-color: rgb(20, 190, 255);
			margin-left: 30px;
		}

		legend {
			font-size: 25px;
			font-style: italic;
			color: red;
		}

		body {
			background-image: url(image/back.jpg);
			-webkit-background-size: cover;
			background-size: cover;
			background-attachment: fixed;
		}
	</style>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-4 col-lg-4"></div>
			<div class="col-md-4 col-sm-4 col-lg-4">
				<h1>Bienvenue, veuillez-vous connecter</h1>
				<div class="div">
					<form id="frm" method="post" action="index2.php">
						<fieldset>
							<legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								S'authentifier:</legend>
							<div class="form-group" style="padding:10px;">
								<div class="input-group ">Adresse e-mail <span class="email-validation validation-error"></span></div>
								<div>
									<input type="text" class="form-control" name="email" id="email" class="input-control" onblur="validate()" required="" />
								</div>
							</div>
							<div class="form-group" style="padding:10px;">
								<div class="input-group">Mot de passe <span class="name-validation validation-error"></span></div>
								<div>
									<input type="password" class="form-control" name="name" id="name" class="input-control" onblur="validate()" required="" />
								</div>
							</div>
							<div class="form-group" style="padding:10px;">
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<button type="submit" class="btn btn-primary" name="btn-submit" id="btn-submit" disabled="disabled">
									Connexion</button>
								<hr>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;
								<button type="submit" class="btn btn-danger" name="Annuler" onclick="this.reset">Annuler </button>
							</div>
						</fieldset>
					</form>
					<hr>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-lg-4"></div>
		</div>
	</div>

</body>

</html>
<script src="js/jquery.js"></script>
<script>
	function validate() {

		var valid = true;
		valid = checkEmpty($("#name"));
		valid = valid && checkEmail($("#email"));

		$("#btn-submit").attr("disabled", true);
		if (valid) {
			$("#btn-submit").attr("disabled", false);
		}
	}

	function checkEmpty(obj) {
		var name = $(obj).attr("name");
		$(".name-validation").html("");
		$(obj).css("border", "");
		if ($(obj).val() == "") {
			$(obj).css("border", "#FF0000 1px solid");
			$(".name-validation").html("Required");
			return false;
		}

		return true;
	}

	function checkEmail(obj) {
		var result = true;

		var name = $(obj).attr("name");
		$(".name-validation").html("");
		$(obj).css("border ", "");

		result = checkEmpty(obj);

		if (!result) {
			$(obj).css("border", "#FF0000 1px solid");
			$(".name-validation").html("Required");
			return false;
		}
		//pour verifier si l'adresse mail saisi est correcte
		var email_regex = /^([a-zA-Z0-9_.+*-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,3})+$/;
		result = email_regex.test($(obj).val());

		if (!result) {
			$(obj).css("border", "#FF0000 1px solid");
			$(".email-validation").html("Invalid");
			return false;
		}

		return result;
	}
</script>