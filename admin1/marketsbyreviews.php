<?php
include 'header.php';
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
      <div class="card card-body blur shadow-blur mx-4 mt-n5 p-4 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto mx-auto ms-sm-3 mt-2">
            <div class="h-100">
              <h5 class="mb-1">
                Markets By Reviews
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-6 col-lg-9 col-md-6 mx-auto">
          <div class="card z-index-0 p-3 product-main">
            <form role="form" id="productinsert" enctype="multipart/form-data" method="POST">
              <label for="p-image" class="font-weight-normal required">Shop Logo</label>
              <div class="mb-3">
                <div class="drop-zone form-control">
                  <span class="drop-zone__prompt">Drop file here or click to upload</span>
                  <input type="file" name="p_image" id="removeImage" class="drop-zone__input">
                </div>
                <div class="col">
                  <div class="row mt-2">
                    <label class="font-weight-normal"><strong>Allowed File Types:</strong> PNG,JPG,JPEG,GIF</label>
                  </div>
                  <div class="row mt-lg-n1">
                    <label class="font-weight-normal"><strong>Size Limit:</strong> Each file should not exceed 5MB</label>
                  </div>
                </div>
                <div class="errormsg myFile p_image"></div>
              </div>
              <label for="p-description" class="font-weight-normal required">Shop Description</label>
              <div class="mb-3">
                <textarea id="shop-description" class="w-100 form-control validtext" name="p_description"></textarea>
                <span class="errormsg p_description"></span>
              </div>
              <label for="name" class="font-weight-normal required">Shop Name</label>
              <div class="mb-3">
                <input type="text" class="form-control validtext product w-100" placeholder="Shop Name" name="pname">
                <span class="errormsg pname"></span>
              </div>
              <label for="review" class="font-weight-normal required">Shop Reviews</label>
              <div class="mb-3">
                <input type="text" class="form-control validtext product w-100" placeholder="Shop Reviews" name="pname">
                <span class="errormsg pname"></span>
              </div>
              <div class="mb-3">
                <button type="button" class="btn bg-gradient-info btn-sm productSave save_loader_show">Save</button>
                <button type="button" class="btn bg-gradient-info btn-sm pform_reset formCancel">Cancel</button>
              </div>
              <!-- <div class="alert" role="alert" id="success_message" name="success_alert"></div> -->
            </form>
          </div>
        </div>
        <div class="col-xl-6 col-md-6 mx-auto main-sec">
          <div class="card z-index-0 p-3">
            <div class="row">
              <div class="mb-3 form-check-reverse text-right ">
                <div class="container">
                  <div class="btn-group">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-md-6 mb-xl-0 mb-2">
                <div class="card card-blog card-plain">
                  <div class="position-relative">
                    <a class="d-block border-radius-xl">
                      <img src="<?php echo main_url('/admin1/assets/img/kurti/msg-1001446435108-2955.jpg'); ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg mb-3 mt-3">
                    </a>
                  </div>
                  <div class="d-flex justify-content-between mb-3">
                    <div class="ms-auto text-end">
                      <button type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0">Delete</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-md-6 mb-xl-0 mb-2">
                <div class="card card-blog card-plain">
                  <div class="position-relative">
                    <a class="d-block border-radius-xl">
                      <img src="<?php echo main_url('/admin1/assets/img/kurti/msg-1001446435108-2955.jpg'); ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg mb-3 mt-3">
                    </a>
                  </div>
                  <div class="d-flex justify-content-between mb-3">
                    <div class="ms-auto text-end">
                      <button type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0">Delete</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-md-6 mb-xl-0 mb-2">
                <div class="card card-blog card-plain">
                  <div class="position-relative">
                    <a class="d-block border-radius-xl">
                      <img src="<?php echo main_url('/admin1/assets/img/kurti/msg-1001446435108-2955.jpg'); ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg mb-3 mt-3">
                    </a>
                  </div>
                  <div class="d-flex justify-content-between mb-3">
                    <div class="ms-auto text-end">
                      <button type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0">Delete</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-md-6 mb-xl-0 mb-2">
                <div class="card card-blog card-plain">
                  <div class="position-relative">
                    <a class="d-block border-radius-xl">
                      <img src="<?php echo main_url('/admin1/assets/img/kurti/msg-1001446435108-2955.jpg'); ?>" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg mb-3 mt-3">
                    </a>
                  </div>
                  <div class="d-flex justify-content-between mb-3">
                    <div class="ms-auto text-end">
                      <button type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0">Delete</button>
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
  <script src="<?php echo main_url('/admin1/assets/js/common.js'); ?>"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
</body>

</html>