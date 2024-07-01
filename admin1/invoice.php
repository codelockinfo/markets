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
                Invoice
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid py-4">
      <div class="col-xl-6 mx-auto">
        <div class="card z-index-0 p-4 product-main">
          <form action="">
            <div class="col w-100">
              <div class="row mb-3">
                <div class="col mb-3">
                  <div class="drop-zone form-control max-width-300">
                    <span class="drop-zone__prompt">Drop file here or click to upload</span>
                    <input type="file" name="p_image" id="removeImage" class="drop-zone__input">
                  </div>
                </div>
                <div class="col">
                  <h1 class="text-normal fs-2 text-end">INVOICE</h1>
                  <input type="text" placeholder="# 101" class="form-control max-width-200 ms-auto text-end">
                </div>
              </div>
            </div>
            <div class="col w-100">
              <div class="row mb-3">
                <div class="row">
                  <div class="col w-50 mb-3">
                    <textarea name="text" id="" placeholder="Who is this form?" class="form-control max-width-500"></textarea>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-xl-6 mb-3">
                    <span class="text-normal"><strong>Bill To :</strong></span>
                    <textarea name="text" id="" placeholder="Who is this form?" class="form-control"></textarea>
                  </div>
                  <div class="col-xl-6">
                    <span class="text-normal"><strong>Ship To :</strong></span>
                    <textarea name="text" id="" placeholder="Who is this form?" class="form-control"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="col w-100">
              <div class="row w-60">
                <div class="col-xl mt-2">
                  <span class="text-normal">Date :</span>
                </div>
                <div class="col-xl">
                  <input type="date" class="form-control mt-1 max-width-200" placeholder="₹ 0.00">
                </div>
              </div>
              <div class="row w-60 mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">Payment Terms :</span>
                </div>
                <div class="col-xl">
                  <input type="text" class="form-control mt-1 max-width-200">
                </div>
              </div>
              <div class="row w-60 mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">Due Date :</span>
                </div>
                <div class="col-xl">
                  <input type="date" class="form-control mt-1 max-width-200" placeholder="₹ 0.00">
                </div>
              </div>
              <div class="row w-60 mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">PO Number :

                  </span>
                </div>
                <div class="col-xl">
                  <input type="text" class="form-control mt-1 max-width-200">
                </div>
              </div>
            </div>
            <div class="row table-scroll1" id="attributes"    >
              <table class="mt-4 w-100">
                <tr class="border-redius">
                  <th class="w-70 bg-gradient-info text-light ps-3 text-bold">item</th>
                  <th class="w-10 bg-gradient-info text-light text-center text-bold">Quantity</th>
                  <th class="w-10 bg-gradient-info text-light text-center text-bold">Rate</th>
                  <th class="w-10 bg-gradient-info text-light text-center text-bold">Amount</th>
                </tr>
                <tr class="attr">
                  <td><input type="description" class="form-control mt-1" placeholder="Description of item/service"></td>
                  <td><input type="description" class="form-control mt-1" placeholder="1"></td>
                  <td><input type="description" class="form-control mt-1" placeholder="₹ 0"></td>
                  <td class="text-center">₹ 0.00</td>
                  <td><i class="fa fa-times remove" aria-hidden="true"></i></td>
                </tr>
              </table>
            </div>
            <div class="btn-group max-width-200 mt-3" role="group" aria-label="Basic example">
                <button class="btn bg-gradient-info add" type="button">+ Line Item</button>
              </div>
            <div class="col w-60">
              <div class="row">
                <div class="col-xl mt-2">
                  <span class="text-normal">Subtotal :</span>
                </div>
                <div class="col-xl">
                  <input type="description" class="form-control mt-1 max-width-200" placeholder="₹ 0.00">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">Total :</span>
                </div>
                <div class="col-xl">
                  <input type="description" class="form-control mt-1 max-width-200" placeholder="₹ 0.00">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">Amount Paid :</span>
                </div>
                <div class="col-xl">
                  <input type="description" class="form-control mt-1 max-width-200" placeholder="₹ 0.00">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">Balance Due :</span>
                </div>
                <div class="col-xl">
                  <input type="description" class="form-control mt-1 max-width-200" placeholder="₹ 0.00">
                </div>
              </div>
            </div>
            <div class="btn-group  mt-3" role="group" aria-label="Basic example">
              <button type="button" class="btn bg-gradient-info">+ Discount</button>
              <button type="button" class="btn bg-gradient-info">+ Tax</button>
              <button type="button" class="btn bg-gradient-info">+ Shipping</button>
            </div>
            <div class="row w-100 mt-4">
              <div class="col w-50">
                <div class="row">
                  <span class="text-normal ps-4 fs-5"><strong>Notes :</strong></span>
                  <textarea name="text" id="" placeholder="Who is this form?" class="form-control max-width-500 mt-2"></textarea>
                </div>
                <div class="row mt-2">
                  <span class="text-normal ps-4 fs-5"><strong>Terms :</strong></span>
                  <textarea name="text" id="" placeholder="Who is this form?" class="form-control max-width-500 mt-2"></textarea>
                </div>
              </div>
            </div>
          </form>
          <div class="text-end mt-5">
            <button class="btn bg-gradient-info">Download</button>
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
</body>

</html>