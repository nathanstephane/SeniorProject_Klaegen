







<?php

if(isset($_POST["employee_id"])){
    include('includes/connect.php');
    $output = '';
    $query = "SELECT * FROM staffusers WHERE id = '".$_POST["employee_id"]."'";
    $result =  mysqli_query($con, $query);
     
     while ($row = mysqli_fetch_array($result)) {
        $output.= '
        <div class="row clearfix">
                                            
        <div class="col-md-1" id="offset"></div>
        <label for="name" class=""> <strong>Full Name:</strong></label>   
        <div id="name" class="col-md-3">'.$row['fullName'].' </div>
        <div class="col-md-3" id="separator"></div>
        
        </div>
        <br>
        <div class="row clearfix">
                                            
        <div class="col-md-1" id="offset"></div>
        <label for="email" class=""> <strong>Email:</strong></label>   
        <div id="email" class="col-md-4">'.$row['email'].' </div>
        
        
        </div>

        <br>
        <div class="row clearfix">
                                            
        <div class="col-md-1" id="offset"></div>
        
        <label for="idNum" class=""> <strong>Office:</strong> </label>   
        <div id="idNum" class="col-md-2">'.$row['office'].'</div>
        
        </div>


        <br>
        <div class="row clearfix">
                                            
        <div class="col-md-1" id="offset"></div>
        <label for="dorm" class=""> <strong>Position:</strong></label>   
        <div id="dorm" class="col-md-3">'.$row['position'].' </div>
        <div class="col-md-3" id="separator"></div>
        <label for="roomNumbr" class=""> <strong>Phone Number:</strong> </label>   
        <div id="roomNumbr" class="col-md-2">'.$row['phoneNumber'].'</div>
        
        </div>
        ';
     }
     echo $output;
}

?>















 