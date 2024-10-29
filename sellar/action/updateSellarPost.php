<?php
include '../../constant.php';
$id=$_POST["id"];
$sellarName=trim(strtoupper($_POST["sellarName"]));
$phoneNo=strtoupper($_POST["phoneNo"]);
$email=strtoupper($_POST["email"]);
$gst=strtoupper($_POST["gst"]);
$regFee=strtoupper($_POST["regFee"]);
$counterName=strtoupper($_POST["counterName"]);
$aadhar=strtoupper($_POST["aadhar"]);
$pan=strtoupper($_POST["pan"]);
$updatedOn=date('Y-d-m h:i:sa');
$updatedBy= "Admin";
$url = $URL . "sellar/update_sellar.php";

$data = array(

  "sellarName" => $sellarName,
  "id" => $id,
  "counterName" => $counterName,
  "phoneNo" => $phoneNo,
  "gst" => $gst,
  "email" => $email,
  "regFee" => $regFee,
  "aadhar" => $aadhar,
  "pan" => $pan,
  "updatedOn"=>$updatedOn,
  "updatedBy"=>$updatedBy);
   $postdata = json_encode($data);
  print_r($postdata);
  $client = curl_init($url);
  curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
  curl_setopt($client, CURLOPT_CONNECTTIMEOUT, 0); 
  curl_setopt($client, CURLOPT_TIMEOUT, 4); //timeout in seconds
  curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
  $response = curl_exec($client);
  curl_close($client);
  print_r($response);
  $result_registration = (json_decode($response));
 print_r($result_registration);



// Read Max Id From Sellar table for inseting into sellar address
// $urlmax = $URL . "sellar/read_sellarmaxid.php";
//   $maxiddata = array();
//    $postdatamaxid = json_encode($maxiddata);
//    //print_r($postdata);
//    $clientmaxid = curl_init($urlmax);
//    curl_setopt($clientmaxid, CURLOPT_POSTFIELDS, $postdatamaxid);
//    curl_setopt($clientmaxid, CURLOPT_CONNECTTIMEOUT, 0); 
//    curl_setopt($clientmaxid, CURLOPT_TIMEOUT, 4); //timeout in seconds
//    curl_setopt($clientmaxid,CURLOPT_RETURNTRANSFER,true);
//    $responsemaxid = curl_exec($clientmaxid);
//    curl_close($clientmaxid);
//    $result_maxid = (json_decode($responsemaxid));
//    $maxid=$result_maxid->records[0]->id;
   //print_r($responsemaxid);




/// Insert Id in sellar address table data//
  //  $sellaraddressurl = $URL . "sellaraddress/insert_sellarAddress.php";
  //  $datamaxid=array("sellarId"=>$maxid);
  //  $postdatamaxidin = json_encode($datamaxid);
  //  //print_r($postdata);
  //  $clientmaxidin = curl_init($sellaraddressurl);
  //  curl_setopt($clientmaxidin, CURLOPT_POSTFIELDS, $postdatamaxidin);
  //  curl_setopt($clientmaxidin, CURLOPT_CONNECTTIMEOUT, 0); 
  //  curl_setopt($clientmaxidin, CURLOPT_TIMEOUT, 4); //timeout in seconds
  //  curl_setopt($clientmaxidin,CURLOPT_RETURNTRANSFER,true);
  //  $responsemaxidin = curl_exec($clientmaxidin);
  //  curl_close($clientmaxidin);
  //  $result_maxidin = (json_decode($responsemaxidin));




   //Insert Sellar Bank Details

/// Insert Id in sellar address table data//
// $sellarbankurl = $URL . "sellarbank/insert_sellarBank.php";
// $databank=array("sellarId"=>$maxid);
// $postdatabank = json_encode($databank);
// //print_r($postdata);
// $clientbank = curl_init($sellarbankurl);
// curl_setopt($clientbank, CURLOPT_POSTFIELDS, $postdatabank);
// curl_setopt($clientbank, CURLOPT_CONNECTTIMEOUT, 0); 
// curl_setopt($clientbank, CURLOPT_TIMEOUT, 4); //timeout in seconds
// curl_setopt($clientbank,CURLOPT_RETURNTRANSFER,true);
// $responsebank = curl_exec($clientbank);
// curl_close($clientbank);
// $result_maxidin = (json_decode($responsebank ));


   // print_r($result_maxid);
  // $sellaradd = array(

  //   "sellarName" => 12,
  //   "createdOn"=>$createdOn,
  //   "createdBy"=>$createdBy
  // );
  

//print_r($data);
//  $postdata = json_encode($data);
//  $postdatamax = json_encode($maxiddata);
//  //$postdatadd = json_encode($sellaradd);
// //echo $$postdata;
// //print_r($postdata);
// $result_registration=url_encode_Decode($url,$postdata);
// //print_r($$result_registration);
// echo $result_maxid=url_encode_Decode($urlmax,$postdatamax);
//print_r($$result_maxid);

  if($result_registration->message="Successfull"){

  /* --- get maximum userid -----*/

   // $data_maxId=$pan;
    $maxId_postdata = json_encode($pan);
    //$result_max_registration=url_encode_Decode($url_read_maxId,$maxId_postdata);
    //$id=$result_max_registration->records[0]->id;


/*--- update the images in img folder inside user folder ---*/

    $target_dir = "../img/sellar/";
    $path="../img/sellar/".$pan;
    if (!is_dir($path)){
    mkdir($path, 0777, true);
    //echo "directory created";
    }
    else{ 
     // echo "unable to create directory";
    }
   $target_file = $target_dir .$pan."/". $pan.".png";
   $target_file_thumb = $target_dir .$pan."/". $pan."_counter".".png";

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $imageFileTypeThumb = strtolower(pathinfo($target_file_thumb,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
     $check = getimagesize($_FILES["upload"]["tmp_name"]);
     $check_thumb = getimagesize($_FILES["shopupload"]["tmp_name"]);

      if(($check !== false) &&($check_thumb !== false)) {
        
        $uploadOk = 1;
      }
       else {
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["upload"]["size"] > 5000000) {
     
      $uploadOk = 0;
    }
    {
      
      $uploadOk = 1;
    }
    
    // Allow certain file formats
    if(($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif")  && ($imageFileTypeThumb != "jpg" && $imageFileTypeThumb != "png" && $imageFileTypeThumb != "jpeg"
    && $imageFileTypeThumb != "gif")){
    
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    
    } else {

      if ((move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file)) 
      && (move_uploaded_file($_FILES["shopupload"]["tmp_name"], $target_file_thumb))) {
        //echo "The file ". htmlspecialchars( basename( $_FILES["fileUpload"]["name"])). " has been uploaded.";
       // echo "The file ". htmlspecialchars( basename( $_FILES["fileUploadThumb"]["name"])). " has been uploaded.";
        $_SESSION["registration"] = "File uploaded succesfully.";
       //header('Location:../manage-sellar.php');
      }
       else {
        //echo "Sorry, there was an error uploading your file.";
      
      $_SESSION["registration"] = "Sorry, there was an error uploading your file.";
      //header('Location:../insert-sellar.php');
    }
  }   
   
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