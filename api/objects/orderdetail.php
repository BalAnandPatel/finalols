<?php

class Orderdetail
{

    private $conn;
    private $orderdetails = "orderdetails";
    // private $table_payment = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id, $orderId,$userId,$paymentId,$sellarId,$deliveryId,$productId,$adminCommision, $productSkuId, $quantity, $total;
    public $cuId, $cuName,$cuEmail, $cuAddress, $cuMobile,$createdOn,$createdBy,$updatedBy,$updatedOn, $requiredService;
    public function readorderdetails()
    {
        $query = "Select userId,orderId,deliveryId,paymentId,total,adminCommision,createdOn,createdBy from " . $this->orderdetails;
         $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(":userName", $this->userName); 
        $stmt->execute();
        return $stmt;
    }


    public function insertorderdetails()
    {
         $query = "INSERT INTO
        " . $this->orderdetails . "
    SET      orderId=:orderId,
            sellarId=:sellarId,
             deliveryId=:deliveryId,
             paymentId=:paymentId,
             total=:total,
             adminCommision=:adminCommision,
             createdBy=:createdBy,
             createdOn=:createdOn";

        $stmt = $this->conn->prepare($query);
        $this->orderId = htmlspecialchars(strip_tags($this->orderId));
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->sellarId = htmlspecialchars(strip_tags($this->sellarId));
        $this->deliveryId = htmlspecialchars(strip_tags($this->deliveryId));
        $this->paymentId = htmlspecialchars(strip_tags($this->paymentId));
        $this->total = htmlspecialchars(strip_tags($this->total));
        $this->adminCommision = htmlspecialchars(strip_tags($this->adminCommision));
        $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));
        $this->createdBy = htmlspecialchars(strip_tags($this->createdBy));





        
        $stmt->bindParam(":orderId", $this->orderId);
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":sellarId", $this->sellarId);
        $stmt->bindParam(":deliveryId", $this->deliveryId);
        $stmt->bindParam(":paymentId", $this->paymentId);
        $stmt->bindParam(":total", $this->total);
        $stmt->bindParam(":adminCommision", $this->adminCommision);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":createdBy", $this->createdBy);

        
        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function deleteorderdetails(){
  
        // delete user detatail
        $query = " DELETE FROM " . $this->orderdetails . " 
        WHERE orderId=:orderId";
    
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
        $this->orderId=htmlspecialchars(strip_tags($this->orderId));
      
        // bind id of record to delete
        $stmt->bindParam(":orderId", $this->orderId);
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
    function updateorderdetails()
    {

        // query to update record
        $query = "UPDATE 
         " . $this->orderdetails . "
     SET
        orderId=:orderId,
        paymentId=:paymentId,
        sellrId=:sellarId,
        deliveryId=:deliveryId,
        total=:total,
        adminCommision=:adminCommision,
        updatedOn=:updatedOn,
        updatedBy=:updatedBy 
        where  userId=:userId";

 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        $this->orderId = htmlspecialchars(strip_tags($this->orderId));
        $this->paymentId = htmlspecialchars(strip_tags($this->paymentId));
        $this->sellarId = htmlspecialchars(strip_tags($this->sellarId));
        $this->deliveryId = htmlspecialchars(strip_tags($this->deliveryId));
        $this->total = htmlspecialchars(strip_tags($this->total));
        $this->adminCommision = htmlspecialchars(strip_tags($this->adminCommision));
        $this->updatedOn = htmlspecialchars(strip_tags($this->updatedOn));
        $this->updatedBy = htmlspecialchars(strip_tags($this->updatedBy));

        
        //bind values with stmt
        $stmt->bindParam(":orderId", $this->orderId);
        $stmt->bindParam(":paymentId", $this->paymentId);
        $stmt->bindParam(":sellarId", $this->sellarId);
        $stmt->bindParam(":deliveryId", $this->deliveryId);
        $stmt->bindParam(":total", $this->total);
        $stmt->bindParam(":adminCommision", $this->adminCommision);
        $stmt->bindParam(":updatedOn", $this->updatedOn);
        $stmt->bindParam(":updatedBy", $this->updatedBy);
        $stmt->bindParam(":userId", $this->userId);
       
       
        
        // execute query
        $stmt->execute();
            return $stmt;
        }

    function orderCountItem()
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