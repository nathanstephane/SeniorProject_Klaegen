
<!-- SESSION TRACKER -->
<?php
session_start();
error_reporting();

include("includes/connect.php");

if(strlen($_SESSION['login'])==0){
header('location:02userLogin.php');
}
else{  
    date_default_timezone_set('Asia/Bangkok');
    $currentTime=date('d-m-Y:i:s A', time());
    // echo $_SESSION['dinre']; echo"blab";  

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

    <!-- Theme Setting -->

    

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
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Student Dashboard</li>
                            </ol>
                        </nav>
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="04createComplaint.php" class="btn btn-sm btn-primary btn-round" title="">Add New</a>
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
                            <h4>Student Dashboard</h4>

                        </div>

                        <div class="body complaints_counts">
                            <?php 
                            $qpending = mysqli_query($con, "select * from complaints where userID='".$_SESSION['id']."' and status is null"); 
                            $resPending = mysqli_num_rows($qpending);

                            $qAll = mysqli_query($con, "select * from complaints where userID='".$_SESSION['id']."' ");
                            $resAll = mysqli_num_rows($qAll);
                             { ?>

                                <p>You've made <span><?php echo htmlentities($resAll); ?></span> Normal complaints. Among these complaints: </p>
                                <div class="pending"><span><?php echo htmlentities($resPending); ?></span> complaint(s) still pending. <a href="00pending.php">View.</a></div>

                            <?php }?>

                                <br>

                                <?php
                                $status="Processing";
                                $qProcessing=mysqli_query($con,"select * from complaints where userID='".$_SESSION['id']."' and status='$status' ");
                                $resProcessing = mysqli_num_rows($qProcessing);
                                {?>
                                <div class="processing"><span><?php echo htmlentities($resProcessing)?></span> complaint(s) being processed. <a href="00processing.php">View</a> </div>
                                <?php }?>

                                <br>
                                <?php
                                $status="Closed";
                                $qClosed=mysqli_query($con,"select * from complaints where userID='".$_SESSION['id']."' and status='$status'");
                                $resClosed=mysqli_num_rows($qClosed);
                                {?>
                                <div class="closed"><span><?php echo htmlentities($resClosed) ?></span> complaints are closed. <a href="00closed.php">View</a> </div>
                            </div>
                                <?php }?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
</div>
<?php include("htmlPagesIncludes/themeSetting.php"); ?>

<!-- Javascript -->
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>
<script src="assets/bundles/mainscripts.bundle.js"></script>
</body>
</html>
<?php } ?>