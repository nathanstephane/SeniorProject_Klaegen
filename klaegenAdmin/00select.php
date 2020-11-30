<?php

if(isset($_POST["employee_id"])){
    include('includes/connect.php');
    $output = '';
    $query = "SELECT * FROM users WHERE id = '".$_POST["employee_id"]."'";
    $result =  mysqli_query($con, $query);
     
     while ($row = mysqli_fetch_array($result)) {
        $output.= '
        <div class="row clearfix">
                                            
        <div class="col-md-1" id="offset"></div>
        <label for="name" class=""> <strong>Name:</strong></label>   
        <div id="name" class="col-md-2">'.$row['name'].' </div>
        <div class="col-md-4" id="separator"></div>
        <label for="surname" class=""> <strong>Surname:</strong> </label>   
        <div id="surname" class="col-md-2">'.$row['surname'].'</div>
        
        </div>
        <br>
        <div class="row clearfix">
                                            
        <div class="col-md-1" id="offset"></div>
        <label for="email" class=""> <strong>Email:</strong></label>   
        <div id="email" class="col-md-3">'.$row['email'].' </div>
        <div class="col-md-3" id="separator"></div>
        <label for="idNum" class=""> <strong>ID Number:</strong> </label>   
        <div id="idNum" class="col-md-2">'.$row['idNumber'].'</div>
        
        </div>
        <br>
        <div class="row clearfix">
                                            
        <div class="col-md-1" id="offset"></div>
        <label for="dorm" class=""> <strong>Dorm:</strong></label>   
        <div id="dorm" class="col-md-2">'.$row['dorm'].' </div>
        <div class="col-md-4" id="separator"></div>
        <label for="roomNumbr" class=""> <strong>Room Number:</strong> </label>   
        <div id="roomNumbr" class="col-md-2">'.$row['roomNumber'].'</div>
        
        </div>
        ';
     }
     echo $output;
}

?>