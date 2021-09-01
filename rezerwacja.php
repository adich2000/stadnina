<?php
session_start();
include('include/config.php');
include('include/sprawdz_login.php');
check_login();

if(isset($_POST['submit']))
{

$specjalizacja=$_POST['Specjalizacja_instruktora'];
$id_instruktora=$_POST['id_instruktora'];
$id_kursanta=$_SESSION['id'];
$cena=$_POST['cena'];
$data_rezerwacji=$_POST['data_rezerwacji'];
$czas_rezerwacji=$_POST['czas_rezerwacji'];
$status_kursanta=1;
$status_instruktora=1;

	$query=mysql_query("insert into rezerwacje(specjalizacja_instruktora,id_instruktora, id_kursanta, cena, data_rezerwacji, czas_rezerwacji,status_kursanta,status_instruktora) values('$specjalizacja','$id_instruktora','$id_kursanta','$cena','$data_rezerwacji','$czas_rezerwacji','$status_kursanta','$status_instruktora')");
	if($query)
	{
		echo "<script>alert('Twój termin został pomyślnie zarezerwowany');</script>";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Kursant | Rezerwacja lekcji</title>
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
		<link href="vendor/bootstrap-czas_rezerwacjipicker/bootstrap-czas_rezerwacjipicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<script>
function znajdz_instruktora(val) {
	$.ajax({
	type: "POST",
	url: "znajdz_instruktora.php",
	data:'specilizationid='+val,
	success: function(data){
		$("#id_instruktora").html(data);
	}
	});
}
</script>	


<script>
function znajdz_cena(val) {
	$.ajax({
	type: "POST",
	url: "znajdz_instruktora.php",
	data:'id_instruktora='+val,
	success: function(data){
		$("#cena").html(data);
	}
	});
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
									<h1 class="mainTitle">Kursant | Rezerwacja lekcji</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Kursant</span>
									</li>
									<li class="active">
										<span>Zarezerwuj lekcję</span>
									</li>
								</ol>
						</section>
						
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Zarezerwuj lekcję</h5>
												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
								<?php echo htmlentities($_SESSION['msg1']="");?></p>	
													<form role="form" name="book" method="post" >
														


<div class="form-group">
															<label for="Specjalizacja_Instruktora">
																Specjalizacja
															</label>
							<select name="Specjalizacja_instruktora" class="form-control" onChange="znajdz_instruktora(this.value);" required="required">
																<option value="">Wybierz specjalizację</option>
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
															<label for="id_instruktora">
																Instruktorzy
															</label>
						<select name="id_instruktora" class="form-control" id="id_instruktora" onChange="znajdz_cena(this.value);" required="required">
						<option value="">Wybierz instruktora</option>
						</select>
														</div>





														<div class="form-group">
															<label for="cena">
																Cena
															</label>
					<select name="cena" class="form-control" id="cena"  readonly>
						
						</select>
														</div>
														
<div class="form-group">
															<label for="AppointmentDate">
																Data
															</label>
									<input class="form-control datepicker" name="data_rezerwacji"  type="date" required="required">
														</div>
														
<div class="form-group">
															<label for="czas_rezerwacji">
														
														Czas
													
															</label>
									<input class="form-control datepicker" name="czas_rezerwacji" type="time" required="required">
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
		<script src="vendor/bootstrap-czas_rezerwacjipicker/bootstrap-czas_rezerwacjipicker.min.js"></script>
		
		<script src="assets/js/main.js"></script>
		
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	</body>
</html>
