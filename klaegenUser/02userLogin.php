<?php
session_start();
include('includes/connect.php');
error_reporting(0);


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
echo $row['id'];
$_SESSION['dinre']=$row['id'];

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

<!doctype html>
<html lang="en">

<head>
<title>Klaegen</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link rel="icon" href="klaegenTileimg.svg" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/vendor/animate-css/vivify.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/site.min.css">

</head>
<body class="theme-cyan font-montserrat">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <div class="bar4"></div>
        <div class="bar5"></div>
    </div>
</div>



<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
            <a class="navbar-brand" href="javascript:void(0);"><img src="../assets/images/KleagenGrandBon.svg" width="30" height="30" class="d-inline-block align-top mr-2" alt="">Klaegen</a>
        </div>
        <div class="card">
            <div class="body">

                <?php 
                if ($errorFeedback) {
                    echo '<div style="background-color:red; color:white; border-radius:4px;">Invalid ID Number or Password</div>'.'<br>
                    <hr>';
                }
               
                ?>
                 
                <p class="lead">Login to your account</p>

                <!-- LOGIN FORM -->

                <form class="form-auth-small m-t-20" name="login" method="POST" >
                    <div class="form-group">
                        <label for="signin-idNumber" class="control-label sr-only">ID Number</label>
                        <input type="text" class="form-control round" id="signin-email" name="idNumber" placeholder="ID Number">
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">Password</label>
                        <input type="password" class="form-control round" id="signin-password" name="password"  placeholder="Password">
                    </div>
                    <div class="form-group clearfix">
                        <label class="fancy-checkbox element-left">
                            <input type="checkbox">
                            <span>Remember me</span>
                        </label>								
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-round btn-block">LOGIN</button>
                    <div class="bottom">
                        <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="03userPageForgotPassword.php">Forgot password?</a></span>
                        <span>Don't have an account? <a href="01userRegister.php">Register</a></span><br>
                        <span>Get to the <a href="../">index</a> page</span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->
    
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>
<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>
