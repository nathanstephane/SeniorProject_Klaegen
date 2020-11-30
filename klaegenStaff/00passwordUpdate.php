
<!-- SESSION TRACKER -->
<?php
session_start();
error_reporting(0);

include("includes/connect.php");

if(strlen($_SESSION['staffLogin'])==0){
header('location:00staffLogin.php');
}
else{  
    date_default_timezone_set('Asia/Bangkok');
    $currentTime=date('d-m-Y:i:s A', time());

    if(isset($_POST['submit'])){
        $query=mysqli_query($con,"SELECT password from staffusers where password='".md5($_POST['password'])."' && username='".$_SESSION['staffLogin']."' ");
        $num=mysqli_fetch_array($query);

        if($num>0){
            $updateQuery=mysqli_query($con,"update staffusers set password='".md5($_POST['newpassword'])."' where username='".$_SESSION['staffLogin']."' ");
            $feedback="Password successfully updated";
        }
        else{
            $errorFeedback="There was an error updating your password, Please try again";
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

<!-- ADDITIONAL SCRIPT -->
<script>

function valid(){
    if(document.chngpwd.password.value==""){
        alert("Please insert your current password");
        document.chngpwd.password.focus();
        return false;
    }
    else if(document.chngpwd.newpassword.value==""){
        alert("Please insert your new password ");
        document.chngpwd.newpassword.focus();
        return false;
        }
        else if(document.chngpwd.confirmpassword.value==""){
            alert("Please confirm your new password");
            document.chngpwd.confirmpassword.focus();
            return false;
        }
        else if(document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value){
            alert("Whoops! Looks like your new password do not match.");
            document.chngpwd.confirmpassword.focus();
            document.chngpwd.newpassword.focus();
            return false;
        }
        return true;
}

</script>


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

    <!-- Theme Setting -->
<?php include("htmlPagesIncludes/themeSetting.php"); ?>

    <!-- Overlay For Sidebars -->
<div class="overlay"></div>

<div id="wrapper">
    <!-- Top Navbar -->
    <?php include("htmlPagesIncludes/topnavbar.php"); ?>
    
    <!-- Search bar -->
    <?php include("htmlPagesIncludes/searchbar.php");?>
    
    <!-- Mega Menu -->
    <?php include("htmlPagesIncludes/megaMenu.php");?>

    <!-- Message Icon -->
    <?php include("htmlPagesIncludes/messageIcon.php");?>

    <!-- Sidebar Panel -->
    <?php include("htmlPagesIncludes/sidebarPanel.php"); ?>

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Klaegen</a></li>
                            <li class="breadcrumb-item"><a href="#">Page</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Password Update</li>
                            </ol>
                        </nav>
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">

                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card planned_task">
                        <div class="header">
                        
                            <ul class="header-dropdown dropdown">                                
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                               
                            </ul>
                        </div>
                        <div class="body">
                            <h4 class="align-center">Password Change.</h4>
                        </div>

                        <?php if($feedback)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Noice!</b> <?php echo htmlentities($feedback);?></div>
                      <?php }?>

   <?php if($errorFeedback)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Whoops!</b> </b> <?php echo htmlentities($errorFeedback);?></div>
                      <?php }?>

                        <div class="body password_change">
                        
                        <form action="" method="POST" name="chngpwd" onSubmit="return valid();">
                    
                        <div class="form-group">
                            <div class="row">
                            <label for="current" class="col-sm-4 align-center m-t-5 ">Enter your current password </label>
                            <div class="col-sm-4">
                            <input type="password" name="password" required="required" class="form-control "></div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="row">
                            <label for="new" class="col-sm-4 align-center m-t-5 ">Enter your new password </label>
                            <div class="col-sm-4">
                            <input type="password" name="newpassword" required="required" class="form-control  "></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <label for="confirm" class="col-sm-4 align-center m-t-5 ">Confirm your new password </label>
                            <div class="col-sm-4">
                            <input type="password" name="confirmpassword" required="required" class="form-control "></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row"> 
                                <span class="col-sm-4 align-center m-t-5"></span>
                                <div class="col-sm-4 align-center">
                        <button type="submit" name="submit" class="btn btn-primary ">Update</button>
                        </div>        
                    
                            </div>
                        </div>

                        </form>

                        </div>
                            
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</div>

<!-- Javascript -->
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>
<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>
<?php } ?>