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
        $para_array = array("title" => "Markets By Reviews", "link" => "", "button_text" => "");
        $title = $para_array['title']; 
        $link = $para_array['link'];
        $button_text = $para_array['button_text'];
        include 'adminheadertop.php';
    ?>
    
  <script src="<?php echo main_url('admin1/assets/js/common_1.js'); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
</body>
</html>
<script type="text/javascript">
  loadData("reviewlisting");
  select_shop();
</script>