<?php 

require_once('Config.php');



$query = "SELECT * FROM `customer` WHERE 1";

$output=array();

$run=mysqli_query($link,$query);
if(mysqli_num_rows($run)>0){
    while($row=mysqli_fetch_array($run)){	
        $temp=array();
        $temp['cus_id']=$row['cus_id'];
        $temp['name']=$row['name'];
        $temp['email']=$row['email'];
        
   
        array_push($output,$temp);
    }
    echo json_encode($output,JSON_UNESCAPED_SLASHES);	
}
else{
    echo "Error";
}

?>