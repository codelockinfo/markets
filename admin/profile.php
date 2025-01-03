<?php
include 'header.php';

if (!isset($_SESSION['current_user']['user_id'])) {
    header("Location: sign-in");
    die();
}
?>
<body class="g-sidenav-show bg-gray-100">
    <?php
    include 'sidebar.php';
    ?>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <div class="container-fluid">
            <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
                <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-0 w-100 z-index-2 mt-2">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-0  justify-content-between " id="navbar">
                            <div class=" pe-md-0 d-flex align-items-center">
                                <div class="input-group back-btn d-xl-none d-block">
                                    <a href="javascript:history.back()">
                                        <i class="fas fa-arrow-left text-sm ms-1 text-white" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div class="input-group d-xl-none d-block ms-2 me-2 ">
                                    <a href="<?php echo SITE_ADMIN_URL ?>index">
                                        <i class="fa fa-home text-sm ms-1 text-white" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <ul class="navbar-nav justify-content-end">
                                <li class="nav-item d-flex align-items-center">
                                    <a href="<?php echo SITE_ADMIN_URL ?>profile" class="nav-link text-white font-weight-bold px-0">
                                        <i class="fa fa-user me-sm-1"></i>
                                        <span class="d-sm-inline d-none">Profile</span>
                                    </a>
                                </li>
                                <li class="nav-item d-flex align-items-center">
                                     <a href="<?php echo SITE_ADMIN_URL ?>logout" class="nav-link text-white font-weight-bold px-0"  title="logout">
                                        <i class="fa fa-sign-out ms-sm-3"></i>
                                     </a>
                                </li>
                                <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
                                    <a href="#" class="nav-link text-white p-0">
                                        <a href="#" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                            <div class="sidenav-toggler-inner">
                                                <i class="sidenav-toggler-line bg-white"></i>
                                                <i class="sidenav-toggler-line bg-white"></i>
                                                <i class="sidenav-toggler-line bg-white"></i>
                                            </div>
                                        </a>
                                    </a>
                                </li>
                                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 ms-n4" aria-labelledby="dropdownMenuButton">
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="#">
                                                <div class="d-flex py-1">
                                                    <div class="my-auto">
                                                        <img src="<?php echo main_url('admin/assets/img/team-2.jpg'); ?>" alt="team-2" class="avatar avatar-sm me-3">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span class="font-weight-bold">New Message</span> From Laur
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <i class="fa fa-clock me-1"></i>
                                                            13 Minutes Ago
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="#">
                                                <div class="d-flex py-1">
                                                    <div class="my-auto">
                                                        <img src="<?php echo main_url('admin/assets/img/small-logos/logo-spotify.svg'); ?>" alt="logo-spotify" class="avatar avatar-sm bg-gradient-dark me-3">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            <span class="font-weight-bold">New Album</span> By Travis Scott
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <i class="fa fa-clock me-1"></i>
                                                            1 Day
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item border-radius-md" href="#">
                                                <div class="d-flex py-1">
                                                    <div class="avatar avatar-sm bg-gradient-secondary me-3 my-auto">
                                                        <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                            <title>Credit-Card</title>
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                                    <g transform="translate(1716.000000, 291.000000)">
                                                                        <g transform="translate(453.000000, 454.000000)">
                                                                            <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                                            <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="text-sm font-weight-normal mb-1">
                                                            Payment Successfully Completed
                                                            12px
                                                        </h6>
                                                        <p class="text-xs text-secondary mb-0">
                                                            <i class="fa fa-clock me-1"></i>
                                                            2 Days
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="page-header min-height-150  border-radius-xl mt-4">
                <span class="mask bg-gradient-info opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6 p-4 overflow-hidden">
                <div class="row gx-4" id="profile_data">
               
                </div>
            </div>
            <div class="user_msgactive"></div>      
            <div class="py-4">
                <div class="row">
                    <div class="col-xl-6 col-md-6 profile-sec">
                        <div class="card" id="img">
                        </div> 
                    </div>
                    <div class="col-xl-6 col-md-6 profile-sec">
                        <div class="card h-100">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6 col-auto me-auto d-flex">
                                        <h6 class="mb-0">Profile Information</h6>
                                    </div>
                                    <div class="col-md-6 col-auto ms-auto text-end">
                                        <a href="<?php echo SITE_ADMIN_URL ?>profile-form">
                                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-header profile-section" id="getdataa">
                            </div>
                            <div class="card-header">
                                <a href="<?php echo CLS_SITE_URL ?>"  target="_blank>
                                    <button type= "button" class="btn bg-gradient-info btn-sm">View your profile</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="card mb-4">
                            <div class="d-md-flex d-block justify-content-between align-items-center p-3">
                                <div class="col-auto ">
                                    <h6 class="mb-1 mt-1 text-lg d-none d-sm-block">
                                        Your Products
                                    </h6>
                                </div>
                                <div class=" d-flex col-auto col-lg-0 col-md-0">
                                   <div class="ms-md-auto pe-md-0 d-flex align-items-start align-items-md-center me-2">
                                        <div class="input-group search-btn search-icons dropdownhide">
                                            <span class="input-group-text text-body search-btn_2"><i class="fas fa-search" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control search-btn_1" placeholder="Type here..." id="search" data-routine="productlisting">
                                        </div>
                                    </div>
                                    <div class="dropdown mt-0 mt-md-3 filterDropdown" data-filter="productlist">
                                        <button class="btn bg-gradient-info dropdown-toggle dropdownhide" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            Sort By
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" data-table="products">
                                            <li class="dropdown-item" data-value="featured" data-sortby="Featured">Featured</li>
                                            <li class="dropdown-item" data-value="most_view" data-sortby="Most view">Most view</li>
                                            <li class="dropdown-item" data-value="alphabetically_az" data-sortby="Alphabetically, A-Z">Alphabetically, A-Z</li>
                                            <li class="dropdown-item" data-value="alphabetically_za" data-sortby="Alphabetically, Z-A">Alphabetically, Z-A</li>
                                            <li class="dropdown-item" data-value="price_low_high" data-sortby="Price, low to high">Price, low to high</li>
                                            <li class="dropdown-item" data-value="price_high_low" data-sortby="Price, high to low">Price, high to low</li>
                                            <li class="dropdown-item" data-value="date_old_new" data-sortby="Date, old to new">Date, old to new</li>
                                            <li class="dropdown-item" data-value="date_new_old" data-sortby="Date, new to old">Date, new to old</li>
                                        </ul>
                                    </div>
                                    <div class="d-flex nav-wrapper position-relative end-0 mt-0 mt-md-3 ms-2">
                                        <a href="<?php echo SITE_ADMIN_URL ?>product-list" class="btn bg-gradient-info viewproduct">
                                            View All Products
                                        </a>
                                        </a>
                                        <a href="<?php echo SITE_ADMIN_URL ?>product-form" class="btn bg-gradient-info addproduct">
                                            Add Product
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="row" id="getdata">
                                    <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                                        <div class="card h-100 card-plain border">
                                            <div class="card-body d-flex flex-column justify-content-center text-center">
                                                <a href="<?php echo SITE_ADMIN_URL ?>product-form">
                                                    <i class="fa fa-plus text-secondary mb-3"></i>
                                                    <h5 class=" text-secondary">Add New Product</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<script type="text/javascript">
    loadData("productlisting");
    profileLoadData('listprofile')
    userData("user_massge");
</script>