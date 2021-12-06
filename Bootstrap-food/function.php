<?php
function cardproduct($status, $decribtion,$disprice, $price, $image,$star,$productid){
  $star_str = '';
  for ($i=1; $i <= 5; $i++) {
    if($i <= $star){
      $star_str .= ' <i class="star-icon fas fa-star"></i>';
    }else{
      $star_str .= ' <i class="fas fa-star"></i>';
    }
  }
$me = "
<div class=\"col-xl col-lg-3 col-md-4 col-sm-6 col-xs-12\"data-aos=\"fade-up\"data-aos-duration=\"1000\">
<form method=\"post\" action=\"index.php\" nsubmit=\"return false\">
                <div class=\"card-scale\" style=\"margin: 2rem 0;\">
                 <img src=\"$image\">
                    <div class=\"card-body\">
                      <h4 class=\"card-title\">$status</h4>
                     $star_str<br>
                      <p class=\"text\">$decribtion</p>
                      <small><s>$$disprice</s></small>
                    <div class=\"btn-add\">
                      <h5>$$price</h5>
                      <button type=\"submit\" class=\"btn-price\" name=\"add\" value=\"$productid\">ADD<i class=\"fas fa-cart-plus\" ></i></button>
                      <input type=\"hidden\" name=\"product_id\" value=\"$productid\">
                      </div>
                    </div>
                  </div>
                  </form>
            </div>
";
echo $me;
}
function cardtype($status,$decribtion,$price,$image,$productid){
  $type = "

  <div class=\"cart-hover-price col-xl col-lg-3 col-md-4 col-sm-6 col-xs-12\">
  <form method=\"post\" action=\"index.php\" nsubmit=\"return false\">
  <div class=\"content\">
  <h4>$status</h4><hr>
   <small>Update Date</small>
  <p>$decribtion</p>
  <h5 style=\"font-weight: 800;font-family: \"Mochiy Pop P One\", sans-serif;font-size: 1rem;\">$$price</h5>
  <button type=\"submit\" class=\"btn-price\" name=\"add\" value=\"$productid\">ADD<i class=\"fas fa-shopping-cart\"></i></button>
  <input type=\"hidden\" name=\"product_id\" value=\"$productid\">
</div>
                <div class=\"card\" style=\"margin: 2rem 0;\"data-aos=\"fade-down\"data-aos-duration=\"1000\">
                    <img src=\"$image\" class=\"card-img-top\">
                  </div>
                  </form>
            </div>

  ";
  echo $type;
}

function cartelement($status,$disprice,$price,$image,$proid){
  $cartelement = "

  <form action=\"cart.php?action=remove&id=$proid\" method=\"post\" class=\"cart-items\">
                        <div class=\"border rounded\">
                            <div class=\"row bg-white\">
                                <div class=\"col-md-3\">
                                <img src=\"$image\" alt=\"image\" class=\"img-fluid\">
                                </div>
                                <div class=\"col-md-6 card-body\">
                                <h5 class=\"pt-2\">$status</h5>
                                <small class=\"text-secondary\">Seller:dailytution</small><br>
                                <small class=\"text-secondary\"><s>$$disprice</s></small>
                                <h5 class=\"pt-2\">$$price</h5>
                                <button type=\"submit\" class=\"btn btn-warning\">Save for Later</button>
                                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                                </div>
                                <div class=\"col-md-3 py-5\">
                                    <div class=\"center\">
                                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-minus\"></i></button>
                                        <input type=\"text\" class=\"form-control d-inline input-price\" value=\"1\">
                                        <button type=\"button\" class=\"btn bg-light border rounded-circle\"><i class=\"fas fa-plus\"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

  ";
  echo $cartelement;
}

function showdata($proid,$status,$dispric,$price,$decribtion,$img,$star,$type_id){
  $data = "
  <tr class=\"position\">
  <td>$proid</td>
  <td>$status</td>
  <form action=\"backendinsert.php\" method =\"POST\"><input type=\"hidden\" name=\"product_id\" value=\"\"></form>
  <td><s>$$dispric</s></td>
  <td>$$price</td>
  <td style=\" overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 1; /* number of lines to show */
  line-clamp: 2;
  -webkit-box-orient: vertical;\">$decribtion</td>
  <td><img src=\"$img\" class=\"img-data\"> </td>
  <td>$star<i class=\"star-icon fas fa-star\"></i></td>
  <td>$type_id</td>
  <td><form action=\"update_conn.php\" method =\"POST\">
  <input type=\"hidden\" name=\"product_id\" value=\"$proid\">
  <a href=\"backendupdate.php?id=$proid\"><i class=\"icon-pro far fa-edit\"></i></a>
  </form></td>
  <form action=\"backend.php\" method=\"POST\">
  <input type=\"hidden\" name=\"product_id\" value=\"$proid\">
  <td><button style=\"border:none;background:none;\" type=\"submit\" name=\"delete\" value=\"DELETE\"><a href=\"#\"><i class=\"icon-pro far fa-trash-alt\"></i></a></button></td>
  </form>
</tr>
  ";
  echo $data;
}
function typeid($type_id){
  $typeid="
  <form action=\"backend.php\" method =\"POST\">
  <a href=\"#?typeid=$type_id\"><i class=\"fas fa-plus-circle\" data-bs-toggle=\"modal\" data-bs-target=\"#foodadddata\"></i></a>
  </form>
  ";
  echo $typeid;
}
echo "hi";
?>
