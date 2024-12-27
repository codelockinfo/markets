<?php
include 'header.php';
require_once 'googleconfig.php';
?>
<body class="bg-white">
<div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="<?php echo CLS_SITE_URL; ?>">
                            <img src="<?php echo SITE_ADMIN_URL ?>/assets/img/admin_logo.png" class="headerlogowidth"/>
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="<?php echo SITE_ADMIN_URL ?>sign-up">
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        Sign Up
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="<?php echo SITE_ADMIN_URL ?>sign-in">
                                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                        Sign In
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="<?php echo CLS_SITE_URL; ?>" target="_blank">
                                        <button class="btn bg-gradient-info btn-sm btn-round mb-0 me-1">Preview</button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <main class="main-content  mt-0 space1">
        <div class="page-header min-vh-85">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-6">
                            <div class="card-header text-left bg-transparent text-center card-space1">
                                <h3 class="font-weight-bolder text-info text-gradient">Forget password</h3>
                                <p class="mb-0">Enter the email id to send password reset link.</p>
                                <h5 class="errormsg"> </h5>
                            </div>
                            <div class="card-body card-space">
                                <form role="form" id="forgetpassword">
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                        <span class="errormsg email"></span>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn bg-gradient-info w-100 mt-0 mb-0 forgotPasswordForm">Send link</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="b-img position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="b-img1 bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('assets/img/texttilehub.jpg')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer mt-3 py-2">
        <div class="container">
            <div class="row">
                <div class="mb-1 mx-auto text-center">
                    <a href="<?php echo CLS_SITE_URL ?>about-us.php" target="_blank" class="text-secondary me-3 mb-sm-0 mb-0">
                        About Us
                    </a>
                    <a href="<?php echo CLS_SITE_URL ?>product.php" target="_blank" class="text-secondary me-3 mb-sm-0 mb-2">
                        Products
                    </a>
                    <a href="<?php echo CLS_SITE_URL ?>blog.php" target="_blank" class="text-secondary  me-3 mb-sm-0 mb-2">
                        Blog
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="mx-auto text-center mt-0">
                    <p class="mb-0 text-secondary">
                        Copyright © <script>
                            document.write(new Date().getFullYear())
                        </script><a href="http://codelocksolutions.in/"> Codelock Solution</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>