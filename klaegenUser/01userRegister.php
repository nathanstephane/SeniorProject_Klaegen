
<?php include "includes/userRegisterFunc.php" ?>
<!-- <?php error_reporting(0) ?> To get rid of the feedback undefined variable. Might need to find another tweak to this -->

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

<!-- MAIN CSS -->
<link rel="stylesheet" href="assets/css/site.min.css">

<script>
    function idAvailability(){

        if(isNaN($("#idNumber").val())){
            $("#showError").show();
        }
        else{
            $("#showError").hide();
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "includes/idAvailability.php",
            data:'idNumber='+$("#idNumber").val(),
            type:"POST",
            success:function(data){
                $("#idAvailableState").html(data);
                $("loaderIcon").hide();

            },
            error:function(){}

        });}

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

<script>

function valid(){
   if(document.reg.password.value==""){
        alert("Please insert your  password ");
        document.reg.newpassword.focus();
        return false;
        }
        else if(document.reg.passwordConf.value==""){
            alert("Please confirm your  password");
            document.reg.passwordConf.focus();
            return false;
        }
        else if(document.reg.password.value != document.reg.passwordConf.value){
            alert("Whoops! Looks like your passwords do not match.");
            document.reg.passwordConf.focus();
            document.reg.password.focus();
            return false;
        }
        return true;
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


<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="auth_brand">
            <a class="navbar-brand" href="javascript:void(0);"><img src="../assets/images/KleagenGrandBon.svg" width="30" height="30" class="d-inline-block align-top mr-2" alt="">Klaegen</a>                                                
        </div>
        <div class="card">
            <div class="body">
            
                
                
                <form class="form-auth-small m-t-20" name="reg" method="POST">
                <p style="padding-left: 1%; color: #c8d4d9">
                    <?php
                    if($feedback){
                    echo "Your registration has been successful. You can log In <a href='02userLogin.php'>Here</a> ";
                    }
                    ?>
                <div class="separator-linethrough"><span>Student Information</span></div>
                    <div class="form-group">
                        <input type="text" class="form-control round" placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control round" placeholder="Surname" name="surname">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control round" placeholder="ID Number" name="idNumber" id="idNumber" onblur="idAvailability();" required="required">
                        <span id="idAvailableState" style="font-size: 10px;"></span>
                        <span id="showError" style="display: none; font-size:10px;">Please Input a number</span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control round" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">                            
                        <input type="password" class="form-control round" placeholder="Password" name="password">
                    </div>
                    <div class="form-group">                            
                        <input type="password" class="form-control round" placeholder="Confirm Password" name="passwordConf">
                    </div>
                    <div class="separator-linethrough"><span>Residence Information</span></div>
                    <div class="form-group">
                        <!-- <input type="text" class="form-control round" placeholder="Dorm e.g: Esther Hall" name="dorm"> -->
                        
                        <select name="dorm" id="" required="required" class="form-control round" >
<option value="" disabled>Select a dorm</option>
<option value="Elijah Hall" class="">Elijah Hall</option>
<option value="Solomon Hall">Solomon Hall</option>
<option value="Esther Hall">Esther Hall</option>
<option value="Ruth Hall">Ruth Hall</option>
<option value="Eve Hall">Eve Hall</option>
<option value="Sarah Hall">Sarah Hall</option>

</select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control round" placeholder="Room Number" name="roomNumber">
                    </div>
                    <button type="submit" id="submit" class="btn btn-primary btn-round btn-block" name="submit">Register</button>                                
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
</body>
</html>