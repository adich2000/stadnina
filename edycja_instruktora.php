<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/sprawdz_login.php');
check_login();
$id_instruktora=intval($_GET['id']);
if(isset($_POST['submit']))
{
	$specjalizacje_instruktorow=$_POST['specjalizacje_instruktorow'];
$imie_nazwisko_instruktora=$_POST['imie_nazwisko_instruktora'];
$adres=$_POST['adres'];
$cena=$_POST['cena'];
$nr_telefonu=$_POST['nr_telefonu'];
$email_instruktora=$_POST['email_instruktora'];
$sql=mysql_query("Update instruktorzy set specjalizacja='$specjalizacje_instruktorow',imie_nazwisko_instruktora='$imie_nazwisko_instruktora',adres='$adres',cena='$cena',nr_telefonu='$nr_telefonu',email_instruktora='$email_instruktora' where id='$id_instruktora'");
if($sql)
{
echo "<script>alert('Dane instruktora zaktualizowane pomyślnie');</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Edytuj dane instruktora</title>
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
									<h1 class="mainTitle">Admin | Edytuj dane instruktora</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Edytuj dane instruktora</span>
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
													<h5 class="panel-title">Dodaj instruktora</h5>
												</div>
												<div class="panel-body">
									<?php $sql=mysql_query("select * from instruktorzy where id='$id_instruktora'");
while($data=mysql_fetch_array($sql))
{
?>
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
															<label for="specjalizacje_instruktorow">
																Specjalizacja instruktora
															</label>
							<select name="specjalizacje_instruktorow" class="form-control" required="required">
					<option value="<?php echo htmlentities($data['specjalizacja']);?>">
					<?php echo htmlentities($data['specjalizacja']);?></option>
<?php $ret=mysql_query("select * from specjalizacje_instruktorow");
while($row=mysql_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['specjalizacja']);?>">
																	<?php echo htmlentities($row['specjalizacja']);?>
																</option>
																<?php } ?>
																
															</select>
														</div>

<div class="form-group">
															<label for="doctorname">
																Imię i nazwisko instruktora
															</label>
	<input type="text" name="imie_nazwisko_instruktora" class="form-control" value="<?php echo htmlentities($data['imie_nazwisko_instruktora']);?>" >
														</div>


<div class="form-group">
															<label for="adres">
																 Adres instruktora
															</label>
					<textarea name="adres" class="form-control"><?php echo htmlentities($data['adres']);?></textarea>
														</div>
<div class="form-group">
															<label for="fess">
																 Cena lekcji
															</label>
		<input type="text" name="cena" class="form-control" required="required"  value="<?php echo htmlentities($data['cena']);?>" >
														</div>
	
<div class="form-group">
									<label for="fess">
																 Telefon instruktora
															</label>
					<input type="text" name="nr_telefonu" class="form-control" required="required"  value="<?php echo htmlentities($data['nr_telefonu']);?>">
														</div>

<div class="form-group">
									<label for="fess">
																 Email instruktora
															</label>
					<input type="email" name="email_instruktora" class="form-control"  readonly="readonly"  value="<?php echo htmlentities($data['email_instruktora']);?>">
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
