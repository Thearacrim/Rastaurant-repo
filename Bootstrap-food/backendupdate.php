<?php 
include_once('connection.php');
include_once('function.php');

// -------------Retrieve-Data---------
if(isset($_GET['id'])){
  function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $id = validate($_GET['id']);
  $sql = "SELECT * FROM tblproduct WHERE ProID = '$id'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
  }
}else{
  header("location:backend.php");
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

    .footbtn{
        display: flex;
        justify-content: space-between;
    }
</style>
<body>
<div class="modal-body">

<form action="update_conn.php" method="POST">
        <h2 class="display-6 text-center pb-3">Update Data</h2>
        <input type="hidden" name="id" value="<?= $row['ProID'] ?>">
          <!-- block live demo -->
          <div class="form-floating mb-3">
          <input type="text" class="form-control" name="status" id="floatingInput" placeholder="Status" value="<?= $row['Status'] ?>">
          <label for="floatingInput">Status</label>
        </div><br>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="disprice" id="floatingInput" placeholder="Disprice" value="<?= $row['Disprice'] ?>">
          <label for="floatingInput">Disprice</label>
        </div><br>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="price" id="floatingInput" placeholder="Price" value="<?= $row['Price'] ?>">
          <label for="floatingInput">Price</label>
        </div><br>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="decribtion" id="floatingInput" placeholder="Decribtion" value="<?= $row['Decribtion'] ?>">
          <label for="floatingInput">Decribtion</label>
        </div><br>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="image_url" id="floatingInput" placeholder="Image Link" value="<?= $row['image_url'] ?>">
          <label for="floatingInput">Image Link</label>
        </div><br>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="star" id="floatingInput" placeholder="Star" value="<?= $row['Star'] ?>">
          <label for="floatingInput">Star</label>
        </div><br>
        <div class="footbtn pb-3">
        <button type="submit" name="updatedata" class="btn btn-primary">Update  </button>
        <a href="backend.php"><button type="button" class="btn btn-primary">Cancel</button></a>
        </div>
        </div>

        </form>

        <script src="aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="index.js"></script>
</body>
</html>
