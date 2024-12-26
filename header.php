<?php
$myRoot = $_SERVER["DOCUMENT_ROOT"];
if ($_SERVER['SERVER_NAME'] == 'textilemarkethub.com') {
  include($myRoot .'/connection.php');
}else{
  include($myRoot . '/markets/connection.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Innovative Solutions for Fabric Wholesalers and Textile Shops to Grow Together</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playball&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="<?php echo main_url('css/all.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo main_url('css/swiper-bundle.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo main_url('css/bootstrap-icons.css'); ?>" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo main_url('lib/animate/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo main_url('lib/lightbox/css/lightbox.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo main_url('lib/owlcarousel/owl.carousel.min.css'); ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo main_url('css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link href="<?php echo main_url('css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo main_url('css/animate.min.css'); ?>" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JavaScript Libraries -->
    <script src="<?php echo main_url('js/jquery.min.js'); ?>"></script>
    <script src="<?php echo main_url('js/jquery.min2.js'); ?>"></script>
    <script src="<?php echo main_url('js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo main_url('js/swiper-bundle.min.js'); ?>"></script>

    <!-- animation js  -->
    <script src="<?php echo main_url('lib/wow/wow.min.js'); ?>"></script>
    <script src="<?php echo main_url('lib/easing/easing.min.js'); ?>"></script>
    <script src="<?php echo main_url('lib/waypoints/waypoints.min.js'); ?>"></script>
    <script src="<?php echo main_url('lib/counterup/counterup.min.js'); ?>"></script>
    <script src="<?php echo main_url('lib/lightbox/js/lightbox.min.js'); ?>"></script>
    <script src="<?php echo main_url('lib/owlcarousel/owl.carousel.min.js'); ?>"></script>

    <!-- Template Javascript -->
    <script src="<?php echo main_url('js/ajax.js'); ?>"></script>
    <script src="<?php echo main_url('js/main.js'); ?>"></script>
    <script src="<?php echo main_url('js/custom.js'); ?>"></script>
</head>