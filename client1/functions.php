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
            $message = $_POST['message'];
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
        $query = "SELECT * FROM banners ORDER BY banner_id DESC LIMIT 1";
        $result = $this->db->query($query);
        $output = "";       
        if ($result) {
            while ($row = mysqli_fetch_array($result)) {  
                $image = $row["banner_img"];
                $imagePath = "../admin1/assets/img/banner_img/".$image;
                $decodedPath = htmlspecialchars_decode($imagePath);
                $output .= '<img class="banner img-fluid" src=src="'.$decodedPath.'" alt="no-image">';
            }
               $response_data = array('data' => 'success', 'outcome' => $output);
        }
               $response = json_encode($response_data);
               return $response;

        
    }
}