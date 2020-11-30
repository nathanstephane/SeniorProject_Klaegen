<?php
include 'connect.php';
if(isset($_POST['submit'])){
$name=$_POST['fullName'];
$username=$_POST['username'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$office=$_POST['office'];
$position=$_POST['position'];
$phoneNumber=$_POST['phoneNumber'];

//maybe set a state or status variable here for session purpose

$sql="INSERT INTO staffusers (fullName,username,email,password,office,position,phoneNumber)VALUES(?,?,?,?,?,?,?)";
$stmt=$con->prepare($sql);
$stmt->bind_param("ssssssi",$name,$username,$email,$password,$office,$position,$phoneNumber);
$stmt->execute();

$feedback="Success";
}
?> 