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
                Product Form
              </h5>
            </div>
          </div>
          <div class="col-auto col-lg-0 col-md-0 my-sm-auto ms-sm-auto me-sm-0 mx-auto">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active" href="<?php echo SITE_ADMIN_URL ?>product-list.php" role="tab" aria-selected="true">
                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(603.000000, 0.000000)">
                              <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                              </path>
                              <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                              <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1">Product List</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
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
                <div id="imagePreview"></div>
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
              <select class="js-select2  form-select mb-3 multiple_tag" aria-label="Default select example" multiple="multiple" name="p_tag">
                <option value="">Select products</option>
                <option value="Saree">Saree</option>
                <option value="Fashion">Fashion</option>
                <option value="Women">Women</option>
              </select>
              <span class="errormsg p_tag"></span>
            </div>
            <label for="p-description" class="font-weight-normal required">Product Description</label>
            <div class="mb-3">
              <textarea id="pro-description" class="w-100 form-control validtext" name="p_description"></textarea>
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