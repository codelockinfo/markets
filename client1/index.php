<?php
include 'header.php';
?>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <?php
    include 'navbar.php';
    ?>

    <!-- on load popup box strat  -->
    <div id="modalOverlay">
        <div class="modalPopup bg-white p-3 p-md-5">
            <div class="headerBar bg-white m-0 text-center w-100">
                <img style="height: 90px;" class="z-index-3" src="<?php echo CLS_SITE_URL; ?>img/shop_1/logo1.png" alt="logo1">
            </div>
            <div class="modalContent text-center">
                <p class="text-capitalize m-0">are you looking for Wholesalers?</p>
                <p class="text-capitalize ">in surat (the texttile hub)</p>
                <div class="justify-content-center d-flex  mt-3">
                    <a href="#" id="yesButton"><button class="btn btn-primary me-1 fs-6 px-5">Yes</button></a>
                    <a href="https://www.google.com/"><button class="btn btn-dark ms-1  fs-6 px-5">No</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- on load popup box end  -->

    <!--p class="returnToProfile"><a href="https://codepen.io/ptamaro" target="_parent">Return to profile</a></p-->

    <!-- Hero Start -->
    <section class="banner_section">
        <div class="container-fluid bg-light ps-0 pe-0 mt-0 w-auto" >
            <div id="getdata">
            <!-- <img class="banner img-fluid" src="<?php echo CLS_SITE_URL; ?>img/home-banner.webp" alt="home-banner"> -->
            <!-- <img class="banner_2" src="<?php echo CLS_SITE_URL; ?>img/banner-mobile.jpg" alt="banner-mobile"> -->
            </div>
            <div class=" banner_content">
                <div class="banner-content-main container">
                    <div class="row bannerContent">
                        <!-- <div class="col-sm-4 mt-2 mt-sm-0">
                            <div class="banner-main-box p-1 wow bounceInUp">
                                <div class="banner-content-box py-3 w-100 text-center rounded bg-dark-opacity">
                                    <h3 class="text-white count m-0">346866</h3>
                                    <p class="text-capitalize m-0 text-white">verified markets</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-4 mt-2 mt-sm-0 wow bounceInUp">
                            <div class="banner-main-box p-1">
                                <div class="banner-content-box py-3 w-100 text-center rounded bg-dark-opacity">
                                    <h3 class="text-white  m-0 count">382936</h3>
                                    <p class="text-capitalize m-0 text-white">products</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-sm-4 mt-2 mt-sm-0 wow bounceInUp">
                            <div class="banner-main-box p-1">
                                <div class="banner-content-box py-3 w-100 text-center rounded bg-dark-opacity">
                                    <h3 class="text-white  m-0 count">519407</h3>
                                    <p class="text-capitalize m-0 text-white">categories</p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- famous market Start -->
    <div class="container-fluid famous pt-5 pt-md-6">
        <div class="container">
            <div class="famousMarketTitle"></div>       
            <div class="row2" id="getmarket">               
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
                </div> -->
                <!-- <div class="col-lg-3 col-md-6 col-6  wow bounceInUp p-1  p-md-2" data-wow-delay="0.3s">
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
                </div> -->
                <!-- <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1  p-md-2" data-wow-delay="0.5s">
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
                </div> -->
                <!-- <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1  p-md-2" data-wow-delay="0.7s">
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
                </div> -->
                <!-- <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1  p-md-2" data-wow-delay="0.1s">
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
                </div> -->
                <!-- <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1  p-md-2" data-wow-delay="0.3s">
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
                </div> -->
                <!-- <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1  p-md-2" data-wow-delay="0.5s">
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
                </div> -->
                <!-- <div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1  p-md-2" data-wow-delay="0.7s">
                    <div class="bg-light rounded famous-item">
                        <div class="famous-content d-flex align-items-center justify-content-center px-2 py-3 py-md-5">
                            <div class="famous-content-icon text-center">
                                <a href="<?php echo CLS_SITE_URL ?>collection2.php" class="mb-3 text-capitalize h4 text-second">Bal Krishna fabrics</a>
                                <p class="mb-4">Elegance Redefined</p>
                                <div class="famous-img rounded-circle">
                                    <a href="<?php echo CLS_SITE_URL ?>collection2.php"><img class=" img-fluid2" src="<?php echo CLS_SITE_URL; ?>img/shop_1/shop8.jpg" alt="shop8"></a>
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
             <div class="famousMarketButton"></div>
        </div>
    </div>
    <!-- famous market End -->

    <!-- Events brouse by category Start -->
    <div class="container-fluid event pt-5 pt-md-6">
        <div class="container">
            <div class="browseCategoryTitle">
            </div>
            <div class="tabbable">
                <ul class="mb-5 nav nav-pills nav-justified form-tabs hidden-xs wow bounceInUp browseCategoryTab">
                    <!-- <li class="tab-selector ">
                        <a class="d-flex mx-1 py-2 border border-primary  rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                            <span class="fw-bold" style="width: 150px;">Kurtis</span>
                        </a>
                    </li>
                    <li class="tab-selector">
                        <a class="d-flex py-2 mx-1 border border-primary  rounded-pill" data-bs-toggle="pill" href="#tab-2">
                            <span class="fw-bold" style="width: 150px;">Sarees</span>
                        </a>
                    </li>
                    <li class="tab-selector">
                        <a class="d-flex mx-1 py-2 border border-primary rounded-pill" data-bs-toggle="pill" href="#tab-3">
                            <span class="fw-bold" style="width: 150px;">Wedding cloths</span>
                        </a>
                    </li>
                    <li class="tab-selector">
                        <a class="d-flex mx-1 py-2 border border-primary  rounded-pill" data-bs-toggle="pill" href="#tab-4">
                            <span class="fw-bold" style="width: 150px;">Tops</span>
                        </a>
                    </li>
                    <li class="tab-selector">
                        <a class="d-flex mx-1 py-2 border border-primary rounded-pill" data-bs-toggle="pill" href="#tab-5">
                            <span class="fw-bold" style="width: 150px;">Skirts</span>
                        </a>
                    </li> -->
                </ul>
                <div class="dropdown mb-4">
                    <button class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </button>
                    <ul class="dropdown-menu w-100 browsecategorytab-mobile">
                        <li><a class="dropdown-item nav-link d-none" data-bs-toggle="pill" href="#tab-1"></a></li>
                        <li><a class="dropdown-item nav-link d-none" data-bs-toggle="pill" href="#tab-2"></a></li>
                        <li><a class="dropdown-item nav-link d-none" data-bs-toggle="pill" href="#tab-3"></a></li>
                        <li><a class="dropdown-item nav-link d-none" data-bs-toggle="pill" href="#tab-4"></a></li>
                        <li><a class="dropdown-item nav-link d-none" data-bs-toggle="pill" href="#tab-5"></a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show p-0 active" id="tab-1">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4" id="producttab-1" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show " id="tab-2">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4" id="producttab-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show p-0" id="tab-3">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4" id="producttab-3">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show p-0" id="tab-4">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4" id="producttab-4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show p-0" id="tab-5">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4" id="producttab-5">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="browseCategoryButton">
            </div>   
        </div>
    </div>
    <!-- Events End -->

    <!-- Offer section  -->
    <section class="offer container-fluid pt-5 pt-md-6">
        <div class="container">
            <div class="offersTitle"></div>    
            <div class="row" id="getoffer">
                <!-- <div class="col-12 col-md-6  wow bounceInUp"><a href="#"><img src="<?php echo CLS_SITE_URL; ?>img/offer1.jpg" class="img-fluid" alt="img-fluid"></a></div>
                <div class="col-12 col-md-6  wow bounceInUp"><a href="#"><img src="<?php echo CLS_SITE_URL; ?>img/offer2.jpg" class="img-fluid mt-4 mt-md-0" alt="img-fluid"></a></div>
                <div class="col-12 col-md-6  wow bounceInUp"><a href="#"><img src="<?php echo CLS_SITE_URL; ?>img/offer3.png" class="img-fluid mt-4" alt="img-fluid"></a></div>
                <div class="col-12 col-md-6  wow bounceInUp"><a href="#"><img src="<?php echo CLS_SITE_URL; ?>img/offer4.png" class="img-fluid mt-4" alt="img-fluid"></a></div> -->
            </div>
        </div>
    </section>
    <!-- Offer section end  -->

    <!-- paragraph  start-->
    <section class="paragraph pt-5 pt-md-6 container-fluid ">
        <div class="container" id="getparagraph">

            <!-- <h5 class="fw-bold text-primary">Sarees Manufacturers in Surat</h5>
            <p class="fs-7">Discover a wide range of Indian sarees from top manufacturers in Surat, the textile hub of India. Our platform connects you with the best saree producers known for their quality craftsmanship and exquisite designs. Whether you're looking for traditional silk sarees, trendy georgette sarees, or elegant chiffon sarees, you'll find a vast selection to suit every need. </p>
            <h5 class="fw-bold text-primary">Designer Lehengas Suppliers in India </h5>
            <p class="fs-7">Explore our extensive network of designer lehenga suppliers across India. We bring you the finest collection of lehengas, perfect for weddings, festivals, and special occasions. Our suppliers offer a variety of styles, including bridal lehengas, party-wear lehengas, and contemporary lehenga cholis, crafted with attention to detail and the latest fashion trends.
            </p>
            <p class="fs-7">Connect with leading designer lehenga exporters who cater to international markets. Our platform provides access to exporters renowned for their high-quality fabrics and stunning designs. Whether you are looking to import traditional or modern lehengas, our exporters ensure timely delivery and competitive pricing.
            </p>
            <ul class="content-box ms-5 list-unstyled">
                <li class="div mt-2">
                    <p class="d-inline"><strong class="text-primary fw-bold">Kurtis :</strong>Find the best kurtis from reliable suppliers across India. Our platform features a diverse range of kurtis, from everyday casual wear to festive and formal designs. Browse through a variety of fabrics, patterns, and styles to meet the demands of your customers.
                    </p>
                </li>
                <li class="div mt-2">
                    <p class="d-inline"><strong class="text-primary fw-bold">Dresses :</strong>Browse through our collection of stylish and trendy dresses from top manufacturers and suppliers. We offer a variety of dresses, including anarkalis, maxi dresses, and gowns,suitable for different occasions. Our dresses are designed to cater to the latest fashion trends and customer preferences.
                    </p>
                </li>
                <li class="div mt-2">
                    <p class="d-inline"><strong class="text-primary fw-bold">Dupattas :</strong>Enhance your inventory with beautifully crafted dupattas available on our platform. Our suppliers offer a wide range of dupattas in various fabrics, including silk, cotton, chiffon, and georgette. From embroidered to printed dupattas, find the perfect pieces to complement your sarees and suits.</p>
                </li>
                <li class="div mt-2">
                    <p class="d-inline"><strong class="text-primary fw-bold">Palazzo Pants :</strong>Expand your collection with fashionable palazzo pants from trusted manufacturers. Our platform provides access to a variety of palazzo pants, ideal for casual and formal wear.</p>
                </li> -->
        </div>
        </div>
    </section>
    <!-- paragraph end -->
    <!-- video section start  -->
    <section class="video pt-5 pt-md-6 container-fluid">
        <div class="container">
            <div class="videoTitle"></div>
            <div class="swiper videoSwiper">
                <div class="swiper-wrapper" id="getvideo">
                    <!-- <div class="swiper-slide"><video class="w-100 rounded h-100" autoplay muted loop>
                            <source src="img/IMG_1924.MOV">
                        </video></div>
                    <div class="swiper-slide"><video class="w-100 rounded h-100" autoplay muted loop>
                            <source src="img/IMG_6892.MP4">
                        </video></div>
                    <div class="swiper-slide"><video class="w-100 rounded h-100" autoplay muted loop>
                            <source src="img/IMG_1924.MOV">
                        </video></div>
                    <div class="swiper-slide"><video class="w-100 rounded h-100" autoplay muted loop>
                            <source src="img/IMG_6892.MP4">
                        </video></div>
                    <div class="swiper-slide"><video class="w-100 rounded h-100" autoplay muted loop>
                            <source src="img/IMG_1924.MOV">
                        </video></div> -->
                    <!-- <div class="swiper-slide"><video class="w-100 rounded h-100" autoplay muted loop>
                            <source src="img/IMG_6892.MP4">
                        </video></div> -->
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
           <div class="videoButton"></div>
        </div>
    </section>
    <!-- video section end -->
    <!-- FAQ Start -->
    <div class="w-100 d-flex justify-content-center align-items-center h-auto pt-5 pt-md-6 container-fluid faq">
        <div class="mainContent container d-flex flex-column justify-content-center align-items-center gap-3">
        <div class="faqTitle"></div>
        <div class="row align-items-center">
                <div class="content_1 col-12 col-lg-8 col-md-6">
                    <div class="faqContent">
                       
                    </div>
                    <div>
                        <div class="accordion" id="accordionExample">

                            <!-- <div class="accordion-item border">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h6 class="m-0">How do I register my business on marketsearch?</h6>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        To register, click on the "Register your shop" button on the homepage, fill in your business details, and submit the registration form.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item border">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h6 class="m-0">Who can register on marketsearch?</h6>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        Fabric wholesalers and textile shop owners are eligible to register on our platform.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item border">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <h6 class="m-0">Is there a fee to register my business?</h6>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        No, registering your business on marketsearch is completely free.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item border">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <h6 class="m-0">How can I update my business information?</h6>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        After logging in, go to your account dashboard and click on "Edit Profile" to update your business information.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item border">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <h6 class="m-0">Can I list multiple businesses under one account?</h6>
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        No, each business must be registered with a separate account.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item border">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        <h6 class="m-0">How do I contact customer support?</h6>
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        You can contact customer support by emailing [codelockinfo@gmail.com] or using the contact form available on our website.
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="content_2 col-12 col-lg-4 col-md-6 faqImage">
                
                </div>
            </div>
        </div>
    </div>
    <div class="allfaq">
        <a href="all-faq.php" class="d-flex justify-content-center wow bounceInUp" style="visibility: visible; animation-name: bounceInUp;">
            <button class="btn btn-primary text-capitalize px-5 mt-4 text-center">All FAQ</button>
        </a>
    </div>
    <!-- FAQ End -->

    <!-- Book Us Start -->
    <div class="container-fluid contact pt-3  wow bounceInUp" data-wow-delay="0.1s">
        <div class="container  ">
            <div class="d-flex flex-column align-items-center mb-3">
                <h1>Contact us</h1>
            </div>
            <div class="row g-0">
                <div class="col-12">
                    <div class="border rounded-3 bg-light py-5 px-4">
                        <div class="row g-4 form col-12 text- mx-auto col-md-9">
                            <div class="col-12 col-md-6">
                                <input type="text" id="firstName" class="form-control p-2" placeholder=" Name" required>
                                <span class="nameError"></span>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="email" id="email" class="form-control p-2" placeholder="Enter Your Email" required>
                                <span class="emailError"></span>
                            </div>
                            <div class="col-12">
                                <textarea name="" id="query" class="form-control  " placeholder=" Query" required></textarea>
                                <span class="query"></span>
                            </div>
                            <div class="col-12 text-center ">
                                <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill submit">Submit Now</button>
                                <span class="done d-block"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Book Us End -->
    <!-- testimonial section start -->
    <section class="testimonial pt-5 pt-md-6 container-fluid">
        <div class="container">
            <div class="marketReviewTitle">
            </div>
            <div class="swiper testimonalSwiper" >
                <div class="swiper-wrapper"  id="getreview">
                    
                    <!-- <div class="swiper-slide ">
                        <div class="testimonial-main-box rounded border rounded-3 p-2  bg-light mt-2 py-5">
                            <div class="testi-img-box overflow-hidden ">
                                <a href="#"><img src="img/shop_1/shop1.jpg" class=" img-fluid mx-auto  rounded-circle" alt="shop1"></a>
                            </div>
                            <p class="mt-3 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, ab provident. Dolorum distinctio beatae molestias nam deserunt expedita quis dolorem quaerat.</p>
                            <h4 class="mt-3"> Aarohi Fation</h4>
                            <div class="d-flex justify-content-center mt-2">
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                <h6>(4.5)</h6>
                            </div>
                            <div class="coma-box rounded">
                                <i class="fa-solid fa-quote-right text-primary fs-2"></i>
                            </div>
                        </div>
                    </div> -->
                    <!-- <div class="swiper-slide ">
                        <div class="testimonial-main-box rounded border rounded-3 p-2  bg-light mt-2 py-5">
                            <div class="testi-img-box overflow-hidden ">    
                                <a href="#"><img src="img/shop_1/shop2.jpg" class=" img-fluid mx-auto  rounded-circle" alt="shop2"></a>
                            </div>
                            <p class="mt-3 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, ab provident. Dolorum distinctio beatae molestias nam deserunt expedita quis dolorem quaerat.</p>
                            <h4 class="mt-3"> Kavya Fabrics</h4>
                            <div class="d-flex justify-content-center mt-2">
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                <h6>(4.5)</h6>
                            </div>
                            <div class="coma-box rounded">
                                <i class="fa-solid fa-quote-right text-primary fs-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="testimonial-main-box rounded border rounded-3 p-2  bg-light mt-2 py-5">
                            <div class="testi-img-box overflow-hidden ">
                                <a href="#"><img src="img/shop_1/shop3.jpg" class=" img-fluid mx-auto  rounded-circle" alt="shop3"></a>
                            </div>
                            <p class="mt-3 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, ab provident. Dolorum distinctio beatae molestias nam deserunt expedita quis dolorem quaerat.</p>
                            <h4 class="mt-3"> Global Textile</h4>
                            <div class="d-flex justify-content-center mt-2">
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                <h6>(4.5)</h6>
                            </div>
                            <div class="coma-box rounded">
                                <i class="fa-solid fa-quote-right text-primary fs-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="testimonial-main-box rounded border rounded-3 p-2  bg-light mt-2 py-5">
                            <div class="testi-img-box overflow-hidden ">
                                <a href="#"><img src="img/shop_1/shop4.jpg" class=" img-fluid mx-auto  rounded-circle" alt="shop4"></a>
                            </div>
                            <p class="mt-3 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, ab provident. Dolorum distinctio beatae molestias nam deserunt expedita quis dolorem quaerat.</p>
                            <h4 class="mt-3">Krishna Textile</h4>
                            <div class="d-flex justify-content-center mt-2">
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                <h6>(4.5)</h6>
                            </div>
                            <div class="coma-box rounded">
                                <i class="fa-solid fa-quote-right text-primary fs-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="testimonial-main-box rounded border rounded-3 p-2  bg-light mt-2 py-5">
                            <div class="testi-img-box overflow-hidden ">
                                <a href="#"><img src="img/shop_1/shop5.jpg" class=" img-fluid mx-auto  rounded-circle" alt="shop5"></a>
                            </div>
                            <p class="mt-3 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, ab provident. Dolorum distinctio beatae molestias nam deserunt expedita quis dolorem quaerat.</p>
                            <h4 class="mt-3">Jay Ambe Fabrics</h4>
                            <div class="d-flex justify-content-center mt-2">
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                <h6>(4.5)</h6>
                            </div>
                            <div class="coma-box rounded">
                                <i class="fa-solid fa-quote-right text-primary fs-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="testimonial-main-box rounded border rounded-3 p-2  bg-light mt-2 py-5">
                            <div class="testi-img-box overflow-hidden ">
                                <a href="#"><img src="img/shop_1/shop6.jpg" class=" img-fluid mx-auto  rounded-circle" alt="shop6"></a>
                            </div>
                            <p class="mt-3 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, ab provident. Dolorum distinctio beatae molestias nam deserunt expedita quis dolorem quaerat.</p>
                            <h4 class="mt-3">KS textile</h4>
                            <div class="d-flex justify-content-center mt-2">
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                <h6>(4.5)</h6>
                            </div>
                            <div class="coma-box rounded">
                                <i class="fa-solid fa-quote-right text-primary fs-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="testimonial-main-box rounded border rounded-3 p-2  bg-light mt-2 py-5">
                            <div class="testi-img-box overflow-hidden ">
                                <a href="#"><img src="img/shop_1/logo (1).png" class=" img-fluid mx-auto  rounded-circle" alt="logo (1)"></a>
                            </div>
                            <p class="mt-3 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, ab provident. Dolorum distinctio beatae molestias nam deserunt expedita quis dolorem quaerat.</p>
                            <h4 class="mt-3">Rajhans Textile</h4>
                            <div class="d-flex justify-content-center mt-2">
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                <h6>(4.5)</h6>
                            </div>
                            <div class="coma-box rounded">
                                <i class="fa-solid fa-quote-right text-primary fs-2"></i>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide ">
                        <div class="testimonial-main-box rounded border rounded-3 p-2  bg-light mt-2 py-5">
                            <div class="testi-img-box overflow-hidden ">
                                <a href="#"><img src="img/shop_1/shop8.jpg" class=" img-fluid mx-auto  rounded-circle" alt="shop8"></a>
                            </div>
                            <p class="mt-3 mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, ab provident. Dolorum distinctio beatae molestias nam deserunt expedita quis dolorem quaerat.</p>
                            <h4 class="mt-3">Bal Krishna Fabrics</h4>
                            <div class="d-flex justify-content-center mt-2">
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star text-primary"></i>
                                <i class="fa-solid fa-star-half-stroke text-primary"></i>
                                <h6>(4.5)</h6>
                            </div>
                            <div class="coma-box rounded">
                                <i class="fa-solid fa-quote-right text-primary fs-2"></i>
                            </div>
                        </div>
                    </div> -->

                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
    <!-- testimonial section end -->
    <?php
    include 'footer.php';
    ?>

</body>

</html>
<script type="text/javascript"> 
console.log("bannerlatest LIST");
famousmarket();
latestbanner();
offersshow();
paragraphs();
// videos();
// FAQshow();
// reviewshow();
// productshowclientside();
// marketlistshowclientside();
// marketlist2showclientside();
// marketlist3showclientside();
</script>