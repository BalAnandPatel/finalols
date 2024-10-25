<?php

class Category
{

    private $conn;
    private $categories = "categories";
    private $subcategories = "subcategories";
    private $products = "products";
    // private $table_payment = "payment";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public $id,$name,$description,$createdOn,$updatedOn,$categoriesImage,$commision,$status,$createdBy;

    public $cuId, $cuName,$cuEmail, $cuAddress, $cuMobile, $requiredService;
   
   
    public function readCategoriesById()
    {
        $query = "Select  * from " . $this->products . " left JOIN " .$this->categories. " ON $this->products.categories=$this->categories.categoriesId where $this->categories.categoriesName=:id";
         
        
         $stmt = $this->conn->prepare($query);
         $this->id = htmlspecialchars(strip_tags($this->id));
         $stmt->bindParam(":id", $this->id);
         $stmt->execute();
            return $stmt;
        
    }


    public function readcategories()
    {
         $query ="Select id,name,categoriesImage,commision,description,status,createdOn,updatedOn,createdBy from " . $this->categories;
         
        
         $stmt = $this->conn->prepare($query);
        //  $this->id = htmlspecialchars(strip_tags($this->id));
        //  $stmt->bindParam(":id", $this->id);
         $stmt->execute();
            return $stmt;
        
    }



    //read Only Category by id


    public function readCategorybyId()
    {
         $query ="Select id,name,categoriesImage,description,status,createdOn,commision,createdBy from " . $this->categories . " where id=:id";
         
        
         $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);
         $stmt->execute();
            return $stmt;
        
    }


    public function readMaxId()
    {
         $query ="Select max(id) as id from " . $this->categories;
         
        
         $stmt = $this->conn->prepare($query);
        //  $this->id = htmlspecialchars(strip_tags($this->id));
        //  $stmt->bindParam(":id", $this->id);
         $stmt->execute();
            return $stmt;
        
    }




    public function insertcategories()
    {
         $query = "INSERT INTO
        " . $this->categories. "
    SET      name=:name,
             categoriesImage=:categoriesImage,
             commision=:commision,
             description=:description,
             status=:status,
             createdOn=:createdOn,
             updatedOn=:updatedOn,
             createdBy=:createdBy";           ;

        $stmt = $this->conn->prepare($query);
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->categoriesImage = htmlspecialchars(strip_tags($this->categoriesImage));
        $this->createdOn = htmlspecialchars(strip_tags($this->createdOn));
        $this->updatedOn = htmlspecialchars(strip_tags($this->updatedOn));
        $this->createdBy = htmlspecialchars(strip_tags($this->createdBy));
        $this->commision = htmlspecialchars(strip_tags($this->commision));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->status = htmlspecialchars(strip_tags($this->status));
       
        
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":categoriesImage", $this->categoriesImage);
        $stmt->bindParam(":commision", $this->commision);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":createdOn", $this->createdOn);
        $stmt->bindParam(":updatedOn", $this->updatedOn);
        $stmt->bindParam(":createdBy", $this->createdBy);
        
        
       
        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    function deleteCategory(){
  
        // delete user detatail
        $query = " DELETE FROM " . $this->categories. " 
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
    function updateCategory()
    {

        // query to update record
       $query = "UPDATE 
         " . $this->categories . "
     SET
        name=:name,
        commision=:commision,
        updatedOn=:updatedOn
        where id=:id";

 
        // prepare query
        $stmt = $this->conn->prepare($query);
 
        
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->updatedOn = htmlspecialchars(strip_tags($this->updatedOn));
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->commision = htmlspecialchars(strip_tags($this->commision));
        


        //bind values with stmt
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":updatedOn", $this->updatedOn);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":commision", $this->commision);
        
        
        // execute query
        if ($stmt->execute()){
            return true;
        }

        return false;
    }

    function countcategories()
    {

        // query to update record
        $query = "SELECT COUNT(*) FROM  
         " . $this->categories;

 
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