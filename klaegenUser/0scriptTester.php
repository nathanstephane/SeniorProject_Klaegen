            

                        <?php 
                        
                    include("includes/connect.php");

$query=mysqli_query($con,"select complaints.*,users.name as studentName,complaintcategory.categoryName as categName,staffusers.position as staffposition from complaints join users on users.id=complaints.userID join staffusers on staffusers.id=complaints.receiverID join complaintcategory on complaintcategory.id=complaints.categoryID where complaints.id='".$_GET['complaintId']."'"); 
                       
$qry=mysqli_query($con,"SELECT users.*, count(*) from complaints where complaints.userID = users.id as numbr_complaint join complaints on complaints.id=users.ID ");
                       
                    //    SAY MY NAME

                     $nom=$_SESSION['login']; $qry=mysqli_query($con,"SELECT * FROM users WHERE idNumber='$nom' ");

$num=mysqli_fetch_array($qry);
if($num>0){
    echo $num['name'];
}

                       ?>                            


