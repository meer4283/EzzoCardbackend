<?php 

require_once('Config.php');



$package_id = $_GET['id'];

$query = "SELECT * FROM `cards` where id = '$package_id' ";

$output=array();

$run=mysqli_query($link,$query);
if(mysqli_num_rows($run)>0){
 
        $row = mysqli_fetch_assoc($run);

        $temp=array();
        $temp['cardprice']=$row['cardprice'];
        $temp['cardtype']=$row['cardtype'];
        $temp['actualprice']=$row['actualprice'];
        $temp['cardcolor']=$row['cardcolor'];
        
   
        array_push($output,$temp);
 
    echo json_encode($output,JSON_UNESCAPED_SLASHES);	
}
else{
    echo json_encode($output,JSON_UNESCAPED_SLASHES);	
}

?>