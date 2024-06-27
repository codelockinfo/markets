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
            <div class="co_box d-flex justify-content-end align-items-center">
                <div class="w-auto me-5 me-md-3">
                    <div class="range-slider">
                        <span class="rangeValues"></span>
                        <input value="100" min="100" max="1000" step="200" type="range">
                        <input value="1000" min="100" max="1000" step="200" type="range">
                    </div>
                </div>
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
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Armwear">Armwear</a></li>
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
                        <li><a class="dropdown-item nav-link category-item" data-bs-toggle="pill" href="#" id="Wedding">Wedding clothing</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- filter and latest section end -->
    <!-- Collection2 Start -->
    <section class="collection pt-4 container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-normal ms-3 mt-3">Net 3 peace salwar suit</h6>
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
                                            <h4 class="fs-5 p-0 m-0 text-primary">L T fabrics</h4>
                                            <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="market-button d-flex  mt-3">
                                <button class="btn btn-primary me-1  fs-6">Contact Seller</button>
                                <button class="btn btn-dark ms-1  fs-6">Send Inquriy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-normal ms-3 mt-3">Net 3 peace salwar suit</h6>
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
                                            <h4 class="fs-5 p-0 m-0 text-primary">L T fabrics</h4>
                                            <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="market-button d-flex  mt-3">
                                <button class="btn btn-primary me-1  fs-6">Contact Seller</button>
                                <button class="btn btn-dark ms-1  fs-6">Send Inquriy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-normal ms-3 mt-3">Net 3 peace salwar suit</h6>
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
                                            <h4 class="fs-5 p-0 m-0 text-primary">L T fabrics</h4>
                                            <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="market-button d-flex  mt-3">
                                <button class="btn btn-primary me-1  fs-6">Contact Seller</button>
                                <button class="btn btn-dark ms-1  fs-6">Send Inquriy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-normal ms-3 mt-3">Net 3 peace salwar suit</h6>
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
                                            <h4 class="fs-5 p-0 m-0 text-primary">L T fabrics</h4>
                                            <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="market-button d-flex  mt-3">
                                <button class="btn btn-primary me-1  fs-6">Contact Seller</button>
                                <button class="btn btn-dark ms-1  fs-6">Send Inquriy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-normal ms-3 mt-3">Net 3 peace salwar suit</h6>
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
                                            <h4 class="fs-5 p-0 m-0 text-primary">L T fabrics</h4>
                                            <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="market-button d-flex  mt-3">
                                <button class="btn btn-primary me-1  fs-6">Contact Seller</button>
                                <button class="btn btn-dark ms-1  fs-6">Send Inquriy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-normal ms-3 mt-3">Net 3 peace salwar suit</h6>
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
                                            <h4 class="fs-5 p-0 m-0 text-primary">L T fabrics</h4>
                                            <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="market-button d-flex  mt-3">
                                <button class="btn btn-primary me-1  fs-6">Contact Seller</button>
                                <button class="btn btn-dark ms-1  fs-6">Send Inquriy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-normal ms-3 mt-3">Net 3 peace salwar suit</h6>
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
                                            <h4 class="fs-5 p-0 m-0 text-primary">L T fabrics</h4>
                                            <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="market-button d-flex  mt-3">
                                <button class="btn btn-primary me-1  fs-6">Contact Seller</button>
                                <button class="btn btn-dark ms-1  fs-6">Send Inquriy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-normal ms-3 mt-3">Net 3 peace salwar suit</h6>
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
                                            <h4 class="fs-5 p-0 m-0 text-primary">L T fabrics</h4>
                                            <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="market-button d-flex  mt-3">
                                <button class="btn btn-primary me-1  fs-6">Contact Seller</button>
                                <button class="btn btn-dark ms-1  fs-6">Send Inquriy</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4 mt-4 ">
                    <div class="market_list_mian_box border rounded">
                        <div class="market-head border-bottom">
                            <h6 class="text-primary fw-normal ms-3 mt-3">Net 3 peace salwar suit</h6>
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
                                            <h4 class="fs-5 p-0 m-0 text-primary">L T fabrics</h4>
                                            <p class="fs-6 p-0 m-0">surat,gujrat</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="market-button d-flex  mt-3">
                                <button class="btn btn-primary me-1  fs-6">Contact Seller</button>
                                <button class="btn btn-dark ms-1  fs-6">Send Inquriy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Collection2 End -->
    <?php
    include 'footer.php';
    ?>




</body>

</html>