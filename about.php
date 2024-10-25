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

  <section class="company-detail py-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut cursus leo vel orci malesuada, id
            sodales em volutpat.</blockquote>
          <p><strong>Vivamus sagittis pulvinar dignissim.</strong> Mauris tempus a lacus eu aliquet. Mauris gravida at
            ectus quis venenatis. Aenean quis feugiat turpis. Etiam lacinia interdum nibh, non convallis magna lementum
            vel. Phasellus varius quam ligula, in lobortis risus porttitor ut. Praesent ipsum elit, lobortis n tincidunt
            Vestibulum ut ros sed enim feugiat lobortis. Suspendisse fermentum nunc in est mattis molestie. Mauris ut
            placerat isus. Aenean mollis neque libero, ut pellentesque arcu dapibus vel.</p>
          <p>Praesent nec nisl euismod, lacinia tellus eget, bibendum ex. Maecenas imperdiet gravida pulvinar. aecenas
            feugiat id tellus sed sodales. Praesent maximus ultricies elit eget accumsan. Proin tortor ante, ltrices a
            aliquet a, facilisis quis sapien. Donec eu turpis at velit scelerisque faucibus id eget dolor. tiam lobortis
            ante ipsum, sed venenatis ligula facilisis quis. Fusce blandit commodo mauris, sed fringilla isi congue et.
            Nunc eu eros ex.</p>
        </div>
      </div>
      <h2>About Sabji Mandi Team</h2>
      <div class="row">
        <div class="col-md-4">
          <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum. Sed ut perspiciatis unde omnis iste.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum. Sed ut perspiciatis unde omnis iste.</p>
        </div>
        <div class="col-md-4">
          <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum. Sed ut perspiciatis unde omnis iste.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum. Sed ut perspiciatis unde omnis iste.</p>
        </div>
        <div class="col-md-4">
          <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum. Sed ut perspiciatis unde omnis iste.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum. Sed ut perspiciatis unde omnis iste.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5 my-5">
    <div class="container-fluid">

      <div class="bg-warning py-5 rounded-5" style="background-image: url('images/bg-pattern-2.png') no-repeat;">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <img src="images/phone.png" alt="phone" class="image-float img-fluid">
            </div>
            <div class="col-md-8">
              <h2 class="my-5">Shop faster with Sabji Mandi App</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sagittis sed ptibus liberolectus nonet
                psryroin. Amet sed lorem posuere sit iaculis amet, ac urna. Adipiscing fames semper erat ac in
                suspendisse iaculis. Amet blandit tortor praesent ante vitae. A, enim pretiummi senectus magna. Sagittis
                sed ptibus liberolectus non et psryroin.</p>
              <div class="d-flex gap-2 flex-wrap">
                <img src="images/app-store.jpg" alt="app-store">
                <img src="images/google-play.jpg" alt="google-play">
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/copyright.php'; ?>
</body>

</html>