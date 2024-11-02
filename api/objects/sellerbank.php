<?php

class Sellerbank
{

    private $conn;
    private $sellarbankdetails = "sellarbankdetails";
    // private $table_payment = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id,$sellarId,$bankName,$AccountHolderName,$ifscCode,$upiId,$accountNo,$createdBy,$createdOn,$updatedBy,$updatedOn;

    public $cuId, $cuName,$cuEmail, $cuAddress, $cuMobile, $requiredService;
   
   
    public function readSellarBank()
    {
        $query = "Select sellarName,counterName,address,city,pincode,phoneNo,email from " . $this->sellarbankdetails;
         $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(":userName", $this->userName); 
        $stmt->execute();
        return $stmt;
    }


    public function insertSellarBank()
    {
         echo $query = "INSERT INTO
        " . $this->sellarbankdetails. "
    SET      sellarId=:sellarId,
             createdOn=:createdOn,
             createdBy=:createdBy";           ;

        $stmt = $this->conn->prepare($query);
        $this->sellarId = htmlspecialchars(strip_tags($this->sellarId));
        $this->createdBy = htmlspecialchars(strip_tags($this->createdBy));
        $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));
        
        $stmt->bindParam(":sellarId", $this->sellarId);
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
        $query = " DELETE FROM " . $this->sellarbankdetails . " 
        WHERE sellarId=:sellarId";
    
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
        $this->sellarId=htmlspecialchars(strip_tags($this->sellarId));
      
        // bind id of record to delete
        $stmt->bindParam(":sellarId", $this->sellarId);
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
    function updateSellarbank()
    {

        // query to update record
        $query = "UPDATE 
         " . $this->sellarbankdetails . "
     SET
        bankName=:bankName,
        accountNo=:accountNo,
        ifscCode=:ifscCode,
        upiId=:upiId,
        updatedOn=:updatedOn,
        updatedBy=:updatedBy
        where sellarId=:id";

 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        
        $this->bankName = htmlspecialchars(strip_tags($this->bankName));
        $this->ifscCode = htmlspecialchars(strip_tags($this->ifscCode));
        $this->upiId = htmlspecialchars(strip_tags($this->upiId));

        //bind values with stmt
        $stmt->bindParam(":bankName", $this->bankName);
        $stmt->bindParam(":accountNo", $this->accountNo);
        $stmt->bindParam(":ifscCode", $this->ifscCode);
        $stmt->bindParam(":updatedOn", $this->updatedOn);
        $stmt->bindParam(":updatedBy", $this->updatedBy);
        $stmt->bindParam(":upiId", $this->upiId);
        $stmt->bindParam(":id", $this->id);
        
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
         " . $this->sellarbankdetails;

 
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