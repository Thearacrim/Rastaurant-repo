<?php

$t = time();
$temp = explode(".",$_FILES["profile_user"]["name"]);
$img_name = rand(10000,99999999999).$t.'.'.end($temp);
$tmp = $_FILES["profile_user"]["name"];
// move_upload_file
($tmp."..image/".$img_name);
?>
<img src="..image/<?php echo $img_name; ?>" alt="">
