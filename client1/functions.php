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