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
        <div class=" col-md-6  main-sec">
          <div class="card  p-3 p-lg-5">
            <form role="form" id="b_textileCtgryinsert" enctype="multipart/form-data" method="POST">
            <div class="mb-3">
              <label for="text" class="font-weight-normal">Categories</label>             
                <select class="form-select required" aria-label="Default select example" id="mySelect" name="categories">
                  <option selected value="">Select Category</option>
                </select>                                    
              <span class="errormsg categories"></span>
            </div>
              <div class="mb-3">
                <button type="button" class="btn bg-gradient-info btn-sm brouseSave formSave save_loader_show">Save</button>
                <button type="button" class="btn bg-gradient-info cencle_loader_show  btn-sm formCancel">Cancel</button>
              </div>
              <div class="alert1" role="alert" id="success_message" name="success_alert"></div>
            </form>
          </div>
        </div>
        <div class=" col-md-6 main-sec">
          <div class="card p-3 p-lg-5 h-100">
            <div class="row" id="getdata">
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="<?php echo main_url('admin1/assets/js/common_7.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
</body>

</html>
<script type="text/javascript"> 
loadData("brousetextilelisting");
get_Categories();
</script>