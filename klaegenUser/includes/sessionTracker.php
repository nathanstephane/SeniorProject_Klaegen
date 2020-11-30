<?php
session_start();
error_reporting();

include("connect.php");

if(strlen($_SESSION['login'])==0){
header('location:02userLogin.php');
}
else{}
?>