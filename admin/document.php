<?php
include 'header.php';
if (!isset($_SESSION['current_user']['user_id'])) {
  header("Location: sign-in.php");
  die();
}
?>
        <link rel="stylesheet" href="<?php echo main_url('admin/assets/css/document-style.css'); ?>" rel="stylesheet">                                                

<script src="<?php echo main_url('admin/assets/js/document-script.js'); ?>"></script>
<body class="g-sidenav-show bg-gray-100">
    <?php
        include 'sidebar.php';
    ?>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <?php
            $para_array = array("title" => "document", "link" => "", "button_text" => "");
            $title = $para_array['title']; 
            $link = $para_array['link'];
            $button_text = $para_array['button_text'];
            include 'adminheadertop.php';
        ?>
        <div class="col-12 mt-4 p-4 overflow-x-hidden">
            <div class="card mb-4">
                <div class="d-flex justify-content-between p-3">
                    <div class="card-header pb-0 p-3">
                        <h6 class="mb-1 mt-1 text-lg"></h6>
                    </div>
                    <div class="ms-md-auto pe-md-0 d-flex align-items-center me-2"></div>
                </div>
                <div class="card-body p-3">
                    <div class="toggle-container d-md-none">
                        <button id="toggleButton" class="btn btn-primary">Toggle Sidebar</button>
                    </div>
                    <div class="d-block d-md-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3 custom_header" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active text-light  document_text" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true" onclick="toggleDropdown('dropdown-home')">Home</button>
                            <div class="ms-4" id="dropdown-home" style="display: none;">
                                <a href="#Profile_Flow" class="text-light  document_text" onclick="closeDropdowns()">- Profile</a><br>
                                <a href="#Informational" class="text-light document_text" onclick="closeDropdowns()">- Informational Cards</a><br>
                                <a href="#Graphs" class="text-light document_text" onclick="closeDropdowns()">- Graphs and Charts</a><br>
                                <a href="#error" class="text-light document_text" onclick="closeDropdowns()">- Possible Errors and Features</a><br>
                            </div>

                            <button class="nav-link text-light document_text" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false" onclick="toggleDropdown('dropdown-profile')">Profile</button>
                            <div class="ms-4" id="dropdown-profile" style="display: none; ">
                                <a href="#Profile_information" class="text-light document_text" onclick="closeDropdowns()">- Profile information</a><br>
                                <a href="#Search" class="text-light document_text" onclick="closeDropdowns()">- Search</a><br>
                                <a href="#Sort" class="text-light document_text" onclick="closeDropdowns()">- Sort Button</a><br>
                                <a href="#profile_error" class="text-light document_text" onclick="closeDropdowns()">- Common Issues and Solutions</a><br>
                            </div>

                            <button class="nav-link text-light document_text" id="v-pills-product-tab" data-bs-toggle="pill" data-bs-target="#v-pills-product" type="button" role="tab" aria-controls="v-pills-product" aria-selected="false" onclick="toggleDropdown('dropdown-product')">Product</button>
                            <div class="ms-4" id="dropdown-product" style="display: none;">
                                <a href="#product" class="text-light document_text" onclick="closeDropdowns()">- product information</a><br>
                                <a href="#icon" class="text-light document_text"onclick="closeDropdowns()">- Icon</a><br>
                                <a href="#product_error" class="text-light document_text"onclick="closeDropdowns()">- Common Issues and Solutions </a><br>
                                <a href="#link" class="text-light document_text"onclick="closeDropdowns()">- Video</a><br>
                            </div>

                            <button class="nav-link text-light document_text" id="v-pills-customer-tab" data-bs-toggle="pill" data-bs-target="#v-pills-customer" type="button" role="tab" aria-controls="v-pills-customer" aria-selected="false" onclick="toggleDropdown('dropdown-customer')">Customer</button>
                            <div class="ms-4" id="dropdown-customer" style="display: none;">
                                <a href="#customer" class="text-light document_text"onclick="closeDropdowns()">- Customer information</a><br>
                                <a href="#customeicon" class="text-light document_text"onclick="closeDropdowns()">- Icon</a><br>
                                <a href="#customer_error" class="text-light document_text"onclick="closeDropdowns()">- Common Issues and Solutions </a><br>
                                <a href="#customerlink" class="text-light document_text"onclick="closeDropdowns()">- Video</a><br>
                            </div>

                            <button class="nav-link text-light document_text" id="v-pills-gallery-tab" data-bs-toggle="pill" data-bs-target="#v-pills-gallery" type="button" role="tab" aria-controls="v-pills-gallery" aria-selected="false">
                            Gallery</button>

                            <button class="nav-link text-light document_text" id="v-pills-video-tab" data-bs-toggle="pill" data-bs-target="#v-pills-video" type="button" role="tab" aria-controls="v-pills-video" aria-selected="false" onclick="toggleDropdown('dropdown-video')">Video</button>
                            <div class="ms-4" id="dropdown-video" style="display: none;">
                                <a href="#video" class="text-light document_text"onclick="closeDropdowns()">- Video information</a><br>
                                <a href="#videoicon" class="text-light document_text"onclick="closeDropdowns()">- Icon</a><br>
                                <a href="#video_error" class="text-light document_text"onclick="closeDropdowns()">- Common Issues and Solutions </a><br>
                                <a href="#videolink" class="text-light document_text"onclick="closeDropdowns()">- Video</a><br>
                            </div>

                            <button class="nav-link text-light document_text" id="v-pills-blog-tab" data-bs-toggle="pill" data-bs-target="#v-pills-blog" type="button" role="tab" aria-controls="v-pills-blog" aria-selected="false" onclick="toggleDropdown('dropdown-blog')">Blog</button>
                            <div class="ms-4" id="dropdown-blog" style="display: none;">
                                <a href="#blog" class="text-light document_text"onclick="closeDropdowns()">- Blog information</a><br>
                                <a href="#blogicon" class="text-light document_text"onclick="closeDropdowns()">- Icon</a><br>
                                <a href="#blog_error" class="text-light document_text"onclick="closeDropdowns()">- Common Issues and Solutions </a><br>
                                <a href="#bloglink" class="text-light document_text"onclick="closeDropdowns()">- Video</a><br>
                            </div>

                            <button class="nav-link text-light document_text" id="v-pills-invoice-tab" data-bs-toggle="pill" data-bs-target="#v-pills-invoice" type="button" role="tab" aria-controls="v-pills-invoice" aria-selected="false" onclick="toggleDropdown('dropdown-invoice')">Invoice</button>
                            <div class="ms-4" id="dropdown-invoice" style="display: none;">
                                <a href="#invoice" class="text-light document_text"onclick="closeDropdowns()">- Invoice information</a><br>
                                <a href="#invoiceicon" class="text-light document_text"onclick="closeDropdowns()">- Icon</a><br>
                                <a href="#invoice_error" class="text-light document_text"onclick="closeDropdowns()">- Common Issues and Solutions </a><br>
                                <a href="#invoicelink" class="text-light document_text"onclick="closeDropdowns()">- Video</a><br>
                            </div>
                        </div>
                        <div class="custom_main" id="main-doc">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="dark f-44">Home</div>
                                    <div class="f-18">The home page is the main page of the dashboard, where the user is given an overview of their data and activities. This  page provides the user with quick access to all important metrics and tools.</div>
                                    <img src="assets/img/document_img/img1.png" class="img-fluid mt-5">
                                    <div class="  d-block text-center mx-auto" >
                                        <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  1</p>
                                    </div>
                                    <div id="Profile_Flow">
                                        <div class="dark f-44">1. Profile</div>
                                        <div class="f-18">Users can click on the profile icon to view and edit their profile.</div>
                                        <img src="assets/img/document_img/img2.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  2</p>
                                        </div>
                                        <div class="f-18">click profile button</div>
                                        <img src="assets/img/document_img/img3.png" class="img-fluid mt-5" alt="image">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  3</p>
                                        </div>
                                    </div>
                                    <div id="Informational">
                                        <div class="dark f-44">2. Informational Cards</div>
                                        <div class="f-18">There are four cards on the home page, which display 	important data: </div>
                                        <img src="assets/img/document_img/img4.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure 4</p>
                                        </div>
                                        <div class="f-24 custome-light-blue">Total Earning</div>
                                        <div class="f-18">Shows the user's total earnings.<br>Example: Rs. 0</div>
                                        <img src="assets/img/document_img/img5.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  5</p>
                                        </div>
                                        <div class="f-20 custome-dark-blue">How will your earning count?</div>
                                        <div class="f-18 ">The "Total Earnings" shown on the home page is a value that sums up the amounts paid across all invoices.</div>
                                        <img src="assets/img/document_img/img6.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  6</p>
                                        </div>
                                        <div class="f-18">Every invoice has 3 important fields:</div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Total Amount :</div>
                                            <div class="f-18"> Total payment to be given.</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Amount Paid :</div>
                                            <div class="f-18"> The payment received so far for the Invoice.</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Balance :</div>
                                            <div class="f-18"> The remaining payment from the total amount which is still pending.</div>
                                        </div>
                                        <img src="assets/img/document_img/img7.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  7</p>
                                        </div>
                                        <div class="f-24 custome-light-blue">Total products</div>
                                        <div class="f-18">Number of all added products.</div>
                                        <img src="assets/img/document_img/img8.png" class="img-fluid mt-5" alt="image">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  8</p>
                                        </div>
                                        <div class="f-20 custome-dark-blue">How will your product count?</div>
                                        <div class="f-18">The Total Products value  shown on the Home Page contains the total count of available Products</div>
                                        <div class="f-18">This number is automatically updated based on the data of the Product Page.</div>
                                        <div class="f-18">Whatever products are added to the product page, the count of those products is shown in the total products of the home page.</div>
                                        <img src="assets/img/document_img/img82.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  9</p>
                                        </div>
                                        <div class="f-24 custome-light-blue">Total clients</div>
                                        <div class="f-18">Number of registered customers.</div>
                                        <img src="assets/img/document_img/p-01.png" class="img-fluid mt-5" alt="image">
                                        <div class="f-20 custome-dark-blue">How will your client count?</div>
                                        <div class="f-18">The Total client value  shown on the Home Page contains the total count of available customer.<br>This number is automatically updated based on the data of the customer Page. </div>
                                        <div class="f-18">Whatever customers are added to the customer page, the count of those customer is shown in the total customer of the home page.</div>
                                        <img src="assets/img/document_img/img11.png" class="img-fluid mt-5" alt="image">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  10</p>
                                        </div>
                                        <div class="f-24 custome-light-blue">Total Item Sales</div>
                                        <div class="f-18">Number of products sold.</div>
                                        <img src="assets/img/document_img/img14.png" class="img-fluid mt-5" alt="image">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  11</p>
                                        </div>
                                        <div class="f-20 custome-dark-blue">How will your Item Sales count?</div>
                                        <div class="f-18">The Total Item Sales shown on the Home Page is the sum of the Total Quantity given in the invoices. <br> This value counts the quantity of items on the invoice.</div>
                                        <img src="assets/img/document_img/img12.png" class="img-fluid mt-5" alt="image">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  12</p>
                                        </div>
                                        <img src="assets/img/document_img/img13.png" class="img-fluid mt-5" alt="image">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  13</p>
                                        </div>
                                    </div>
                                    <div id="Graphs">
                                        <div class="dark f-44">3. Graphs and Charts</div>
                                        <div class="f-24 custome-light-blue">Active Users</div>
                                        <div class="f-18">Users' activities are shown as a bar chart. It also tells the number of active users compared to the previous week (eg: +23%).</div>
                                        <img src="assets/img/document_img/p14.png" class="img-fluid mt-5" alt="image">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  14</p>
                                        </div>
                                        <div class="f-24 custome-light-blue">Sales Overview</div>
                                        <div class="f-18">It shows monthly sales trends, including increase/decrease percentage (eg: +4% more in 2021).</div>
                                        <img src="assets/img/document_img/p15.png" class="img-fluid mt-5" alt="image">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  15</p>
                                        </div>
                                    </div>
                                    <div id="error">
                                        <div class="dark f-44">4. Possible Errors and Features</div>
                                        <div class="f-24 custome-light-blue">Features of Home Page</div>
                                        <div class="f-18">Show the overall status of the user's data at a glance.<br>Presenting visual data through charts and cards.<br>Quick access to other modules from the sidebar.</div>
                                        <div class="f-24 custome-light-blue">Possible Errors</div>
                                        <div class="f-18">Check your internet connection.<br>Refresh the browser.<br>If the problem continues, please contact our support team.</div>
                                        <img src="assets/img/document_img/p17.png" class="img-fluid mt-5" alt="image">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  16</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <div class="dark f-44">Profile</div>
                                    <div class="f-18">The profile section lets users view and edit their personal and business details. This page is the center of the user's identity and information about their store.</div>
                                    <img src="assets/img/document_img/img15.png" class="img-fluid mt-5">
                                    <div class="d-block text-center mx-auto" >
                                        <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  1</p>
                                    </div>
                                    <div id="Profile_information">
                                        <div class="dark f-44">1. Profile photo</div>
                                        <div class="f-18">Users can view and update their profile photo.<br>Option to update photo: Photo can be changed using the "Edit Profile" button.</div>
                                        <img src="assets/img/document_img/img16.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  2</p>
                                        </div>
                                        <div>then click edit icon</div>
                                        <img src="assets/img/document_img/img17.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  3</p>
                                        </div> 
                                        <div class="f-18">then save click button</div>
                                        <img src="assets/img/document_img/img18.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  4</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Edit Profile :</div>
                                            <div class="f-18">To edit profile information</div>
                                        </div>
                                        <img src="assets/img/document_img/img19.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  5</p>
                                        </div>
                                        <div class="f-18">click edit button</div>
                                        <img src="assets/img/document_img/img20.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  6</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Name :</div>
                                            <div class="f-18"> User's name.</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Shop Name :</div>
                                            <div class="f-18">Name of the store or shop.</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Address :</div>
                                            <div class="f-18">Address of the store.</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Moblie Number :</div>
                                            <div class="f-18">Contact Number.</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">View Your Profile :</div>
                                            <div class="f-18">Users can use this button to view their profile</div>
                                        </div>
                                        <img src="assets/img/document_img/img21.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  7</p>
                                        </div>
                                    </div>
                                    <div id="Search">
                                        <div class="dark f-44">2. Search Bar</div>
                                        <div class="f-18">Users can easily search for a particular information or product within the profile section.<br>Type the information required in "Type here...".<br>The results will be automatically filtered.</div>
                                        <img src="assets/img/document_img/img22.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  8</p>
                                        </div>
                                    </div>
                                    <div id="Sort">
                                        <div class="dark f-44">3. Sort By Button</div>
                                        <div class="f-18">Allows data to be organized according to various criteria.<br>Click the button and select the option from the dropdown menu.<br>The data will be arranged in the same order.</div>
                                        <img src="assets/img/document_img/img23.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  9</p>
                                        </div>
                                    </div>
                                    <div id="profile_error">
                                        <div class="dark f-44">4. Common Issues and Solutions</div>
                                        <div class="f-18">Check Internet connection.<br>Fill all the fields correctly.</div>
                                        <img src="assets/img/document_img/img24.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  10</p>
                                        </div>
                                        <div class="f-18">Do not leave any required field blank.</div>
                                        <img src="assets/img/document_img/img25.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  11</p>
                                        </div>
                                        <div class="f-18">Search-type the keywords correctly.</div>
                                        <img src="assets/img/document_img/img26.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  12</p>
                                        </div>
                                        <img src="assets/img/document_img/img27.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  13</p>
                                        </div>
                                        <div class="f-18">Make sure the searched information is available.</div>
                                        <img src="assets/img/document_img/img28.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  14</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab">
                                    <div class="dark f-44">Product</div>
                                    <div class="f-18">The Products section helps users add, edit, delete, and organize products in their store. This page is a central point for product listing and management. </div>
                                    <img src="assets/img/document_img/img29.png" class="img-fluid mt-5">
                                    <div class="  d-block text-center mx-auto" >
                                        <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  1</p>
                                    </div>
                                    <div class="f-18">All products are shown in a card view.<br>Each card contains product information such as:</div>
                                    <div id="product">
                                        <div class="dark f-44">1. Product information</div>
                                        <div class="f-20 custome-light-blue">Add Product Button :</div>
                                        <div class="f-18">To add a new product.<br>On clicking, there is an option to upload the product name, price, and photo etc...</div>
                                        <img src="assets/img/document_img/img30.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  2</p>
                                        </div>
                                        <div class="f-18">then click add product button </div>
                                        <img src="assets/img/document_img/img31.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  3</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Product Title :</div>
                                            <div class="f-18">Name of the product. </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Product Category :</div>
                                            <div class="f-18">Select the product category.If the category is not available, use the "Add a new category" option.</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">SKU :</div>
                                            <div class="f-18">Enter the SKU (Stock Keeping Unit) code.This is for unique identification of the product.</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Product Price :</div>
                                            <div class="f-18">Enter the minimum and maximum price of the product.(Example: ₹500 to ₹1000.)</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Product Image :</div>
                                            <div class="f-18">Upload product photo. Allowed File Types: PNG, JPG, JPEG, GIF. Size Limit: The size of each file should not exceed 5MB</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Image Alt :</div>
                                            <div class="f-18">Enter an image description or alt text.</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Product Tag :</div>
                                            <div class="f-18">Add product related tags.Example: women, saree, fashion</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Product Description :</div>
                                            <div class="f-18">Write a detailed description of the product.
                                            It helps customers understand the product</div>
                                        </div>
                                    </div>
                                    <div id="icon">
                                        <div class="dark f-44">1. Button and Icon</div>
                                        <div class="f-20 custome-light-blue">Edit icon:</div>
                                        <img src="assets/img/document_img/img32.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  4</p>
                                        </div>
                                        <div class="f-18">then click icon</div>
                                        <img src="assets/img/document_img/img33.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  5</p>
                                        </div>
                                        <div class="f-18">To change product information.</div>
                                        <div class="f-20 custome-light-blue">Delete icon:</div>
                                        <img src="assets/img/document_img/img34.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  6</p>
                                        </div>
                                        <div class="f-18">then click delete icon</div>
                                        <img src="assets/img/document_img/img35.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  6</p>
                                        </div>
                                        <div class="f-18">click yes delete it <br> To permanently remove the product.</div>
                                        <div class="f-20 custome-light-blue">View All Button:</div>
                                        <img src="assets/img/document_img/img36.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  7</p>
                                        </div>
                                        <div class="f-18">then click view all button</div>
                                        <img src="assets/img/document_img/img37.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  8</p>
                                        </div>
                                        <div class="f-18">To see information related to the product.</div>
                                    </div>
                                    <div id="product_error">
                                        <div class="dark f-44">3. Common Issues and Solutions</div>
                                        <div class="f-18">Make sure the internet connection is stable.</div>
                                        <div class="f-20 custome-light-blue">Photo Upload Issues:</div>
                                        <div class="f-18">Make sure the photo is in the correct format ( PNG,JPG,JPEG,GIF).The size of the photo should not be too big.</div>
                                        <img src="assets/img/document_img/img38.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  9</p>
                                        </div>
                                        <div class="f-20 custome-light-blue">Incorrect Information</div>
                                        <div class="f-18">Fill in all required fields correctly.<br>Avoid leaving blank fields.</div>
                                        <img src="assets/img/document_img/img39.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure 10</p>
                                        </div>
                                        <div class="f-20 custome-light-blue">Category Missing</div>
                                        <div class="f-18">Category not available? Use "Add a new category".</div>
                                        <img src="assets/img/document_img/img8.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  11</p>
                                        </div>
                                    </div>
                                    <div id="link">
                                        <div class="dark f-44">3. Product_video</div>
                                        <iframe src="https://somup.com/cZl1iEJRgP" width="640" height="360" frameborder="0" allowfullscreen></iframe>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-customer" role="tabpanel" aria-labelledby="v-pills-customer-tab">
                                    <div class="dark f-44">Customers</div>
                                    <div class="f-18">This page helps users manage their customer list. Customer information can be easily added, viewed and edited. Below are the main features of this page and their usage:</div>
                                    <img src="assets/img/document_img/img41.png" class="img-fluid mt-5">
                                    <div class="  d-block text-center mx-auto" >
                                        <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  1</p>
                                    </div>
                                    <div id="customer">
                                        <div class="dark f-44">1. Customer information</div>
                                        <div class="f-20 custome-light-blue">Add Customer :</div>
                                        <div class="f-18">Use the "Add Customer" button at the top right of the screen to add a new customer.</div>
                                        <img src="assets/img/document_img/img42.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  2</p>
                                        </div>
                                        <div class="f-18">then click add customer button </div>
                                        <img src="assets/img/document_img/img43.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  3</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Customer Name :</div>
                                            <div class="f-18">Name of the Customer </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Email :</div>
                                            <div class="f-18">email address of the customer & Email must be valid</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Contact :</div>
                                            <div class="f-18">Customer's phone number</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Customer Image :</div>
                                            <div class="f-18">Photo of the customer</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">City :</div>
                                            <div class="f-18">city of the customer</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">State :</div>
                                            <div class="f-18">State of the customer</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Address :</div>
                                            <div class="f-18">address of the customer</div>
                                        </div>
                                    </div>
                                    <div id="customeicon">
                                        <div class="dark f-44">1. Button and Icon</div>
                                        <div class="f-20 custome-light-blue">Edit icon:</div>
                                        <img src="assets/img/document_img/img44.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  4</p>
                                        </div>
                                        <div class="f-18">then click icon</div>
                                        <img src="assets/img/document_img/img45.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  5</p>
                                        </div>
                                        <div class="f-18">To edit customer information.<br>then save information</div>
                                        <div class="f-20 custome-light-blue">Delete icon:</div>
                                        <img src="assets/img/document_img/img46.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  6</p>
                                        </div>
                                        <div class="f-18">then click delete icon</div>
                                        <img src="assets/img/document_img/img47.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  7</p>
                                        </div>
                                        <div class="f-18">click yes delete it <br> To permanently remove the product.</div>
                                        <div class="f-20 custome-light-blue">View All Button:</div>
                                        <img src="assets/img/document_img/img36.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  8</p>
                                        </div>
                                        <div class="f-18">then click view all button</div>
                                        <img src="assets/img/document_img/img37.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  9</p>
                                        </div>
                                        <div class="f-18">To see information related to the product.</div>
                                    </div>
                                    <div id="customer_error">
                                        <div class="dark f-44">3. Common Issues and Solutions</div>
                                        <div class="f-18">Make sure the internet connection is stable.</div>
                                        <div class="f-20 custome-light-blue">Photo Upload Issues:</div>
                                        <div class="f-18">Make sure the photo is in the correct format ( PNG,JPG,JPEG,GIF).The size of the photo should not be too big.</div>
                                        <img src="assets/img/document_img/img48.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  10</p>
                                        </div>
                                        <div class="f-20 custome-light-blue">Incorrect Information</div>
                                        <div class="f-18">Fill in all required fields correctly.<br>Avoid leaving blank fields.</div>
                                        <img src="assets/img/document_img/img49.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  11</p>
                                        </div>
                                    </div>
                                    <div id="customerlink">
                                        <div class="dark f-44">3. Customer_video</div>
                                        <iframe src="https://somup.com/cZl1QRJRs9" width="640" height="360" frameborder="0" allowfullscreen></iframe>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-gallery" role="tabpanel" aria-labelledby="v-pills-gallery-tab">
                                    <div class="dark f-44">Gallery</div>
                                    <div class="f-20 custome-dark-blue">why we used gallery?</div>
                                    <div class="f-18">This page helps users manage their customer list. Customer information can be easily added, viewed and edited. Below are the main features of this page and their usage:</div>
                                    <img src="assets/img/document_img/img51.png" class="img-fluid mt-5">
                                    <div class="  d-block text-center mx-auto" >
                                        <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  1</p>
                                    </div>
                                    <div class="f-18">Click on the "Gallery" section on the dashboard.<br>You will see all the available images.</div>
                                    <div class="f-20 custome-dark-blue">Where does this image come from?</div>
                                    <div class="f-18">The first image of the product is added in the gallery section<br>Even after deleting a product, its image still appears in the gallery</div>
                                    <img src="assets/img/document_img/img52.png" class="img-fluid mt-5">
                                    <div class="  d-block text-center mx-auto" >
                                        <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  2</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-video" role="tabpanel" aria-labelledby="v-pills-video-tab">
                                    <div class="dark f-44">video</div>
                                    <div class="f-18">The video section gives you an easy way to manage videos on your platform. Here you can watch, upload and delete videos.</div>
                                    <img src="assets/img/document_img/img54.png" class="img-fluid mt-5">
                                    <div class="  d-block text-center mx-auto" >
                                        <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  1</p>
                                    </div>
                                    <div class="f-18">Click on the video to play the video.</div>
                                    <div class="f-18"></div>
                                    <div id="video">
                                        <div class="dark f-44">1. Video information</div>
                                        <div class="f-20 custome-light-blue">Add Video :</div>
                                        <div class="f-18">Click the "Add Video" button on the top right corner of the page.</div>
                                        <img src="assets/img/document_img/img55.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  2</p>
                                        </div>
                                        <div class="f-18">then click add video button </div>
                                        <img src="assets/img/document_img/img56.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  3</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Video Title :</div>
                                            <div class="f-18">title of the video </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Video Category :</div>
                                            <div class="f-18">category select dropdown of the video</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Youtube Shorts Link :</div>
                                            <div class="f-18">youtube embed link</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">auto generate number :</div>
                                            <div class="f-18">automatically genarate number</div>
                                        </div>
                                    </div>
                                    <div id="videoicon">
                                        <div class="dark f-44">1. Button and Icon</div>
                                        <div class="f-20 custome-light-blue">Delete icon:</div>
                                        <div class="f-18">Videos can be deleted by clicking on the "Delete" icon (dustbin icon) below each video.</div>
                                        <img src="assets/img/document_img/img57.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  4</p>
                                        </div>
                                        <div class="f-18">then click delete icon</div>
                                        <img src="assets/img/document_img/img58.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  5</p>
                                        </div>
                                        <div class="f-18">click yes delete it <br> To permanently remove the video.</div>
                                    </div>
                                    <div id="video_error">
                                        <div class="dark f-44">3. Common Issues and Solutions</div>
                                        <div class="f-18">Make sure the internet connection is stable.</div>
                                        <div class="f-20 custome-light-blue">video Upload Issues:</div>
                                        <div class="f-18">Only used for YouTube short videos and not for YouTube videos</div>
                                        <img src="assets/img/document_img/img60.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  6</p>
                                        </div>
                                        <div class="f-20 custome-light-blue">Incorrect Information</div>
                                        <div class="f-18">Avoid leaving blank fields</div>
                                        <img src="assets/img/document_img/img59.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  7</p>
                                        </div>
                                    </div>
                                    <div id="videolink">
                                        <div class="dark f-44">3. video</div>
                                        <iframe src="https://somup.com/cZl16RJRRT" width="640" height="360" frameborder="0" allowfullscreen></iframe>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-blog" role="tabpanel" aria-labelledby="v-pills-blog-tab">
                                    <div class="dark f-44">Blog</div>
                                    <div class="f-18">Blog section is a platform where you can write blogs to share your products, services and new ideas. This section gives you a simple way to engage with your audience.</div>
                                    <img src="assets/img/document_img/img61.png" class="img-fluid mt-5">
                                    <div class="  d-block text-center mx-auto" >
                                        <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  1</p>
                                    </div>
                                    <div id="blog">
                                        <div class="dark f-44">1. Blog information</div>
                                        <div class="f-20 custome-light-blue">Add Blog :</div>
                                        <div class="f-18">Click the "Add Blog" button on the top right corner of the page. </div>
                                        <img src="assets/img/document_img/img62.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  2</p>
                                        </div>
                                        <div class="f-18">then click add blog button </div>
                                        <img src="assets/img/document_img/img63.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  3</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Blog Name :</div>
                                            <div class="f-18">title of the blog </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Blog Category :</div>
                                            <div class="f-18">category select dropdown of the blog</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Body :</div>
                                            <div class="f-18">Description for the productr</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Author :</div>
                                            <div class="f-18">author name by defult name</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Blog Image :</div>
                                            <div class="f-18">image of the blog</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Image alt :</div>
                                            <div class="f-18">: Enter an image description or alt text</div>
                                        </div>
                                        <div class="f-18">then save click button </div>
                                    </div>
                                    <div id="blogicon">
                                        <div class="dark f-44">1. Button and Icon</div>
                                        <div class="f-20 custome-light-blue">Edit icon:</div>
                                        <img src="assets/img/document_img/img64.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  4</p>
                                        </div>
                                        <div class="f-18">then click icon</div>
                                        <img src="assets/img/document_img/img65.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  5</p>
                                        </div>
                                        <div class="f-18">To edit customer information.<br>then save information</div>
                                        <div class="f-20 custome-light-blue">Delete icon:</div>
                                        <img src="assets/img/document_img/img66.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  6</p>
                                        </div>
                                        <div class="f-18">then click delete icon</div>
                                        <img src="assets/img/document_img/img67.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  7</p>
                                        </div>
                                        <div class="f-18">click yes delete it <br> To permanently remove the product.</div>
                                    </div>
                                    <div id="blog_error">
                                        <div class="dark f-44">3. Common Issues and Solutions</div>
                                        <div class="f-18">Make sure the internet connection is stable.</div>
                                        <div class="f-20 custome-light-blue">Photo Upload Issues:</div>
                                        <div class="f-18">Make sure the photo is in the correct format ( PNG,JPG,JPEG,GIF).The size of the photo should not be too big.</div>
                                        <img src="assets/img/document_img/img68.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  8</p>
                                        </div>
                                        <div class="f-20 custome-light-blue">Incorrect Information</div>
                                        <div class="f-18">Fill in all required fields correctly.<br>Avoid leaving blank fields.</div>
                                        <img src="assets/img/document_img/img69.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  9</p>
                                        </div>
                                    </div>
                                    <div id="bloglink">
                                        <div class="dark f-44">3. Blog_video</div>
                                        <iframe src="https://somup.com/cZliePJWlH" width="640" height="360" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-invoice" role="tabpanel" aria-labelledby="v-pills-invoice-tab">
                                    <div class="dark f-44">Invoice</div>
                                    <div class="f-18">The Invoice section is used by users to track their products sold, payment terms and outstanding amounts. On this page users can add, view and manage invoices. </div>
                                    <img src="assets/img/document_img/img71.png" class="img-fluid mt-5">
                                    <div class="  d-block text-center mx-auto" >
                                        <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  1</p>
                                    </div>
                                    <div id="invoice">
                                        <div class="dark f-44">1. Invoice information</div>
                                        <div class="f-20 custome-light-blue">Add Invoice:</div>
                                        <div class="f-18">New invoices can be added using the "Add Invoice" button at the top right of the screen.
                                        </div>
                                        <img src="assets/img/document_img/img72.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  2</p>
                                        </div>
                                        <div class="f-18">then click add invoice button </div>
                                        <img src="assets/img/document_img/img73.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  3</p>
                                        </div>
                                        <div class="f-18">fill all information then save click button</div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">File Upload :</div>
                                            <div class="f-18">Click to upload' select file</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Invoice Name :</div>
                                            <div class="f-18">name of the invoice(customer)</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Bill to :</div>
                                            <div class="f-18">: In the name of the sender of the bill or in the name of the company</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Ship to :</div>
                                            <div class="f-18">In the name of the racer or in the name of the shop</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Date :</div>
                                            <div class="f-18">Fill in the invoice date</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Payment Terms  :</div>
                                            <div class="f-18"> Fill the payment status (cash, online payment).</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Due Date :</div>
                                            <div class="f-18"> The date by which payment is to be made.</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">PO Number :</div>
                                            <div class="f-18">The number issued for the order is entered.</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Item Title :</div>
                                            <div class="f-18"> name of the product or service. </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Quantity :</div>
                                            <div class="f-18">How many products were sold?</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Rate  :</div>
                                            <div class="f-18">price per unit</div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="f-20 custome-light-blue">Amount  :</div>
                                            <div class="f-18">Total of rate and quantity.Using the "+" button you can add new items.</div>
                                        </div>
                                        <div class="f-18">then save click button </div>
                                    </div>
                                    <div id="invoiceicon">
                                        <div class="dark f-44">1. Button and Icon</div>
                                        <div class="f-20 custome-light-blue">Edit icon:</div>
                                        <img src="assets/img/document_img/img74.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  4</p>
                                        </div>
                                        <div class="f-18">then click icon</div>
                                        <img src="assets/img/document_img/img75.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  5</p>
                                        </div>
                                        <div class="f-18">To edit invoice information.<br>then save information</div>
                                        <div class="f-20 custome-light-blue">Delete icon:</div>
                                        <img src="assets/img/document_img/img76.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  6</p>
                                        </div>
                                        <div class="f-18">then click delete icon</div>
                                        <img src="assets/img/document_img/img77.png" class="img-fluid mt-5">
                                        <div class=" d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  7</p>
                                        </div>
                                        <div class="f-18">click yes delete it <br> To permanently remove the invoice.</div>
                                    </div>
                                    <div id="invoice_error">
                                        <div class="dark f-44">3. Common Issues and Solutions</div>
                                        <div class="f-18">Make sure the internet connection is stable.</div>
                                        <div class="f-20 custome-light-blue">Photo Upload Issues:</div>
                                        <div class="f-18">Make sure the photo is in the correct format ( PNG,JPG,JPEG,GIF).The size of the photo should not be too big.</div>
                                        <img src="assets/img/document_img/img78.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  8</p>
                                        </div>
                                        <div class="f-20 custome-light-blue">Incorrect Information</div>
                                        <div class="f-18">Fill in all required fields correctly.<br>Avoid leaving blank fields.</div>
                                        <img src="assets/img/document_img/img80.png" class="img-fluid mt-5">
                                        <div class="  d-block text-center mx-auto" >
                                            <p class="d-inline border border-danger text-danger text-center mx-auto p-2">figure  9</p>
                                        </div>
                                    </div>
                                    <div id="invoicelink">
                                        <div class="dark f-44">3. Invoice_video</div>
                                        <iframe src="https://somup.com/cZlQfxdcEg" width="640" height="360" frameborder="0" allowfullscreen></iframe>
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
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2" href="tel:7600464414">
            <i class="fa fa-phone"></i>
        </a>
        <div class="card shadow-lg ">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                    <p>See Our Dashboard Options.</p>
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
                <p class="text-sm">Choose Between 2 Different Sidenav Types.</p>
                </div>
                <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You Can Change The Sidenav Type Just On Desktop View.</p>
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
                    <a href="#" class="btn btn-dark mb-0 me-2">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="#" class="btn btn-dark mb-0 me-2">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>


</html>


