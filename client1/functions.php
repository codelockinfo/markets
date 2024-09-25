<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

// include_once '../append/Login.php';
include_once '../connection.php';

class client_functions {
    protected $db;
    public function __construct() {
        $db_connection = new DB_Class();
        $this->db = $GLOBALS['conn'];
    }
    function conatct_form(){  
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        if (empty($email)) {
            $error_array['email'] = "Please enter an email address";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_array['email'] = "Please enter a valid email address";
        }
        
        if (isset($_POST['name']) && $_POST['name'] == '') {
            $error_array['name'] = "Please enter name";
        }
        
        if (isset($_POST['message']) && $_POST['message'] == '') {
            $error_array['message'] = "Please enter message";
        }
        
        if (empty($error_array)) {  
            $message = "Name : "  .$_POST['name'];
            $message .= "<br> Email : "  .$email;
            $message .= "<br> Message : "  .$_POST['message'];
            $to = "codelock2021@gmail.com";	
            $subject = "Market Search"; 
            $headers = $_POST['email']." \r\n";     
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $responceEmail = mail ($to, $subject, $message, $headers);	
            $response_data = array('data' => 'success', 'msg' => 'Send mail successfully!');
        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array);
        }
        
        $response = json_encode($response_data);
        return $response;
        
    }

    function bannershow(){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $output = $bannercontent = "";               
        $query = "SELECT * FROM banners WHERE status='1' ORDER BY banner_id DESC LIMIT 1";
        $result = $this->db->query($query);
        $famousmarket_query = "SELECT * FROM famous_markets WHERE status='1'";
        $famousmarket_result = $this->db->query($famousmarket_query);
        if($famousmarket_result->num_rows > 0){
            $bannercontent .= '<div class="col-sm-4 mt-2 mt-sm-0">
                                <div class="banner-main-box p-1 wow bounceInUp">
                                    <div class="banner-content-box py-3 w-100 text-center rounded bg-dark-opacity">
                                        <h3 class="text-white count m-0">'.$famousmarket_result->num_rows.'</h3>
                                        <p class="text-capitalize m-0 text-white">verified markets</p>
                                    </div>
                                </div>
                            </div>';
        }
        
        $products_query = "SELECT * FROM products WHERE status='1'";
        $products_result = $this->db->query($products_query);
        if($products_result->num_rows > 0){
            $bannercontent .= '<div class=" col-sm-4 mt-2 mt-sm-0 wow bounceInUp">
                            <div class="banner-main-box p-1">
                                <div class="banner-content-box py-3 w-100 text-center rounded bg-dark-opacity">
                                    <h3 class="text-white  m-0 count">'.$products_result->num_rows.'</h3>
                                    <p class="text-capitalize m-0 text-white">products</p>
                                </div>
                            </div>
                        </div>';
        }
        
        $productscategories_query = "SELECT * FROM allcategories WHERE status='1'";
        $productscategories_result = $this->db->query($productscategories_query);
        if($productscategories_result->num_rows > 0){
            $bannercontent .= '<div class=" col-sm-4 mt-2 mt-sm-0 wow bounceInUp">
                            <div class="banner-main-box p-1">
                                <div class="banner-content-box py-3 w-100 text-center rounded bg-dark-opacity">
                                    <h3 class="text-white  m-0 count">'.$productscategories_result->num_rows.'</h3>
                                    <p class="text-capitalize m-0 text-white">categories</p>
                                </div>
                            </div>
                        </div>';
        }
        
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {  
                $image = $row["banner_img"];
                $imagePath = "../admin1/assets/img/banner_img/".$image;
                $decodedPath = htmlspecialchars_decode($imagePath);
                $output .= '<img class="banner img-fluid" src="'.$decodedPath.'" alt="home-banner">';
            }
                        
            $response_data = array('data' => 'success', 'outcome' => $output ,'bannercontent' => $bannercontent );
        }
        $response = json_encode($response_data);
        return $response;
    }
    
    function famousmarketshow(){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $query = "SELECT Heading, Sub_Heading,Image FROM famous_markets WHERE status='1'";
        $result = $this->db->query($query);
        $output = $famousmarkettitle = $famousmarketbutton = "";       
        // print_r($query);
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {  
                $image = $row["Image"];
                $imagePath = "../admin1/assets/img/famous_market/img/".$image;
                // $svgimagePath = "../admin1/assets/img/famous_market/svg_img/".$svgimage;
                $decodedPath = htmlspecialchars_decode($imagePath);
                    $output .= '<div class="col-lg-3 col-md-6 col-6 wow bounceInUp p-1 p-md-2" data-wow-delay="0.1s">';
                    $output .= '    <div class="bg-light rounded famous-item">';
                    $output .= '        <div class="famous-content d-flex align-items-center justify-content-center px-2 py-3 py-md-5">';
                    $output .= '            <div class="famous-content-icon text-center">';
                    $output .= '                <a href="' . CLS_SITE_URL . 'collection2.php" class="mb-3 text-capitalize h4 text-second"> '.$row["Heading"].'</a>';
                    $output .= '                <p class="mb-4">'.$row["Sub_Heading"].'</p>';
                    $output .= '                <div class="famous-img rounded-circle">';
                    $output .= '                    <a href="' . CLS_SITE_URL . 'collection2.php"><img class="img-fluid2" src="' .$decodedPath . '" alt="shop1"></a>';
                    $output .= '                </div>';
                    $output .= '                <div class="d-flex justify-content-center mt-2">';
                    $output .= '                    <i class="fa-solid fa-star text-primary"></i>';
                    $output .= '                    <i class="fa-solid fa-star text-primary"></i>';
                    $output .= '                    <i class="fa-solid fa-star text-primary"></i>';
                    $output .= '                    <i class="fa-solid fa-star text-primary"></i>';
                    $output .= '                    <i class="fa-solid fa-star-half-stroke text-primary"></i>';
                    $output .= '                    <h6 class="rate-icon ">(4.5)</h6>';
                    $output .= '                </div>';
                    $output .= '                <a href="' . CLS_SITE_URL . 'collection2.php" class="btn btn-primary mt-3">View Products</a>';
                    $output .= '            </div>';
                    $output .= '        </div>';
                    $output .= '    </div>';
                    $output .= '</div>';
                    
            }
            $famousmarkettitle = '<div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                                        <h1 class="display-5 mb-5">Famous markets in surat</h1>
                                  </div>';
             
            $famousmarketbutton = '<a href="'.CLS_SITE_URL .'famousmarket.php" class="d-flex justify-content-center wow bounceInUp"><button class="btn btn-primary text-capitalize px-5 mt-4 text-center">view all markets</button></a>';
            
            $response_data = array('data' => 'success', 'outcome' => $output,'famousmarkettitle' => $famousmarkettitle, 'famousmarketbutton' => $famousmarketbutton);
        }
        $response = json_encode($response_data);
        return $response;
    }

    function offershow(){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $query = "SELECT img FROM offers WHERE status='1'";
        $result = $this->db->query($query);
        $output = $class = $offerstitle = "";     
        $counter = 0;
        if ($result) {
            while ($row = mysqli_fetch_array($result)) { 
                $counter = $counter + 1;
                if ($counter > 2) {
                    $class = 'mt-4';
                }
                $image = $row["img"];
                $imagePath = "../admin1/assets/img/offers/".$image;
                $decodedPath = htmlspecialchars_decode($imagePath);      
                $output .= '<div class="col-12 col-md-6 wow bounceInUp"><a href="#"><img src="' . $decodedPath . '" class="img-fluid '. $class .'" alt="img-fluid"></a></div>';
            }
            $offerstitle .='<div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                                <h1 class="display-5 mb-5">New offers</h1>
                            </div>';
            $response_data = array('data' => 'success', 'outcome' => $output, 'offerstitle' => $offerstitle);
        }
        $response = json_encode($response_data);
        return $response;       
    }
    
    function paragraphshow(){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $query = "SELECT * FROM paragraph WHERE status='1'"; 
        $result = $this->db->query($query);
        $output = "";
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {  
                    $output .= '<div class="col-md-12 col-lg-12 wow bounceInUp">' . $row["paragraph"] . ' </div>';                
                }
                $response_data = array('data' => 'success', 'outcome' => $output);
            }
                $response = json_encode($response_data);
                return $response;
    }

    function videoshow (){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $query = "SELECT * FROM videos WHERE status='1'"; 
        $result = $this->db->query($query);
        $output = $videotitle = $videobutton = "";
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {  
                $link = $row["short_link"];
                $output .= '<div class="swiper-slide">';                        
                $output .= '<iframe width="100%" height="500px" src="' . $link . '?autoplay=1&mute=0&loop=1&modestbranding=1&iv_load_policy=3&controls=0&rel=0&showinfo=0&disablekb=1" class="rounded border-radius-xl" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                $output .= '</div>';                
            }
            $videotitle .= '<div class="text-center wow bounceInUp" data-wow-delay="0.1s">
                                <h1 class="display-5 mb-5">Our trending videos</h1>
                            </div>';
            $videobutton .= ' <a href="'.CLS_SITE_URL.'video.php" class="d-flex justify-content-center wow bounceInUp"><button class="btn btn-primary text-capitalize px-5 mt-4 text-center">view all</button></a>';
            $response_data = array('data' => 'success', 'outcome' => $output, 'videotitle' => $videotitle , 'videobutton' => $videobutton);
        }
            $response = json_encode($response_data);
            return $response;
    }

    function FAQshow (){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $query = "SELECT * FROM faqs WHERE status='1' LIMIT 5"; 
        $result = $this->db->query($query);
        $output= $faqtitle = $faqcontent = $faqimage = "";
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {                 
                    $output .= '<div class="accordion-item border">';
                    $output .= '    <h2 class="accordion-header" id="heading' . $row["faq_id"] . '">';
                    $output .= '        <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $row["faq_id"] . '" aria-expanded="false" aria-controls="collapse' . $row["faq_id"] . '">';
                    $output .= '            <h6 class="m-0">' . $row["question"] . '</h6>';
                    $output .= '        </button>';
                    $output .= '    </h2>';
                    $output .= '    <div id="collapse' . $row["faq_id"] . '" class="accordion-collapse collapse" aria-labelledby="heading' . $row["faq_id"] . '" data-bs-parent="#accordionExample">';
                    $output .= '        <div class="accordion-body">';
                    $output .= '            ' . $row["answer"] . '';
                    $output .= '        </div>';
                    $output .= '    </div>';
                    $output .= '</div>';                    
                }
                $faqtitle .= '<h1 class="fs-1 ">Frequently ask questions</h1>';
                $faqcontent .= "<p class='fs-6 mb-6'>When deciding Which Charity to donate to, it's important to do your search and find one that aligns with your values and interests.</p>";
                $faqimage .= '<img class="img-fluid  fit-cover rounded" src="'.CLS_SITE_URL.'img/faq.jpg" alt="faq">';
                $response_data = array('data' => 'success', 'outcome' => $output , 'faqcontent' => $faqcontent, 'faqtitle' => $faqtitle ,'faqimage' => $faqimage);
            }
            $response = json_encode($response_data);
            return $response;
    }

    function reviewshow (){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $query = "SELECT logo_img,shopname,review,description FROM marketreviews WHERE status='1'";
        $result = $this->db->query($query);
        $output= $marketreviewtitle = "";        
               if ($result) {
                    while ($row = mysqli_fetch_array($result))  {
                        $image = $row["logo_img"];
                        $imagePath = "../admin1/assets/img/marketreview/".$image;
                        $decodedPath = htmlspecialchars_decode($imagePath);
                        $rating = $row['review']; 
                        $fullStars = floor($rating);
                        $halfStar = ($rating - $fullStars >= 0.5) ? 1 : 0;
                        $emptyStars = 5 - $fullStars - $halfStar;                                                   
                        $output .= '<div class="swiper-slide">';
                        $output .= '    <div class="testimonial-main-box rounded border rounded-3 p-2 bg-light mt-2 py-5">';
                        $output .= '        <div class="testi-img-box overflow-hidden">';
                        $output .= '            <a href="#"><img src="' . $decodedPath . '" class="img-fluid mx-auto rounded-circle" alt="shop1"></a>';
                        $output .= '        </div>';
                        $output .= '        <p class="mt-3 mb-4">"'.$row['description'].'"</p>';
                        $output .= '        <h4 class="mt-3">"'.$row['shopname'].'"</h4>';
                        $output .= '        <div class="d-flex justify-content-center mt-2">';                 
                        for ($i = 0; $i < $fullStars; $i++) {
                            $output .= '<i class="fa-solid fa-star text-primary"></i>';
                        }
                        if ($halfStar) {
                            $output .= '<i class="fa-solid fa-star-half-stroke text-primary"></i>';
                        }
                        for ($i = 0; $i < $emptyStars; $i++) {
                            $output .= '<i class="fa-regular fa-star text-primary"></i>'; // Regular star for empty stars
                        }
                        $output .= '            <h6>(' . $rating . ')</h6>';
                        $output .= '        </div>';
                        $output .= '        <div class="coma-box rounded">';
                        $output .= '            <i class="fa-solid fa-quote-right text-primary fs-2"></i>';
                        $output .= '        </div>';
                        $output .= '    </div>';
                        $output .= '</div>';                   
                        // print_r($row);               
                    }
                    $marketreviewtitle = '<div class="d-flex flex-column align-items-center mb-3">
                                                <h1>Markets by reviews</h1>
                                            </div>';
                    $response_data = array('data' => 'success', 'outcome' => $output , 'marketreviewtitle' => $marketreviewtitle);
                }
                $response = json_encode($response_data);
                return $response;
    }

    function marketlistshowclientside (){            
            $response_data = array('data' => 'fail', 'msg' => "Error");       
            $query = "SELECT name FROM markets LIMIT 30";
            $result = $this->db->query($query);            
            $output="";
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {     
                    // $image = $row["p_image"];
                    // $imagePath = "../admin1/assets/img/product_img/".$image;
                    // $decodedPath = htmlspecialchars_decode($imagePath);
                    $marketname =  $row['name'];        
                    $output .= '<li class="mt-2"><a href="#" class="text-decoration-none text-capitalize">'.$marketname.'</a></li>';
                }
                $response_data = array('data' => 'success', 'outcome' => $output);
            }
        $response = json_encode($response_data);
        return $response;
    }

    function marketlist2showclientside (){            
        $response_data = array('data' => 'fail', 'msg' => "Error");       
        $query = "SELECT name FROM markets LIMIT 30 OFFSET 30";
        $result = $this->db->query($query);            
        $output="";
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {     
                // $image = $row["p_image"];
                // $imagePath = "../admin1/assets/img/product_img/".$image;
                // $decodedPath = htmlspecialchars_decode($imagePath);
                $marketname =  $row['name'];        
                $output .= '<li class="mt-2"><a href="#" class="text-decoration-none text-capitalize">'.$marketname.'</a></li>';
            }
            $response_data = array('data' => 'success', 'outcome' => $output);
        }
        $response = json_encode($response_data);
        return $response;
    }

    function marketlist3showclientside (){            
        $response_data = array('data' => 'fail', 'msg' => "Error");     
        $query = "SELECT name FROM markets";
        $result = $this->db->query($query);     
        // print_r( $result);       
        $output="";
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {     
                // $image = $row["p_image"];
                // $imagePath = "../admin1/assets/img/product_img/".$image;
                // $decodedPath = htmlspecialchars_decode($imagePath);
                $marketname =  $row['name'];        
                $output .= '<li class="mt-2"><a href="#" class="text-decoration-none text-capitalize">'.$marketname.'</a></li>';
            }
            $response_data = array('data' => 'success', 'outcome' => $output);
        }
        $response = json_encode($response_data);
        return $response;
    }
    
    function truncateText($text, $wordLimit) {
        // Split the text into words
        $words = explode(' ', $text);
    
        // Check if the number of words exceeds the limit
        if (count($words) > $wordLimit) {
            // Truncate to the word limit and add ellipsis
            $words = array_slice($words, 0, $wordLimit);
            $text = implode(' ', $words) . '...';
        }
    
        return $text;
    }
    
    function truncateTextByChar($text, $charLimit) {
        // Check if the length of the text exceeds the limit
        if (strlen($text) > $charLimit) {
            // Truncate to the character limit and add ellipsis
            $text = substr($text, 0, $charLimit) . '...';
        }
    
        return $text;
    }
    
    function productshowclientside (){            
        $response_data = array('data' => 'fail', 'msg' => "Error"); 
        $output = [];
        $browsecategorytitle = $browsecategorybutton = $browsecategorytab = $browsecategorytabmobile = "";   
        
        $browsecategorytitle .='<div class="text-center wow bounceInUp" data-wow-delay="0.1s"><h1 class="display-5 mb-5">Browse by category</h1></div>';
        $browsecategorybutton .='<a href="'.CLS_SITE_URL .'collection2.php" class="d-flex justify-content-center wow bounceInUp"><button class="btn btn-primary text-capitalize px-5 mt-4 text-center">view all</button></a>';
      
        $categoryQuery = "SELECT * FROM b_textile_catagorys WHERE status='1' LIMIT 5";
        $categoryresult = $this->db->query($categoryQuery); 
        if ($categoryresult) {
            $index = 0;
            while ($categoryrow = mysqli_fetch_array($categoryresult)) { 
                $index++;
                $categoies_id = (isset($categoryrow['categories']) && $categoryrow['categories'] != '' ) ? $categoryrow['categories'] : '';
                $category_query = "SELECT * FROM allcategories WHERE categoies_id = $categoies_id";
                $category_result = $this->db->query($category_query);
                
                if (mysqli_num_rows($category_result) > 0) {
                    while ($category_row = mysqli_fetch_assoc($category_result)) {
                   
                        // $categories = [
                        //     "1" => "Armwear",
                        //     "2" => "Badges",
                        //     "3" => "Belts",
                        //     "4" => "Children's clothing",
                        //     "5" => "Clothing brands by type",
                        //     "6" => "Coats",
                        //     "7" => "Dresses",
                        //     "8" => "Footwear",
                        //     "9" => "Gowns",
                        //     "10" => "Handwear",
                        //     "11" => "Hosiery",
                        //     "12" => "Jackets",
                        //     "13" => "Jeans by type",
                        //     "14" => "Knee clothing",
                        //     "15" => "Masks",
                        //     "16" => "Neckwear",
                        //     "17" => "One-piece suits",
                        //     "18" => "Outerwear",
                        //     "19" => "Ponchos",
                        //     "20" => "Robes and cloaks",
                        //     "21" => "Royal attire",
                        //     "22" => "Saris",
                        //     "23" => "Sashes",
                        //     "24" => "Shawls and wraps",
                        //     "25" => "Skirts",
                        //     "26" => "Sportswear",
                        //     "27" => "Suits",
                        //     "28" => "Tops",
                        //     "29" => "Trousers and shorts",
                        //     "30" => "Undergarments",
                        //     "31" => "Wedding clothing"
                        // ];
                
                        $browsecategorytab .= $category_row['categoies_name'].',';
                        $browsecategorytabmobile .= $category_row['categoies_name'].',';
                        
                        $productquery = "SELECT * FROM products WHERE category='".$categoryrow['categories']."' AND status='1'";
                        $productresult = $this->db->query($productquery);   
                        if ($productresult) {
                            if (mysqli_num_rows($productresult) > 0) {
                                $categoryHTML = '';
                                $countCategoriesProduct = 0;
                                while ($productrow = mysqli_fetch_array($productresult)) {
                                    if($countCategoriesProduct < 9){
                                        $userquery = "SELECT * FROM users WHERE status='1' AND user_id='".$productrow['user_id']."'";
                                        $userresult = $this->db->query($userquery); 
                                        while ($userrow = mysqli_fetch_array($userresult)) {   
                                            $shopname = $userrow['shop'] ? $userrow['shop'] : '' ;
                                            $shopaddress = $userrow['address'] ? $userrow['address'] : '';
                                        }  
                                        $countCategoriesProduct++;
                                        $charLimit  = 105;
                                        $image = $productrow["p_image"];
                                        $imagePath = "../admin1/assets/img/product_img/".$image;
                                        $decodedPath = htmlspecialchars_decode($imagePath);
                                        $title =  $productrow['title'];
                                        // $p_description = $productrow['p_description'];
                                        $p_description = $this->truncateTextByChar($productrow['p_description'], $charLimit);

                                        $categoryHTML  .= '<div class="col-12 col-md-6 col-lg-4 mt-4 wow bounceInUp" data-wow-delay="0.1s">';
                                        $categoryHTML  .= '    <div class="market_list_mian_box">';
                                        $categoryHTML  .= '        <div class="market-head border-bottom">';
                                        $categoryHTML  .= '            <h6 class="text-primary fw-bold ms-3 mt-3">'.$title.'</h6>';
                                        $categoryHTML  .= '        </div>';
                                        $categoryHTML  .= '        <div class="market-content p-3">';
                                        $categoryHTML  .= '            <div class="d-flex justify-content-between pb-2 ">';
                                        $categoryHTML  .= '                <div class="col-3">';
                                        $categoryHTML  .= '                    <img class="img-fluid rounded w-100" src=' . $decodedPath . ' alt="kurti1">';
                                        $categoryHTML  .= '                </div>';
                                        $categoryHTML  .= '                <div class="col-6">';
                                        $categoryHTML  .= '                    <div class="ms-4">';
                                        $categoryHTML  .= '                        <div class="ms-1 d-inline fs-6"><span class="text-decoration-line-through price-line-through"><h6 class="fw-normal d-inline text-primary fs-6">Rs:</h6>'.$productrow['maxprice'].'</span><span>&nbsp;<h6 class="fw-normal d-inline text-primary fs-6">Rs:</h6>'. $productrow['minprice'].'</span></div>';
                                        $categoryHTML  .= '                        <p class="fs-7 justify mt-2 mb-0">'.$p_description.'</p>';
                                        $categoryHTML  .= '                    </div>';
                                        $categoryHTML  .= '                </div>';
                                        $categoryHTML  .= '                <div class="col-3 text-end">';
                                        $categoryHTML  .= '                    <div class="m-img-box p-1 border rounded w-50 d-inline-block">';
                                        $categoryHTML  .= '                        <img class="img-fluid rounded w-100" src=' . $decodedPath . ' alt="kurti1">';
                                        $categoryHTML  .= '                    </div>';
                                        $categoryHTML  .= '                    <div class="m-img-box p-1 border rounded w-50 mt-1 d-inline-block">';
                                        $categoryHTML  .= '                        <img class="img-fluid rounded w-100" src=' . $decodedPath . ' alt="kurti1">';
                                        $categoryHTML  .= '                    </div>';
                                        $categoryHTML  .= '                    <div class="m-img-box p-1 border rounded w-50 mt-1 d-inline-block">';
                                        $categoryHTML  .= '                        <img class="img-fluid rounded w-100" src=' . $decodedPath . ' alt="kurti1">';
                                        $categoryHTML  .= '                    </div>';
                                        $categoryHTML  .= '                </div>';
                                        $categoryHTML  .= '            </div>';            
                                        $categoryHTML  .= '            <div class="market-footer border-top">';
                                        $categoryHTML  .= '                <div class="market-name">';
                                        $categoryHTML  .= '                    <div class="d-flex align-items-center">';
                                        $categoryHTML  .= '                        <div class="m-icon">';
                                        $categoryHTML  .= '                            <i class="fa-solid fa-shield-halved fs-4 text-primary"></i>';
                                        $categoryHTML  .= '                        </div>';
                                        $categoryHTML  .= '                        <div class="m-name mt-2 ms-2">';
                                        $categoryHTML  .= '                            <h4 class="fs-5 p-0 m-0 text-second">' . $shopname . '</h4>';
                                        $categoryHTML  .= '                            <p class="fs-6 p-0 m-0">' . $shopaddress . '</p>';
                                        $categoryHTML  .= '                        </div>';
                                        $categoryHTML  .= '                    </div>';
                                        $categoryHTML  .= '                </div>';
                                        $categoryHTML  .= '            </div>';
                                        $categoryHTML  .= '            <div class="market-button d-flex mt-3">';
                                        $categoryHTML  .= '                <a href="' . CLS_SITE_URL . 'sellerdetail.php" class="btn btn-primary me-1 fs-6">Contact Seller</a>';
                                        $categoryHTML  .= '                <a href="' . CLS_SITE_URL . 'contact.php" class="btn btn-dark ms-1 fs-6 send-btn">Send Inquiry</a>';
                                        $categoryHTML  .= '                <a href="' . CLS_SITE_URL . 'collection.php" class="btn btn-primary ms-2 fs-6">Catalog</a>';
                                        $categoryHTML  .= '            </div>';
                                        $categoryHTML  .= '        </div>';
                                        $categoryHTML  .= '    </div>';
                                        $categoryHTML  .= '</div>';  
                                    }
                                }
                                $output[$category_row['categoies_name']] = $categoryHTML;
                                $response_data = array('data' => 'success', 'outcome' => $output , 'browsecategorytitle' => $browsecategorytitle , 'browsecategorybutton' => $browsecategorybutton, 'browsecategorytab' => $browsecategorytab, 'browsecategorytabmobile' => $browsecategorytabmobile );
                            }
                        }
                    }
                }
            }
           
        }
        
        $response = json_encode($response_data);
        return $response;
    }

}