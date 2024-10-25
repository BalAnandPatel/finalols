<?php

class Address
{

    private $conn;
    private $address = "address";
    // private $table_payment = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id,$userId,$title,$addressLine1,$addressLine2,$country,$city,$postalCode,$createdOn,$updatedOn,$landmark,$createdBy,$updatedBy;

    public $cuId, $cuName,$cuEmail, $cuAddress, $cuMobile, $requiredService;
   
   
    public function readAddress()
    {
        $query = "Select userId,title,addressLine1,landmark,AddressLine2,country,city,postalCode from " . $this->address . " WHERE id=:id";
       
        $stmt = $this->conn->prepare($query);
        // $stmt2 = $this->conn->prepare($query2);
        // $stmt3 = $this->conn->prepare($query3);
        // $stmt4 = $this->conn->prepare($query4);
        // $stmt5 = $this->conn->prepare($query5);
      
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
      
        // bind id of record to delete
        
       
         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(":id", $this->id);
        // $stmt->bindParam(":userName", $this->userName); 
        $stmt->execute();
        return $stmt;
    }


    public function insertAddress()
    {
         $query = "INSERT INTO
        " . $this->address. "
    SET      userId=:userId,
             title=:title,    
             addressLine1=:addressLine1,
             addressLine2=:addressLine2,
             country=:country,
             postalCode=:postalCode,
             city=:city";           ;

        $stmt = $this->conn->prepare($query);
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->addressLine1 = htmlspecialchars(strip_tags($this->addressLine1));
        $this->addressLine2 = htmlspecialchars(strip_tags($this->addressLine2));
        $this->postalCode = htmlspecialchars(strip_tags($this->postalCode));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->country = htmlspecialchars(strip_tags($this->country));
        $this->landmark = htmlspecialchars(strip_tags($this->landmark));
        
       
        
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":addressLine1", $this->addressLine1);
        $stmt->bindParam(":addressLine2", $this->addressLine2);
        $stmt->bindParam(":country", $this->country);
        $stmt->bindParam(":postalCode", $this->postalCode);
        $stmt->bindParam(":city", $this->city);
          
       
        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function deleteAddress(){
  
        // delete user detatail
        $query = " DELETE FROM " . $this->address. " 
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
    function updateAddress()
    {

        // query to update record
         $query = "UPDATE 
         " . $this->address . "
     SET
        
        postalCode=:postalCode,
        city=:city,
        addressLine1=:addressLine1
        where id=:id";

 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        
        $this->postalCode = htmlspecialchars(strip_tags($this->postalCode));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->addressLine1 = htmlspecialchars(strip_tags($this->addressLine1));
        
        //bind values with stmt
        $stmt->bindParam(":postalCode", $this->postalCode);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":addressLine1", $this->addressLine1);
        $stmt->bindParam(":id", $this->id);
        
        
        // execute query
        if ($stmt->execute()){
            return true;
        }

        return false;
    }

    function countAddress()
    {

        // query to update record
        $query = "SELECT COUNT(*) FROM  
         " . $this->address;

 
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