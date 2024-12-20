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
    $para_array = array("title" => "User List", "link" => "", "button_text" => "");
    $title = $para_array['title'];
    $link = $para_array['link'];
    $button_text = $para_array['button_text'];

    include 'adminheadertop.php';
    ?>
    <div class="col-12 mt-4 p-4 overflow-x-hidden">
      <div class="card mb-4">
        <div class="d-flex justify-content-between p-3">
          <div class="card-header pb-0 p-3">
            <h6 class="mb-1 mt-1 text-lg"></h6>
          </div>
        </div>
        <div class="ms-md-auto pe-md-0 d-flex align-items-center m-4">
            <div class="input-group search-btn search-icon dropdownhide">
              <span class="input-group-text text-body search-btn_2"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control search-btn_1" placeholder="Type here..."  id="search" data-routine="userlisting">
            </div>
          </div>
        <div class="card-body p-3">
          <div class="row" id="getdata">
          </div>
          <div id="pagination">

          </div>
          
        </div>
      </div>
    </div>
  </div>
 
  <script src="<?php echo main_url('admin1/assets/js/common_6.js'); ?>"></script>
</body>
</html>
<script src="//cdn.datatables.net/2.1.2/js/dataTables.min.js"></script>
<script type="text/javascript">

  loadData("userlisting");
  
</script>