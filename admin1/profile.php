<?php
include 'header.php';
// if (!isset($_SESSION['user_id'])) {
//   header("Location: sign-in.php");
//   die();
// }

?>

<body class="g-sidenav-show bg-gray-100">
    <?php
    include 'sidebar.php';
    ?>
    <?php
    include 'adminheader.php';
    ?>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4">
                <span class="mask bg-gradient-info opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="<?php echo main_url('/admin1/assets/img/vectormen.png'); ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Marco Men
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                CEO / Co-Founder
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-xl-6 col-md-6 profile-sec">
                    <div class="card">
                        <li class="list-group-item border-0 ps-0 pb-0">
                            <strong class="text-dark text-sm p-3">Your Shop:</strong> &nbsp;
                            <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0 mt-3" href="#">
                                <img src="<?php echo main_url('/admin1/assets/img/shop-photo.jpg'); ?>" alt="profile_image" class="w-80 border-radius-lg shadow-sm mb-4">
                            </a>
                        </li>
                        <div class="mx-auto text-center">
                            <a href="<?php echo SITE_ADMIN_URL ?>profile-form.php">
                                <button type="button" class="btn bg-gradient-info btn-sm">Edit Profile</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 profile-sec">
                    <div class="card h-100">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-md-6 mx-auto d-flex align-items-center">
                                    <h6 class="mb-0">Profile Information</h6>
                                </div>
                                <div class="col-md-6 mx-auto text-end">
                                    <a href="<?php echo SITE_ADMIN_URL ?>profile-form.php">
                                        <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <hr class="horizontal gray-light my-4">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name:</strong> &nbsp; Kalpesh Vaghela</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Shop
                                        Name:</strong> &nbsp; Marco Men</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Address:</strong> &nbsp; 1001, Sliver Hub, Mota-Varachha,
                                    Surat</li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile
                                        Number:</strong> &nbsp; (+91) 1234 123 123 </li>
                                <li class="list-group-item border-0 ps-0 text-sm">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-4">
                    <div class="card mb-4">
                        <div class="card-body d-flex p-3 row">
                            <div class="col-auto mx-auto ms-sm-3 mt-2">
                                <h6 class="mb-1">
                                    Your Product
                                </h6>
                            </div>
                            <div class="col-auto col-lg-0 col-md-0 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-2">
                                <div class="nav-wrapper position-relative end-0">
                                    <a href="<?php echo SITE_ADMIN_URL ?>product-list.php">
                                        <button type="button" class="btn bg-gradient-info px-3 btn-sm pt-2 mb-0">View All Product</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                    <div class="card card-blog card-plain">
                                        <div class="position-relative">
                                            <a class="d-block shadow-xl border-radius-xl">
                                                <img src="<?php echo main_url('/admin1/assets/img/698472_R-1049.jpeg'); ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                            </a>
                                        </div>
                                        <div class="card-body px-1 pb-0">
                                            <a href="#">
                                                <h5>
                                                    Modern
                                                </h5>
                                            </a>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="d-flex align-items-center text-sm">
                                                    $250
                                                </div>
                                                <div class="ms-auto text-end">
                                                    <button type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0">Delete</button>
                                                    <button type="button" class="btn btn-outline-secondary text-dark px-3 btn-sm pt-2 mb-0">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                    <div class="card card-blog card-plain">
                                        <div class="position-relative">
                                            <a class="d-block shadow-xl border-radius-xl">
                                                <img src="<?php echo main_url('/admin1/assets/img/755236_COVER.jpg'); ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                                            </a>
                                        </div>
                                        <div class="card-body px-1 pb-0">
                                            <a href="#">
                                                <h5>
                                                    Scandinavian
                                                </h5>
                                            </a>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="d-flex align-items-center text-sm">
                                                    $250
                                                </div>
                                                <div class="ms-auto text-end">
                                                    <button type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0">Delete</button>
                                                    <button type="button" class="btn btn-outline-secondary text-dark px-3 btn-sm pt-2 mb-0">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                    <div class="card card-blog card-plain">
                                        <div class="position-relative">
                                            <a class="d-block shadow-xl border-radius-xl">
                                                <img src="<?php echo main_url('/admin1/assets/img/265844_COVER.jpeg'); ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">
                                            </a>
                                        </div>
                                        <div class="card-body px-1 pb-0">
                                            <a href="#">
                                                <h5>
                                                    Minimalist
                                                </h5>
                                            </a>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="d-flex align-items-center text-sm">
                                                    $250
                                                </div>
                                                <div class="ms-auto text-end">
                                                    <button type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0">Delete</button>
                                                    <button type="button" class="btn btn-outline-secondary text-dark px-3 btn-sm pt-2 mb-0">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                    <div class="card h-100 card-plain border">
                                        <div class="card-body d-flex flex-column justify-content-center text-center">
                                            <a href="<?php echo SITE_ADMIN_URL ?>product-form.php">
                                                <i class="fa fa-plus text-secondary mb-3"></i>
                                                <h5 class=" text-secondary">Add New Product</h5>
                                            </a>
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
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" href="tel:+1234567891">
            <i class="fa fa-phone"></i>
        </a>
        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <div class="mt-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                </div>
                <div class="form-check form-switch ps-0">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-dark w-100" href="#">Free Download</a>
                <a class="btn btn-outline-dark w-100" href="#">View documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="#" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="#" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="#" class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>