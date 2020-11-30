<?php  

session_start();
error_reporting(0);
include('includes/connect.php');
if(strlen($_SESSION['login'])==0){

    header('location:02userLogin.php');
}
else{

    // echo $_SESSION['dinre']; echo"blab";




if(isset($_POST['submit'])){

$userId=$_SESSION['id'];
$title=$_POST['title'];
$category=$_POST['category'];
$subCategory=$_POST['sub_category'];
$picture=$_FILES['pics']['name'];
$description=$_POST['description'];
$receiver=$_POST['receiver'];





$folderImage="pictureFolder/".$picture;

move_uploaded_file($_FILES["pics"]["tmp_name"],$folderImage);



// $qry=mysqli_query($con,"insert into complaints(userID,title,categoryID,sub_category,picture,description,receiver) VALUES('$userId','$title','$category','$subCategory','$picture','$description','$receiver')");

$query=mysqli_query($con,"insert into complaints(userID,title,categoryID,sub_category,picture,description,receiver) values('$userId','$title','$category','$subCategory','$picture','$description','$receiver')");

$feedbackNormal="Normal Complaint Successfully sent";


if(!$query){
Echo"Nope";
}
//echo $userId;

//echo"hello";

//Revenir ici pour avoir une sorte de display message.

}


if(isset($_POST['insertEncrypt'])){

    echo "Welsh";
$sender=$_SESSION['login'];
$encrypted=password_hash($sender, PASSWORD_DEFAULT);
$complaint=$_POST["complaintBox"];
$receiver=$_POST["receiver"];

$insertQuery= mysqli_query($con,"insert into anonymous_complaint(sender,message,receiver) values('$encrypted','$complaint','$receiver')");

$feedback="Message successfully sent";

}

?>

<!doctype html>
<html lang="en">

<head>
<title>Klaegen </title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<link rel="icon" href="klaegenTileimg.svg" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/vendor/animate-css/vivify.min.css">

<link rel="stylesheet" href="../assets/vendor/dropify/css/dropify.min.css">
<link rel="stylesheet" href="../assets/vendor/jquery-steps/jquery.steps.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/site.min.css">

<script>
// File name display
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<script>
    function getCat(val){
           $.ajax({
            type: "POST",
            url: "00getsubcat.php",
            data: 'catid='+val,
            success: function(data){
                $("#subcategory").html(data);
            }
           }); 
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
                <div class="themesetting">
                <a href="javascript:void(0);" class="theme_btn"><i class="icon-magic-wand"></i></a>
                <div class="card theme_color">
                <div class="header">
                <h2>Theme Color</h2>
                </div>
                <ul class="choose-skin list-unstyled mb-0">
                <li data-theme="green"><div class="green"></div></li>
                <li data-theme="orange"><div class="orange"></div></li>
                <li data-theme="blush"><div class="blush"></div></li>
                <li data-theme="cyan" class="active"><div class="cyan"></div></li>
                <li data-theme="indigo"><div class="indigo"></div></li>
                <li data-theme="red"><div class="red"></div></li>
                </ul>
                </div>
                <div class="card font_setting">
                <div class="header">
                <h2>Font Settings</h2>
                </div>
                <div>
                <div class="fancy-radio mb-2">
                <label><input name="font" value="font-krub" type="radio"><span><i></i>Krub Google font</span></label>
                </div>
                <div class="fancy-radio mb-2">
                <label><input name="font" value="font-montserrat" type="radio" checked><span><i></i>Montserrat Google font</span></label>
                </div>
                <div class="fancy-radio">
                <label><input name="font" value="font-roboto" type="radio"><span><i></i>Robot Google font</span></label>
                </div>
                </div>
                </div>
                <div class="card setting_switch">
                <div class="header">
                <h2>Settings</h2>
                </div>
                <ul class="list-group">
                <li class="list-group-item">
                Light Version
                <div class="float-right">
                <label class="switch">
                <input type="checkbox" class="lv-btn">
                <span class="slider round"></span>
                </label>
                </div>
                </li>
                <li class="list-group-item">
                RTL Version
                <div class="float-right">
                <label class="switch">
                <input type="checkbox" class="rtl-btn">
                <span class="slider round"></span>
                </label>
                </div>
                </li>
                <li class="list-group-item">
                Horizontal Henu
                <div class="float-right">
                <label class="switch">
                <input type="checkbox" class="hmenu-btn" >
                <span class="slider round"></span>
                </label>
                </div>
                </li>
                <li class="list-group-item">
                Mini Sidebar
                <div class="float-right">
                <label class="switch">
                <input type="checkbox" class="mini-sidebar-btn">
                <span class="slider round"></span>
                </label>
                </div>
                </li>
                </ul>
                </div>   
             
                </div>

                <!-- Overlay For Sidebars -->
                <div class="overlay"></div>

                <div id="wrapper">

                <nav class="navbar top-navbar">
                <div class="container-fluid">

                <div class="navbar-left">
                <div class="navbar-btn">
                <a href="00userStarter.php"><img src="../assets/images/KleagenGrandBon.svg" alt="klaegen Logo" class="img-fluid logo"></a>
                <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                <ul class="nav navbar-nav">
              
            <!-- STOP HERE -->
                </div>

                <div class="navbar-right">
                <div id="navbar-menu">
                <ul class="nav navbar-nav">
             
                <li><a href="00logout.php" class="icon-menu"><i class="icon-power"></i></a></li>
                </ul>
                </div>
                </div>
                </div>
                <div class="progress-container"><div class="progress-bar" id="myBar"></div></div>
                </nav>

                
              

                <div id="rightbar" class="rightbar">
                <!-- -->
                </div>

                <div id="left-sidebar" class="sidebar">
                <div class="navbar-brand">
                <a href="index.html"><img src="../assets/images/KleagenGrandBon.svg" alt="klaegen Logo" class="img-fluid logo"><span>Klaegen</span></a>
                <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
                </div>
                <div class="sidebar-scroll">
                <div class="user-account">
                <div class="user_div">
                <?php $nama=$_SESSION['login']; $getPic=mysqli_query($con,"select Image from users where idNumber='$nama'" ); 
                while($retour=mysqli_fetch_array($getPic)){
                ?>
                    <?php $photo=$retour['Image']; if($photo==""): ?>
                    <img src="../assets/images/user.png" class="user-photo"  alt="User Profile Picture">
                    <?php else:?>
                        <img src="../klaegenUser/userimages/<?php echo htmlentities($photo)?>" class="user-photo" alt="User Profile Picture" width="40" height="40" style="object-fit: cover;">
                    <?php endif;?>
                </div>
                <?php }?>
                <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong><?php $nom=$_SESSION['login']; $qry=mysqli_query($con,"SELECT * FROM users WHERE idNumber='$nom' ");

$num=mysqli_fetch_array($qry);
if($num>0){
    $nom=$num['name'];
    $prenom=$num['surname'];
    echo $nom . " " . $prenom;
}
?></strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                <li><a href="page-profile.html"><i class="icon-user"></i>My Profile</a></li>
                <li><a href="app-inbox.html"><i class="icon-envelope-open"></i>Messages</a></li>
                <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                <li class="divider"></li>
                <li><a href="00logout.php"><i class="icon-power"></i>Logout</a></li>
                </ul>
                </div>                
                </div>  
                <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">

                <li><a href="00userStarter.php"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
                <li><a href="04createComplaint.php"><i class="icon-shield"></i><span>Issue a complaint</span></a></li>
                <li><a href="00complaintstat.php"><i class="icon-rocket"></i><span>Complaint Stats</span></a></li>
                <li><a href="00userProfile.php"><i class="icon-users"></i><span>User info</span></a></li>
                <li><a href="00encryptedList.php"><i class="icon-key"></i><span>Anonymous Complaint </span></a></li>
                <li><a href="#"><i class="icon-cursor"></i><span>Klaegen Anonymous</span></a></li>
                
                </ul>
                </nav>     
                </div>
                </div>

                <div id="main-content">
                <div class="container-fluid">
                <div class="block-header">
                <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
              
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Klaegen</a></li>
                    <li class="breadcrumb-item"><a href="#">Page</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Student complaint</li>
                    </ol>
                </nav>
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
                    <h4 style="text-align: center;">Issue your complaint below</h4>
                </div>
                <p><?php if($feedback){echo htmlentities($feedback); }?></p>
                <p><?php if($feedbackNormal){echo htmlentities($feedbackNormal); }?></p>
                    <!-- BEG MODAL  -->
                <div class="row clearfix">
                <div class="col-lg-12">

                </div>
                <div class="col-lg-12">
                <div class="card">
                <div class="header">
                    <h2 class="align-center"> <small>By using an encrypted complaint, your identity will remain anonymous</small> </h2>
                </div>
                <div class="body">
                    
                    
               
                    <div class="align-center">
                        <button type="button" name="add" id="add" class="btn btn-round btn-warning" data-toggle="modal" data-target=".feed-post-modal">Encrypted Complaint</button>
                    <button type="button" class="btn btn-round btn-success m-l-35" data-toggle="modal" data-target=".Form-Wizard-modal">Normal complaint</button>
                    </div>

                    
                    
                  
                    <!-- feed-post-modal ENCRYPTED MODAL -->
                    <div class="modal fade feed-post-modal" id="add_data_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <!-- ENCRIPTED FORM HERE  -->
                                    <form method="POST" id="insert_form" enctype="multipart/form-data">
                                        <div class="d-flex mb-3">
                                        <div class="icon bg-transparent">
                                            <img src="../assets/images/user.png" class="rounded mr-3 w40" alt="">
                                        </div>
                                        <div>
                                            <h6 class="mb-0"><?php
                                            function generateRandomString($length = 10) {
                                                return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
                                            }
                                            
                                            echo  generateRandomString(); 
                                            ?></h6>
                                        
                                            <span class="m-t-4"><small>Don't worry,your name will be displayed as anonymous :)</small></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="complaintBox" id="comBox" rows="4" class="form-control no-resize" placeholder="Please type in your issue here..."></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="rece">Choose a Receiver</label>
                                        <select name="receiver" class="form-control" id="rece">
                                            <option value="" disabled>Choose a receiver</option>
                                            <?php $qr=mysqli_query($con,"select * from staffusers");
                                    while($rw=mysqli_fetch_array($qr)) { ?>
                                    <option value="<?php echo htmlentities($rw['id']); ?>">Mr/Mrs <?php echo htmlentities($rw['fullName']) ?> (<?php echo htmlentities($rw['position'])?>)</option>
                                    <?php }?>
                                        </select>
                                    </div>
                                    <div class="align-right">
                                        <button class="btn btn-link"><i class="icon-paper-clip text-muted"></i></button>
                                        <button class="btn btn-link"><i class="icon-camera text-muted"></i></button>
                                        <button class="btn btn-link"><i class="icon-pointer text-muted"></i></button>
                                       
                                        <input type="submit" name="insertEncrypt" id="insert" value="Send" class="btn btn-round btn-warning">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                            <!-- Form modal -->
                            <div class="modal fade Form-Wizard-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Klaegen</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                       <!-- FORM BEGIN HERE -->
                                        <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="modal-body pricing_page">
                                            <div id="wizard_horizontal">
                                                
                                                <h2>First Step</h2>
                                                <section>
                                                    <p>What is your complaint about ? </p>
                                                    <!-- <input type="text" name="testing" placeholder="testing"> -->

                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Title/Subject</span>
                                </div>
                                <input type="text" name="title" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default">
                                </div>
                                            </section>
                                                <h2>Second Step</h2>
                    <section>
                        <p>Section 2</p>

                            <div class="input-group mb-3">
                                <select class="custom-select" name="category" id="category" onchange="getCat(this.value);" >
                                    <option selected>Category</option>
                                    <?php $sql=mysqli_query($con,"select id,categoryName from complaintcategory 
                                    "); while($rw=mysqli_fetch_array($sql)){ ?>
                                    <option value="<?php echo htmlentities($rw['id']); ?>"><?php echo htmlentities($rw['categoryName']); ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>

                            <div class="input-group mb-3">                                
                                <select class="custom-select" name="sub_category" id="subcategory">
                                    <option value="">Select a sub-category</option>
                                </select>
                            </div>

                            <p>Attach a picture or video (Optional but recommended)</p>

                            <div class="input-group mb-3">
                                <!-- <div class="input-group-prepend">
                                    <span class="input-group-text">Picture</span>
                                </div> -->
                                
                             <input type="file" class="form-control" value="" name="pics" >
    

                            </div>
                    </section>
                                                <h2>Third Step</h2>
                    <section>
                            <p> Describe your issue below</p>

                                <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">What's your concern ?</span>
                                </div>
                                <textarea class="form-control" name="description" aria-label="With textarea"></textarea>
                            </div>
                                                   <!-- <button type="submit" name="submit">Send</button> -->
                                                    <br>
                             <div class="input-group">
                                <div class="input-group-prepend">
                                    <label class="input-group-text mb-3" for="inputGroupSelect01" 
                                    >Send To: </label>
                                </div>
                                <select class="custom-select mb-3" name="receiver" id="inputGroupSelect01">
                                    <option value="">Select</option>
                                    <?php $qr=mysqli_query($con,"select * from staffusers");
                                    while($rw=mysqli_fetch_array($qr)) { ?>
                                    <option value="<?php echo htmlentities($rw['id']); ?>">Mr/Mrs <?php echo htmlentities($rw['fullName']) ?> (<?php echo htmlentities($rw['position'])?>)</option>
                                    <?php }?>
                                    
                                </select>
                            </div>
                            <button class="btn btn-primary btn-block btn-round " name="submit" type="submit">Send</button>
                                                </section>
                                                
                                                
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                        <!-- END MODAL -->
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


<script src="../assets/vendor/dropify/js/dropify.js"></script>
<script src="../assets/vendor/jquery-steps/jquery.steps.js"></script><!-- JQuery Steps Plugin Js -->


<script src="assets/js/pages/forms/dropify.js"></script>
<script src="assets/js/pages/forms/form-wizard.js"></script>

    








</body>
</html>
<?php } ?>