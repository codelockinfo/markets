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
      <div class="col-xl-8 col-md-10 mx-auto">
        <div class="card z-index-0 p-4 product-main">
          <form action="">
            <div class="row w-100">
              <div class="col w-50">
                <div class="mb-3">
                  <div class="drop-zone form-control">
                    <span class="drop-zone__prompt">Drop file here or click to upload</span>
                    <input type="file" name="p_image" id="removeImage" class="drop-zone__input">
                  </div>
                </div>
                <div class="row">
                  <div class="col w-50 mb-3">
                    <textarea name="text" id="" placeholder="Who is this form?" class="form-control max-width-500"></textarea>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <span class="text-normal">Bill To</span>
                    <textarea name="text" id="" placeholder="Who is this form?" class="form-control max-width-400"></textarea>
                  </div>
                  <div class="col">
                    <span class="text-normal">Ship To</span>
                    <textarea name="text" id="" placeholder="Who is this form?" class="form-control max-width-400"></textarea>
                  </div>
                </div>
              </div>
              <div class="col w-50">
                <div class="row ms-auto text-end">
                  <h1 class="text-normal fs-2">INVOICE</h1>
                </div>
                <div class="row">
                  <input type="text" placeholder="1" class="form-control max-width-200 ms-auto text-end">
                </div>
                <div class="row ms-auto text-end mt-7">
                  <div class="col">
                    <span class="text-normal">Date</span>
                  </div>
                  <div class="col">
                    <input type="date" name="date" id="" class="form-control">
                  </div>
                </div>
                <div class="row ms-auto text-end mt-2">
                  <div class="col">
                    <span class="text-normal">Payment Terms</span>
                  </div>
                  <div class="col">
                    <input type="text" name="payment_terms" id="" class="form-control">
                  </div>
                </div>
                <div class="row ms-auto text-end mt-2">
                  <div class="col">
                    <span class="text-normal">Due Date</span>
                  </div>
                  <div class="col">
                    <input type="date" name="due-date" id="" class="form-control">
                  </div>
                </div>
                <div class="row ms-auto text-end mt-2">
                  <div class="col">
                    <span class="text-normal">PO Number</span>
                  </div>
                  <div class="col">
                    <input type="text" name="po-number" id="" class="form-control">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <table class="mt-4 w-100">
                <tr class="border-redius">
                  <th class="w-70 bg-gradient-info text-light ps-3 text-bold">item</th>
                  <th class="w-10 bg-gradient-info text-light ps-3 text-bold">Quantity</th>
                  <th class="w-10 bg-gradient-info text-light ps-3 text-bold">Rate</th>
                  <th class="w-10 bg-gradient-info text-light ps-3 text-bold">Amount</th>
                </tr>
                <tr>
                  <td><input type="description" class="form-control mt-1" placeholder="Description of item/service"></td>
                  <td><input type="description" class="form-control mt-1" placeholder="1"></td>
                  <td><input type="description" class="form-control mt-1" placeholder="₹ 0"></td>
                  <td class="text-center">₹ 0.00</td>
                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <td><input type="description" class="form-control mt-1" placeholder="Description of item/service"></td>
                  <td><input type="description" class="form-control mt-1" placeholder="1"></td>
                  <td><input type="description" class="form-control mt-1" placeholder="₹ 0"></td>
                  <td class="text-center">₹ 0.00</td>
                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                </tr>
                <tr>
                  <td><input type="description" class="form-control mt-1" placeholder="Description of item/service"></td>
                  <td><input type="description" class="form-control mt-1" placeholder="1"></td>
                  <td><input type="description" class="form-control mt-1" placeholder="₹ 0"></td>
                  <td class="text-center">₹ 0.00</td>
                  <td><i class="fa fa-times" aria-hidden="true"></i></td>
                </tr>
              </table>
              <div class="row max-width-200 mt-3">
                <button class="btn bg-gradient-info">+ Line Item</button>
              </div>
            </div>
            <div class="row w-100">
              <div class="col w-50">
                <div class="row">
                  <span class="text-normal ps-4">Notes</span>
                  <textarea name="text" id="" placeholder="Who is this form?" class="form-control max-width-500 mt-2"></textarea>
                </div>
                <div class="row mt-2">
                  <span class="text-normal ps-4">Terms</span>
                  <textarea name="text" id="" placeholder="Who is this form?" class="form-control max-width-500 mt-2"></textarea>
                </div>
              </div>
              <div class="col w-50">
                <div class="row ms-auto text-end">
                  <div class="col">
                    <span class="text-normal">Subtotal</span>
                  </div>
                  <div class="col text-center">
                    <span>₹ 0.00</span>
                  </div>
                </div>
                <div class="row ms-auto text-end w-90 mt-3">
                  <div class="col">
                    <button class="btn bg-gradient-info">+ Discount</button>
                  </div>
                  <div class="col text-center">
                    <button class="btn bg-gradient-info">+ Tax</button>
                  </div>
                  <div class="col text-center">
                    <button class="btn bg-gradient-info">+ Shipping</button>
                  </div>
                </div>
                <div class="row ms-auto text-end mt-2">
                  <div class="col">
                    <span class="text-normal">Total</span>
                  </div>
                  <div class="col text-center">
                    <span>₹ 0.00</span>
                  </div>
                </div>
                <div class="row ms-auto text-end mt-2">
                  <div class="col mt-2">
                    <span class="text-normal">Amount Paid</span>
                  </div>
                  <div class="col text-center">
                    <input type="description" class="form-control mt-1 max-width-200" placeholder="₹ 0">
                  </div>
                </div>
                <div class="row ms-auto text-end mt-2">
                  <div class="col">
                    <span class="text-normal">Balance Due</span>
                  </div>
                  <div class="col text-center">
                    <span>₹ 0.00</span>
                  </div>
                </div>
              </div>
            </div>
          </form>
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