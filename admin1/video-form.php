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
              <input type="text" class="form-control valikey" placeholder="Video Title" name="video_title">
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
            <label for="y-videolink" class="font-weight-normal required">auto generate number</label>
            <div class="mb-3">
              <input type="text" id="genrate" class="form-control g_id" name="auto_genrate">
              <span class="errormsg youtube_vlogs"></span>
            </div>
            <div class="mb-3">
              <button type="button" class="btn bg-gradient-info btn-sm videoSave save_loader_show">Save</button>
              <button type="button" class="btn bg-gradient-info btn-sm cencle_loader_show formCancel">Cancel</button>

            </div>
            <div class="alert" role="alert" id="success_message" name="success_alert"></div>
          </form>
        </div>
      </div>
    </div>

</body>

</html>
<script>
  get_Categories();
</script>