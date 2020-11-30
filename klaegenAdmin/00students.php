

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

if(isset($_GET['uid']) && $_GET['action']=='del')
{
$userid=$_GET['uid'];
$query=mysqli_query($con,"DELETE from users where id='$userid'");
header('location:00students.php');
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





<link rel="stylesheet" href="../assets/vendor/sweetalert/sweetalert.css"/>



<link rel="stylesheet" href="../assets/vendor/dropify/css/dropify.min.css">
<link rel="stylesheet" href="../assets/vendor/jquery-steps/jquery.steps.css">


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
                            <li class="breadcrumb-item active" aria-current="page">Student Users</li>
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
                            <h2>Displays a list of all the students</h2>
                            <ul class="header-dropdown dropdown">                                
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                              
                            </ul>
                        </div>
                        <div class="body">
                            <h4 style="text-align: center;">Student users</h4>

                        </div>
                        
                       
                        

                        <!-- TABLE STARTS HERE -->

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Name</th>
                                            <th>Dorm</th>
                                            <th>Room Number</th>
                                            <th>Number of complaints</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>ID Number</th>
                                            <th>Name</th>
                                            <th>Dorm</th>
                                            <th>Room Number</th>
                                            <th>Number of complaints</th>
                                            <th>Options</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                    <?php 
                                    $qry=mysqli_query($con,"SELECT * from users");

                                    // $qry2=mysqli_query($con,"SELECT COUNT(*) as numbr FROM complaints");

                                    $qry3=mysqli_query($con,"SELECT users.id, users.idNumber,users.name,users.dorm,users.roomNumber,COUNT(complaints.userID) as total FROM users LEFT JOIN complaints ON users.id=complaints.userID GROUP BY users.id, users.idNumber,users.name,users.dorm,users.roomNumber");
                                    if(!$qry3){
                                        echo "Failed";
                                    }
                                    while($row=mysqli_fetch_array($qry3)){

                                    
                                    
                                    ?>

                                    
                                        <tr>
                                            <td><?php echo htmlentities($row['idNumber']); ?></td>
                                            <td><?php echo htmlentities($row['name']); ?></td>
                                            <td><?php echo htmlentities($row['dorm'])?></td>
                                            <td><?php echo htmlentities($row['roomNumber']);?></td>
                                            <td><?php echo htmlentities($row['total'])?></td>

                                            <td>
                                            <input type="button" name="view" value="Details" id="<?php echo $row['id']; ?>" class="btn btn-info view_data">
                                            <a href="00students.php?uid=<?php echo $row['id']; ?>&&action=del" data-toggle="tooltip" title="Warning: This will completely remove the user." onclick=""><button class="btn btn-danger " >Delete</button></a>
                                        </td>
                                            
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

   




<script src="assets/js/pages/ui/dialogs.js"></script>



<script src="../assets/vendor/dropify/js/dropify.js"></script>
<script src="../assets/vendor/jquery-steps/jquery.steps.js"></script><!-- JQuery Steps Plugin Js -->


<script src="assets/js/pages/forms/dropify.js"></script>
<script src="assets/js/pages/forms/form-wizard.js"></script>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
    
</script>

</body>
</html>

<div id="dataModal" class="modal fade launch-pricing-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title " style="margin-left: 50px;" >Student Detail</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
    </div>
    <div class="modal-body" id="employee_detail">

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
</div>
</div>

</div>

<script>
    $(document).ready(function(){
        $('.view_data').click(function(){
            var employee_id = $(this).attr("id");

            $.ajax({
                url:"00select.php",
                method:"post",
                data:{employee_id:employee_id},
                success:function(data){
                    $('#employee_detail').html(data);
                    $('#dataModal').modal("show");
                }
            });

            
        });   
    });
</script>





                                    <?php }?>
