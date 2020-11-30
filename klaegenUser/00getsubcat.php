<?php
include('includes/connect.php');
if(!empty($_POST["catid"])){
    $id=intval($_POST['catid']);
    if(!is_numeric($id)){
        echo htmlentities("Error, that isn't an integer");
        exit;
    }
    else{
        $stmt = mysqli_query($con,"SELECT subcategoryName FROM complaint_subcategory WHERE categoryID = '$id' ");
        ?><option selected="selected">Select a Sub-category</option><?php
        while($row=mysqli_fetch_array($stmt)){
            ?>
            <option value="<?php echo htmlentities($row['subcategoryName']); ?>"><?php echo htmlentities($row['subcategoryName']); ?></option>
        <?php 
        }
    }

}
?>