<?php
session_start();
include('function.php');
include_once('connection.php');

if(isset($_POST['add'])){
  //  print_r($_POST['product_id']);
  if(isset($_SESSION['cart'])){
    $item_array_id = array_column($_SESSION['cart'],"product_id");

    if(in_array($_POST['product_id'], $item_array_id)){
      echo "<script>alert(\"This Recipe already added\");</script>";
      echo "<script>window.location='index.php'</script>";
    }else{
      $count = count($_SESSION['cart']);
      $item_array = array(
        'product_id'=>$_POST['product_id']
      );
      $_SESSION['cart'][$count]=$item_array;
    }
  }else{
    $item_array = array(
      'product_id'=>$_POST['product_id']
    );
    $_SESSION['cart'][0]=$item_array;
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
    <link rel="stylesheet" href="slidefood.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Food Oder</title>
</head>
<body data-spy="scroll" data-target="#navbar" data-offset="72" class="position-relative">
    <div class="container-fluid">
      
        <!-- navigationbar -->
    <div class="container">
        <?php 
        
        include_once('header.php');
        
        ?>
           <!-- <--image-bener -->
          <div class="img-bener">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <section class="text-slide box-shadow">
                    <h2> A food with a sharp taste. Often used to refer to tart or sour foods as well.</h2>
                    <img class="text-image" src="https://cdnimg.webstaurantstore.com/uploads/buying_guide/2014/6/menus4.jpg" class="d-block w-100" alt="...">
                    <em>Spacail Price for yammy food</em>
                  </section>
                </div>
                <div class="carousel-item">
                  <section class="text-slide box-shadow">
                    <div class="part-sec">
                    <h2> The flavor of your food is what most customers focus on when they are deciding what to eat.</h2>
                    <img class="text-image" src="https://media.istockphoto.com/photos/trio-of-tasty-chocolate-vanilla-and-strawberry-flavored-frozen-in-a-picture-id1300696359?b=1&k=20&m=1300696359&s=170667a&w=0&h=OlbF5gEFchaHTBQ-qjTQnYQ6ApJeCklAf32Evy1OMjg=" class="d-block w-100" alt="...">
                  </div>
                    <em>Spacail Price for ice cream</em>
                  </section>                
                </div>
                <div class="carousel-item">
                  <section class="text-slide box-shadow">
                    <h2> A food with a sharp taste. Often used to refer to tart or sour foods as well.</h2>
                    <img class="text-image" src="https://st.depositphotos.com/1002351/1907/i/950/depositphotos_19071513-stock-photo-full-red-wine-glass-goblet.jpg" class="d-block w-100" alt="...">
                    <em>Spacail Price for beauty wine</em>
                  </section>              
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="card-spot"data-aos="fade-right"data-aos-duration="1000" >
            <h2 id="drink">Pupolar Food</i></h2>
        </div>
          <div class="row">
          <?php 
            while($row=mysqli_fetch_assoc($result)){
              cardproduct($row['Status'],$row['Decribtion'],$row['Disprice'],$row['Price'],$row['image_url'],$row['Star'],$row['ProID']);
            }
            ?>
            </div>
            <hr>
            <div class="row">
          <?php 
            while($row=mysqli_fetch_assoc($result1)){
              cardproduct($row['Status'],$row['Decribtion'],$row['Disprice'],$row['Price'],$row['image_url'],$row['Star'],$row['ProID']);
            }
            ?>
            </div>
            
          <div class="card-spot"data-aos="fade-left"data-aos-duration="1000">
            <h2 id="food">Our Food</i></h2>
        </div>
             <div class="row">
             
               <?php 
               while($row=mysqli_fetch_assoc($result2)){
                cardtype($row['Status'],$row['Decribtion'],$row['Price'],$row['image_url'],$row['ProID']);
               }
               ?>
               
             
               </div>

          <div class="card-spot"data-aos="fade-right"data-aos-duration="1000">
            <h2 id="Sweet">Top Sweet</h2>
        </div>
        <div class="row">
          <?php 
            while($row=mysqli_fetch_assoc($result3)){
             cardtype($row['Status'],$row['Decribtion'],$row['Price'],$row['image_url'],$row['ProID']);
            }
            ?>
            </div>
          ?>
          <!-- Grid CSS -->
    <div class="card-spot"data-aos="fade-left"data-aos-duration="1000">
      <h2 id="drink">Drink</h2>
  </div>
  <div class="row">
          <?php 
            while($row=mysqli_fetch_assoc($result4)){
             cardtype($row['Status'],$row['Decribtion'],$row['Price'],$row['image_url'],$row['ProID']);
            }
            ?>
            </div>
        <div class="card-spot"data-aos="fade-right"data-aos-duration="1000">
          <h2>In the Spotlight</h2>
      </div>
      <div class="row">
        <div class="col-xl col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="card" style="margin: 2rem 0;"data-aos="fade-down"data-aos-duration="1000">
                <img src="https://www.siemreap.net/wp-content/uploads/2016/12/851_lucky-supermarket-siem-reap-1.jpg" class="card-img-top" alt="...">
              </div>
        </div>
        <div class="col-xl col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="card" style="margin: 2rem 0;"data-aos="fade-up"data-aos-duration="1000">
                <img src="https://img.theculturetrip.com/wp-content/uploads/2017/01/ct-central-market.jpg" class="card-img-top" alt="...">
              </div>
        </div>
        <div class="col-xl col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="card" style="margin: 2rem 0;"data-aos="fade-down"data-aos-duration="1000">
                <img src="https://cdn.fazwaz.com/nw/kKVYjqMz7MHXl1RHI7l0mojWJB0/520x350/sub-place/4420/lucky.png" class="card-img-top" alt="...">
              </div>
        </div>
        <div class="col-xl col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="card" style="margin: 2rem 0;"data-aos="fade-up"data-aos-duration="1000">
                <img src="https://www.b2b-cambodia.com/wp-content/uploads/2017/05/cambodia-makro-wholesaler-featured-image-2.jpg" class="card-img-top" alt="...">
              </div>
        </div>
      </div>
      <div class="card-spot"data-aos="fade-left"data-aos-duration="1000">
        <h2 id="service">Our Service <i class="fas fa-tools"></i></h2>
    </div>
      <div class="row">
        <div class="col-xl col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="card" style="margin: 2rem 0;"data-aos="fade-down"data-aos-duration="1000">
                <img class="image-delivery" src="https://static.vecteezy.com/system/resources/previews/001/103/141/non_2x/food-delivery-worker-wears-a-mask-and-gloves-at-customer-s-doorstep-to-deliver-lunch-free-photo.jpg" class="card-img-top" alt="...">
              </div>
        </div>
        <div class="col-xl col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="card" style="margin: 2rem 0;"data-aos="fade-up"data-aos-duration="1000">
                <img class="image-delivery" src="https://www.b2b-cambodia.com/wp-content/uploads/2020/02/Ooctane-Muuve-Cambodian-food-delivery-startup-1.jpg" class="card-img-top" alt="...">
              </div>
        </div>
        <div class="col-xl col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <div class="card" style="margin: 2rem 0;"data-aos="fade-down"data-aos-duration="1000">
                <img class="image-delivery" src="https://assets3.thrillist.com/v1/image/2973306/1200x630/flatten;crop_down;jpeg_quality=70" class="card-img-top" alt="...">
              </div>
        </div>
        <div class="col-xl col-lg-3 col-md-4 col-sm-6 col-xs-12">
          <div class="card" style="margin: 2rem 0;"data-aos="fade-up"data-aos-duration="1000">
              <img class="image-delivery" src="https://media.istockphoto.com/photos/food-delivery-drivers-are-driving-to-deliver-products-to-customers-picture-id1277194125?b=1&k=20&m=1277194125&s=170667a&w=0&h=CP_ekcIsl76zHHzEmWwxkj7ypsA5T4i6BCBueG3TknA=" alt="...">
            </div>
      </div>
        
      </div>
      <div class="card-spot"data-aos="fade-right"data-aos-duration="1000">
        <h2 id="service">Check Out <i class="fas fa-tools"></i></h2>
    </div>
    <div class="form" data-aos="fade-right"data-aos-duration="1000">
      <form class="login-box row g-3 needs-validation" novalidate>
        <div class="col-md-4" data-aos="fade-left"data-aos-duration="1000">
          <label for="validationCustom01" class="form-label">First name</label>
          <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-right"data-aos-duration="1000">
          <label for="validationCustom02" class="form-label">Last name</label>
          <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-4"data-aos="fade-left"data-aos-duration="1000">
          <label for="validationCustomUsername" class="form-label">Username</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
            <div class="invalid-feedback">
              Please choose a username.
            </div>
          </div>
        </div>
        <div class="col-md-6"data-aos="fade-right"data-aos-duration="1000">
          <label for="validationCustom03" class="form-label">City</label>
          <input type="text" class="form-control" id="validationCustom03" required>
          <div class="invalid-feedback">
            Please provide a valid city.
          </div>
        </div>
        <div class="col-md-3"data-aos="fade-left"data-aos-duration="1000">
          <label for="validationCustom04" class="form-label">State</label>
          <select class="form-select" id="validationCustom04" required>
            <option selected disabled value="">Choose...</option>
            <option>...</option>
          </select>
          <div class="invalid-feedback">
            Please select a valid state.
          </div>
        </div>
        <div class="col-md-3"data-aos="fade-right"data-aos-duration="1000">
          <label for="validationCustom05" class="form-label">Zip</label>
          <input type="text" class="form-control" id="validationCustom05" required>
          <div class="invalid-feedback">
            Please provide a valid zip.
          </div>
        </div>
        <div class="col-12"data-aos="fade-left"data-aos-duration="1000">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
              You must agree before submitting.
            </div>
          </div>
        </div>
        <a href="#">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          Submit
        </a>
      </form>
    </div>
  </div>
  
    <div class="footer">     
        <div class="icon-so" data-aos="fade-left"data-aos-duration="1000">
        <i class="fab fa-facebook-square"></i>
        <i class="fab fa-telegram-plane"></i>
        <i class="fab fa-instagram"></i>    
        <i class="fab fa-tiktok"></i>
        </div>
        <div class="btn">
            <p>@Copy by Tholsotheara</p>
            <a href="#">Contact me</a>
        </div>
        <a href="#" class="scroll-up">
          <i class="fas fa-chevron-up scroll-icon"></i>
        </a>
        <!-- scroll-sigh -->

        <div class="scroll-down"></div>
    </div>
    <!-- script jquery -->
   

    <script src="aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="index.js"></script>
</body>
</html>
