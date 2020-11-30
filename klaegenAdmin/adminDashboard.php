
<?php
//include("includes/sessionTracker.php"); useless
session_start();
include("includes/connect.php");

if (strlen($_SESSION['adminLogin'])==0) {
    # code...
    header('location:00login.php');

}
else{
    date_default_timezone_set('Asia/Bangkok');
    $currentTime=date('d-m-Y:i:s A', time());

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
                            <li class="breadcrumb-item active" aria-current="page">Admin Dashboard</li>
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
                            <h4 class="">Admin Dashboard</h4>
                            
                        </div>

                        <div class="body">
                        <div class="unsolvedComp">
                            <?php $qpending = mysqli_query($con, "select * from complaints where status is null"); $resPending = mysqli_num_rows($qpending); { ?>
                                <p>There are <span> <?php echo htmlentities($resPending)?> </span> complains not solved. <a href="00unprocessed.php">view</a> </p> 
                            <?php }?>
                            </div>
                        <div class="inprocess">
                            <?php $status="Processing"; $Processing = mysqli_query($con, "select * from complaints where status='$status'"); $resProcessing = mysqli_num_rows($Processing); {?>
                                <p>There are <span> <?php echo htmlentities($resProcessing)?> </span> complains being processed. <a href="00processing.php">view</a> </p> 
                            <?php }?>
                            </div>
                        <div class="closed">
                        <?php $status="Closed"; $Closed = mysqli_query($con, "select * from complaints where status='$status'"); $resClosed = mysqli_num_rows($Closed); {?>
                                <p>There are <span> <?php echo htmlentities($resClosed)?> </span> complains closed/solved. <a href="00closed.php">view</a> </p> 
                        <?php }?>
                            </div>

                            
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