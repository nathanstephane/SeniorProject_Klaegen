<?php
session_start();
include("connect.php");

if (strlen($_SESSION['adminLogin'])==0) {
    # code...
    header('location:00login.php');

}
else{
    date_default_timezone_set('Asia/Bangkok');
    $currentTime=date('d-m-Y:i:s A', time());
}
?>