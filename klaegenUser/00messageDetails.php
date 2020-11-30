
<!-- SESSION TRACKER -->
<?php
session_start();
error_reporting();

include("includes/connect.php");

if(strlen($_SESSION['login'])==0){
header('location:02userLogin.php');
}
else{   ?>




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
                            <li class="breadcrumb-item active" aria-current="page">Message Details</li>
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
                            <h4>Reply</h4>

                        </div>

            <div class="body message_reply">
               <?php 

            //    $req=mysqli_query($con,"select * from anonymous_complaint where sender='".$_SESSION['login']."' and id='".$_GET['messageId']."' ");

               $req=mysqli_query($con,"select * from anonymous_complaint where id='".$_GET['messageId']."' ");


            // $query=mysqli_query($con,"select complaints.*,users.name as name,users.surname as surname,users.id as usrid,staffusers.fullName as fully,complaintcategory.categoryName as categName from complaints join users on users.id=complaints.userID join staffusers on staffusers.id=complaints.receiver join complaintcategory on complaintcategory.id=complaints.categoryID where userID='".$_SESSION['id']."' and complaints.id='".$_GET['complaintId']."'"); 
            
            
            while($row=mysqli_fetch_array($req))
            
            
            {?>

             <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="body">
                           
                            <div class="media mleft">
                                <div class="media-left"><a href="javascript:void(0);"><img alt="" class="media-object rounded" src="../assets/images/user.png" width="64" height="64"></a></div>
                                <div class="media-body">
                                    <h4 class="media-heading">You said:</h4>
                                   <?php echo htmlentities($row['message'])?><i>  --Sent on: <?php echo htmlentities($row['dateSent']) ?></i>

                                   <?php $query2=mysqli_query($con, "select reply_anonymous.*,staffusers.fullName as thename from reply_anonymous join anonymous_complaint on anonymous_complaint.id=reply_anonymous.messageID join staffusers on staffusers.id=reply_anonymous.sender where messageID='".$_GET['messageId']."'");
                                   
                                   $getter = mysqli_fetch_array($query2);
                                   if($getter>0){
                                   ?>
                                    <div class="media m-t-40">
                                        <div class="media-left"><a href="javascript:void(0);"><img alt="" class="media-object rounded" src="../assets/images/user.png" width="64" height="64"></a></div>
                                        <div class="media-body">
                                            <h4 class="media-heading"><?php echo htmlentities($getter['thename'])?> Replied:</h4>
                                            <?php echo htmlentities($getter['reply'])?><i>  --Sent on: <?php echo htmlentities($getter['dateReplied']) ?></i>
                                             </div>
                                    </div>
                                   <?php } else { ?>

                                    <div class="body m-t-40">
                                        
                                        <div class="media-body">
                                            <h6 class="align-center">There is no reply for this message yet</h6>
                                           
                                             </div>
                                    </div>
                                    
                                    <?php }?>
                                </div>
                            </div>
                           
                            
                        </div>
                    </div>
                </div>
            </div>
<?php }?>


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