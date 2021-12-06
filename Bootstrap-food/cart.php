<?php

session_start();

include('function.php');
include_once('connection.php');

// removing cart from list
if(isset($_POST['remove'])){
  if($_GET['action']=='remove'){
    foreach($_SESSION['cart'] as $key => $value){
      if($value['product_id']==$_GET['id']){
        unset($_SESSION['cart'][$key]);
      }
    }
  }
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
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="test.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Food Oder</title>
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="72" class="position-relative bg-light">
    <div class="container-fluid">
      
        <!-- navigationbar -->
    <div class="container">
    <?php 
    
    include_once('header.php');
    
    ?>
      </div>
        <div class="row px-5" style="margin-top: 130px;">
            <div class="col md-7">
                <div class="shopping-cart">
                    <h4>My Cart</h4><hr>
                    <?php 
                    $total=0;
                    if(isset($_SESSION['cart'])){
                      $product_id = array_column($_SESSION['cart'],'product_id');         
                      while($row=mysqli_fetch_assoc($result)){
                        foreach($product_id as $id){
                            if($row['ProID'] == $id){
                              cartelement($row['Status'],$row['Disprice'],$row['Price'],$row['image_url'],$row['ProID']);
                              $total += (int)$row['Price'];
                            }
                        }
                      }
                      while($row=mysqli_fetch_assoc($result1)){
                        foreach($product_id as $id){
                            if($row['ProID'] == $id){
                              cartelement($row['Status'],$row['Disprice'],$row['Price'],$row['image_url'],$row['ProID']);
                              $total += (int)$row['Price'];
                            }
                        }
                      }
                      
                      while($row=mysqli_fetch_assoc($result2)){
                        foreach($product_id as $id){
                            if($row['ProID'] == $id){
                              cartelement($row['Status'],$row['Disprice'],$row['Price'],$row['image_url'],$row['ProID']);
                              $total += (int)$row['Price'];
                            }
                        }
                      }
                      while($row=mysqli_fetch_assoc($result3)){
                        foreach($product_id as $id){
                            if($row['ProID'] == $id){
                              cartelement($row['Status'],$row['Disprice'],$row['Price'],$row['image_url'],$row['ProID']);
                              $total += (int)$row['Price'];
                            }
                        }
                      }
                      while($row=mysqli_fetch_assoc($result4)){
                        foreach($product_id as $id){
                            if($row['ProID'] == $id){
                              cartelement($row['Status'],$row['Disprice'],$row['Price'],$row['image_url'],$row['ProID']);
                              $total += (int)$row['Price'];
                            }
                        }
                      }
                      
                    }else{
                      echo "<h6>Price(0 items)</h6>";
                    }                   
                    ?>
                    
                </div>
              
            </div>
            <div class="col-md-4 offset-md-1 border-roundede mt-5 bg-white h-25">
                  <div class="pt-4">
                    <h6 style="font-weight: 500;">PRICE DETAILS</h6><hr>
                    <div class="row price-details">
                      <div class="col-md-6">
                        <?php 
                        if(isset($_SESSION['cart'])){
                        $count = count($_SESSION['cart']);
                        echo "<h6>Price($count items)</h6>";
                        }else{
                          echo "<h6>Price(0 items)</h6>";
                        }                        
                        ?>
                        <h6>Delivery Charges</h6><hr>
                        <h6>Amount Payable</h6>
                      </div>
                      <div class="col-md-6">
                        <h6><?= "$".$total; ?></h6>
                        <h6 class="text-success">FREE</h6><hr>
                        <h6><?= "$".$total; ?></h6>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
    </div>
   

    <script src="aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>
</html>