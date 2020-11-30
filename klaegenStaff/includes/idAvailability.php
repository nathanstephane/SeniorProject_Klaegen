<?php
require_once('connect.php');
if(!empty($_POST['username'])){
    $username=$_POST['username'];
    $query="SELECT username FROM staffusers WHERE username=?";
    $stmt=$con->prepare($query);
    $stmt->bind_param("s",$username);
    $stmt->execute();

    $result=$stmt->get_result();
    $count=mysqli_num_rows($result);
    if($count>0){
        echo "<span style='color:yellow'> Username already exists .</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
       } else{
           
           echo "<span style='color:#dedcdb'> Username available :)</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
       }        

    

}

?>