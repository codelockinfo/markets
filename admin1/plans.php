<?php
include 'header.php';
if (!isset($_SESSION['current_user']['user_id'])) {
  header("Location: sign-in.php");
  die();
}
?>

<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.php';
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <?php
        $para_array = array("title" => "Plans", "link" => "", "button_text" => "");
        $title = $para_array['title']; 
        $link = $para_array['link'];
        $button_text = $para_array['button_text'];
        include 'adminheadertop.php';
    ?>
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
              <a href="#" class="btn btn-block btn-light text-uppercase mx-auto w-60">Choose Plan</a>
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
              <a href="#" class="btn btn-block btn-light text-uppercase mx-auto w-60">Choose Plan</a>
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
              <a href="#" class="btn btn-block btn-light text-uppercase mx-auto w-60">Choose Plan</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  </div>

</body>
</html>