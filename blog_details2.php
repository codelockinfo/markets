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
            <h1 class="display-1 mb-4">Blog details</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="<?php echo CLS_SITE_URL ?>index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Blog details</li>
            </ol>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Blogdetails start  -->
    <section class="blog_details pt-5 pt-md-6  container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="blog_details_box">
                    <div class="blog-head">
                            <h4 class="fs-3 text-capitalize fw-bold text-primary">Beyond the  print: 4 tips to find the right jaipuri kurti in gujrat</h4>
                        </div>
                        <div class="blog_img">
                            <img src="<?php echo CLS_SITE_URL; ?>img/blog_details2.webp" class="img-fluid w-100 rounded" alt="blog_details2">
                        </div>
                        <div class="blog_details_contant mt-4">
                            <h4 class="fs-5 text-second">Lorem, ipsum dolor sit amet consectetur adipisicing.</h4>
                            <h6 class="fw-normal fs-7">12 June 2016 by <span class="text-primary fw-bold">By Stevan Smith</span></h6>
                            <p class="fs-6 mt-3"> Vel blanditiis, ea possimus impedit deleniti error laborum corrupti fuga laudantium iste suscipit illo iure cum ipsam quas expedita quia hic libero?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, inventore provident molestias perferendis animi ut earum, minus eum ex quae expedita reiciendis tempora! Iste odio velit dolorem consequuntur a fuga.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p class="fs-6"> Vel blanditiis, ea possimus impedit deleniti error laborum corrupti fuga laudantium iste suscipit illo iure cum ipsam quas expedita quia hic libero?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, inventore provident molestias perferendis animi ut earum .</p>
                            <h4 class="  fs-5 mt-3 text-second">Lorem ipsum dolor sit amet. ?</h4>
                            <p class="fs-6 mt-3"> Vel blanditiis, ea possimus impedit deleniti error laborum corrupti fuga laudantium iste suscipit illo iure cum ipsam quas expedita quia hic libero?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, inventore provident molestias perferendis animi ut earum, minus eum ex quae expedita reiciendis tempora! Iste odio velit dolorem consequuntur a fuga.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <p class="fs-6 mt-3"> Vel blanditiis, ea possimus impedit deleniti error laborum corrupti fuga laudantium iste suscipit illo iure cum ipsam quas expedita quia hic libero?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, inventore provident molestias perferendis animi ut earum, minus eum ex quae expedita reiciendis tempora! Iste odio velit dolorem consequuntur a fuga.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <h4 class="fs-4 mt-3 text-second">Lorem ipsum dolor sit amet. ?</h4>
                            <ul class="list-unstyled">
                                <li class="mb-3"><i class="fa-solid fa-circle fs-05 text-primary me-2"></i>Lorem ipsum dolor sit amet consectetur.</li>
                                <li class="mb-3"><i class="fa-solid fa-circle fs-05 text-primary me-2"></i>Lorem ipsum dolor sit amet consectetur.</li>
                                <li class="mb-3"><i class="fa-solid fa-circle fs-05 text-primary me-2"></i>Lorem ipsum dolor sit amet consectetur.</li>
                            </ul>
                            <h4 class="  fs-5 text-second">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</h4>
                            <p class="fs-6 mt-3"> Vel blanditiis, ea possimus impedit deleniti error laborum corrupti fuga laudantium iste suscipit illo iure cum ipsam quas expedita quia hic libero?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, inventore provident molestias perferendis animi ut earum, minus eum ex quae expedita reiciendis tempora! Iste odio velit dolorem consequuntur a fuga.Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="blog_sidebar  ps-0 ps-md-4">
                        <div class="blog_serch">
                            <div class="input-group add-on">
                                <input class="form-control" placeholder="Search" name="srch-term" id="srch-term" type="text">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary rounded-0 rounded-end border" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="blog_post mt-5">
                            <h4 class="fs-5 ">Related blogs</h4>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <img src="<?php echo CLS_SITE_URL; ?>img/kurti/2.jpg" class="img-fluid rounded" alt="kurti2">
                                </div>
                                <div class="col-8">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, iusto.</p>
                                    <h6 class="fw-normal fs-7">12 June 2016 by <span class="text-second fw-bold">By Stevan Smith</span></h6>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-4">
                                    <img src="<?php echo CLS_SITE_URL; ?>img/wedding/wedding1.webp" class="img-fluid rounded" alt="wedding1">
                                </div>
                                <div class="col-8">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, iusto.</p>
                                    <h6 class="fw-normal fs-7">12 June 2016 by <span class="text-second fw-bold">By Stevan Smith</span></h6>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-4">
                                    <img src="<?php echo CLS_SITE_URL; ?>img/top/top1.jpg" class="img-fluid rounded" alt="top1">
                                </div>
                                <div class="col-8">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, iusto.</p>
                                    <h6 class="fw-normal fs-7">12 June 2016 by <span class="text-second fw-bold">By Stevan Smith</span></h6>
                                </div>
                            </div>
                        </div>
                        <div class="blog_category_box mt-4">
                            <h4 class="fs-5 ">Categories</h4>
                            <ul class="list-unstyled mt-3">
                                <li class="mb-3 text-dark"><i class="fa-solid fa-circle fs-05 text-primary me-3"></i><a href="#">Kurti</a></li>
                                <li class="mb-3 text-dark"><i class="fa-solid fa-circle fs-05 text-primary me-3"></i><a href="#">Saree</a></li>
                                <li class="mb-3 text-dark"><i class="fa-solid fa-circle fs-05 text-primary me-3"></i><a href="#">Wedding cloth</a></li>
                                <li class="mb-3 text-dark"><i class="fa-solid fa-circle fs-05 text-primary me-3"></i><a href="#">Tops</a></li>
                                <li class="mb-3 text-dark"><i class="fa-solid fa-circle fs-05 text-primary me-3"></i><a href="#">Skirt</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blogdetails end  -->

    <?php 
        include 'footer.php';
    ?>
    
</body>

</html>