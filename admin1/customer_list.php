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
    $para_array = array("title" => "Customer List", "link" => "customer.php", "button_text" => "Add Customer");
    $title = $para_array['title'];
    $link = $para_array['link'];
    $button_text = $para_array['button_text'];

    include 'adminheadertop.php';
    ?>
    <div class="col-12 mt-4 p-4 overflow-x-hidden">
      <div class="card mb-4">
        <div class="d-flex justify-content-between p-3 align-items-center">
          <div class="card-header">
            <h6 class="mb-1 mt-1 text-lg">Customer List</h6>
          </div>
          <div class="ms-md-auto  d-flex align-items-center me-2">
            <div class="input-group search-btn search-icon dropdownhide">
              <span class="input-group-text text-body search-btn_2"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control search-btn_1" placeholder="Type here..." id="search" data-routine="customerlisting" >
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row" id="getdata">
          </div>
          <div id="pagination"></div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo main_url('admin1/assets/js/common_2.js'); ?>"></script>
</body>
</html>
<script type="text/javascript">
  loadData("customerlisting");
</script>