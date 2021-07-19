<?php
require('Config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $output=array();
    $registerData=json_decode(file_get_contents("php://input"));

    // $name = $registerData->name;
    $email = $registerData->email;
    $password = $registerData->password;
    

$query = "SELECT * FROM `user` WHERE `email` ='$email' AND`password` ='$password'";

$result = mysqli_query($link, $query);
 
$count = mysqli_num_rows($result);


 if($count>0){

    $detail = mysqli_fetch_assoc($result);

    $_SESSION['admin_email'] =  $detail['email'];
    $_SESSION['isLoggedin'] =  "admin_loggedin";

    
    echo "exist";
      

    
     
 }  
 else {
     echo "not f";
 }


}

?>