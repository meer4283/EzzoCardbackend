<?php
require('Config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $output=array();
    $registerData=json_decode(file_get_contents("php://input"));

    $name = $registerData->name;
    $email = $registerData->email;
    $password = $registerData->password;
    

$query = "SELECT * FROM `user` WHERE `email` ='$email'";

$result = mysqli_query($link, $query);
 
$count = mysqli_num_rows($result);

if($count == 1){
           
    echo "exist";
       
         }
 else{
   
   
    $login ="notexist" ;
     

    


    $insert = "INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$password');";

    
if(mysqli_query($link, $insert)){
    mysqli_close($link);
    echo "registered";




  
}
else{
    echo "Register error";
    mysqli_close($link);
}



     }     


}

?>