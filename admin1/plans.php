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
                  <li><span class="fa-li"></span>Free registration</li>
                  <li><span class="fa-li"></span>List up to 100 products</li>
                  <li><span class="fa-li"></span>Create up to 10 categories</li>
                  <li><span class="fa-li"></span>Receive customer inquiries</li>
                  <li><span class="fa-li"></span>Upload reels (videos)</li>
                  <li><span class="fa-li"></span>Write and publish your blog</li>
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
                  <li><span class="fa-li"></span>List up to 300 products</li>
                  <li><span class="fa-li"></span>Create up to 25 categories</li>
                  <li><span class="fa-li"></span>Receive customer inquiries</li>
                  <li><span class="fa-li"></span>Upload reels (videos)</li>
                  <li><span class="fa-li"></span>Write your own blog</li>
                  <li><span class="fa-li"></span>Display a top bar offer once per day</li>
                  <li><span class="fa-li"></span>Feature in the market list on the home page</li>
                  <li><span class="fa-li"></span>Generate invoices</li>
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
                  <li><span class="fa-li"></span>List unlimited products</li>
                  <li><span class="fa-li"></span>Create up to 50 categories</li>
                  <li><span class="fa-li"></span>Receive customer inquiries</li>
                  <li><span class="fa-li"></span>Upload reels (videos)</li>
                  <li><span class="fa-li"></span>Write and publish your blog</li>
                  <li><span class="fa-li"></span>Display a top bar offer anytime</li>
                  <li><span class="fa-li"></span>Feature a banner image</li>
                  <li><span class="fa-li"></span>Showcase one offer banner</li>
                  <li><span class="fa-li"></span>Appear in the market list on the home page</li>
                  <li><span class="fa-li"></span>Feature your blog on the home page</li>
                  <li><span class="fa-li"></span>Showcase videos on the home page</li>
                  <li><span class="fa-li"></span>Generate invoices</li>
                  <li><span class="fa-li"></span>Display your products on the home page</li>
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