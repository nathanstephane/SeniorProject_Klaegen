<?php include('includes/userForgotPasswordFunc.php'); ?>
<?php error_reporting(0) ?>
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
<link rel="stylesheet" href="../assets/vendor/sweetalert/sweetalert.css"/>

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/site.min.css">

<!-- AVAILABLE ID SCRIPT -->
<script>
function idAvailability(){
$("#loaderIcon").show();
jQuery.ajax({
    url:"includes/idAvailPassForg.php", //code that after
    data:'idNumber='+$("#idNumber").val(),
    type:"POST",
    success:function(data){
        $("#idAvailableState").html(data);
        $("loaderIcon").hide();
    },
    error:function(){}
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

<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>
<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
            <a class="navbar-brand" href="javascript:void(0);"><img src="../assets/images/KleagenGrandBon.svg" width="30" height="30" class="d-inline-block align-top mr-2" alt="">Klaegen</a>                                                
        </div>
        <div class="card forgot-pass">
            <div class="body">

            <p style="padding-left: 1%; color: #c8d4d9">
                    <?php
                    if($feedback){
                    echo '<div style="background-color: green; color: white; border-radius: 5px;"  >A link has been sent to your email to set your new password</div> <hr>';
                    }
                    ?>
                <p class="lead mb-3"><strong>Password Recovery</strong></p>
                <p>Type in your ID Number to recover your password.</p>
                <form class="form-auth-small" method="POST">

                
                    <div class="form-group">                                    
                        <input type="text" class="form-control round" id="idNumber" placeholder="ID Number" name='idNumber' onblur="idAvailability()">
                    </div>
                    <span id="idAvailableState" style="font-size: 10px";></span>
                    <button type="submit" class="btn btn-round btn-primary btn-lg btn-block js-sweetalert" data-type="success" id="submit" name="submit">RESET PASSWORD</button>
                    <div class="bottom">
                        <span class="helper-text">Know your password? <a href="02userLogin.php">Login</a></span>
                    </div>
                </form>

                
            </div>
        </div>

       

    </div>
    <div id="particles-js"></div>
</div>
<!-- END WRAPPER -->
    
<script src="assets/bundles/libscripts.bundle.js"></script>    
<script src="assets/bundles/vendorscripts.bundle.js"></script>
<script src="assets/bundles/mainscripts.bundle.js"></script>

<script src="../assets/vendor/sweetalert/sweetalert.min.js"></script><!-- SweetAlert Plugin Js -->

<script src="assets/js/pages/ui/dialogs.js"></script>
  


</body>
</html>

