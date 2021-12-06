<?php 

include_once('connection.php');
if(isset($_POST['updatedata']))
{
    $file = $_FILES['profile_user'];
    
    $filename = $_FILES['profile_user']['name'];
    $fileTmp = $_FILES['profile_user']['tmp_name'];
    $fileSize = $_FILES['profile_user']['size'];
    $fileError = $_FILES['profile_user']['error'];
    $fileType = $_FILES['profile_user']['type'];

    $fileExt = explode('.', $filename);
    $fileActualExt = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png', 'pdf');
    if(in_array($fileActualExt, $allow)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $filenameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = 'image/'.$filenameNew;
                move_uploaded_file($fileTmp, $fileDestination);
                $id = $_POST['id'];
                $username = $_POST['uname'];
                $cur_password = $_POST['cur_password'];
                $image = $filenameNew;
                $queryupdate = "UPDATE tbllogin SET username = '$username', password = '$cur_password',image = '$filenameNew' WHERE id = '$id' ";
                $result_update = mysqli_query($conn, $queryupdate);
                if ($result_update) {           
                    header("location:backend.php");
                    die;
               
                }        


            }else{
                echo "This file is oversize.";
            }
        }else{
            echo "There was an error uploading your file!";
        }
    }else{
        echo "You can't not upload this file";
    }
    
}   
else{
    echo "<script>alert(\"Data not Edit\")</script>";
    // echo "hi";
    
}