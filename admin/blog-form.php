<?php
include 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (!isset($_SESSION['current_user']['user_id'])) {
  header("Location: sign-in.php");
  die();
}
$shop = isset($_SESSION['current_user']['shop']) ? $_SESSION['current_user']['shop'] :  '';
?>
<body class="g-sidenav-show bg-gray-100">
  <?php 
      include 'sidebar.php';
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <?php
      $para_array = array("title" => "Blog Form", "link" => "blog-list.php", "button_text" => "Blog List");
      $title = $para_array['title']; 
      $link = $para_array['link'];
      $button_text = $para_array['button_text'];
      include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-4">
      <div class="col-xl-6 col-lg-9 col-md-6 mx-auto">
        <div class="card z-index-0 p-3">
          <form role="form" id="bloginsert" enctype="multipart/form-data" method="post"  data-form-type="blog">
          <input type="hidden" name="id" class="blogid" value="<?php echo $id;?>"/>
            <label for="title" class="font-weight-normal required">Blog Title</label>
            <div class="mb-3">
              <input type="text" class="form-control validtext" placeholder="Blog Title" name="blog_title">
              <span class="errormsg blog_title"></span>
            </div>
            <label for="p-tags" class="font-weight-normal required">Blog Category</label>
            <div class="mb-3">
                <select class="form-select required" aria-label="Default select example" id="mySelect" name="category">
                  <option selected value="">Select Category</option>
                </select>                                    
              <span class="errormsg category"></span>
            </div>
            <label for="body" class="font-weight-normal required">Body</label>
            <div class="mb-3">
              <textarea class="validtext" id="myeditor" name="myeditor"></textarea>
              <span class="errormsg myeditor"></span>
            </div>
            <label for="text" class="font-weight-normal required">Author</label>
            <div class="mb-3">
              <input type="text" class="form-control validtext" placeholder="Author Name" name="author_name" value="<?php echo $shop; ?>">
              <span class="errormsg author_name"></span>
            </div>
            <label for="p-image" class="font-weight-normal required">Blog Image</label>
            <div class="mb-3">
              <div class="imageAppend form-control">
                <div class="drop-zone">
                  <span class="pro-zone__prompt">Drop File Here Or Click To Upload</span>
                  <input type="file" name="blog_image" id="removeImage" class="drop-zone__input validsimg">
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
              <div class="errormsg myFile blog_image" ></div>
            </div>
            <label for="text" class="font-weight-normal">Blog Image Alt</label>
            <div class="mb-3">
              <input type="text" class="form-control validtext" placeholder="Blog Image Alt" name="blog_image_alt">
            </div>
            <div class="mb-3">
              <button type="button" class="btn bg-gradient-info btn-sm blogSave save_loader_show">Save</button>
              <button type="button" class="btn bg-gradient-info btn-sm cencle_loader_show formCancel">Cancel</button>
            </div>
            <div class="alert1"  role="alert" id="success_message" name="success_alert"></div>
          </form>
        </div>
      </div>
    </div>  
  </div>
  <script src="<?php echo main_url('admin/assets/js/common_9.js'); ?>"></script>
</body>
</html>

<script>
    var id = "<?php echo $id; ?>";
    get_Categories();
    if (id !== "") {
    get_blog(id);
   

    }
</script>