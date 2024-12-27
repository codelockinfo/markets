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
      $para_array = array("title" => "Banner Image Form", "link" => "", "button_text" => "");
      $title = $para_array['title']; 
      $link = $para_array['link'];
      $button_text = $para_array['button_text'];
      include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-6  main-sec">
          <div class="card p-3 p-lg-5">
            <form role="form" id="bannerinsert" enctype="multipart/form-data" method="POST">
              <label for="b-image" class="font-weight-normal required">Banner Image</label>
              <div class="mb-3">
                <div class="drop-zone form-control">
                  <span class="pro-zone__prompt">Drop File Here Or Click To Upload</span>
                  <input type="file" name="myFile" id="removeImage" class="drop-zone__input">
                </div>
                <div >
                  <div class="row mt-2">
                    <label class="font-weight-normal"><strong>Allowed File Types:</strong> PNG,JPG,JPEG,GIF</label>
                  </div>
                  <div class="row mt-lg-n1">
                    <label class="font-weight-normal"><strong>Size Limit:</strong> Each File Should Not Exceed 5MB</label>
                  </div>
                </div>
                <div class="errormsg myFile"></div>
              </div>
              <label for="text" class="font-weight-normal">Banner Image Alt</label>
              <div class="mb-3">
                <input type="text" class="form-control validtext" placeholder="Banner Image Alt" name="image_alt">
              </div>
              <label for="b-subheading" class="font-weight-normal required">Banner Button Link</label>
              <div class="mb-3">
                <input type="url" class="form-control validurl" placeholder="https://example.com" name="banner_btn_link">
                <span class="errormsg banner_btn_link"></span>
              </div>
              <div class="mb-3">
                <button type="button" class="btn bg-gradient-info btn-sm bannerSave saveButton formSave save_loader_show">Save</button>
                <button type="button" class="btn bg-gradient-info btn-sm cencle_loader_show  formCancel">Cancel</button>
              </div>
              <div class="alert1" role="alert" id="success_message" name="success_alert"></div>
            </form>
          </div>
        </div>
        <div class="col-md-6 main-sec">
          <div class="card  p-3 p-lg-5 h-100">
            <div class="row" id="getdata">     
             </div>
          </div>
        </div>
      </div>
    </div>

    <script src="<?php echo main_url('admin/assets/js/common_9.js'); ?>"></script>
</body>

</html>
<script type="text/javascript"> 
loadData("bannerlisting");
</script>
