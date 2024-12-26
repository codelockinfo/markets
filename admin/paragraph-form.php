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
        $para_array = array("title" => "Paragraph Form", "link" => "", "button_text" => "");
        $title = $para_array['title']; 
        $link = $para_array['link'];
        $button_text = $para_array['button_text'];
        include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class=" col-md-6 para-main">
          <div class="card  p-3 p-lg-5">
            <form role="form" id="paragraphinsert" enctype="multipart/form-data" method="POST">
              <label for="body" class="font-weight-normal required">Paragraph</label>
              <div class="mb-3">
                <textarea name="myeditor" id="myeditor"></textarea>
                <span class="errormsg myeditor"></span>
              </div>
              <div class="mb-3">
                <button type="button" class="btn bg-gradient-info btn-sm paragraphSave save_loader_show">Save</button>
                <button type="button" class="btn bg-gradient-info btn-sm cencle_loader_show formCancel">Cancel</button>
              </div>
              <div class="alert1" role="alert" id="success_message" name="success_alert"></div>
            </form>
          </div>
        </div>
        <div class="col-md-6  para-main">
          <div class="card p-3 p-lg-5  h-100">
            <div class="mb-3 form-check-reverse text-right ">
              <div class="container">
                <div class="btn-group">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <div class="form-check form-switch ps-0">
                      <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" value="paragraph" checked>
                      <input type="hidden" id="toggleStatus" name="status" value="paragraph">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div  id="getdata">
              
            </div>                   
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
<script type="text/javascript"> 
loadData("paragraphlisting");
</script>