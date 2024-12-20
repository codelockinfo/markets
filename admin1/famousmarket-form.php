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
    $para_array = array("title" => "Famous Markets Form", "link" => "", "button_text" => "");
    $title = $para_array['title'];
    $link = $para_array['link'];
    $button_text = $para_array['button_text'];
    include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class=" col-md-6 main-sec">
          <div class="card  p-3 p-lg-5">
            <form role="form" id="f_marketinsert" enctype="multipart/form-data" method="POST">
              <label for="name" class="font-weight-normal required">Shop Name</label>
              <div class="mb-3">
                <select class="form-select required shop_tag" aria-label="Select Shop" id="mySelect" name="shop_name">
                  <option selected value="">Select Shop</option>
                </select>
                <span class="errormsg shop_name"></span>
              </div>
              <label for="review" class="font-weight-normal required">Shop Reviews</label>
              <div class="mb-3">
                <input type="number" class="form-control product price w-100" placeholder="Shop Reviews" name="review">
                <span class="errormsg review"></span>
              </div>
              <div class="mb-3">
                <button type="button" class="btn bg-gradient-info btn-sm marketSave  save_loader_show">Save</button>
                <button type="button" class="btn bg-gradient-info cencle_loader_show btn-sm formCancel">Cancel</button>
              </div>
              <div class="alert1" role="alert" id="success_message" name="success_alert"></div>
            </form>
          </div>
        </div>
        <div class="col-md-6  main-sec">
          <div class="card p-3 p-lg-5 h-100">
            <div class="row" id="getdata">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo main_url('admin1/assets/js/common_6.js'); ?>"></script>
</body>
</html>
<script type="text/javascript">
  listfamousmarket();
  select_shop();
</script>