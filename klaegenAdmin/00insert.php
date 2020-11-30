<?php
include('includes/connect.php');

if(!empty($_POST)){
$output='<div class="alert alert-success" role="alert">
Complaint Successfully Updated!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>';

$complaintnumber= mysqli_real_escape_string($con, $_POST["complaintID"]);
$status= mysqli_real_escape_string($con, $_POST["status"]);
$remark= mysqli_real_escape_string($con, $_POST["remark"]);

$req=mysqli_query($con,"insert into complaintfeedback(complaintID,status,feedback) values('$complaintnumber','$status','$remark') ");

$compUpdate=mysqli_query($con,"update complaints set status='$status' WHERE id='$complaintnumber'");

if(!$req){echo "There's an error with the 00insert.php";}

echo $output;

}


?>