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


    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control bg-transparent p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->

    <!-- Hero Start -->
    <div class="container-fluid bg-light py-5 mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1 mb-4">Product page</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="<?php echo CLS_SITE_URL ?>index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Product page</li>
            </ol>
        </div>
    </div>
    <!-- Hero End -->

    <!-- product details section start -->
    <section class="product pt-5 pt-md-6 container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="product-image-carousels">
                        <!-- Thumbnail track carousel -->
                        <div class="thumbnails-slider swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide thumbnail-button" aria-current="true"><img src="<?php echo CLS_SITE_URL; ?>img/k1.jpg" alt=""></div>
                                <div class="swiper-slide thumbnail-button"><img src="<?php echo CLS_SITE_URL; ?>img/k2.jpg" alt=""></div>
                                <div class="swiper-slide thumbnail-button"><img src="<?php echo CLS_SITE_URL; ?>img/k3.jpg" alt=""></div>
                                <div class="swiper-slide thumbnail-button"><img src="<?php echo CLS_SITE_URL; ?>img/k4.jpg" alt=""></div>
                                <div class="swiper-slide thumbnail-button"><img src="<?php echo CLS_SITE_URL; ?>img/k5.jpg" alt=""> </div>
                            </div>
                        </div>

                        <!-- Main image carousel -->
                        <div class="main-image-slider swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide image-link">
                                    <img src="<?php echo CLS_SITE_URL; ?>img/k1.jpg" alt="">
                                </div>
                                <div class="swiper-slide image-link">
                                    <img src="<?php echo CLS_SITE_URL; ?>img/k2.jpg" alt="">
                                </div>
                                <div class="swiper-slide image-link">
                                    <img src="<?php echo CLS_SITE_URL; ?>img/k3.jpg" alt="">
                                </div>
                                <div class="swiper-slide image-link">
                                    <img src="<?php echo CLS_SITE_URL; ?>img/k4.jpg" alt="">
                                </div>
                                <div class="swiper-slide image-link">
                                    <img src="<?php echo CLS_SITE_URL; ?>img/k5.jpg" alt="">
                                </div>
                            </div>

                            <!-- Add Navigation -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <h5 class="fs-2">Women Straight Block Printed Kurta and Pant Set with Dupatta</h5>
                    <h4><span class="fs-6 text-black-50">Price :</span>100rs-300rs</h4>
                    <p>Type:Kurti</p>
                    <p class="fs-7">N123h992</p>
                    <p class="fs-6 fw-bold">Ailable in store</p>
                    <div class="discription_tab">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Contact</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Description</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Atque inventore doloribus quibusdam cumque odit optio pariatur facilis minima laboriosam nemo labore placeat perspiciatis mollitia omnis rem, velit ut earum impedit debitis iste ad unde. Architecto, earum incidunt. Dicta doloribus tempore corporis minima quos ut sequi cum nostrum optio neque quidem provident magni accusantium officiis.Architecto, earum incidunt. Dicta doloribus tempore corporis minima quos ut sequi cum nostrum optio neque quidem provident magni accusantium officiis.</div>
                            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <p><a href="#" class="text-body"><i class="fa fa-map-marker-alt text-primary me-2"></i> 2020, Silver business point, near VIP circle, Digital valley, Uttran, Surat 395006</a></p>
                                <p><a href="tel:7600464414" class="text-body"><i class="fa fa-phone-alt text-primary me-2"></i>+91 7600464414</a></p>
                                <p><a href="mailto:codelockinfo@gmail.com" class="text-body"><i class="fas fa-envelope text-primary me-2"></i> codelockinfo@gmail.com</a></p>
                                <p><a href="#" class="text-body"><i class="fa fa-clock text-primary me-2"></i>
                                        12/7 Hours Service</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product details section end -->

    <!-- related product start  -->
    <section class="related-product mt-6 container-fluid">
        <div class="container">
            <div class="swiper relatedslider">
                <div class="swiper-wrapper">
                    <div class="col-12 col-md-6 col-lg-4 mt-4 swiper-slide">
                        <div class="market_list_mian_box border rounded">
                            <div class="market-head border-bottom">
                                <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                            </div>
                            <div class="market-content p-3">
                                <div class="d-flex justify-content-between pb-2 ">
                                    <div class="col-3">
                                        <img src="<?php echo CLS_SITE_URL; ?>img/kurti/1.jpg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div class="col-6">
                                        <div class=" ms-4">
                                            <h6 class="fw-normal d-inline text-primary fs-6 ">Rs:</h6>
                                            <p class=" ms-1 d-inline fs-6">100/Pcs</p>
                                            <p class="fs-7 justify mt-2">Lorem ipsum dolor sit amet consectetur. Lorem, ipsum dolor.</p>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="m-img-box p-1 border rounded  w-50 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/1.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/1.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/1.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="market-footer  border-top">
                                    <div class="market-name">
                                        <div class="d-flex align-items-center">
                                            <div class="m-icon">
                                                <i class="fa-solid fa-shield-halved fs-4  text-primary "></i>
                                            </div>
                                            <div class="m-name mt-2 ms-2">
                                                <h4 class="fs-5 p-0 m-0 text-second">L T fabrics</h4>
                                                <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <button class="btn btn-primary me-1 fs-6">Contact Seller</button>
                                    <button class="btn btn-dark ms-1 fs-6">Send Inquriy</button>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary w-100 mx-auto fs-6">Catelog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-4 swiper-slide">
                        <div class="market_list_mian_box border rounded">
                            <div class="market-head border-bottom">
                                <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                            </div>
                            <div class="market-content p-3">
                                <div class="d-flex justify-content-between pb-2 ">
                                    <div class="col-3">
                                        <img src="<?php echo CLS_SITE_URL; ?>img/kurti/2.jpg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div class="col-6">
                                        <div class=" ms-4">
                                            <h6 class="fw-normal d-inline text-primary fs-6 ">Rs:</h6>
                                            <p class=" ms-1 d-inline fs-6">100/Pcs</p>
                                            <p class="fs-7 justify mt-2">Lorem ipsum dolor sit amet consectetur. Lorem, ipsum dolor.</p>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="m-img-box p-1 border rounded  w-50 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/2.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/2.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/2.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="market-footer  border-top">
                                    <div class="market-name">
                                        <div class="d-flex align-items-center">
                                            <div class="m-icon">
                                                <i class="fa-solid fa-shield-halved fs-4  text-primary "></i>
                                            </div>
                                            <div class="m-name mt-2 ms-2">
                                                <h4 class="fs-5 p-0 m-0 text-second">L T fabrics</h4>
                                                <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <button class="btn btn-primary me-1 fs-6">Contact Seller</button>
                                    <button class="btn btn-dark ms-1 fs-6">Send Inquriy</button>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary w-100 mx-auto fs-6">Catelog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-4 swiper-slide">
                        <div class="market_list_mian_box border rounded">
                            <div class="market-head border-bottom">
                                <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                            </div>
                            <div class="market-content p-3">
                                <div class="d-flex justify-content-between pb-2 ">
                                    <div class="col-3">
                                        <img src="<?php echo CLS_SITE_URL; ?>img/kurti/3.jpg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div class="col-6">
                                        <div class=" ms-4">
                                            <h6 class="fw-normal d-inline text-primary fs-6 ">Rs:</h6>
                                            <p class=" ms-1 d-inline fs-6">100/Pcs</p>
                                            <p class="fs-7 justify mt-2">Lorem ipsum dolor sit amet consectetur. Lorem, ipsum dolor.</p>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="m-img-box p-1 border rounded  w-50 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/3.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/3.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/3.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="market-footer  border-top">
                                    <div class="market-name">
                                        <div class="d-flex align-items-center">
                                            <div class="m-icon">
                                                <i class="fa-solid fa-shield-halved fs-4  text-primary "></i>
                                            </div>
                                            <div class="m-name mt-2 ms-2">
                                                <h4 class="fs-5 p-0 m-0 text-second">L T fabrics</h4>
                                                <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <button class="btn btn-primary me-1 fs-6">Contact Seller</button>
                                    <button class="btn btn-dark ms-1 fs-6">Send Inquriy</button>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary w-100 mx-auto fs-6">Catelog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-4 swiper-slide">
                        <div class="market_list_mian_box border rounded">
                            <div class="market-head border-bottom">
                                <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                            </div>
                            <div class="market-content p-3">
                                <div class="d-flex justify-content-between pb-2 ">
                                    <div class="col-3">
                                        <img src="<?php echo CLS_SITE_URL; ?>img/kurti/4.jpg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div class="col-6">
                                        <div class=" ms-4">
                                            <h6 class="fw-normal d-inline text-primary fs-6 ">Rs:</h6>
                                            <p class=" ms-1 d-inline fs-6">100/Pcs</p>
                                            <p class="fs-7 justify mt-2">Lorem ipsum dolor sit amet consectetur. Lorem, ipsum dolor.</p>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="m-img-box p-1 border rounded  w-50 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/4.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/4.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/4.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="market-footer  border-top">
                                    <div class="market-name">
                                        <div class="d-flex align-items-center">
                                            <div class="m-icon">
                                                <i class="fa-solid fa-shield-halved fs-4  text-primary "></i>
                                            </div>
                                            <div class="m-name mt-2 ms-2">
                                                <h4 class="fs-5 p-0 m-0 text-second">L T fabrics</h4>
                                                <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <button class="btn btn-primary me-1 fs-6">Contact Seller</button>
                                    <button class="btn btn-dark ms-1 fs-6">Send Inquriy</button>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary w-100 mx-auto fs-6">Catelog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-4 swiper-slide">
                        <div class="market_list_mian_box border rounded">
                            <div class="market-head border-bottom">
                                <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                            </div>
                            <div class="market-content p-3">
                                <div class="d-flex justify-content-between pb-2 ">
                                    <div class="col-3">
                                        <img src="<?php echo CLS_SITE_URL; ?>img/kurti/5.jpg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div class="col-6">
                                        <div class=" ms-4">
                                            <h6 class="fw-normal d-inline text-primary fs-6 ">Rs:</h6>
                                            <p class=" ms-1 d-inline fs-6">100/Pcs</p>
                                            <p class="fs-7 justify mt-2">Lorem ipsum dolor sit amet consectetur. Lorem, ipsum dolor.</p>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="m-img-box p-1 border rounded  w-50 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/5.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/5.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/5.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="market-footer  border-top">
                                    <div class="market-name">
                                        <div class="d-flex align-items-center">
                                            <div class="m-icon">
                                                <i class="fa-solid fa-shield-halved fs-4  text-primary "></i>
                                            </div>
                                            <div class="m-name mt-2 ms-2">
                                                <h4 class="fs-5 p-0 m-0 text-second">L T fabrics</h4>
                                                <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <button class="btn btn-primary me-1 fs-6">Contact Seller</button>
                                    <button class="btn btn-dark ms-1 fs-6">Send Inquriy</button>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary w-100 mx-auto fs-6">Catelog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-4 swiper-slide">
                        <div class="market_list_mian_box border rounded">
                            <div class="market-head border-bottom">
                                <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                            </div>
                            <div class="market-content p-3">
                                <div class="d-flex justify-content-between pb-2 ">
                                    <div class="col-3">
                                        <img src="<?php echo CLS_SITE_URL; ?>img/kurti/6.jpg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div class="col-6">
                                        <div class=" ms-4">
                                            <h6 class="fw-normal d-inline text-primary fs-6 ">Rs:</h6>
                                            <p class=" ms-1 d-inline fs-6">100/Pcs</p>
                                            <p class="fs-7 justify mt-2">Lorem ipsum dolor sit amet consectetur. Lorem, ipsum dolor.</p>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="m-img-box p-1 border rounded  w-50 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/6.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/6.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/6.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="market-footer  border-top">
                                    <div class="market-name">
                                        <div class="d-flex align-items-center">
                                            <div class="m-icon">
                                                <i class="fa-solid fa-shield-halved fs-4  text-primary "></i>
                                            </div>
                                            <div class="m-name mt-2 ms-2">
                                                <h4 class="fs-5 p-0 m-0 text-second">L T fabrics</h4>
                                                <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <button class="btn btn-primary me-1 fs-6">Contact Seller</button>
                                    <button class="btn btn-dark ms-1 fs-6">Send Inquriy</button>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary w-100 mx-auto fs-6">Catelog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-4 swiper-slide">
                        <div class="market_list_mian_box border rounded">
                            <div class="market-head border-bottom">
                                <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                            </div>
                            <div class="market-content p-3">
                                <div class="d-flex justify-content-between pb-2 ">
                                    <div class="col-3">
                                        <img src="<?php echo CLS_SITE_URL; ?>img/kurti/7.jpg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div class="col-6">
                                        <div class=" ms-4">
                                            <h6 class="fw-normal d-inline text-primary fs-6 ">Rs:</h6>
                                            <p class=" ms-1 d-inline fs-6">100/Pcs</p>
                                            <p class="fs-7 justify mt-2">Lorem ipsum dolor sit amet consectetur. Lorem, ipsum dolor.</p>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="m-img-box p-1 border rounded  w-50 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/7.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/7.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/7.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="market-footer  border-top">
                                    <div class="market-name">
                                        <div class="d-flex align-items-center">
                                            <div class="m-icon">
                                                <i class="fa-solid fa-shield-halved fs-4  text-primary "></i>
                                            </div>
                                            <div class="m-name mt-2 ms-2">
                                                <h4 class="fs-5 p-0 m-0 text-second">L T fabrics</h4>
                                                <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <button class="btn btn-primary me-1 fs-6">Contact Seller</button>
                                    <button class="btn btn-dark ms-1 fs-6">Send Inquriy</button>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary w-100 mx-auto fs-6">Catelog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 mt-4 swiper-slide">
                        <div class="market_list_mian_box border rounded">
                            <div class="market-head border-bottom">
                                <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                            </div>
                            <div class="market-content p-3">
                                <div class="d-flex justify-content-between pb-2 ">
                                    <div class="col-3">
                                        <img src="<?php echo CLS_SITE_URL; ?>img/kurti/8.jpg" class="img-fluid rounded" alt="">
                                    </div>
                                    <div class="col-6">
                                        <div class=" ms-4">
                                            <h6 class="fw-normal d-inline text-primary fs-6 ">Rs:</h6>
                                            <p class=" ms-1 d-inline fs-6">100/Pcs</p>
                                            <p class="fs-7 justify mt-2">Lorem ipsum dolor sit amet consectetur. Lorem, ipsum dolor.</p>
                                        </div>
                                    </div>
                                    <div class="col-3 text-end">
                                        <div class="m-img-box p-1 border rounded  w-50 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/8.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/8.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                        <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                            <img src="<?php echo CLS_SITE_URL; ?>img/kurti/8.jpg" class="img-fluid rounded" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="market-footer  border-top">
                                    <div class="market-name">
                                        <div class="d-flex align-items-center">
                                            <div class="m-icon">
                                                <i class="fa-solid fa-shield-halved fs-4  text-primary "></i>
                                            </div>
                                            <div class="m-name mt-2 ms-2">
                                                <h4 class="fs-5 p-0 m-0 text-second">L T fabrics</h4>
                                                <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <button class="btn btn-primary me-1 fs-6">Contact Seller</button>
                                    <button class="btn btn-dark ms-1 fs-6">Send Inquriy</button>
                                </div>
                                <div class="market-button d-flex mt-3">
                                    <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary w-100 mx-auto fs-6">Catelog</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- related product end  -->
    <?php
    include 'footer.php';
    ?>


</body>

</html>