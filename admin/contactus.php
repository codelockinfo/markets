<?php
include 'header.php';
if (!isset($_SESSION['current_user']['user_id'])) {
  header("Location: sign-in");
  die();
}
if ($_SESSION['current_user']['role'] == 1) {
  header("Location: /");
  die();
}
?>
<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.php';
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <?php
      $para_array = array("title" => "Contact us", "link" => "", "button_text" => "");
      $title = $para_array['title']; 
      $link = $para_array['link'];
      $button_text = $para_array['button_text'];
      include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-12 main-sec">
          <div class="card z-index-0 p-3 p-lg-5 ">
            <div class="mb-3">
                  <div class="d-flex justify-content-between ">
                <div><h5 class="title_font">Contact us page show and hide  frontend side </h5></div>
                <div class="btn-group">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <div class="form-check form-switch ps-0">
                      <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" value="contactus" checked>
                      <input type="hidden" id="toggleStatus" name="status" value="contactus">
                    </div>
                  </div>
                </div>
                </div>
                </div>
                <img src="assets/img/contactus-3.webp">
            </div>          
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo main_url('admin/assets/js/common_8.js'); ?>"></script>
</body>
</html>
<script type="text/javascript"> 
</script>
