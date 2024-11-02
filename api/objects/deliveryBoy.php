<?php

class DeliveryBoy
{

    private $conn;
    private $deliverybankdetails = "deliverybankdetails";
    private $deliveryincome="deliveryincome";
    private $seller = "seller";
    private $deliveryboy = "deliveryboy";
    private $business_category = "business_category";
    private $customer_inquiry = "customer_inquiry";
    private $users = "users";
    private $user_type = "user_type";
    private $wall_uploads = "wall_uploads";
    private $wall_upload_history = "wall_upload_history";
    // private $table_payment = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id, $userId, $userType, $city, $state, $name, $email,$email_id, $contactno, $password, $regDate, $sellar_name,$sellar_id,$father,$address, $counter_name, $mobile_no,$payment_status,$pincode,$created_on, $created_by, $emp_id, $alterMobile, $businessDay, $userWebsite, $businessName,$image, $establishmentYear, $paymentMode, $businessTiming, $userServices, $aboutUser, $status, $remark, $createdOn,$pan,$aadhar, $createdBy,$wallImg,$workingAddress,$regidenceAddress,$workingPincode,$phoneNo, $updatedOn, $updatedBy;

    public $cuId, $cuName,$cuEmail, $cuAddress, $cuMobile, $requiredService;
   
   
    public function readDeliveryBoy()
    {
     $query = "Select name,phoneNo,email,id,status,regidenceAddress,workingPincode,workingAddress,aadhar,pan,image,createdBy,createdOn from " . $this->deliveryboy;
         
        $stmt = $this->conn->prepare($query);

       // $this->id = htmlspecialchars(strip_tags($this->id));
        //$this->emp_id = htmlspecialchars(strip_tags(string: $this->emp_id));
        //$stmt->bindParam(":id", $this->id); 
        $stmt->execute();
        return $stmt;
                
    }



    // read delivery boy by id

    public function readDeliveryBoyId()
    {
     $query = "Select a.name,a.phoneNo,a.email,a.id,a.status,a.regidenceAddress,a.workingPincode,a.workingAddress,a.aadhar,pan,b.accountNo,b.ifscCode,image,a.createdBy,a.createdOn from " . $this->deliveryboy . " as a INNER JOIN " . $this->deliverybankdetails . " as b ON b.deliveryId=a.id JOIN " . $this->deliveryincome . " as c ON c.deliveryId=a.id where b.deliveryId=:id";
         
        $stmt = $this->conn->prepare($query);

       // $this->id = htmlspecialchars(strip_tags($this->id));
        //$this->emp_id = htmlspecialchars(strip_tags(string: $this->emp_id));
        $stmt->bindParam(":id", $this->id); 
        $stmt->execute();
        return $stmt;
                
    }


    public function readDeliveryBoymaxId()
    {
     $query = "Select max(id) as id from " . $this->deliveryboy;
         
        $stmt = $this->conn->prepare($query);

       // $this->id = htmlspecialchars(strip_tags($this->id));
        //$this->emp_id = htmlspecialchars(strip_tags(string: $this->emp_id));
        //$stmt->bindParam(":id", $this->id); 
        $stmt->execute();
        return $stmt;
                
    }


