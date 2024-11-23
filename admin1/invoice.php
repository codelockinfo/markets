<?php
include 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (!isset($_SESSION['current_user']['user_id'])) {
  header("Location: sign-in.php");
  die();
}
?>

<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.php';
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <?php
    $para_array = array("title" => "Invoice Form", "link" => "invoice-list.php", "button_text" => "list Invoice");
    $title = $para_array['title'];
    $link = $para_array['link'];
    $button_text = $para_array['button_text'];
    include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-4">
      <div class="col-xl-12 mx-auto">
        <div class="card z-index-0 p-4 product-main">
          <form action="" id="invoice_frm">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="col w-100">
              <div class="row mb-3 main_invoicechange">
                <div class="col invoice-title">
                  <h1 class="text-normal fs-2 text-end">INVOICE</h1>
                  <input type="text" placeholder="# 101" class="form-control ms-auto text-end mb-3 invoiceid" value="" readonly>
                </div>
                <div class="col mb-3 orderchange">
                  <div class="imageAppend form-control max-width-300">
                    <div class="drop-zone  invoice_imgorder">
                      <span class="pro-zone__prompt">Drop File Here Or Click To Upload</span>
                      <input type="file" name="i_image" id="removeimage" class="drop-zone__input">
                    </div>
                  </div>
                  <span class="errormsg i_image"></span>

                </div>
                <div class="col invoice-title1 invoice_order">
                  <h1 class="text-normal fs-2 text-end">INVOICE</h1>
                  <input type="text" placeholder="# 101" class="form-control invoice-inputbox ms-auto text-end invoiceid" value="" readonly>
                </div>
              </div>
            </div>
            <div class="col ">
              <div class="mb-3 ">
                <div class="row ">
                  <div class="col w-50 mb-3">
                    <textarea type="text" placeholder="Invoice Name" class="form-control validtext max-width-500" name="i_name"></textarea>
                    <span class="errormsg i_name"></span>

                  </div>
                </div>
                <div class="row mt-4 invoicename">
                  <div class="col-xl-6 mb-3">
                    <span class="text-normal"><strong>Bill To :</strong></span>
                    <textarea type="text" placeholder="Bill To" class="form-control valikey" name="bill_no"></textarea>
                    <span class="errormsg bill_no"></span>

                  </div>
                  <div class="col-xl-6">
                    <span class="text-normal"><strong>Ship To :</strong></span>
                    <textarea type="text" placeholder="Ship To " class="form-control valikey" name="ship_to"></textarea>
                    <span class="errormsg ship_to"></span>

                  </div>
                </div>
              </div>
            </div>
            <div class="col w-100">
              <div class="row">
                <div class="col-xl mt-2">
                  <span class="text-normal">Date :</span>
                </div>
                <div class="col-xl">
                  <input type="date" class="form-control price mt-1 date-input" name="date">
                  <span class="errormsg date"></span>

                </div>
              </div>
              <div class="row  mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">Payment Terms :</span>
                </div>
                <div class="col-xl ">
                  <input type="text" class="form-control validtext mt-1" placeholder="Payment Terms" name="terms">
                  <span class="errormsg terms"></span>

                </div>
              </div>
              <div class="row  mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">Due Date :</span>
                </div>
                <div class="col-xl">
                  <input type="date" class="form-control mt-1 price date-input " name="due_date">
                  <span class="errormsg due_date"></span>

                </div>
              </div>
              <div class="row  mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">PO Number :</span>
                </div>
                <div class="col-xl ">
                  <input type="text" class="form-control mt-1 price " placeholder=" Product Number" name="po_number">
                  <span class="errormsg po_number"></span>

                </div>
              </div>
            </div>
            <div class="table-scroll1">
              <div class="row">
                <table class="mt-4" id="attributes">
                  <thead>
                    <tr>
                      <th class="w-70 bg-gradient-info text-light ps-3 text-bold">Item</th>
                      <th class="w-10 bg-gradient-info text-light text-center text-bold">Quantity</th>
                      <th class="w-10 bg-gradient-info text-light text-center text-bold">Rate</th>
                      <th class="w-10 bg-gradient-info text-light text-center text-bold">Amount</th>
                      <th class="w-10 bg-gradient-info text-light text-center text-bold">Action</th>
                    </tr>
                  </thead>
                  <tbody id="attributes-body" class="get_invoiceitem">
                    <tr class="attr">
                    <td class="item_0">
                        <input type="text" class="form-control mt-1 validtext" placeholder="Item Title" name="item[]">
                        <span class="errormsg item_0"></span>
                      </td>
                      <td  class="quantity_0">
                        <input type="number" class="form-control mt-1 price" placeholder="1" name="quantity[]" min="1">
                        <span class="errormsg item_quantity quantity_0"></span>
                      </td>
                      <td class="rate_0">
                        <input type="text" class="form-control mt-1 price" placeholder="₹ 0" name="rate[]">
                        <span class="errormsg item_rate rate_0"></span>
                      </td>
                      <td>
                        <input type="text" class="form-control mt-1 price" placeholder="₹ 0.00" name="amount[]" disabled>
                        <span class="errormsg amount"></span>
                      </td>

                      <td class="invoice-rowclose"><i class="fa fa-times cursor-pointer remove" aria-hidden="true"></i></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="btn-group max-width-200 mt-3" role="group" aria-label="Basic example">
              <button class="btn bg-gradient-info add" type="button">+ Line Item</button>
            </div>


            <div class="col">
              <div class="row hidden">
                <div class="col-xl mt-2">
                  <span class="text-normal">Subtotal :</span>
                </div>
                <div class="col-xl">
                  <input type="text" class="form-control mt-1" placeholder="₹ 0.00" name="subtotal" disabled>
                </div>
              </div>
              <div class="row  mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">Total :</span>
                </div>
                <div class="col-xl ">
                  <input type="text" class="form-control mt-1 price"  name="total" placeholder="₹ 0.00" disabled>
                  <!-- <span class="errormsg amount_paid"></span> -->
                </div>
              </div>
              <div class="row  mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">Amount Paid :</span>
                </div>
                <div class="col-xl ampunt_p">
                  <input type="text" class="form-control mt-1 price" name="amount_paid" placeholder="₹ 0.00">
            
                </div>
              </div>
              <div class="row  mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">Balance Due :</span>
                </div>
                <div class="col-xl ">
                  <input type="text" class="form-control mt-1 price" name="balance_due" placeholder="₹ 0.00" disabled>
                  
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col w-50">
                <div class="row notes">
                  <span class="text-normal ps-0 fs-5"><strong>Notes :</strong></span>
                  <textarea name="notes" id="" placeholder="Notes - any relevant information not already covered" class="form-control max-width-500 mt-2"></textarea>
                </div>
                <div class="row mt-2 terms-condition">
                  <span class="text-normal ps-0 fs-5"><strong>Terms :</strong></span>
                  <textarea name="terms_condition" id="" placeholder="Terms and conditions - late fees, payment methods, delivery schedule" class="form-control max-width-500 mt-2"></textarea>
                </div>
              </div>
            </div>
          </form>
          <div class="text-end mt-5">
            <button class="btn bg-gradient-info invoice save_loader_show">Save</button>
          </div>
        </div>
      </div>
    </div>
    <div class="fixed-plugin">
      <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" href="tel:7600464414">
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
<script>
  var id = "<?php echo $id; ?>";
  if (id !== "") {
    get_invoice(id);
  }else{
    lastInsertedId("invoice","invoice_id");
  }
</script>