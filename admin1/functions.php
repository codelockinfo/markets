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
        if (isset($_POST['image']) && $_POST['image'] == '') {
            $error_array['image'] = "Please select image";
        }
        if (isset($_POST['password']) && $_POST['password'] == '') {
            $error_array['password'] = "Please enter password";
        }
        if (isset($_POST['email']) && $_POST['email'] == '') {
            $error_array['email'] = "Please enter email";
        }
        if (empty($error_array)) {
            $name = (isset($_POST['name']) && $_POST['name'] !== '') ? $_POST['name'] : '';
            $shop = (isset($_POST['shop']) && $_POST['shop'] !== '') ? $_POST['shop'] : '';
            $address = (isset($_POST['address']) && $_POST['address'] !== '') ? $_POST['address'] : '';
            $phone_number = (isset($_POST['phone_number']) && $_POST['phone_number'] !== '') ? $_POST['phone_number'] : '';
            $business_type = (isset($_POST['business_type']) && $_POST['business_type'] !== '') ? $_POST['business_type'] : '';
            $password = (isset($_POST['password']) && $_POST['password'] !== '') ? $_POST['password'] : '';
            $email = (isset($_POST['email']) && $_POST['email'] !== '') ? $_POST['email'] : '';
           
            $query = "INSERT INTO users (name,shop,address,phone_number,business_type,password,email) VALUES ('$name', '$shop','$address','$phone_number','$business_type','$password','$email')";
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
}
