<?php

class Subcategories
{

    private $conn;
    private $seller = "seller";
    private $delivery_boy = "delivery_boy";
    private $category = "category";
    private $customer_inquiry = "customer_inquiry";
    private $users = "users";
    private $user_type = "user_type";
    private $cart = "cart";
    private $subcategories = "subcategories";

    private $wall_upload_history = "wall_upload_history";
    // private $table_payment = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id, $userId, $userType,$parentId, $subcategoriesImage,$city, $state, $name, $email,$email_id, $contactno, $password, $regDate, $sellar_name,
    $sellar_id,$father,$address, $counter_name, $mobile_no,$payment_status,$pincode,$created_on, $created_by, $emp_id, $alterMobile, $businessDay, $userWebsite,$description, $businessName, $establishmentYear, $paymentMode, $businessTiming, $userServices, $aboutUser, $status, $remark, $createdOn, $createdBy,$wallImg,$productId,$quantiy,$postingDate, $updatedOn, $updatedBy,$categoryName,$categoryImage,$creationDate,$updationDate,$quantity,$categoryid,$subcategoriesName,$orderId;

    public $cuId, $cuName,$cuEmail, $cuAddress, $cuMobile, $requiredService;
   
   
    public function readSubcatogory()
    {
        $query = "Select parentId,name,description,subcategoriesImage,createdOn,createdBy from " . $this->subcategories . " where parentId=:parentId";
         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(":parentId", $this->categoryid); 
        $stmt->execute();
        return $stmt;
    }

    public function readSubcatogoryAll()
    {
        $query = "Select parentId,name,description,subcategoriesImage,id,parentId,createdOn,updatedOn from " . $this->subcategories;
         $stmt = $this->conn->prepare($query);
        // $stmt->bindParam(":parentId", $this->categoryid); 
        $stmt->execute();
        return $stmt;
    }



    public function readSubcatogoryById()
    {
        $query = "Select parentId,name,description,subcategoriesImage,id,parentId,createdOn,updatedOn from " . $this->subcategories . " where id=:id";
         $stmt = $this->conn->prepare($query);
         $stmt->bindParam(":id", $this->id); 
        $stmt->execute();
        return $stmt;
    }


    public function insertSubcatogory()
    {
         $query = "INSERT INTO
        " . $this->subcategories. "
    SET      parentId=:parentId,
             name=:name,
             subcategoriesImage=:subcategoriesImage,
             description=:description,
             createdOn=:createdOn,
             updatedOn=:updatedOn";           ;

        $stmt = $this->conn->prepare($query);
        $this->parentId = htmlspecialchars(strip_tags($this->parentId));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->subcategoriesImage = htmlspecialchars(strip_tags($this->subcategoriesImage));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->updatedOn = htmlspecialchars(strip_tags($this->updatedOn));
        $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));
       
        
        $stmt->bindParam(":parentId", $this->parentId);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":subcategoriesImage", $this->subcategoriesImage);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":updatedOn", $this->updatedOn);
        
       
        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function deleteSubcatogory(){
  
        // delete user detatail
        $query = " DELETE FROM " . $this->subcategories. " 
        WHERE parentId=:parentId";
    
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
        $this->parentId=htmlspecialchars(strip_tags($this->parentId));
      
        // bind id of record to delete
        $stmt->bindParam(":parentId", $this->parentId);
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
    function updateSubcatogory()
    {

        // query to update record
        $query = "UPDATE
         " . $this->subcategories . "
     SET
        name=:name,
        updatedOn=:updatedOn
        where id=:id";
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->updatedOn = htmlspecialchars(strip_tags($this->updatedOn));
       // $this->categoryid = htmlspecialchars(strip_tags($this->categoryid));
       
        //bind values with stmt
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":updatedOn", $this->updatedOn);
         
        // execute query
        $stmt->execute();
        return $stmt;
        }


        public function readMaxIdmaxsubcategory()
        {
             $query ="Select max(id) as id from " . $this->subcategories;
             
            
             $stmt = $this->conn->prepare($query);
            //  $this->id = htmlspecialchars(strip_tags($this->id));
            //  $stmt->bindParam(":id", $this->id);
             $stmt->execute();
                return $stmt;
            
        }
         

    function countSubcatogory()
    {

        // query to update record
        $query = "SELECT COUNT(*) FROM  
         " . $this->subcategoriesName;

 
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