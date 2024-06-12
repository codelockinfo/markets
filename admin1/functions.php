<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

// include_once '../append/Login.php';
include_once '../connection.php';

class admin_functions {

    public $cls_errors = array();
    public $msg = array();

    public function __construct() {
        $db_connection = new DB_Class();
        $this->db = $GLOBALS['conn'];
    }

    // CALLING THIS FUNCTION ON PAGE LOAd
    public function demo_function(){
        $sql = "SELECT * FROM users"; 
        $result = $this->db->query($sql);

        if ($result === false) {
            die("Query failed: " . $this->db->error);
        }else{
            print_r($result);
        }
    }
    function insert_signup(){
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $filename = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : '';
        $tmpfile = isset($_FILES["image"]["tmp_name"]) ? $_FILES["image"]["tmp_name"] : '';
        $fileName = $_FILES['image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $folder = "assets/img/sigup_img/" . $newFilename;
        move_uploaded_file($tmpfile,$folder);

        $error_array = array();

        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['image'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
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
            $shop = (isset($_POST['shop']) && $_POST['shop'] !== '') ? $_POST['shop'] : '';
            $address = (isset($_POST['address']) && $_POST['address'] !== '') ? $_POST['address'] : '';
            $phone_number = (isset($_POST['phone_number']) && $_POST['phone_number'] !== '') ? $_POST['phone_number'] : '';
            $business_type = (isset($_POST['business_type']) && $_POST['business_type'] !== '') ? $_POST['business_type'] : '';
            $password = (isset($_POST['password']) && $_POST['password'] !== '') ? $_POST['password'] : '';
            $email = (isset($_POST['email']) && $_POST['email'] !== '') ? $_POST['email'] : '';
            
            $query = "INSERT INTO users (name,shop,address,phone_number,business_type,shop_img,password,email) VALUES ('$name', '$shop','$address','$phone_number','$business_type','$newFilename','$password','$email')";
            $result = $this->db->query($query);
      
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'Data inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }

        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array);
        }
        $response = json_encode($response_data);
        return $response;
    }

    function insert_products(){
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $filename = isset($_FILES["p_image"]["name"]) ? $_FILES["p_image"]["name"] : '';
        $tmpfile = isset($_FILES["p_image"]["tmp_name"]) ? $_FILES["p_image"]["tmp_name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $fileName = $_FILES['p_image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/product_img/" . $newFilename;
        move_uploaded_file($tmpfile,$folder);
       

        $error_array = array();
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['p_image'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }
        if (isset($_POST['pname']) && $_POST['pname'] == '') {
            $error_array['pname'] = "Please enter product title";
        }
        if (isset($_POST['select_catagory']) && $_POST['select_catagory'] == '') {
            $error_array['select_catagory'] = "Please select product catagory";
        }
        if (isset($_POST['p_price']) && $_POST['p_price'] == '') {
            $error_array['p_price'] = "Please enter product price";
        }
        if (empty($filename)) {
            $error_array['p_image'] = "Please upload your product image";
       }
        if (isset($_POST['product_image_alt']) && $_POST['product_image_alt'] == '') {
        $error_array['product_image_alt'] = "Please enter product image alt";
        }
        if (isset($_POST['p_tag']) && $_POST['p_tag'] == '') {
            $error_array['p_tag'] = "Please enter product tag";
        }
        if (isset($_POST['p_description']) && $_POST['p_description'] == '') {
            $error_array['p_description'] = "Please enter description";
        }
        if (empty($error_array)) {
            $product_name = (isset($_POST['pname']) && $_POST['pname'] !== '') ? $_POST['pname'] : '';
            $select_catagory = (isset($_POST['select_catagory']) && $_POST['select_catagory'] !== '') ? $_POST['select_catagory'] : '';
            $p_price = (isset($_POST['p_price']) && $_POST['p_price'] !== '') ? $_POST['p_price'] : '';
            $p_tag = (isset($_POST['p_tag']) && $_POST['p_tag'] !== '') ? $_POST['p_tag'] : '';
            $product_image_alt = (isset($_POST['product_image_alt']) && $_POST['product_image_alt'] !== '') ? $_POST['product_image_alt'] : '';
            $p_description = (isset($_POST['p_description']) && $_POST['p_description'] !== '') ? $_POST['p_description'] : '';
           
            $query = "INSERT INTO products (title,category,price,p_image,product_img_alt,p_tag,p_description) VALUES ('$product_name', '$select_catagory','$p_price','$newFilename','$product_image_alt','$p_tag','$p_description')";
            $result = $this->db->query($query);
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'Product inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }

        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array);
        }
        $response = json_encode($response_data);
        return $response;
    }

