<?php
include 'header.php';
?>

<body class="bg-white">
  <!-- Navbar -->
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="<?php echo CLS_SITE_URL; ?>">
              Market Search
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
                <!-- <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="#">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="profile.html">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Profile
                  </a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link me-2" href="<?php echo SITE_ADMIN_URL ?>sign-in.php">
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign In
                  </a>
                </li>
              </ul>
              <!-- <li class="nav-item d-flex align-items-center">
                <a class="btn btn-round btn-sm mb-0 btn-outline-primary me-2" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-soft-ui-dashboard">Online Builder</a>
              </li> -->
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="<?php echo CLS_SITE_URL; ?>" target="_blank" class="btn bg-gradient-info btn-sm btn-round mb-0 me-1">Preview</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-7">
                <div class="card-header text-center py-0 mb-0">
                  <h3 class="font-weight-bolder text-info text-gradient">Register</h3>
                </div>
                <div class="card-body card_body_form">
                  <form role="form" id="savesignup" enctype="multipart/form-data" method="POST">
                    <div class="mb-3">
                      <input type="fname" class="form-control validsignf" placeholder="Enter Your Name" name="name">
                      <span class="errormsg name"></span>
                    </div>
                    <div class="mb-3">
                      <input type="shopname" class="form-control validsignf" placeholder="Shop Name" name="shop">
                      <span class="errormsg shop"></span>
                    </div>
                    <div class="mb-3">
                      <input type="email" class="form-control validsignf" placeholder="Email" aria-label="Email" aria-describedby="email-addon" name="email">
                      <span class="errormsg email"></span>
                    </div>
                    <div class="mb-3">
                      <input type="tel" class="form-control number" placeholder="Mobile No." name="phone_number">
                      <span class="errormsg phone_number"></span>
                    </div>
                    <div class="mb-3">
                      <select class="form-select" aria-label="Default select example" name="business_type">
                        <option selected value="">Your Business Type</option>
                        <option value="0">Retail</option>
                        <option value="1">Wholesale</option>
                      </select>
                      <span class="errormsg business_type"></span>
                    </div>
                    <div class="mb-2">
                    <label>Shop Image</label>
                    <img id="newpreview" src="" alt="Image Preview">
                    <input id="shop_image_Input" type="file" class="form-control signImage" name="shop_img"> 
              
                      <div class="col">
                        <div class="row mt-2">
                          <label class="font-weight-normal"><strong>Allowed File Types:</strong> PNG,JPG,JPEG,GIF</label>
                        </div>
                        <div class="row mt-lg-n1">
                          <label class="font-weight-normal"><strong>Size Limit:</strong> Each file should not exceed 5MB</label>
                        </div>
                      </div>
                      <div class="errormsg shop_img imageError"></div>
                    </div>
                    <div class="mb-3">
                      <input type="address" class="form-control validsignf" placeholder="Address" name="address">
                      <span class="errormsg address"></span>
                    </div>
                    <div class="mb-2">
                      <label>Shop Logo Image</label>
                      <img id="shop_logo_preview" src="" alt="Shop logo Image Preview">
                      <input id="shop_logo_image" type="file" class="form-control signImage" name="shop_logo">
                      <div class="col">
                        <div class="row mt-2">
                          <label class="font-weight-normal"><strong>Allowed File Types:</strong> PNG,JPG,JPEG,GIF</label>
                        </div>
                        <div class="row mt-lg-n1">
                          <label class="font-weight-normal"><strong>Size Limit:</strong> Each file should not exceed 5MB</label>
                        </div>
                      </div>
                      <div class="errormsg shop_logo imageError"></div>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control password validsignf" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password">
                      <span class="errormsg password"></span>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control Confirm_Password validsignf" placeholder="Confirm Password" aria-label="Password" aria-describedby="password-addon" name="Confirm_Password">
                      <span class="errormsg Confirm_Password"></span>
                    </div>
                    <!-- <div class="text-center">
                      <button type="button" class="btn btn-primary bg-dark btn-sm signUpsave save_loader_show">Save</button>
                      <button type="button" class="btn btn-secondary bg-dark btn-sm formCancel signUpcancel">Cancel</button>
                    </div> -->
                    <div class="text-center">
                      <button type="button" class="btn bg-gradient-info w-100 mt-0 mb-0 signUpsave save_loader_show">Sign up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-1 text-sm mx-auto">
                    Already have an account?
                    <a href="<?php echo SITE_ADMIN_URL ?>sign-in.php" class="text-info text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="b-img position-absolute top-0 d-md-block d-none me-n8">
                <div class="b-img1 bg-cover position-absolute fixed-top ms-auto z-index-0 ms-n6" style="background-image:url('assets/img/698472_R-1049.jpeg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer mt-3 py-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-0 mx-auto text-center">
          <a href="<?php echo CLS_SITE_URL ?>about-us.php" target="_blank" class="text-secondary me-3 mb-sm-0 mb-0">
            About Us
          </a>
          <a href="<?php echo CLS_SITE_URL ?>product.php" target="_blank" class="text-secondary me-3 mb-sm-0 mb-2">
            Products
          </a>
          <a href="<?php echo CLS_SITE_URL ?>blog.php" target="_blank" class="text-secondary me-3 mb-sm-0 mb-2">
            Blog
          </a>
        </div>
        <!-- <div class="col-lg-8 mx-auto text-center mb-4 mt-2">
            <a href="#" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-dribbble"></span>
            </a>
            <a href="#" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-twitter"></span>
            </a>
            <a href="#" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-instagram"></span>
            </a>
            <a href="#" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-pinterest"></span>
            </a>
            <a href="#" target="_blank" class="text-secondary me-xl-4 me-4">
              <span class="text-lg fab fa-github"></span>
            </a>
          </div> -->
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
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  </main>
</body>

</html>