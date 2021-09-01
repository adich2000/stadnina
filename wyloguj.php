<?php
session_start();
include('include/config.php');
$_SESSION['dlogin']=="";
date_default_timezone_set('Europe/Warsaw');
$ldate=date( 'd-m-Y h:i:s A', time () );
mysql_query("UPDATE logi_instruktorow  SET wylogowanie = '$ldate' WHERE id_instruktora = '".$_SESSION['id']."' ORDER BY id DESC LIMIT 1");
session_unset();
$_SESSION['errmsg']="Jesteś wylogowany";
?>
<script language="javascript">
document.location="index.php";
</script>
