<?php
include '../../constant.php';

/////////////////////

$id= $_POST["id"];
$address= $_POST["address"];
$pincode= $_POST["pincode"];
$city= $_POST["city"];
$updatedBy= "Admin";
$updatedOn= date('Y-m-d h:i:sa');
$url = $URL."sellaraddress/update_sellarAddress.php";
$data = array("id"=>$id,"address"=>$address,"city"=>$city, "pincode"=>$pincode,"updatedOn"=>$updatedOn,"updatedBy"=>$updatedBy);
//print_r($data);
$postdata = json_encode($data);
$client = curl_init($url);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($client, CURLOPT_CONNECTTIMEOUT, 0); 
curl_setopt($client, CURLOPT_TIMEOUT, 4); //timeout in seconds
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
curl_close($client);
print_r($response);

$result = (json_decode($response));

if($result->message="Update successfully"){
    
  
  //header('Location:../sellaraddressadd.php');
 } else
 {
  //echo "Bad";
  //header('Location:../sellaraddressadd.php?msg='.$result->message);
 }


//print_r($result);
//  print_r($result->token);

?>
