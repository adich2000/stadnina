<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
$imie_nazwisko_kursanta=$_POST['imie_nazwisko_kursanta'];
$adres=$_POST['adres'];
$miasto=$_POST['miasto'];
$plec=$_POST['plec'];
$email=$_POST['email'];
$haslo=md5($_POST['haslo']);
$query=mysql_query("insert into kursanci(imie_nazwisko_kursanta,adres,miasto,plec,email,haslo) values('$imie_nazwisko_kursanta','$adres','$miasto','$plec','$email','$haslo')");
if($query)
{
	echo "<script>alert(' Pomyślnie zarejestrowany.  Możesz się teraz zalogować);</script>";
}
}
?>


<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Rejestracja Kursantów</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		
		
		

	</head>

	<body class="login">
		
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
					<img src="assets/images/logo.png" alt="Clip-Two"/>
				</div>
				
				<div class="box-register">
					<form name="registration" id="registration"  method="post">
						<fieldset>
							<legend>
								Zarejestruj się
							</legend>
							<p>
								Wpisz poniżej swoje dane osobowe:
							</p>
							<div class="form-group">
								<input type="text" class="form-control" name="imie_nazwisko_kursanta" placeholder="Imię i nazwisko" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="adres" placeholder="Adres" required>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="miasto" placeholder="Miasto" required>
							</div>
							<div class="form-group">
								<label class="block">
									Płeć
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="plec" value="Kobieta" >
									<label for="rg-female">
										Kobieta
									</label>
									<input type="radio" id="rg-male" name="plec" value="Mężczyzna">
									<label for="rg-male">
										Mężczyzna
									</label>
								</div>
							</div>
							<p>
								Wpisz poniżej dane swojego konta:
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()"  placeholder="Email" required>
									<i class="fa fa-envelope"></i> </span>
									 <span id="user-availability-status1" style="font-size:12px;"></span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="haslo" class="form-control" id="haslo" name="haslo" placeholder="Hasło" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<span class="input-icon">
									<input type="haslo" class="form-control" name="haslo_again" placeholder="Hasło ponownie" required>
									<i class="fa fa-lock"></i> </span>
							</div>
							<div class="form-group">
								<div class="checkbox clip-check check-primary">
									<input type="checkbox" id="agree" value="agree">
									<label for="agree">
										Wyrażam zgodę.
									</label>
								</div>
							</div>
							<div class="form-actions">
								<p>
									Masz już konto?
									<a href="user-login.php">
										Zaloguj się
									</a>
								</p>
								<button type="submit" class="btn btn-primary pull-right" id="submit" name="submit">
									Prześlij <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</fieldset>
					</form>

				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>
		
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "sprawdz_dostepnosc.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	
		
	</body>
	
</html>