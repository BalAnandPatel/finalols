<?php
include '../../constant.php';
$skuId=trim(strtoupper($_POST["skuId"]));
$sellarId=trim(strtoupper($_POST["sellarId"]));
$name=strtoupper($_POST["name"]);
$description=strtoupper($_POST["description"]);
$shippingCharge=strtoupper($_POST["shippingCharge"]);
$status=strtoupper($_POST["status"]);;
$price=strtoupper($_POST["price"]);
$quantity=strtoupper($_POST["quantity"]);
$discount=strtoupper($_POST["discount"]);
$categoriesId=strtoupper($_POST["categoriesId"]);
$createdOn= date('Y-m-d h:i:sa');
$createdBy= "Admin";
$url = $URL . "product/insertproduct.php";
$urlhistory = $URL . "productHistory/producthistory.php";
//$url = $URL . "deliveryBoy/insertDelivery.php";
//$url_read_maxId=$URL . "registration/read_maxId.php";
$data = array(

  "sellarId" => $sellarId,
  "skuId" => $skuId,
  "quantity" => $quantity,
  "name" => $name,
  "description" => $description,
  "status" => $status,
  "price" => $price,
  "discount" => $discount,
  "categoriesId" => $categoriesId,
  "createdOn"=>$createdOn,
  "createdBy"=>$createdBy);

//print_r($data);
 $postdata = json_encode($data);
//echo $url;
//print_r($postdata);
$result_registration=url_encode_Decode($url,$postdata);

// insert into product skuId

$skuId=trim(($_POST["skuId"]));
$price=trim(($_POST["price"]));
$productId=$_POST["skuId"]."_P";
$quantity=($_POST["quantity"]);
$color=($_POST["color"]);
$size=$_POST["size"];
$createdOn= date('Y-m-d h:i:sa');
$createdBy= "Admin";
$urlsku = $URL . "productskuid/insertproductskuid.php";
//$urlhistory = $URL . "productHistory/producthistory.php";
//$url = $URL . "deliveryBoy/insertDelivery.php";
//$url_read_maxId=$URL . "registration/read_maxId.php";
$datasku = array(

  "skuId" => $skuId,
  "quantity" => $quantity,
  "color" => $color,
  "productId" => $productId,
  "size" => $size,
  "price" => $price,
  "createdOn"=>$createdOn,
  "createdBy"=>$createdBy);

 //print_r($datasku);
 $postdatasku = json_encode($datasku);
//echo $url;
//print_r($postdata);
$result_registrationsku=url_encode_Decode_sku($urlsku,$postdatasku);
function url_encode_Decode($url,$postdata){
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
print_r($response);
return $result = json_decode($response);
}

//product skuid Insert

function url_encode_Decode_sku($urlsku,$postdatasku){
$clientsku = curl_init($urlsku);
curl_setopt($clientsku, CURLOPT_RETURNTRANSFER, true);
curl_setopt($clientsku, CURLOPT_POSTFIELDS, $postdatasku);
$responsesku = curl_exec($clientsku);
print_r($responsesku);
return $results = json_decode($responsesku);

}


print_r($result_registration);

  if($result_registration->message="Successfull"){

  /* --- get maximum userid -----*/

    $data_maxId=$skuId;
    $maxId_postdata = json_encode($data_maxId);
    // $result_max_registration=url_encode_Decode($url_read_maxId,$maxId_postdata);
    // $id=$result_max_registration->records[0]->id;


/*--- update the images in img folder inside user folder ---*/

    $target_dir = "../productimages";
    $path="../productimages/".$skuId;
    if (!is_dir($path)){
    mkdir($path, 0777, true);
    //echo "directory created";
    }
    else{ 
     // echo "unable to create directory";
    }
   $target_file = $target_dir ."/".$skuId."/". $skuId.".png";
   //$target_file_thumb = $target_dir .$id."/profile/". $id."_thumb".".png";

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //$imageFileTypeThumb = strtolower(pathinfo($target_file_thumb,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
     $check = getimagesize($_FILES["productimage1"]["tmp_name"]);
    // $check_thumb = getimagesize($_FILES["fileUploadThumb"]["tmp_name"]);

      if($check !== false) {
        
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
    if ($_FILES["productimage1"]["size"] > 5000000) {
     
      $uploadOk = 0;
    }
    {
      
      $uploadOk = 1;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"){
    
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    
    } else {

      if(move_uploaded_file($_FILES["productimage1"]["tmp_name"], $target_file)) {
        //echo "The file ". htmlspecialchars( basename( $_FILES["fileUpload"]["name"])). " has been uploaded.";
       // echo "The file ". htmlspecialchars( basename( $_FILES["fileUploadThumb"]["name"])). " has been uploaded.";
        $_SESSION["registration"] = "File uploaded succesfully.";
       //header('Location:../manage-deliveryBoy.php');
      }
       else {
        //echo "Sorry, there was an error uploading your file.";
      
      $_SESSION["registration"] = "Sorry, there was an error uploading your file.";
       // header('Location:../insert-delivery.php');
    }
  }   
   
}
else{
   //header('Location:../registration.php?msg=Failed');
}
?>