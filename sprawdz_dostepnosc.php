<?php 
require_once("include/config.php");
if(!empty($_POST["email"])) {
	$email= $_POST["email"];
	
		$result =mysql_query("SELECT email FROM kursanci WHERE email='$email'");
		$count=mysql_num_rows($result);
if($count>0)
{
echo "<span style='color:red'>Email już istnieje .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'>Email dostępny przy rejestracji .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
