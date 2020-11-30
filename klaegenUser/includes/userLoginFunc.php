<?php
include('connect.php');
session_start();

if (isset($_POST['submit'])){
    $userId=$_POST['idNumber'];
    $password=md5($_POST['password']);
$req="SELECT * FROM users WHERE idNumber=? and password=?";
$stmt=$con->prepare($req);
$stmt->bind_param("is",$userId,$password);
$stmt->execute();

$result=$stmt->get_result();
$row=$result->fetch_assoc();




 if($row>0){

//echo $_POST['idNumber']." ";
    
$state=1; //Indicate that the user succeded login in
$redir="00userStarter.php"; //redirects user to the user dashboard
$_SESSION['login']=$_POST['idNumber']; //using idNumber to keep track of users sessions.As every ID is unique

$_SESSION['id']=$row['id'];  //Since the foreign key has to be primary Key
//other wise it would be better to use idNumber instead. Or a composite key of the primary and the Id number.But mehhh too much wrk.


$host=$_SERVER['HTTP_HOST']; //using http_host will give us directly the domain name no matter where we execute the request from
    //echo $host." ";

$userIP=$_SERVER['REMOTE_ADDR'];
    //echo $userIP." ";

$loginQuery=mysqli_query($con,"INSERT INTO logusers(uid,userID,userIP,state) VALUES('".$_SESSION['id']."','".$_SESSION['login']."','$userIP','$state')");
    echo "Statement parsed"." ";

$url=rtrim(dirname($_SERVER['PHP_SELF']),'/\\'); //current directory location

echo $row['password'];
// //redirecting user to dashboard
header("location:http://$host$url/$redir");
echo $host.$url."/".$redir;
exit();
}
 else{
       $state=0;
      // echo $state;
       $_SESSION['login']=$_POST['idNumber'];
       $userIP=$_SERVER['REMOTE_ADDR'];
       //echo $_SESSION['login'];
    
    $logFailed=mysqli_query($con,"INSERT INTO logusers(userID,userIP,state) VALUES ('".$_SESSION['login']."','$userIP','$state')");
    //echo "forbid!";
    $errorFeedback='Incorrect username or password';
    $redir="00userStarter.php"; //Logical error here

    

 }
}

if (isset($_POST['change_password'])) {
    


}


?>