<?php 
include_once('connection.php');
// include_once('function.php');

// // -------------Retrieve-Data---------
if(isset($_GET['id'])){
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $id = validate($_GET['id']);
  $sql = "SELECT * FROM tbllogin WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
  }
}else{
  header("location:backend.php");
}


?>
<?php
session_start();
include_once('function.php');
include_once('connection.php');

if(!isset($_SESSION["user_id"]) && !$_SESSION["user_id"]){
  header("location:loginform_backend.php");
  die;
}

$sql = "SELECT * FROM tbllogin WHERE id=".$_SESSION["user_id"];
$result = mysqli_query($conn, $sql);
$current_user = mysqli_fetch_assoc($result);
if(empty($current_user['image'])){
  $current_user['image'] ='default-facebook.jpg';
}else{
  $current_user['image'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="backend.css">
    <link rel="stylesheet" href="usersetting.css">
    <link rel="stylesheet" href="test.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Food Oder</title>
</head>
<style>
  .modal-body{
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.modal-body form{
  width: 500px;     
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

}

.pic-file{
position: absolute;
top: 50px;
left: 42%;
width: 150px;
height: 150px;
/* border: 1px solid #ccc; */
border-radius: 100%;
background-size: contain;
background-repeat: no-repeat;
background-position: center;
}
#input{
width: 150px;
height: 150px;
opacity: 0;
cursor: pointer;
border-radius: 100%;
position: relative;
}
.icon {
font-size: 30px;
position: absolute;
opacity: 0;
top: 60px;
left: 60px;
/* opacity: 0; */
}
#img{
width: 150px;
height: 150px;
border-radius: 100%;
position: absolute;
top: 0;
left: 0;
z-index: -1;
}
.icon:hover{
opacity: 1;
transition: transform 0.3s ease;
}
.pic-file:hover{
transform: scale(1.1);
transition: transform 0.5s ease;
}
.control-form{
margin-top: 150px;
}
.btn-edit{
font-size: 18px;
padding: 8px 6pxpx;
border-radius: 6px;
color: #fff;
border: 1px solid #2FDD92;
background-color: #2FDD92;
}

.footbtn{
  display: flex;
  justify-content: space-between;
}

</style>
<body style="background-color: rgba(180, 180, 180, 0.6);">
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand"> 
        <a href="#">pro sidebar</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="logo img-responsive img-rounded-cycle" src="image/<?= $current_user['image']?>">
        </div>
        <div class="user-info">
          <span class="user-name"><?= $current_user['username']?>
          </span>
          <span class="user-role">Administrator</span>
          <span class="user-status">
            <i class="fa fa-circle"></i>
            <span>Online</span>
          </span>
        </div>
        <div class="user-edit">
          <a href="usersetting.php?id=<?= $current_user['id']?>"><i class="fas fa-user-cog"></i></a>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
            <div class="input-group-append">
              <span class="input-group-text">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>
            </div>
          </div>
        </div>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>

        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="logout.php">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
  <!-- sidebar-wrapper  -->
  <main class="page-content">
  <div class="modal-body">

<form action="usersetting_update.php" method="POST" enctype="multipart/form-data">   
<div class="pic-file">
    <input name="profile_user" onchange=file_changed() type=file id=input>
    <img id=img src=image/<?= $row['image'] ?>>
    <div class="icon-con">
    <i class="icon fas fa-camera"></i>
    </div>
</div>
        
<input type="hidden" name="id" value="<?= $row['id'] ?>">        
          <!-- block live demo -->
        <div class="control-form">
          <div class="form-floating mb-3">
          <input type="text" class="form-control" name="uname" id="floatingInput" placeholder="Status" value="<?= $row['username'] ?>">
          <label for="floatingInput">Status</label>
          </div><br>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="cur_password" id="floatingInput" placeholder="Status" value="<?= $row['password'] ?>">
          <label for="floatingInput">Current-Password</label>
        </div><br>
        <div class="footbtn pb-3">
        <button type="submit" name="updatedata" class="btn btn-primary">Update  </button>
        <a href="backend.php"><button type="button" class="btn btn-primary">Cancel</button></a>
        </div>
        </div>

        </form>
  </div>

  <!-- ------------------------------------------------------update-model---------------------------------------------------- -->

  <!-- page-content" -->
</div>
<!-- page-wrapper -->

    <script src="aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>
</html>

