<?php

require('Config.php');


$curr_date =  date("Y-m-d");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $output=array();
    $registerData=json_decode(file_get_contents("php://input"));

    // $name = $registerData->name;
    $couponcode = $registerData->couponcode;
    $couponused = $registerData->couponused;
    

$insert=("INSERT INTO `coupons` (`c_id`, `c_code`, `date_created`, `used_times`) VALUES (NULL, '$couponcode', '$curr_date', '$couponused');");

if(mysqli_query($link, $insert)){
    mysqli_close($link);
    //echo "registered";
    echo "added";



  
}
else{
    echo "added error";
    mysqli_close($link);
}

}

     
?>