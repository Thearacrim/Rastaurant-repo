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
    <link rel="stylesheet" href="test.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Food Oder</title>
</head>
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

          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>Food</span>
              <span class="badge badge-pill badge-danger">1</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="backendourfood.php">Our Food
                    <span class="badge badge-pill badge-success">Pro</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="sidebar-dropdown">
            <a href="backendsweet.php">
              <i class="fa fa-chart-line"></i>
              <span>Sweet</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="backendbeer.php">
              <i class="fa fa-globe"></i>
              <span>Beer</span>
            </a>
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
    <div class="container">
    <div class="table-responsive">
      <h2>Data Food List</h2>
    <table class="table table-bordered table-sm" id="tbl-container" style="background-color:#fff;">
    <thead>
      <tr style="text-align:center; width:100px">
        <th>ProId</th>
        <th style="width: 150px;">Status</th>
        <th style="width: 150px;">Discount Price</th>
        <th>Price</th>
        <th>Decribtion</th>
        <th>Image</th>
        <th>Star</th>
        <th>Type_ID</th>
        <th>Edit</th>
        <th>Update</th>
      </tr>
    </thead>
    <tbody>
        <?php

        while($row = mysqli_fetch_assoc($data1)){
            showdata($row['ProID'],$row['Status'],$row['Disprice'],$row['Price'],$row['Decribtion'],$row['image_url'],$row['Star'],$row['type_id']);
        }

        ?>
    </div>


    </div>

  </main>
  <div class="add-new">
  <!-- ---------------------------------Create_Table--------------------------------------- -->
  <?php

        // while($row = mysqli_fetch_assoc($result_typeid)){
        //     typeid($row['type_id']);
        // }

        ?>
        <i class="fas fa-plus-circle" data-bs-toggle="modal" data-bs-target="#foodadddata"></i>
    <div class="modal fade" id="foodadddata" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="backendinsert.php" method="POST">
        <div class="modal-body">
          <!-- block live demo -->
          <div class="form-floating mb-3">
          <input type="text" class="form-control" name="status" id="floatingInput" placeholder="Status" required >
          <label for="floatingInput">Status</label>
        </div><br>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="disprice" id="floatingInput" placeholder="Disprice" required>
          <label for="floatingInput">Disprice</label>
        </div><br>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="price" id="floatingInput" placeholder="Price" required >
          <label for="floatingInput">Decribtion</label>
        </div><br>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="decribtion" id="floatingInput" placeholder="Decribtion" required>
          <label for="floatingInput">Decribtion</label>
        </div><br>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="image-url" id="floatingInput" placeholder="Image Link" required >
          <label for="floatingInput">Image Link</label>
        </div><br>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="star" id="floatingInput" placeholder="Star" required  >
                   <label for="floatingInput">Star</label>
        </div><br>
        <select class="form-select" name="type_id" aria-label="Default select example">
        <option selected>Select Type of ID</option>
        <option value="1">1</option>
        <option value="2">2</option>
        </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" name="insertdata" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
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
