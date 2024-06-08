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
        // echo "<pre>";
        // print_r($_POST);
        $filename = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;

        $error_array = array();
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
            $error_array['phone_number'] = "Please enter phone_number";
        }
        if (isset($_POST['business_type']) && $_POST['business_type'] == '') {
            $error_array['business_type'] = "Please select business_type";
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
        // echo "<pre>";
        // print_r($_POST);
        $filename = isset($_FILES["p_image"]["name"]) ? $_FILES["p_image"]["name"] : '';
        // $tmpfile = isset($_FILES["p_image"]["tmp_name"]) ? $_FILES["p_image"]["tmp_name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time(). '.' . $extension;
        // $folder = 'admin1/assets/img'.$newFilename;
        // move_uploaded_file($tmpfile,$folder);

        $error_array = array();
        if (isset($_POST['pname']) && $_POST['pname'] == '') {
            $error_array['pname'] = "Please enter Product Name";
        }
        if (isset($_POST['select_catagory']) && $_POST['select_catagory'] == '') {
            $error_array['select_catagory'] = "Please Select Product Catagory";
        }
        if (isset($_POST['p_price']) && $_POST['p_price'] == '') {
            $error_array['p_price'] = "Please Enter Product Price";
        }
        if (empty($filename)) {
            $error_array['p_image'] = "Please Upload Your Product Image";
       }
        if (isset($_POST['p_tag']) && $_POST['p_tag'] == '') {
            $error_array['p_tag'] = "Please Enter Product Tag";
        }
        if (isset($_POST['p_description']) && $_POST['p_description'] == '') {
            $error_array['p_description'] = "Please Enter Description";
        }
        if (empty($error_array)) {
            $product_name = (isset($_POST['pname']) && $_POST['pname'] !== '') ? $_POST['pname'] : '';
            $select_catagory = (isset($_POST['select_catagory']) && $_POST['select_catagory'] !== '') ? $_POST['select_catagory'] : '';
            $p_price = (isset($_POST['p_price']) && $_POST['p_price'] !== '') ? $_POST['p_price'] : '';
            // $newFilename = (isset($_FILES['p_image']) && $_FILES['p_image'] !== '') ? $_FILES['p_image'] : '';
            $p_tag = (isset($_POST['p_tag']) && $_POST['p_tag'] !== '') ? $_POST['p_tag'] : '';
            $p_description = (isset($_POST['p_description']) && $_POST['p_description'] !== '') ? $_POST['p_description'] : '';
           
            $query = "INSERT INTO products (title,category,price,p_image,p_tag,p_description) VALUES ('$product_name', '$select_catagory','$p_price','$newFilename','$p_tag','$p_description')";
            $result = $this->db->query($query);
            // echo "hii";
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
}
