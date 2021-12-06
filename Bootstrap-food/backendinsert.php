<?php

include_once('connection.php');
;
if(isset($_POST['insertdata'])){
    $status = $_POST['status'];
    $disprice = $_POST['disprice'];
    $price = $_POST['price'];
    $decribtion = $_POST['decribtion'];
    $image = $_POST['image-url'];
    $star = $_POST['star'];
    $type = $_POST['type_id'];

    $queryinsert = "INSERT INTO tblproduct (Status, Disprice, Price, Decribtion, image_url,Star, type_id) VALUES('$status','$disprice','$price','$decribtion','$image','$star','$type') ";
    $query_run_insert = mysqli_query($conn, $queryinsert);
    if($query_run_insert){
        echo ("<script>Data Save</script>");
        header("location:backend.php");
    }
    else{
        echo ("<script>Data not Save</script>");
    }
}
