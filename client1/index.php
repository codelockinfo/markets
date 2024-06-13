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
    <!-- megamenu md view  -->
    <div class="offcanvas offcanvas-start bg-light" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <a href="index.php"> <img src="img/images.png" class="w-25 img-fluid" alt=""></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h4 class="accordion-header">
                        <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            All markets
                        </button>
                    </h4>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body bg-light">
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-capitalize">Arohi-Women fashion</a></li>
                                <li><a href="#" class="text-capitalize">Maruti fashion</a></li>
                                <li><a href="#" class="text-capitalize">Vidya Fabrics</a></li>
                                <li><a href="#" class="text-capitalize">Kavya fabric</a></li>
                                <li><a href="#" class="text-capitalize">vaibhavlaxmi textile</a></li>
                                <li><a href="#" class="text-capitalize">Reyna Fabrics</a></li>
                                <li><a href="#" class="text-capitalize">Global Textile</a></li>
                                <li><a href="#" class="text-capitalize">Radha Krishna Textile</a></li>
                                <li><a href="#" class="text-capitalize">raghukul fashion </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h4 class="accordion-header ">
                        <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            All categories
                        </button>
                    </h4>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body bg-light">
                            <ul class="list-unstyled">
                                <li><a href="#">Armwear</a></li>
                                <li><a href="#">Badges </a></li>
                                <li><a href="#">Belts</a></li>
                                <li><a href="#">Children's clothing</a></li>
                                <li><a href="#">Clothing brands by type</a></li>
                                <li><a href="#">Coats</a></li>
                                <li><a href="#">Dresses</a></li>
                                <li><a href="#">Footwear</a></li>
                                <li><a href="#">Gowns</a></li>
                                <li><a href="#">Handwear</a></li>
                                <li><a href="#">Hosiery</a></li>
                                <li><a href="#">Jackets</a></li>
                                <li><a href="#">Jeans by type</a></li>
                                <li><a href="#">Knee clothing</a></li>
                                <li><a href="#">Masks</a></li>
                                <li><a href="#">Neckwear</a></li>
                                <li><a href="#">One-piece suits</a></li>
                                <li><a href="#">Outerwear</a></li>
                                <li><a href="#">Ponchos</a></li>
                                <li><a href="#">Robes and cloaks</a></li>
                                <li><a href="#">Royal attire</a></li>
                                <li><a href="#">Saree</a></li>
                                <li><a href="#">Sashes</a></li>
                                <li><a href="#">Shawls and wraps</a></li>
                                <li><a href="#">Skirts</a></li>
                                <li><a href="#">Sportswear</a></li>
                                <li><a href="#">Suits</a></li>
                                <li><a href="#">Tops</a></li>
                                <li><a href="#">Trousers and shorts</a></li>
                                <li><a href="#">Undergarments</a></li>
                                <li><a href="#">Wedding clothing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h4 class="accordion-header ">
                        <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsethree" aria-expanded="false" aria-controls="flush-collapsethree">
                            Retails
                        </button>
                    </h4>
                    <div id="flush-collapsethree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body bg-light">
                            <ul class="list-unstyled">
                                <li><a href="#">Retails</a></li>
                                <li><a href="#">Retails</a></li>
                                <li><a href="#">Retails</a></li>
                                <li><a href="#">Retails</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h4 class="accordion-header ">
                        <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-four">
                            wholesale
                        </button>
                    </h4>
                </div>
                <div class="accordion-item">
                    <h4 class="accordion-header ">
                        <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
                            blogs
                        </button>
                    </h4>
                </div>

                <div class="accordion-item">
                    <h4 class="accordion-header ">
                        <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsesix" aria-expanded="false" aria-controls="flush-collapsesix">
                            videos
                        </button>
                    </h4>

                </div>
                <div class="accordion-item">
                    <h4 class="accordion-header ">
                        <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseseven" aria-expanded="false" aria-controls="flush-collapseseven">
                            plans
                        </button>
                    </h4>

                </div>
            </div>
        </div>
    </div>
    <!-- megamenu md view end -->

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
    <div class="container-fluid bg-light ps-0 pe-0 mt-0 w-auto">
        <img class="banner" src="img/bannerimg.png" alt="no-image">
        <img class="banner_2" src="img/saree/9.jpg" alt="no-image">
        <div class="container ">
            <div class="row g-5 align-items-center">
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Service Start -->
    <div class="container-fluid service pt-6">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <h1 class="display-5 mb-5">Famous markets</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="bg-light rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <i class="fa-solid fa-cart-shopping fa-3x text-primary mb-4"></i>
                                <h4 class="mb-3">Arohi-Woman Fashion</h4>
                                <p class="mb-4">Contrary to popular belief, ipsum is not simply random.</p>
                                <img style="width: 200px; height: 200px;" class="rounded-circle" src="img/shop_1/shop1.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.3s">
                    <div class="bg-light rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <i class="fa-solid fa-cart-shopping fa-3x text-primary mb-4"></i>
                                <h4 class="mb-3">Kavya Fabrics</h4>
                                <p class="mb-4">Contrary to popular belief, ipsum is not simply random.</p>
                                <img style="width: 200px; height: 200px;" class="rounded-circle" src="img/shop_1/shop2.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.5s">
                    <div class="bg-light rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <i class="fa-solid fa-cart-shopping fa-3x text-primary mb-4"></i>
                                <h4 class="mb-3">Global Textile</h4>
                                <p class="mb-4">Contrary to popular belief, ipsum is not simply random.</p>
                                <img style="width: 200px; height: 200px;" class="rounded-circle" src="img/shop_1/shop3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 wow bounceInUp" data-wow-delay="0.7s">
                    <div class="bg-light rounded service-item">
                        <div class="service-content d-flex align-items-center justify-content-center p-4">
                            <div class="service-content-icon text-center">
                                <i class="fa-solid fa-cart-shopping fa-3x text-primary mb-4"></i>
                                <h4 class="mb-3">Vidya Fabrics</h4>
                                <p class="mb-4">Contrary to popular belief, ipsum is not simply random.</p>
                                <img style="width: 200px; height: 200px;" class="rounded-circle" src="img/shop_1/shop4.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service End -->

    <!-- Events Start -->
    <div class="container-fluid event pt-6">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <h1 class="display-5 mb-5">Brouse by categoty</h1>
            </div>
            <div class="tab-class text-center">
                <ul class="nav nav-pills d-inline-flex justify-content-center mb-5 wow bounceInUp" data-wow-delay="0.1s">
                    <li class="nav-item p-2">
                        <a class="d-flex mx-2 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                            <span class="text-dark" style="width: 150px;">Kurti</span>
                        </a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="d-flex py-2 mx-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                            <span class="text-dark" style="width: 150px;">Saree</span>
                        </a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="d-flex mx-2 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                            <span class="text-dark" style="width: 150px;">Wedding cloth</span>
                        </a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="d-flex mx-2 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                            <span class="text-dark" style="width: 150px;">Tops</span>
                        </a>
                    </li>
                    <li class="nav-item p-2">
                        <a class="d-flex mx-2 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                            <span class="text-dark" style="width: 150px;">Skirt</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/1.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Kurti</h4>
                                                <a href="img/kurti/1.jpg" data-lightbox="event-1" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/2.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Kurti</h4>
                                                <a href="img/kurti/2.jpg" data-lightbox="event-2" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/3.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Kurti</h4>
                                                <a href="img/kurti/3.jpg" data-lightbox="event-3" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/4.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Kurti</h4>
                                                <a href="img/kurti/4.jpg" data-lightbox="event-4" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/5.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Kurti</h4>
                                                <a href="img/kurti/5.jpg" data-lightbox="event-5" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/6.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Kurti</h4>
                                                <a href="img/kurti/6.jpg" data-lightbox="event-6" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/7.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Kurti</h4>
                                                <a href="img/kurti/7.jpg" data-lightbox="event-7" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/8.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Kurti</h4>
                                                <a href="img/kurti/8.jpg" data-lightbox="event-17" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/1.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Saree</h4>
                                                <a href="img/saree/1.jpg" data-lightbox="event-1" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/2.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Saree</h4>
                                                <a href="img/saree/2.jpg" data-lightbox="event-2" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/3.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Saree</h4>
                                                <a href="img/saree/3.jpg" data-lightbox="event-3" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/4.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Saree</h4>
                                                <a href="img/saree/4.jpg" data-lightbox="event-4" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/5.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Saree</h4>
                                                <a href="img/saree/5.jpg" data-lightbox="event-5" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/6.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Saree</h4>
                                                <a href="img/saree/6.jpg" data-lightbox="event-6" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/7.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Saree</h4>
                                                <a href="img/saree/7.jpg" data-lightbox="event-7" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/8.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Saree</h4>
                                                <a href="img/saree/8.jpg" data-lightbox="event-17" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding1.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Wedding</h4>
                                                <a href="img/wedding/wedding1.webp" data-lightbox="event-1" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding2.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Wedding</h4>
                                                <a href="img/wedding/wedding2.jpg" data-lightbox="event-2" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding3.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Wedding</h4>
                                                <a href="img/wedding/wedding3.jpg" data-lightbox="event-3" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding4.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Wedding</h4>
                                                <a href="img/wedding/wedding4.jpg" data-lightbox="event-4" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding5.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Wedding</h4>
                                                <a href="img/wedding/wedding5.jpg" data-lightbox="event-5" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding6.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Wedding</h4>
                                                <a href="img/wedding/wedding6.jpg" data-lightbox="event-6" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding7.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Wedding</h4>
                                                <a href="img/wedding/wedding7.jpg" data-lightbox="event-7" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding8.png" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Wedding</h4>
                                                <a href="img/wedding/wedding8.png" data-lightbox="event-17" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-4" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top1.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Top</h4>
                                                <a href="img/top/top1.jpg" data-lightbox="event-1" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top2.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Top</h4>
                                                <a href="img/top/top2.webp" data-lightbox="event-2" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top3.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Top</h4>
                                                <a href="img/top/top3.jpg" data-lightbox="event-3" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top4.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Top</h4>
                                                <a href="img/top/top4.jpg" data-lightbox="event-4" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top5.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Top</h4>
                                                <a href="img/top/top5.webp" data-lightbox="event-5" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top6.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Top</h4>
                                                <a href="img/top/top6.webp" data-lightbox="event-6" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top7.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Top</h4>
                                                <a href="img/top/top7.jpg" data-lightbox="event-7" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top8.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Top</h4>
                                                <a href="img/top/top8.jpg" data-lightbox="event-17" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-5" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skirt1.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Skirt</h4>
                                                <a href="img/skirt/skirt1.webp" data-lightbox="event-1" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skirt2.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Skirt</h4>
                                                <a href="img/skirt/skirt2.webp" data-lightbox="event-2" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skirt3.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Skirt</h4>
                                                <a href="img/skirt/skirt3.jpg" data-lightbox="event-3" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skirt4.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Skirt</h4>
                                                <a href="img/skirt/skirt4.webp" data-lightbox="event-4" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skir4.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Skirt</h4>
                                                <a href="img/skirt/skir4.webp" data-lightbox="event-5" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skirt6.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Skirt</h4>
                                                <a href="img/skirt/skirt6.jpg" data-lightbox="event-6" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skirt7.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Skirt</h4>
                                                <a href="img/skirt/skirt7.jpg" data-lightbox="event-7" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skirt8.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="me-auto">Skirt</h4>
                                                <a href="img/skirt/skirt8.jpg" data-lightbox="event-17" class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Events End -->

    <!-- Offer section  -->
    <section class="offer container-fluid pt-6">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6  wow bounceInUp"><a href="#"><img src="img/offer1.jpg" class="img-fluid" alt=""></a></div>
                <div class="col-12 col-md-6  wow bounceInUp"><a href="#"><img src="img/offer2.jpg" class="img-fluid mt-4 mt-md-0" alt=""></a></div>
                <div class="col-12 col-md-6  wow bounceInUp"><a href="#"><img src="img/offer3.png" class="img-fluid mt-4" alt=""></a></div>
                <div class="col-12 col-md-6  wow bounceInUp"><a href="#"><img src="img/offer4.png" class="img-fluid mt-4" alt=""></a></div>
            </div>
        </div>
    </section>
    <!-- Offer section end  -->

    <!-- paragraph  -->
    <section class="paragraph pt-6">
        <div class="container">
            <h5 class="fw-bold">ONLINE SHOPPING MADE EASY</h5>
            <p class="fs-7">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae minima quia praesentium, rerum perspiciatis nemo perferendis sequi error culpa assumenda quod illum corporis totam modi temporibus aperiam, quaerat deserunt, vitae fugit possimus? Voluptate hic, ad, vel neque, accusamus eaque alias magnam obcaecati natus explicabo eos? Sapiente voluptatum illum minus blanditiis, officia in nihil eos rem, quaerat soluta earum quidem, ipsum autem suscipit fuga omnis impedit nisi accusamus veritatis modi corporis vel ipsa? Tenetur, aspernatur esse facere voluptatibus recusandae vel, praesentium, quidem aut quo natus earum ullam non impedit adipisci iure nostrum deserunt eveniet eligendi fugiat qui excepturi sunt error ipsum tempora? </p>
            <h5 class="fw-bold">BEST ONLINE SHOPPING SITE IN INDIA FOR FASHION</h5>
            <p class="fs-7">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae minima quia praesentium, rerum perspiciatis nemo perferendis sequi error culpa assumenda quod illum corporis totam modi temporibus aperiam, quaerat deserunt, vitae fugit possimus?.</p>
            <ul class="content-box ms-5 list-unstyled">
                <li class="div">
                    <p class="d-inline"><strong class="text-dark fw-bold">Smart men’s clothing : </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore fugit iste corporis ut inventore possimus tempore! Quaerat facilis excepturi illum cupiditate nobis sint maxime explicabo maiores eligendi repudiandae quis enim dolorem debitis cum obcaecati, corrupti rem autem consequatur in doloremque quasi esse soluta. Unde distinctio possimus similique reprehenderit totam ipsam!</p>
                </li>
                <li class="div">
                    <p class="d-inline"><strong class="text-dark fw-bold">Trendy women’s clothing : </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore fugit iste corporis ut inventore possimus tempore! Quaerat facilis excepturi illum cupiditate nobis sint maxime explicabo maiores eligendi repudiandae quis enim dolorem debitis cum obcaecati, corrupti rem autem consequatur in doloremque quasi esse soluta. Unde distinctio possimus similique reprehenderit totam ipsam!</p>
                </li>
                <li class="div">
                    <p class="d-inline"><strong class="text-dark fw-bold">Fashionable tops : </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore fugit iste corporis ut inventore possimus tempore! Quaerat facilis excepturi illum cupiditate nobis sint maxime explicabo maiores eligendi repudiandae quis enim dolorem debitis cum obcaecati, corrupti rem autem consequatur in doloremque quasi esse soluta. Unde distinctio possimus similique reprehenderit totam ipsam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, quidem quibusdam sapiente labore rerum sed assumenda. Eum totam tempora, consequatur recusandae deleniti veniam distinctio saepe excepturi ratione quos eius, enim quasi numquam! Sit architecto ipsum commodi non quia, aliquam expedita illo nihil numquam, corporis autem natus nobis libero recusandae quae!</p>
                </li>
                <li class="div">
                    <p class="d-inline"><strong class="text-dark fw-bold">Fashionable gown : </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore fugit iste corporis ut inventore possimus tempore! Quaerat facilis excepturi illum cupiditate nobis sint maxime explicabo maiores eligendi repudiandae quis enim dolorem debitis cum obcaecati, corrupti rem autem consequatur in doloremque quasi esse soluta. Unde distinctio possimus similique reprehenderit totam ipsam!</p>
                </li>
                <li class="div">
                    <p class="d-inline"><strong class="text-dark fw-bold">Wedding Cloth : </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore fugit iste corporis ut inventore possimus tempore! Quaerat facilis excepturi illum cupiditate nobis sint maxime explicabo maiores eligendi repudiandae quis enim dolorem debitis cum obcaecati, corrupti rem autem consequatur in doloremque quasi esse soluta. Unde distinctio possimus similique reprehenderit totam ipsam! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tenetur eaque itaque ducimus harum cupiditate molestiae eius deleniti architecto pariatur accusantium sunt quos porro eligendi eos, magnam provident tempore doloribus sint!</p>
                </li>
                <li class="div">
                    <p class="d-inline"><strong class="text-dark fw-bold">Fashionable choli : </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore fugit iste corporis ut inventore possimus tempore! Quaerat facilis excepturi illum cupiditate nobis sint maxime explicabo maiores eligendi repudiandae quis enim dolorem debitis cum obcaecati, corrupti rem autem consequatur in doloremque quasi esse soluta. Unde distinctio possimus similique reprehenderit totam ipsam!</p>
                </li>
                <li class="div">
                    <p class="d-inline"><strong class="text-dark fw-bold">Trendy women saree : </strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore fugit iste corporis ut inventore possimus tempore! Quaerat facilis excepturi illum cupiditate nobis sint maxime explicabo maiores eligendi repudiandae quis enim dolorem debitis cum obcaecati, corrupti rem autem consequatur in doloremque quasi esse soluta. Unde distinctio possimus similique reprehenderit totam ipsam!</p>
                </li>

        </div>
        </div>
    </section>
    <!-- paragraph end -->

    <!-- FAQ Start -->
    <div class="w-100 d-flex justify-content-center align-items-center h-auto pt-6 pb-5">
        <div class="mainContent h-100 w-75 d-flex flex-column justify-content-center align-items-center gap-3">
            <h1 class="fs-1 ">Frequently ask questions</h1>
            <div class="d-flex align-items-center">
            <div class="content_1" style="width: 70%;">
                <div class="">
                    <p class="fs-6 mb-6">When deciding Which Charity to donate to, it's important to do your search and find one that aligns with your values and interests.</p>
                </div>
                <div>
                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item border mb-4">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h6>How do I register my business on marketsearch?</h6>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                To register, click on the "Register your shop" button on the homepage, fill in your business details, and submit the registration form.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border mb-4">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h6>Who can register on marketsearch?</h6>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                Fabric wholesalers and textile shop owners are eligible to register on our platform.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border mb-4">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h6>Is there a fee to register my business?</h6>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                   No, registering your business on marketsearch is completely free.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border mb-4">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <h6>How can I update my business information?</h6>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                   After logging in, go to your account dashboard and click on "Edit Profile" to update your business information.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border mb-4">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    <h6>Can I list multiple businesses under one account?</h6>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                   No, each business must be registered with a separate account.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border mb-4">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    <h6>How do I contact customer support?</h6>
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                   You can contact customer support by emailing [codelockinfo@gmail.com] or using the contact form available on our website.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_2">
                <img class="w-100  fit-cover rounded" src="img/shop/img1.webp" alt="">
            </div>
            </div>
        </div>
    </div>
    <!-- FAQ End -->

    <!-- Book Us Start -->
    <div class="container-fluid contact pt-6 wow bounceInUp" data-wow-delay="0.1s">
        <div class="container ps-0 pe-0 ">
            <div class="d-flex flex-column align-items-center mb-3">
               <h1>Contact us</h1>
            </div>
            <div class="row g-0">
                <div class="col-1">
                    <img src="img/background-site.jpg" class="img-fluid h-100 w-100 rounded-start d-none" style="object-fit: cover; opacity: 0.7;" alt="">
                </div>
                <div class="col-10">
                    <div class="border rounded-3 border-primary bg-light py-5 px-4">
                        <div class="row g-4 form col-12 text- mx-auto col-md-9">
                            <div class="col-12 col-md-6">
                                <input type="text" id="firstName" class="form-control border-primary p-2" placeholder=" Name" required>
                                <span class="nameError"></span>
                            </div>
                            <div class="col-12 col-md-6">
                                <input type="email" id="email" class="form-control border-primary p-2" placeholder="Enter Your Email" required>
                                <span class="emailError"></span>
                            </div>
                            <div class="col-12">
                                <textarea name="" id="query" class="form-control border-primary  " placeholder=" Query" required></textarea>
                                <span class="query"></span>
                            </div>
                            <div class="col-12 text-center ">
                                <button type="submit" class="btn btn-primary px-5 py-3 rounded-pill submit">Submit Now</button>
                                <span class="done d-block"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <img src="img/background-site.jpg" class="img-fluid h-100 w-100 rounded-end d-none" style="object-fit: cover; opacity: 0.7;" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Book Us End -->

    <!-- Footer Start -->
    <div class="container-fluid footer py-6 mt-6  mb-0 bg-light wow bounceInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h1 class="text-primary">Cater<span class="text-dark">Serv</span></h1>
                        <p class="lh-lg mb-4">There cursus massa at urnaaculis estieSed aliquamellus vitae ultrs condmentum leo massamollis its estiegittis miristum.</p>
                        <div class="footer-icon d-flex">
                            <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-primary btn-sm-square me-2 rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                            <a href="#" class="btn btn-primary btn-sm-square me-2 rounded-circle"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="btn btn-primary btn-sm-square rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item mt-4 mt-md-0">
                        <h4 class="mb-4">Categories</h4>
                        <div class="d-flex flex-column align-items-start">
                            <a class="text-body mb-3" href="#"><i class="fa fa-check text-primary me-2"></i>Kurti</a>
                            <a class="text-body mb-3" href="#"><i class="fa fa-check text-primary me-2"></i>Saree</a>
                            <a class="text-body mb-3" href="#"><i class="fa fa-check text-primary me-2"></i>Wedding Cloth</a>
                            <a class="text-body mb-3" href="#"><i class="fa fa-check text-primary me-2"></i>Tops</a>
                            <a class="text-body mb-3" href="#"><i class="fa fa-check text-primary me-2"></i>Skirts</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item mt-4 mt-md-0">
                        <h4 class="mb-4">Policies</h4>
                        <div class="d-flex flex-column align-items-start">
                            <a class="text-body mb-3" href="#"><i class="fa fa-check text-primary me-2"></i>Privacy Policy</a>
                            <a class="text-body mb-3" href="#"><i class="fa fa-check text-primary me-2"></i>Terms of Service</a>
                            <a class="text-body mb-3" href="#"><i class="fa fa-check text-primary me-2"></i>Shipping Policy</a>
                            <a class="text-body mb-3" href="#"><i class="fa fa-check text-primary me-2"></i>Returns & Exchanges</a>
                            <a class="text-body mb-3" href="#"><i class="fa fa-check text-primary me-2"></i>Contact Us</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item mt-4 mt-md-0">
                        <h4 class="mb-4">Contact Us</h4>
                        <div class="d-flex flex-column align-items-start">
                            <p><a href="#" class="text-body"><i class="fa fa-map-marker-alt text-primary me-2"></i> 123 Street, New York, USA</a></p>
                            <p><a href="tel:(+012) 3456 7890 123" class="text-body"><i class="fa fa-phone-alt text-primary me-2"></i> (+012) 3456 7890 123</a></p>
                            <p><a href="mailto: info@example.com" class="text-body"><i class="fas fa-envelope text-primary me-2"></i> info@example.com</a></p>
                            <p><a href="#" class="text-body"><i class="fa fa-clock text-primary me-2"></i> 26/7 Hours Service</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="text-center mb-3 mb-md-0">
                <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Codelock solution</a>, All right reserved.</span>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

    <!-- Add your shop button -->
    <a href="#" class="btn btn-md-square btn-primary rounded-circle Add-your-shop" title="Add your shop"><i class="fa-solid fa-store"></i></a>
    <!-- Back to Top -->
    <a href="#" class="btn btn-md-square btn-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>


</body>

</html>