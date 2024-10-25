<?php

class Cart
{

    private $conn;
    private $cart = "cart";
    private $wall_upload_history = "wall_upload_history";
    // private $table_payment = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id, $userId,$productId,$quantity,$total,$size,$color,$createdOn,$updatedOn,$createdBy,$updatedBy; 
    public $cuId, $cuName,$cuEmail, $cuAddress, $cuMobile, $requiredService;
   
   
    public function readCart()
    {
        echo $query = "Select userId,total,quantity,size,color from " . $this->cart . " Where userId=:userId";
         $stmt = $this->conn->prepare($query);
         $this->userId = htmlspecialchars(strip_tags($this->userId));
         $stmt->bindParam(":userId", $this->userId); 
            $stmt->execute();
            return $stmt;
    }


    public function insertCart()
    {
        $query = "INSERT INTO
        " . $this->cart. "
    SET      userId=:userId,
            quantity=:quantity,
            color=:color,
            size=:size,
             total=:total";
           //  postingDate=:postingDate";          

        $stmt = $this->conn->prepare($query);
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->total = htmlspecialchars(strip_tags($this->total));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->size = htmlspecialchars(strip_tags($this->size));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":total", $this->total);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":size", $this->size);
        $stmt->bindParam(":quantity", $this->quantity);
        //$stmt->bindParam(":postingDate", $this->postingDate);
        
       
        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function deleteCart(){
  
        // delete user detatail
        $query = " DELETE FROM " . $this->cart. " 
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
        $this->userId=htmlspecialchars(strip_tags($this->userId));
      
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
    function updateCart()
    {

        // query to update record
        $query = "UPDATE 
         " . $this->cart . "
     SET
        
        total=:total,
        quantity=:quantity,
        color=:color,
        size=:size
        where userId=:userId";

 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        
        $this->userId = htmlspecialchars(strip_tags($this->userId));
        $this->total = htmlspecialchars(strip_tags($this->total));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->size = htmlspecialchars(strip_tags($this->size));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));

       // $this->postingDate = htmlspecialchars(strip_tags($this->postingDate));
        
        //bind values with stmt
        $stmt->bindParam(":userId", $this->userId);
        $stmt->bindParam(":total", $this->total);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":size", $this->size);
        $stmt->bindParam(":color", $this->color);
       // $stmt->bindParam(":postinDate", $this->postingDate);
        
        
        // execute query
        if ($stmt->execute()){
            return true;
        }

        return false;
    }

    function countCart()
    {

        // query to update record
        $query = "SELECT COUNT(*) FROM  
         " . $this->cart;

 
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