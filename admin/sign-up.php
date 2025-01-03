<?php
include 'header.php';
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
                  <a class="nav-link me-2" href="<?php echo SITE_ADMIN_URL ?>sign-in" >
                    <i class="fas fa-key opacity-6 text-dark me-1"></i>
                    Sign In
                  </a>
                </li>
              </ul>
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a href="<?php echo CLS_SITE_URL; ?>" target="_blank" class="btn bg-gradient-info btn-sm btn-round mb-0 me-1">Preview</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <main class="main-content">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-9">
                <div class="card-header text-center py-0 mb-0">
                  <h3 class="font-weight-bolder text-info text-gradient">Register</h3>
                </div>
                <div class="card-body card_body_form">
                  <form role="form" id="savesignup" enctype="multipart/form-data" method="POST">
                  <input type="hidden" class="verify"  name="verify_email_token" />

                    <div class="mb-3 ">
                      <input type="text" class="form-control change_remove form-control valikey"  placeholder="Enter Your Name" name="name" />
                      <span class="errormsg name"></span>
                    </div>
                    <div class="mb-3">
                      <div class="tooltip-container">
                        <input type="text" class="form-control position-relative change_remove form-control valikey" placeholder="Shop Name " name="shop">
                        <i class="fa-solid fa-exclamation tooltip-icon position-absolute"></i>
                        <h6 class="tooltiptext">Enter your shop name or markert name</h6>
                      </div>
                      <span class="errormsg shop"></span>
                    </div>
                    <div class="mb-3">
                      <input type="email" class="form-control change_removeform-control valikey" placeholder="Email" id="email" aria-label="Email" aria-describedby="email-addon" name="email">
                      <span class="errormsg email"></span>
                    </div>
                    <div class="mb-3">
                      <input type="number" class="form-control price valikey change_remove number" placeholder="Mobile No." name="phone_number">
                      <span class="errormsg phone_number"></span>
                    </div>
                    <div class="mb-3">
                      <div class="tooltip-container">
                        <select class="form-select change_remove position-relative" aria-label="Default select example" name="business_type">
                          <option selected value="" disabled>Your Business Type</option>
                          <option value="0">Manufacturer</option>
                          <option value="1">wholesaler</option>
                        </select>
                        <i class="fa-solid fa-exclamation tooltip-icon position-absolute"></i>
                        <h6 class="tooltiptext"> Choice any one business  </h6>
                      </div>
                      <span class="errormsg business_type"></span>
                    </div>
                    <div class="mb-2">
                      <label>Shop Image</label>
                      <img id="newpreview" src="" alt="Image Preview">
                      <div class="tooltip-container">
                        <input id="shop_image_Input" type="file" class="form-control signImage position-relative" name="shop_img">
                        <i class="fa-solid fa-exclamation tooltip-icon position-absolute"></i>
                        <h6 class="tooltiptext_img">Choose a file that represents your shop accurately.</h6>
                      </div>

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
                      <textarea class="form-control change_remove valikey" placeholder="Shop address" name="address"></textarea>
                      <span class="errormsg address"></span>
                    </div>
                    <div class="mb-2">
                      <label>Shop Logo Image</label>
                      <img id="shop_logo_preview" src="" alt="Shop logo Image Preview">
                      <div class="tooltip-container">
                        <input id="shop_logo_image" type="file" class="form-control signImage position-relative" name="shop_logo">
                        <i class="fa-solid fa-exclamation tooltip-icon position-absolute"></i>
                        <h6 class="tooltiptext_img"> Choose a file that represents your shop logo accurately. </h6>
                      </div>
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
                      <input type="password" class="form-control change_remove password valikey" placeholder="Password" aria-label="Password" aria-describedby="password-addon" name="password">
                      <span class="errormsg password"></span>
                    </div>
                    <div class="mb-3">
                      <input type="password" class="form-control change_remove Confirm_Password valikey" placeholder="Confirm Password" aria-label="Password" aria-describedby="password-addon" name="Confirm_Password">
                      <span class="errormsg Confirm_Password"></span>
                    </div>
                    <div class="text-center">
                      <button type="button" class="btn bg-gradient-info w-100 mt-0 mb-0 signUpsave save_loader_show">Sign up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-1 text-sm mx-auto mt-4">
                    Already have an account?
                    <a href="<?php echo SITE_ADMIN_URL ?>sign-in"  class="text-info text-gradient font-weight-bold">Sign in</a>


                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="b-img position-absolute top-0 d-md-block d-none me-n8">
                <div class="b-img1 bg-cover position-absolute fixed-top ms-auto z-index-0 ms-n6" style="background-image:url('assets/img/texttilehub.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
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
      </div>
      <div class="row">
        <div class="mx-auto text-center mt-0">
          <p class="mb-0 text-secondary">
            Copyright © <script>
              document.write(new Date().getFullYear())
            </script><a href="http://codelocksolutions.in/"  target="_blank"> Codelock Solution</a>
          </p>
        </div>
      </div>
    </div>
  </footer>
  </main>
</body>
</html>