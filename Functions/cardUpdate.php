<?php

require('Config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $output=array();
    $registerData=json_decode(file_get_contents("php://input"));

    // $name = $registerData->name;
    $cardprice = $registerData->cardprice;
    $cardtype = $registerData->cardtype;
    $actualprice = $registerData->actualprice;
    $cardcolor = $registerData->cardcolor;
    $id = $registerData->id;

$insert=("UPDATE `cards` SET `cardtype` = '$cardtype', cardprice = '$cardprice', cardcolor='$cardcolor',actualprice='$actualprice' WHERE `cards`.`id` = '$id'");

if(mysqli_query($link, $insert)){
    mysqli_close($link);
    //echo "registered";
    echo "updated";



  
}
else{
    echo "added error";
    mysqli_close($link);
}

}

     
?>