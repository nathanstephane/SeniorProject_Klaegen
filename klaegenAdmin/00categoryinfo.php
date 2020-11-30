<?php
session_start();
include("includes/connect.php");

if (strlen($_SESSION['adminLogin'])==0) {
    # code...
    header('location:00login.php');

}
else{
    date_default_timezone_set('Asia/Bangkok');
    $currentTime=date('d-m-Y:i:s A', time());

    if(isset($_POST['submit'])){

        $category=$_POST['categoryName'];

        $stmt=$con->prepare("INSERT INTO complaintcategory(categoryName) VALUES (?)");
        $stmt->bind_param("s",$category);
        $stmt->execute();
        $stmt->close();

        $_SESSION['feedback']="Category successfully created";
        }

        if(isset($_GET['del'])){
            mysqli_query($con, "DELETE FROM complaintcategory WHERE id='".$_GET['id']."'");
            $_SESSION['feedbackdelete']="Category deleted";

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
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                            <h2>Add or Delete a Category Here</h2>
                            <ul class="header-dropdown dropdown">                                
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <h4 style="text-align: center;">Manage Category</h4>

                            <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover  js-basic-example dataTable table-custom spacing5">
                                <p class="" style="text-align: center;">Existing Category</p> <hr> <br>
                                
                                    <thead>
                                        <tr>
                                            
                                            <th>Category Name</th>
                                            <th>Options</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                    <?php
                                    $queryDB=mysqli_query($con,"SELECT * FROM complaintcategory");
                                   
                                    while($row=mysqli_fetch_array($queryDB)) {
                                    ?>
                                        <tr>
                                            <td><?php echo htmlentities($row['categoryName']); ?></td>
                                            
                                            <td><a href="00categoryinfo.php?id=<?php echo $row['id'] ?>&del=delete"><i class="fa fa-trash-o" style="color: #e04c41;"></i><span style="color: #e04c41;"> Delete</span></a></td>
                                            
                                        </tr>
                                        
                                    <?php }?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>


                            <div class="body">
                                <p class="" style="text-align: center;">Add new Category</p>

                                <?php if(isset($_POST['submit'])) { ?>
                
<div class="alert alert-success alert-dismissible fade show" role="alert">
<?php echo htmlentities($_SESSION['feedback']);?><?php echo htmlentities($_SESSION['feedback']="");?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
                                <?php } ?>

                                <?php if(isset($_GET['del'])) { ?>
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
<?php echo htmlentities($_SESSION['feedbackdelete']);?><?php echo htmlentities($_SESSION['feedbackdelete']="");?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
              
                                <?php } ?>

                                <!-- FORM BEGINS HERE -->
                            <form id="basic-form" method="post" name="Category">
                                <div class="form-group row">
                                    <label class="col-md-3"> Name of the  Category:</label>
                                    <input type="text" name="categoryName" class="form-control col-md-6" required>
                                </div>
                                
                                <br>
                                <div style="text-align: center;"><button type="submit" name="submit" class="btn btn-primary" >Insert</button></div>
                            </form>
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


   


<script src="assets/bundles/datatablescripts.bundle.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="../assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>
<script src="../assets/vendor/sweetalert/sweetalert.min.js"></script><!-- SweetAlert Plugin Js -->
<script src="assets/js/pages/tables/jquery-datatable.js"></script>

  <script src="assets/js/pages/ui/category_dialogs.js"></script>
</body>
</html>
<?php }?>