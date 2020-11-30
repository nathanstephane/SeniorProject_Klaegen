<?php
include 'connect.php';
if(isset($_POST['submit'])){
$name=$_POST['name'];
$surname=$_POST['surname'];
$idNumber=$_POST['idNumber'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$dorm=$_POST['dorm'];
$roomNumber=$_POST['roomNumber'];
//maybe set a state or status variable here for session purpose

$sql="INSERT INTO users (name,surname,email,password,idNumber,dorm,roomNumber)VALUES(?,?,?,?,?,?,?)";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssssisi",$name,$surname,$email,$password,$idNumber,$dorm,$roomNumber);
$stmt->execute();

$feedback="Success";
}
?>