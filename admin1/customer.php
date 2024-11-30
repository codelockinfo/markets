<?php
include 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (!isset($_SESSION['current_user']['user_id'])) {
  header("Location: sign-in.php");
  die();
}
?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
</head>
<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.php';
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <?php
    $para_array = array("title" => "Customer Form", "link" => "customer_list.php", "button_text" => "Customer List");
    $title = $para_array['title'];
    $link = $para_array['link'];
    $button_text = $para_array['button_text'];
    include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-4">
      <div class="col-xl-6 col-lg-9 col-md-6 mx-auto">
        <div class="card z-index-0 p-3 product-main">
          <form role="form" id="custemer_frm" enctype="multipart/form-data" method="POST" data-form-type="customer">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <label for="title" class="font-weight-normal required">Customer Name</label>
            <div class="mb-3">
              <input type="text" class="form-control validtext product w-100" placeholder="Enter Your Name" name="name">
              <span class="errormsg name"></span>
            </div>
            <label for="title" class="font-weight-normal required w-100">Email</label>
            <div class="mb-3">
              <input type="email" class="form-control valikey w-100 " placeholder="Enter Your Email" name="email">
              <div class="errormsg email"></div>
            </div>
            <label for="title" class="font-weight-normal required w-100">Contact</label>
            <div class="mb-3 row">
              <div class="col">
                <input type="number" class="form-control price number w-100" placeholder="Enter Your Contact" name="contact">
                <span class="errormsg contact"></span>
              </div>
            </div>
            <label for="p-image" class="font-weight-normal required">Customer Image</label>
            <div class="mb-3">
              <div class="imageAppend form-control">
                <div class="drop-zone">
                  <span class="pro-zone__prompt">Drop File Here Or Click To Upload</span>
                  <input type="file" name="c_image" id="removeImage" class="drop-zone__input validsimg">
                </div>
              </div>
              <div class="col">
                <div class="row mt-2">
                  <label class="font-weight-normal"><strong>Allowed File Types:</strong> PNG,JPG,JPEG,GIF</label>
                </div>
                <div class="row mt-lg-n1">
                  <label class="font-weight-normal"><strong>Size Limit:</strong> Each file should not exceed 5MB</label>
                </div>
              </div>
              <div class="errormsg myFile c_image" ></div>
            </div>
            <div class="mb-3">
              <label for="city" class="font-weight-normal required">City</label>
              <input  type="text" class="w-100 form-control valikey" name="city" placeholder="Enter city">
              <span class="errormsg city"></span>
            </div>
            <div class="mb-3">
              <label for="state" class="font-weight-normal required">State</label>
              <input id="pro-description" class="w-100 form-control valikey" name="state" placeholder="Enter state">
              <span class="errormsg state"></span>
            </div>
            <div class="mb-3">
              <label for="address" class="font-weight-normal required">Address</label>
              <textarea id="pro-description" class="w-100 form-control valikey" name="address" placeholder="Enter Your Address"></textarea>
              <span class="errormsg address"></span>
            </div>
            <div class="mb-3">
              <button type="button" class="btn bg-gradient-info btn-sm customersave save_loader_show">Save</button>
              <button type="button" class="btn bg-gradient-info btn-sm   cencle_loader_show formCancel">Cancel</button>
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
<script>
  var id = "<?php echo $id; ?>";
  if (id !== "") {
  get_customer(id);
  }
</script>