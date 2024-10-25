<?php
include '../../constant.php';
$name=trim(strtoupper($_POST["name"]));
$email=strtoupper($_POST["email"]);
$password=strtoupper($_POST["password"]);
$userName=strtoupper($_POST["email"]);
$createdOn=date('Y-m-d h:i:sa');
$createdBy= "Admin";
$url = $URL . "user/insert_user.php";
//$url = $URL . "deliveryBoy/insertDelivery.php";
//$url_read_maxId=$URL . "registration/read_maxId.php";

$data = array(

  "name" => $name,
  "email" => $email,
  "userName" => $userName,
  "password" => $password,
  "createdOn"=>$createdOn,
  "createdBy"=>$createdBy);

 //print_r($data);
 $postdata = json_encode($data);
//echo $url;
//print_r($postdata);
$result_registration=url_encode_Decode($url,$postdata);
//print_r($result_registration);

  if($result_registration->message="Successfull"){

  /* --- get maximum userid -----*/

      $_SESSION["registration"] = "Your are Successfully Registerd.";
        header('Location:../../account.php');
    }
     
   
else{
   //header('Location:../registration.php?msg=Failed');
}
function url_encode_Decode($url,$postdata){
    $client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
return $result = json_decode($response);
}
?>