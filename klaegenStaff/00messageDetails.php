
<!-- SESSION TRACKER -->
<?php
session_start();
error_reporting(0);

include("includes/connect.php");

if(strlen($_SESSION['staffLogin'])==0){
header('location:00staffLogin.php');
}
else{  
    //echo $_SESSION['dinre']; echo"blab"; 

if(isset($_POST['submit'])){
$messageBody=$_POST['messageBody'];
$messageID=$_GET['messageId'];
$sender=$_SESSION['prof'];

$replybool="true";

$insertQuery=mysqli_query($con,"insert into reply_anonymous(sender,reply,messageID) values('".$_SESSION['prof']."','$messageBody','$messageID') ");

$setReplystate=mysqli_query($con,"update anonymous_complaint set replied='$replybool' where id='$messageID' ");

$feedback="Your reply has been sent";


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

<link rel="stylesheet" href="../assets/vendor/summernote/dist/summernote.css"/>

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/site.min.css">

<!-- ADDITIONAL SCRIPT -->



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
                            <li class="breadcrumb-item active" aria-current="page">Message Detail</li>
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
                            <h4 >Details</h4>

                        </div>

            <div class="body message_reply">
               <?php 

               $req=mysqli_query($con,"select * from anonymous_complaint where receiver='".$_SESSION['prof']."' and id='".$_GET['messageId']."' ");


            // $query=mysqli_query($con,"select complaints.*,users.name as name,users.surname as surname,users.id as usrid,staffusers.fullName as fully,complaintcategory.categoryName as categName from complaints join users on users.id=complaints.userID join staffusers on staffusers.id=complaints.receiver join complaintcategory on complaintcategory.id=complaints.categoryID where userID='".$_SESSION['id']."' and complaints.id='".$_GET['complaintId']."'"); 
            
            
            while($row=mysqli_fetch_array($req))
            
            
            {?>

             <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="body">
                           
                            <div class="media mleft">
                                <div class="media-left"><a href="#"><img alt="" class="media-object rounded" src="../assets/images/user.png" width="64" height="64"></a></div>
                                <div class="media-body">
                                    <h4 class="media-heading">Anonymous said:</h4>
                                   <?php echo htmlentities($row['message']); ?>
                                   <i>--Sent on: <?php echo htmlentities($row['dateSent'])?></i>
                                    <div class="media m-t-40">
                                        <div class="media-left">
                                            <?php $ry=mysqli_query($con, "select * from staffusers where username='".$_SESSION['staffLogin']."'"); while($resu=mysqli_fetch_array($ry)) {
                                            ?>
                                            <?php $foto=$resu['image']; if($foto==""): ?>

                                            <a href="javascript:void(0);"><img alt="" class="media-object rounded" src="../assets/images/sm/avatar3.jpg" width="64" height="64"></a>
                                            <?php else: ?>
                                                <a href="javascript:void(0);"><img alt="" class="media-object rounded" src="../klaegenStaff/userimages/<?php echo htmlentities($foto)?>" width="64" height="64"></a>
                                            <?php endif;?> 
                                            <?php }?>
                                    </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">You Replied:</h4>
                                        <?php 
                                        //  $fqry=mysqli_query($con,"SELECT complaintfeedback.feedback AS feedback,complaintfeedback.status AS compStatus,complaintfeedback.dateSent as sentDate FROM complaintfeedback JOIN complaints on complaints.id=complaintfeedback.complaintID WHERE complaintfeedback.complaintID='".$_GET['complaintId']."'");

                                         $query2=mysqli_query($con, "select * from reply_anonymous join anonymous_complaint on anonymous_complaint.id=reply_anonymous.messageID where messageID='".$_GET['messageId']."'");

                                         $rowd=mysqli_fetch_array($query2);
                                         if($rowd>0){
                                              echo htmlentities($rowd['reply']);  
                                              echo '<br><br><i>Sent on :  </i>'.$rowd['dateReplied'];
                                         }else{
                                             echo "You haven't replied yet. Insert a reply below";
                                         }
                                        ?>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            
                        </div>
                    </div>
                </div>
            </div>

        <div id="<?php $pass=""; if($row['replied']==$pass){echo "reply_message";}else{ echo"hidden";}  ?>">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <form action="" method="POST">
                                <label for="reply"><b>Reply </b></label>
                                <div class="form-group">
                                <textarea name="messageBody" id="reply" cols="70" rows="10" class="form-control"></textarea>
                                </div>
                                <button type="submit" name="submit" class="btn bg-light p-r-30 p-l-30 ">Send</button>
                            </form>
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
<script src="../assets/vendor/summernote/dist/summernote.js"></script>

<script>
    $(document).ready(function() {
  $('#summernote').summernote();
});
</script>
<script>
    
    $(document).ready(function(){

        
        
    $('#reply_message').show();
    $('#hidden').hide();
        

    });
</script>


</body>
</html>
<?php } ?>