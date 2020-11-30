<?php
require_once('connect.php');


if(isset($_POST['submit'])){
    $userID=$_POST['idNumber'];
    $query="SELECT * FROM users WHERE idNumber=?";
    $stmt=$con->prepare($query);
    $stmt->bind_param("i",$userID);
    $stmt->execute();

    $res=$stmt->get_result();
    $row_user=$res->fetch_assoc();

    $fetchedUserID=$row_user['idNumber'];
    $fetchedEmail=$row_user['email'];

    if ($userID==$fetchedUserID) {
       // echo "it works lol";
        
        $feedback="Success";
    }
    else{
        //THE ELSE IS BEING TAKEN CARE BY THE ID AVAILABLE FUNCTION. USING AJAX        

    }





}



?>