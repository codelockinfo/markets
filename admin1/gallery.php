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
      $para_array = array("title" => "Gallery", "link" => "", "button_text" => "");
      $title = $para_array['title']; 
      $link = $para_array['link'];
      $button_text = $para_array['button_text'];
      include 'adminheadertop.php';
    ?>
    <div class="col-12 mt-4 p-4">
      <div class="card mb-4">
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
  loadData("listgallary");
</script>