<?php
include 'header.php';
if (!isset($_SESSION['current_user']['user_id'])) {
  header("Location: sign-in.php");
  die();
}
if ($_SESSION['current_user']['role'] == 1) {
  header("Location: index.php");
  die();
}
?>

<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.php';
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <?php
        $para_array = array("title" => "Browse By Textile Categories Form", "link" => "", "button_text" => "");
        $title = $para_array['title']; 
        $link = $para_array['link'];
        $button_text = $para_array['button_text'];
        include 'adminheadertop.php';
    ?>
    <div class="container-fluid w-100 py-4">
      <div class="row">
        <div class="col-xl-6 col-lg-9 col-md-6 mx-auto main-sec">
          <div class="card z-index-0 p-5">
            <form role="form" id="b_textileCtgryinsert" enctype="multipart/form-data" method="POST">
            <div class="mb-3">
              <label for="text" class="font-weight-normal">Categories</label>             
                <select class="form-select required" aria-label="Default select example" id="mySelect" name="categories">
                  <option selected value="">Select Category</option>
                  <!-- <option value="1">Armwear</option>
                  <option value="2">Badges</option>
                  <option value="3">Belts</option>
                  <option value="4">Children's clothing</option>
                  <option value="5">Clothing brands by type</option>
                  <option value="6">Coats</option>
                  <option value="7">Dresses</option>
                  <option value="8">Footwear</option>
                  <option value="9">Gowns</option>
                  <option value="10">Handwear</option>
                  <option value="11">Hosiery</option>
                  <option value="12">Jackets</option>
                  <option value="13">Jeans by type</option>
                  <option value="14">Knee clothing</option>
                  <option value="15">Masks</option>
                  <option value="16">Neckwear</option>
                  <option value="17">One-piece suits</option>
                  <option value="18">Outerwear</option>
                  <option value="19">Ponchos</option>
                  <option value="20">Robes and cloaks</option>
                  <option value="21">Royal attire</option>
                  <option value="22">Saris</option>
                  <option value="23">Sashes</option>
                  <option value="24">Shawls and wraps</option>
                  <option value="25">Skirts</option>
                  <option value="26">Sportswear</option>
                  <option value="27">Suits</option>
                  <option value="28">Tops</option>
                  <option value="29">Trousers and shorts</option>
                  <option value="30">Undergarments</option>
                  <option value="31">Wedding clothing</option> -->
                </select>                                    
              <span class="errormsg categories"></span>
            </div>
              <div class="mb-3">
                <button type="button" class="btn bg-gradient-info btn-sm brouseSave formSave save_loader_show">Save</button>
                <button type="button" class="btn bg-gradient-info btn-sm formCancel">Cancel</button>
              </div>
              <div class="alert" role="alert" id="success_message" name="success_alert"></div>
            </form>
          </div>
        </div>
        <div class="col-xl-6 col-lg-9 col-md-6 mx-auto main-sec">
          <div class="card z-index-0 p-5">
            <div class="row" id="getdata">
        
            </div>
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
    <script src="<?php echo main_url('/admin1/assets/js/common.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
</body>

</html>
<script type="text/javascript"> 
console.log("brouse textile LIST");
// listbrousetextile();
loadData("brousetextilelisting");
get_Categories();
</script>