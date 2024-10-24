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
      $para_array = array("title" => "Video Form", "link" => "video-list.php", "button_text" => "Video List");
      $title = $para_array['title']; 
      $link = $para_array['link'];
      $button_text = $para_array['button_text'];
      include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-4">
      <div class="col-xl-6 col-lg-9 col-md-6 mx-auto">
        <div class="card z-index-0 p-3">
          <form role="form" id="videoinsert" enctype="multipart/form-data" method="POST">
            <label for="title" class="font-weight-normal required">Video Title</label>
            <div class="mb-3">
              <input type="text" class="form-control validtext" placeholder="Video Title" name="video_title">
              <span class="errormsg video_title"></span>
            </div>
            <label for="p-tags" class="font-weight-normal required">Video Category</label>
            <div class="mb-3">
              <label for="text" class="font-weight-normal">Categories</label>             
                <select class="form-select required" aria-label="Default select example" id="mySelect" name="category">
                  <option selected value="">Select Category</option>
                </select>                                    
              <span class="errormsg category"></span>
            </div>

            <label for="y-shortslink" class="font-weight-normal required">Youtube Shorts Link</label>
            <div class="mb-3">
              <input type="url" id="y-shorturl" class="form-control validurl" placeholder="Youtube Shorts" name="youtube_shorts">
              <span class="errormsg youtube_shorts"></span>
            </div>
            <label for="y-videolink" class="font-weight-normal required">Youtube Vlogs Link</label>
            <div class="mb-3">
              <input type="url" id="y-vlogurl" class="form-control validurl" placeholder="Youtube Vlogs" name="youtube_vlogs">
              <span class="errormsg youtube_vlogs"></span>
            </div>
            <div class="mb-3">
              <button type="button" class="btn bg-gradient-info btn-sm videoSave save_loader_show">Save</button>
              <button type="button" class="btn bg-gradient-info btn-sm formCancel">Cancel</button>
            </div>
            <div class="alert" role="alert" id="success_message" name="success_alert"></div>
          </form>
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
<script>
    get_Categories();
</script>