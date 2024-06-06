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

}
