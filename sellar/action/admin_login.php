<?php
//session_start();
include '../constant.php';
$password= $_POST["password"]; 
$username= $_POST["username"];
$url = $URL."admin/readAdmin.php";
$data = array( "password" =>$password, "username" =>$username);
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

print_r($result);
//  print_r($result->token);
if(true){

 $_SESSION["JWT"]=$result->token;
 header('Location:../products.php');
} else
{
 header('Location:../account.php?msg='.$result->message);
}

function giplCurl($api,$postdata){
   $url = $api; 
    $client = curl_init($url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
    $response = curl_exec($client);
  //print_r($response);
    return $result = json_decode($response);
}

?>