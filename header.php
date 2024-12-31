<?php
$myRoot = $_SERVER["DOCUMENT_ROOT"];
if ($_SERVER['SERVER_NAME'] == 'www.textilemarkethub.com'  || $_SERVER['SERVER_NAME'] == 'textilemarkethub.com' ) {
  include($myRoot .'/connection.php');
}else{
  include($myRoot . '/markets/connection.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Innovative Solutions for Fabric Wholesalers and Textile Shops to Grow Together</title>
    <link href="<?php echo main_url('css/all.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo main_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo main_url('css/stylesheet.css'); ?>" rel="stylesheet">
    <link href="<?php echo main_url('css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo main_url('css/media.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <script src="<?php echo main_url('js/jquery.min.js'); ?>"></script>
    <script src="<?php echo main_url('js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?php echo main_url('js/front-ajax.js'); ?>"></script>
    <script src="<?php echo main_url('js/custom-js.js'); ?>"></script>
</head>