<?php
//session_start();
 echo $jwt=$_SESSION['JWT'];
$request_headers = [
  'Authorization:' . $jwt
];
include "constant.php";
$url = $URL . "arrival/read_arrival.php";
//$url="http://localhost/onlinesabjimandiapi/api/src/category/readCategory.php";
$data = array();
// //print_r($data);
$postdata = json_encode($data);
$client = curl_init();
curl_setopt( $client, CURLOPT_URL,$url);
 curl_setopt( $client, CURLOPT_HTTPHEADER,  $request_headers);
 curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($client, CURLOPT_POST, 5);
curl_setopt($client, CURLOPT_POSTFIELDS, $postdata);
$response = curl_exec($client);
print_r($response);
$result = json_decode($response);
//print_r($result);
?>
<section class="py-5 overflow-hidden">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="section-header d-flex flex-wrap flex-wrap justify-content-between mb-5">

            <h2 class="section-title">Newly Arrived Brands</h2>

            <div class="d-flex align-items-center">
              <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
              <div class="swiper-buttons">
                <button class="swiper-prev brand-carousel-prev btn btn-yellow">❮</button>
                <button class="swiper-next brand-carousel-next btn btn-yellow">❯</button>
              </div>
            </div>
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col-md-12">

          <div class="brand-carousel swiper">
            <div class="swiper-wrapper">

              <div class="swiper-slide">
                <div class="card mb-3 p-3 rounded-4 shadow border-0">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="images/product-thumb-11.jpg" class="img-fluid rounded" alt="Card title">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body py-0">
                        <p class="text-muted mb-0">Amber Jar</p>
                        <h5 class="card-title">Honey best nectar you wish to get</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card mb-3 p-3 rounded-4 shadow border-0">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="images/product-thumb-12.jpg" class="img-fluid rounded" alt="Card title">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body py-0">
                        <p class="text-muted mb-0">Amber Jar</p>
                        <h5 class="card-title">Honey best nectar you wish to get</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card mb-3 p-3 rounded-4 shadow border-0">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="images/product-thumb-13.jpg" class="img-fluid rounded" alt="Card title">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body py-0">
                        <p class="text-muted mb-0">Amber Jar</p>
                        <h5 class="card-title">Honey best nectar you wish to get</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card mb-3 p-3 rounded-4 shadow border-0">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="images/product-thumb-14.jpg" class="img-fluid rounded" alt="Card title">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body py-0">
                        <p class="text-muted mb-0">Amber Jar</p>
                        <h5 class="card-title">Honey best nectar you wish to get</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card mb-3 p-3 rounded-4 shadow border-0">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="images/product-thumb-11.jpg" class="img-fluid rounded" alt="Card title">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body py-0">
                        <p class="text-muted mb-0">Amber Jar</p>
                        <h5 class="card-title">Honey best nectar you wish to get</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="card mb-3 p-3 rounded-4 shadow border-0">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="images/product-thumb-12.jpg" class="img-fluid rounded" alt="Card title">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body py-0">
                        <p class="text-muted mb-0">Amber Jar</p>
                        <h5 class="card-title">Honey best nectar you wish to get</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </div>
  </section>