<?php
session_start();
include("includes/connect.php");
$_SESSION['staffLogin']=="";
date_default_timezone_set('Asia/Bangkok');
$ldate=date('d-m-Y h:i:s A', time ());
session_unset();

?>
<script language="javascript" >
document.location="00staffLogin.php";
</script>