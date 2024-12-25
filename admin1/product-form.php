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
        <div class="card z-index-0 p-3">
        <form role="form" id="productinsert" enctype="multipart/form-data" method="POST" data-form-type="product">
          <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <label for="title" class="font-weight-normal required">Product Title</label>
            <div class="mb-3">
              <input type="text" class="form-control valikey product w-100" placeholder="Product Title" name="pname">
              <span class="errormsg pname"></span>
            </div>
            <label for="p-tags" class="font-weight-normal required w-100">Product Category</label>
            <div class="mb-3 row">
              <div class="col">
                <select class="form-select required" aria-label="Default select example" name="select_catagory">
                  <option selected value="">Select Category</option>
                </select>
                <div class="errormsg select_catagory"></div>
              </div>             
              <div class="col quantity1">
                <div class="d-flex flex-row justify-content-between">
                  <div class="d-flex flex-row align-self-center product_data w-100" id="qty_select">
                    <input type="hidden" value=" 1 " min="1" class="prod_id">
                    <div class="input-group text-center" id="qty_selector">
                      <a class="decrement-btn cursor-pointer" id="decrement-btn">
                        <i class="fa fa-minus"></i>
                      </a>
                      <input type="text" name="qty" id="qty_display" class="qty-input text-center form-control" value="1"/>
                      <a class="increment-btn cursor-pointer">
                        <i class="fa fa-plus" id="increment-btn"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3">
                <div>
                  <label class="font-weight-normal w-100 checkboxcategory">
                    <input type="checkbox" name="addcheckboxcategory" class="addcategory mx-3 d-none " value="1"/>
                    <i class="fa fa-plus me-1" id="decrement-btn" aria-hidden="true"></i>Add a new category
                  </label>
                  <div class="categoryinput hidecategory">
                    <input type="text" name="addcategory"class="form-control w-100" placeholder="Add more category"/>
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
                    <input type="text"  id="qty_display" class="qty-input text-center form-control" value="1" />
                    <a class="increment-btn">
                      <i class="fa fa-plus"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <label for="title" class="font-weight-normal w-100 ">SKU</label>
            <div class="mb-3">
              <input type="text" class="form-control valikey w-100" placeholder="SKU" name="sku">
              <div class="errormsg sku"></div>
            </div>
            <label for="title" class="font-weight-normal required w-100">Product Price</label>
            <div class="mb-3 row align-items-center">
              <div class="col-5">
                <input type="number" class="form-control price w-100" placeholder="Min Price" name="min_price">
                <span class="errormsg min_price"></span>
              </div>
              <span class="col-2 text-center price1">To</span>
              <div class="col-5">
                <input type="number" class="form-control price  w-100" placeholder="Max Price" name="max_price">
                <span class="errormsg max_price"></span>
              </div>
            </div>
            <label class="font-weight-normal required ">Product Main Image</label>
            <div class="mb-3">
              <div class="productMainImageAppend form-control">
                <div class="drop-zone">
                  <span class="pro-zone__prompt">Drop File Here Or Click To Upload</span>
                  <input type="file" name="productmain_image" id="removeImage" class="drop-zone__input validsimg">
                </div>
              </div>
              <div>
                <div class="row mt-2">
                  <label class="font-weight-normal"><strong>Allowed File Types:</strong> PNG,JPG,JPEG,GIF</label>
                </div>
                <div class="row mt-lg-n1">
                  <label class="font-weight-normal"><strong>Size Limit:</strong> Each file should not exceed 5MB</label>
                </div>
              </div>
              <div class="errormsg myFile productmain_image" ></div>
            </div>
            <label for="p-image" class="font-weight-normal required">Product Image</label>
            <div class="mb-3">
              <div class="imageAppend form-control d-flex flex-wrap  justify-content-center align-items-center  get_pro">
                <div class="pro-zone">
                  <span class="pro-zone__prompt ">Drop file here or click to upload</span>  
                  
                  <input type="file" name="p_image[]" id="imageUpload" multiple accept="image/*" class="pro-zone__input validtext">
                  <label for="files" class="file-label"> 
                    <span class="choose-text">Choose Files</span> 
                  </label>
                </div>
              </div>
              <div>
                <div class="row mt-2">
                  <label class="font-weight-normal"><strong>Allowed File Types:</strong> PNG,JPG,JPEG,GIF</label>
                </div>
                <div class="row mt-lg-n1">
                  <label class="font-weight-normal"><strong>Size Limit:</strong> Each file should not exceed 5MB</label>
                </div>
              </div>
              <div class="errormsg myFile p_image"></div>
            </div>
            <div class="mb-3 row">
              <div class="col">

                <label for="text" class="font-weight-normal">Select Cloth</label>
              <select class="form-select position-relative cursor-pointer" aria-label="Default select example" name="cloth">
                          <option selected value="" disabled>Cloths Type</option>
                          <option value="0">Stitch</option>
                          <option value="1">Semi stitch</option>
                          <option value="2">Un stitch</option>

                        </select>
                <div class="errormsg cloth"></div>
              </div>  
              <div class="col quantity1">
                <label for="text" class="font-weight-normal">Fabric Type</label>           
                <div class="d-flex flex-row justify-content-between">
                <input type="text" class="form-control  w-100" placeholder="fabric type" name="fabric_type">
                  </div>
                </div>
              </div>

            <label for="text" class="font-weight-normal required">Image Alt</label>
            <div class="mb-3">
              <input type="text" class="form-control valikey" placeholder="Image Alt" name="image_alt">
              <span class="errormsg image_alt"></span>
            </div>
            <label for="text" class="font-weight-normal required">Product Tag</label>
            <div class="mb-3">
              <select class="js-select2 form-select  multiple_tag form-control  w-100" aria-label="Default select example" multiple="multiple" name="p_tag">
                <option value="">Select products</option>
                <option value="Saree">Saree</option>
                <option value="Fashion">Fashion</option>
                <option value="Women">Women</option>
              </select>
              <span class="errormsg p_tag"></span>
            </div>
            <label for="p-description" class="font-weight-normal required">Product Description</label>
            <div class="mb-3">
              <textarea id="pro-description" class="w-100 form-control valikey" name="p_description" placeholder="Product Description"></textarea>
              <span class="errormsg p_description"></span>
            </div>
            <div class="mb-3">
              <button type="button" class="btn bg-gradient-info btn-sm productSave save_loader_show">Save</button>
              <button type="button" class="btn bg-gradient-info btn-sm pform_reset cencle_loader_show formCancel">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="<?php echo main_url('admin/assets/js/common_7.js'); ?>"></script>
</body>
</html>
<script>
    get_Categories();
    var id = "<?php echo $id; ?>";
    if (id !== "") {
    get_product(id);
    }
    $(".js-select2").select2({
      closeOnSelect : false,
      placeholder : "select product",
      allowHtml: true,
      allowClear: true,
      tags: true,
      width: "100%", 
    });
</script>