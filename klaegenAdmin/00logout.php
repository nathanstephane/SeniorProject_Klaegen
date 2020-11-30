<?
session_start();
$_SESSION['adminlogin']=="";
session_unset();

$_SESSION['feedbackLogout']="You're logged out";
?>

<script language="javascript" >
    document.location="00login.php"
</script>