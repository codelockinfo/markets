<?php
include 'header.php';
require_once 'googleconfig.php';
if (isset($_SESSION['current_user']['user_id'])) {
    header("Location: /");
}
$errorMessage = (isset($_SESSION['errorMessage']) && $_SESSION['errorMessage'] !== '') ? $_SESSION['errorMessage'] : '';
?>
<body class="bg-white">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid">
                        <a class="navbar-brand font-weight-bolder ms-lg-0" href="<?php echo CLS_SITE_URL; ?>">
                            <!-- Market Search -->
                            <img src="<?php echo SITE_ADMIN_URL ?>/assets/img/admin_logo.png" class="headerlogowidth"/>
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navigation">
                            <ul class="navbar-nav ">
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="<?php echo SITE_ADMIN_URL ?>sign-up" >
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        Sign Up
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
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-9">
                            <div class="card-header text-left bg-transparent text-center card-space1">
                                <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                                <p class="mb-0">Enter your email and password to sign in</p>
                                <h5 class="errormsg error-msg"> <?php echo $errorMessage; ?></h5>
                            </div>
                            <div class="card-body card-space">
                                <form role="form" id="savesignin">
                                    <span class="errormsg"></span>
                                    <label>Email</label>
                                    <div class=" mb-3">
                                        <input type="email" name="email" class="form-control valikey" id="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                        <span class="errormsg email"></span>
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control valikey" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                        <span class="errormsg password"></span>
                                    </div>
                                    <div class="text-center">
                                        <button type="button" class="btn bg-gradient-info w-100 mt-0 mb-0 save_loader_show  signInsave">Sign in</button>
                                    </div>
                                    <div class="mt-3 position-relative text-center mb-3">
                                        <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                                            or
                                        </p>
                                    </div>
                                    
                                    <div class="row ms-0 w-100">
                                            <a class="btn text-dark btn-outline-dark " href='<?php echo $client->createAuthUrl(); ?>'>
                                                <svg class="img-fluid google" width="30px" height="20px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g id="google-icon" transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                                                            <path d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267" id="Path" fill="#4285F4"></path>
                                                            <path d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667" id="Path" fill="#34A853"></path>
                                                            <path d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782" id="Path" fill="#FBBC05"></path>
                                                            <path d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769" id="Path" fill="#EB4335"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <span class="">Sign in with google</span>
                                            </a>
                                    </div>
                                   
                            </div>
                            <div class="text-center mb-2 position-relative">
                                <a href="forget-password" class="font-weight-bold">Forget Password ?</a>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Don't have an account?
                                    <a href="<?php echo SITE_ADMIN_URL ?>sign-up" class="text-info text-gradient   font-weight-bold ">Sign up</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    </form>
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
                    <a href="<?php echo CLS_SITE_URL ?>about-us" target="_blank" class="text-secondary me-3 mb-sm-0 mb-0">
                        About Us
                    </a>
                    <a href="<?php echo CLS_SITE_URL ?>product" target="_blank" class="text-secondary me-3 mb-sm-0 mb-2">
                        Products
                    </a>
                    <a href="<?php echo CLS_SITE_URL ?>blog" target="_blank" class="text-secondary  me-3 mb-sm-0 mb-2">
                        Blog
                    </a>
                </div>
            
            </div>
            <div class="row">
                <div class="mx-auto text-center mt-0">
                    <p class="mb-0 text-secondary">
                        Copyright © <script>
                            document.write(new Date().getFullYear())
                        </script><a href="http://codelocksolutions.in/"  target="_blank">Codelock Solution</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>