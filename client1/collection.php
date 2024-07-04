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
            <h1 class="display-1 mb-4">Collection</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="<?php echo CLS_SITE_URL ?>index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Collection</li>
            </ol>
        </div>
    </div>
    <!-- Hero End -->
    <!-- Collection Start -->
    <div class=" text-center py-5 collectionp">
        <div class="container ">
            <div class="row">
                <div class="col-12 col-md-4">
                    <img class="img-fluid" style="border-radius: 5px; object-fit: cover;" src="<?php echo CLS_SITE_URL; ?>img/saree/8.jpg" alt="saree8">
                </div>
                <div class="col-12 col-md-8">
                    <div class="swiper mySwiper">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-wrapper d-flex align-items-center justify-content-between">

                            <div class="swiper-slide">
                                <div class="d-flex flex-column align-items-center">
                                    <img class="rounded-top w-100"
                                        style="object-fit: cover;" src="<?php echo CLS_SITE_URL; ?>img/saree/6.jpg"
                                        alt="saree6">
                                    <h2>saree 1</h2>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="d-flex flex-column align-items-center">
                                    <img class="rounded-top w-100"
                                        style="object-fit: cover;" src="<?php echo CLS_SITE_URL; ?>img/saree/1.jpg"
                                        alt="saree1">
                                    <h2>saree 2</h2>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="d-flex flex-column align-items-center">
                                    <img class="rounded-top w-100"
                                        style="object-fit: cover;" src="<?php echo CLS_SITE_URL; ?>img/saree/3.jpg"
                                        alt="saree3">
                                    <h2>saree 3</h2>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="d-flex flex-column align-items-center">
                                    <img class="rounded-top w-100"
                                        style="object-fit: cover;" src="<?php echo CLS_SITE_URL; ?>img/saree/5.jpg"
                                        alt="saree5">
                                    <h2>saree 4</h2>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="d-flex flex-column align-items-center">
                                    <img class="rounded-top w-100"
                                        style="object-fit: cover;" src="<?php echo CLS_SITE_URL; ?>img/saree/4.jpg"
                                        alt="saree4">
                                    <h2>saree 5</h2>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="d-flex flex-column align-items-center">
                                    <img class="rounded-top w-100"
                                        style="object-fit: cover;" src="<?php echo CLS_SITE_URL; ?>img/saree/7.jpg"
                                        alt="saree7">
                                    <h2>saree 6</h2>
                                </div>
                            </div>

                            <div class="swiper-slide">
                                <div class="d-flex flex-column align-items-center">
                                    <img class="rounded-top w-100"
                                        style="object-fit: cover;" src="<?php echo CLS_SITE_URL; ?>img/saree/2.jpg"
                                        alt="saree2">
                                    <h2>saree 7</h2>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Collection End -->
    <?php 
        include 'footer.php';
    ?>
  
    

</body>

</html>