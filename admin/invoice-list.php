<?php
include 'header.php';
if (!isset($_SESSION['current_user']['user_id'])) {
  header("Location: sign-in");
  die();
}
?>

<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.php';
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <?php
    $para_array = array("title" => "Invoice List", "link" => "invoice", "button_text" => "Add Invoice");
    $title = $para_array['title'];
    $link = $para_array['link'];
    $button_text = $para_array['button_text'];
    include 'adminheadertop.php';
    ?>
    <div class="col-12 mt-4 p-4 overflow-x-hidden">
      <div class="card mb-4">
        <div class="d-flex justify-content-end p-3 align-items-center">

          <div class="ms-md-auto d-flex align-items-center filterheader">

            <div class="input-group search-btn search-icon dropdownhide w-100">
              <span class="input-group-text text-body search-btn_2"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control search-btn_1 me-2" placeholder="Type here..." id="search" data-routine="invoicelisting" >
            </div>
          
            <div class="me-3 invoice_fliter w-50">
            <input type="text" class="form-control search-btn_1 w-100 " id="date_range" name="date_range" placeholder="Select Date Range" />
            </div>
            
            <div class="dropdown mt-3 filterDropdown w-40 text-end"  data-filter="invoicelist">
            <button class="btn bg-gradient-info dropdown-toggle dropdownhide w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Sort By
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" data-table="invoice">
            
              <li class="dropdown-item" data-value="alphabetically_az" data-sortby="Alphabetically, A-Z">Alphabetically, A-Z</li>
              <li class="dropdown-item" data-value="alphabetically_za" data-sortby="Alphabetically, Z-A">Alphabetically, Z-A</li>
              <li class="dropdown-item" data-value="date_old_new" data-sortby="Date, old to new">Date, old to new</li>
              <li class="dropdown-item" data-value="date_new_old" data-sortby="Date, new to old">Date, new to old</li>
            </ul>
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
  loadData("invoicelisting");
</script>