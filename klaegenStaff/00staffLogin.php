<?php
session_start();
//error_reporting(0);
include("includes/connect.php");
if (isset($_POST['submit'])) {
    # code...
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $query="SELECT * FROM staffusers WHERE username=? and password=?";
    $stmt=$con->prepare($query);
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();

    $result=$stmt->get_result();
    $row=$result->fetch_assoc();

    if ($row>0) {
        # code...
        $redir="00staffDashboard.php";
        $_SESSION['staffLogin']=$_POST['username'];
      //  $_SESSION['id']=$num['id'];
        $_SESSION['prof']=$row['id'];
    
        $host=$_SERVER['HTTP_HOST'];
        $url=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$url/$redir");
        
        exit();
    }
    else{
        $redir="00staffLogin.php";
        $_SESSION['errorFeedback']="Incorrect credentials";
        $host=$_SERVER['HTTP_HOST'];
        $url=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$url/$redir");
        exit();

    }
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

<div class="auth-main2 particles_js">
    <div class="auth_div vivify fadeInTop">
        <div class="card">            
            <div class="body">
                <div class="login-img">
                    <img class="img-fluid" src="../assets/images/KlaegenBGLogo.png" />
                </div>
                <form class="form-auth-small" method="POST" >
                    <div class="mb-3">
                        <p class="lead">Staff Login Page</p>
                    </div>
                    <div class="form-group">
                        <label for="signin-email" class="control-label sr-only">Username</label>
                        <input type="text" class="form-control round" name="username" id="signin-email" value="" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">Password</label>
                        <input type="password" class="form-control round" name="password" id="signin-password" value="" placeholder="Password">
                    </div>
                   
                    <button type="submit" class="btn btn-primary btn-round btn-block" name="submit">LOGIN</button>
                    <div class="mt-4">
                        <!-- <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="#">Forgot password?</a></span> -->
                        <!-- <span>Don't have an account? <a href="#">Register</a></span> -->
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
