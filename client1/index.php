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
                <h1 class="display-5 mb-5">Brouse by category</h1>
            </div>
            <div class="tabbable">
                <ul class="mb-5 nav nav-pills nav-justified form-tabs hidden-xs">
                    <li class="tab-selector active">
                        <a class="d-flex mx-1 py-2 border border-primary bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                            <span class="text-dark" style="width: 150px;">Kurtis</span>
                        </a>
                    </li>
                    <li class="tab-selector">
                        <a class="d-flex py-2 mx-1 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                            <span class="text-dark" style="width: 150px;">Sarees</span>
                        </a>
                    </li>
                    <li class="tab-selector">
                        <a class="d-flex mx-1 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                            <span class="text-dark" style="width: 150px;">Wedding cloths</span>
                        </a>
                    </li>
                    <li class="tab-selector">
                        <a class="d-flex mx-1 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                            <span class="text-dark" style="width: 150px;">Tops</span>
                        </a>
                    </li>
                    <li class="tab-selector">
                        <a class="d-flex mx-1 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                            <span class="text-dark" style="width: 150px;">Skirts</span>
                        </a>
                    </li>
                </ul>
                <!-- <select class="mb-5 form-select form-control visible-xs" id="tab_selector">
                    <option selected>Open this select menu</option>
                    <option value="tab-1">Kurti</option>
                    <option value="tab-2">Saree</option>
                    <option value="tab-3">Wedding cloth</option>
                    <option value="tab-4">Tops</option>
                    <option value="tab-5">Skirt</option>
                </select> -->
                <div class="tab-content">
                    <div class="tab-pane fade show p-0 active" id="tab-1">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/1.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Kurti</h4>
                                                <a href="img/kurti/1.jpg" data-lightbox="event-1" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/2.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Kurti</h4>
                                                <a href="img/kurti/2.jpg" data-lightbox="event-2" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/3.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Kurti</h4>
                                                <a href="img/kurti/3.jpg" data-lightbox="event-3" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/4.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Kurti</h4>
                                                <a href="img/kurti/4.jpg" data-lightbox="event-4" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/5.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Kurti</h4>
                                                <a href="img/kurti/5.jpg" data-lightbox="event-5" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/6.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Kurti</h4>
                                                <a href="img/kurti/6.jpg" data-lightbox="event-6" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/7.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Kurti</h4>
                                                <a href="img/kurti/7.jpg" data-lightbox="event-7" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/kurti/8.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Kurti</h4>
                                                <a href="img/kurti/8.jpg" data-lightbox="event-17" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show " id="tab-2">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="row g-4">
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/1.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Saree</h4>
                                                <a href="img/saree/1.jpg" data-lightbox="event-1" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/2.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Saree</h4>
                                                <a href="img/saree/2.jpg" data-lightbox="event-2" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/3.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Saree</h4>
                                                <a href="img/saree/3.jpg" data-lightbox="event-3" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/4.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Saree</h4>
                                                <a href="img/saree/4.jpg" data-lightbox="event-4" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/5.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Saree</h4>
                                                <a href="img/saree/5.jpg" data-lightbox="event-5" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/6.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Saree</h4>
                                                <a href="img/saree/6.jpg" data-lightbox="event-6" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/7.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Saree</h4>
                                                <a href="img/saree/7.jpg" data-lightbox="event-7" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/saree/8.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Saree</h4>
                                                <a href="img/saree/8.jpg" data-lightbox="event-17" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
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
                                                <h4 class="mx-auto">Wedding</h4>
                                                <a href="img/wedding/wedding1.webp" data-lightbox="event-1" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding2.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Wedding</h4>
                                                <a href="img/wedding/wedding2.jpg" data-lightbox="event-2" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding3.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Wedding</h4>
                                                <a href="img/wedding/wedding3.jpg" data-lightbox="event-3" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding4.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Wedding</h4>
                                                <a href="img/wedding/wedding4.jpg" data-lightbox="event-4" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding5.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Wedding</h4>
                                                <a href="img/wedding/wedding5.jpg" data-lightbox="event-5" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding6.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Wedding</h4>
                                                <a href="img/wedding/wedding6.jpg" data-lightbox="event-6" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding7.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Wedding</h4>
                                                <a href="img/wedding/wedding7.jpg" data-lightbox="event-7" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/wedding/wedding8.png" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Wedding</h4>
                                                <a href="img/wedding/wedding8.png" data-lightbox="event-17" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
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
                                                <h4 class="mx-auto">Top</h4>
                                                <a href="img/top/top1.jpg" data-lightbox="event-1" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top2.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Top</h4>
                                                <a href="img/top/top2.webp" data-lightbox="event-2" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top3.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Top</h4>
                                                <a href="img/top/top3.jpg" data-lightbox="event-3" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top4.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Top</h4>
                                                <a href="img/top/top4.jpg" data-lightbox="event-4" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top5.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Top</h4>
                                                <a href="img/top/top5.webp" data-lightbox="event-5" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top6.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Top</h4>
                                                <a href="img/top/top6.webp" data-lightbox="event-6" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top7.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Top</h4>
                                                <a href="img/top/top7.jpg" data-lightbox="event-7" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/top/top8.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Top</h4>
                                                <a href="img/top/top8.jpg" data-lightbox="event-17" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
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
                                                <h4 class="mx-auto">Skirt</h4>
                                                <a href="img/skirt/skirt1.webp" data-lightbox="event-1" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skirt2.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Skirt</h4>
                                                <a href="img/skirt/skirt2.webp" data-lightbox="event-2" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skirt3.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Skirt</h4>
                                                <a href="img/skirt/skirt3.jpg" data-lightbox="event-3" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skirt4.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Skirt</h4>
                                                <a href="img/skirt/skirt4.webp" data-lightbox="event-4" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skir4.webp" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Skirt</h4>
                                                <a href="img/skirt/skir4.webp" data-lightbox="event-5" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.3s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skirt6.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Skirt</h4>
                                                <a href="img/skirt/skirt6.jpg" data-lightbox="event-6" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.5s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skirt7.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Skirt</h4>
                                                <a href="img/skirt/skirt7.jpg" data-lightbox="event-7" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.7s">
                                        <div class="event-img position-relative">
                                            <img class="img-fluid rounded w-100" src="img/skirt/skirt8.jpg" alt="">
                                            <div class="event-overlay d-flex flex-column p-4">
                                                <h4 class="mx-auto">Skirt</h4>
                                                <a href="img/skirt/skirt8.jpg" data-lightbox="event-17" class="my-auto mx-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
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
            <h5 class="fw-bold">Sarees Manufacturers in Surat</h5>
            <p class="fs-7">Discover a wide range of Indian sarees from top manufacturers in Surat, the textile hub of India. Our platform connects you with the best saree producers known for their quality craftsmanship and exquisite designs. Whether you're looking for traditional silk sarees, trendy georgette sarees, or elegant chiffon sarees, you'll find a vast selection to suit every need. </p>
            <h5 class="fw-bold">Designer Lehengas Suppliers in India </h5>
            <p class="fs-7">Explore our extensive network of designer lehenga suppliers across India. We bring you the finest collection of lehengas, perfect for weddings, festivals, and special occasions. Our suppliers offer a variety of styles, including bridal lehengas, party-wear lehengas, and contemporary lehenga cholis, crafted with attention to detail and the latest fashion trends.
            </p>
            <p class="fs-7">Connect with leading designer lehenga exporters who cater to international markets. Our platform provides access to exporters renowned for their high-quality fabrics and stunning designs. Whether you are looking to import traditional or modern lehengas, our exporters ensure timely delivery and competitive pricing.
            </p>
            <ul class="content-box ms-5 list-unstyled">
                <li class="div mt-2">
                    <p class="d-inline"><strong class="text-dark fw-bold">Kurtis :</strong>Find the best kurtis from reliable suppliers across India. Our platform features a diverse range of kurtis, from everyday casual wear to festive and formal designs. Browse through a variety of fabrics, patterns, and styles to meet the demands of your customers.
                    </p>
                </li>
                <li class="div mt-2">
                    <p class="d-inline"><strong class="text-dark fw-bold">Dresses :</strong>Browse through our collection of stylish and trendy dresses from top manufacturers and suppliers. We offer a variety of dresses, including anarkalis, maxi dresses, and gowns,suitable for different occasions. Our dresses are designed to cater to the latest fashion trends and customer preferences.
                    </p>
                </li>
                <li class="div mt-2">
                    <p class="d-inline"><strong class="text-dark fw-bold">Dupattas :</strong>Enhance your inventory with beautifully crafted dupattas available on our platform. Our suppliers offer a wide range of dupattas in various fabrics, including silk, cotton, chiffon, and georgette. From embroidered to printed dupattas, find the perfect pieces to complement your sarees and suits.</p>
                </li>
                <li class="div mt-2">
                    <p class="d-inline"><strong class="text-dark fw-bold">Palazzo Pants :</strong>Expand your collection with fashionable palazzo pants from trusted manufacturers. Our platform provides access to a variety of palazzo pants, ideal for casual and formal wear.</p>
                </li>
        </div>
        </div>
    </section>
    <!-- paragraph end -->

    <!-- FAQ Start -->
    <div class="w-100 d-flex justify-content-center align-items-center h-auto pt-6 pb-5">
        <div class="mainContent h-100 w-75 d-flex flex-column justify-content-center align-items-center gap-3">
            <h1 class="fs-1 ">Frequently ask questions</h1>
            <div class="row align-items-center">
            <div class="content_1 col-12 col-lg-8 col-md-6">
                <div class="">
                    <p class="fs-6 mb-6">When deciding Which Charity to donate to, it's important to do your search and find one that aligns with your values and interests.</p>
                </div>
                <div>
                    <div class="accordion" id="accordionExample">

                        <div class="accordion-item border mb-4">
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

                        <div class="accordion-item border mb-4">
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

                        <div class="accordion-item border mb-4">
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

                        <div class="accordion-item border mb-4">
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

                        <div class="accordion-item border mb-4">
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

                        <div class="accordion-item border mb-4">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="content_2 col-12 col-lg-4 col-md-6">
                <img class="img-fluid  fit-cover rounded" src="img/faq.jpg" alt="">
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

    <?php 
        include 'footer.php';
    ?>

   
</body>

</html>