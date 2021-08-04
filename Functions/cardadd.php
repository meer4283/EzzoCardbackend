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
    $cardcurr = $registerData->cardcurr;

$insert=("INSERT INTO `cards` (`id`, `cardprice`, `cardtype`, `actualprice`, `cardcolor`, `card_currency`) VALUES (NULL, '$cardprice', '$cardtype', '$actualprice', '$cardcolor','$cardcurr');");

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