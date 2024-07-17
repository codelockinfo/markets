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
        $query = "SELECT * FROM banners WHERE status='1' ORDER BY banner_id DESC LIMIT 1";
        $result = $this->db->query($query);
        $output = "";               
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {  
                $image = $row["banner_img"];
                // print_r($image);
                $imagePath = "../admin1/assets/img/banner_img/".$image;
                $decodedPath = htmlspecialchars_decode($imagePath);
                $output .= '<img class="banner img-fluid" src="'.$decodedPath.'" alt="home-banner">';
            }
               $response_data = array('data' => 'success', 'outcome' => $output);
        }
               $response = json_encode($response_data);
               return $response;

        
    }
    
    function famousmarketshow(){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $query = "SELECT Heading, Sub_Heading,Image FROM famous_markets WHERE status='1'";
        $result = $this->db->query($query);
        $output = "";       
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
               $response_data = array('data' => 'success', 'outcome' => $output);
        }
               $response = json_encode($response_data);
               return $response;

        
    }

    function offershow(){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $query = "SELECT img FROM offers";
        $result = $this->db->query($query);
        $output = "";       
        // print_r($query);
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {  
                $image = $row["img"];
                // print_r($image);
                $imagePath = "../admin1/assets/img/offers/".$image;
                $decodedPath = htmlspecialchars_decode($imagePath);      
                $output .= '<div class="col-12 col-md-6  wow bounceInUp"><a href="#"><img src="' .$decodedPath . '" class="img-fluid" alt="img-fluid"></a></div>';

            }
               $response_data = array('data' => 'success', 'outcome' => $output);
        }
               $response = json_encode($response_data);
               return $response;

        
    }
    function paragraphshow(){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $query = "SELECT * FROM paragraph"; 
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
        $query = "SELECT * FROM videos"; 
        $result = $this->db->query($query);
        $output = "";
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {  
                $link = $row["short_link"];
                $output .= '<div class="swiper-slide">';                        
                $output .= '<iframe width="100%" height="500px" src="' . $link . '?autoplay=1&loop=1&modestbranding=1&iv_load_policy=3&controls=0&rel=0&showinfo=0&disablekb=1" class="rounded border-radius-xl" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                $output .= '</div>';                
            }
                $response_data = array('data' => 'success', 'outcome' => $output);
        }
                $response = json_encode($response_data);
                return $response;
    }

    function FAQshow (){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $query = "SELECT * FROM faqs"; 
        $result = $this->db->query($query);
        $output="";
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {                 
                    $output .= '<div class="accordion-item border">';
                    $output .= '    <h2 class="accordion-header" id="heading' . $row["faq_id"] . '">';
                    $output .= '        <button class="accordion-button bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapse' . $row["faq_id"] . '" aria-expanded="false" aria-controls="collapse' . $row["faq_id"] . '">';
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
                $response_data = array('data' => 'success', 'outcome' => $output);
            }
                $response = json_encode($response_data);
                return $response;
    }

    function reviewshow (){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $query = "SELECT logo_img,shopname,review,description FROM marketreviews";
        $result = $this->db->query($query);
        $output="";        
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
                            $output .= '            <i class="fa-solid fa-star text-primary"></i>';
                        }
                        if ($halfStar) {
                            $output .= '            <i class="fa-solid fa-star-half-stroke text-primary"></i>';
                        }
                        for ($i = 0; $i < $emptyStars; $i++) {
                            $output .= '            <i class="fa-regular fa-star text-primary"></i>'; // Regular star for empty stars
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
                    $response_data = array('data' => 'success', 'outcome' => $output);
                }
                $response = json_encode($response_data);
                return $response;
    }

    function productshowclientside (){            
            $response_data = array('data' => 'fail', 'msg' => "Error");       
            $query = "SELECT p.title, p.maxprice, p.p_image, p.p_description, u.shop, u.address FROM products p LEFT JOIN users u ON p.user_id = u.user_id";
            $result = $this->db->query($query);            
            $output="";
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {     
                $image = $row["p_image"];
                $imagePath = "../admin1/assets/img/product_img/".$image;
                $decodedPath = htmlspecialchars_decode($imagePath);
                $title =  $row['title'];
                $price = $row['maxprice'];
                $p_description = $row['p_description'];
                $shopname = $row['shop'];
                $shopaddress = $row['address'];
                $output .= '<div class="col-12 col-md-6 col-lg-4 mt-4 wow bounceInUp" data-wow-delay="0.1s">';
                $output .= '    <div class="market_list_mian_box">';
                $output .= '        <div class="market-head border-bottom">';
                $output .= '            <h6 class="text-primary fw-bold ms-3 mt-3">'.$title.'</h6>';
                $output .= '        </div>';
                $output .= '        <div class="market-content p-3">';
                $output .= '            <div class="d-flex justify-content-between pb-2 ">';
                $output .= '                <div class="col-3">';
                $output .= '                    <img class="img-fluid rounded w-100" src=' . $decodedPath . ' alt="kurti1">';
                $output .= '                </div>';
                $output .= '                <div class="col-6">';
                $output .= '                    <div class="ms-4">';
                $output .= '                        <h6 class="fw-normal d-inline text-primary fs-6">Rs:</h6>';
                $output .= '                        <p class="ms-1 d-inline fs-6">'.$price.'</p>';
                $output .= '                        <p class="fs-7 justify mt-2">'.$p_description.'</p>';
                $output .= '                    </div>';
                $output .= '                </div>';
                $output .= '                <div class="col-3 text-end">';
                $output .= '                    <div class="m-img-box p-1 border rounded w-50 d-inline-block">';
                $output .= '                        <img class="img-fluid rounded w-100" src=' . $decodedPath . ' alt="kurti1">';
                $output .= '                    </div>';
                $output .= '                    <div class="m-img-box p-1 border rounded w-50 mt-1 d-inline-block">';
                $output .= '                        <img class="img-fluid rounded w-100" src=' . $decodedPath . ' alt="kurti1">';
                $output .= '                    </div>';
                $output .= '                    <div class="m-img-box p-1 border rounded w-50 mt-1 d-inline-block">';
                $output .= '                        <img class="img-fluid rounded w-100" src=' . $decodedPath . ' alt="kurti1">';
                $output .= '                    </div>';
                $output .= '                </div>';
                $output .= '            </div>';            
                $output .= '            <div class="market-footer border-top">';
                $output .= '                <div class="market-name">';
                $output .= '                    <div class="d-flex align-items-center">';
                $output .= '                        <div class="m-icon">';
                $output .= '                            <i class="fa-solid fa-shield-halved fs-4 text-primary"></i>';
                $output .= '                        </div>';
                $output .= '                        <div class="m-name mt-2 ms-2">';
                $output .= '                            <h4 class="fs-5 p-0 m-0 text-second">' . $shopname . '</h4>';
                $output .= '                            <p class="fs-6 p-0 m-0">' . $shopaddress . '</p>';
                $output .= '                        </div>';
                $output .= '                    </div>';
                $output .= '                </div>';
                $output .= '            </div>';
                $output .= '            <div class="market-button d-flex mt-3">';
                $output .= '                <a href="' . CLS_SITE_URL . 'sellerdetail.php" class="btn btn-primary me-1 fs-6">Contact Seller</a>';
                $output .= '                <a href="' . CLS_SITE_URL . 'contact.php" class="btn btn-dark ms-1 fs-6 send-btn">Send Inquiry</a>';
                $output .= '                <a href="' . CLS_SITE_URL . 'collection.php" class="btn btn-primary ms-2 fs-6">Catalog</a>';
                $output .= '            </div>';
                $output .= '        </div>';
                $output .= '    </div>';
                $output .= '</div>';             
            }
            $response_data = array('data' => 'success', 'outcome' => $output);
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
    $query = "SELECT name FROM markets LIMIT 18446744073709551615 OFFSET 60";
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

}