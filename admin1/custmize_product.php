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
    $para_array = array("title" => "Product List",  "button_text" => "");
    $title = $para_array['title']; 
   
    $button_text = $para_array['button_text'];
    include 'adminheadertop.php';
    ?>
    <div class="col-12 mt-4 p-4 overflow-x-hidden">
      <div class="card mb-4">
        <div class="d-flex justify-content-between p-3">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-1 mt-1 text-lg">Products</h6>
          </div>
          <div class="ms-md-auto pe-md-0 d-flex align-items-center me-2">
            <div class="input-group search-btn search-icon dropdownhide">
              <span class="input-group-text text-body search-btn_2"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control search-btn_1" placeholder="Type here..."  id="search" data-routine="productlisting">
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

</body>
</html>
<script type="text/javascript">
  loadData("custm_productlisting");
</script>