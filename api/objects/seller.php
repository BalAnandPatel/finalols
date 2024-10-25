<?php

class Seller
{

    private $conn;
    private $sellar = "sellar";
    private $sellaraddress="sellaraddress";
    // private $table_payment = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id,$sellarName,$counterName,$gst,$updatedBy,$status,$pan,$address,$city,$pincode,$sgst,$cgst,$aadhar,$image,$phonNo,$regFee,$depositAmount,$password,$createdOn,$createdBy,$updatedOn,$phoneNo,$email;

    public $cuId, $cuName,$cuEmail, $cuAddress, $cuMobile, $requiredService;
   
   
    public function readSellar()
    {
        echo $query = "Select sellarName,counterName,pan,gst,aadhar,image,phoneNo,regFee,depositAmount,password,email,status from " . $this->sellar .  " as a INNER JOIN " . $this->sellaraddress . " as b ON sellarId=a.id";
         $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(":userName", $this->userName); 
        $stmt->execute();
        return $stmt;
    }


    public function insertSellar()
    {
         $query = "INSERT INTO
        " . $this->sellar. "
    SET      sellarName=:sellarName,
             counterName=:counterName,
             pan=:pan,
             email=:email,
             aadhar=:aadhar, 
             gst=:gst, 
             status=:status, 
             regFee=:regFee,
             depositAmount=:depositAmount, 
             phoneNo=:phoneNo,
             createdOn=:createdOn,
             createdBy=:createdBy, 
             password=:password";           ;

        $stmt = $this->conn->prepare($query);
        $this->sellarName = htmlspecialchars(strip_tags($this->sellarName));
        $this->gst = htmlspecialchars(strip_tags($this->gst));
        $this->counterName = htmlspecialchars(strip_tags($this->counterName));
        $this->pan = htmlspecialchars(strip_tags($this->pan));
        $this->regFee = htmlspecialchars(strip_tags($this->regFee));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->depositAmount = htmlspecialchars(strip_tags($this->depositAmount));
        $this->phoneNo = htmlspecialchars(strip_tags($this->phoneNo));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->createdBy = htmlspecialchars(strip_tags($this->createdBy));
        $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));
        
        $stmt->bindParam(":sellarName", $this->sellarName);
        $stmt->bindParam(":gst", $this->gst);
        $stmt->bindParam(":counterName", $this->counterName);
        $stmt->bindParam(":pan", $this->pan);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":aadhar", $this->aadhar);
        $stmt->bindParam(":phoneNo", $this->phoneNo);
        $stmt->bindParam(":regFee", $this->regFee);
        $stmt->bindParam(":depositAmount", $this->depositAmount);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":createdBy", $this->createdBy);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function deleteSellar(){
  
        // delete user detatail
        $query = " DELETE FROM " . $this->sellar . " 
        WHERE id=:id";
    
        // $query2 = " DELETE FROM " . $this->user_profile . " 
        // WHERE userId=:id";
    
        // $query3 = " DELETE FROM " . $this->user_profile_history . " 
        // WHERE userId=:id";
    
        // $query4 = " DELETE FROM " . $this->wall_uploads . " 
        // WHERE userId=:id";
    
        // $query5 = " DELETE FROM " . $this->wall_upload_history . " 
        // WHERE userId=:id";
      
        // prepare query
        $stmt = $this->conn->prepare($query);
        // $stmt2 = $this->conn->prepare($query2);
        // $stmt3 = $this->conn->prepare($query3);
        // $stmt4 = $this->conn->prepare($query4);
        // $stmt5 = $this->conn->prepare($query5);
      
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
      
        // bind id of record to delete
        $stmt->bindParam(":id", $this->id);
        // $stmt2->bindParam(":id", $this->id);
        // $stmt3->bindParam(":id", $this->id);
        // $stmt4->bindParam(":id", $this->id);
        // $stmt5->bindParam(":id", $this->id);
      
        // execute query
        if ($stmt->execute()){
            return true;
        }
      
        return false;
    }
    function updateSellar()
    {

        // query to update record
        $query = "UPDATE 
         " . $this->sellar . "
     SET
        sellarName=:sellarName,
        counterName=:counterName,
        pan=:pan,
        aadhar=:aadhar,
        image=:image,
        phoneNo=:phonNo,
        regFee=:regfee,
        depositAmount=:depositAmount,
        password=:password,
        email=:email,
        status=:status,
        updatedOn=:updatedOn,
        updatedBy=:updatedBy
        where sellar_id=:sellar_id";

 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        
        $this->counterName = htmlspecialchars(strip_tags($this->counterName));
        $this->sellarName = htmlspecialchars(strip_tags($this->sellarName));
        $this->phoneNo = htmlspecialchars(strip_tags($this->phoneNo));
        $this->pan = htmlspecialchars(strip_tags($this->pan));
        $this->aadhar = htmlspecialchars(strip_tags($this->aadhar));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->regFee = htmlspecialchars(strip_tags($this->regFee));
        $this->depositAmount = htmlspecialchars(strip_tags($this->depositAmount));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->status = htmlspecialchars(strip_tags($this->status));
        $this->updatedOn = htmlspecialchars(strip_tags($this->updatedOn));
        $this->updatedBy = htmlspecialchars(strip_tags($this->updatedBy));


        //bind values with stmt
        $stmt->bindParam(":counterName", $this->counterName);
        $stmt->bindParam(":sellarName", $this->sellarName);
        $stmt->bindParam(":phoneNo", $this->phoneNo);
        $stmt->bindParam(":pan", $this->pan);
        $stmt->bindParam(":aadhar", $this->aadhar);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":regFee", $this->regFee);
        $stmt->bindParam(":depositAmount", $this->depositAmount);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":edmail", $this->email);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":updatedBy", $this->updatedBy);
        $stmt->bindParam(":updatedOn", $this->updatedOn);

        
        // execute query
        if ($stmt->execute()){
            return true;
        }

        return false;
    }

    function countSellar()
    {

        // query to update record
        $query = "SELECT COUNT(*) FROM  
         " . $this->sellar;

 
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