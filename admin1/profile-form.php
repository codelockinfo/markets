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
                <option value="1">wholesaler</option>
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

  <script src="<?php echo main_url('admin1/assets/js/common_4.js'); ?>"></script>
</body>
</html>