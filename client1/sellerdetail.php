<?php
include 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
   
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
            <div class="p-2 p-sm-5 bg-light rounded contact-form" id="customer">
                <!-- <div class="row g-4">
                    <div class="col-xl-2">
                        <img src="<?php echo main_url('/admin1/assets/img/vectormen.png'); ?>" alt="vectormen" class="seller-image border-radius-lg shadow-sm">
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
                        <img src="<?php echo main_url('/admin1/assets/img/shop-photo.jpg'); ?>" alt="shop-photo" class="w-100 border-radius-lg shadow-sm mb-4">
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
                                    
                                </div>
                            </div>
                            <div class="d-inline-flex w-100 border border-primary p-4 rounded ">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Telephone</h4>
                                    <p><a href="tel:7600464414" class="text-body">+91 7600464414</a></p>
                                </div>
                            </div>
                            <div class="d-inline-flex w-100 rounded ">
                                <a href="https://api.whatsapp.com/send?phone=6325487985&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202." target="_blank">
                                    <img src="<?php echo main_url('/client1/img/whatsapplogo.png'); ?>" alt="whatsapplogo" class="w-50">
                                </a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <section class="collection pt-4 container-fluid">
        <div class="container">
            <div class="d-flex order-1 order-sm-2 justify-content-end">
                <div class="dropdown ms-2">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item text-capitalize nav-link" href="#" id="latestMarkets">latest markets</a></li>
                        <li><a class="dropdown-item text-capitalize nav-link" href="#" id="byCategory">by categoty</a></li>
                    </ul>
                </div>
                <div class="dropdown ms-2 hcategory" id="categoryDropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2" id="getcategory">
                        <!-- <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Armwear">Armwear</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Badges">Badges</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Belts">Belts</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Children">Children's clothing</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Clothingbrands">Clothing brands by type </a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Coats">Coats</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Dresses">Dresses</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Footwear">Footwear</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Gowns">Gowns</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Handwear">Handwear</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Hosiery">Hosiery</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Jackets">Jackets</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Jeans">Jeans by type</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Kneeclothing">Knee clothing</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Masks">Masks</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Neckwear">Neckwear</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="One-piece">One-piece suits</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Outerwear">Outerwear</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Ponchos">Ponchos</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Robesandcloaks">Robes and cloaks</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Shawlsandwraps">Shawls and wraps</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Royalattire">Royal attire</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="saree">saree</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Sashes">Sashes</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Skirts">Skirts</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Sportswear">Sportswear</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Suits">Suits</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Tops">Tops</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Trousersandshorts">Trousers and shorts</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Undergarments">Undergarments</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Wedding">Wedding clothing</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center" id="getcollection">
                <!-- <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100" alt="IMG_6358">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="kurti1">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="kurti2">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="kurti3">
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
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6 send-btn">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100" alt="IMG_6358">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="kurti1">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="kurti2">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="kurti3">
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
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6 send-btn">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100" alt="IMG_6358">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="kurti1">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="kurti2">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="kurti3">
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
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6 send-btn">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100" alt="IMG_6358">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="kurti1">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="kurti2">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="kurti3">
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
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6 send-btn">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100" alt="IMG_6358">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="kurti1">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="kurti2">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="kurti3">
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
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6 send-btn">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100" alt="IMG_6358">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="kurti1">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="kurti2">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="kurti3">
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
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6 send-btn">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100" alt="IMG_6358">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="kurti1">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="kurti2">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="kurti3">
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
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6 send-btn">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100" alt="IMG_6358">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="kurti1">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="kurti2">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="kurti3">
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
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6 send-btn">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-bold ms-3 mt-3">Net 3 peace salwar suit</h6>
                        </div>
                        <div class="market-content p-3">
                            <div class="d-flex justify-content-between pb-2 ">
                                <div class="col-3">
                                    <img src="img/gown/IMG_6358.jpg" class="img-fluid rounded w-100" alt="IMG_6358">
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
                                        <img src="img/kurti/1.jpg" class="img-fluid " alt="kurti1">
                                    </div>
                                    <div class="m-img-box p-1 border rounded  w-50 mt-1 d-inline-block ">
                                        <img src="img/kurti/2.jpg" class="img-fluid " alt="kurti2">
                                    </div>
                                    <div class="m-img-box p-1 border rounded w-50 mt-1  d-inline-block ">
                                        <img src="img/kurti/3.jpg" class="img-fluid " alt="kurti3">
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
                                <a href="<?php echo CLS_SITE_URL ?>contact.php" class="btn btn-dark ms-1 fs-6 send-btn">Send Inquriy</a>
                                <a href="<?php echo CLS_SITE_URL ?>collection.php" class="btn btn-primary ms-2 fs-6">Catelog</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Contact End -->


    <?php
    include 'footer.php';
    ?>

</body>

</html>
<script>

   var id = "<?php echo $id; ?>";
   getcollection(id);
   getcustomer(id);
   get_categories();
</script>