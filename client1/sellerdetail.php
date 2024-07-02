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
    <div class="container-fluid bg-light py-5  mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1 mb-4">Seller Details</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="<?php echo CLS_SITE_URL ?>index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Seller Details</li>
            </ol>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Contact Start -->
    <div class="container-fluid contact pt-5 pt-md-6    wow bounceInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="p-2 p-sm-5 bg-light rounded contact-form">
                <div class="row g-4">
                    <div class="col-xl-4">
                        <img src="<?php echo main_url('/admin1/assets/img/vectormen.png'); ?>" alt="profile_image" class="seller-image border-radius-lg shadow-sm">
                    </div>
                    <div class="col-xl-8">
                        <span class="text-capitalize text-dark"><strong>name :</strong></span>
                        <span class="text-capitalize">kalpesh vaghani</span>
                        <div class="mt-1">
                            <span class="text-capitalize text-dark"><strong>shop name :</strong></span>
                            <span class="text-capitalize">marco men</span>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-7">
                        <img src="<?php echo main_url('/admin1/assets/img/shop-photo.jpg'); ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm mb-4">
                    </div>
                    <div class="col-md-6 col-lg-5">
                        <div>
                            <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                                <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Address</h4>
                                    <p>2020, Silver business point, near VIP circle, Digital valley, Uttran, Surat
                                        395006</p>
                                </div>
                            </div>
                            <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Mail Us</h4>
                                    <a href="mailto:codelockinfo@gmail.com" class="text-body">codelockinfo@gmail.com</a>
                                    <!-- <h4>Mail Us</h4>
                                    <p><a href="mailto:codelockinfo@gmail.com" class="text-body">codelockinfo@gmail.com</a></p> -->
                                </div>
                            </div>
                            <div class="d-inline-flex w-100 border border-primary p-4 rounded ">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Telephone</h4>
                                    <p><a href="tel:7600464414" class="text-body">+91 7600464414</a></p>
                                </div>
                            </div>
                            <div class="d-inline-flex w-100 p-4 rounded ">
                                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
                                <a href="https://api.whatsapp.com/send?phone=6325487985&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." class="float" target="_blank">
                                    <i class="fa fa-whatsapp fa-2x text-primary me-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="collection pt-4 container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="">
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
                                <a href="<?php echo CLS_SITE_URL ?>sellerdetail.php" class="btn btn-primary me-1 fs-6">Contact Seller</a>
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="">
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
                                <a href="<?php echo CLS_SITE_URL ?>sellerdetail.php" class="btn btn-primary me-1 fs-6">Contact Seller</a>
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="">
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
                                <a href="<?php echo CLS_SITE_URL ?>sellerdetail.php" class="btn btn-primary me-1 fs-6">Contact Seller</a>
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="">
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
                                <a href="<?php echo CLS_SITE_URL ?>sellerdetail.php" class="btn btn-primary me-1 fs-6">Contact Seller</a>
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="">
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
                                <a href="<?php echo CLS_SITE_URL ?>sellerdetail.php" class="btn btn-primary me-1 fs-6">Contact Seller</a>
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="">
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
                                <a href="<?php echo CLS_SITE_URL ?>sellerdetail.php" class="btn btn-primary me-1 fs-6">Contact Seller</a>
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="">
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
                                <a href="<?php echo CLS_SITE_URL ?>sellerdetail.php" class="btn btn-primary me-1 fs-6">Contact Seller</a>
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="">
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
                                <a href="<?php echo CLS_SITE_URL ?>sellerdetail.php" class="btn btn-primary me-1 fs-6">Contact Seller</a>
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="">
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
                                <a href="<?php echo CLS_SITE_URL ?>sellerdetail.php" class="btn btn-primary me-1 fs-6">Contact Seller</a>
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact End -->


    <?php
    include 'footer.php';
    ?>

</body>

</html>