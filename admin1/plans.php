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
                <ul class="list-unstyled">
                  <li class="card-title text-uppercase">Starter</li>
                  <li class="card-price">Free</li>
                </ul>
                <hr>
                <ul class="list-unstyled">
                  <li><span class="fa-li"></span>Free Registration</li>
                  <li><span class="fa-li"></span>List your products 100 </li>
                  <li><span class="fa-li"></span>Category creation 10</li>
                  <li><span class="fa-li"></span>Customer Inquiry</li>
                  <li><span class="fa-li"></span>Upload Reels(Videos)</li>
                  <li><span class="fa-li"></span>Write your blog</li>
                </ul> 
              </div>
              <a href="#" class="btn btn-block btn-light text-uppercase mx-auto w-60">Choose Plan</a>
            </div>
          </div>
          <div class="col-lg-4  plan-card">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <ul class="list-unstyled">
                  <li class="card-title text-uppercase">Pro</li>
                  <li class="card-price ">199<span class="period">Rs / month</span></li>
                </ul>
                <hr>
                <ul class="list-unstyled">
                  <li><span class="fa-li"></span><strong>Free Registration</strong></li>
                  <li><span class="fa-li"></span>List your products 300</li>
                  <li><span class="fa-li"></span>Category creation 25</li>
                  <li><span class="fa-li"></span>Customer Inquiry </li>
                  <li><span class="fa-li"></span>Upload Reels(Videos)</li>
                  <li><span class="fa-li"></span>Write your blog</li>
                  <li><span class="fa-li"></span>Top bar offer once in a day</li>
                  <li><span class="fa-li"></span>Market list on home page</li>
                  <li><span class="fa-li"></span>Invoice Generating </li>
                </ul>
              </div>
              <a href="#" class="btn btn-block btn-light text-uppercase mx-auto w-60">Choose Plan</a>
            </div>
          </div>
          <div class="col-lg-4  plan-card">
            <div class="card">
              <div class="card-body">
                <ul class="list-unstyled">
                  <li class="card-title text-uppercase">Business</li>
                  <li class="card-price ">499<span class="period">Rs / month</span></li>
                </ul>
                <hr>
                <ul class="list-unstyled">
                  <li><span class="fa-li"></span><strong>Free Registration</strong></li>
                  <li><span class="fa-li"></span>List your products unlimited</li>
                  <li><span class="fa-li"></span>Category creation 50</li>
                  <li><span class="fa-li"></span>Customer Inquiry</li>
                  <li><span class="fa-li"></span>Upload Reels(Videos)</li>
                  <li><span class="fa-li"></span>Write your blog</li>
                  <li><span class="fa-li"></span>Top bar offer every time</li>
                  <li><span class="fa-li"></span>Banner Image</li>
                  <li><span class="fa-li"></span>One offer banner</li>
                  <li><span class="fa-li"></span>Market list on home page</li>
                  <li><span class="fa-li"></span>Show your Blog on the home page</li>
                  <li><span class="fa-li"></span>Videos on the home page</li>
                  <li><span class="fa-li"></span>Invoice Generating </li>
                  <li><span class="fa-li"></span>Show your products on the home page</li>
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