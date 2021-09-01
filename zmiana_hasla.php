<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/sprawdz_login.php');
check_login();
date_default_timezone_set('Europe/Warsaw');
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$sql=mysql_query("SELECT haslo FROM  kursanci where haslo='".md5($_POST['cpass'])."' && email='".$_SESSION['login']."'");
$num=mysql_fetch_array($sql);
if($num>0)
{
 $con=mysql_query("update kursanci set haslo='".md5($_POST['npass'])."', data_aktualizacji='$currentTime' where email='".$_SESSION['login']."'");
$_SESSION['msg1']="Hasło zostało zmienione pomyślnie !!!";
}
else
{
$_SESSION['msg1']="Bieżące hasło jest błędne!!!";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Kursant - Zmiana hasła</title>
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
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
<script type="text/javascript">
function valid()
{
if(document.chngpwd.cpass.value=="")
{
alert("Bieżące hasło jest puste !!!");
document.chngpwd.cpass.focus();
return false;
}
else if(document.chngpwd.npass.value=="")
{
alert("Nowe hasło jest puste !!!");
document.chngpwd.npass.focus();
return false;
}
else if(document.chngpwd.cfpass.value=="")
{
alert("Potwierdź hasło jest puste !!!");
document.chngpwd.cfpass.focus();
return false;
}
else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
{
alert("Pole Hasło i Potwierdź hasło nie zgadzają się !!!");
document.chngpwd.cfpass.focus();
return false;
}
return true;
}
</script>

	</head>
	<body>
		<div id="app">		
<?php include('include/pasek_boczny.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Kursant - Zmiana hasła</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Kursant</span>
									</li>
									<li class="active">
										<span>Zmiana hasła</span>
									</li>
								</ol>
							</div>
						</section>
						
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Zmiana hasła</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
								<?php echo htmlentities($_SESSION['msg1']="");?></p>	
													<form role="form" name="chngpwd" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="exampleInputEmail1">
																Obecne hasło
															</label>
							<input type="password" name="cpass" class="form-control"  placeholder="Wprowadź obecne hasło">
														</div>
														<div class="form-group">
															<label for="exampleInputPassword1">
																Nowe hasło
															</label>
					<input type="password" name="npass" class="form-control"  placeholder="Wprowadź nowe hasło">
														</div>
														
<div class="form-group">
															<label for="exampleInputPassword1">
																Potwierdź hasło
															</label>
									<input type="password" name="cfpass" class="form-control"  placeholder="Potwierdź hasło">
														</div>
														
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Zatwierdź
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									
								</div>
							</div>
						
					</div>
				</div>
			</div>
		</div>
		
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		
		<script src="assets/js/main.js"></script>
		
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		
	</body>
</html>
