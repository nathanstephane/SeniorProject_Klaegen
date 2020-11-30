

<?php
//include("includes/sessionTracker.php"); useless
session_start();
error_reporting(0);
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

$query=mysqli_query($con,"DELETE from staffusers where id='$userid'");
if($query){echo "Duh";}
header('location:00staff.php');
}

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

<!-- ADDITIONAL SCRIPT -->
<script>
    function idAvailability(){

        // if(isNaN($("#idNumber").val())){
        //     $("#showError").show();
        // }
        // else{
            // $("#showError").hide();
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "includes/idAvailability.php",
            data:'username='+$("#username").val(),
            type:"POST",
            success:function(data){
                $("#idAvailableState").html(data);
                $("loaderIcon").hide();

            },
            error:function(){}

        });

        // $("#loaderIcon").show();
        // jQuery.ajax({
        //     url: "includes/idAvailability.php",
        //     data:'idNumber='+$("#idNumber").val(),
        //     type:"POST",
        //     success:function(data){
        //         $("#idAvailableState").html(data);
        //         $("loaderIcon").hide();

        //     },
        //     error:function(){}

        // });
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
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Staff Users</li>
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
                            <!-- <h2>RS SYS02</h2> -->
                            <ul class="header-dropdown dropdown">                                
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                               
                            </ul>
                        </div>
                        
                            <h4 style="text-align: center;">Staff users</h4>
                           
                            <!-- START HERE THING -->

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Users">Users</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addUser">Add User</a></li>        
                        </ul>
                        <div class="tab-content mt-0">
                            <div class="tab-pane active show" id="Users">
                                <div class="table-responsive">
                                    <table class="table table-hover table-custom spacing8">
                                        <thead>
                                            <tr>
                                                <th class="w60">Name</th>
                                                <th></th>
                                                <th>Complaints Assigned</th>
                                                <th>Office</th>
                                                <th>Position</th>
                                                <th class="w100">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php  $qry3=mysqli_query($con,"SELECT staffusers.id, staffusers.username, staffusers.fullName, staffusers.email,staffusers.phoneNumber,staffusers.office,staffusers.position,staffusers.image,COUNT(complaints.receiver) as total FROM staffusers LEFT JOIN complaints ON staffusers.id=complaints.receiver GROUP BY staffusers.id, staffusers.username, staffusers.fullName, staffusers.email,staffusers.phoneNumber,staffusers.office,staffusers.position,staffusers.image");  
                                            
                                            while($retour=mysqli_fetch_array($qry3)){
                                                ?>
                                         
                                            <tr>
                                                <td>
                                                    <?php $photo=$retour['image']; if($photo==""): ?>
                                                    <img src="../assets/images/xs/avatar5.jpg" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="<?php echo htmlentities($retour['username']);?>">
                                                    <?php else:?>
                                                        <img src="../klaegenStaff/userimages/<?php echo htmlentities($photo);?>" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="<?php echo htmlentities($retour['username']);?>">
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <h6 class="mb-0"><?php echo htmlentities($retour['fullName'])?></h6>
                                                    <span><?php echo htmlentities($retour['email'])?></span>
                                                </td>
                                                <td align="center"><span class="badge badge-info"><?php echo htmlentities($retour['total'])?></span></td>
                                                <td><?php echo htmlentities($retour['office'])?></td>
                                                <td><?php echo htmlentities($retour['position'])?></td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-default" title="Edit"><i class="fa fa-edit"></i></button>

                                                    <a href="00staff.php?uid=<?php echo $retour['id'];?>&&action=del">
                                                    <button type="button" class="btn btn-sm btn-default js-sweetalert" title="Delete"><i class="fa fa-trash-o text-danger"></i></button></a>
                                                </td>
                                            </tr>
                                            <?php }?>
                                            
                                            
                                            
                                        </tbody>
                                    </table>                
                                </div>
                            </div>

                            
                            <div class="tab-pane" id="addUser">
                            <form action="" method="POST">
                            <p style="padding-left: 1%; color: #c8d4d9">
                    <?php
                    if($feedback){
                    echo "New Staff Employee successfully added.";
                    }
                    ?></p>
                                <div class="body mt-2">
                                    <div class="row clearfix">
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="fullName" placeholder="Full Name">
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div> -->
            
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Username" name="username" id="username" onblur="idAvailability();" required="required">
                                                <span id="idAvailableState" style="font-size: 10px;"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="phoneNumber" placeholder="Mobile No">
                                            </div>
                                        </div>                            
            
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="position" placeholder="Position">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="form-group">                                   
                                                <input type="text" class="form-control" name="office" placeholder="Office">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <select class="form-control show-tick">
                                                    <option>Select Role Type</option>
                                                    <option>Super Admin</option>
                                                    <option>Admin</option>
                                                    <option>Employee</option>
                                                </select>
                                            </div>
                                        </div>
            
                                        <div class="col-12">
                                            <h6>Module Permission</h6>
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Read</th>
                                                            <th>Write</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Super Admin</td>
                                                            <td>
                                                                <label class="fancy-checkbox">
                                                                    <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                                    <span></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="fancy-checkbox">
                                                                    <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                                    <span></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="fancy-checkbox">
                                                                    <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                                    <span></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Admin</td>
                                                            <td>
                                                                <label class="fancy-checkbox">
                                                                    <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                                    <span></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="fancy-checkbox">
                                                                    <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                                    <span></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="fancy-checkbox">
                                                                    <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                                    <span></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Employee</td>
                                                            <td>
                                                                <label class="fancy-checkbox">
                                                                    <input class="checkbox-tick" type="checkbox" name="checkbox" checked="">
                                                                    <span></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="fancy-checkbox">
                                                                    <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                                    <span></span>
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <label class="fancy-checkbox">
                                                                    <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                                    <span></span>
                                                                </label>
                                                            </td>
                                                        </tr>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Add</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                        </div>
                                    </div>
                                   
                                    <!-- endForm -->
                                </div>
                                </form>
                            </div>
                            
                        </div>            
                    </div>
                </div>
            </div>

            <!-- END STAFF THING -->

                        
                        
                       
                        

                        <!-- TABLE STARTS HERE -->

                        <div class="body">
                            
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
    <h4 class="modal-title text-center" >Student Detail</h4>
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