    public function insertDeliveryBoy()
    {
         $query = "INSERT INTO
        " . $this->deliveryboy. "
    SET      name=:name,
             email=:email,
             phoneNo=:phoneNo,
             workingAddress=:workingAddress, 
             regidenceAddress=:regidenceAddress,
             pan=:pan,
             aadhar=:aadhar,
             image=:image,
             status=:status,
             workingPincode=:workingPincode,
             createdOn=:createdOn,
             createdBy=:createdBy";           ;

        $stmt = $this->conn->prepare($query);
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->phoneNo = htmlspecialchars(strip_tags($this->phoneNo));
        $this->workingAddress = htmlspecialchars(strip_tags($this->workingAddress));
        $this->regidenceAddress = htmlspecialchars(strip_tags($this->regidenceAddress));
        $this->workingPincode = htmlspecialchars(strip_tags($this->workingPincode));
        $this->pan = htmlspecialchars(strip_tags($this->pan));
        $this->aadhar = htmlspecialchars(strip_tags($this->aadhar));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->createdBy = htmlspecialchars(strip_tags($this->createdBy));
        $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));
        
       
        
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phoneNo", $this->phoneNo);
        $stmt->bindParam(":workingAddress", $this->workingAddress);
        $stmt->bindParam(":regidenceAddress", $this->regidenceAddress);
        $stmt->bindParam(":workingPincode", $this->workingPincode);
        $stmt->bindParam(":pan", $this->pan);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":aadhar", $this->aadhar);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":createdBy", $this->createdBy);
        $stmt->bindParam(":createdOn", $this->createdOn);
       
        // execute query
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


        //insert delivery bank details


        public function insertDeliveryBoybank()
    {
         $query = "INSERT INTO
        " . $this->deliverybankdetails. "
    SET      deliveryId=:id,
             createdOn=:createdOn,
             createdBy=:createdBy";           ;

        $stmt = $this->conn->prepare($query);
      
        // $this->id = htmlspecialchars(strip_tags($this->id));
        // $this->createdBy = htmlspecialchars(strip_tags($this->createdBy));
        // $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));
        
       
        
        
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":createdBy", $this->createdBy);
        $stmt->bindParam(":createdOn", $this->createdOn);
       
        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }



    //insert income delivery boy 

    public function insertDeliveryIncome()
    {
         $query = "INSERT INTO
        " . $this->deliveryincome. "
    SET      deliveryId=:id,
             createdOn=:createdOn,
             createdBy=:createdBy";           ;

        $stmt = $this->conn->prepare($query);
      
        // $this->id = htmlspecialchars(strip_tags($this->id));
        // $this->createdBy = htmlspecialchars(strip_tags($this->createdBy));
        // $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));
        
       
        
        
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":createdBy", $this->createdBy);
        $stmt->bindParam(":createdOn", $this->createdOn);
       
        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }





    function deleteDelivery(){
  
        // delete user detatail
        $query1 = " DELETE FROM " . $this->deliveryboy . " 
        WHERE id=:id";
        $query2 = " DELETE FROM " . $this->deliverybankdetails . " 
        WHERE deliveryId=:id";
        $query3 = " DELETE FROM " . $this->deliveryincome . " 
        WHERE deliveryId=:id";
    
        // $query2 = " DELETE FROM " . $this->user_profile . " 
        // WHERE userId=:id";
    
        // $query3 = " DELETE FROM " . $this->user_profile_history . " 
        // WHERE userId=:id";
    
        // $query4 = " DELETE FROM " . $this->wall_uploads . " 
        // WHERE userId=:id";
    
        // $query5 = " DELETE FROM " . $this->wall_upload_history . " 
        // WHERE userId=:id";
      
        // prepare query
         $stmt1 = $this->conn->prepare($query1);
         $stmt2 = $this->conn->prepare($query2);
         $stmt3 = $this->conn->prepare($query3);
        // $stmt2 = $this->conn->prepare($query2);
        // $stmt3 = $this->conn->prepare($query3);
        // $stmt4 = $this->conn->prepare($query4);
        // $stmt5 = $this->conn->prepare($query5);
      
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
      
        // bind id of record to delete
        $stmt1->bindParam(":id", $this->id);
        $stmt2->bindParam(":id", $this->id);
        $stmt3->bindParam(":id", $this->id);
        // $stmt2->bindParam(":id", $this->id);
        // $stmt3->bindParam(":id", $this->id);
        // $stmt4->bindParam(":id", $this->id);
        // $stmt5->bindParam(":id", $this->id);
      
        // execute query
        if ($stmt1->execute() && $stmt2->execute() && $stmt3->execute() ){
            return true;
        }
      
        return false;
    }
    function updateDelivery()
    {

        // query to update record
        $query = "UPDATE 
         " . $this->deliveryboy . "
     SET
        name=:name,
        email=:email,
        workingAddress=:workingAddress,
        workingPincode=:workingPincode,
        updatedOn=:updatedOn,
        updatedBy=:updatedBy,
        where id=:id";

 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
       
        $this->workingAddress = htmlspecialchars(strip_tags($this->workingAddress));
      
        $this->workingPincode = htmlspecialchars(strip_tags($this->workingPincode));
     
 
        $this->updatedOn = htmlspecialchars(strip_tags($this->updatedOn));
        $this->updatedBy = htmlspecialchars(strip_tags($this->updatedBy));
      


        //bind values with stmt
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);

        $stmt->bindParam(":workingAddress", $this->workingAddress);
    
        $stmt->bindParam(":workingPincode", $this->workingPincode);

       
     
        $stmt->bindParam(":updatedOn", $this->updatedOn);
        $stmt->bindParam(":updatedBy", $this->updatedBy);

        
        
        // execute query
        if ($stmt->execute()){
            return true;
        }

        return false;
    }

    function countDeliveryBoy()
    {

        // query to update record
        $query = "SELECT COUNT(*) FROM  
         " . $this->deliveryboy;

 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        // $this->id = htmlspecialchars(strip_tags($this->id));
        // $this->name = htmlspecialchars(strip_tags($this->name));
        // $this->email = htmlspecialchars(strip_tags($this->email));
        // $this->contactno = htmlspecialchars(strip_tags($this->contactno));

        // //bind values with stmt
        // $stmt->bindParam(":id", $this->id);
        // $stmt->bindParam(":name", $this->name);
        // $stmt->bindParam(":email", $this->email);
        // $stmt->bindParam(":contactno", $this->contactno);
        
        
        // execute query
        if ($stmt->execute()){
            return true;
        }

        return false;
    }

  }
?>