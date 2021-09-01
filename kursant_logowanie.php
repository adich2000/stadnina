<?php
session_start();
error_reporting(0);
include("include/config.php");
if(isset($_POST['submit']))
{
$ret=mysql_query("SELECT * FROM kursanci WHERE email='".$_POST['nazwa_uzytkownika']."' and haslo='".md5($_POST['haslo'])."'");
$num=mysql_fetch_array($ret);
if($num>0)
{
$extra="glowna.php";//
$_SESSION['login']=$_POST['nazwa_uzytkownika'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$ip_uzytkownika=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysql_query("insert into logi_kursantow(id_kursanta,nazwa_uzytkownika,ip_uzytkownika,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$ip_uzytkownika','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['login']=$_POST['nazwa_uzytkownika'];	
$ip_uzytkownika=$_SERVER['REMOTE_ADDR'];
$status=0;
mysql_query("insert into logi_kursantow(nazwa_uzytkownika,ip_uzytkownika,status) values('".$_SESSION['login']."','$ip_uzytkownika','$status')");
$_SESSION['errmsg']="Nieprawidłowa nazwa użytkownika lub hasło";
$extra="kursant_logowanie.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Logowanie | kursanta</title>
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
					<h2> LOGOWANIE KURSANTA </h2>
				</div>

				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								Zaloguj się na swoje konto
							</legend>
							<p>
								Proszę wpisać nazwę i hasło, aby się zalogować.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
							<div class="form-group">
								<span class="input-icon">
									<input type="text" class="form-control" name="nazwa_uzytkownika" placeholder="Nazwa użytkownika" required>
									<i class="fa fa-user"></i> </span>
							</div>
							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="password" class="form-control password" name="haslo" placeholder="Hasło" required>
									<i class="fa fa-lock"></i>
									 </span>
							</div>
							<div class="form-actions">
								
								<button type="submit" class="btn btn-primary pull-right" name="submit">
									Zaloguj <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
							<div class="new-account">
								Nie posiadasz konta?
								<a href="rejestracja.php">
									Utwórz je tutaj.
								</a>
							</div>
						</fieldset>
					</form>
			
				</div>
				
				<div>
					<a href = '/stadnina/index.html'><button type="button" class="btn btn-primary pull-right">Powrót do strony głównej</button></a>
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
	
	</body>
</html>