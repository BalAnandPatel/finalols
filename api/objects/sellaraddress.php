<?php

class Sellaraddress
{

    private $conn;
    private $sellaraddress = "sellaraddress";
    // private $table_payment = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id,$sellarId,$address,$feedback,$teamMembers,$city,$pincode,$customerCareNo,$TeamMembers,$createdBy,$createdOn,$updatedBy,$updatedOn;

    public $cuId, $cuName,$cuEmail, $cuAddress, $cuMobile, $requiredService;
   
   
    public function readSellarAddress()
    {
        $query = "Select sellarId,address,feedback,city,pincode,customerCareNo,pincode,TeamMembers,createdBy,CreatedOn from " . $this->sellaraddress;
         $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(":userName", $this->userName); 
        $stmt->execute();
        return $stmt;
    }


    public function insertSellarAddress()
    {
         $query = "INSERT INTO
        " . $this->sellaraddress. "
    SET      sellarId=:sellarId,
             createdOn=:createdOn,
             createdBy=:createdBy";           ;

        $stmt = $this->conn->prepare($query);
        $this->sellarId = htmlspecialchars(strip_tags($this->sellarId));
                
        $stmt->bindParam(":sellarId", $this->sellarId);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":createdBy", $this->createdBy);
      
        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function deleteSellarAddress(){
  
        // delete user detatail
        $query = " DELETE FROM " . $this->sellaraddress . " 
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
    function updateSellar()
    {

        // query to update record
        $query = "UPDATE 
         " . $this->sellaraddress . "
     SET
        address=:address,
        city=:city,
        pincode=:pincode,
        customerCareNo=:customerCareNo,
        feedback=:feedback,
        teamMembers=:teamMembers,
        where sellarId=:sellarId";

 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        
        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->pincode = htmlspecialchars(strip_tags($this->pincode));
        $this->customerCareNo = htmlspecialchars(strip_tags($this->customerCareNo));
        $this->feedback = htmlspecialchars(strip_tags($this->feedback));
        $this->teamMembers = htmlspecialchars(strip_tags($this->teamMembers));

        //bind values with stmt
        $stmt->bindParam(":address", $this->address);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":pincode", $this->pincode);
        $stmt->bindParam(":customerCareNo", $this->customerCareNo);
        $stmt->bindParam(":feedback", $this->feedback);
        $stmt->bindParam(":teamMembers", $this->teamMembers);
        
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
         " . $this->sellaraddress;

 
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