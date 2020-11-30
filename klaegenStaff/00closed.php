

<?php
//include("includes/sessionTracker.php"); useless
session_start();
include("includes/connect.php");

if (strlen($_SESSION['staffLogin'])==0) {
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



<link rel="stylesheet" href="../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/vendor/sweetalert/sweetalert.css"/>



<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/site.min.css">

<style>
    td.details-control {
    background: url('../assets/images/details_open.png') no-repeat center center;
    cursor: pointer;
}
    tr.shown td.details-control {
        background: url('../assets/images/details_close.png') no-repeat center center;
    }
</style>

<!-- EDIT POPUP WINDOW SCRIPT -->
<script language="javascript" type="text/javascript" >
var popUpScreen=0;

function popUpWindow(URLStr, left, top, woidth, height){
if(popUpScreen){
if(!popUpScreen.closed){popUpScreen.close();}
}
popUpScreen = open(URLStr, 'popUpScreen', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=yes, width='+500+', height='+600+', left='+left+', top='+top+', screenX='+left+', screenY='+top+'');

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
                            <li class="breadcrumb-item active" aria-current="page">Closed</li>
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
                            <h4 class="align-center">Closed Complaints</h4>

                        </div>

                        <!-- TABLE STARTS HERE -->

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Complaint ID</th>
                                            <th>Student ID</th>
                                            <th>Title/Subject</th>
                                            <th>Date Issued</th>
                                            <th>State</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Complaint ID</th>
                                            <th>Student ID</th>
                                            <th>Title/Subject</th>
                                            <th>Date Issued</th>
                                            <th>State</th>
                                            <th>Details</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php 
                                    $state='Closed';
                                    $query=mysqli_query($con,"select complaints.*,users.idNumber as studentID from complaints join users on users.id=complaints.userID where complaints.status ='$state' and receiver='".$_SESSION['prof']."' "); 

                                    // $altQuery=mysqli_query($con,"select complaints.*,users.idNumber as studentID,staffusers.id as staffID from complaints join users on users.id=complaints.userID join staffusers on staffusers.id=complaints.receiver where complaints.status is null and receiver ='".$_SESSION['prof']."' ");
                                    // if($query){
                                    //     echo "Passed";
                                    // }
                                    while($row=mysqli_fetch_array($query)){

                                    
                                    
                                    ?>

                                    
                                        <tr>
                                            <td><?php echo htmlentities($row['id']); ?></td>
                                            <td><?php echo htmlentities($row['studentID']); ?></td>
                                            <td><?php echo htmlentities($row['title'])?></td>
                                            <td><?php echo htmlentities($row['date_issued']);?></td>
                                            <td><span class="badge badge-danger">Closed</span></td>
                                            <td> <a href="00complaintdetails.php?complaintId=<?php echo htmlentities($row['id']); ?>">View</a> </td>
                                        </tr>

                                    <?php }?>
                                        
                                        
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!-- TABLE ENDS HERE -->

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


<script src="assets/bundles/datatablescripts.bundle.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="../assets/vendor/sweetalert/sweetalert.min.js"></script><!-- SweetAlert Plugin Js -->
<script src="assets/js/pages/tables/jquery-datatable.js"></script>


</body>
</html>

                                    <?php }?>
