<?php
include 'header.php';
if (!isset($_SESSION['current_user']['user_id'])) {
  header("Location: sign-in.php");
  die();
}
?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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
              <!-- <a href="#" class="btn btn-block btn-light text-uppercase mx-auto w-60" data-plan_type="0">Choose Plan</a> -->
              <button class="btn btn-block btn-light text-uppercase mx-auto w-60 choosePlan save_loader_show" data-plan_type="0">Choose Plan</button>
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
              <!-- <a href="#" class="btn btn-block btn-light text-uppercase mx-auto w-60 choosePlan save_loader_show" data-amount="199" data-plan_type="1" data-bs-toggle="modal" data-bs-target="#planPay">Choose Plan</a> -->
              <button class="btn btn-block btn-light text-uppercase mx-auto w-60 choosePlan save_loader_show" data-amount="199" data-plan_type="1" data-bs-toggle="modal" data-bs-target="#planPay">Choose Plan</button>
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
              <!-- <a href="#" class="btn btn-block btn-light text-uppercase mx-auto w-60 choosePlan save_loader_show"  data-amount="499" data-plan_type="2"  data-bs-toggle="modal" data-bs-target="#planPay">Choose Plan</a> -->
              <button class="btn btn-block btn-light text-uppercase mx-auto w-60 choosePlan save_loader_show"  data-amount="499" data-plan_type="2"  data-bs-toggle="modal" data-bs-target="#planPay">Choose Plan</button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="modal fade" id="planPay" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="profileImageUpdate" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="profileUpdate">Payment Now</h1>
                      <button type="button" class="btn-close text-danger fs-2 mb-3" data-bs-dismiss="modal" aria-label="Close">
                          <i class="fa-solid fa-xmark"></i>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form role="form" id="getPayment" enctype="multipart/form-data" method="POST">
                        <input type="hidden" class="amount" value="" name="amount"/>
                        <input type="hidden" class="plan_type" value="" name="plan_type" />
                          <div class="mb-3 ">
                            <label>Name</label>
                            <input type="text" class="form-control validtext" name="billing_name" placeholder="Enter Name" />
                            <span class="errormsg name"></span>
                          </div>
                          <div class="mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="billing_email" placeholder="Enter email" id="email">
                            <span class="errormsg email"></span>
                          </div>
                          <div class="mb-3">
                            <label>Mobile Number</label>
                            <input type="number" class="form-control price" name="billing_mobile" placeholder="Enter Mobile Number" max-value="10">
                            <span class="errormsg phone_number"></span>
                          </div>
                          <div class="text-center">
                            <button type="button" class="btn bg-gradient-info w-100 mt-0 mb-0 save_loader_show getPayment">Pay Now</button>
                          </div>
                          
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

</body>
</html>
<script type="text/javascript">
  getPaymentPlan();
</script>