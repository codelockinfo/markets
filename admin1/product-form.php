<?php
include 'header.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
if (!isset($_SESSION['current_user']['user_id'])) {
  header("Location: sign-in.php");
  die();
}
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
</head>
 
<body class="g-sidenav-show bg-gray-100">
  <?php
  include 'sidebar.php';
  ?>
  <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    <?php
        $para_array = array("title" => "Product Form", "link" => "product-list.php", "button_text" => "Product List");
        $title = $para_array['title']; 
        $link = $para_array['link'];
        $button_text = $para_array['button_text'];
        include 'adminheadertop.php';
    ?>
    <div class="container-fluid py-4">
      <div class="col-xl-6 col-lg-9 col-md-6 mx-auto">
        <div class="card z-index-0 p-3 product-main">
          <form role="form" id="productinsert" enctype="multipart/form-data" method="POST">
          <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <label for="title" class="font-weight-normal required">Product Title</label>
            <div class="mb-3">
              <input type="text" class="form-control validtext product w-100" placeholder="Product Title" name="pname">
              <span class="errormsg pname"></span>
            </div>
            <label for="p-tags" class="font-weight-normal required w-100">Product Category</label>
            <div class="mb-3 row">
              <div class="col">
                <select class="form-select required" aria-label="Default select example" name="select_catagory">
                  <option selected value="">Select Category</option>
                  <!-- <option value="1">Armwear</option>
                  <option value="2">Badges</option>
                  <option value="3">Belts</option>
                  <option value="4">Children's clothing</option>
                  <option value="5">Clothing brands by type</option>
                  <option value="6">Coats</option>
                  <option value="7">Dresses</option>
                  <option value="8">Footwear</option>
                  <option value="9">Gowns</option>
                  <option value="10">Handwear</option>
                  <option value="11">Hosiery</option>
                  <option value="12">Jackets</option>
                  <option value="13">Jeans by type</option>
                  <option value="14">Knee clothing</option>
                  <option value="15">Masks</option>
                  <option value="16">Neckwear</option>
                  <option value="17">One-piece suits</option>
                  <option value="18">Outerwear</option>
                  <option value="19">Ponchos</option>
                  <option value="20">Robes and cloaks</option>
                  <option value="21">Royal attire</option>
                  <option value="22">Saris</option>
                  <option value="23">Sashes</option>
                  <option value="24">Shawls and wraps</option>
                  <option value="25">Skirts</option>
                  <option value="26">Sportswear</option>
                  <option value="27">Suits</option>
                  <option value="28">Tops</option>
                  <option value="29">Trousers and shorts</option>
                  <option value="30">Undergarments</option>
                  <option value="31">Wedding clothing</option> -->
                </select>
                <div class="errormsg select_catagory"></div>
              </div>             
              <div class="col quantity1">
                <div class="d-flex flex-row justify-content-between">
                  <div class="d-flex flex-row align-self-center product_data w-100" id="qty_select">
                    <input type="hidden" value=" 1 " min="1" class="prod_id">
                    <div class="input-group text-center" id="qty_selector">
                      <a class="decrement-btn" id="decrement-btn">
                        <i class="fa fa-minus"></i>
                      </a>
                      <input type="text" readonly="readonly" name="qty" id="qty_display" class="qty-input text-center form-control" value="1"/>
                      <a class="increment-btn ">
                        <i class="fa fa-plus" id="increment-btn"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3">
                <div>
                  <label class="font-weight-normal w-100"><input type="checkbox" name="addcheckboxcategory" class="addcategory mx-3" value="1"/>Add Categories</label>
                  <div class="categoryinput hidecategory">
                    <input type="text" name="addcategory" class="form-control w-100"/>
                    <div class="errormsg addcategory"></div>
                  </div>
                </div>
            </div>
            <div class="mb-3 quantity2">
              <div class="d-flex flex-row justify-content-between">
                <div class="d-flex flex-row align-self-center product_data w-100" id="qty_select">
                  <input type="hidden" value=" 1 " class="prod_id">
                  <div class="input-group text-center" id="qty_selector">
                    <a class="decrement-btn">
                      <i class="fa fa-minus"></i>
                    </a>
                    <input type="text" readonly="readonly"  id="qty_display" class="qty-input text-center form-control" value="1" />
                    <a class="increment-btn">
                      <i class="fa fa-plus"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <label for="title" class="font-weight-normal w-100">SKU</label>
            <div class="mb-3">
              <input type="text" class="form-control w-100" placeholder="SKU" name="sku">
              <div class="errormsg sku"></div>
            </div>
            <label for="title" class="font-weight-normal required w-100">Product Price</label>
            <div class="mb-3 row">
              <div class="col">
                <input type="number" class="form-control price w-100" placeholder="Min Price" name="min_price">
                <span class="errormsg min_price"></span>
              </div>
              <span class="col text-center price1">To</span>
              <div class="col">
                <input type="number" class="form-control price  w-100" placeholder="Max Price" name="max_price">
                <span class="errormsg max_price"></span>
              </div>
            </div>
            <label for="p-image" class="font-weight-normal required">Product Image</label>
            <div class="mb-3">
              <div class="pro-zone form-control">
                <span class="pro-zone__prompt">Drop file here or click to upload</span>  
                <input type="file" name="p_image[]" id="imageUpload" multiple accept="image/*" class="pro-zone__input">
                <!-- <div id="imagePreview"></div>  -->
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

            <label for="text" class="font-weight-normal">Image Alt</label>
            <div class="mb-3">
              <input type="text" class="form-control validtext" placeholder="Image Alt" name="image_alt">
              <span class="errormsg image_alt"></span>
            </div>
            <label for="text" class="font-weight-normal">Product Tag</label>
            <div class="mb-3">
              <select class="js-select2  form-select mb-3 multiple_tag form-control  w-100" aria-label="Default select example" multiple="multiple" name="p_tag">
                <option value="">Select products</option>
                <option value="Saree">Saree</option>
                <option value="Fashion">Fashion</option>
                <option value="Women">Women</option>
              </select>
              <span class="errormsg p_tag"></span>
            </div>
            <label for="p-description" class="font-weight-normal required">Product Description</label>
            <div class="mb-3">
              <textarea id="pro-description" class="w-100 form-control validtext" name="p_description" placeholder="Product Description"></textarea>
              <span class="errormsg p_description"></span>
            </div>
            <div class="mb-3">
              <button type="button" class="btn bg-gradient-info btn-sm productSave save_loader_show">Save</button>
              <button type="button" class="btn bg-gradient-info btn-sm pform_reset formCancel">Cancel</button>
            </div>
            <!-- <div class="alert" role="alert" id="success_message" name="success_alert"></div> -->
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" href="tel:+917600464414">
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
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script> -->
</body>

</html>

<script>
    get_Categories();
    var id = "<?php echo $id; ?>";
    get_product(id);

    $(".js-select2").select2({
  closeOnSelect : false,
  placeholder : "select product",

  allowHtml: true,
  allowClear: true,
  tags: true 
});
</script>