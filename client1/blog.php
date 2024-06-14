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
    <div class="container-fluid bg-light py-6 mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1 mb-4">Our Blog</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Our Blog</li>
            </ol>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Blog Start -->
    <div class="container-fluid blog py-6">
        <div class="container">
            <div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                <small class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Our Blog</small>
                <h1 class="display-5 mb-5">Be First Who Read News</h1>
            </div>
            <div class="row gx-4 justify-content-center">
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="blog-item">
                        <div class="overflow-hidden rounded">
                           <a href="blog_details1.php"><img src="img/blog1.png" class="img-fluid w-100" alt=""></a>
                        </div>
                        <div class="blog-content mx-4 d-flex rounded bg-light">
                            <div class="text-dark bg-primary rounded-start">
                                <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                    <p class="fw-bold mb-0">16</p>
                                    <p class="fw-bold mb-0">Sep</p>
                                </div>
                            </div>
                            <div class="ms-2 pt-2">
                                <a href="#" class="h6 lh-base my-auto h-100 ">How to get more test in your food from</a>
                                <p class="fs-7">Lorem ipsum dolor, sit amet consectetur..</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.3s">
                    <div class="blog-item">
                        <div class="overflow-hidden rounded">
                            <a href="blog_details2.php"><img src="img/blog2.png" class="img-fluid w-100" alt=""></a>
                        </div>
                        <div class="blog-content mx-4 d-flex rounded bg-light">
                            <div class="text-dark bg-primary rounded-start">
                                <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                    <p class="fw-bold mb-0">16</p>
                                    <p class="fw-bold mb-0">Sep</p>
                                </div>
                            </div>
                            <div class="ms-2 pt-2">
                                <a href="#" class="h6 lh-base my-auto h-100 ">How to get more test in your food from</a>
                                <p class="fs-7">Lorem ipsum dolor, sit amet consectetur..</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.5s">
                    <div class="blog-item">
                        <div class="overflow-hidden rounded">
                           <a href="blog_details3.php"><img src="img/blog3.png" class="img-fluid w-100" alt=""></a>
                        </div>
                        <div class="blog-content mx-4 d-flex rounded bg-light">
                            <div class="text-dark bg-primary rounded-start">
                                <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                    <p class="fw-bold mb-0">16</p>
                                    <p class="fw-bold mb-0">Sep</p>
                                </div>
                            </div>
                            <div class="ms-2 pt-2">
                                <a href="#" class="h6 lh-base my-auto h-100 ">How to get more test in your food from</a>
                                <p class="fs-7">Lorem ipsum dolor, sit amet consectetur..</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="blog-item">
                        <div class="overflow-hidden rounded">
                            <a href="blog_details4.php"><img src="img/blog4.png" class="img-fluid w-100" alt=""></a>
                        </div>
                        <div class="blog-content mx-4 d-flex rounded bg-light">
                            <div class="text-dark bg-primary rounded-start">
                                <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                    <p class="fw-bold mb-0">16</p>
                                    <p class="fw-bold mb-0">Sep</p>
                                </div>
                            </div>
                            <div class="ms-2 pt-2">
                                <a href="#" class="h6 lh-base my-auto h-100 ">How to get more test in your food from</a>
                                <p class="fs-7">Lorem ipsum dolor, sit amet consectetur..</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.3s">
                    <div class="blog-item">
                        <div class="overflow-hidden rounded">
                            <a href="blog_details5.php"><img src="img/blog5.jpg" class="img-fluid w-100" alt=""></a>
                        </div>
                        <div class="blog-content mx-4 d-flex rounded bg-light">
                            <div class="text-dark bg-primary rounded-start">
                                <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                    <p class="fw-bold mb-0">16</p>
                                    <p class="fw-bold mb-0">Sep</p>
                                </div>
                            </div>
                            <div class="ms-2 pt-2">
                                <a href="#" class="h6 lh-base my-auto h-100 ">How to get more test in your food from</a>
                                <p class="fs-7">Lorem ipsum dolor, sit amet consectetur..</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.5s">
                    <div class="blog-item">
                        <div class="overflow-hidden rounded">
                            <a href="blog_details6.php"><img src="img/blog6.png" class="img-fluid w-100" alt=""></a>
                        </div>
                        <div class="blog-content mx-4 d-flex rounded bg-light">
                            <div class="text-dark bg-primary rounded-start">
                                <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                    <p class="fw-bold mb-0">16</p>
                                    <p class="fw-bold mb-0">Sep</p>
                                </div>
                            </div>
                            <div class="ms-2 pt-2">
                                <a href="#" class="h6 lh-base my-auto h-100 ">How to get more test in your food from</a>
                                <p class="fs-7">Lorem ipsum dolor, sit amet consectetur..</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="blog-item">
                        <div class="overflow-hidden rounded">
                            <a href="blog_details7.php"><img src="img/blog7.png" class="img-fluid w-100" alt=""></a>
                        </div>
                        <div class="blog-content mx-4 d-flex rounded bg-light">
                            <div class="text-dark bg-primary rounded-start">
                                <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                    <p class="fw-bold mb-0">16</p>
                                    <p class="fw-bold mb-0">Sep</p>
                                </div>
                            </div>
                            <div class="ms-2 pt-2">
                                <a href="#" class="h6 lh-base my-auto h-100 ">How to get more test in your food from</a>
                                <p class="fs-7">Lorem ipsum dolor, sit amet consectetur..</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.3s">
                    <div class="blog-item">
                        <div class="overflow-hidden rounded">
                            <a href="blog_details8.php"><img src="img/blog8.png" class="img-fluid w-100" alt=""></a>
                        </div>
                        <div class="blog-content mx-4 d-flex rounded bg-light">
                            <div class="text-dark bg-primary rounded-start">
                                <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                    <p class="fw-bold mb-0">16</p>
                                    <p class="fw-bold mb-0">Sep</p>
                                </div>
                            </div>
                            <div class="ms-2 pt-2">
                                <a href="#" class="h6 lh-base my-auto h-100 ">How to get more test in your food from</a>
                                <p class="fs-7">Lorem ipsum dolor, sit amet consectetur..</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.5s">
                    <div class="blog-item">
                        <div class="overflow-hidden rounded">
                           <a href="blog_details9.php"> <img src="img/blog9.png" class="img-fluid w-100" alt=""></a>
                        </div>
                        <div class="blog-content mx-4 d-flex rounded bg-light">
                            <div class="text-dark bg-primary rounded-start">
                                <div class="h-100 p-3 d-flex flex-column justify-content-center text-center">
                                    <p class="fw-bold mb-0">16</p>
                                    <p class="fw-bold mb-0">Sep</p>
                                </div>
                            </div>
                            <div class="ms-2 pt-2">
                                <a href="#" class="h6 lh-base my-auto h-100 ">How to get more test in your food from</a>
                                <p class="fs-7">Lorem ipsum dolor, sit amet consectetur..</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <?php 
        include 'footer.php';
    ?>
    
</body>

</html>