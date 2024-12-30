<?php
include 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
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
    <?php
        $para_array = array("title" => "Invoice Form", "link" => "invoice-list", "button_text" => "List Invoice");
        $title = $para_array['title'];
        $link = $para_array['link'];
        $button_text = $para_array['button_text'];
        include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-4">
      <div class="col-xl-12 mx-auto">
        <div class="card z-index-0 p-4 product-main">
          <form action="" id="invoice_frm" data-form-type="invoice">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="col w-100">
              <div class="row mb-3 main_invoicechange">
                <div class="col invoice-title">
                  <h1 class="text-normal fs-2 text-end">INVOICE</h1>
                  <input type="text"  class="form-control ms-auto text-end mb-3 invoice_no genrate" value="" name="invoice_no" readonly >
                </div>
                <div class="col mb-3 orderchange">
                  <div class="imageAppend form-control max-width-300">
                    <div class="drop-zone  invoice_imgorder">
                      <span class="pro-zone__prompt">Drop File Here Or Click To Upload</span>
                      <input type="file" name="i_image" id="removeImage" class="drop-zone__input">
                    </div>
                  </div>
                  <span class="errormsg i_image"></span>
                </div>
                <div class="col invoice-title1 invoice_order">
                  <h1 class="text-normal fs-2 text-end">INVOICE</h1>
                  <input type="text"  class="form-control invoice-inputbox ms-auto text-end genrate" value="" name="invoice_no" readonly>
                </div>
              </div>
            </div>
            <div class="col ">
              <div class="mb-3 ">
                <div class="row ">
                  <div class="col w-50 mb-3">
                    <textarea type="text" placeholder="Invoice Name" class="form-control valikey max-width-500" name="i_name"></textarea>
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
                <select class="form-select position-relative cursor-pointer" aria-label="Default select example" name="terms">
                          <option selected value="" disabled>Payment Terms</option>
                          <option value="online">online</option>
                          <option value="cash">cash</option>
                 </select>
                  <span class="errormsg "></span>
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
                  <input type="text" class="form-control mt-1 price " placeholder="Purchase Order Number" name="po_number">
                  <span class="errormsg po_number"></span>
                </div>
              </div>
            </div>
            <div class="table-scroll1">
              <div class="row">
                <table class="mt-4 custom-table" id="attributes">
                  <thead>
                    <tr>
                      <th class="w-70 bg-gradient text-light ps-3 text-bold">Item</th>
                      <th class="w-10 bg-gradient text-light text-center text-bold">Quantity</th>
                      <th class="w-10 bg-gradient text-light text-center text-bold">Rate</th>
                      <th class="w-10 bg-gradient text-light text-center text-bold">Amount</th>
                      <th class="w-10 bg-gradient text-light text-center text-bold">Action</th>
                    </tr>
                  </thead>
                  <tbody id="attributes-body" class="get_invoiceitem">
                    <tr class="attr">
                    <td class="item_0">
                        <input type="text" class="form-control mt-1 valid_invoice_item " placeholder="Item Title" name="item[]">
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
              <button class="btn bg-gradient-info add" type="button">+ ADD ITEM</button>
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
                  <span class="text-normal">Shipping Charges:</span>
                </div>
                <div class="col-xl ">
                  <input type="number" class="form-control mt-1" name="shipping_charges" placeholder="₹ 0.00">
                </div>
              </div>
              <div class="row  mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">Total :</span>
                </div>
                <div class="col-xl ">
                  <input type="text" class="form-control mt-1 price"  name="total" placeholder="₹ 0.00" disabled>
                 
                </div>
              </div>
              <div class="row  mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">Amount Paid :</span>
                </div>
                <div class="col-xl ">
                  <input type="text" class="form-control mt-1 price" name="amount_paid" placeholder="₹ 0.00">
                </div>
              </div>
              
              <div class="row  mt-2">
                <div class="col-xl mt-2">
                  <span class="text-normal">Balance Due :</span>
                </div>
                <div class="col-xl ">
                  <input type="text" class="form-control mt-1 price" name="balance_due" placeholder="₹ 0.00" disabled>
                  <span class="errormsg  balance_due"></span>
                </div>
              </div>
              
            </div>
            <div class="row mt-4">
              <div class="col w-50">
                <div class="row notes">
                  <span class="text-normal ps-0 fs-5"><strong>Notes :</strong></span>
                  <textarea name="notes" id="" placeholder="Notes - any relevant information not already covered" class="form-control invoice_notice mt-2"></textarea>
                </div>
                <div class="row mt-2">
                  <span class="text-normal ps-0 fs-5"><strong>Terms :</strong></span>
                  <textarea name="terms_condition" id="" placeholder="Terms and conditions - late fees, payment methods, delivery schedule" class="form-control invoice_notice mt-2"></textarea>
                </div>
              </div>
            </div>
            <div class="text-end mt-5">
              <button type="button"class="btn bg-gradient-info btn-sm invoice save_loader_show">Save</button>
              <button type="button" class="btn bg-gradient-info btn-sm cencle_loader_show formCancel">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="<?php echo main_url('admin/assets/js/common_11.js'); ?>"></script>
</body>

</html>
<script>
  var id = "<?php echo $id; ?>";
  if (id !== "") {
    get_invoice(id);

  }
</script>