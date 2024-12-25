<?php
include 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (!isset($_SESSION['current_user']['user_id'])) {
  header("Location: sign-in.php");
  die();
}
?>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
</head>
<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.php';
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <?php
    $para_array = array("title" => "Customer Form", "link" => "customer-list.php", "button_text" => "Customer List");
    $title = $para_array['title'];
    $link = $para_array['link'];
    $button_text = $para_array['button_text'];
    include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-4">
      <div class="col-xl-6  col-md-9 mx-auto">
        <div class="card z-index-0 p-3 product-main">
          <form role="form" id="custemer_frm" enctype="multipart/form-data" method="POST" data-form-type="customer">
            <input type="hidden" name="id" class="customerid" value="<?php echo $id; ?>" />


            <label for="title" class="font-weight-normal required">Customer Name</label>
            <div class="mb-3">
              <input type="text" class="form-control validtext product w-100" placeholder="Enter Your Name" name="name">
              <span class="errormsg name"></span>
            </div>
            <label for="title" class="font-weight-normal required w-100">Email</label>
            <div class="mb-3">
              <input type="email" class="form-control valikey w-100 " id="email" placeholder="Enter Your Email" name="email">
              <div class="errormsg email"></div>
            </div>
            <label for="title" class="font-weight-normal required w-100">Contact</label>
            <div class="mb-3 row">
              <div class="col">
                <input type="number" class="form-control price number w-100" placeholder="Enter Your Contact" name="contact">
                <span class="errormsg contact"></span>
              </div>
            </div>
            <label for="p-image" class="font-weight-normal">Customer Image</label>
            <div class="mb-3">
              <div class="imageAppend form-control">
                <div class="drop-zone">
                  <span class="pro-zone__prompt">Drop File Here Or Click To Upload</span>
                  <input type="file" name="c_image" id="removeImage" class="drop-zone__input validsimg">
                </div>
              </div>
              <div>
                <div class="row mt-2">
                  <label class="font-weight-normal"><strong>Allowed File Types:</strong> PNG,JPG,JPEG,GIF</label>
                </div>
                <div class="row mt-lg-n1">
                  <label class="font-weight-normal"><strong>Size Limit:</strong> Each file should not exceed 5MB</label>
                </div>
              </div>
              <div class="errormsg myFile c_image" ></div>
            </div>
            <div class="mb-3">
              <label for="city" class="font-weight-normal required">City</label>
              <input  type="text" class="w-100 form-control validtext" name="city" placeholder="Enter City">
              <span class="errormsg city"></span>
            </div>
            <div class="mb-3">
              <label for="state" class="font-weight-normal required">State</label>
              <input id="pro-description" class="w-100 form-control validtext" name="state" placeholder="Enter State">
              <span class="errormsg state"></span>
            </div>
            <div class="mb-3">
              <label for="address" class="font-weight-normal required">Address</label>
              <textarea id="pro-description" class="w-100 form-control valikey" name="address" placeholder="Enter Your Address"></textarea>
              <span class="errormsg address"></span>
            </div>
            <div class="mb-3">
              <button type="button" class="btn bg-gradient-info btn-sm customersave save_loader_show">Save</button>
              <button type="button" class="btn bg-gradient-info btn-sm   cencle_loader_show formCancel">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo main_url('admin1/assets/js/common_7.js'); ?>"></script>
</body>
</html>
<script>
  var id = "<?php echo $id; ?>";
  if (id !== "") {
  get_customer(id);

  }
</script>