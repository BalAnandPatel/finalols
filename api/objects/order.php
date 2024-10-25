<?php

class Order
{

    private $conn;
    private $orderdetails = "orderdetails";
    // private $table_payment = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id, $userId, $sellarId, $deliveryBoyId, $paymentId, $total;
    public $cuId, $cuName,$cuEmail, $cuAddress, $cuMobile, $requiredService;
    public function readOrder()
    {
        $query = "Select userId,sellarId,deliveryBoyId,paymentId from " . $this->orderdetails;
         $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(":userName", $this->userName); 
        $stmt->execute();
        return $stmt;
    }


    public function insertOrder()
    {
         $query = "INSERT INTO
        " . $this->orderdetails . "
    SET      userId=:userId,
             sellartId=:sellarId,
             paymentId=:paymentId,
             deliveryBoyId=:deliveryBoyId";

        $stmt = $this->conn->prepare($query);
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->sellarId = htmlspecialchars(strip_tags($this->sellarId));
        $this->paymentId = htmlspecialchars(strip_tags($this->paymentId));
        $this->deliveryBoyId = htmlspecialchars(strip_tags($this->deliveryBoyId));


        
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":sellarId", $this->sellarId);
        $stmt->bindParam(":paymentId", $this->paymentId);
        $stmt->bindParam(":deliveryBoyId", $this->deliveryBoyId);
        
        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function deleteOrder(){
  
        // delete user detatail
        $query = " DELETE FROM " . $this->orderdetails . " 
        WHERE userId=:userId";
    
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
        $stmt->bindParam(":userId", $this->userId);
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
    function updateOrder()
    {

        // query to update record
        $query = "UPDATE 
         " . $this->orderdetails . "
     SET
        userId=:userId,
        paymentId=:paymentId,
        sellarId=:sellarId,
        deliveryBoyId=:deliveryBoyId";

 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->paymentId = htmlspecialchars(strip_tags($this->paymentId));
        $this->sellarId = htmlspecialchars(strip_tags($this->sellarId));
        $this->deliveryBoyId = htmlspecialchars(strip_tags($this->deliveryBoyId));

        //bind values with stmt
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":paymentId", $this->paymentId);
        $stmt->bindParam(":sellarId", $this->sellarId);
        $stmt->bindParam(":deliveryBoyId", $this->deliveryBoyId);
       
        
        // execute query
        $stmt->execute();
            return $stmt;
        }

    function orderCount()
    {

        // query to update record
        $query = "SELECT COUNT(*) FROM  
         " . $this->orderdetails;

 
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