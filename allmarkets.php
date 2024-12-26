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
            <h1 class="display-1 mb-4">All markets in Surat</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="<?php echo CLS_SITE_URL ?>index.php">Home</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">All markets in Surat</li>
            </ol>
        </div>
    </div>
    <!-- Hero End -->
    <!-- filter and latest section start -->
    <section class="co_filter pt-4  container-fluid">
        <div class="container">
            <div class="co_box d-block d-sm-flex justify-content-end align-items-center">
                <div class="d-flex order-1 order-sm-2 justify-content-end">
                    <select class="form-select" aria-label="Default select example">
                        <option value="latestmarket">Latest Markets</option>
                        <option value="category">Category</option>
                    </select>
                </div>
                <div class="w-auto  me-sm-5 order-1 ">
                    <div class="range-slider">
                        <span class="rangeValues"></span>
                        <input value="100" min="100" max="1000" step="200" type="range">
                        <input value="1000" min="100" max="1000" step="200" type="range">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- filter and latest section end -->
    <!-- Collection2 Start -->
    <div class="container-fluid famous pt-5 pt-md-6">
        <div class="container">
            <div class="row2 " id="allmarketdata">
                <!-- <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1 p-md-2" data-wow-delay="0.1s">
                    <div class="bg-light rounded famous-item">
                        <div class="famous-content d-flex align-items-center justify-content-center px-2 py-3 py-md-5">
                            <div class="famous-content-icon text-center">
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="mb-3 text-capitalize h4 text-second">Arohi-Woman Fashion</a>
                                <p class="mb-4">Embrace Tradition, Celebrate Style.</p>
                                <div class="famous-img rounded-circle">
                                    <a href="<?php echo CLS_SITE_URL ?>collection2.php"><img class="img-fluid2" src="<?php echo CLS_SITE_URL; ?>img/shop_1/shop1.jpg" alt="shop1">
                                </div></a>
                                <div class="d-flex justify-content-center mt-2">
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                    <h6 class="rate-icon ">(4.5)</h6>
                                </div>
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="btn btn-primary mt-3">View Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1 p-md-2" data-wow-delay="0.3s">
                    <div class="bg-light rounded famous-item">
                        <div class="famous-content d-flex align-items-center justify-content-center px-2 py-3 py-md-5">
                            <div class="famous-content-icon text-center">
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="mb-3 text-capitalize h4 text-second">Kavya Fabrics</a>
                                <p class="mb-4">Where Heritage Meets Haute Couture</p>
                                <div class="famous-img rounded-circle">
                                    <a href="<?php echo CLS_SITE_URL ?>collection2.php"> <img class=" img-fluid2" src="<?php echo CLS_SITE_URL; ?>img/shop_1/shop2.jpg" alt="shop2"></a>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                    <i class="fa-regular fa-star text-primary"></i>
                                    <h6 class=rate-icon>(3.5)</h6>
                                </div>
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="btn btn-primary mt-3">View Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1  p-md-2" data-wow-delay="0.5s">
                    <div class="bg-light rounded famous-item">
                        <div class="famous-content d-flex align-items-center justify-content-center px-2 py-3 py-md-5">
                            <div class="famous-content-icon text-center">
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="mb-3 h4 text-capitalize text-second">Global textile</a>
                                <p class="mb-4">Timeless Elegance in Every Thread</p>
                                <div class="famous-img rounded-circle">
                                    <a href="<?php echo CLS_SITE_URL ?>collection2.php"><img class=" img-fluid2" src="<?php echo CLS_SITE_URL; ?>img/shop_1/shop3.jpg" alt="shop3"></a>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <h6 class=rate-icon>(5)</h6>
                                </div>
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="btn btn-primary mt-3">View Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1  p-md-2" data-wow-delay="0.7s">
                    <div class="bg-light rounded famous-item">
                        <div class="famous-content d-flex align-items-center justify-content-center px-2 py-3 py-md-5">
                            <div class="famous-content-icon text-center">
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="mb-3 h4 text-capitalize text-second">krishna textile</a>
                                <p class="mb-4">Reviving Roots with Every Stitch</p>
                                <div class="famous-img rounded-circle">
                                    <a href="<?php echo CLS_SITE_URL ?>collection2.php"><img class=" img-fluid2" src="<?php echo CLS_SITE_URL; ?>img/shop_1/shop4.jpg" alt="shop4"></a>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                    <i class="fa-regular fa-star text-primary"></i>
                                    <h6 class=rate-icon>(3.5)</h6>
                                </div>
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="btn btn-primary mt-3">View Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1  p-md-2" data-wow-delay="0.1s">
                    <div class="bg-light rounded famous-item">
                        <div class="famous-content d-flex align-items-center justify-content-center px-2 py-3 py-md-5">
                            <div class="famous-content-icon  text-center">
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="mb-3 h4 text-capitalize text-second">Jay Ambe Fabrics</a>
                                <p class="mb-4">Ethereal Elegance, Ethnic Excellence</p>
                                <div class="famous-img rounded-circle">
                                    <a href="<?php echo CLS_SITE_URL ?>collection2.php"> <img class=" img-fluid2" src="<?php echo CLS_SITE_URL; ?>img/shop_1/shop5.jpg" alt="shop5"></a>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                    <h6 class=rate-icon>(4.5)</h6>
                                </div>
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="btn btn-primary mt-3">View Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1  p-md-2" data-wow-delay="0.3s">
                    <div class="bg-light rounded famous-item">
                        <div class="famous-content d-flex align-items-center justify-content-center px-2 py-3 py-md-5">
                            <div class="famous-content-icon text-center">
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="mb-3 h4 text-capitalize text-second">KS textile</a>
                                <p class="mb-4">Draping You in Cultural Splendor</p>
                                <div class="famous-img rounded-circle">
                                    <a href="<?php echo CLS_SITE_URL ?>collection2.php"><img class=" img-fluid2" src="<?php echo CLS_SITE_URL; ?>img/shop_1/shop6.jpg" alt="shop6"></a>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <h6 class=rate-icon>(5)</h6>
                                </div>
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="btn btn-primary mt-3">View Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1  p-md-2" data-wow-delay="0.5s">
                    <div class="bg-light rounded famous-item">
                        <div class="famous-content d-flex align-items-center justify-content-center px-2 py-3 py-md-5">
                            <div class="famous-content-icon text-center">
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="mb-3 h4 text-capitalize text-second">Rajhans textile</a>
                                <p class="mb-4">Weaving Traditions, Crafting Dreams</p>
                                <div class="famous-img rounded-circle">
                                    <a href="<?php echo CLS_SITE_URL ?>collection2.php"> <img class=" img-fluid2" src="<?php echo CLS_SITE_URL; ?>img/shop_1/logo (1).png" alt="logo (1)"></a>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                    <h6 class=rate-icon>(4.5)</h6>
                                </div>
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="btn btn-primary mt-3">View Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1  p-md-2" data-wow-delay="0.7s">
                    <div class="bg-light rounded famous-item">
                        <div class="famous-content d-flex align-items-center justify-content-center px-2 py-3 py-md-5">
                            <div class="famous-content-icon text-center">
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="mb-3 text-capitalize h4 text-second">Bal Krishna fabrics</a>
                                <p class="mb-4">Elegance Redefined</p>
                                <div class="famous-img rounded-circle">
                                    <a href="<?php echo CLS_SITE_URL ?>collection2.php"><img class=" img-fluid2" src="<?php echo CLS_SITE_URL; ?>img/shop_1/shop8.jpg   " alt="shop8"></a>
                                </div>
                                <div class="d-flex justify-content-center mt-2">
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star text-primary"></i>
                                    <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                    <i class="fa-regular fa-star text-primary"></i>
                                    <h6 class=rate-icon>(3.5)</h6>
                                </div>
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="btn btn-primary mt-3">View Products</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <a href="<?php echo CLS_SITE_URL ?>famousmarket.php" class="d-flex justify-content-center wow bounceInUp"><button class="btn btn-primary text-capitalize px-5 mt-4 text-center">view all markets</button></a>
        </div>
    </div>
    <!-- Collection2 End -->
    <?php
    include 'footer.php';
    ?>




</body>

</html>
<script type="text/javascript"> 
console.log("bannerlatest LIST");
allmarkets();
marketlistshowclientside();
marketlist2showclientside();
marketlist3showclientside();
</script>