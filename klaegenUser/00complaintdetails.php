
<?php
//include("includes/sessionTracker.php"); useless
session_start();
include("includes/connect.php");

if (strlen($_SESSION['login'])==0) {
    # code...
    header('location:02userLogin.php');

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

<link rel="stylesheet" href="../assets/vendor/sweetalert/sweetalert.css"/>

<link rel="stylesheet" href="../assets/vendor/dropify/css/dropify.min.css">
<link rel="stylesheet" href="../assets/vendor/jquery-steps/jquery.steps.css">


<link rel="stylesheet" href="../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
<link rel="stylesheet" href="../assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">


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
                            <li class="breadcrumb-item active" aria-current="page">Complaint Details</li>
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
                            <h4 style="text-align: center;">Complaint Details</h4>

                        </div>

                        <div class="container" id="employee_table"></div>
                        <div class="container body">

                        <?php 
                        $status='Closed';
                      

                        $query=mysqli_query($con,"select complaints.*,users.name as name,users.surname as surname,users.id as usrid,staffusers.fullName as fully,complaintcategory.categoryName as categName from complaints join users on users.id=complaints.userID join staffusers on staffusers.id=complaints.receiver join complaintcategory on complaintcategory.id=complaints.categoryID where userID='".$_SESSION['id']."' and complaints.id='".$_GET['complaintId']."'"); 

                        
                        if(!$query){echo"Ta query a un soucis";}

                        while($row=mysqli_fetch_array($query))
                        { 
                        ?>
                        
                        
                        

                                <div class="row" id="first">
                                
                                
                                    
                                <label for="complTitle" class="col-md-2">Title/Subject:</label>
                                
                                <div class="col-md-4" id="complTitle"><?php echo htmlentities($row['title']) ?></div>  
                                
                                
                                <label for="complNumber" class="col-md-2">Complaint Number:</label>
                                 
                                <div class="col-md-4" id="complNumber"><?php echo htmlentities($row['id']) ?></div>
                                
                                </div>
                                
                                
                        
                                <br>
                                <div class="row" id="second">
                                    
                                <label for="categ" class="col-md-2">Category:</label>
                                <div class="col-md-4" id="categ"><?php echo htmlentities($row['categName']) ?></div>   
                                
                                <label for="subcateg" class="col-md-2">Sub-Category:</label>
                                <div class="col-md-4" id="subcateg"><?php echo htmlentities($row['sub_category']) ?></div>
                                    
                                </div>
                                

                                <br>
                                <div class="row" id="third">
                                <label for="categ" class="col-md-2">Description:</label>
                                <div class="col-md-10" id="ccateg"><?php echo htmlentities($row['description']) ?></div>   
                                </div>
                                

                                <br> <br> <hr>
                                <div class="row" id="fourth">
                                    
                                <label for="fileAttached" class="col-md-2">Attached File:</label>
                                <div class="col-md-10" id="fileAttached"><?php $cfile=$row['picture']; 
                                if($cfile=="" || $cfile=="NULL"){
                                       echo "N/A"; 
                                }
                                else{?>
                                    <a href="../klaegenUser/pictureFolder/<?php echo htmlentities($row['picture']);?>" target="_blank"/>View</a> 
                                <?php } ?></div>   
                                
                                </div>
                                

                                <br>
                                <div class="row" id="fifth">   
                                
                                <label for="state" class="col-md-2">Status:</label>
                                <div class="col-md-10" id="state"><?php if($row['status']==""){ echo "Needs to be Processed"; } 
                                else { echo htmlentities($row['status']); } ?>
                                    </div>
                                    
                                </div>
                                

                                <br> <hr>
                                <div class="row" id="fifth">
                                    
                                <label for="sentBy" class="col-md-2">Sent By:</label>
                                <div class="col-md-4" id="sentBy"><a href="00userProfile.php" ><?php $fullname = $row['name']." ".$row['surname']; echo htmlentities($fullname); ?></a></div>   
                                
                                <label for="receivedBy" class="col-md-2">Received By:</label>
                                <div class="col-md-4" id="receivedBy"><a href="#dataModal" id="<?php echo $row['receiver']; ?>" class="view_data" name="view" ><?php  echo htmlentities($row['fully']); ?></a></div> 
                                
                                    
                                </div>

                                <!-- MODAL THING START BELOW -->
            <div id="dataModal" class="modal fade launch-pricing-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                         <div class="modal-header">
                                 <h4 class="modal-title text-center" >Staff Detail</h4>
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

                                <!-- MODAL THING END ABOVE -->
                                
                                

                                <?php
                                $fqry=mysqli_query($con,"SELECT complaintfeedback.feedback AS feedback,complaintfeedback.status AS compStatus,complaintfeedback.dateSent as sentDate FROM complaintfeedback JOIN complaints on complaints.id=complaintfeedback.complaintID WHERE complaintfeedback.complaintID='".$_GET['complaintId']."'");

                                if(!$fqry){echo"T'a un soucis";}
                                while($res=mysqli_fetch_array($fqry)){
                                ?>

                                <br>
                                <div class="row" id="seventh">
                                <label for="status" class="col-md-2">Updated Status:</label>
                                <div class="col-md-10" id="status"><?php echo htmlentities($res['compStatus']);?></div>   
                                </div>

                                <br>
                                <div class="row" id="sixth">
                                <label for="feedback" class="col-md-2">Feedback:</label>
                                <div class="col-md-10" id="feeback"><?php echo htmlentities($res['feedback']);?></div>   
                                </div>

                                

                                <br>
                                <div class="row" id="seventh">
                                <label for="status" class="col-md-2">Date Updated:</label>
                                <div class="col-md-10" id="status"><?php echo htmlentities($res['sentDate']);?></div>   
                                </div>
                                <?php }?>

                                
                                

                                <!-- HERE FOR THE ACTION BUTTON -->
                                
                                    


                            <!-- MAKING MODAL FORM HERE -->
                            <div id="add_data_Modal" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title " style="text-align: center;" >Complaint Feedback & Status</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" id="insert_form">
                                                <div><?php echo htmlentities($_GET['complaintId']);?></div>
                                                <input type="hidden" name="complaintID" value="<?php echo htmlentities($_GET['complaintId']); ?>">
                                                <label for="stat">Status:</label>
                                                <select name="status" id="stat" required="required" class="custom-select" >
                                                    <option value="">Select Status</option>
                                                    <option value="Processing">Processing</option>
                                                    <option value="Closed">Closed</option>

                                                </select>
                                                    <div><br></div>
                                                <label for="rmk">Remark:</label>
                                                <textarea name="remark" id="rmk" cols="40" rows="10" required="required" class="form-control"></textarea>

                                                <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success">
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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



<script>

    $('#insert_form').on('submit',function(event){
                event.preventDefault();
                if($('#rmk').val() == ''){
                    alert("Insert a remark");
                } else {
                    $.ajax({
                    url:"00insert.php",
                    method:"POST",
                    data:$('#insert_form').serialize(),
                    success:function(data){
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');    
                        $('#employee_table').html(data);
                    }
                    });
                }
    });

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


</body>
</html>
<?php }?>