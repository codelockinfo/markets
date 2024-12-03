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
      $para_array = array("title" => "Video List", "link" => "", "button_text" => "");
      $title = $para_array['title']; 
      $link = $para_array['link'];
      $button_text = $para_array['button_text'];
      include 'adminheadertop.php';
    ?>
    <div class="col-12 mt-4 p-4 overflow-x-hidden">
      <div class="card mb-4">
        <div class="d-flex justify-content-between p-3">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-1 mt-1 text-lg">Videos</h6>
          </div>
          <div class="dropdown mt-3">
            <button class="btn bg-gradient-info dropdown-toggle dropdownhide" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Filters
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Featured</a></li>
              <li><a class="dropdown-item" href="#">Best Selling</a></li>
              <li><a class="dropdown-item" href="#">Alphabetically, A-Z</a></li>
              <li><a class="dropdown-item" href="#">Alphabetically, Z-A</a></li>
              <li><a class="dropdown-item" href="#">Price, low to high</a></li>
              <li><a class="dropdown-item" href="#">Price, high to low</a></li>
              <li><a class="dropdown-item" href="#">Date, old to new</a></li>
              <li><a class="dropdown-item" href="#">Date, new to old</a></li>
            </ul>
          </div>
        </div>
        <div class="input-group search-btn search-icon1 w-80 mx-auto">
          <span class="input-group-text text-body search-btn_2"><i class="fas fa-search" aria-hidden="true"></i></span>
          <input type="text" class="form-control search-btn_1" placeholder="Type here...">
        </div>
        <div class="card-body p-3">
          <div class="row" id="getdata">
          </div>
        </div>
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
          <p>See Our Dashboard Options.</p>
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
          <p class="text-sm">Choose Between 2 Different Sidenav Types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You Can Change The Sidenav Type Just On Desktop view.</p>
        <div class="mt-3">
          <h6 class="mb-0">Navbar Fixed</h6>
        </div>
        <div class="form-check form-switch ps-0">
          <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
        </div>
        <hr class="horizontal dark my-sm-4">
        <a class="btn bg-gradient-dark w-100" href="#">Free Download</a>
        <a class="btn btn-outline-dark w-100" href="#">View Documentation</a>
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
<script type="text/javascript">
  loadData("allvideolisting");
</script>