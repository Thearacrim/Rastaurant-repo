<?php
include_once('connection.php');
if(isset($_POST['updatedata'])){
    $id = $_POST['id'];
    $status = $_POST['status'];
    $disprice = $_POST['disprice'];
    $price = $_POST['price'];
    $decribtion = $_POST['decribtion'];
    $image = $_POST['image_url'];
    $star = $_POST['star'];
    $queryupdate = "UPDATE tblproduct SET Status='$status', Disprice='$disprice', Price='$price', Decribtion='$decribtion', image_url='$image', Star='$star' WHERE ProID = '$id' ";
    $result_update = mysqli_query($conn, $queryupdate);
    
    if ($result_update) {           
        header("location:backend.php");
      
    }
}   
else{
    echo "<script>alert(\"Data not Edit\")</script>";
    // echo "hi";
    
}
// if(isset($_POST['updatedata'])){
//     $id = $_POST['id_update'];
//     $status = $_POST['status'];

//     $querydelete = "UPDATE tblproduct SET Status='$status' WHERE ProID = '$id' ";
//     $query_run = mysqli_query($conn, $querydelete);
//     if($query_run >0){
//         echo "<script>alert(\"Data Deleted\")</script>";
//         echo $status;
//     }else{
//         echo "<script>alert(\"Data Not Deleted\")</script>";
//     }
// }
echo "hi";