<?php
include 'header.php';
if (!isset($_SESSION['current_user']['user_id'])) {
  header("Location: sign-in.php");
  die();
}else{?>
  <script>profileLoadData('listprofile');</script>
<?php
}
?>
<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.php';
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <?php
        $para_array = array("title" => "Profile Form", "link" => "profile.php", "button_text" => "Preview");
        $title = $para_array['title']; 
        $link = $para_array['link'];
        $button_text = $para_array['button_text'];
        include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-4">
      <div class="col-xl-5 col-lg-9 col-md-5 mx-auto">
        <div class="card card-body z-index-0 p-3">
          <form role="form" id="profileUpdate" enctype="multipart/form-data" method="POST">
            <label for="name" class="font-weight-normal required">Name</label>
            <div class="mb-3">
              <input type="fname" class="form-control" placeholder="Enter Your Name" name="name">
              <span class="errormsg name"></span>
            </div>
            <label for="shopname" class="font-weight-normal required">Shop Name</label>
            <div class="mb-3">
              <input type="shopname" class="form-control" placeholder="Shop Name" name="shop">
              <span class="errormsg shop"></span>
            </div>
            <label for="mobilenumber" class="font-weight-normal required">Mobile Number</label>
            <div class="mb-3">
              <input type="tel" class="form-control" placeholder="Mobile No." name="phone_number">
              <span class="errormsg phone_number"></span>
            </div>
            <label for="type" class="font-weight-normal required">Business Type</label>
            <div class="mb-3">
              <select class="form-select" aria-label="Default select example" name="business_type">
                <option selected value="" disabled>Your Business Type</option>
                <option value="0">Manufacturer</option>
                <option value="1">Wholesale</option>
              </select>
              <span class="errormsg business_type"></span>
            </div>
            <label for="address" class="font-weight-normal required">Address</label>
            <div class="mb-3">
              <input type="address" class="form-control" placeholder="Address" name="address">
              <span class="errormsg address"></span>
            </div>
            <div class="text-center">
              <button type="button" class="btn bg-gradient-info btn-sm profileDataUpdate save_loader_show">Save</button>
            </div>
          </form>
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
  <script src="<?php echo main_url('admin1/assets/js/common1.js'); ?>"></script>
</body>
</html>