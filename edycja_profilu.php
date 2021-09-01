<?php
session_start();
include('include/config.php');
include('include/sprawdz_login.php');
check_login();
date_default_timezone_set('Europe/Warsaw');
$currentTime = date( 'd-m-Y h:i:s A', time () );
if(isset($_POST['submit']))
{
$imie_nazwisko_kursanta=$_POST['imie_nazwisko_kursanta'];
$adres=$_POST['adres'];
$miasto=$_POST['miasto'];
$plec=$_POST['plec'];

$sql=mysql_query("Update kursanci set imie_nazwisko_kursanta='$imie_nazwisko_kursanta',adres='$adres',miasto='$miasto',plec='$plec', data_aktualizacji='$currentTime' where email='".$_SESSION['login']."'");
if($sql)
{
echo "<script>alert('Twój profil został pomyślnie zaktualizowany');</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Kursant | Edycja profilu</title>
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
									<h1 class="mainTitle">Kursant | Edycja profilu</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Kursant </span>
									</li>
									<li class="active">
										<span>Edycja profilu</span>
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
													<h5 class="panel-title">Edycja profilu</h5>
												</div>
												<div class="panel-body">
									<?php $sql=mysql_query("select * from kursanci where email='".$_SESSION['login']."'");
while($data=mysql_fetch_array($sql))
{
?>
													<form role="form" name="edit" method="post">
													

<div class="form-group">
															<label for="imie_nazwisko_kursanta">
																 Nazwa użytkownika
															</label>
	<input type="text" name="imie_nazwisko_kursanta" class="form-control" required="required" value="<?php echo htmlentities($data['imie_nazwisko_kursanta']);?>" >
														</div>


<div class="form-group">
															<label for="adres">
																 Adres
															</label>
					<textarea name="adres" class="form-control"><?php echo htmlentities($data['adres']);?></textarea>
														</div>
<div class="form-group">
															<label for="miasto">
																 Miasto
															</label>
		<input type="text" name="miasto" class="form-control" required="required"  value="<?php echo htmlentities($data['miasto']);?>" >
														</div>
	
<div class="form-group">
									<label for="plec">
																Płeć
															</label>
					<input type="text" name="plec" class="form-control" readonly="readonly"  value="<?php echo htmlentities($data['plec']);?>">
														</div>

<div class="form-group">
									<label for="fess">
																 Email użytkownika
															</label>
					<input type="email" name="email" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['email']);?>">
														</div>
														
														<?php } ?>
														
														
														<button type="submit" name="submit" class="btn btn-o btn-primary">
															Zaktualizuj
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
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
