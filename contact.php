<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'includes/header.php' ?>
</head>

<body>
  <?php include 'includes/svg.php' ?>


<?php include 'includes/preloader.php' ?>

  <?php include 'includes/global-cart.php' ?>

  <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch">
    <div class="offcanvas-header justify-content-center">
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Search</span>
        </h4>
        <form role="search" action="index.php" method="get" class="d-flex mt-3 gap-0">
          <input class="form-control rounded-start rounded-0 bg-light" type="email"
            placeholder="What are you looking for?" aria-label="What are you looking for?">
          <button class="btn btn-dark rounded-end rounded-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>


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
  <section class="contact-us py-5">
    <div class="container-fluid">
      <div class="row">
        <div class="contact-info col-lg-6 pb-3">
          <p>Tortor dignissim convallis aenean et tortor at risus viverra adipiscing.</p>
          <div class="page-content d-flex flex-wrap">
            <div class="col-lg-6 col-sm-12">
              <div class="content-box text-dark pe-4 mb-5">
                <h3 class="card-title">Office</h3>
                <div class="contact-address pt-3">
                  <p>730 Glenstone Ave 65802, Springfield, US</p>
                </div>
                <div class="contact-number">
                  <p>
                    <a href="#">+123 987 321</a>
                  </p>
                  <p>
                    <a href="#">+123 123 654</a>
                  </p>
                </div>
                <div class="email-address">
                  <p>
                    <a href="#">contact@website.com</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-sm-12">
              <div class="content-box">
                <h3 class="card-title">Management</h3>
                <div class="contact-address pt-3">
                  <p>730 Glenstone Ave 65802, Springfield, US</p>
                </div>
                <div class="contact-number">
                  <p>
                    <a href="#">+123 987 321</a>
                  </p>
                  <p>
                    <a href="#">+123 123 654</a>
                  </p>
                </div>
                <div class="email-address">
                  <p>
                    <a href="#">contact@website.com</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="inquiry-item col-lg-6">
          <div class="bg-light p-5 rounded-5">
            <h2 class="display-7 text-dark">Get in Touch</h2>
            <p>Use the form below to get in touch with us.</p>
            <form id="form" class="form-group flex-wrap">
              <div class="form-input col-lg-12 d-flex mb-3">
                <input type="text" name="email" placeholder="Write Your Name Here" class="form-control ps-3 me-3">
                <input type="text" name="email" placeholder="Write Your Email Here" class="form-control ps-3">
              </div>
              <div class="col-lg-12 mb-3">
                <input type="text" name="email" placeholder="Phone Number" class="form-control ps-3">
              </div>
              <div class="col-lg-12 mb-3">
                <input type="text" name="email" placeholder="Write Your Subject Here" class="form-control ps-3">
              </div>
              <div class="col-lg-12 mb-3">
                <textarea placeholder="Write Your Message Here" class="form-control ps-3"
                  style="height:150px;"></textarea>
              </div>
            </form>
            <div class="d-grid">
              <button class="btn btn-primary btn-lg text-uppercase btn-rounded-none">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="google-map">
    <div class="mapouter">
      <div class="gmap_canvas">
        <iframe width="100%" height="500" id="gmap_canvas"
          src="https://maps.google.com/maps?q=mungra%20baadshapur&t=&z=15&ie=UTF8&iwloc=&output=embed"
          frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        <a href="https://getasearch.com/fmovies"></a>
        <br>
        <style>
          .mapouter {
            position: relative;
            text-align: right;
            height: 500px;
            width: 100%;
          }
        </style>
        <a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
        <style>
          .gmap_canvas {
            overflow: hidden;
            background: none !important;
            height: 500px;
            width: 100%;
          }
        </style>
      </div>
    </div>
  </section>


  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/copyright.php'; ?>
</body>

</html>