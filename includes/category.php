<?php
//session_start();
//  echo $jwt=$_SESSION['JWT'];
// $request_headers = [
//   'Authorization:' . $jwt
// ];
include "./constant.php";
$url = $URL . "category/readCategory.php";
//$url="http://localhost/onlinesabjimandiapi/api/src/category/readCategory.php";
$data = array();
// //print_r($data);
$postdata = json_encode($data);
$client = curl_init();
curl_setopt( $client, CURLOPT_URL,$url);
 //curl_setopt( $client, CURLOPT_HTTPHEADER,  $request_headers);
 curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($client, CURLOPT_POST, 5);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
//print_r($response);
$result = json_decode($response);
//print_r($result);
?>
<section class="py-5 overflow-hidden">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="section-header d-flex flex-wrap justify-content-between mb-5">
            <h2 class="section-title">Category</h2>

            <div class="d-flex align-items-center">
              <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
              <div class="swiper-buttons">
                <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col-md-12">

          <div class="category-carousel swiper">
            <div class="swiper-wrapper">
              
            <?php
                // print_r($result);
				$cnt=0;
                // print_r($result['records']);
                for($i=0; $i<sizeof($result->records);$i++)
                { //print_r($result->records[$i]);
                ?>	                  
            <a href="category.html" class="nav-link category-item swiper-slide">
            <img src="admin/img/category/<?php echo $result->records[$i]->id ."/".$result->records[$i]->id.".png";?>" alt="Category Thumbnail" width="150px" height="150px">
                <!-- <img src="images/icon-vegetables-broccoli.png"> -->
                <h3 class="category-title"><?php echo $result->records[$i]->name;?></h3>
              </a>
              <?php }?>
              <!-- <a href="category.html" class="nav-link category-item swiper-slide">
                <img src="images/icon-bread-baguette.png" alt="Category Thumbnail">
                <h3 class="category-title">Breads & Sweets</h3>
              </a>
              <a href="category.html" class="nav-link category-item swiper-slide">
                <img src="images/icon-soft-drinks-bottle.png" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>
              <a href="category.html" class="nav-link category-item swiper-slide">
                <img src="images/icon-wine-glass-bottle.png" alt="Category Thumbnail">
                <h3 class="category-title">Beverages</h3>
              </a>
              <a href="category.html" class="nav-link category-item swiper-slide">
                <img src="images/icon-animal-products-drumsticks.png" alt="Category Thumbnail">
                <h3 class="category-title">Meat Products</h3>
              </a>
              <a href="category.html" class="nav-link category-item swiper-slide">
                <img src="images/icon-bread-herb-flour.png" alt="Category Thumbnail">
                <h3 class="category-title">Breads</h3>
              </a>
              <a href="category.html" class="nav-link category-item swiper-slide">
                <img src="images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>
              <a href="category.html" class="nav-link category-item swiper-slide">
                <img src="images/icon-bread-baguette.png" alt="Category Thumbnail">
                <h3 class="category-title">Breads & Sweets</h3>
              </a> -->
              <!-- <a href="category.html" class="nav-link category-item swiper-slide">
                <img src="images/icon-soft-drinks-bottle.png" alt="Category Thumbnail">
                <h3 class="category-title">Fruits & Veges</h3>
              </a>
              <a href="category.html" class="nav-link category-item swiper-slide">
                <img src="images/icon-wine-glass-bottle.png" alt="Category Thumbnail">
                <h3 class="category-title">Beverages</h3>
              </a>
              <a href="category.html" class="nav-link category-item swiper-slide">
                <img src="images/icon-animal-products-drumsticks.png" alt="Category Thumbnail">
                <h3 class="category-title">Meat Products</h3>
              </a>
              <a href="category.html" class="nav-link category-item swiper-slide">
                <img src="images/icon-bread-herb-flour.png" alt="Category Thumbnail">
                <h3 class="category-title">Breads</h3>
              </a> -->

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
