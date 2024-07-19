<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

// include_once '../append/Login.php';
include_once '../connection.php';

class admin_functions {
    public $cls_errors = array();
    public $msg = array();
    protected $db;
    public function __construct() {
        $db_connection = new DB_Class();
        $this->db = $GLOBALS['conn'];
    }

    public function demo_function(){
        $sql = "SELECT * FROM users"; 
        $result = $this->db->query($sql);

        if ($result === false) {
            die("Query failed: " . $this->db->error);
        }else{
            print_r($result);
        }
    }

    function insert_signin(){
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $strongPasswordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/';
        $error_array = array();
        if (empty($email)) {
            $error_array['email'] = "Please enter an email address";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_array['email'] = "Please enter the valid email address";
        }
        if (empty($password)) {
            $error_array['password'] = 'Please enter the password.';
        } elseif (!preg_match($strongPasswordPattern, $password)) {
            $error_array['password'] = 'Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.';
        }
        if (empty($error_array)) {
            $query = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
            $result = $this->db->query($query);
            if ($result->num_rows > 0) {
                $userinfo = mysqli_fetch_array($result);
                $_SESSION['current_user'] = $userinfo;
                $response_data = array('data' => 'success', 'msg' => 'login successfully');
            } else {
                $error_array['errormsg'] = 'Incorrect login!';
                $response_data = array('data' => 'fail', 'msg' => $error_array);
            }
        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array); 
        }
        $response = json_encode($response_data);
        return $response;
    }
    
    function insert_signup(){
        $error_array = array();
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $filename = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : '';
        $tmpfile = isset($_FILES["image"]["tmp_name"]) ? $_FILES["image"]["tmp_name"] : '';
        $fileName = $_FILES['image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $folder = "assets/img/sigup_img/";
        $fullpath= $folder . $newFilename;
        $file = $_FILES['image'];
        $maxSize = 5 * 1024 * 1024;  
        
        if (!is_dir($folder)) {
            $mkdir = mkdir($folder, 0777, true);
            if (!$mkdir) {
                $response_data = array('data' => 'fail', 'msg' => 'Failed to create directory for image upload.');
                return json_encode($response_data);
            }
        }
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['image'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }  
        if ($file['size'] > $maxSize) {
            $error_array['image'] = "File size must be 5MB or less.";          
        }
        if (isset($_POST['name']) && $_POST['name'] == '') {
            $error_array['name'] = "Please enter name";
        }
        if (isset($_POST['shop']) && $_POST['shop'] == '') {
            $error_array['shop'] = "Please enter shop name";
        }
        if (isset($_POST['address']) && $_POST['address'] == '') {
            $error_array['address'] = "Please enter address";
        }
        if (isset($_POST['phone_number']) && $_POST['phone_number'] == '') {
            $error_array['phone_number'] = "Please enter phone number";
        }
        if (isset($_POST['business_type']) && $_POST['business_type'] == '') {
            $error_array['business_type'] = "Please select business type";
        }
        if (empty($filename)) {
            $error_array['image'] = "Please select image";
       }
       $password = isset($_POST['password']) ? $_POST['password'] : '';
       $confirmPassword = isset($_POST['Confirm_Password']) ? $_POST['Confirm_Password'] : '';
       $email = isset($_POST['email']) ? $_POST['email'] : '';
       $error = '';
       $strongPasswordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/';
       if (empty($password)) {
           $error = 'Please enter a password.';
       } elseif (!preg_match($strongPasswordPattern, $password)) {
           $error = 'Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.';
       }
       if (empty($confirmPassword)) {
           $error_array['Confirm_Password'] ="Please enter a confirm password";
       } elseif ($password !== $confirmPassword) {
           $error_array['Confirm_Password'] ="Passwords do not match";
       }
       if ($error) {
           $error_array['password'] = $error;
       }
       if (empty($email)) {
           $error_array['email'] = "Please enter an email address";
       } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $error_array['email'] = "Please enter a valid email address";
       }
       if (empty($error_array)) {            
            $name = (isset($_POST['name']) && $_POST['name'] !== '') ? $_POST['name'] : '';
            $name = str_replace("'", "\'", $name);
            $shop = (isset($_POST['shop']) && $_POST['shop'] !== '') ? $_POST['shop'] : '';
            $shop = str_replace("'", "\'", $shop);
            $address = (isset($_POST['address']) && $_POST['address'] !== '') ? $_POST['address'] : '';
            $address = str_replace("'", "\'", $address);
            $phone_number = (isset($_POST['phone_number']) && $_POST['phone_number'] !== '') ? $_POST['phone_number'] : '';
            $business_type = (isset($_POST['business_type']) && $_POST['business_type'] !== '') ? $_POST['business_type'] : '';
            $password = (isset($_POST['password']) && $_POST['password'] !== '') ? $_POST['password'] : '';
            $email = (isset($_POST['email']) && $_POST['email'] !== '') ? $_POST['email'] : '';
            $email_check_query = "SELECT * FROM users WHERE email = '$email'";
            $email_check_result = mysqli_query($this->db, $email_check_query);
            if ($email_check_result->num_rows > 0) {
                $error_arrayemail['email'] = "Email already reagister";
                $response_data = array('data' => 'fail', 'msg' => $error_arrayemail);
            }else{
                if (move_uploaded_file($tmpfile,$fullpath)) {
                    $query = "INSERT INTO users (name,shop,address,phone_number,business_type,shop_img,password,email) VALUES ('$name', '$shop','$address','$phone_number','$business_type','$newFilename','$password','$email')";
                    $result = $this->db->query($query);
                    if ($result) {
                        $response_data = array('data' => 'success', 'msg' => 'Data inserted successfully!');
                        
                        $message = file_get_contents('thankemail_template.php');
                        $to = $email;	
                        $subject = "Market Search"; 
                        $headers ="From:codelockinfo@gmail.com"." \r\n";     
                        $headers = "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                        $responceEmail = mail ($to, $subject, $message, $headers);	
                        
                        $last_id = mysqli_insert_id($this->db);
                        $user_query = "SELECT * FROM users WHERE user_id = $last_id";
                        $user_result = mysqli_query($this->db, $user_query);                
                        if ($user_result) {
                            $userinfo = mysqli_fetch_assoc($user_result);
                            $_SESSION['current_user'] = $userinfo;
                        } else {
                            $response_data = array('data' => 'fail', 'msg' => "Error fetching user info");
                        }
                    } else {
                        $response_data = array('data' => 'fail', 'msg' => "Error");
                    }
                }
            }            
            }else{
                $response_data = array('data' => 'fail', 'msg' => $error_array,'msg_error' => "Oops! Something went wrong ");
            }
            $response = json_encode($response_data);
            return $response;
    }

    function insert_products() {
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $error_array = array();
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $maxSize = 5 * 1024 * 1024;  // 5MB in bytes
        $filename = isset($_FILES["p_image"]["name"]) ? $_FILES["p_image"]["name"] : '';
        $tmpfile = isset($_FILES["p_image"]["tmp_name"]) ? $_FILES["p_image"]["tmp_name"] : '';
        $file = $_FILES['p_image'];
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time() . '.' . $extension;
        $fileName = $_FILES['p_image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/product_img/";
        $fullpath= $folder . $newFilename;
        if (!is_dir($folder)) {
            $mkdir = mkdir($folder, 0777, true);
            if (!$mkdir) {
                $response_data = array('data' => 'fail', 'msg' => 'Failed to create directory for image upload.');
                return json_encode($response_data);
            }
        }
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['p_image'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }
        if ($file['size'] > $maxSize) {
            $error_array['p_image'] = "File size must be 5MB or less.";
        }
        if (empty($filename)) {
            $error_array['p_image'] = "Please upload product images.";
        }
        if (isset($_POST['pname']) && $_POST['pname'] == '') {
            $error_array['pname'] = "Please enter product title.";
        }
        if (isset($_POST['select_catagory']) && $_POST['select_catagory'] == '') {
            $error_array['select_catagory'] = "Please select product category.";
        }
        if (isset($_POST['sku']) && $_POST['sku'] == '') {
            $error_array['sku'] = "Please enter a SKU.";
        }
        if (isset($_POST['min_price']) && $_POST['min_price'] == '') {
            $error_array['min_price'] = "Please enter a minimum price.";
        }
        if (isset($_POST['max_price']) && $_POST['max_price'] == '') {
            $error_array['max_price'] = "Please enter a maximum price.";
        }       
        if (isset($_POST['p_description']) && $_POST['p_description'] == '') {
            $error_array['p_description'] = "Please enter description.";
        }
        if (!isset($_POST['p_tag']) || $_POST['p_tag'] == '') {
            $error_array['p_tag'] = "Please select categories";
        }
        if (empty($error_array)) {
            if (move_uploaded_file($tmpfile, $fullpath)) {
                $product_name = (isset($_POST['pname']) && $_POST['pname'] !== '') ? $_POST['pname'] : '';
                $product_name = str_replace("'", "\'", $product_name);
                $select_catagory = (isset($_POST['select_catagory']) && $_POST['select_catagory'] !== '') ? $_POST['select_catagory'] : '';
                $min_price = (isset($_POST['min_price']) && $_POST['min_price'] !== '') ? $_POST['min_price'] : '';
                $max_price = (isset($_POST['max_price']) && $_POST['max_price'] !== '') ? $_POST['max_price'] : '';
                $p_tag = (isset($_POST['p_tag']) && is_array($_POST['p_tag'])) ? implode(',', $_POST['p_tag']) : '';
                $sku = (isset($_POST['sku']) && $_POST['sku'] !== '') ? $_POST['sku'] : '';              
                $product_image_alt = (isset($_POST['image_alt']) && $_POST['image_alt'] !== '') ? $_POST['image_alt'] : '';
                $p_description = (isset($_POST['p_description']) && $_POST['p_description'] !== '') ? $_POST['p_description'] : '';
                $p_description = str_replace("'", "\'", $p_description);
    
                if (isset($_SESSION['current_user']['user_id'])) {
                    $user_id = $_SESSION['current_user']['user_id'];                                      
                    $query = "INSERT INTO products (title, category,sku, minprice, maxprice, p_image, product_img_alt, p_tag, p_description, user_id) 
                              VALUES ('$product_name', '$select_catagory','$sku', '$min_price', '$max_price', '$newFilename', '$product_image_alt', '$p_tag', '$p_description', '$user_id')";
                    $result = $this->db->query($query);
                   
                if ($result) {
                    $response_data = array('data' => 'success', 'msg' => 'Product inserted successfully!');
                } else {
                    $response_data = array('data' => 'fail', 'msg' => "Error inserting into database");
                }
            } else {
                $response_data = array('data' => 'fail', 'msg' => "User not logged in.");
            }

            } else {
                $error_array['p_image'] = "Error moving uploaded file.";
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong.");
        }
            $response = json_encode($response_data);
            return $response;
    } 

    function isValidYouTubeURL($url) {
        $allowedPatterns = array(
            '/^https?:\/\/(www\.)?youtube\.com\/watch\?v=[a-zA-Z0-9_-]+$/',
            '/^https?:\/\/youtu\.be\/[a-zA-Z0-9_-]+$/',
            '/^https?:\/\/(www\.)?youtube\.com\/embed\/[a-zA-Z0-9_-]+$/'
        );
        foreach ($allowedPatterns as $pattern) {
            if (preg_match($pattern, $url)) {
                return true;
            }
        }
        return false;
    }

    function insert_videos(){
        $error_array = array();
        if (isset($_POST['video_title']) && $_POST['video_title'] == '') {
            $error_array['video_title'] = "Please enter video title";
        }
        if (isset($_POST['video_category']) && $_POST['video_category'] == '') {
            $error_array['video_category'] = "Please select video catagory";
        }
        if (isset($_POST['youtube_shorts']) && $_POST['youtube_shorts'] == '') {
            $error_array['youtube_shorts'] = "Please enter YouTube shorts link";
        } elseif (isset($_POST['youtube_shorts']) && !$this->isValidYouTubeURL($_POST['youtube_shorts'])) {
            $error_array['youtube_shorts'] = "Please enter a valid YouTube shorts link";
        }
        if (isset($_POST['youtube_vlogs']) && $_POST['youtube_vlogs'] == '') {
            $error_array['youtube_vlogs'] = "Please enter YouTube vlogs link";
        } elseif (isset($_POST['youtube_vlogs']) && !$this->isValidYouTubeURL($_POST['youtube_vlogs'])) {
            $error_array['youtube_vlogs'] = "Please enter a valid YouTube vlogs link";
        }        
        $this->isValidYouTubeURL($_POST['youtube_shorts']);
        if (empty($error_array)) {
            $video_title = (isset($_POST['video_title']) && $_POST['video_title'] !== '') ? $_POST['video_title'] : '';
            $video_title = str_replace("'", "\'", $video_title);
            $video_category = (isset($_POST['video_category']) && $_POST['video_category'] !== '') ? $_POST['video_category'] : '';
            $youtube_shorts = (isset($_POST['youtube_shorts']) && $_POST['youtube_shorts'] !== '') ? $_POST['youtube_shorts'] : '';
            $youtube_vlogs = (isset($_POST['youtube_vlogs']) && $_POST['youtube_vlogs'] !== '') ? $_POST['youtube_vlogs'] : '';
          
            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO videos (title,category,short_link,vlog_link,user_id) VALUES ('$video_title', '$video_category','$youtube_shorts','$youtube_vlogs','$user_id')";
                $result = $this->db->query($query);
            }
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'Youtube Link inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }
        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array,'msg_error' => "Oops! Something went wrong ");
        }
            $response = json_encode($response_data);
            return $response;
    }

    function insert_blog(){ 
        $error_array = array();
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $filename = isset($_FILES["blog_image"]["name"]) ? $_FILES["blog_image"]["name"] : '';
        $tmpfile = isset($_FILES["blog_image"]["tmp_name"]) ? $_FILES["blog_image"]["tmp_name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $fileName = $_FILES['blog_image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/blog_img/";
        $fullpath= $folder . $newFilename;
        $file = $_FILES['blog_image'];
        $maxSize = 5 * 1024 * 1024;  // 5MB in bytes

        if (!is_dir($folder)) {
            $mkdir = mkdir($folder, 0777, true);
            if (!$mkdir) {
                $response_data = array('data' => 'fail', 'msg' => 'Failed to create directory for image upload.');
                return json_encode($response_data);
            }
        }
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['blog_image'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }      
        if ($file['size'] > $maxSize) {
            $error_array['blog_image'] = "File size must be 5MB or less.";           
        }
        if (isset($_POST['blog_title']) && $_POST['blog_title'] == '') {
            $error_array['blog_title'] = "Please enter blog title";
        }
        if (isset($_POST['blog_category']) && $_POST['blog_category'] == '') {
            $error_array['blog_category'] = "Please select blog catagory";
        }
        if (isset($_POST['myeditor']) && $_POST['myeditor'] == '') {
            $error_array['myeditor'] = "Please fill body textarea";
        }
        if (empty($filename)) {
            $error_array['blog_image'] = "Please upload your blog image";
        }
        if (isset($_POST['author_name']) && $_POST['author_name'] == '') {
            $error_array['author_name'] = "Please enter author name";
        }
        if (empty($error_array)) {
            if (move_uploaded_file($tmpfile,$fullpath)) {
                $blog_title = (isset($_POST['blog_title']) && $_POST['blog_title'] !== '') ? $_POST['blog_title'] : '';
                $blog_category = (isset($_POST['blog_category']) && $_POST['blog_category'] !== '') ? $_POST['blog_category'] : '';
                $myeditor = (isset($_POST['myeditor']) && $_POST['myeditor'] !== '') ? $_POST['myeditor'] : '';
                $author_name = (isset($_POST['author_name']) && $_POST['author_name'] !== '') ? $_POST['author_name'] : '';
                $blog_image_alt = (isset($_POST['blog_image_alt']) && $_POST['blog_image_alt'] !== '') ? $_POST['blog_image_alt'] : '';
               
                if (isset($_SESSION['current_user']['user_id'])) {
                    $user_id = $_SESSION['current_user']['user_id'];
                    $query = "INSERT INTO blogs (title,category,body,author_name,image,blog_img_alt,user_id) VALUES ('$blog_title', '$blog_category','$myeditor','$author_name','$newFilename','$blog_image_alt','$user_id')";
                    $result = $this->db->query($query);
                }
                if ($result) {
                    $response_data = array('data' => 'success', 'msg' => 'Blog inserted successfully!');
                } else {
                    $response_data = array('data' => 'fail', 'msg' => "Error");
                }
            }
        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array,'msg_error' => "Oops! Something went wrong ");
        }
            $response = json_encode($response_data);
            return $response;
    }

    function isValidURL($url) {
        $allowedPatterns = array(
          "/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i"
        );
        foreach ($allowedPatterns as $pattern) {
            if (preg_match($pattern, $url)) {
                return true;
            }
        }
        return false;
    }

    function insert_banner(){
        $error_array = array();
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $filename = isset($_FILES["myFile"]["name"]) ? $_FILES["myFile"]["name"] : '';
        $tmpfile = isset($_FILES["myFile"]["tmp_name"]) ? $_FILES["myFile"]["tmp_name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $fileName = $_FILES['myFile']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/banner_img/";
        $fullpath= $folder . $newFilename;
        $file = $_FILES['myFile'];
        $maxSize = 5 * 1024 * 1024;

        if (!is_dir($folder)) {
            $mkdir = mkdir($folder, 0777, true);
            if (!$mkdir) {
                $response_data = array('data' => 'fail', 'msg' => 'Failed to create directory for image upload.');
                return json_encode($response_data);
            }
        }
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['myFile'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }      
        if ($file['size'] > $maxSize) {
            $error_array['myFile'] = "File size must be 5MB or less.";
        }
        if (empty($filename)) {
            $error_array['myFile'] = "Please upload your banner image";
        }      
        if (isset($_POST['heading']) && $_POST['heading'] == '') {
            $error_array['heading'] = "Please enter the heading";
        }
        if (isset($_POST['sub_heading']) && $_POST['sub_heading'] == '') {
            $error_array['sub_heading'] = "Please enter the sub heading";
        }
        if (isset($_POST['banner_text']) && $_POST['banner_text'] == '') {
            $error_array['banner_text'] = "Please enter the banner text";
        }
        if (isset($_POST['banner_btn_link']) && $_POST['banner_btn_link'] == '') {
            $error_array['banner_btn_link'] = "Please enter the banner button link";
        } elseif (isset($_POST['banner_btn_link']) && !$this->isValidURL($_POST['banner_btn_link'])) {
            $error_array['banner_btn_link'] = "Please enter a valid banner button link";
        }
        if (empty($error_array)) {
            if (move_uploaded_file($tmpfile,$fullpath)) {
            $image_alt = (isset($_POST['image_alt']) && $_POST['image_alt'] !== '') ? $_POST['image_alt'] : '';
            $heading = (isset($_POST['heading']) && $_POST['heading'] !== '') ? $_POST['heading'] : '';
            $sub_heading = (isset($_POST['sub_heading']) && $_POST['sub_heading'] !== '') ? $_POST['sub_heading'] : '';
            $banner_text = (isset($_POST['banner_text']) && $_POST['banner_text'] !== '') ? $_POST['banner_text'] : '';
            $banner_btn_link = (isset($_POST['banner_btn_link']) && $_POST['banner_btn_link'] !== '') ? $_POST['banner_btn_link'] : '';
          
            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO banners (banner_img,img_alt,heading,sub_heading,banner_text,banner_btn_link,user_id) VALUES ('$newFilename','$image_alt', '$heading','$sub_heading','$banner_text','$banner_btn_link','$user_id')";
                $result = $this->db->query($query);
            }
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'Banner inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }
        }
        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
            $response = json_encode($response_data);
            return $response;
    }
    
    function insert_market(){
        $error_array = array();
        $file = $_FILES['svg_img'];       
        $maxSize = 5 * 1024 * 1024;
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $svg_img = isset($_FILES["svg_img"]["name"]) ? $_FILES["svg_img"]["name"] : '';
        $svgtmpfile = isset($_FILES["svg_img"]["tmp_name"]) ? $_FILES["svg_img"]["tmp_name"] : '';
        $extension = pathinfo($svg_img, PATHINFO_EXTENSION);
        $svg_newFilename = time(). '.' . $extension;
        $fileName = $_FILES['svg_img']['name'];
        $fileNameCmps = explode(".", $svg_img);
        $svgfileExtension = strtolower(end($fileNameCmps));
        $svgfolder = "assets/img/famous_market/svg_img/";
        $svgfullpath= $svgfolder . $svg_newFilename;
        if (!is_dir($svgfolder)) {
            $mkdir = mkdir($svgfolder, 0777, true);
            if (!$mkdir) {
                $response_data = array('data' => 'fail', 'msg' => 'Failed to create directory for image upload.');
                return json_encode($response_data);
            }
        }
        $file = $_FILES['img'];
        $maxSize = 5 * 1024 * 1024; 
        $filename = isset($_FILES["img"]["name"]) ? $_FILES["img"]["name"] : '';
        $tmpfile = isset($_FILES["img"]["tmp_name"]) ? $_FILES["img"]["tmp_name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $fileName = $_FILES['img']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/famous_market/img/";
        $fullpath= $folder . $newFilename;
        if (!is_dir($folder)) {
            $mkdir = mkdir($folder, 0777, true);
            if (!$mkdir) {
                $response_data = array('data' => 'fail', 'msg' => 'Failed to create directory for image upload.');
                return json_encode($response_data);
            }
        }          
        if (isset($_POST['shop_logo']) && $_POST['shop_logo'] == '') {
            $error_array['shop_logo'] = "Please enter the shop logo";
        }
        if (!in_array($svgfileExtension, $allowedExtensions)) {
            $error_array['svg_img'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }        
        if ($file['size'] > $maxSize) {
            $error_array['svg_img'] = "File size must be 5MB or less.";
        }
        if (empty($svg_img)) {
            $error_array['svg_img'] = "Please upload your svg image";
        }    
        if (isset($_POST['heading']) && $_POST['heading'] == '') {
            $error_array['heading'] = "Please enter the heading";
        }
        if (isset($_POST['sub_heading']) && $_POST['sub_heading'] == '') {
            $error_array['sub_heading'] = "Please enter the sub heading";
        }
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['img'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }       
        if ($file['size'] > $maxSize) {
            $error_array['img'] = "File size must be 5MB or less.";
        }
        if (empty($filename)) {
            $error_array['img'] = "Please upload your image";
        }     
        if (empty($error_array)) {
            $movefirst = move_uploaded_file($svgtmpfile,$svgfullpath);
            $movesecond = move_uploaded_file($tmpfile,$fullpath);
            if ($movefirst && $movesecond) {
            $shop_logo = (isset($_POST['shop_logo']) && $_POST['shop_logo'] !== '') ? $_POST['shop_logo'] : '';
            $shop_logo = str_replace("'", "\'", $shop_logo);
            $image_alt = (isset($_POST['image_alt']) && $_POST['image_alt'] !== '') ? $_POST['image_alt'] : '';
            $svg_image_alt = (isset($_POST['svg_image_alt']) && $_POST['svg_image_alt'] !== '') ? $_POST['svg_image_alt'] : '';
            $heading = (isset($_POST['heading']) && $_POST['heading'] !== '') ? $_POST['heading'] : '';
            $sub_heading = (isset($_POST['sub_heading']) && $_POST['sub_heading'] !== '') ? $_POST['sub_heading'] : '';

            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO famous_markets (shop_logo,SVG_Image,svg_alt,Heading,Sub_Heading,Image,img_alt,user_id) VALUES ('$shop_logo','$svg_newFilename','$svg_image_alt','$heading','$sub_heading','$newFilename','$image_alt','$user_id')";           
                $result = $this->db->query($query);
            }
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'market inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }
        }
        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array ,'msg_error' => "Oops! Something went wrong ");
        }
            $response = json_encode($response_data);
            return $response;
    }

    function insert_brousetxt(){
        $error_array = array();
        if (!isset($_POST['categories']) || $_POST['categories'] == '') {
            $error_array['categories'] = "Please select categories";
        }

        if (empty($error_array)) {          
                 $categories = (isset($_POST['categories']) && is_array($_POST['categories'])) ? implode(',', $_POST['categories']) : '';
                 print_r($categories);
                 die;
            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO b_textile_catagorys (categories,user_id) VALUES ('$categories','$user_id')";
                $result = $this->db->query($query);
                // print_r($result);
            }
            if ($result) {                
                $response_data = array('data' => 'success', 'msg' => 'Brouse By Textile Categories Form inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }
       
        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array ,'msg_error' => "Oops! Something went wrong ");
        }
            $response = json_encode($response_data);
            return $response;
    }

    function insert_offers(){
        $error_array = array();
        $file = $_FILES['myFile'];
        $maxSize = 5 * 1024 * 1024;
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $filename = isset($_FILES["myFile"]["name"]) ? $_FILES["myFile"]["name"] : '';
        $tmpfile = isset($_FILES["myFile"]["tmp_name"]) ? $_FILES["myFile"]["tmp_name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $fileName = $_FILES['myFile']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/offers/";
        $fullpath= $folder . $newFilename;
        if (!is_dir($folder)) {
            $mkdir = mkdir($folder, 0777, true);
            if (!$mkdir) {
                $response_data = array('data' => 'fail', 'msg' => 'Failed to create directory for image upload.');
                return json_encode($response_data);
            }
        }
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['myFile'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }       
        if ($file['size'] > $maxSize) {
            $error_array['myFile'] = "File size must be 5MB or less.";
        }
        if (empty($filename)) {
            $error_array['myFile'] = "Please upload your image";
        }
        if (isset($_POST['img_link']) && $_POST['img_link'] == '') {
            $error_array['img_link'] = "Please enter image link";
        } elseif (isset($_POST['img_link']) && !$this->isValidURL($_POST['img_link'])) {
            $error_array['img_link'] = "Please enter a valid image link";
        }
        if (empty($error_array)) {
            if (move_uploaded_file($tmpfile,$fullpath)){
            $img_link = (isset($_POST['img_link']) && $_POST['img_link'] !== '') ? $_POST['img_link'] : '';
            $image_alt = (isset($_POST['image_alt']) && $_POST['image_alt'] !== '') ? $_POST['image_alt'] : '';

            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO offers (img,img_alt,img_link,user_id) VALUES ('$newFilename','$image_alt','$img_link','$user_id')";
                $result = $this->db->query($query);
            }
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'Offers Form inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }
        }
        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array ,'msg_error' => "Oops! Something went wrong ");
        }
            $response = json_encode($response_data);
            return $response;
    }

    function insert_paragraph(){ 
        $error_array = array();
        if (isset($_POST['myeditor']) && $_POST['myeditor'] == '') {
            $error_array['myeditor'] = "Please enter paragraph";
        }
        if (empty($error_array)) {
            $myeditor = (isset($_POST['myeditor']) && $_POST['myeditor'] !== '') ? $_POST['myeditor'] : '';
            $myeditor = str_replace("'", "\'", $myeditor);

            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO paragraph (paragraph,user_id) VALUES ('$myeditor','$user_id')";
                $result = $this->db->query($query);
            }
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'paragraph inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }
        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array ,'msg_error' => "Oops! Something went wrong ");
        }
            $response = json_encode($response_data);
            return $response;
    }
    
    function insert_faq(){ 
        $error_array = array();
        if (isset($_POST['faq_question']) && $_POST['faq_question'] == '') {
            $error_array['faq_question'] = "Please enter question";
        }
        if (isset($_POST['myeditor']) && $_POST['myeditor'] == '') {
            $error_array['myeditor'] = "Please enter answer";
        }
        if (empty($error_array)) {
            $faq_question = (isset($_POST['faq_question']) && $_POST['faq_question'] !== '') ? $_POST['faq_question'] : '';
            $myeditor = (isset($_POST['myeditor']) && $_POST['myeditor'] !== '') ? $_POST['myeditor'] : '';
            $myeditor = str_replace("'", "\'", $myeditor);

            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
            $query = "INSERT INTO faqs (question,answer,user_id) VALUES ('$faq_question','$myeditor','$user_id')";
            $result = $this->db->query($query);
            }
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'FAQ inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }

        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array ,'msg_error' => "Oops! Something went wrong ");
        }
            $response = json_encode($response_data);
            return $response;
    }
    
    function insert_review(){
        $error_array = array();
        $file = $_FILES['shop_image'];
        $maxSize = 5 * 1024 * 1024; 
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $filename = isset($_FILES["shop_image"]["name"]) ? $_FILES["shop_image"]["name"] : '';
        $tmpfile = isset($_FILES["shop_image"]["tmp_name"]) ? $_FILES["shop_image"]["tmp_name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $fileName = $_FILES['shop_image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/marketreview/";
        $fullpath= $folder . $newFilename;
        if (!is_dir($folder)) {
            $mkdir = mkdir($folder, 0777, true);
            if (!$mkdir) {
                $response_data = array('data' => 'fail', 'msg' => 'Failed to create directory for image upload.');
                return json_encode($response_data);
            }
        }
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['shop_image'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }        
        if ($file['size'] > $maxSize) {
            $error_array['shop_image'] = "File size must be 5MB or less.";
        }
        if (empty($filename)) {
            $error_array['shop_image'] = "Please upload a shop logo.";
        }
        if (isset($_POST['shop_description']) && $_POST['shop_description'] == '') {
            $error_array['shop_description'] = "Please enter the shop description";
        }
        if (isset($_POST['shop_name']) && $_POST['shop_name'] == '') {
            $error_array['shop_name'] = "Please enter the shop name";
        }
        if (isset($_POST['review']) && $_POST['review'] == '') {
            $error_array['review'] = "Please give a review";
        }
        if (empty($error_array)) {
            if (move_uploaded_file($tmpfile,$fullpath)) {
            $shop_description = (isset($_POST['shop_description']) && $_POST['shop_description'] !== '') ? $_POST['shop_description'] : '';
            $shop_name = (isset($_POST['shop_name']) && $_POST['shop_name'] !== '') ? $_POST['shop_name'] : '';
            $review = (isset($_POST['review']) && $_POST['review'] !== '') ? $_POST['review'] : '';

            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO marketreviews (logo_img,description,shopname,review,user_id) VALUES ('$newFilename','$shop_description','$shop_name','$review','$user_id')";
                $result = $this->db->query($query);
            }
            if ($result) {                
                $response_data = array('data' => 'success', 'msg' => 'Data inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }
        }
        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array ,'msg_error' => "Oops! Something went wrong ");
        }
            $response = json_encode($response_data);
            return $response;
    }  

    function productlisting (){ 
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            // print_r($user_id);
            $query = "SELECT * FROM products WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output="";
        }        
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $image = $row["p_image"];
                    $imagePath = "../admin1/assets/img/product_img/".$image;
                    $decodedPath = htmlspecialchars_decode($imagePath);
                    $title =  $row['title'];
                    $price = $row['maxprice'];
                    $output .= '<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">';
                    $output .= '  <div class="card card-blog card-plain">';
                    $output .= '    <div class="position-relative">';
                    $output .= '      <a class="d-block shadow-xl border-radius-xl">';
                    $output .= '        <img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">';
                    $output .= '      </a>';
                    $output .= '    </div>';
                    $output .= '    <div class="card-body px-1 pb-0">';
                    $output .= '      <a href="#">';
                    $output .= '        <h5> '. $title .'</h5>';
                    $output .= '      </a>';
                    $output .= '      <div class="d-flex justify-content-between mb-3">';
                    $output .= '        <div class="d-flex align-items-center text-sm">'. $price .'</div>';
                    $output .= '        <div class="ms-auto text-end">';
                    $output .= '          <button data-id="'.$row['product_id'].'" type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0 delete" data-delete-type="product">Delete</button>';
                    $output .= '          <button data-id="'.$row['product_id'].'" type="button" class="btn btn-outline-secondary text-dark px-3 btn-sm pt-2 mb-0 edit" data-edit-type="product">Edit</button>';
                    $output .= '        </div>';
                    $output .= '      </div>';
                    $output .= '    </div>';
                    $output .= '  </div>';
                    $output .= '</div>'; 
                    // print_r($row);    
                }
                    $response_data = array('data' => 'success', 'outcome' => $output);
                } else {
                    $response_data = array('data' => 'fail', 'outcome' => "No data found");
                }
            }
            $response = json_encode($response_data);
            return $response;
    }

    function listprofile (){
            $output="";
            $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];            
            $query = "SELECT shop_img,name,shop,phone_number,address FROM users WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
           
        }                         
             
           if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    $image = $row["shop_img"];
                    $imagePath = "../admin1/assets/img/users/".$image;
                    $decodedPath = htmlspecialchars_decode($imagePath);
                    $name =  $row['name'];
                    $shop = $row['shop'];
                    $phone_number = $row['phone_number'];
                    $address = $row['address'];
                    $output .= '<ul class="list-group">';
                    $output .= '<li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name:</strong> &nbsp;  '. $name .'</li>';
                    $output .= '<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Shop Name:</strong> &nbsp; '. $shop .'</li>';
                    $output .= '<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Address:</strong> &nbsp; '. $address .'</li>';
                    $output .= '<li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile Number:</strong> &nbsp; '. $phone_number .'</li>';
                    $output .= '</div>';
                    $output .= '</ul>';
                    
                    // print_r($row);    
                }             
                    $response_data = array('data' => 'success', 'outcome' => $output);
            }
                    $response = json_encode($response_data);
                    return $response;
    }

    function img (){
        $output="";
        $response_data = array('data' => 'fail', 'msg' => "Error");
    if (isset($_SESSION['current_user']['user_id'])) {
        $user_id = $_SESSION['current_user']['user_id'];            
        $query = "SELECT shop_img,shop FROM users WHERE user_id = '$user_id'";
        $result = $this->db->query($query);
       
    }                         
         
       if ($result) {
            while ($row = mysqli_fetch_array($result)) {
                $image = $row["shop_img"];
                $shop = $row['shop'];
                $imagePath = "../admin1/assets/img/sigup_img/".$image;
                $decodedPath = htmlspecialchars_decode($imagePath);
                $output .= '<li class="list-group-item border-0 ps-0 pb-0">';
                $output .= '<strong class="text-dark text-sm p-3">'. $shop .':</strong> &nbsp;';
                $output .= '<a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0 mt-3" href="#">';
                $output .= '<img src="' . $decodedPath . '"alt="profile_image" class="w-80 border-radius-lg shadow-sm mb-4">';
                $output .= '</a>';
                $output .= '</li>';
                $output .= '<div class="mx-auto text-center">';
                $output .= '<a href="' . SITE_ADMIN_URL . 'profile-form.php">';
                $output .= '<button type="button" class="btn bg-gradient-info btn-sm">Edit Profile</button>';
                $output .= '</a>';
                $output .= '</div>';
                
               
                $output .= '</ul>';
                
                // print_r($row);    
            }             
                $response_data = array('data' => 'success', 'outcome' => $output);
        }
                $response = json_encode($response_data);
                return $response;
}
        
    function bloglisting (){
        $response_data = array('data' => 'fail', 'msg' => "Error");       
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            // print_r($user_id);
            $query = "SELECT * FROM blogs WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output="";
        }                           
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {  
                    $image = $row["image"];
                    $imagePath = "../admin1/assets/img/blog_img/".$image;
                    $decodedPath = htmlspecialchars_decode($imagePath);
                    $title =  $row['title'];             
                    $output .= '<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">';
                    $output .= '  <div class="card card-blog card-plain">';
                    $output .= '    <div class="position-relative">';
                    $output .= '      <a class="d-block shadow-xl border-radius-xl">';
                    $output .= '        <img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl">';
                    $output .= '      </a>';
                    $output .= '    </div>';
                    $output .= '    <div class="card-body px-1 pb-0">';
                    $output .= '      <a href="#">';
                    $output .= '        <h5> '. $title .'</h5>';
                    $output .= '      </a>';
                    $output .= '      <div class="d-flex justify-content-between mb-3">';
                    $output .= '        <div class="ms-auto text-end">';
                    $output .= '          <button data-id="'.$row['blog_id'].'" type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0 delete" data-delete-type="blog">Delete</button>';
                    $output .= '          <button data-id="'.$row['blog_id'].'" type="button" class="btn btn-outline-secondary text-dark px-3 btn-sm pt-2 mb-0">Edit</button>';
                    $output .= '        </div>';
                    $output .= '      </div>';
                    $output .= '    </div>';
                    $output .= '  </div>';
                    $output .= '</div>';                   
            }
                $response_data = array('data' => 'success', 'outcome' => $output);
            } else {
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
        }
                $response = json_encode($response_data);
                return $response;
    }

    function videolisting (){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            // print_r($user_id);
            $query = "SELECT * FROM videos WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output="";
        }             
          if ($result) {
            if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {  
                $link = $row["short_link"];
                $title =  $row['title'];
                $output .= '<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">';
                $output .= '<div class="card card-blog card-plain">';
                $output .= '<div class="position-relative">';
                $output .= '<a class="border-radius-xl">';
                $output .= '<iframe width="100%" height="500px" src="' . $link . '" class="border-radius-xl" title="'. $title . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                $output .= '</a>';
                $output .= '</div>';
                $output .= '<div class="card-body px-1 pb-0">';
                $output .= '<div class="d-flex justify-content-between mb-3">';
                $output .= '<div class="ms-auto text-end">';
                $output .= '<button data-id="'.$row['video_id'].'" type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0 delete" data-delete-type="video">Delete</button>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
            }
                $response_data = array('data' => 'success', 'outcome' => $output);
            } else {
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
        }
                $response = json_encode($response_data);
                return $response;
    }

    function offerlisting (){
        $response_data = array('data' => 'fail', 'msg' => "Error");       
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            // print_r($user_id);
            $query = "SELECT * FROM offers WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output="";
        }        
            $output .= '<div class="mb-3 form-check-reverse text-right">
                        <div class="container">
                        <div class="btn-group">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>
                        </div>
                        </div>  
                        </div>
                        </div>
                        </div>';
            $output .= '</div>';
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {  
                    $image = $row["img"];
                    $imagePath = "../admin1/assets/img/offers/".$image;
                    $decodedPath = htmlspecialchars_decode($imagePath);
                    $output .= '<div class="col-xl-6 col-md-6 mb-xl-0 mb-2">';
                    $output .= '<div class="card card-blog card-plain">';
                    $output .= '<div class="position-relative">';
                    $output .= '<a class="d-block border-radius-xl">';
                    $output .= '<img src="'.$decodedPath.'" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg mb-3 mt-3">';
                    $output .= '</a>';
                    $output .= '</div>';
                    $output .= '<div class="d-flex justify-content-between mb-3">';
                    $output .= '<div class="ms-auto text-end">';
                    $output .= '<button data-id="'.$row['offer_id'].'" type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0 delete" data-delete-type="offer" >Delete</button>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                }
                    $response_data = array('data' => 'success', 'outcome' => $output);
                } else {
                    $response_data = array('data' => 'fail', 'outcome' => "No data found");
                }
            }
                    $response = json_encode($response_data);
                    return $response;
    }

    function brousetextilelisting (){
        $response_data = array('data' => 'fail', 'msg' => "Error");        
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            // print_r($user_id);
            $query = "SELECT * FROM b_textile_catagorys WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output="";
        }                
            $output .= '<div class="card z-index-0 p-3">';
            $output .= ' <div class="row">';
            $output .= '<div class="mb-3 form-check-reverse text-right">';
            $output .= '  <div class="container">';
            $output .= '    <div class="btn-group">';
            $output .= '      <div class="btn-group" role="group" aria-label="Basic example">';
            $output .= '        <div class="form-check form-switch ps-0">';
            $output .= '          <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>';
            $output .= '        </div>';
            $output .= '      </div>';
            $output .= '    </div>';
            $output .= '  </div>';
            $output .= '</div>';
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $image = $row["img"];
                    $imagePath = "../admin1/assets/img/brouse_textilectgry_img/".$image;
                    $decodedPath = htmlspecialchars_decode($imagePath);
                    $output .= '<div class="col-xl-6 col-md-6 mb-xl-0 mb-2">';
                    $output .= '  <div class="card card-blog card-plain">';
                    $output .= '    <div class="position-relative">';
                    $output .= '      <a class="d-block border-radius-xl">';
                    $output .= '        <img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg mb-3 mt-3">';
                    $output .= '      </a>';
                    $output .= '    </div>';
                    $output .= '    <div class="d-flex justify-content-between mb-3">';
                    $output .= '      <div class="ms-auto text-end">';
                    $output .= '        <button data-id="'.$row['b_textile_catagory_id'].'" type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0 delete" data-delete-type="b_textile_catagory">Delete</button>';
                    $output .= '      </div>';
                    $output .= '    </div>';
                    $output .= '  </div>';
                    $output .= '</div>';                    
                }
                $response_data = array('data' => 'success', 'outcome' => $output);
            } else {
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
        }
                $response = json_encode($response_data);
                return $response;
    }

    function FAQlisting (){
        $response_data = array('data' => 'fail', 'msg' => "Error");       
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            // print_r($user_id);
            $query = "SELECT * FROM faqs WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output="";
        }        
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $output .= '<div class="row mb-3">';
                    $output .= '  <div class="col-xl-11 accordion-item">';
                    $output .= '    <input type="checkbox" id="' . $row["faq_id"] . '">';
                    $output .= '    <label for="' . $row["faq_id"] . '" class="accordion-item-title"><span class="icon "></span> ' . $row["question"] . '</label>';
                    $output .= '    <div class="accordion-item-desc">';
                    $output .= '        ' . $row["answer"] . '';
                    $output .= '    </div>';
                    $output .= '  </div>';
                    $output .= '  <div class="col-xl-1">';
                    $output .= '    <i data-id= "' . $row["faq_id"] . '" class="fa fa-trash cursor-pointer mt-3 delete" data-delete-type="faq" aria-hidden="true"></i>';
                    $output .= '  </div>';
                    $output .= '</div>';                                  
                }
                $response_data = array('data' => 'success', 'outcome' => $output);
            } else {
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
        }
                $response = json_encode($response_data);
                return $response;
    }

    function paragraphlisting (){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            // print_r($user_id);
            $query = "SELECT * FROM paragraph WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output="";
        }        
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {  
                    $output .= '<div class="col-md-12 col-lg-12 wow bounceInUp">' . $row["paragraph"] . ' </div>';                
                }
                $response_data = array('data' => 'success', 'outcome' => $output);
            } else {
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
        }
                $response = json_encode($response_data);
                return $response;
    }

    function bannerlisting() {
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $query = "SELECT * FROM banners WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output = "";
    
            // HTML structure for the header part
            $output .= '<div class="mb-3 form-check-reverse text-right">';
            $output .= '  <div class="container">';
            $output .= '    <div class="btn-group">';
            $output .= '      <div class="btn-group" role="group" aria-label="Basic example">';
            $output .= '        <div class="form-check form-switch ps-0">';
            $output .= '          <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>';
            $output .= '        </div>';
            $output .= '      </div>';
            $output .= '    </div>';
            $output .= '  </div>';
            $output .= '</div>';
    
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $image = $row["banner_img"];
                        $imagePath = "../admin1/assets/img/banner_img/" . $image;
                        $decodedPath = htmlspecialchars_decode($imagePath);
                        $output .= '<div class="col-xl-6 col-md-6 mb-xl-0 mb-2">';
                        $output .= '<div class="card card-blog card-plain">';
                        $output .= '<div class="position-relative">';
                        $output .= '<a class="d-block border-radius-xl">';
                        $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg mb-3 mt-3">';
                        $output .= '</a>';
                        $output .= '</div>';
                        $output .= '<div class="d-flex justify-content-between mb-3">';
                        $output .= '<div class="ms-auto text-end">';
                        $output .= '<button type="button" data-id="' . $row['banner_id'] . '" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0 delete" data-delete-type="banner">Delete</button>';
                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '</div>';
                    }
                    $response_data = array('data' => 'success', 'outcome' => $output);
                } else {
                    $response_data = array('data' => 'fail', 'outcome' => "No data found");
                }
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => "User not logged in");
        }
        $response = json_encode($response_data);
        return $response;
    }
    
    function famousmarketlisting (){ 
        $response_data = array('data' => 'fail', 'msg' => "Error");    
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            // print_r($user_id);
            $query = "SELECT * FROM famous_markets WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output="";
        }        
            $output .= '<div class="mb-3 form-check-reverse text-right">';
            $output .= '  <div class="container">';
            $output .= '    <div class="btn-group">';
            $output .= '      <div class="btn-group" role="group" aria-label="Basic example">';
            $output .= '        <div class="form-check form-switch ps-0">';
            $output .= '          <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>';
            $output .= '        </div>';
            $output .= '      </div>';
            $output .= '    </div>';
            $output .= '  </div>';
            $output .= '</div>';
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {  
                // $svgimage = $row["SVG_img"];
                $image = $row["Image"];
                $imagePath = "../admin1/assets/img/famous_market/img/".$image;
                // $svgimagePath = "../admin1/assets/img/famous_market/svg_img/".$svgimage;
                $decodedPath = htmlspecialchars_decode($imagePath);
                $output .= '<div class="col-xl-6 col-md-6 mb-xl-0 mb-2">';
                $output .= '  <div class="card card-blog card-plain">';
                $output .= '    <div class="position-relative">';
                $output .= '      <a class="d-block border-radius-xl">';
                $output .= '        <img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg mb-3 mt-3">';
                $output .= '      </a>';
                $output .= '    </div>';
                $output .= '    <div class="d-flex justify-content-between mb-3">';
                $output .= '      <div class="ms-auto text-end">';
                $output .= '        <button data-id="'.$row['famous_market_id'].'" type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0 delete" data-delete-type="famous_market">Delete</button>';
                $output .= '      </div>';
                $output .= '    </div>';
                $output .= '  </div>';
                $output .= '</div>';        
            }
            $response_data = array('data' => 'success', 'outcome' => $output);
        } else {
            $response_data = array('data' => 'fail', 'outcome' => "No data found");
        }
    }
            $response = json_encode($response_data);
            return $response;
    } 

    function reviewlisting (){
        $response_data = array('data' => 'fail', 'msg' => "Error");      
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            // print_r($user_id);
            $query = "SELECT * FROM marketreviews WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output="";
        }        
            $output .= '<div class="mb-3 form-check-reverse text-right ">';
            $output .= '  <div class="container">';
            $output .= '    <div class="btn-group">';
            $output .= '      <div class="btn-group" role="group" aria-label="Basic example">';
            $output .= '        <div class="form-check form-switch ps-0">';
            $output .= '          <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" checked>';
            $output .= '        </div>';
            $output .= '      </div>';
            $output .= '    </div>';
            $output .= '  </div>';
            $output .= '</div>';
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $image = $row["logo_img"];
                    $imagePath = "../admin1/assets/img/marketreview/".$image;
                    $decodedPath = htmlspecialchars_decode($imagePath);               
                    $output .= '<div class="col-xl-6 col-md-6 mb-xl-0 mb-2">';
                    $output .= '  <div class="card card-blog card-plain">';
                    $output .= '    <div class="position-relative">';
                    $output .= '      <a class="d-block border-radius-xl">';
                    $output .= '        <img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg mb-3 mt-3">';
                    $output .= '      </a>';
                    $output .= '    </div>';
                    $output .= '    <div class="d-flex justify-content-between mb-3">';
                    $output .= '      <div class="ms-auto text-end">';
                    $output .= '        <button data-id="'.$row['marketreview_id'].'" type="button" class="btn btn-outline-danger text-danger px-3 btn-sm pt-2 mb-0 delete" data-delete-type="review">Delete</button>';
                    $output .= '      </div>';
                    $output .= '    </div>';
                    $output .= '  </div>';
                    $output .= '</div>';
                    
                }
                    $response_data = array('data' => 'success', 'outcome' => $output);
                } else {
                    $response_data = array('data' => 'fail', 'outcome' => "No data found");
                }
            }
                    $response = json_encode($response_data);
                    return $response;
    }

    function deleteRecord($table, $delete_id) {
        $delete_id = $this->db->real_escape_string($delete_id);
        $table_singular = rtrim($table, 's');
        $query = "DELETE FROM $table WHERE {$table_singular}_id = $delete_id";        
        $result = $this->db->query($query);
        if ($result === TRUE) {
            $response_data = array('data' => 'success', 'message' => "Delete successfully");
        } else {
            $response_data = array('data' => 'fail', 'message' => "Failed to delete record");
        }
        return json_encode($response_data);   
    }

    function productdelete() {
        $delete_id = isset($_POST["product_id"]) ? $_POST["product_id"] : '2';
        return $this->deleteRecord('products', $delete_id);
    }
    
    function blogdelete() {
        $delete_id = isset($_POST["blog_id"]) ? $_POST["blog_id"] : '2';
        return $this->deleteRecord('blogs', $delete_id);
    }
    
    function videodelete() {
        $delete_id = isset($_POST["video_id"]) ? $_POST["video_id"] : '2';
        return $this->deleteRecord('videos', $delete_id);
    }

    function bannerdelete() {
        $delete_id = isset($_POST["banner_id"]) ? $_POST["banner_id"] : '2';
        return $this->deleteRecord('banners', $delete_id);
    }

    function famousmarketdelete() {
        $delete_id = isset($_POST["famous_market_id"]) ? $_POST["famous_market_id"] : '2';
        return $this->deleteRecord('famous_markets', $delete_id);
    }

    function b_textile_catagorysdelete() {
        $delete_id = isset($_POST["b_textile_catagory_id"]) ? $_POST["b_textile_catagory_id"] : '2';
        return $this->deleteRecord('b_textile_catagorys', $delete_id);
    }

    function offerdelete() {
        $delete_id = isset($_POST["offer_id"]) ? $_POST["offer_id"] : '2';
        return $this->deleteRecord('offers', $delete_id);
    }

    function faqdelete() {
        $delete_id = isset($_POST["faq_id"]) ? $_POST["faq_id"] : '2';
        return $this->deleteRecord('faqs', $delete_id);
    }

    function reviewdelete() {
        $delete_id = isset($_POST["marketreview_id"]) ? $_POST["marketreview_id"] : '2';
        return $this->deleteRecord('marketreviews', $delete_id);
    }
    
    function forget_password(){
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        if (empty($email)) {
            $error_msg = "Please enter an email address";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_msg = "Please enter a valid email address";
        }
        if (empty($error_msg)) {
            $query = "SELECT * FROM users WHERE email = '$email'";
            $result = $this->db->query($query);
            if ($result->num_rows > 0) {
                $token = bin2hex(random_bytes(50));
                $expires = date("U") + 3600;
                $query = "INSERT INTO password_resets(email,token,expires) VALUES ('$email', '$token','$expires')";
                $result = $this->db->query($query);
                if ($result) {
                    $reset_link = SITE_ADMIN_URL."reset_password.php?token=" . $token;
                    $subject = "Password Reset Request";
                    $message = "Click on the following link to reset your password: " . $reset_link;
                    $headers = "From: no-reply@marketsearch.com";
            
                    if (mail($email, $subject, $message, $headers)) {
                        $response_data = array('data' => 'success', 'msg' => 'Password reset link has been sent to your email.');
                    } else {
                        $response_data = array('data' => 'fail', 'msg' => 'Failed to send reset link. Please try again.');
                    }  
                }
            }else{
                $response_data = array('data' => 'fail', 'msg' => 'No account found with that email address.');
            }  
        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_msg);
        }
        $response = json_encode($response_data);
        return $response;
    }
    
    function reset_passwordform(){
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $token = isset($_POST['token']) ? $_POST['token'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $strongPasswordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/';
        if (empty($password)) {
            $error = 'Please enter a password.';
        } elseif (!preg_match($strongPasswordPattern, $password)) {
            $error = 'Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.';
        }
        $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
        if(empty($error)){
            if ($password === $confirm_password) {
                $current_time = date("U");
                $query = "SELECT email FROM password_resets WHERE token = '$token' AND expires >= '$current_time'";
                $result = $this->db->query($query);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $email = $row['email'];
                    $query = "UPDATE users SET password = '$password' WHERE email = '$email'";
                    $result = $this->db->query($query); 
                    if($result){
                        $query = "DELETE FROM password_resets WHERE email = '$email'";        
                        $result = $this->db->query($query);
                        $response_data = array('data' => 'success', 'msg' => 'Your password has been reset successfully.');  
                    }else{
                        $response_data = array('data' => 'fail', 'msg' => 'Invalid or expired token.');   
                    }
                }
            }else{
                $response_data = array('data' => 'fail', 'msg' => 'Passwords do not match.');  
            }
        }else{
            $response_data = array('data' => 'fail', 'msg' => $error);  
        }
       
        $response = json_encode($response_data);
        return $response;
    }
}