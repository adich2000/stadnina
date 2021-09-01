<?php
session_start();
include('include/config.php');
$_SESSION['login']=="";
date_default_timezone_set('Europe/Warsaw');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysql_query("UPDATE logi_kursantow SET logout = '$ldate' WHERE id_kursanta = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");
session_unset();
$_SESSION['errmsg']="Jesteś wylogowany";
?>
<script language="javascript">
document.location="./kursant_logowanie.php";
</script>
