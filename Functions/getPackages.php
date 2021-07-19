<?php 

require_once('Config.php');



$query = "SELECT * FROM `cards` ";

$output=array();

$run=mysqli_query($link,$query);
if(mysqli_num_rows($run)>0){
    while($row=mysqli_fetch_array($run)){	
        $temp=array();
        $temp['cardprice']=$row['cardprice'];
        $temp['cardtype']=$row['cardtype'];
        $temp['actualprice']=$row['actualprice'];
        $temp['cardcolor']=$row['cardcolor'];
        $temp['id']=$row['id'];
        
   
        array_push($output,$temp);
    }
    echo json_encode($output,JSON_UNESCAPED_SLASHES);	
}
else{
    echo json_encode($output,JSON_UNESCAPED_SLASHES);	
}

?>