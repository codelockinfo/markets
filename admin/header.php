<?php
$myRoot = $_SERVER["DOCUMENT_ROOT"];
if ($_SERVER['SERVER_NAME'] == 'www.textilemarkethub.com' || $_SERVER['SERVER_NAME'] == 'textilemarkethub.com') {
  include($myRoot .'/connection.php');
}else{
  include($myRoot . '/markets/connection.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
      
        <link rel="shortcut icon" href="<?php echo main_url('admin/assets/img/faviconicon.png'); ?>" type="image/x-icon">
        <div id="preloader">
              <div id="status">&nbsp;</div>
        </div>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Surat's Textile Market Tour: Everything You Need to Know</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script> -->
        <link rel="stylesheet" href="<?php echo main_url('admin/assets/css/nucleo-icons.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo main_url('admin/assets/css/nucleo-svg.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo main_url('/admin/assets/css/soft-ui-dashboard.css?v=1.0.7'); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo main_url('admin/assets/css/custom_18.css'); ?>" rel="stylesheet">                                                
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="<?php echo main_url('admin/assets/js/nepcha-analytics.js'); ?>"></script>
        <script src="<?php echo main_url('admin/assets/js/jquery-3.7.1.min.js'); ?>"></script>
        <script src="<?php echo main_url('admin/assets/js/ajax23.js'); ?>"></script>
        <script src="<?php echo main_url('admin/assets/js/core/popper.min.js'); ?>"></script>
        <script src="<?php echo main_url('admin/assets/js/core/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo main_url('admin/assets/js/plugins/perfect-scrollbar.min.js'); ?>"></script>
        <script src="<?php echo main_url('admin/assets/js/plugins/smooth-scrollbar.min.js'); ?>"></script>
        <script src="<?php echo main_url('admin/assets/js/plugins/chartjs.min.js'); ?>"></script>
        <script src="<?php echo main_url('admin/assets/js/buttons.js'); ?>"></script>
        <script src="<?php echo main_url('admin/assets/js/soft-ui-dashboard.js'); ?>"></script>
        <script src="<?php echo main_url('admin/assets/js/ckeditor/ckeditor.js'); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="<?php echo main_url('admin/assets/js/common_13.js'); ?>"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        
    </head>       
    

   