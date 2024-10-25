<?php

class User
{

    private $conn;
    private $users = "users";
    // private $table_payment = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id, $firstName, $lastName, $userName, $name, $email,$dateOfBirth, $contactno, $password, $phoneNo, $userMobile, $updationDate, $businessCategory, $categoryId, $userAddress, $alterMobile, $businessDay, $userWebsite, $businessName, $establishmentYear, $paymentMode, $businessTiming, $userServices, $aboutUser, $status, $remark, $createdOn, $createdBy,$wallImg, $updatedOn,$updatedBy,$lastLogin;

    public $cuId, $cuName,$cuEmail, $cuAddress, $cuMobile, $requiredService;
    public function readUser()
    {
        $query = "Select name,password,phoneNo,email,dateOfBirth,userName,createdOn,createdBy from " . $this->users . " where email=:email and password=:password";
         $stmt = $this->conn->prepare($query);
         $this->email = htmlspecialchars(strip_tags($this->email));
         $this->password = htmlspecialchars(strip_tags($this->password));
         $stmt->bindParam(":email", $this->email);
         $stmt->bindParam(":password", $this->password); 
        $stmt->execute();
        return $stmt;
    }

    public function readAllUser()
    {
       $query ="Select name,password,phoneNo,email,dateOfBirth,createdOn,createdBy,userName from " . $this->users;
         $stmt = $this->conn->prepare($query);
        // $this->email = htmlspecialchars(strip_tags($this->email));
         //$this->password = htmlspecialchars(strip_tags($this->password));
         //$stmt->bindParam(":email", $this->email);
         //$stmt->bindParam(":password", $this->password); 
        $stmt->execute();
        return $stmt;
    }



    public function insertUser()
    {
         $query = "INSERT INTO
        " . $this->users . "
    SET      name=:name,
             userName=:userName,
             email=:email,
             password=:password, 
             createdOn=:createdOn,
             createdBy=:createdBy";

        $stmt = $this->conn->prepare($query);
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->userName = htmlspecialchars(strip_tags($this->userName));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));
        $this->createdBy = htmlspecialchars(strip_tags($this->createdBy));
       
        
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":userName", $this->userName);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":createdBy", $this->createdBy);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function deleteUser(){
  
        // delete user detatail
        $query = " DELETE FROM " . $this->users . " 
        WHERE email=:email";
    
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
        $this->email=htmlspecialchars(strip_tags($this->email));
      
        // bind id of record to delete
        $stmt->bindParam(":email", $this->email);
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
    function updateUser()
    {

        // query to update record
        $query = "UPDATE 
         " . $this->users . "
     SET
        firstName=:firstName,
        email=:email,
        phoneNo=:phoneNo,
        password=:password
        where email=:email";

 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->firstName = htmlspecialchars(strip_tags($this->firstName));
        $this->phoneNo = htmlspecialchars(strip_tags($this->phoneNo));
        $this->password = htmlspecialchars(strip_tags($this->password));
       // $this->password = htmlspecialchars(strip_tags($this->password));

        //bind values with stmt
        $stmt->bindParam(":firstName", $this->firstName);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":phoneNo", $this->phoneNo);
        $stmt->bindParam(":password", $this->password);
        
        
        // execute query
        if ($stmt->execute()){
            return true;
        }

        return false;
    }

    function countUser()
    {

        // query to update record
        $query = "SELECT COUNT(*) FROM  
         " . $this->users;

 
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