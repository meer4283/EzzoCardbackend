<?php 

require_once('Config.php');



$query = "SELECT * FROM `orders` ";

$output=array();

$run=mysqli_query($link,$query);
if(mysqli_num_rows($run)>0){
    while($row=mysqli_fetch_array($run)){	
        $temp=array();
        $temp['order_id']=$row['order_id'];
        $temp['customer_id']=$row['customer_id'];
        $temp['order_date']=$row['order_date'];
        $temp['total_price']=$row['total_price'];
        $temp['session_id']=$row['session_id'];
        $temp['trx_id']=$row['trx_id'];
        $temp['is_checkout']=$row['is_checkout'];
        $temp['paytment_type']=$row['paytment_type'];
        $temp['amount']=$row['amount'];
        $temp['is_payed']=$row['is_payed'];
      
   
        array_push($output,$temp);
    }
    echo json_encode($output,JSON_UNESCAPED_SLASHES);	
}
else{
    echo json_encode($output,JSON_UNESCAPED_SLASHES);	
}

?>