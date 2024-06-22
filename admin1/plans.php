<?php
include 'header.php';
?>

<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.php';
  ?>
  <?php
  include 'adminheader.php'; 
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4">
        <span class="mask bg-gradient-info opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n5 p-4 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
                Plans
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <section class="pricing py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 plan-card">
            <div class="card">
              <div class="card-body">
                <ul class="fa-ul">
                  <li class="card-title text-uppercase">Starter</li>
                  <li class="card-price text-center">Free</li>
                </ul>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"></span>Business Registration</li>
                  <li><span class="fa-li"></span>Basic Listing</li>
                  <li><span class="fa-li"></span>Access to Community Forums</li>
                  <li><span class="fa-li"></span>Limited Product Listings</li>
                  <li><span class="fa-li"></span>Standard Support</li>
                  <li><span class="fa-li"></span>Self-Managed Product Catalog</li>
                  <li><span class="fa-li"></span>Shop Front View</li>
                </ul> 
              </div>
              <a href="#" class="btn btn-block btn-light text-uppercase">Choose Plan</a>
            </div>
          </div>
          <div class="col-lg-4  plan-card">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <ul class="fa-ul">
                  <li class="card-title text-uppercase">Pro</li>
                  <li class="card-price text-center">199<span class="period">Rs / month</span></li>
                </ul>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"></span><strong>Enhanced Listing</strong></li>
                  <li><span class="fa-li"></span>Increased Product Listings</li>
                  <li><span class="fa-li"></span>Priority Placement</li>
                  <li><span class="fa-li"></span>Access to Analytics</li>
                  <li><span class="fa-li"></span>Direct Messaging</li>
                  <li><span class="fa-li"></span>Premium Support</li>
                  <li><span class="fa-li"></span>Discounted Advertising</li>
                  <li><span class="fa-li"></span>Self-Managed Product Catalog</li>
                  <li><span class="fa-li"></span>Shop Front View on the Home Page</li>
                  <li><span class="fa-li"></span>Banner Design Services</li>
                  <li><span class="fa-li"></span>Exclusive Offers</li>
                </ul>
              </div>
              <a href="#" class="btn btn-block btn-light text-uppercase">Choose Plan</a>
            </div>
          </div>
          <div class="col-lg-4  plan-card">
            <div class="card">
              <div class="card-body">
                <ul class="fa-ul">
                  <li class="card-title text-uppercase">Business</li>
                  <li class="card-price text-center">499<span class="period">Rs / month</span></li>
                </ul>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"></span><strong>Premium Listing</strong></li>
                  <li><span class="fa-li"></span>Unlimited Product Listings</li>
                  <li><span class="fa-li"></span>Advanced Analytics</li>
                  <li><span class="fa-li"></span>Featured in Newsletters</li>
                  <li><span class="fa-li"></span>Priority Customer Support</li>
                  <li><span class="fa-li"></span>Exclusive Access</li>
                  <li><span class="fa-li"></span>Custom Advertising Packages</li>
                  <li><span class="fa-li"></span>Self-Managed Product Catalog</li>
                  <li><span class="fa-li"></span>Shop Front View on the Home Page</li>
                  <li><span class="fa-li"></span>Professional Banner Design Services</li>
                  <li><span class="fa-li"></span>Exclusive Deals and Offers</li>
                  <li><span class="fa-li"></span>24/7 Support</li>
                  <li><span class="fa-li"></span>Promotional Campaigns</li>
                </ul>
              </div>
              <a href="#" class="btn btn-block btn-light text-uppercase">Choose Plan</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  </div>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="#">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="#">View documentation</a>
        <div class="w-100 text-center">
          <a class="github-button" href="#" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
          <h6 class="mt-3">Thank you for sharing!</h6>
          <a href="#" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="#" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>