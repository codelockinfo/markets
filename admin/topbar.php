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
      $para_array = array("title" => "Topbar Form", "link" => "", "button_text" => "");
      $title = $para_array['title']; 
      $link = $para_array['link'];
      $button_text = $para_array['button_text'];
      include 'adminheadertop.php';
    ?>
    <div class="container-fluid w-100 py-4">
      <div class="row">
        <div class=" col-md-6 main-sec">
          <div class="card  p-3 p-lg-5">
            <form role="form" id="topbarinsert" enctype="multipart/form-data" method="POST">
              <label for="text" class="font-weight-normal required  "> Topbar Input 1</label>
              <div class="mb-3">
                <input type="text" class="form-control valikey" placeholder="Topbar Input 1" name="topbar_input1">
                <span class="errormsg topbar_input1"></span>
              </div>
              <label for="image-link" class="font-weight-normal required">Topbar Input 2</label>
              <div class="mb-3">
                <input type="url" class="form-control valikey" placeholder="Topbar Input 2" name="topbar_input2">
                <span class="errormsg topbar_input2"></span>
              </div>
              <div class="mb-3">
                <button type="button" class="btn bg-gradient-info btn-sm topbarSave formSave save_loader_show">Save</button>
                <button type="button" class="btn bg-gradient-info btn-sm cencle_loader_show formCancel">Cancel</button>
              </div>
              <div class="alert1" role="alert" id="success_message" name="success_alert"></div>
            </form>
          </div>
        </div>
        <div class=" col-md-6 main-sec">
          <div class="card p-3 p-xl-5 h-100">
            <div class="row" id="getdata">
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script src="<?php echo main_url('admin/assets/js/common_13.js'); ?>"></script>
</body>
</html>
<script type="text/javascript"> 
loadData("topbarlisting");
</script>