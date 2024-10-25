<?php
//session_start();
$jwt=$_SESSION['JWT'];
$request_headers = [
  'Authorization:' . $jwt
];
include "constant.php";
$url = $URL . "cart/readCart.php";
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

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/header.php' ?>
</head>

<body>
  <?php include 'includes/svg.php' ?>


<?php include 'includes/preloader.php' ?>

  <?php include 'includes/global-cart.php' ?>

  <header>
    <div class="container-fluid">
      <?php include 'includes/search.php' ?>

    </div>
    <?php include 'includes/menu.php' ?>
  </header>

  <section class="py-5 mb-5" style="background: url(images/background-pattern.jpg);">
    <div class="container-fluid">
      <?php include 'includes/breadcrumb.php' ?>
    </div>
  </section>

  <section class="py-5">
    <div class="container-fluid">
      <div class="row g-5">
        <div class="col-md-8">

          <div class="table-responsive cart">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="card-title text-uppercase text-muted">Product</th>
                  <th scope="col" class="card-title text-uppercase text-muted">Quantity</th>
                  <th scope="col" class="card-title text-uppercase text-muted">Subtotal</th>
                  <th scope="col" class="card-title text-uppercase text-muted"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td scope="row" class="py-4">
                    <div class="cart-info d-flex flex-wrap align-items-center mb-4">
                      <div class="col-lg-3">
                        <div class="card-image">
                          <img src="images/product-thumb-11.jpg" alt="cloth" class="img-fluid">
                        </div>
                      </div>
                      <div class="col-lg-9">
                        <div class="card-detail ps-3">
                          <h5 class="card-title">
                            <a href="#" class="text-decoration-none">Iphone 13</a>
                          </h5>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td class="py-4">
                    <div class="input-group product-qty w-50">
                      <span class="input-group-btn">
                        <button type="button" class="quantity-left-minus btn btn-light btn-number" data-type="minus">
                          <svg width="16" height="16">
                            <use xlink:href="#minus"></use>
                          </svg>
                        </button>
                      </span>
                      <input type="text" id="quantity" name="quantity" class="form-control input-number text-center"
                        value="1">
                      <span class="input-group-btn">
                        <button type="button" class="quantity-right-plus btn btn-light btn-number" data-type="plus"
                          data-field="">
                          <svg width="16" height="16">
                            <use xlink:href="#plus"></use>
                          </svg>
                        </button>
                      </span>
                    </div>
                  </td>
                  <td class="py-4">
                    <div class="total-price">
                      <span class="money text-dark">$1500.00</span>
                    </div>
                  </td>
                  <td class="py-4">
                    <div class="cart-remove">
                      <a href="#">
                        <svg width="24" height="24">
                          <use xlink:href="#trash"></use>
                        </svg>
                      </a>
                    </div>
                  </td>
                </tr>
               
              </tbody>
            </table>
          </div>

        </div>
        <div class="col-md-4">
          <div class="cart-totals bg-grey py-5">
            <h4 class="text-dark pb-4">Cart Total</h4>
            <div class="total-price pb-5">
              <table cellspacing="0" class="table text-uppercase">
                <tbody>
                  <tr class="subtotal pt-2 pb-2 border-top border-bottom">
                    <th>Subtotal</th>
                    <td data-title="Subtotal">
                      <span class="price-amount amount text-dark ps-5">
                        <bdi>
                          <span class="price-currency-symbol">$</span>2,370.00
                        </bdi>
                      </span>
                    </td>
                  </tr>
                  <tr class="order-total pt-2 pb-2 border-bottom">
                    <th>Total</th>
                    <td data-title="Total">
                      <span class="price-amount amount text-dark ps-5">
                        <bdi>
                          <span class="price-currency-symbol">$</span>2,370.00</bdi>
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="button-wrap row g-2">
              <div class="col-md-6"><button class="btn btn-light py-3 px-4 text-uppercase btn-rounded-none w-100">Update
                shopping  Cart</button></div>
              <div class="col-md-6"><button
                  class="btn btn-dark py-3 px-4 text-uppercase btn-rounded-none w-100" onclick="window.location.href='shop.php';">Continue Shopping</button></div>
              <div class="col-md-12"><button
                  class="btn btn-primary py-3 px-4 text-uppercase btn-rounded-none w-100" onclick="window.location.href='checkout.php';">Proceed to checkout</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <?php include 'includes/newsletter.php'; ?>

  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/copyright.php'; ?>
</body>

</html>