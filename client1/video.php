<?php
include 'header.php';
?>


<body>
    <?php
    include 'navbar.php';
    ?>
    <!-- Hero Start -->
    <div class="container-fluid bg-light py-5 mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1 mb-4">All Video</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="<?php echo CLS_SITE_URL ?>index.php">Home</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">All Video</li>
            </ol>
        </div>
    </div>
    <!-- Hero End -->
    <section class="video pt-5 pt-md-6">
      <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4"><video class="w-100 rounded overflow-hidden"  autoplay muted loop><source src="img/IMG_1924.MOV"></video></div>
            <div class="col-12 col-md-6 col-lg-4"><video class="w-100 rounded overflow-hidden mt-4 mt-sm-0"  autoplay muted loop><source src="img/IMG_6892.MP4"></video></div>
            <div class="col-12 col-md-6 col-lg-4"><video class="w-100 rounded overflow-hidden  mt-4 mt-lg-0"  autoplay muted loop><source src="img/IMG_1924.MOV"></video></div>
            <div class="col-12 col-md-6 col-lg-4"><video class="w-100 rounded overflow-hidden  mt-4 "  autoplay muted loop><source src="img/IMG_6892.MP4"></video></div>
            <div class="col-12 col-md-6 col-lg-4"><video class="w-100 rounded overflow-hidden  mt-4 "  autoplay muted loop><source src="img/IMG_1924.MOV"></video></div>
            <div class="col-12 col-md-6 col-lg-4"><video class="w-100 rounded overflow-hidden  mt-4 "  autoplay muted loop><source src="img/IMG_6892.MP4"></video></div>
            <div class="col-12 col-md-6 col-lg-4"><video class="w-100 rounded overflow-hidden  mt-4 "  autoplay muted loop><source src="img/IMG_1924.MOV"></video></div>
            <div class="col-12 col-md-6 col-lg-4"><video class="w-100 rounded overflow-hidden  mt-4 "  autoplay muted loop><source src="img/IMG_6892.MP4"></video></div>
            <div class="col-12 col-md-6 col-lg-4"><video class="w-100 rounded overflow-hidden  mt-4 "  autoplay muted loop><source src="img/IMG_1924.MOV"></video></div>
          </div>
      </div>
    </section> 
    <?php
    include 'footer.php';
    ?>




</body>

</html>