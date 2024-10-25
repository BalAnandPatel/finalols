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

  <div class="shopify-grid">
    <div class="container-fluid">
      <div class="row g-5">
        <aside class="col-md-2">
          <div class="sidebar">

            <div class="widget-product-categories pt-5">
              <h5 class="widget-title">Categories</h5>
              <ul class="product-categories sidebar-list list-unstyled">
                <li class="cat-item">
                  <a href="/collections/categories">All</a>
                </li>

              </ul>
            </div>

          </div>
        </aside>

        <main class="col-md-10 ">

          <div class="product-grid row ">
            <div class="product-item row">
              <div class="col-sm-3">
                <figure>
                  <a href="products.php" title="Product Title">
                    <img src="images/thumb-orange-juice.png" alt="Product Thumbnail" class="tab-image">
                  </a>
                </figure>
              </div>
              <div class="col-sm-6">
                <h3>Sunstar Fresh Melon Juice</h3>
                <span class="qty">1 Unit</span><span class="rating"><svg width="24" height="24" class="text-primary">
                    <use xlink:href="#star-solid"></use>
                  </svg> 4.5</span>
                <span class="price">$18.00</span>
              </div>
              <div class="col-sm-3">
                <button class="w-100 btn btn-success btn-sm" onclick="window.location.href='cart.php';"
                  type="submit">Add To
                  Cart</button>
                <button class="w-100 btn btn-danger btn-sm" onclick="window.location.href='business/delete.php';"
                  type="submit">Delete</button>
              </div>
            </div>






          </div>
      </div>

    </div>
    <!-- / product-grid -->

    <nav class="text-center py-4" aria-label="Page navigation">
      <ul class="pagination d-flex justify-content-center">
        <li class="page-item disabled">
          <a class="page-link bg-none border-0" href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li class="page-item active" aria-current="page"><a class="page-link border-0" href="#">1</a></li>
        <li class="page-item"><a class="page-link border-0" href="#">2</a></li>
        <li class="page-item"><a class="page-link border-0" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link border-0" href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>

    </main>

  </div>
  </div>
  </div>

  <?php include 'includes/newsletter.php'; ?>
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/copyright.php'; ?>

</html>