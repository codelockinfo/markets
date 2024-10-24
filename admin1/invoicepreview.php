<?php
include 'header.php';
?>

<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.php';
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <?php
        $para_array = array("title" => "Invoice", "link" => "", "button_text" => "");
        $title = $para_array['title']; 
        $link = $para_array['link'];
        $button_text = $para_array['button_text'];
        include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-2">
      <div class="col-xl-6 mx-auto">
        <div class="card z-index-0 p-4 product-main">
          <form action="">
            <div class="col w-100">
              <div class="row mb-3">
                <div class="col">
                  <img src="<?php echo main_url('/admin1/assets/img/market.png'); ?>" alt="market" class="max-width-100 mt-n4">
                </div>
                <div class="col">
                  <h1 class="text-normal fs-2 text-end">INVOICE</h1>
                  <p class="text-normal text-end"># 101</p>
                </div>
              </div>
            </div>
            <div class="col w-100">
              <div class="row mb-3">
                <div class="row">
                  <div class="col w-50 mb-3">
                    <span class="text-normal fs-3"><strong>Market Search</strong></span>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-xl-6">
                    <span class="text-normal"><strong>Bill To :</strong></span>
                    <address>2020, Silver Business Hub, VIP Circle, Uttran, Mota-Vatachha, Suart -394105</address>
                  </div>
                  <div class="col-xl-6">
                    <span class="text-normal"><strong>Ship To :</strong></span>
                    <address>2020, Silver Business Hub, VIP Circle, Uttran, Mota-Vatachha, Suart -394105</address>
                  </div>
                </div>
              </div>
            </div>
            <div class="col w-100">
              <div class="row mb-3 text-start">
                <div class="row">
                  <div class="col">
                    <span class="text-normal"><strong>Date :</strong></span>
                    <span class="text-normal">June 25, 2024</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Payment Terms :</strong></span>
                    <span class="text-normal">UPI / CRADIT CARD / DEBIT CAED</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Due Date :</strong></span>
                    <span class="text-normal">June 30, 2024</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>PO Number :</strong></span>
                    <span class="text-normal">394101</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row table-scroll">
              <table class="mt-4">
                <tr class="border-redius">
                  <th class="w-50 bg-gradient-info text-light ps-3 text-bold">item</th>
                  <th class="w-16 bg-gradient-info text-light ps-3 text-bold">Quantity</th>
                  <th class="w-17 bg-gradient-info text-light ps-3 text-bold">Rate</th>
                  <th class="w-17 bg-gradient-info text-light ps-3 text-bold">Amount</th>
                </tr>
                <tr>
                  <td class="text-normal">Footwear</td>
                  <td class="text-center">02</td>
                  <td class="text-center">₹ 1150.00</td>
                  <td class="text-center">₹ 2300.00</td>
                  <td></td>
                </tr>
                <tr>
                  <td class="text-normal">Dress</td>
                  <td class="text-center">03</td>
                  <td class="text-center">₹ 650.00</td>
                  <td class="text-center">₹ 1950.00</td>
                  <td></td>
                </tr>
                <tr>
                  <td class="text-normal">Tops</td>
                  <td class="text-center">02</td>
                  <td class="text-center">₹ 750.00</td>
                  <td class="text-center">₹ 1500.00</td>
                  <td></td>
                </tr>
              </table>
            </div>
            <div class="col w-100 mt-5">
              <div class="row mb-3 text-end">
                <div class="row">
                  <div class="col">
                    <span class="text-normal"><strong>Subtotal :</strong></span>
                    <span class="text-normal">₹ 5750.00</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Tax (05%) :</strong></span>
                    <span class="text-normal">₹ 6037.05</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Discount (10%) :</strong></span>
                    <span class="text-normal">₹ 5433.75</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Shipping :</strong></span>
                    <span class="text-normal">Free Shipping</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Total :</strong></span>
                    <span class="text-normal">₹ 5433.75</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Amount Paid :</strong></span>
                    <span class="text-normal">₹ 5433.75</span>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col">
                    <span class="text-normal"><strong>Balance Due :</strong></span>
                    <span class="text-normal">₹ 0.00</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row w-100 mt-4">
              <div class="col w-50">
                <div class="row">
                  <span class="text-normal ps-4 fs-5"><strong>Notes :</strong></span>
                  <span class="text-normal ps-4">Thank You for Shopping !</span>
                </div>
                <div class="row mt-2">
                  <span class="text-normal ps-4 fs-5"><strong>Terms :</strong></span>
                  <span class="text-normal ps-4">Payment Method : UPI / CRADIT CAED / DEBIT CARD</span>
                  <span class="text-normal ps-4">Delivery Schedule : </span>
                </div>
              </div>
            </div>
          </form>
          <div class="text-end mt-5">
            <button class="btn bg-gradient-info">Print</button>
          </div>
        </div>
      </div>
    </div>
    <div class="fixed-plugin">
      <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" href="tel:7600464414">
        <i class="fa fa-phone"></i>
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
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
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
          <div class="mt-3">
            <h6 class="mb-0">Sidenav Type</h6>
            <p class="text-sm">Choose between 2 different sidenav types.</p>
          </div>
          <div class="d-flex">
            <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
            <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
          </div>
          <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
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