    function isValidYouTubeURL($url) {
        $allowedPatterns = array(
            '/^https?:\/\/(www\.)?youtube\.com\/watch\?v=[a-zA-Z0-9_-]+$/',
            '/^https?:\/\/youtu\.be\/[a-zA-Z0-9_-]+$/',
            '/^https?:\/\/(www\.)?youtube\.com\/shorts\/[a-zA-Z0-9_-]+$/'
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
            $video_category = (isset($_POST['video_category']) && $_POST['video_category'] !== '') ? $_POST['video_category'] : '';
            $youtube_shorts = (isset($_POST['youtube_shorts']) && $_POST['youtube_shorts'] !== '') ? $_POST['youtube_shorts'] : '';
            $youtube_vlogs = (isset($_POST['youtube_vlogs']) && $_POST['youtube_vlogs'] !== '') ? $_POST['youtube_vlogs'] : '';
          
            $query = "INSERT INTO videos (title,category,short_link,vlog_link) VALUES ('$video_title', '$video_category','$youtube_shorts','$youtube_vlogs')";
            $result = $this->db->query($query);
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'Youtube Link inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }

        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array);
        }
        $response = json_encode($response_data);
        return $response;
    }
    function insert_blog(){ 
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $filename = isset($_FILES["blog_image"]["name"]) ? $_FILES["blog_image"]["name"] : '';
        $tmpfile = isset($_FILES["blog_image"]["tmp_name"]) ? $_FILES["blog_image"]["tmp_name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $fileName = $_FILES['blog_image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/blog_img/" . $newFilename;
        move_uploaded_file($tmpfile,$folder);
       

        $error_array = array();
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['blog_image'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
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
        if (isset($_POST['blog_image_alt']) && $_POST['blog_image_alt'] == '') {
        $error_array['blog_image_alt'] = "Please enter blog image alt";
        }
        if (isset($_POST['author_name']) && $_POST['author_name'] == '') {
            $error_array['author_name'] = "Please enter author name";
        }
        if (empty($error_array)) {
            $blog_title = (isset($_POST['blog_title']) && $_POST['blog_title'] !== '') ? $_POST['blog_title'] : '';
            $blog_category = (isset($_POST['blog_category']) && $_POST['blog_category'] !== '') ? $_POST['blog_category'] : '';
            $myeditor = (isset($_POST['myeditor']) && $_POST['myeditor'] !== '') ? $_POST['myeditor'] : '';
            $author_name = (isset($_POST['author_name']) && $_POST['author_name'] !== '') ? $_POST['author_name'] : '';
            $blog_image_alt = (isset($_POST['blog_image_alt']) && $_POST['blog_image_alt'] !== '') ? $_POST['blog_image_alt'] : '';
           
            $query = "INSERT INTO blogs (title,category,body,author_name,image,blog_img_alt) VALUES ('$blog_title', '$blog_category','$myeditor','$author_name','$newFilename','$blog_image_alt')";
            $result = $this->db->query($query);
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'Blog inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }

        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array);
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

        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $filename = isset($_FILES["myFile"]["name"]) ? $_FILES["myFile"]["name"] : '';
        $tmpfile = isset($_FILES["myFile"]["tmp_name"]) ? $_FILES["myFile"]["tmp_name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $fileName = $_FILES['myFile']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/banner_img/" . $newFilename;
        move_uploaded_file($tmpfile,$folder);

        $error_array = array();
       
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['myFile'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }
        if (empty($filename)) {
            $error_array['myFile'] = "Please upload your banner image";
        }
        if (isset($_POST['myFile']) && $_POST['myFile'] == '') {
            $error_array['myFile'] = "Please enter video title";
        }
        if (isset($_POST['image_alt']) && $_POST['image_alt'] == '') {
            $error_array['image_alt'] = "Please enter image_alt";
        }
        if (isset($_POST['heading']) && $_POST['heading'] == '') {
            $error_array['heading'] = "Please enter heading";
        }
        if (isset($_POST['sub_heading']) && $_POST['sub_heading'] == '') {
            $error_array['sub_heading'] = "Please enter sub heading";
        }
        if (isset($_POST['banner_text']) && $_POST['banner_text'] == '') {
            $error_array['banner_text'] = "Please enter banner text";
        }
        if (isset($_POST['banner_btn_link']) && $_POST['banner_btn_link'] == '') {
            $error_array['banner_btn_link'] = "Please enter banner button link";
        } elseif (isset($_POST['banner_btn_link']) && !$this->isValidURL($_POST['banner_btn_link'])) {
            $error_array['banner_btn_link'] = "Please enter a valid banner button link";
        }
        if (empty($error_array)) {
            $myFile = (isset($_POST['myFile']) && $_POST['myFile'] !== '') ? $_POST['myFile'] : '';
            $image_alt = (isset($_POST['image_alt']) && $_POST['image_alt'] !== '') ? $_POST['image_alt'] : '';
            $heading = (isset($_POST['heading']) && $_POST['heading'] !== '') ? $_POST['heading'] : '';
            $sub_heading = (isset($_POST['sub_heading']) && $_POST['sub_heading'] !== '') ? $_POST['sub_heading'] : '';
            $banner_text = (isset($_POST['banner_text']) && $_POST['banner_text'] !== '') ? $_POST['banner_text'] : '';
            $banner_btn_link = (isset($_POST['banner_btn_link']) && $_POST['banner_btn_link'] !== '') ? $_POST['banner_btn_link'] : '';
          
            $query = "INSERT INTO banner (banner_img,img_alt,heading,sub_heading,banner_text,banner_btn_link) VALUES ('$myFile','$image_alt', '$heading','$sub_heading','$banner_text','$banner_btn_link')";
            $result = $this->db->query($query);
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'Banner inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }

        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array);
        }
        $response = json_encode($response_data);
        return $response;
    }
    
    function insert_market(){

        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        // $filename = isset($_FILES["svg_img"]["name"]) ? $_FILES["svg_img"]["name"] : '';
        $svg_img = isset($_FILES["svg_img"]["name"]) ? $_FILES["svg_img"]["name"] : '';
        $svgtmpfile = isset($_FILES["svg_img"]["tmp_name"]) ? $_FILES["svg_img"]["tmp_name"] : '';
        $extension = pathinfo($svg_img, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $fileName = $_FILES['svg_img']['name'];
        $fileNameCmps = explode(".", $svg_img);
        $svgfileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/famous_market/svg_img/" . $newFilename;
        move_uploaded_file($svgtmpfile,$folder);


        $filename = isset($_FILES["img"]["name"]) ? $_FILES["img"]["name"] : '';
        $tmpfile = isset($_FILES["img"]["tmp_name"]) ? $_FILES["img"]["tmp_name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $fileName = $_FILES['img']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/famous_market/img/" . $newFilename;
        move_uploaded_file($tmpfile,$folder);
        
        $error_array = array();
       
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['img'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }
        if (empty($filename)) {
            $error_array['img'] = "Please upload your image";
        }
        if (isset($_POST['image_alt']) && $_POST['image_alt'] == '') {
            $error_array['image_alt'] = "Please enter image_alt";
        }
        if (!in_array($svgfileExtension, $allowedExtensions)) {
            $error_array['svg_img'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }
        if (empty($svg_img)) {
            $error_array['svg_img'] = "Please upload your svg image";
        }
        if (isset($_POST['svg_image_alt']) && $_POST['svg_image_alt'] == '') {
            $error_array['svg_image_alt'] = "Please enter image_alt";
        }
        if (isset($_POST['shop_logo']) && $_POST['shop_logo'] == '') {
            $error_array['shop_logo'] = "Please enter shop logo";
        }
        if (isset($_POST['heading']) && $_POST['heading'] == '') {
            $error_array['heading'] = "Please enter heading";
        }
        if (isset($_POST['sub_heading']) && $_POST['sub_heading'] == '') {
            $error_array['sub_heading'] = "Please enter sub heading";
        }
        if (empty($error_array)) {
            $shop_logo = (isset($_POST['shop_logo']) && $_POST['shop_logo'] !== '') ? $_POST['shop_logo'] : '';
            $image_alt = (isset($_POST['image_alt']) && $_POST['image_alt'] !== '') ? $_POST['image_alt'] : '';
            $svg_image_alt = (isset($_POST['svg_image_alt']) && $_POST['svg_image_alt'] !== '') ? $_POST['svg_image_alt'] : '';
            $heading = (isset($_POST['heading']) && $_POST['heading'] !== '') ? $_POST['heading'] : '';
            $sub_heading = (isset($_POST['sub_heading']) && $_POST['sub_heading'] !== '') ? $_POST['sub_heading'] : '';

            $query = "INSERT INTO famous_markets (shop_logo,SVG_Image,svg_alt,Heading,Sub_Heading,Image,img_alt) VALUES ('$shop_logo','$svg_img','$svg_image_alt','$heading','$sub_heading','$filename','$image_alt')";
            $result = $this->db->query($query);
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'market inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }

        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array);
        }
        $response = json_encode($response_data);
        return $response;
    }
    function insert_brousetxt(){

        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $filename = isset($_FILES["myFile"]["name"]) ? $_FILES["myFile"]["name"] : '';
        $tmpfile = isset($_FILES["myFile"]["tmp_name"]) ? $_FILES["myFile"]["tmp_name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $fileName = $_FILES['myFile']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/brouse_textilectgry_img/" . $newFilename;
        move_uploaded_file($tmpfile,$folder);

        $error_array = array();
      
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['myFile'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }
        if (empty($filename)) {
            $error_array['myFile'] = "Please upload your image";
        }
        if (isset($_POST['image_alt']) && $_POST['image_alt'] == '') {
            $error_array['image_alt'] = "Please enter image_alt";
        }
        if (isset($_POST['img_link']) && $_POST['img_link'] == '') {
            $error_array['img_link'] = "Please enter image link";
        } elseif (isset($_POST['img_link']) && !$this->isValidURL($_POST['img_link'])) {
            $error_array['img_link'] = "Please enter a valid image link";
        }
        if (empty($error_array)) {
            $img_link = (isset($_POST['img_link']) && $_POST['img_link'] !== '') ? $_POST['img_link'] : '';
            $image_alt = (isset($_POST['image_alt']) && $_POST['image_alt'] !== '') ? $_POST['image_alt'] : '';
            $query = "INSERT INTO b_textile_catagory (img,img_alt,img_link) VALUES ('$newFilename','$image_alt','$img_link')";
            $result = $this->db->query($query);
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'Brouse By Textile Categories Form inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }

        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array);
        }
        $response = json_encode($response_data);
        return $response;
    }

    function insert_offers(){

        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $filename = isset($_FILES["myFile"]["name"]) ? $_FILES["myFile"]["name"] : '';
        $tmpfile = isset($_FILES["myFile"]["tmp_name"]) ? $_FILES["myFile"]["tmp_name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        $fileName = $_FILES['myFile']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/brouse_textilectgry_img/" . $newFilename;
        move_uploaded_file($tmpfile,$folder);

        $error_array = array();
      
        if (!in_array($fileExtension, $allowedExtensions)) {
            $error_array['myFile'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
        }
        if (empty($filename)) {
            $error_array['myFile'] = "Please upload your image";
        }
        if (isset($_POST['image_alt']) && $_POST['image_alt'] == '') {
            $error_array['image_alt'] = "Please enter image_alt";
        }
        if (isset($_POST['img_link']) && $_POST['img_link'] == '') {
            $error_array['img_link'] = "Please enter image link";
        } elseif (isset($_POST['img_link']) && !$this->isValidURL($_POST['img_link'])) {
            $error_array['img_link'] = "Please enter a valid image link";
        }
        if (empty($error_array)) {
            $img_link = (isset($_POST['img_link']) && $_POST['img_link'] !== '') ? $_POST['img_link'] : '';
            $image_alt = (isset($_POST['image_alt']) && $_POST['image_alt'] !== '') ? $_POST['image_alt'] : '';
            $query = "INSERT INTO offers (img,img_alt,img_link) VALUES ('$newFilename','$image_alt','$img_link')";
            $result = $this->db->query($query);
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'Offers Form inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }

        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array);
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
           
            $query = "INSERT INTO paragraph (paragraph) VALUES ('$myeditor')";
            $result = $this->db->query($query);
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'paragraph inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }

        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array);
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
           
            $query = "INSERT INTO faq (question,answer) VALUES ('$faq_question','$myeditor')";
            $result = $this->db->query($query);
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'FAQ inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }

        }else{
            $response_data = array('data' => 'fail', 'msg' => $error_array);
        }
        $response = json_encode($response_data);
        return $response;
    }

}
