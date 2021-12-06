<?php 
include_once('function.php');
$host = 'localhost';
$db = 'Mytestdb';
$user = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

// print_r($_POST);
// die;
try {
    $conn = new mysqli($host, $user, $password, $db);
    //   delete data
    if(isset($_POST['delete'])){
        $id = $_POST['product_id'];

        $querydelete = "DELETE FROM tblproduct WHERE ProID = '$id' ";
        $query_run = mysqli_query($conn, $querydelete);
        if($query_run >0){
            echo "<script>alert(\"Data Deleted\")</script>";
        }else{
            echo "<script>alert(\"Data Not Deleted\")</script>";
        }
    }

    // ----------------type_id_data---------
    
    $sqltype = "SELECT type_id FROM tblproduct WHERE type_id IN(1,2) LIMIT 1";
    $sql = "SELECT * FROM tblproduct WHERE type_id = 1";
    $sql1 = "SELECT * FROM tblproduct WHERE type_id = 2";
    $sql2 = "SELECT * FROM tblproduct WHERE type_id = 3";
    $sql3 = "SELECT * FROM tblproduct WHERE type_id = 4";
    $sql4 = "SELECT * FROM tblproduct WHERE type_id = 5";


    // Retriev Data From DB
    $query = "SELECT * FROM tblproduct WHERE type_id IN(1,2)";

    

    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
    $result2 = $conn->query($sql2);
    $result3 = $conn->query($sql3);
    $result4 = $conn->query($sql4);
    $data1 = $conn->query($query);
    $result_typeid =$conn->query($sqltype);
    if (mysqli_num_rows($result) > 0) {
        return $result;
    }
    if (mysqli_num_rows($result1) > 0) {
        return $result1;
    }
    if (mysqli_num_rows($result2) > 0) {
        return $result2;
    }
    if (mysqli_num_rows($result3) > 0) {
        return $result3;
    }
    if (mysqli_num_rows($result4) > 0) {
        return $result4;
    }
    if (mysqli_num_rows($data1) > 0) {
        return $data1;
    }
    if (mysqli_num_rows($result_typeid) > 0) {
        return $result_typeid;
    }
}
catch (PDOException $e) {
	echo $e->getMessage();
}

?>