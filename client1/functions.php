<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

// include_once '../append/Login.php';
include_once '../connection.php';

class client_functions {
    public function __construct() {
        $db_connection = new DB_Class();
        $this->db = $GLOBALS['conn'];
    }
    function conatct_form(){
        
    }
}