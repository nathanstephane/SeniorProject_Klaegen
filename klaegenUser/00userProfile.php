
<!-- SESSION TRACKER -->
<?php
session_start();
error_reporting(0);

include("includes/connect.php");

if(strlen($_SESSION['login'])==0){
header('location:02userLogin.php');
}
else{ 
    
    if(isset($_POST['submit'])){

        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $email=$_POST['email'];
        $dorm=$_POST['dorm'];
        $roomNumber=$_POST['roomNumber'];

        $query=mysqli_query($con,"update users set name='$name',surname='$surname',email='$email',dorm='$dorm',roomNumber='$roomNumber' where idNumber='".$_SESSION['login']."'");
    

    if($query){
        $successmsg="Profile successfully updated";
    }
    else{
        $errormsg="Profile not Updated";
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
                            <li class="breadcrumb-item active" aria-current="page">Student Profile</li>
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
                            <h2>Update your profile here</h2>
                            <ul class="header-dropdown dropdown">                                
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-frame"></i></a></li>
                                
                            </ul>
                        </div>
                        <div class="body">
                            <h5 class="align-center">User Profile</h5>

                            <div class="col-lg-12">
                            <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
 <?php $query=mysqli_query($con,"select * from users where idNumber='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                     

  <p class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($row['name']);?>'s Profile</p>
    
  <!-- FORM BEGINS HERE -->
                      <form class="" method="post" id="basic-form" name="profile" >

<div class="form-group">
<label class="col-sm-2 control-label">Name</label>
<div class="">
<input type="text" name="name" required="required" value="<?php echo htmlentities($row['name']);?>" class="form-control" >
 </div>
 <br>
 <label class="col-sm-2 col-sm-2 control-label">Surname</label>
 <div class="">
<input type="text" name="surname" required="required" value="<?php echo htmlentities($row['surname']);?>" class="form-control">
</div>

 </div>


<div class="form-group">

<label class="col-sm-2 col-sm-2 control-label">ID Number</label>
 <div class="">
<input type="text" name="idNumber" required="required" value="<?php echo htmlentities($row['idNumber']);?>" class="form-control" readonly>
</div>
<br>
<label class="col-sm-2 col-sm-2 control-label">Dorm</label>
 <div class="">
<select name="dorm" id="" required="required" class="form-control" >
<option value="<?php echo htmlentities($row['dorm']);?>"><?php echo htmlentities($row['dorm']);?></option>
<option value="Elijah Hall">Elijah Hall</option>
<option value="Solomon Hall">Solomon Hall</option>
<option value="Esther Hall">Esther Hall</option>
<option value="Ruth Hall">Ruth Hall</option>
<option value="Eve Hall">Eve Hall</option>
<option value="Sarah Hall">Sarah Hall</option>
<br>
</select>
</div>

</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Room Number</label>
<div class="">
<input type="text" name="roomNumber" maxlength="3" required="required" value="<?php echo htmlentities($row['roomNumber']);?>" class="form-control">
</div>
<br>
<label class="col-sm-2 col-sm-2 control-label">Email</label>
<div class="">
<input type="email" name="email"  required="required" value="<?php echo htmlentities($row['email']);?>" class="form-control">
</div>
</div>




<br>
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Picture</label>
<div class="col-sm-4">
<?php $userphoto=$row['Image'];
if($userphoto==""):
?>
<a href="00imageUpdate" data-toggle="tooltip" title="change Picture">
<img src="userimages/morph.gif" width="256" height="256" class="rounded-circle" style="object-fit: cover;" ></a>
<!-- <a href="00imageUpdate.php"><button class="btn btn-light m-t-20 m-l-60">Change Photo</button></a> -->
<?php else:?>
    <a href="00imageUpdate.php" data-toggle="tooltip" title="change Picture">
	<img src="userimages/<?php echo htmlentities($userphoto);?>" width="256" height="256" class="rounded-circle" style="object-fit: cover;" ></a>
	<!-- <a href="00imageUpdate.php" > 
        <button class="btn btn-light m-t-100 m-l-60">Change Photo</button> </a> -->
<?php endif;?>
</div>

</div>









<?php } ?>

                          <div class="form-group">
                           <div class="col-sm-10 align-center" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary btn-block">Update</button>
</div>
</div>

                          </form>
                            </div>
                            <br>
<div class="form-group">
<!-- <label class="col-sm-2 col-sm-2 control-label">Password</label> -->
<a href="00passwordUpdate.php"><button class="btn btn-secondary btn-block">Click here to update your password</button></a>
</div>

                            <div>

                           
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	

                      
                          </div>
                          </div>
                          </div>
                          
          	
          	


                            </div>

<!-- BEGINING OF SECTION -->

<section id="container" >
   
      <section id="main-content">
          <section class="wrapper">
          	
		</section>
      </section>
    
  </section>

  <!-- END OF SECTION -->



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
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
</body>
</html>
<?php } ?>