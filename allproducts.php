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
            <h1 class="display-1 mb-4">All Products</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="<?php echo CLS_SITE_URL ?>">Home</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">All Products</li>
            </ol>
        </div>
    </div>
    <!-- Hero End -->
    <!-- filter and latest section start -->
    <section class="co_filter pt-4  container-fluid">
        <div class="container">
            <div class="co_box d-block d-sm-flex justify-content-end align-items-center">
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
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2" id="categoryDropdown">
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="1" id="Armwear">Armwear</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="2" id="Badges">Badges</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="3" id="Belts">Belts</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="4" id="Children">Children's clothing</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="5" id="Clothingbrands">Clothing brands by type</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="6" id="Coats">Coats</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="7" id="Dresses">Dresses</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="8" id="Footwear">Footwear</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="9" id="Gowns">Gowns</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="10" id="Handwear">Handwear</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="11" id="Hosiery">Hosiery</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="12" id="Jackets">Jackets</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="13" id="Jeans">Jeans by type</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="14" id="Kneeclothing">Knee clothing</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="15" id="Masks">Masks</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="16" id="Neckwear">Neckwear</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="17" id="One-piece">One-piece suits</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="18" id="Outerwear">Outerwear</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="19" id="Ponchos">Ponchos</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="20" id="Robesandcloaks">Robes and cloaks</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="21" id="Shawlsandwraps">Shawls and wraps</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="22" id="Royalattire">Royal attire</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="23" id="saree">Saree</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="24" id="Sashes">Sashes</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="25" id="Skirts">Skirts</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="26" id="Sportswear">Sportswear</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="27" id="Suits">Suits</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="28" id="Tops">Tops</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="29" id="Trousersandshorts">Trousers and shorts</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="30" id="Undergarments">Undergarments</a></li>
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" data-value="31" id="Wedding">Wedding clothing</a></li>
                        </ul>
                    </div>
                </div>
                <div class="w-auto  me-sm-5 order-1 ">
                    <div class="range-slider">
                        <span class="rangeValues"></span>
                        <input value="100" min="100" max="1000" step="200" type="range" id="min_value">
                        <input value="1000" min="100" max="1000" step="200" type="range" id="max_value">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- filter and latest section end -->
    <!-- Collection2 Start -->
    <section class="collection pt-4 container-fluid">
        <div class="container">
            <div class="row justify-content-center" id="getdata">
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
    <!-- Collection2 End -->
    <?php
    include 'footer.php';
    ?>




</body>

</html>
<!-- <script type="text/javascript">
  console.log("productshowclientsideee LIST");
  getproduct();
//   listproduct()
</script> -->