<?php

use Google\Service\Directory\Printer;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');
include_once '../connection.php';
$NO_IMAGE =  "../admin1/assets/img/image_not_found.png";
$limit = 12;
    class admin_functions{
    public $cls_errors = array();
    public $msg = array();
    protected $db;

    public function __construct(){
        $db_connection = new DB_Class();
        $this->db = $GLOBALS['conn'];
    }

    public function demo_function(){
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        if ($result === false) {
            die("Query failed: " . $this->db->error);
        } else {
            print_r($result);
        }
    }

    function insert_signin() {
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $strongPasswordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/';
        $error_array = array();
        if (empty($email)) {
            $error_array['email'] = "Email address cannot be empty.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_array['email'] = "The email address entered is invalid.";
        } else {
            $email_query = "SELECT * FROM users WHERE email = '$email'";
            $email_result = $this->db->query($email_query);
            if (mysqli_num_rows($email_result) == 0) {
                $error_array['email'] = "Email is not registered.";
            }
        }
        if (empty($password)) {
            $error_array['password'] = "Password cannot be empty.";
        } elseif (!preg_match($strongPasswordPattern, $password)) {
            $error_array['password'] = "The password is not valid.";
        }
        if (empty($error_array)) {
            $hashed_password = md5(string: $password);
            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$hashed_password'";
            $result = $this->db->query($query);
    
            if (mysqli_num_rows($result) > 0) {
                $userinfo = mysqli_fetch_assoc($result);
                $_SESSION['current_user'] = $userinfo;
                $response_data = array('data' => 'success', 'msg' => 'Login successfully');
            } else {
                $error_array['password'] = "The password is not valid.  ";
                $response_data = array('data' => 'fail', 'msg' => $error_array);
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array);
        }
        $response = json_encode($response_data);
        return $response;
    }
    
    function profile_updatedata(){
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        if ($_SESSION['current_user']['user_id']) {
            if (isset($_POST['name']) && $_POST['name'] == '') {
                $error_array['name'] = "Please enter the name.";
            }
            if (isset($_POST['shop']) && $_POST['shop'] == '') {
                $error_array['shop'] = "Please enter the shop name.";
            }
            $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
            $mobilepattern = "/^[789]\d{9}$/";
            if (empty($phone_number)) {
                $error_array['phone_number'] = "Please enter the phone number.";
            } elseif (!preg_match($mobilepattern, $phone_number)) {
                $error_array['phone_number'] = "The mobile number is invalid.";
            }
            if (isset($_POST['business_type']) && $_POST['business_type'] == '') {
                $error_array['business_type'] = "Please select the business type.";
            }
            if (isset($_POST['address']) && $_POST['address'] == '') {
                $error_array['address'] = "Please enter the address.";
            }
            if (empty($error_array)) {
                $name = (isset($_POST['name']) && $_POST['name'] !== '') ? $_POST['name'] : '';
                $shop = (isset($_POST['shop']) && $_POST['shop'] !== '') ? $_POST['shop'] : '';
                $phone_number = (isset($_POST['phone_number']) && $_POST['phone_number'] !== '') ? $_POST['phone_number'] : '';
                $business_type = (isset($_POST['business_type']) && $_POST['business_type'] !== '') ? $_POST['business_type'] : '';
                $address = (isset($_POST['address']) && $_POST['address'] !== '') ? $_POST['address'] : '';
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "UPDATE users SET name = '$name', shop = '$shop', phone_number = '$phone_number', business_type = '$business_type', address = '$address'  WHERE user_id  = $user_id";
                $result = $this->db->query($query);
                if ($result) {
                    $response_data = array('data' => 'success', 'msg' => 'Profile data updated');
                }
            } else {
                $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function profile_imagesave(){
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        if ($_SESSION['current_user']['user_id']) {
            $user_id = $_SESSION['current_user']['user_id'];
            if (isset($_FILES['shop_logo'])) {
                $maxSize = 5 * 1024 * 1024;
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
                $folder = "assets/img/sigup_img/";
                if (isset($_FILES['shop_logo']['name']) && $_FILES['shop_logo']['name'] != "") {
                    $filename = $_FILES['shop_logo']['name'];
                    $fileNameCmps = explode(".", $filename);
                    $fileExtension = strtolower(end($fileNameCmps));
                    $shoplogo = time() . '.' . $fileExtension;
                    $shopLogoPath = $folder . $shoplogo;
                    if (!in_array($fileExtension, $allowedExtensions)) {
                        $error_array['shop_logo'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed";
                    }
                    if ($_FILES['shop_logo']['size'] > $maxSize) {
                        $error_array['shop_logo'] = "File size must be 5MB or less.";
                    }
                    if (empty($filename)) {
                        $error_array['shop_logo'] = "Please select the shop logo.";
                    }
                    if (empty($error_array)) {
                        if (move_uploaded_file($_FILES['shop_logo']['tmp_name'], $shopLogoPath)) {
                            $query = "UPDATE users SET shop_logo='$shoplogo' WHERE user_id =$user_id";
                            $result = $this->db->query($query);
                            if ($result) {
                                $response_data = array('data' => 'success', 'msg' => 'Profile image updated');
                            }
                        }
                    } else {
                        $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' =>"Oops! Something went wrong ");
                    }
                } else {
                    $query = "UPDATE users SET shop_logo = ''WHERE user_id =$user_id";
                    $result = $this->db->query($query);
                    if ($result) {
                        $response_data = array('data' => 'success', 'msg' => 'Profile image updated');
                    }
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function insert_signup(){
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $error_array = array();
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        if (isset($_FILES['shop_img'])) {
            $filename = $_FILES['shop_img']['name'];
            $fileNameCmps = explode(".", $filename);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFilename = uniqid() . '.' . $fileExtension;
            $folder = "assets/img/sigup_img/";
            $fullpath = $folder . $newFilename;
            $maxSize = 5 * 1024 * 1024;
            if (!in_array($fileExtension, $allowedExtensions)) {
                $error_array['shop_img'] = "The shop image size exceeds the maximum allowed limit. Please upload a smaller image.";
            }
            if ($_FILES['shop_img']['size'] > $maxSize) {
                $error_array['shop_img'] = "File size must be 5MB or less.";
            }
            if (empty($filename)) {
                $error_array['shop_img'] = "The shop image is required.";
            }
        }
        if (isset($_FILES['shop_logo'])) {
            $filename = $_FILES['shop_logo']['name'];
            $fileNameCmps = explode(".", $filename);
            $fileExtension = strtolower(end($fileNameCmps));
            $shoplogo = time() . '.' . $fileExtension;
            $shopLogoPath = $folder . $shoplogo;
            if (!in_array($fileExtension, $allowedExtensions)) {
                $error_array['shop_logo'] = "Please upload a valid shop logo in JPG, PNG, or SVG format.";
            }
            if ($_FILES['shop_logo']['size'] > $maxSize) {
                $error_array['shop_logo'] = "The shop logo size exceeds the maximum allowed limit. Please upload a smaller image.";
            }

            if (empty($filename)) {
                $error_array['shop_logo'] = "The shop logo is required.";
            }
        }
        if (isset($_POST['name']) && $_POST['name'] == '') {
            $error_array['name'] = "Name cannot be empty.";
        }
        if (isset($_POST['shop']) && $_POST['shop'] == '') {
            $error_array['shop'] = "The shop name cannot be empty.";
        }
        if (isset($_POST['address']) && $_POST['address'] == '') {
            $error_array['address'] = "Address cannot be empty. Please enter the shop's address";
        }
        if (isset($_POST['business_type']) && $_POST['business_type'] == '') {
            $error_array['business_type'] = "Please select the business type.";
        }
        $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
        $mobilepattern = "/^[789]\d{9}$/";  
        if (empty($phone_number)) {

            $error_array['phone_number'] = "The phone number cannot be empty.";
        } else if (strlen($phone_number) !== 10) {
            $error_array['phone_number'] = "The phone number must be exactly 10 digits.";
        } else if (!preg_match($mobilepattern, $phone_number)) {
            $error_array['phone_number'] = "The mobile number is invalid.";
        }

        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirmPassword = isset($_POST['Confirm_Password']) ? $_POST['Confirm_Password'] : '';
        $strongPasswordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/';
        if (empty($password)) {
            $error_array['password'] = "Password cannot be empty. ";
        } elseif (!preg_match($strongPasswordPattern, $password)) {
            $error_array['password'] = "Password must be at least 8 characters long and include uppercase, lowercase, a number, and a special character.";
        }
        if (empty($confirmPassword)) {
            $error_array['Confirm_Password'] = " confirm password cannot be empty. ";
        } elseif ($password !== $confirmPassword) {
            $error_array['Confirm_Password'] = "Passwords do not match.";
        }
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        if (empty($email)) {
            $error_array['email'] = "Email address cannot be empty.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_array['email'] = "The email address entered is invalid.";
        }
        if (empty($error_array)) {
            $name = isset($_POST['name']) ? mysqli_real_escape_string($this->db, $_POST['name']) : '';
            $shop = isset($_POST['shop']) ? mysqli_real_escape_string($this->db, $_POST['shop']) : '';
            $address = isset($_POST['address']) ? mysqli_real_escape_string($this->db, $_POST['address']) : '';
            $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
            $business_type = isset($_POST['business_type']) ? $_POST['business_type'] : '';
            $email_check_query = "SELECT * FROM users WHERE email = '$email'";
            $email_check_result = mysqli_query($this->db, $email_check_query);
            if ($email_check_result->num_rows > 0) {
                $error_array['email'] = "Email already registered";
                return json_encode(array('data' => 'fail', 'msg' => $error_array));
            } else {
                if (move_uploaded_file($_FILES['shop_img']['tmp_name'], $fullpath) && move_uploaded_file($_FILES['shop_logo']['tmp_name'], $shopLogoPath)) {
                    $hashed_password = md5($password);
                    $query = "INSERT INTO users (name, shop, address, phone_number, business_type, shop_logo, shop_img, password, email) 
                              VALUES ('$name', '$shop', '$address', '$phone_number', '$business_type', '$shoplogo', '$newFilename', '$hashed_password', '$email')";
                    $result = mysqli_query($this->db, $query);
                    if ($result) {
                        $subject = "Market";
                        $message = file_get_contents('thankemail_template.php');
                        $headers ="From:no-reply@marketsearch.com"." \r\n";     
                        $headers = "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                       
                            if($_SERVER['SERVER_NAME'] == 'localhost'){
                                $response_data = array('data' => 'success', 'msg' => 'Data inserted successfully!');
                            }else{
                                if (mail($email, $subject, $message, $headers)) {
                                    $response_data = array('data' => 'success', 'msg' => 'Data inserted successfully!');
                                } else {
                                    $response_data = array('data' => 'fail', 'msg' => 'Mailer Error: could not be sent.');
                                }
                            }
                    } else {
                        $response_data = array('data' => 'fail', 'msg' => 'Error inserting data.');
                    }
                } else {
                    $response_data = array('data' => 'fail', 'msg' => 'Error uploading files.');
                }
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array);
        }
        $response = json_encode($response_data);
        return $response;
    }
    function insert_products(){
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $error_array = array();
        $is_mian_image_update= false;
        $p_tag = $_POST['p_tag'] ?? [];
        $product_id = (isset($_POST['id']) && $_POST['id'] != "" ? $_POST['id'] : "");
        if (isset($_POST['addcheckboxcategory']) && $_POST['addcheckboxcategory'] != '') {
            if (isset($_POST['addcategory']) && $_POST['addcategory'] == '') {
                $error_array['addcategory'] = "Please enter the product category.";
                if (isset($_POST['select_catagory']) && $_POST['select_catagory'] == '') {
                    $error_array['select_catagory'] = "Please select the product category.";
                }
            }
        } else {
            if (isset($_POST['select_catagory']) && $_POST['select_catagory'] == '') {
                $error_array['select_catagory'] = "Please select the product category.";
            }
        }
        if (isset($_POST['pname']) && $_POST['pname'] == '') {
            $error_array['pname'] = "Please enter the product title.";
        }
        if (isset($_POST['sku']) && $_POST['sku'] == '') {
            $error_array['sku'] = "Please enter the SKU.";
        }
        if (isset($_POST['min_price']) && $_POST['min_price'] == '') {
            $error_array['min_price'] = "Please enter the minimum price.";
        }
        if (isset($_POST['max_price']) && $_POST['max_price'] == '') {
            $error_array['max_price'] = "Please enter the maximum price.";
        }
        if (isset($_POST['image_alt']) && $_POST['image_alt'] == '') {
            $error_array['image_alt'] = "Please enter the image alt.";
        }
        if (empty($p_tag) || !is_array($p_tag)) {
            $error_array['p_tag'] = "Please select at least one product tag.";
        }
        if (isset($_POST['min_price']) && isset($_POST['max_price'])) {
            $min_price = filter_input(INPUT_POST, 'min_price', FILTER_VALIDATE_FLOAT);
            $max_price = filter_input(INPUT_POST, 'max_price', FILTER_VALIDATE_FLOAT);

            if ($min_price >= $max_price) {
                $error_array['max_price'] = "Max price must be greater than min price.";
            }
        }
        if (isset($_POST['p_description']) && $_POST['p_description'] == '') {
            $error_array['p_description'] = "Please enter the description.";
        }
        $newmainFilename = "";
        $maxSize = 5 * 1024 * 1024;
        if (isset($_FILES["productmain_image"]["name"]) && !empty($_FILES["productmain_image"]["name"])) {
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
            $filename = isset($_FILES["productmain_image"]["name"]) ? $_FILES["productmain_image"]["name"] : '';
            $tmpfile = isset($_FILES["productmain_image"]["tmp_name"]) ? $_FILES["productmain_image"]["tmp_name"] : '';
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $newmainFilename = time() . '.' . $extension;
            $fileNameCmps = explode(".", $filename);
            $fileExtension = strtolower(end($fileNameCmps));
            $folder = "assets/img/product_img/";
            $fullpath = $folder . $newmainFilename;
            $file = $_FILES['productmain_image'];
            if (!is_dir($folder)) {
                $mkdir = mkdir($folder, 0777, true);
                if (!$mkdir) {
                    $response_data = ['data' => 'fail', 'msg' => 'Failed to create directory for image upload.'];
                    return json_encode($response_data);
                }
            }
            if (!in_array($fileExtension, $allowedExtensions)) {
                $error_array['productmain_image'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
            }
            if ($file['size'] > $maxSize) {
                $error_array['productmain_image'] = "File size must be 5MB or less.";
            }
            if (empty($filename)) {
                $error_array['productmain_image'] = "Please upload your image.";
            }
            if (empty($error_array)) {
                if (move_uploaded_file($tmpfile, $fullpath)) {
                    $newmainFilename = $newmainFilename;
                    $is_mian_image_update  = true;
                } else {
                    $error_array['productmain_image'] = "Error moving uploaded file $filename.";
                }
            }
        }else if (empty($product_id)){
           $error_array['productmain_image'] = "Please select main image";
        }
      
        if (isset($_FILES["subimage"]["name"][0]) && !empty($_FILES["subimage"]["name"][0])) {
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
            $maxSize = 5 * 1024 * 1024;
            $folder = "assets/img/product_img/";
            if (!is_dir($folder)) {
                $mkdir = mkdir($folder, 0777, true);
                if (!$mkdir) {
                    $response_data = array('data' => 'fail', 'msg' => 'Failed to create directory for image upload.');
                    return json_encode($response_data);
                }
            }
            $uploadedFiles = [];
            foreach ($_FILES["subimage"]["name"] as $key => $filename) {
                $tmpfile = $_FILES["subimage"]["tmp_name"][$key];
                $file = $_FILES['subimage'];
                $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $newFilename = time() . '_' . $key . '.' . $fileExtension;
                $fullpath = $folder . $newFilename;
                if ($tmpfile != "") {
                    if (!in_array($fileExtension, $allowedExtensions)) {
                        $error_array['p_image'] = "Unsupported file format for $filename. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
                    }
                    if ($file['size'][$key] > $maxSize) {
                        $error_array['p_image'] = "File size for $filename must be 5MB or less.";
                    }
                    if (empty($error_array)) {
                        if (move_uploaded_file($tmpfile, $fullpath)) {
                            $uploadedFiles[] = $newFilename;
                            $is_image_update  = true;
                        } else {
                            $error_array['p_image'] = "Error moving uploaded file $filename.";
                        }
                    }
                } else {
                    $error_array['p_image'] = "Please upload another product image.";
                }
            }
        }else if (empty($product_id))
         {
            $error_array['p_image'] = "Please select image";
        }
        if (empty($error_array)) {
            $product_name = (isset($_POST['pname']) && $_POST['pname'] !== '') ? $_POST['pname'] : '';
            $product_name = str_replace("'", "\'", $product_name);
            $select_catagory = (isset($_POST['select_catagory']) && $_POST['select_catagory'] !== '') ? $_POST['select_catagory'] : '';
            $addcategory = (isset($_POST['addcategory']) && $_POST['addcategory'] !== '') ? $_POST['addcategory'] : '';
            $addcheckboxcategory = (isset($_POST['addcheckboxcategory']) && $_POST['addcheckboxcategory'] !== '') ? $_POST['addcheckboxcategory'] : '';
            $min_price = (isset($_POST['min_price']) && $_POST['min_price'] !== '') ? $_POST['min_price'] : '';
            $max_price = (isset($_POST['max_price']) && $_POST['max_price'] !== '') ? $_POST['max_price'] : '';
            $p_tag = (isset($_POST['p_tag']) && is_array($_POST['p_tag'])) ? implode(',', $_POST['p_tag']) : '';
            $cloth = (isset($_POST['cloth']) && $_POST['cloth'] !== '') ? $_POST['cloth'] : '';
            $fabric_type = (isset($_POST['fabric_type']) && $_POST['fabric_type'] !== '') ? $_POST['fabric_type'] : '';

            $sku = (isset($_POST['sku']) && $_POST['sku'] !== '') ? $_POST['sku'] : '';
            $qty = (isset($_POST['qty']) && $_POST['qty'] !== '') ? $_POST['qty'] : '';
            $product_image_alt = (isset($_POST['image_alt']) && $_POST['image_alt'] !== '') ? $_POST['image_alt'] : '';
            $p_description = (isset($_POST['p_description']) && $_POST['p_description'] !== '') ? $_POST['p_description'] : '';
            $p_description = str_replace("'", "\'", $p_description);
            $user_id = $_SESSION['current_user']['user_id'];
            if ($addcategory != '' && $addcheckboxcategory != '') {
                $add_category_query = "INSERT INTO allcategories (categoies_name, user_id) VALUES ('$addcategory', '$user_id')";
                $category_result = $this->db->query($add_category_query);
                if ($category_result) {
                    $select_catagory = $this->db->insert_id;
                } else {
                    $response_data = array('data' => 'fail', 'msg' => "Error inserting into database");
                }
            }
            if ($product_id == '') {

                $uploadedFilenames = implode(',', $uploadedFiles);
                $uploadedFilenames;

                $query = "INSERT INTO products (title, category, qty, sku, minprice, maxprice, p_image,cloth,fabric_type, product_img_alt, p_tag, p_description, user_id) 
                    VALUES ('$product_name', '$select_catagory', '$qty', '$sku', '$min_price', '$max_price', '$newmainFilename','$cloth','$fabric_type', '$product_image_alt', '$p_tag', '$p_description', '$user_id')";
                $result = $this->db->query($query);
                $last_id = $this->db->insert_id;

                foreach ($uploadedFiles as $key => $sub_img) {
                    $query = "INSERT INTO product_images(user_id,product_id,p_image)values('$user_id','$last_id','$sub_img')";
                    $result = $this->db->query($query);
                }
                if ($result) {
                    $response_data = array('data' => 'success', 'msg' => 'Product inserted successfully!');
                } else {
                    $response_data = array('data' => 'fail', 'msg' => "Error inserting into database");
                }
            } else {
                $newimageadded = ($is_mian_image_update) ? ", p_image='$newmainFilename'" : "";
                $query = "UPDATE products SET title ='$product_name', category ='$select_catagory', qty ='$qty', sku ='$sku', 
                          minprice ='$min_price', maxprice ='$max_price',cloth='$cloth',fabric_type='$fabric_type',product_img_alt ='$product_image_alt', p_tag = '$p_tag', 
                          p_description = '$p_description' $newimageadded WHERE product_id = $product_id";
                
                $result = $this->db->query($query);

                if (!empty($uploadedFiles)) {
                    foreach ($uploadedFiles as $key => $sub_img) {
                        $query = "INSERT INTO product_images(user_id,product_id,p_image)values('$user_id','$product_id','$sub_img')";
                        $result = $this->db->query($query);
                    }
                }
                if ($result) {
                    $response_data = array('data' => 'success', 'msg' => 'Product data updated', "updated_product_id" => $product_id);
                } else {
                    $response_data = array('data' => 'fail', 'msg' => "Error updating database");
                }
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong.");
        }
        $response = json_encode($response_data);

        return $response;
    }

    function add_customer(){
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $error_array = array();
         $id = isset($_POST['id']) && $_POST['id'] !== '' ? $_POST['id'] : '';
        $newFilename = "";
        $maxSize = 5 * 1024 * 1024;
        if ($_FILES["c_image"]["name"] != "" && $id != "" || isset($_FILES["c_image"]["name"]) && isset($_FILES["c_image"]["name"]) != '' && $id == "") {
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
            $filename = isset($_FILES["c_image"]["name"]) ? $_FILES["c_image"]["name"] : '';
            $tmpfile = isset($_FILES["c_image"]["tmp_name"]) ? $_FILES["c_image"]["tmp_name"] : '';
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $newFilename = time() . '.' . $extension;
            $fileNameCmps = explode(".", $filename);
            $fileExtension = strtolower(end($fileNameCmps));
            $folder = "assets/img/customer/";
            $fullpath = $folder . $newFilename;
            $file = $_FILES['c_image'];
            if (!is_dir($folder)) {
                $mkdir = mkdir($folder, 0777, true);
                if (!$mkdir) {
                    $response_data = ['data' => 'fail', 'msg' => 'Failed to create directory for image upload.'];
                    return json_encode($response_data);
                }
            }
        }
        if (empty($_POST['name'])) {
            $error_array['name'] = "Please enter customer name.";
        }
        if (empty($_POST['email'])) {
            $error_array['email'] = "Please enter customer email.";
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error_array['email'] = "Please enter a valid email address.";
        }

        $phone_number = isset($_POST['contact']) ? $_POST['contact'] : '';
        $mobilepattern = "/^[6789]\d{9}$/"; 
        if (empty($phone_number)) {
            $error_array['contact'] = "Please enter the phone number.";
        } elseif (strlen($phone_number) !== 10) {
            $error_array['contact'] = "The phone number must be exactly 10 digits.";
        } elseif (!preg_match($mobilepattern, $phone_number)) {
            $error_array['contact'] = "The mobile number is invalid.";
        }
        if (empty($_POST['address'])) {
            $error_array['address'] = "Please enter customer address.";
        }
        if (empty($_POST['city'])) {
            $error_array['city'] = "Please enter customer city.";
        }
        if (empty($_POST['state'])) {
            $error_array['state'] = "Please enter customer state.";
        }
        if (!empty($error_array)) {
            $response_data = array('data' => 'fail', 'msg' => $error_array);
            return json_encode($response_data);
        }
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $user_id = $_SESSION['current_user']['user_id'];
        if ($id == '') {
            $c_image = move_uploaded_file($tmpfile, $fullpath) ? $newFilename :'';
                $query = "INSERT INTO customer (`name`, `email`, `contact`, `c_image`, `city`, `state`, `address`, `user_id`) 
                          VALUES ('$name', '$email', '$contact', '$c_image', '$city', '$state', '$address', '$user_id')";
                $result = $this->db->query($query);
                if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'customer inserted successfully!');
                } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
                }
               
        } else {
            if (!empty($filename) && move_uploaded_file($tmpfile, $fullpath)) {
                $newImageAdded = $newFilename;
            } else {
                $existing_image_query = "SELECT c_image FROM customer WHERE customer_id = $id";
                $existing_image_result = $this->db->query($existing_image_query);
                $existing_image_row = $existing_image_result->fetch_assoc();
                $existing_image = $existing_image_row['c_image'];
                $newImageAdded = $existing_image;
            }
            $query = "UPDATE customer SET name = '$name', email = '$email', contact = '$contact', 
                          c_image = '$newImageAdded', city = '$city', state = '$state', address = '$address' 
                          WHERE customer_id = $id";
            $result = $this->db->query($query);

            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'Customer updated successfully!', 'updated_customer_id' => $id);
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Database error: " . mysqli_error($this->db));
            }
        }
        return json_encode($response_data);
    }

    function listgallary(){
        $response_data = array('data' => 'fail', 'msg' => "Something went wrong!");
        global $NO_IMAGE;
        global $limit;
        if (isset($_SESSION['current_user']['user_id'])) {
            $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
            $offset = ($page - 1) * $limit;
            $userid_clause = ($_SESSION['current_user']['role'] == 1) ? "user_id = " . (int)$_SESSION['current_user']['user_id'] : "1=1"; // Default to "1=1" if role is not 1
            $query = "SELECT COUNT(*) AS total FROM products WHERE $userid_clause";
            $res_count = $this->db->query($query);
            $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
            $sql = "SELECT * FROM products WHERE $userid_clause LIMIT $offset, $limit";
            $result = $this->db->query($sql);
            $output = $pagination = "";
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $image = $row["p_image"];
                        $imagePath = "../admin1/assets/img/product_img/" . $image;
                        $noimagePath = $NO_IMAGE;
                        $decodedPath = htmlspecialchars_decode(
                            (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                        );
                        $output .= '<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">';
                        $output .= '<div class="card card-blog card-plain mb-4">';
                        $output .= '<div class="position-relative">';
                        $output .= '<a class="d-block border-radius-xl product_imagebox m-2 m-xl-4">';
                        $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg  product_main_image">';
                        $output .= '</a>';
                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '</div>';
                    }
                    $response_data = array('data' => 'success','outcome' => $output, 'pagination' => '','pagination_needed' => ($total_records > $limit) );
                    if ($total_records > $limit) {
                        $total_pages = ceil($total_records / $limit);
                        if ($total_pages > 1) {
                            $pagination .= '<div class="pagination" id="dataPagination" data-routine="listgallary">';
                            for ($i = 1; $i <= $total_pages; $i++) {
                                $active_class = ($i == $page) ? 'active' : '';
                                $pagination .= "<a href='#' class='page-link {$active_class}' data-page='{$i}'>{$i}</a>";
                            }
                            $pagination .= '</div>';
                        }
                        $response_data['pagination'] = $pagination;
                    }
                } else {
                    $response_data = array('data' => 'fail', 'outcome' => "No data found");
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function invoice(){
        $response_data = ['data' => 'fail', 'msg' => 'An unknown error occurred'];
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $error_array = [];
        $newImageUploaded = $newFilename = "";
        $maxSize = 5 * 1024 * 1024;
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
        }
        if ($_FILES["i_image"]["name"] != "" && $id != "" || isset($_FILES["i_image"]["name"]) && isset($_FILES["i_image"]["name"]) != '' && $id == "") {
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
            $filename = isset($_FILES["i_image"]["name"]) ? $_FILES["i_image"]["name"] : '';
            $tmpfile = isset($_FILES["i_image"]["tmp_name"]) ? $_FILES["i_image"]["tmp_name"] : '';
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $newFilename = time() . '.' . $extension;
            $newImageUploaded = $newFilename;
            $fileNameCmps = explode(".", $filename);
            $fileExtension = strtolower(end($fileNameCmps));
            $folder = "assets/img/invoice_img/";
            $fullpath = $folder . $newFilename;
            $file = $_FILES['i_image'];
            if (!is_dir($folder)) {
                $mkdir = mkdir($folder, 0777, true);
                if (!$mkdir) {
                    $response_data = ['data' => 'fail', 'msg' => 'Failed to create directory for image upload.'];
                    return json_encode($response_data);
                }
            }
            if (!empty($filename)) {
                if (!in_array($fileExtension, $allowedExtensions)) {
                $error_array['i_image'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
            }
                if ($file['size'] > $maxSize) {
                $error_array['i_image'] = "File size must be 5MB or less.";
            }
        }
        }
        if (empty($_POST['i_name'])) $error_array['i_name'] = "Please enter invoice name.";
        if (empty($_POST['bill_no'])) $error_array['bill_no'] = "Please enter bill number.";
        if (empty($_POST['ship_to'])) $error_array['ship_to'] = "Please enter shipping address.";
        if (empty($_POST['date'])) $error_array['date'] = "Please enter date.";
        if (empty($_POST['due_date'])) $error_array['due_date'] = "Please enter due date.";
        if (empty($_POST['item']) || !is_array($_POST['item'])) {
            $error_array['item_title'] = "Please enter at least one item.";
        } else {
            foreach ($_POST['item'] as $index => $item) {
                if (empty($item)) {
                    $error_array["item_$index"] = "Item title is required.";
                }
                if (empty($_POST['quantity'][$index]) || !is_numeric($_POST['quantity'][$index])) {
                    $error_array["quantity_$index"] = "Quantity must be a valid number.";
                }
                if (empty($_POST['rate'][$index]) || !is_numeric($_POST['rate'][$index])) {
                    $error_array["rate_$index"] = "Rate must be a valid number.";
                }
            }
        }
        
        if (empty($error_array)) {
            $i_name = $_POST['i_name'];
            $bill_no = $_POST['bill_no'];
            $ship_to = $_POST['ship_to'];
            $date = $_POST['date'];
            $terms = isset($_POST['terms']) ? $_POST['terms'] : "";
            $due_date = $_POST['due_date'];
            $po_number = $_POST['po_number'];
            $invoice_no = $_POST['invoice_no'];
            $total = isset($_POST['total']) ? $_POST['total'] : 0;
            $amount_paid = isset($_POST['amount_paid']) ? $_POST['amount_paid'] : 0;
            $balance_due = isset($_POST['balance_due']) ? $_POST['balance_due'] : 0;
            $notes = isset($_POST['notes']) ? $_POST['notes'] : '';
            $termscondition = isset($_POST['terms_condition']) ? $_POST['terms_condition'] : '';
            $shipping_charges = isset($_POST['shipping_charges']) ? $_POST['shipping_charges'] : '';
            $subtotal = isset($_POST['subtotal']) ? $_POST['subtotal'] : '';
    
            if (!empty(array_filter($_POST['item']))) {
                if ($id == '') { 
                    if (move_uploaded_file($tmpfile, $fullpath)) {
                        $query = "INSERT INTO invoice (`i_image`, `i_name`, `bill_no`, `ship_to`, `date`, `terms`, `due_date`, `notes`, `terms_condition`, `po_number`, `user_id`, `total`, `subtotal`, `amount_paid`, `balance_due`, `shipping_charges`, `invoice_no`)
                                  VALUES ('$newFilename','$i_name', '$bill_no', '$ship_to', '$date', '$terms', '$due_date', '$notes', '$termscondition', '$po_number', '$user_id', '$total','$subtotal', '$amount_paid', '$balance_due','$shipping_charges','$invoice_no')";
                    } else {
                        $query = "INSERT INTO invoice (`i_name`, `bill_no`, `ship_to`, `date`, `terms`, `due_date`, `notes`, `terms_condition`, `po_number`, `user_id`, `total`,  `subtotal`, `amount_paid`, `balance_due`, `shipping_charges`, `invoice_no`)
                                  VALUES ( '$i_name', '$bill_no', '$ship_to', '$date', '$terms', '$due_date', '$notes', '$termscondition', '$po_number', '$user_id', '$total','$subtotal', '$amount_paid', '$balance_due','$shipping_charges','$invoice_no')";
                    }
                } else {
                    if (!empty($filename)) {
                        if (move_uploaded_file($tmpfile, $fullpath)) {
                            $newImageUploaded = $newFilename;
                        }
                    } else { 
                        $existing_image_query = "SELECT i_image FROM invoice WHERE invoice_id = $id";
                        $existing_image_result = $this->db->query($existing_image_query);
                        $existing_image_row = $existing_image_result->fetch_assoc();
                        $existing_image = $existing_image_row['i_image'];
                        $newImageUploaded = $existing_image;
                    }
                    $query = "UPDATE invoice SET i_name = '$i_name', bill_no = '$bill_no', ship_to = '$ship_to', date = '$date', terms = '$terms', due_date = '$due_date', shipping_charges='$shipping_charges', invoice_no='$invoice_no',
                            subtotal= '$subtotal', po_number = '$po_number', total = '$total', amount_paid = '$amount_paid', balance_due = '$balance_due', notes = '$notes', terms_condition = '$termscondition', i_image = '$newImageUploaded' WHERE invoice_id = $id";
                }
                $result = $this->db->query($query);
    
                if ($result) {
                    $invoice_id = isset($_POST['invoice_id']) ? $_POST['invoice_id'] : $this->db->insert_id; // Ensure we use the inserted ID for new invoices
                    $items = $_POST['item'] ?? [];
                    $quantities = $_POST['quantity'] ?? [];
                    $rates = $_POST['rate'] ?? [];
                    $invoice_item_ids = $_POST['invoice_item_id'] ?? [];
                    $error_array = [];
                    $values = [];
                    foreach ($items as $index => $item) {
                        $quantity = $quantities[$index] ?? null;
                        $rate = $rates[$index] ?? null;
                        $amount = $quantity * $rate;
    
                        if (empty($error_array[$index])) {
                            $item = $this->db->real_escape_string($item);
                            $quantity = $this->db->real_escape_string($quantity);
                            $rate = $this->db->real_escape_string($rate);
                            $amount = $this->db->real_escape_string($amount);
                            $invoice_id_escaped = $this->db->real_escape_string($invoice_id);
                            if (!empty($invoice_item_ids[$index])) {
                                $invoice_item_id = $this->db->real_escape_string($invoice_item_ids[$index]);
                                $sql1 = "UPDATE invoice_item 
                                         SET item='$item', quantity='$quantity', rate='$rate', amount='$amount' 
                                         WHERE invoice_item_id='$invoice_item_id' AND invoice_id='$invoice_id_escaped'";
                                $res1 = $this->db->query($sql1);
                            } else {
                                $values[] = "('$item', '$quantity', '$rate', '$amount', '$user_id', '$invoice_id_escaped')";
                            }
                        }
                    }
                    if (!empty($values)) {
                        $sql1 = "INSERT INTO invoice_item (item, quantity, rate, amount, user_id, invoice_id) 
                                 VALUES " . implode(", ", $values);
                        $res1 = $this->db->query($sql1);
                    }
                    if ($res1) {
                        $response_data = ['data' => 'success', 'msg' => empty($id) ? 'Invoice inserted successfully' : 'Invoice updated successfully'];
                    } else {
                        $response_data = ['data' => 'fail', 'msg' => 'Failed to add items'];
                    }
                } else {
                    $response_data = ['data' => 'fail', 'msg' => 'Error inserting/updating invoice in database'];
                }
            } else {
                $response_data = ['data' => 'fail', 'msg' => 'Please Add line item'];
            }
        } else {
            $response_data = ['data' => 'fail', 'msg' => $error_array];
        }
        
        return json_encode($response_data);
    }
    
    
    function clear_invoice_image(){
        if ($_POST['routine_name'] === 'clear_invoice_image') {
            $invoice_id = $_POST['invoice_id'];
            $query = "UPDATE invoice SET i_image = '' WHERE invoice_id =  $invoice_id";
            $result = $this->db->query($query);
            if ($result) {
                $response_data=['data'=> 'success' ,'msg'=> "image blank"];
            } else {
                $response_data = ['data'=> 'fail' ,'msg'=> "false"];
            }
        }
        return json_encode($response_data);

    }

    function clear_customer_image(){
        if ($_POST['routine_name'] === 'clear_customer_image') {
            $customer_id = $_POST['customer_id'];
            $query = "UPDATE customer SET c_image = '' WHERE customer_id =  $customer_id";
            $result = $this->db->query($query);
            if ($result) {
                $response_data=['data'=> 'success' ,'msg'=> "image blank"];
            } else {
                $response_data = ['data'=> 'fail' ,'msg'=> "false"];
            }
        }
        return json_encode($response_data);

    }
    function clear_blog_image(){
        if ($_POST['routine_name'] === 'clear_blog_image') {
            $blog_id = $_POST['blog_id'];
            $query = "UPDATE blogs SET image = '' WHERE blog_id =  $blog_id";
            $result = $this->db->query($query);
            if ($result) {
                $response_data=['data'=> 'success' ,'msg'=> "image blank"];
            } else {
                $response_data = ['data'=> 'fail' ,'msg'=> "false"];
            }
        }
        return json_encode($response_data);
    }

    function isValidYouTubeURL($url){
        $allowedPatterns = array(
            '/^https?:\/\/(www\.)?youtube\.com\/watch\?v=[a-zA-Z0-9_-]+(&.*)?$/',
            '/^https?:\/\/youtu\.be\/[a-zA-Z0-9_-]+$/',
            '/^https?:\/\/(www\.)?youtube\.com\/embed\/[a-zA-Z0-9_-]+$/',
            '/^https?:\/\/(www\.)?youtube\.com\/playlist\?list=[a-zA-Z0-9_-]+$/',
            '/^https?:\/\/(www\.)?youtube\.com\/(channel|user|c)\/[a-zA-Z0-9_-]+$/',
            '/^https?:\/\/(www\.)?youtube\.com\/shorts\/[a-zA-Z0-9_-]+(\?.*)?$/',
            '/^https?:\/\/(www\.)?youtube\.com(\/)?$/'
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
            $error_array['video_title'] = "Please enter the video title.";
        }
        if (isset($_POST['category']) && $_POST['category'] == '') {
            $error_array['category'] = "Please select the video catagory.";
        }
        if (isset($_POST['auto_genrate']) && $_POST['auto_genrate'] == '') {
            $error_array['auto_genrate'] = "Please enter number";
        }
        if (isset($_POST['youtube_shorts']) && $_POST['youtube_shorts'] == '') {
            $error_array['youtube_shorts'] = "Please enter the youTube shorts link.";
        } elseif (isset($_POST['youtube_shorts']) && !$this->isValidYouTubeURL($_POST['youtube_shorts'])) {
            $error_array['youtube_shorts'] = "Please enter the valid YouTube shorts link.";
        }
        $this->isValidYouTubeURL($_POST['youtube_shorts']);
        if (empty($error_array)) {
            $video_title = (isset($_POST['video_title']) && $_POST['video_title'] !== '') ? $_POST['video_title'] : '';
            $video_title = str_replace("'", "\'", $video_title);
            $category = (isset($_POST['category']) && $_POST['category'] !== '') ? $_POST['category'] : '';
            $youtube_shorts = (isset($_POST['youtube_shorts']) && $_POST['youtube_shorts'] !== '') ? $_POST['youtube_shorts'] : '';
            $auto_genrate = (isset($_POST['auto_genrate']) && $_POST['auto_genrate'] !== '') ? $_POST['auto_genrate'] : '';

            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO videos (title,category,short_link,auto_genrate,user_id) VALUES ('$video_title', '$category','$youtube_shorts','$auto_genrate','$user_id')";
                $result = $this->db->query($query);
            }
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'Youtube Link inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
        $response = json_encode($response_data);
        return $response;
    }

    function insert_blog(){
        $error_array = array();
        $id = (isset($_POST['id']) && $_POST['id'] !== '') ? $_POST['id'] : '';
        $newFilename = "";
        $maxSize = 5 * 1024 * 1024;
        if ($_FILES["blog_image"]["name"] != "" && $id != "" || isset($_FILES["blog_image"]["name"]) && isset($_FILES["blog_image"]["name"]) != '' && $id == "") {
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
            $filename = isset($_FILES["blog_image"]["name"]) ? $_FILES["blog_image"]["name"] : '';
            $tmpfile = isset($_FILES["blog_image"]["tmp_name"]) ? $_FILES["blog_image"]["tmp_name"] : '';
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $newFilename = time() . '.' . $extension;
            $fileNameCmps = explode(".", $filename);
            $fileExtension = strtolower(end($fileNameCmps));
            $folder = "assets/img/blog_img/";
            $fullpath = $folder . $newFilename;
            $file = $_FILES['blog_image'];
            if (!is_dir($folder)) {
                $mkdir = mkdir($folder, 0777, true);
                if (!$mkdir) {
                    $response_data = ['data' => 'fail', 'msg' => 'Failed to create directory for image upload.'];
                    return json_encode($response_data);
                }
            }
            if (!in_array($fileExtension, $allowedExtensions)) {
                $error_array['blog_image'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
            }
            if ($file['size'] > $maxSize) {
                $error_array['blog_image'] = "File size must be 5MB or less.";
            }
            if (empty($filename)) {

                $error_array['blog_image'] = "Please upload your image.";
            }
        }
        if (empty($_POST['blog_title'])) {
            $error_array['blog_title'] = "Please enter the blog title.";
        }
        if (empty($_POST['category'])) {
            $error_array['category'] = "Please select the blog category.";
        }
        if (empty($_POST['myeditor'])) {
            $error_array['myeditor'] = "Please fill the body textarea.";
        }
        if (empty($_POST['author_name'])) {
            $error_array['author_name'] = "Please enter the author name.";
        }
        if (empty($error_array)) {
            $blog_title = (isset($_POST['blog_title']) && $_POST['blog_title'] !== '') ? $_POST['blog_title'] : '';
            $category = (isset($_POST['category']) && $_POST['category'] !== '') ? $_POST['category'] : '';
            $myeditor = (isset($_POST['myeditor']) && $_POST['myeditor'] !== '') ? $_POST['myeditor'] : '';
            $author_name = (isset($_POST['author_name']) && $_POST['author_name'] !== '') ? $_POST['author_name'] : '';
            $blog_image_alt = (isset($_POST['blog_image_alt']) && $_POST['blog_image_alt'] !== '') ? $_POST['blog_image_alt'] : '';
            if ($id != '') {
                $existing_image_query = "SELECT image FROM blogs WHERE blog_id = $id";
                $existing_image_result = $this->db->query($existing_image_query);
                $existing_image_row = $existing_image_result->fetch_assoc();
                $existing_image = $existing_image_row['image'];
            }
            if ($id == '') {

                if (move_uploaded_file($tmpfile, $fullpath)) {
                    if (isset($_SESSION['current_user']['user_id'])) {
                        $user_id = $_SESSION['current_user']['user_id'];
                        $query = "INSERT INTO blogs (title,category,body,author_name,image,blog_img_alt,user_id) VALUES 
                            ('$blog_title', '$category','$myeditor',
                            '$author_name','$newFilename','$blog_image_alt','$user_id')";
                        $result = $this->db->query($query);
                    }
                    if ($result) {
                        $response_data = array('data' => 'success', 'msg' => 'Blog inserted successfully!');
                    } else {
                        $response_data = array('data' => 'fail', 'msg' => "Error");
                    }
                }
            } else {
                if (!empty($filename)) {

                    if (move_uploaded_file($tmpfile, $fullpath)) {
                        $query = "UPDATE blogs SET title = '$blog_title', category = '$category', body = '$myeditor', 
                        author_name = '$author_name',image = '$newFilename',blog_img_alt = '$blog_image_alt' WHERE blog_id  = $id";
                    }
                } else {
                    $existing_image_query = "SELECT image FROM blogs WHERE blog_id = $id";
                    $existing_image_result = $this->db->query($existing_image_query);
                    $existing_image_row = $existing_image_result->fetch_assoc();
                    $existing_image = $existing_image_row['image'];
                    $query = "UPDATE blogs SET title = '$blog_title', category = '$category', body = '$myeditor', 
                        author_name = '$author_name',image = '$existing_image',blog_img_alt = '$blog_image_alt' WHERE blog_id  = $id";
                }
                $result = $this->db->query($query);
                if ($result) {
                    $response_data = array('data' => 'success', 'msg' => 'Blog data updated', "updated_blog_id" => $id);
                } else {
                    $response_data = array('data' => 'fail', 'msg' => "Error Updating into database");
                }
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
        $response = json_encode($response_data);
        return $response;
    }

    function isValidURL($url){
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
        $newFilename = time() . '.' . $extension;
        $fileName = $_FILES['myFile']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/banner_img/";
        $fullpath = $folder . $newFilename;
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
            $error_array['myFile'] = "Please upload the banner image.";
        }
       
        if (isset($_POST['banner_btn_link']) && $_POST['banner_btn_link'] == '') {
            $error_array['banner_btn_link'] = "Please enter the banner button link.";
        } elseif (isset($_POST['banner_btn_link']) && !$this->isValidURL($_POST['banner_btn_link'])) {
            $error_array['banner_btn_link'] = "Please enter the valid banner button link.";
        }
        if (empty($error_array)) {
            if (move_uploaded_file($tmpfile, $fullpath)) {
                $image_alt = (isset($_POST['image_alt']) && $_POST['image_alt'] !== '') ? $_POST['image_alt'] : '';
                $banner_btn_link = (isset($_POST['banner_btn_link']) && $_POST['banner_btn_link'] !== '') ? $_POST['banner_btn_link'] : '';

                if (isset($_SESSION['current_user']['user_id'])) {
                    $user_id = $_SESSION['current_user']['user_id'];
                    $query = "INSERT INTO banners (banner_img,img_alt,banner_btn_link,user_id) VALUES ('$newFilename','$image_alt','$banner_btn_link','$user_id')";
                    $result = $this->db->query($query);
                    if ($result) {
                        $response_data = array('data' => 'success', 'msg' => 'Banner inserted successfully!');
                    } 
                }
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
        $response = json_encode($response_data);
        return $response;
    }

    function insert_market(){
        $response_data = array('data' => 'fail', 'msg' => "Something went wrong!");
        $error_array = array();
        if (isset($_POST['shop_name']) && $_POST['shop_name'] == '') {
            $error_array['shop_name'] = "Please select the shop.";
        }
        if (isset($_POST['review']) && $_POST['review'] == '') {
            $error_array['review'] = "Please enter review";
        }
        if (empty($error_array)) {
            $shop_name = (isset($_POST['shop_name']) && $_POST['shop_name'] !== '') ? $_POST['shop_name'] : '';
            $review = (isset($_POST['review']) && $_POST['review'] !== '') ? $_POST['review'] : '';
            $shop_name = str_replace("'", "\'", $shop_name);
            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO famous_markets (shop_name,review ,user_id) VALUES ('$shop_name','$review', '$user_id')";
                $result = $this->db->query($query);
                if ($result) {
                    $response_data = array('data' => 'success', 'msg' => 'Market inserted successfully!');
                }
            } else {
                $response_data = array('data' => 'fail', 'msg' => "User not logged in");
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong");
        }
        return json_encode($response_data);
    }

    function insert_brousetxt(){
        $response_data = array('data' => 'fail', 'msg' => "Something went wrong!");
        $error_array = array();
        if (!isset($_POST['categories']) || $_POST['categories'] == '') {
            $error_array['categories'] = "Please select the categories.";
        }
        if (empty($error_array)) {
            if (isset($_SESSION['current_user']['user_id'])) {
                $categories = (isset($_POST['categories']) && $_POST['categories'] != '') ?  $_POST['categories'] : '';
                $user_id = $_SESSION['current_user']['user_id'];
                $category_query = "SELECT * FROM b_textile_catagorys WHERE categories = $categories";
                $category_result = $this->db->query($category_query);
                if (mysqli_num_rows($category_result) <= 0) {
                    $query = "INSERT INTO b_textile_catagorys (categories,user_id) VALUES ('$categories','$user_id')";
                    $result = $this->db->query($query);
                    if ($result) {
                        $response_data = array('data' => 'success', 'msg' => 'Brouse By Textile Categories Form inserted successfully!');
                    } 
                } else {
                    $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Already category added");
                }
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
        $response = json_encode($response_data);
        return $response;
    }

    function insert_offers(){
        $response_data = array('data' => 'fail', 'msg' => "Something went wrong!");
        $error_array = array();
        $file = $_FILES['myFile'];
        $maxSize = 5 * 1024 * 1024;
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        $filename = isset($_FILES["myFile"]["name"]) ? $_FILES["myFile"]["name"] : '';
        $tmpfile = isset($_FILES["myFile"]["tmp_name"]) ? $_FILES["myFile"]["tmp_name"] : '';
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $newFilename = time() . '.' . $extension;
        $fileName = $_FILES['myFile']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $folder = "assets/img/offers/";
        $fullpath = $folder . $newFilename;
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
            $error_array['myFile'] = "Please upload the image.";
        }
        if (isset($_POST['img_link']) && $_POST['img_link'] == '') {
            $error_array['img_link'] = "Please enter the image link";
        } elseif (isset($_POST['img_link']) && !$this->isValidURL($_POST['img_link'])) {
            $error_array['img_link'] = "Please enter the valid image link.";
        }
        if (empty($error_array)) {
            if (move_uploaded_file($tmpfile, $fullpath)) {
                $img_link = (isset($_POST['img_link']) && $_POST['img_link'] !== '') ? $_POST['img_link'] : '';
                $image_alt = (isset($_POST['image_alt']) && $_POST['image_alt'] !== '') ? $_POST['image_alt'] : '';
                if (isset($_SESSION['current_user']['user_id'])) {
                    $user_id = $_SESSION['current_user']['user_id'];
                    $query = "INSERT INTO offers (img,img_alt,img_link,user_id) VALUES ('$newFilename','$image_alt','$img_link','$user_id')";
                    $result = $this->db->query($query);
                    if ($result) {
                        $response_data = array('data' => 'success', 'msg' => 'Offers Form inserted successfully!');
                    } 
                }
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
        $response = json_encode($response_data);
        return $response;
    }

    function insert_topbar(){
        $response_data = array('data' => 'fail', 'msg' => "Something went wrong!");
        $error_array = array();
         if (isset($_POST['topbar_input1']) && $_POST['topbar_input1'] == '') {
            $error_array['topbar_input1'] = "Please enter topbar text.";
        }
        if (isset($_POST['topbar_input2']) && $_POST['topbar_input2'] == '') {
            $error_array['topbar_input2'] = "Please enter second topbar text.";
        }
        if (empty($error_array)) {
            $topbar_input1 = (isset($_POST['topbar_input1']) && $_POST['topbar_input1'] !== '') ? $_POST['topbar_input1'] : '';
            $topbar_input2 = (isset($_POST['topbar_input2']) && $_POST['topbar_input2'] !== '') ? $_POST['topbar_input2'] : '';
            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO topbar (topbar_input1,topbar_input2,user_id) VALUES ('$topbar_input1','$topbar_input2','$user_id')";
                $result = $this->db->query($query);
                if ($result) {
                    $response_data = array('data' => 'success', 'msg' =>'topbar Form inserted successfully!');
                } 
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
        $response = json_encode($response_data);
        return $response;
    }


    function insert_paragraph(){
        $response_data = array('data' => 'fail', 'msg' => "Something went wrong!");
        $error_array = array();
        if (isset($_POST['myeditor']) && $_POST['myeditor'] == '') {
            $error_array['myeditor'] = "Please enter the paragraph.";
        }
        if (empty($error_array)) {
            $myeditor = (isset($_POST['myeditor']) && $_POST['myeditor'] !== '') ? $_POST['myeditor'] : '';
            $myeditor = str_replace("'", "\'", $myeditor);
            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "SELECT * FROM paragraph";
                $result = $this->db->query($query);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        $row = $result->fetch_assoc();
                        $id = $row['id'];
                        $query = "UPDATE paragraph SET paragraph = '$myeditor' WHERE id = '$id'";
                        $result = $this->db->query($query);
                    } else {
                        $query = "INSERT INTO paragraph (paragraph,user_id) VALUES ('$myeditor','$user_id')";
                        $result = $this->db->query($query);
                    }
                    $response_data = array('data' => 'success', 'msg' => 'paragraph inserted successfully!');
                } 
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
        $response = json_encode($response_data);
        return $response;
    }

    function insert_faq(){
        $response_data = array('data' => 'fail', 'msg' => "Something went wrong!");
        $error_array = array();
        if (isset($_POST['faq_question']) && $_POST['faq_question'] == '') {
            $error_array['faq_question'] = "Please enter the question.";
        }
        if (isset($_POST['myeditor']) && $_POST['myeditor'] == '') {
            $error_array['myeditor'] = "Please enter the answer.";
        }
        if (empty($error_array)) {
            $faq_question = (isset($_POST['faq_question']) && $_POST['faq_question'] !== '') ? $_POST['faq_question'] : '';
            $myeditor = (isset($_POST['myeditor']) && $_POST['myeditor'] !== '') ? $_POST['myeditor'] : '';
            $myeditor = str_replace("'", "\'", $myeditor);

            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO faqs (question,answer,user_id) VALUES ('$faq_question','$myeditor','$user_id')";
                $result = $this->db->query($query);
                if ($result) {
                    $response_data = array('data' => 'success', 'msg' => 'FAQ inserted successfully!');
                } 
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
        $response = json_encode($response_data);
        return $response;
    }

    function productlisting(){
        global $NO_IMAGE;
        global $limit;
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $sort = isset($_POST['sortValue']) ? $_POST['sortValue'] : '';
        if (isset($_SESSION['current_user']) && isset($_SESSION['current_user']['user_id'])) {
            $search_value = isset($_POST['search_text']) ? $_POST['search_text'] : '';
            $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
            $offset = ($page - 1) * $limit;
            $userid_clause = $sort_query = '';
            if ($_SESSION['current_user']['role'] == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userid_clause = "AND user_id = $user_id";
            }
            switch ($sort) {
                case 'most_view':
                    $sort_query = "AND most_view = '1' ORDER BY featured DESC";
                    break;
                case 'alphabetically_az':
                    $sort_query = 'ORDER BY title ASC';
                    break;
                case 'alphabetically_za':
                    $sort_query = 'ORDER BY title DESC';
                    break;
                case 'price_low_high':
                    $sort_query = 'ORDER BY minprice ASC';
                    break;
                case 'price_high_low':
                    $sort_query = 'ORDER BY minprice DESC';
                    break;
                case 'date_new_old':
                    $sort_query = 'ORDER BY created_date DESC';
                    break;
                case 'date_old_new':
                    $sort_query = 'ORDER BY created_date ASC';
                    break;
                case 'featured':
                    $sort_query = "AND featured = '1' ORDER BY featured DESC";
                    break;
                default:
                    break;
            }
            $query = "SELECT COUNT(*) AS total FROM products WHERE title LIKE '%$search_value%' $userid_clause";
            $res_count = $this->db->query($query);
            $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
            $limit_qry = ($total_records > $limit) ? "LIMIT $offset, $limit" : "";
            $sql = "SELECT * FROM products WHERE title  LIKE '%$search_value%' $userid_clause $sort_query $limit_qry";
            $result = $this->db->query($sql);
            $output = $pagination ="";
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $product_id = $row['product_id'];
                    $image = $row["p_image"];
                    $imagePath = "../admin1/assets/img/product_img/" . $image;
                    $noimagePath = $NO_IMAGE;
                    $decodedPath = htmlspecialchars_decode(
                        (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                    );
                    $title = $row['title'];
                    $maxPrice = $row['maxprice'];
                    $minPrice = $row['minprice'];
                    $output .= '<div class="col-xxl-3 col-xl-4  col-md-4 col-sm-6 mb-xl-0 mb-4">';
                    $output .= '<div class="card card-blog card-plain image-container mb-4">';
                    $output .= '<div class="position-relative">';
                    $output .= '<a class="d-block border-radius-xl mt-2 mt-xl-4 product_imagebox" data-bs-toggle="modal" data-bs-target="#staticBackdrop-' . $product_id . '">';
                    $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl product_main_image">';
                    $output .= '</a>';
                    $output .= '<button type="button" class="btn btn-primary mt-4 productallbtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop-' . $product_id . '">view all</button>';
                    $output .= '</div>';
                    $output .= '<div class="card-body pb-0">';
                    $output .= '<a href="#">';
                    $output .= '<h5 class="title">' . $title . '</h5>';
                    $output .= '</a>';
                    $output .= '<div class="d-flex justify-content-between mb-3">';
                    $output .= '<div class="ms-1 d-inline fs-6">';
                    $output .= '<span class="text-decoration-line-through price-line-through"><h6 class="fw-normal d-inline fs-6">Rs:</h6>' . $maxPrice . '</span>';
                    $output .= '<span class="fs-5">&nbsp;<h6 class="fw-normal d-inline fs-5">Rs:</h6>' . $minPrice . '</span>';
                    $output .= '</div>';
                    $output .= '<div class="ms-auto text-end">';
                    $output .= '<div class="modal fade" id="staticBackdrop-' . $product_id . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-' . $product_id . '" aria-hidden="true">';
                    $output .= '<div class="modal-dialog">';
                    $output .= '<div class="modal-content">';
                    $output .= '<div class="modal-header">';
                    $output .= '<h1 class="modal-title fs-5" id="staticBackdropLabel-' . $product_id . '">Product Images</h1>';
                    $output .= '<button type="button" class="btn-close text-danger fs-2 mb-3 " data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>';
                    $output .= '</div>';
                    $output .= '<div class="modal-body">';
                    $image = $row["p_image"];
                    $imagePath = "../admin1/assets/img/product_img/" . $image;
                    $noimagePath = $NO_IMAGE;
                    $decodedPath = htmlspecialchars_decode(
                        (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                    );
                    $output .= '<div class="d-flex flex-wrap mb-3 justify-content-center">';
                    $output .= '<div class="position-relative">';
                    $output .= '<img src="' . $decodedPath . '" alt="Product Image" class="main-product-img img-fluid shadow border-radius-xl modal_img">';
                    $output .= '<div class="position-absolute top-50 start-50 translate-middle">';
                    $output .= '<i data-id="' . $row["product_id"] . '" class=" pro_delete_btn fa fa-trash text-secondary delete_shadow me-3 delete btn btn-light shadow-sm rounded-0" data-delete-type="product_main_image" aria-hidden="true"></i>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';

                    $sql = "SELECT * FROM product_images WHERE product_id = $product_id AND status = 1";
                    $results = $this->db->query($sql);
                    if ($results && mysqli_num_rows($results) > 0) {

                        $output .= '<div class="row justify-content-center">';
                        while ($row_image = mysqli_fetch_array($results)) {
                            $imageData = $row_image['p_image'];
                            $images = explode(',', $imageData);
                            foreach ($images as $image) {
                                $imagePath = "../admin1/assets/img/product_img/" . trim($image);
                                $decodedPath = htmlspecialchars_decode(
                                    (!empty($image) && file_exists($imagePath)) ? $imagePath : $NO_IMAGE
                                );
                                $output .= '<div class="col-6 col-md-4 p-2 position-relative">';
                                $output .= '<img src="' . $decodedPath . '" alt="Product Image" class="img-fluid shadow border-radius-xl modal_img">';
                                $output .= '<button data-id="' . $row_image["product_image_id"] . '" class="pro_delete_btn btn btn-light position-absolute top-50 start-50 translate-middle cursor-pointer delete" data-delete-type="product_images" aria-label="Delete">';
                                $output .= '<i class="fa fa-trash"></i>';
                                $output .= '</button>';
                                $output .= '</div>';
                            }
                        }
                        $output .= ' </div>';
                    }
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '<div>';
                    $output .= '<a href="' .CLS_SITE_URL . 'index.php"  target="_blank><i data-id="" class="cursor-pointer fa-regular fa-eye text-secondary delete_shadow me-1 delete delete_btn btn-light shadow-sm rounded-0"  aria-hidden="true"></i></a> ';
                    $output .= '<i data-id="' . $row["product_id"] . '" class="fa fa-trash text-secondary cursor-pointer delete_shadow  me-1 delete delete_btn btn-light shadow-sm rounded-0" data-delete-type="products" aria-hidden="true"></i>';
                    $output .= '<a href="product-form.php?id=' . $row['product_id'] . '" class="edit_btn btn-light shadow-sm rounded-0"><i data-id="' . $row["product_id"] . '" class="fa fa-pen text-secondary delete_shadow icon-size" aria-hidden="true"></i></a>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                }
                $response_data = array(
                    'data' => 'success',
                    'outcome' => $output,
                    'pagination' => isset($pagination) ? $pagination : '',
                    'pagination_needed' => ($total_records > $limit) ? true : false
                );
            } else {
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
            $filter_query = preg_replace('/ORDER BY.*$/', '', $sort_query);
            $query = "SELECT COUNT(*) AS total FROM products WHERE title LIKE '%$search_value%' $userid_clause $filter_query";
            $res_count = $this->db->query($query);
            $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
            if ($total_records > $limit) {
                $total_pages = ceil($total_records / $limit);
                if ($total_pages > 1) {
                    $pagination .= '<div class="pagination" id="dataPagination" data-routine="productlisting">';
                    for ($i = 1; $i <= $total_pages; $i++) {
                        $active_class = ($i == $page) ? 'active' : '';
                        $pagination .= "<a href='#' class='page-link {$active_class}' data-page='{$i}'>{$i}</a>";
                    }
                    $pagination .= '</div>';
                }
                $response_data['pagination'] = $pagination;
            }
        } else {
            $response_data['msg'] = 'User not logged in';
        }
        $response = json_encode($response_data);
        return $response;
    }

    function invoicelisting(){
        global $NO_IMAGE;
        global $limit;
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $output = array();
            $output = $pagination = "";
            $search_value = isset($_POST['search_text']) ? $_POST['search_text'] : '';
            $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
            $offset = ($page - 1) * $limit;
            $userid_clause = ($_SESSION['current_user']['role'] == 1) ? "user_id = " . (int)$_SESSION['current_user']['user_id'] : "1=1";
            $query = "SELECT COUNT(*) AS total FROM invoice WHERE i_name LIKE '%$search_value%' AND ($userid_clause)";
            $res_count = $this->db->query($query);
            $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
            $sql = "SELECT * FROM invoice WHERE ($userid_clause) AND i_name LIKE '%$search_value%' LIMIT $offset, $limit";
            $result = $this->db->query($sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $image = $row["i_image"];
                        $imagePath = "../admin1/assets/img/invoice_img/" . $image;
                        $noimagePath = $NO_IMAGE;
                        $decodedPath = htmlspecialchars_decode(
                        (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath);
                        $output .= '<div class="col-xxl-3 col-xl-4 col-md-4 col-sm-6 mb-xl-0 mb-4">';
                        $output .= '<div class="card card-blog card-plain mb-4">';
                        $output .= '<div class="position-relative">';
                        $output .= '<a class="d-block product_imagebox border-radius-xl mt-2 mt-xl-4">';
                        $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl product_main_image">';
                        $output .= '</a>';
                        $output .= '</div>';
                        $output .= '<div class="card-body  pb-0">';
                        $output .= '<a href="#">';
                        $output .= '</a>';
                        $output .= '<div class=" justify-content-between mb-3">';
                        $output .= '<div class="fs-6"><span><h6 class="fw-normal d-inline fs-6">Invoice Name:</h6>' . $row['i_name'] . '</div>';
                        $output .= '<div class="fs-6"><span><h6 class="fw-normal d-inline fs-6">Payment Terms :</h6>' . $row['terms'] . '</div>';
                        $output .= '<div class="fs-6"><span><h6 class="fw-normal d-inline fs-6">Subtotal :</h6>' . $row['subtotal'] . '</div>';
                        $output .= '<div class="fs-6"><span><h6 class="fw-normal d-inline fs-6">Total :</h6>' . $row['total'] . '</div>';
                        $output .= '<div class="fs-6"><span><h6 class="fw-normal d-inline fs-6">Amount Paid :</h6>' . $row['amount_paid'] . '</div>';
                        $output .= '<div class="fs-6"><span><h6 class="fw-normal d-inline fs-6">Balance :</h6>' . $row['balance_due'] . '</div>';
                        $output .= '<div class="fs-6"><span><h6 class="fw-normal d-inline fs-6">Date :</h6>' . $row['date'] . '</div>';
                        $output .= '<div class="ms-auto text-end">';
                        $output .= '<div class="mt-2">';
                        $output .= '<a href="' .CLS_SITE_URL . 'index.php"  target="_blank><i data-id="" class="cursor-pointer fa-regular fa-eye text-secondary delete_shadow me-1 delete delete_btn btn-light shadow-sm rounded-0"  aria-hidden="true"></i></a> ';
                        $output .= '<a href="'.SITE_ADMIN_URL. 'invoicepreview.php?id='. $row['invoice_id'].'"><i data-id="' . $row["invoice_id"] . '" class="cursor-pointer fa-solid fa-file-arrow-down text-secondary delete_shadow me-1 delete delete_btn btn-light shadow-sm rounded-0" aria-hidden="true"></i></a> ';
                        $output .= '<i data-id="' . $row["invoice_id"] . '" class="cursor-pointer fa fa-trash text-secondary delete_shadow me-1 delete delete_btn btn-light shadow-sm rounded-0" data-delete-type="invoice" data-fild="i_image" aria-hidden="true"></i>';
                        $output .= '<a href="invoice.php?id=' . $row['invoice_id'] . '" class="edit_btn delete_shadow btn-light shadow-sm rounded-0">';
                        $output .= '<i data-id="' . $row["invoice_id"] . '" class="fa fa-pen" aria-hidden="true"></i>';
                        $output .= '</a>';
                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '</div>';
                    }
                    $response_data = array(
                        'data' => 'success',
                        'outcome' => $output,
                        'pagination' => '',
                        'pagination_needed' => ($total_records > $limit)
                    );
                    if ($total_records > $limit) {
                        $total_pages = ceil($total_records / $limit);
                        if ($total_pages > 1) {
                            $pagination .= '<div class="pagination" id="dataPagination" data-routine="invoicelisting">';
                            for ($i = 1; $i <= $total_pages; $i++) {
                                $active_class = ($i == $page) ? 'active' : '';
                                $pagination .= "<a href='#' class='page-link {$active_class}' data-page='{$i}'>{$i}</a>";
                            }
                            $pagination .= '</div>';
                        }
                        $response_data['pagination'] = $pagination;
                    }
                } else {
                    $response_data = array('data' => 'fail', 'outcome' => "No data found");
                }
            }
        }
        return json_encode($response_data);
    }

    function customerlisting() {
        $response_data = array('data' => 'fail', 'msg' => "Error");
       
        global $limit;
        if (isset($_SESSION['current_user']['user_id'])) {
            $search_value = isset($_POST['search_text']) ? $_POST['search_text'] : '';
            $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
            $offset = ($page - 1) * $limit;
            $userid_clause = ($_SESSION['current_user']['role'] == 1) 
                ? "user_id = " . (int)$_SESSION['current_user']['user_id'] 
                : "1=1";
            $query = "SELECT COUNT(*) AS total FROM customer WHERE name LIKE '%$search_value%' AND ($userid_clause)";
            $res_count = $this->db->query($query);
            $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
    
            $sql = "SELECT * FROM customer WHERE ($userid_clause) AND name LIKE '%$search_value%' LIMIT $offset, $limit";
            $result = $this->db->query($sql);
    
            $output = $pagination = "";
            if ($result && $result->num_rows > 0) {
               
                while ($row = $result->fetch_assoc()) {
                    $image = $row["c_image"];
                    $imagePath = "../admin1/assets/img/customer/" . $image;
                    $noimagePath = "../admin1/assets/img/customer/person-man.webp";
                    $decodedPath = htmlspecialchars_decode(
                        (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                    );
                    $output .= '<div class="col-xxl-3 col-xl-4 col-md-4 col-sm-6 col-12 mb-xl-0 mb-4">';
                    $output .= '<div class="card card-blog card-plain mb-4">';
                    $output .= '<div class="position-relative">';
                    $output .= '<a class="d-block product_imagebox border-radius-xl mt-3 mt-xl-4">';
                    $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl product_main_image">';
                    $output .= '</a>';
                    $output .= '</div>';
                    $output .= '<div class="card-body px-2 pb-0">';
                    $output .= '<a href="#">';
                    $output .= '</a>';
                    $output .= '<div class=" justify-content-between customer_list">';
                    $output .= '<div class="fs-6"><span class=" "><h6 class="fw-bold d-inline fs-6"> Name:</h6> ' . $row['name'] . '</div>';
                    $output .= '<div class="fs-6"><span class=" "><h6 class="fw-bold d-inline fs-6">Email :</h6> ' . $row['email'] . '</div>';
                    $output .= '<div class="fs-6"><span class=" "><h6 class="fw-bold d-inline fs-6">Contact:</h6> ' . $row['contact'] . '</div>';
                    $output .= '<div class="fs-6"><span class=" "><h6 class="fw-bold  d-inline fs-6">Address :</h6> ' . $row['address'] . '</div>';
                    $output .= '<div class="ms-auto text-end">';
                    $output .= '<div class="mt-3">';
                    $output .= '<i data-id="' . $row["customer_id"] . '" class=" cursor-pointer fa fa-trash text-secondary  delete_shadow  me-1 delete delete_btn btn-light shadow-sm rounded-0" data-delete-type="customer"  data-fild="c_image" aria-hidden="true"></i>';
                    $output .= '<a href="customer.php?id=' . $row['customer_id'] . '" class=" edit_btn delete_shadow btn-light shadow-sm rounded-0">';
                    $output .= '<i data-id="' . $row["customer_id"] . '" class="fa fa-pen " aria-hidden="true"></i>';
                    $output .= '</a>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                }
                $response_data = array(
                    'data' => 'success',
                    'outcome' => $output,
                    'pagination' => isset($pagination) ? $pagination : '',
                    'pagination_needed' => ($total_records > $limit) ? true : false
                );
                if ($total_records > $limit) {
                    $total_pages = ceil($total_records / $limit);
                    if ($total_pages > 1) {
                        $pagination .= '<div class="pagination" id="dataPagination" data-routine="customerlisting">';
                        for ($i = 1; $i <= $total_pages; $i++) {
                            $active_class = ($i == $page) ? 'active' : '';
                            $pagination .= "<a href='#' class='page-link {$active_class}' data-page='{$i}'>{$i}</a>";
                        }
                        $pagination .= '</div>';
                    }
                    $response_data['pagination'] = $pagination;
                }
            } else {
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
            return json_encode($response_data);
        }
    }
    

    function listprofile() {
        global $NO_IMAGE;
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $output = array();
            $user_id = $_SESSION['current_user']['user_id'];
            $query = "SELECT * FROM users WHERE user_id ='$user_id'";
            $result = $this->db->query($query);
            if ($result) {
                $row = $result->fetch_assoc();
                $image = $row["shop_logo"];
                $imagePath = "../admin1/assets/img/sigup_img/" . $image;
                $noimagePath = $NO_IMAGE;
                $decodedPath = htmlspecialchars_decode(
                    (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                );
                $previewImage = (!empty($image) && file_exists($imagePath)) ?
                    '<div class="form-control">
                    <div class="drop-zone" style="display: none;">
                        <span class="pro-zone__prompt" id="dragfile" >Drop File Here Or Click To Upload</span>
                        <input type="file" name="shop_logo" class="profile-drop-zone__input">
                    </div>
                    <div class="drop-zone__thumb">
                        <div class="img-wrapper">
                            <img src="'.$decodedPath.'" class="picture__img">
                            <button class="close-buttons_profile">x</button>
                        </div>
                    </div>
                </div>' :
                    '<div class="drop-zone form-control">
                    <span class="pro-zone__prompt" id="dragfile">Drop File Here Or Click To Upload</span>
                    <input type="file" name="shop_logo" class="drop-zone__input">
                </div>';
                $name = $row['name'];
                $shop = $row['shop'];
                $phone_number = $row['phone_number'];
                $address = $row['address'];
                $profileimage = ' <form role="form" id="profileImageSave" enctype="multipart/form-data" method="POST">
                                        <div class="mb-3">
                                            <label for="p-image" class="font-weight-normal">Upload Profile Image</label>
                                            ' . $previewImage . '
                                            <div class="errormsg shop_logo imageError"></div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="button" class="btn bg-gradient-info btn-sm profileImageSave save_loader_show">Save</button>
                                        </div>
                                    </form>';
                $output['profile_deatils'] = '<ul class="list-group">
                    <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                        <strong class="text-dark">Name:</strong> &nbsp;' . $name . '
                    </li>
                    <li class="list-group-item border-0 ps-0 text-sm">
                        <strong class="text-dark">Shop Name:</strong> &nbsp;' . $shop . '
                    </li>
                    <li class="list-group-item border-0 ps-0 text-sm">
                        <strong class="text-dark">Address:</strong> &nbsp;' . $address . '
                    </li>
                    <li class="list-group-item border-0 ps-0 text-sm">
                        <strong class="text-dark">Mobile Number:</strong> &nbsp;' . $phone_number . '
                    </li>
                </ul>';
                $output['deatils'] = '<li class="list-group-item text-center mt-4">
                    <a class="mb-0 ps-1 pe-2 py-0 mt-3" href="javascript:void(0);">
                        <div class="position-relative d-inline-block">
                        
                            <img src="' . $decodedPath . '" alt="profile_image" class="profile-image border-radius-lg shadow-sm mb-4">
                            <div class="position-absolute top-0 custom-position" data-bs-toggle="modal" data-bs-target="#profileImageUpdate">
                                <i class="fa fa-pen text-primary cursor-pointer  profilepen_icon"></i>
                            </div>
                        </div>
                    </a>
                    <div class="modal fade" id="profileImageUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="profileImageUpdate" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="profileUpdate">Choose profile image</h1>
                                    <button type="button" class="btn-close text-danger fs-2 mb-3" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" id="profileImageSave" enctype="multipart/form-data" method="POST">
                                        <div class="mb-3">
                                            <label for="p-image" class="font-weight-normal">Upload Profile Image</label>
                                            <div class="drop-zone form-control">
                                                <span class="pro-zone__prompt" id="dragfile">Drop File Here Or Click To Upload</span>
                                                <input type="file" name="shop_logo" class="profile-drop-zone__input">
                                            </div>
                                            <div class="errormsg shop_logo imageError"></div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="button" class="btn bg-gradient-info btn-sm profileImageSave save_loader_show">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <div class="text-center">
                    <a href="' . SITE_ADMIN_URL . 'profile-form.php">
                        <button type="button" class="btn bg-gradient-info btn-sm">Edit Profile</button>
                    </a>
                </div>';
                $output['logo'] = '<div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">' . $shop . '</h5>
                    </div>
                </div>';
                $response_data = array('data' => 'success', 'outcome' => $output, 'profiledata' => $row);
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function bloglisting(){
        global $NO_IMAGE;
        global $limit;
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $sort = isset($_POST['sortValue']) ? $_POST['sortValue'] : '';
        if (isset($_SESSION['current_user']['user_id'])) {
            $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
            $offset = ($page - 1) * $limit;
            $search_value = isset($_POST['search_text']) ? $_POST['search_text'] : '';
            $userid_clause = '';
            if ($_SESSION['current_user']['role'] == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userid_clause = "AND user_id = $user_id";
            }
            $sort_query = '';
            switch ($sort) {
                case 'best_selling':
                    $sort_query = 'ORDER BY best_selling DESC';
                    break;
                case 'alphabetically_az':
                    $sort_query = 'ORDER BY title ASC';
                    break;
                case 'alphabetically_za':
                    $sort_query = 'ORDER BY title DESC';
                    break;
                case 'date_new_old':
                    $sort_query = 'ORDER BY created_date DESC';
                    break;
                case 'date_old_new':
                    $sort_query = 'ORDER BY created_date ASC';
                    break;
                case 'featured':
                    $sort_query = "AND featured = '1' ORDER BY featured DESC";
                    break;
                default:
                    break;
            }
            $query = "SELECT COUNT(*) AS total FROM blogs WHERE title LIKE '%$search_value%' $userid_clause";
            $res_count = $this->db->query($query);
            $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
            $limit_qry = ($total_records > $limit) ? "LIMIT $offset, $limit" : "";
            $sql = "SELECT * FROM blogs WHERE title LIKE '%$search_value%' $userid_clause $sort_query $limit_qry";
            $result = $this->db->query($sql);
            $output = "";
            $pagination = "";
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $image = $row["image"];
                    $imagePath = "../admin1/assets/img/blog_img/" . $image;
                    $noimagePath = $NO_IMAGE;
                    $decodedPath = htmlspecialchars_decode(
                        (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                    );
                    $title = htmlspecialchars($row['title']);
                    $output .= '<div class="col-xxl-3 col-xl-4  col-md-4 col-sm-6 mb-xl-0 mb-4">';
                    $output .= '<div class="card card-blog card-plain mb-4">';
                    $output .= '<div class="position-relative">';
                    $output .= '<a class="d-block product_imagebox border-radius-xl mt-3 mt-xl-4" >';
                    $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl mt-3  product_main_image">';
                    $output .= '</a>';
                    $output .= '</div>';
                    $output .= '<div class="card-body px-2 pb-0">';
                    $output .= '<a href="#">';
                    $output .= '<h5 class="title">' . $title . '</h5>';
                    $output .= '</a>';
                    $output .= '<div class="d-flex justify-content-between mb-3">';
                    $output .= '<div class="ms-auto text-end">';
                    $output .= '<div class="" >';
                    $output .= '<a href="' .CLS_SITE_URL . 'index.php"  target="_blank><i data-id="" class="cursor-pointer fa-regular fa-eye text-secondary delete_shadow me-1 delete delete_btn btn-light shadow-sm rounded-0"  aria-hidden="true"></i></a> ';
                    $output .= '<i data-id="' . $row["blog_id"] . '" class=" cursor-pointer fa fa-trash text-secondary  delete_shadow  me-1 delete delete_btn btn-light shadow-sm rounded-0" data-delete-type="blogs"  data-fild="image"aria-hidden="true"></i>';
                    $output .= '<a href="blog-form.php?id=' . $row['blog_id'] . '" class="edit_btn delete_shadow btn-light shadow-sm rounded-0">';
                    $output .= '<i data-id="' . $row["blog_id"] . '" class="fa fa-pen " aria-hidden="true"></i>';
                    $output .= '</a>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                }
                $response_data = array('data' => 'success','outcome' => $output,'pagination' => isset($pagination) ? $pagination : '', 
                    'pagination_needed' => ($total_records > $limit) ? true : false
                );
            } else {
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
            $filter_query = preg_replace('/ORDER BY.*$/', '', $sort_query);
            $query = "SELECT COUNT(*) AS total FROM blogs WHERE title LIKE '%$search_value%' $userid_clause $filter_query";
            $res_count = $this->db->query($query);
            $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
            if ($total_records > $limit) {
                $total_pages = ceil($total_records / $limit);
                if ($total_pages > 1) {
                    $pagination .= '<div class="pagination" id="dataPagination" data-routine="bloglisting">';
                    for ($i = 1; $i <= $total_pages; $i++) {
                        $active_class = ($i == $page) ? 'active' : '';
                        $pagination .= "<a href='#' class='page-link {$active_class}' data-page='{$i}'>{$i}</a>";
                    }
                    $pagination .= '</div>';
                }
                $response_data['pagination'] = $pagination;
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function videolisting() {
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $sort = isset($_POST['sortValue']) ? $_POST['sortValue'] : '';
        global $limit;
        if (isset($_SESSION['current_user']) && isset($_SESSION['current_user']['user_id'])) {
            $search_value = isset($_POST['search_text']) ? $_POST['search_text'] : '';
            $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
            $offset = ($page - 1) * $limit;
            $userid_clause = $sort_query = '';
            if ($_SESSION['current_user']['role'] == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userid_clause = "AND user_id = $user_id";
            }
            switch ($sort) {
                case 'alphabetically_az':
                    $sort_query = 'ORDER BY title ASC';
                    break;
                case 'alphabetically_za':
                    $sort_query = 'ORDER BY title DESC';
                    break;
                case 'date_new_old':
                    $sort_query = 'ORDER BY created_date DESC';
                    break;
                case 'date_old_new':
                    $sort_query = 'ORDER BY created_date ASC';
                    break;
                case 'featured':
                    $sort_query = "AND featured = '1' ORDER BY featured DESC";
                    break;
                default:
                    break;
            }
            $query = "SELECT COUNT(*) AS total FROM videos WHERE auto_genrate LIKE '%$search_value%' $userid_clause";
            $res_count = $this->db->query($query);
            $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
            $limit_qry = ($total_records > $limit) ? "LIMIT $offset, $limit" : "";
            $sql = "SELECT * FROM videos WHERE auto_genrate LIKE '%$search_value%' $userid_clause $sort_query $limit_qry";
            $result = $this->db->query($sql);
            $output = "";
            $pagination = "";
        }
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $link = $row["short_link"];
                    $title =  $row['title'];
                    $output .= '<div class="col-xl-3 col-md-6 mb-xl-0">';
                    $output .= '<div class="card card-blog card-plain mb-4">';
                    $output .= '<div class="position-relative">';
                    $output .= '<a class="d-block product_imagebox border-radius-xl m-3 m-xl-4">';
                    $output .= '<iframe width="100%" height="500px" src="' . $link . '" class="border-radius-xl" title="' . $title . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                    $output .= '</a>';
                    $output .= '</div>';
                    $output .= '<div class="card-body px-2 pb-0">';
                    $output .= '<div class="d-flex justify-content-between mb-3">';
                    $output.='<div>'.$row['auto_genrate'].'</div>';
                    $output .= '<div class="ms-auto text-end">';
                    $output .= '<i data-id= "' . $row["video_id"] . '" class=" cursor-pointer fa fa-trash text-secondary  delete_shadow  me-1 delete delete_btn btn-light shadow-sm rounded-0" data-delete-type="videos" aria-hidden="true"></i>';
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
        $filter_query = preg_replace('/ORDER BY.*$/', '', $sort_query);
        $query = "SELECT COUNT(*) AS total FROM videos WHERE auto_genrate LIKE '%$search_value%'  $userid_clause $filter_query";
        $res_count = $this->db->query($query);
        $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
        if ($total_records > $limit) {
            $total_pages = ceil($total_records / $limit);
            $pagination .= '<div class="pagination" id="dataPagination" data-routine="videolisting">';
            for ($i = 1; $i <= $total_pages; $i++) {
                $active_class = ($i == $page) ? 'active' : '';
                $pagination .= "<a href='#' class='page-link {$active_class}' data-page='{$i}'>{$i}</a>";
            }
            $pagination .= '</div>';
        }
        $response_data['pagination'] = $pagination;
        $response = json_encode($response_data);
        return $response;
    }

    function allvideolisting(){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $sort = isset($_POST['sortValue']) ? $_POST['sortValue'] : '';
        global $limit;
        if (isset($_SESSION['current_user']) && isset($_SESSION['current_user']['user_id'])) {
            $search_value = isset($_POST['search_text']) ? $_POST['search_text'] : '';
            $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
            $offset = ($page - 1) * $limit;
            $userid_clause = $sort_query = '';
            if ($_SESSION['current_user']['role'] == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userid_clause = "AND user_id = $user_id";
            }
            switch ($sort) {
                case 'alphabetically_az':
                    $sort_query = 'ORDER BY title ASC';
                    break;
                case 'alphabetically_za':
                    $sort_query = 'ORDER BY title DESC';
                    break;
                case 'date_new_old':
                    $sort_query = 'ORDER BY created_date DESC';
                    break;
                case 'date_old_new':
                    $sort_query = 'ORDER BY created_date ASC';
                    break;
                case 'featured':
                    $sort_query = "AND featured = '1' ORDER BY featured DESC";
                    break;
                default:
                    break;
            }
            $query = "SELECT COUNT(*) AS total FROM videos WHERE auto_genrate LIKE '%$search_value%' $userid_clause";
            $res_count = $this->db->query($query);
            $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
            $limit_qry = ($total_records > $limit) ? "LIMIT $offset, $limit" : "";
            $sql = "SELECT * FROM videos WHERE auto_genrate LIKE '%$search_value%' $userid_clause $sort_query $limit_qry";
            $result = $this->db->query($sql);
            $output = "";
            $pagination = "";
        }
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $link = $row["short_link"];
                    $title =  $row['title'];
                    $video_id = $row['video_id'];
                    $toggleactive = ($row['toggle'] == "1") ? "checked" : "";
                    $output .= '<div class="col-xl-3 col-md-6 mb-xl-0">';
                    $output .= '<div class="card card-blog card-plain mb-4">';
                    $output .= '<div class="position-relative">';
                    $output .= '<a class="border-radius-xl">';
                    $output .= '<iframe width="100%" height="500px" src="' . $link . '" class="border-radius-xl" title="' . $title . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                    $output .= '</a>';
                    $output .= '</div>';
                    $output .= '<div class="card-body  pb-0">';
                    $output .= '<div class="d-flex justify-content-between mb-3">';
                    $output.='<div>'.$row['auto_genrate'].'</div>';
                    $output .= '<div class="ms-auto text-end">';
                    $output .= '<div class="form-check form-switch ps-0 toggle_offon">';
                    $output .= '<input class="form-check-input ms-auto toggle-button" type="checkbox" id="checkbox_' . $video_id . '" data-video-id="' . $video_id . '" ' . $toggleactive . '>';
                    $output .= '<input type="hidden" id="togglebtn" name="toggle" value="videos">';
                    $output .= '</div>';
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
        $filter_query = preg_replace('/ORDER BY.*$/', '', $sort_query);
        $query = "SELECT COUNT(*) AS total FROM videos WHERE auto_genrate LIKE '%$search_value%'  $userid_clause $filter_query";
        $res_count = $this->db->query($query);
        $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
        if ($total_records > $limit) {
            $total_pages = ceil($total_records / $limit);
            $pagination .= '<div class="pagination" id="dataPagination" data-routine="videolisting">';
            for ($i = 1; $i <= $total_pages; $i++) {
                $active_class = ($i == $page) ? 'active' : '';
                $pagination .= "<a href='#' class='page-link {$active_class}' data-page='{$i}'>{$i}</a>";
            }
            $pagination .= '</div>';
        }
        $response_data['pagination'] = $pagination;
        $response = json_encode($response_data);
        return $response;
    }

    function offerlisting(){
        global $NO_IMAGE;
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $output = "";
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $query = "SELECT * FROM offers WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
        }
        $output .= '<div class="mb-3 form-check-reverse text-right">
                        <div class="container">
                        <div class="btn-group">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <div class="form-check form-switch ps-0">
                        <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" value="offers" >
                        <input type="hidden" id="toggleStatus" name="status" value="offers">    
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
                    $imagePath = "../admin1/assets/img/offers/" . $image;
                    $noimagePath = $NO_IMAGE;
                    $decodedPath = htmlspecialchars_decode(
                        (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                    );
                    $output .= '<div class="col-12 col-xxl-6 mb-xl-0">';
                    $output .= '<div class="card card-blog card-plain mb-4">';
                    $output .= '<div class="position-relative d-inline-block border-radius-xl offer_imgbox">';
                    $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg  product_main_image" >';
                    $output .= '<div class="position-absolute top-1 end-0 mt-2 me-2">';
                    $output .= '<i data-id= "' . $row["offer_id"] . '" class="fa fa-trash text-secondary  delete_shadow  me-1 delete btn delete_btn btn-light shadow-sm rounded-0" data-delete-type="offers"  data-fild="img" aria-hidden="true"></i>';
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

    function brousetextilelisting(){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $output = "";
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $query = "SELECT * FROM b_textile_catagorys WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output .= '<div class="mb-3 form-check-reverse text-right">';
            $output .= '<div>';
            $output .= '<div class="btn-group">';
            $output .= '<div class="btn-group" role="group" aria-label="Basic example">';
            $output .= '<div class="form-check form-switch ps-0">';
            $output .= '<input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" value="b_textile_catagorys" checked>';
            $output .= '<input type="hidden" id="toggleStatus" name="status" value="b_textile_catagorys">';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $categoies_id = (isset($row['categories']) && $row['categories'] != '') ? $row['categories'] : '';
                        $category_query = "SELECT * FROM allcategories WHERE categoies_id = $categoies_id";
                        $category_result = $this->db->query($category_query);

                        if (mysqli_num_rows($category_result) > 0) {
                            while ($category_row = mysqli_fetch_assoc($category_result)) {
                                $categories = $category_row['categoies_name'];
                                $output .= '<div class="d-flex mb-3 align-items-center">';
                                $output .= '<div class="card card-blog card-plain col-11 ">';
                                $output .= '<div class="d-flex justify-content-between align-items-center">';
                                $output .= '<div class="d-flex">';
                                $output .= '<div class="shop-name text-secondary px-3">' . $categories  . '</div>';
                                $output .= '</div>';
                                $output .= '</div>';
                                $output .= '</div>';
                                $output .= '<div class="col-1 text-end p-0">';
                                $output .= '<i data-id= "' . $row["b_textile_catagory_id"] . '" class="fa fa-trash cursor-pointer delete" data-delete-type="b_textile_catagorys" aria-hidden="true"></i>';  
                                $output .= '</div>';
                                $output .= '</div>';

                            }
                        }
                    }
                    $response_data = array('data' => 'success', 'outcome' => $output);
                } else {
                    $response_data = array('data' => 'fail', 'outcome' => "No data found");
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function FAQlisting(){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $output = "";
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $query = "SELECT * FROM faqs WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $output .= '<div class="row mb-3 p-3  align-items-center">';
                        $output .= '<div class="col-11 accordion-item p-0">';
                        $output .= '<input type="checkbox" id="' . $row["faq_id"] . '">';
                        $output .= '<label for="' . $row["faq_id"] . '" class="accordion-item-title"><span class="icon "></span> ' . $row["question"] . '</label>';
                        $output .= '<div class="accordion-item-desc">';
                        $output .= '' . $row["answer"] . '';
                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '<div class="col-1 text-end p-0">';
                        $output .= '<i data-id= "' . $row["faq_id"] . '" class="fa fa-trash cursor-pointer delete" data-delete-type="faqs" aria-hidden="true"></i>';
                        $output .= '</div>';
                        $output .= '</div>';
                    }
                    $response_data = array('data' => 'success', 'outcome' => $output);
                } else {
                    $response_data = array('data' => 'fail', 'outcome' => "No data found");
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function paragraphlisting(){   
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $query = "SELECT * FROM paragraph WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output = "";
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
        }
        $response = json_encode($response_data);
        return $response;
    }

    function bannerlisting(){
        global $NO_IMAGE;
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $query = "SELECT * FROM banners WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output = "";
            $output .= '<div class="mb-3 form-check-reverse text-right">';
            $output .= '<div>';
            $output .= '<div class="btn-group">';
            $output .= '<div class="btn-group" role="group">';
            $output .= '<div class="form-check form-switch ps-0 toggle_offon">';
            $output .= '<input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" value="banners" checked>';
            $output .= '<input type="hidden" id="toggleStatus" name="status" value="banners">';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $image = $row["banner_img"];
                        $imagePath = "../admin1/assets/img/banner_img/" . $image;
                        $noimagePath = $NO_IMAGE;
                        $decodedPath = htmlspecialchars_decode(
                            (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                        );
                        $output .= '<div class="col-12 col-xxl-6 mb-xl-0 mb-2">';
                        $output .= '<div class="card card-blog card-plain mb-4">';
                        $output .= '<div class="position-relative d-inline-block  border-radius-xl offer_imgbox">';
                        $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg mb-3 mt-3 product_main_image">';
                        $output .= '<div class="position-absolute top-2 end-0 mt-3 me-3">';
                        $output .= '<i data-id= "' . $row["banner_id"] . '" class="fa fa-trash text-secondary  delete_shadow  me-1 delete_btn delete btn btn-light shadow-sm rounded-0"  data-fild="banner_img" data-delete-type="banners" aria-hidden="true"></i>';
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

    function famousmarketlisting(){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $search_value = isset($_POST['search_text']) ? $_POST['search_text'] : '';
            $sql = "SELECT * FROM famous_markets WHERE  status='1'";
            $res = $this->db->query($sql);
            if (mysqli_num_rows($res) > 0) {
                $output = "";
                $output .= '<div class="mb-3 form-check-reverse text-right">';
                $output .= '<div>';
                $output .= '<div class="btn-group">';
                $output .= '<div class="btn-group" role="group" aria-label="Basic example">';
                $output .= '<div class="form-check form-switch ps-0">';
                $output .= '<input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" value="famous_markets" checked>';
                $output .= '<input type="hidden" id="toggleStatus" name="status" value="famous_markets">';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                $output .= '</div>';
                while ($row = mysqli_fetch_array($res)) {
                    $input = $row['shop_name'];                
                    $query = "SELECT * FROM users WHERE user_id = '$input'";
                    $result = $this->db->query($query);
                    $id = $row["famous_market_id"];
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $output.=' <div class="d-flex  align-items-center mb-3">';
                                $output .= '<div class="card card-blog card-plain col-11">';
                                $output .= '<div class="d-flex  align-items-center">';
                                $output .= '<div class="">';
                                $output .= '<div class="shop-name text-secondary px-3">' . htmlspecialchars($row['shop']) . '</div>';
                                $output .= '</div>';
                                $output .= '</div>';
                                $output .= '</div>';
                                $output .= '<div class="col-1 text-end p-0">'; 
                                $output .= '<i data-id="' . $id . '" class="fa fa-trash cursor-pointer delete" data-delete-type="famous_markets" aria-hidden="true"></i>';
                                $output .= '</div>';
                                $output .= '</div>';
                            }
                            $response_data = array('data' => 'success', 'outcome' => $output);
                        } else {
                            $response_data = array('data' => 'fail', 'outcome' => "No data found");
                        }
                    }
                }
            } else {
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function topbarlisting(){
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $query = "SELECT * FROM topbar WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output = "";
            $output .= '<div class="mb-3 form-check-reverse text-right">';
            $output .= '<div>';
            $output .= '<div class="btn-group">';
            $output .= '<div class="btn-group" role="group">';
            $output .= '<div class="form-check form-switch ps-0 toggle_offon">';
            $output .= '<input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" value="topbar" checked>';
            $output .= '<input type="hidden" id="toggleStatus" name="status" value="topbar">';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                        $output.='<div class="d-flex align-items-center  mb-3">';
                        $output .= '<div class="card card-blog card-plain col-11">';
                        $output .= '<div class="d-flex justify-content-between align-items-center">';
                        $output .= '<div class="topbar">';
                        $output .= '<div class="shop-name text-secondary px-3"><b>topbar1:</b>' .$row['topbar_input1']  . '</div>';
                        $output .= '<div class="shop-name text-secondary px-3"><b>topbar2:</b>' .$row['topbar_input2']  . '</div>';
                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '</div>';
                        $output .= '<div class="col-1 text-end p-0">';
                        $output .= '<i data-id= "' . $row["topbar_id"] . '" class="fa fa-trash cursor-pointer delete" data-delete-type="topbar" aria-hidden="true"></i>'; // Removed margin-top for centering
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
    function custm_productlisting(){
        global $NO_IMAGE;
        global $limit;
        $output = $pagination = "";
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $search_value = isset($_POST['search_text']) ? $_POST['search_text'] : '';
        $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
        $offset = ($page - 1) * $limit;
        $query = "SELECT COUNT(*) AS total FROM products WHERE title LIKE '%$search_value%'";
        $res_count = $this->db->query($query);
        $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
        $limit_qry = ($total_records > $limit) ? "LIMIT $offset, $limit": " ";
        $sql = "SELECT * FROM products WHERE title LIKE '%$search_value%' $limit_qry";
        $result = $this->db->query($sql);
        
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $toggleactive = (isset($row['toggle']) && $row['toggle'] == "1") ? "checked" : "";
                    $product_id = $row['product_id'];
                    $image = $row["p_image"];
                    $imagePath = "../admin1/assets/img/product_img/" . $image;
                    $noimagePath = $NO_IMAGE;
                    $decodedPath = htmlspecialchars_decode(
                        (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                    );
                    $title = $row['title'];
                    $maxPrice = $row['maxprice'];
                    $minPrice = $row['minprice'];
                    $output .= '<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">';
                    $output .= '<div class="card card-blog card-plain image-container mb-4">';
                    $output .= '<div class="position-relative">';
                    $output .= '<a class="d-block border-radius-xl mt-5 product_imagebox" data-bs-toggle="modal" data-bs-target="#staticBackdrop-' . $product_id . '">';
                    $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl product_main_image">';
                    $output .= '</a>';
                    $output .= '</div>';
                    $output .= '<div class="card-body pb-0">';
                    $output .= '<a href="#">';
                    $output .= '<h5 class="title">' . $title . '</h5>';
                    $output .= '</a>';
                    $output .= '<div class="d-flex justify-content-between mb-3">';
                    $output .= '<div class="ms-1 d-inline fs-6">';
                    $output .= '<span class="text-decoration-line-through price-line-through"><h6 class="fw-normal d-inline fs-6">Rs:</h6>' . $maxPrice . '</span>';
                    $output .= '<span class="fs-5">&nbsp;<h6 class="fw-normal d-inline fs-5">Rs:</h6>' . $minPrice . '</span>';
                    $output .= '</div>';
                    $output .= '<div class="ms-auto text-end">';
                    $output .= '<div class="form-check form-switch ps-0 toggle_offon">';
                    $output .= '<input class="form-check-input ms-auto protoggle-button" type="checkbox" id="checkbox_' . $product_id . '" data-product-id="' . $product_id . '" ' . $toggleactive . '>';
                    $output .= '<input type="hidden" id="togglebtn" name="toggle" value="videos">';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                }
                $response_data = array(
                    'data' => 'success',
                    'outcome' => $output,
                    'pagination' => isset($pagination) ? $pagination : '',
                    'pagination_needed' => ($total_records > $limit) ? true : false
                );
            } else {
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
            $query = "SELECT COUNT(*) AS total FROM products WHERE title LIKE '%$search_value%'";
            $res_count = $this->db->query($query);
            $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
            if ($total_records > $limit) {
                $total_pages = ceil($total_records / $limit);
                if ($total_pages > 1) {
                    $pagination .= '<div class="pagination" id="dataPagination" data-routine="productlisting">';
                    for ($i = 1; $i <= $total_pages; $i++) {
                        $active_class = ($i == $page) ? 'active' : '';
                        $pagination .= "<a href='#' class='page-link {$active_class}' data-page='{$i}'>{$i}</a>";
                    }
                    $pagination .= '</div>';
                }
                $response_data['pagination'] = $pagination;
            }
       
        $response = json_encode($response_data);
        return $response;  
    }
    function userlisting() {
        $response_data = array('data' => 'fail', 'msg' => "Error");
        global $NO_IMAGE;
        global $limit;
        $output = $pagination = $userid_clause = "";
        if (isset($_SESSION['current_user']['user_id'])) {
            $search_value = isset($_POST['search_text']) ? $this->db->real_escape_string(trim($_POST['search_text'])) : '';
            $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
            $offset = ($page - 1) * $limit;
            if ($_SESSION['current_user']['role'] == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userid_clause = "AND user_id = $user_id";
            }
            $query = "SELECT COUNT(*) AS total FROM users WHERE shop LIKE '%$search_value%' $userid_clause and role='1'";
            $res_count = $this->db->query($query);
            $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
            $limit_qry = ($total_records > $limit) ? " LIMIT $offset, $limit" : " ";
            $sql = "SELECT * FROM users WHERE shop LIKE '%$search_value%' $userid_clause and role='1' $limit_qry";
            $result = $this->db->query($sql);
    
            if ($result && $result->num_rows > 0) {
                $output .= '<div class="table-scroll">';
                $output .= '<table class="Table table text-center"">';
                $output .= '<thead>';
                $output .= '<tr>';
                $output .= '<th>ID</th>';
                $output .= '<th>Name</th>';
                $output .= '<th>Shop Name</th>';
                $output .= '<th>Email</th>';
                $output .= '<th>Contact</th>';
                $output .= '<th>Shop Image</th>';
                $output .= '<th>Delete</th>';
                $output .= '<th>Approve</th>';
                $output .= '</tr>';
                $output .= '</thead>';
                $output .= '<tbody>';
    
                while ($row = $result->fetch_assoc()) {
                    $toggleactive = ($row['toggle'] == "1") ? "checked" : "";
                    $image = $row["shop_img"];
                    $userId = $row['user_id'];
                    $imagePath = "../admin1/assets/img/sigup_img/" . $image;
                    $noimagePath = $NO_IMAGE;
                    $decodedPath = htmlspecialchars_decode(
                        (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                    );
                    $output .= '<tr>';
                    $output .= '<td>' . $row['user_id'] . '</td>';
                    $output .= '<td>' . htmlspecialchars($row['name']) . '</td>';
                    $output .= '<td>' . htmlspecialchars($row['shop']) . '</td>';
                    $output .= '<td>' . htmlspecialchars($row['email']) . '</td>';
                    $output .= '<td>' . htmlspecialchars($row['phone_number']) . '</td>';
                    $output .= '<td><img src="' . $decodedPath . '" alt="Shop Image" class="user_img"></td>';
                    $output .= '<td><i data-id="' . $row["user_id"] . '" class="cursor-pointer fa fa-trash text-secondary delete_shadow me-1 delete delete_btn btn-light shadow-sm rounded-0" data-delete-type="users" aria-hidden="true"></i></td>';
                    $output .='<td>';
                    $output .='<div class="d-flex justify-content-center">';
                    $output .= '<div class="form-check form-switch  toggle_offon">';
                    $output .= '<input class="form-check-input ms-auto usertoggle-button" type="checkbox" id="checkbox_' . $userId . '" data-user-id="' . $userId . '" ' . $toggleactive . '>';
                    $output .= '<input type="hidden" id="togglebtn" name="toggle" value="users">';
                    $output .= '</div>';
                    $output .='</div>';
                    $output .='<td>';
                    $output .= '</tr>';
                }
                $output .= '</tbody>';
                $output .= '</div>';
                $output .= '</div>';
                $response_data = array('data' => 'success','outcome' => $output,'pagination' => isset($pagination) ? $pagination : '', 
                'pagination_needed' => ($total_records > $limit) ? true : false);
            }else{
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
            $query = "SELECT COUNT(*) AS total FROM users WHERE shop LIKE '%$search_value%' $userid_clause and role='1' ";
            $res_count = $this->db->query($query);
            $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
            if ($total_records > $limit) {
                $total_pages = ceil($total_records / $limit);
                if ($total_pages > 1) {
                    $pagination .= '<div class="pagination" id="dataPagination" data-routine="userlisting">';
                    for ($i = 1; $i <= $total_pages; $i++) {
                        $active_class = ($i == $page) ? 'active' : '';
                        $pagination .= "<a href='#' class='page-link {$active_class}' data-page='{$i}'>{$i}</a>";
                    }
                    $pagination .= '</div>';
                }
                $response_data['pagination'] = $pagination;
            }
        }
        $response = json_encode($response_data);
        return $response;
       
    }

    function deleteRecord($table, $delete_id,$fild_name) {
        $folder_path = '';
        switch ($table) {
            case 'products':
                $folder_path = "assets/img/product_img/";
                break;
            case 'invoice':
                $folder_path = "assets/img/invoice_img/";
                break;
            case 'blogs':
                $folder_path = "assets/img/blog_img/";
                break;
            case 'offers':
                $folder_path = "assets/img/offers/";
                break;
            case 'customers':
                $folder_path = "assets/img/customer/";
                break;
            case 'banners':
                $folder_path = "assets/img/banner_img/";
                break;
            default:
                
                break;
        }
        $delete_id = $this->db->real_escape_string($delete_id);
        $fild_name= $this->db->real_escape_string($fild_name);
        $table_singular = rtrim($table, 's');
        $query1 = "SELECT  $fild_name FROM $table WHERE {$table_singular}_id = $delete_id";
        $resulttt = $this->db->query($query1);
        if ($resulttt && $row = mysqli_fetch_assoc($resulttt)) {
            if (!empty($row[$fild_name])) {
                $image_path = $folder_path . $row[$fild_name];
                if (file_exists($image_path)) {
                    unlink($image_path);
                } 
            }
        }
        $query = "DELETE FROM $table WHERE {$table_singular}_id = $delete_id";
        $result = $this->db->query($query);
        if ($result === TRUE) {
            $response_data = array('data' => 'success', 'message' => "Delete successfully");
        } else {
            $response_data = array('data' => 'fail', 'message' => "Failed to delete record");
        }
        return json_encode($response_data);
    }
    

    function product_main_image(){
        $product_id = isset($_POST['delete_id']) ? $_POST['delete_id'] : '';
        if (!empty($product_id)) {
            $query = "UPDATE products SET p_image = ' ' WHERE product_id = '$product_id'";
            $result = $this->db->query($query);
            if ($result) {
                $response_data = array('data' => 'success', 'message' => "Delete successfully");
            } else {
                $response_data = array('data' => 'fail', 'message' => "Failed to delete record");
            }
            return json_encode($response_data);
        }
    }

    function deleteData(){
        $delete_id = isset($_POST['delete_id']) ? $_POST['delete_id'] : '0';
        $delete_table_name = isset($_POST['delete_table']) ? $_POST['delete_table'] : '';
        $delete_table_name = ($delete_table_name == "product_form_image") ? 'product_images': $delete_table_name;
        $delete_table_name = ($delete_table_name == "product_form_image") ? 'products': $delete_table_name;
        $fild_name = isset($_POST['fild_name']) ? $_POST['fild_name'] : '0';
        return $this->deleteRecord($delete_table_name, $delete_id, $fild_name);
    }    

    function forget_password() {
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        if (empty($email)) {
            $error_msg = "Please enter an email address.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_msg = "Please enter the valid email address.";
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
                    $reset_link = SITE_ADMIN_URL . "reset_password.php?token=" . $token;
                    $subject = "Password Reset Request";
                    $message = "Click on the following link to reset your password: " . $reset_link;
                    $headers = "From: no-reply@marketsearch.com";

                    if (mail($email, $subject, $message, $headers)) {
                        $response_data = array('data' => 'success', 'msg' => 'Password reset link has been sent to your email.');
                    } else {
                        $response_data = array('data' => 'fail', 'msg' => 'Failed to send reset link. Please try again.');
                    }
                }
            } else {
                $response_data = array('data' => 'fail', 'msg' => 'No account found with that email address.');
            }
        } else {
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
            $error = 'Please enter the password.';
        } elseif (!preg_match($strongPasswordPattern, $password)) {
            $error = 'Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character.';
        }
        $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
        if (empty($error)) {
            if ($password === $confirm_password) {
                $current_time = date("U");
                $query = "SELECT email FROM password_resets WHERE token = '$token' AND expires >= '$current_time'";
                $result = $this->db->query($query);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $email = $row['email'];
                    $query = "UPDATE users SET password = '$password' WHERE email = '$email'";
                    $result = $this->db->query($query);
                    if ($result) {
                        $query = "DELETE FROM password_resets WHERE email = '$email'";
                        $result = $this->db->query($query);
                        $response_data = array('data' => 'success', 'msg' => 'Your password has been reset successfully.');
                    } else {
                        $response_data = array('data' => 'fail', 'msg' => 'Invalid or expired token.');
                    }
                }
            } else {
                $response_data = array('data' => 'fail', 'msg' => 'Password Mismatch.');
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error);
        }

        $response = json_encode($response_data);
        return $response;
    }

    function getproduct(){
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $pro_img="";
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        if (!empty($id)) {
            $query = "SELECT  * from  products WHERE product_id = $id AND  status = 1";
            $result = $this->db->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $product_img_query = "SELECT  * from  product_images WHERE product_id = $id AND  status = 1";
                $product_img_result = $this->db->query($product_img_query);
                $product_img_results = [];
                if ($product_img_result->num_rows > 0) {
                    while ($product_img_row = $product_img_result->fetch_assoc()) {
                        $product_img_results[] = $product_img_row; 
                    }
                }
                    $pro_img.='<input type="file" id="files" class="file-input" name="p_image[]" multiple style="display: none;" />';
                    $pro_img.='<label for="files" class="file-label " style="display:block;">';
                    $pro_img.='<span class="choose-text">Choose Files</span>';
                    $pro_img.='</label>';
                $response_data = array('data' => 'success', 'outcome' => $row, 'product_img_result' => $product_img_results ,'pro_img'=>$pro_img);
            }
            
        }
        
        $response = json_encode($response_data);
        return $response;
    }

    function getinvoice(){
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        if (!empty($id)) {
            $query = "SELECT  * from  invoice WHERE invoice_id = $id";
            $result = $this->db->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $item_query = "SELECT * FROM invoice_item WHERE invoice_id = $id";
                $item_result = $this->db->query($item_query);
                $item_data = "";
                while ($invoice_items = $item_result->fetch_assoc()) {
                    $inv_item = $invoice_items['item'];
                    $inv_quantity = $invoice_items['quantity'];
                    $inv_rate = $invoice_items['rate'];
                    $inv_amount = $invoice_items['amount'];
                    $item_data .=  '<tr class="attr">';
                    $item_data .=  '<input type="hidden" name="invoice_item_id[]" value="' . $invoice_items['invoice_item_id'] . '">';
                    $item_data .=  '<td class="item_0">';
                    $item_data .=  ' <input type="text" class="form-control mt-1" value="' . $inv_item . '" name="item[]" ">';
                    $item_data .=  '<span class="errormsg item"></span>';
                    $item_data .=  '</td>';
                    $item_data .=  '<td class="quantity_0">';
                    $item_data .=  '<input type="number" class="form-control mt-1" value="' . $inv_quantity . '" name="quantity[]" min="1" >';
                    $item_data .=  ' <span class="errormsg quantity"></span>';
                    $item_data .=  '</td>';
                    $item_data .=  '<td class="rate_0">';
                    $item_data .=  ' <input type="text" class="form-control mt-1" value="' . $inv_rate . '" name="rate[]" >';
                    $item_data .=  '<span class="errormsg rate"></span>';
                    $item_data .=  ' </td>';
                    $item_data .=  '<td>';
                    $item_data .=  ' <input type="text" class="form-control mt-1" value="' . $inv_amount . '" name="amount[]" disabled="" >';
                    $item_data .=  '<span class="errormsg item"></span>';
                    $item_data .=  ' </td>';
                    $item_data .=  '<td  data-delete-type="invoice_item" data-id="' . $invoice_items['invoice_item_id'] . '" class="invoice-rowclose   delete"><i class="fa fa-times cursor-pointer remove" aria-hidden="true" style=""></i></td>';
                    $item_data .=  '</tr>';
                }
                $response_data = array('data' => 'success', 'outcome' => $row, 'item_data' => $item_data);
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function getcustomer(){
        $response_data = array('data' => 'fail', 'msg' => 'unknown error occurred');
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        if (!empty($id)) {
            $query = "SELECT  * from  customer  WHERE customer_id = $id ";
            $result = $this->db->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $response_data = array('data' => 'success', 'outcome' => $row);
            } else {
                $response_data = array('data' => 'fail', 'msg' => 'Customer not found');
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function getblog(){
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        if (!empty($id)) {
            $query = "SELECT  * from  blogs WHERE blog_id = $id AND  status = 1";
            $result = $this->db->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $response_data = array('data' => 'success', 'outcome' => $row);
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function check_toggle_status(){
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_POST['table_name'])) {
            $table_name = $_POST['table_name'];
            $query = "SELECT * from $table_name WHERE status='1'";
            $result = $this->db->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $response_data = array('data' => 'success', 'outcome' => $row);
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function toggle_enabledisable(){
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_POST['ischecked_value']) && isset($_POST['table_name'])) {
            $table_name = $_POST['table_name'];
            $ischecked_value = $_POST['ischecked_value'];
            $query = "UPDATE $table_name SET status= '$ischecked_value'";
            $result = $this->db->query($query);
            if ($result) {
                $response_data = array('data' => 'success', 'outcome' => "Update successfully");
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function toggle_checkuncheck() {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_POST['ischecked_value']) && isset($_POST['video_id'])) {
            $video_id = intval($_POST['video_id']);
            $ischecked_value = $_POST['ischecked_value'];
            $query = "UPDATE videos SET toggle= '$ischecked_value' WHERE video_id = $video_id";
            $result = $this->db->query($query);
            if ($result) {
                $response_data = array('data' => 'success', 'outcome' => "Update successfully");
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function check_toggle_btn() {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_POST['video_id'])) {
            $video_id = intval($_POST['video_id']);
            $query = "SELECT * FROM videos WHERE video_id = $video_id AND toggle='1'";
            $result = $this->db->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $response_data = array('data' => 'success', 'outcome' => $row);
            }
        }

        $response = json_encode($response_data);
        return $response;
    }
function protoggle_checkuncheck() {
    $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');

    if (isset($_POST['ischecked_value']) && isset($_POST['product_id'])) {
        $product_id = intval($_POST['product_id']);
        $ischecked_value = $_POST['ischecked_value'];
         $query = "UPDATE products SET toggle= '$ischecked_value' WHERE product_id = $product_id";
        $result = $this->db->query($query);
        if ($result) {
            $response_data = array('data' => 'success', 'outcome' => "Update successfully");
        } else {
            $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        }
    }

    $response = json_encode($response_data);
    return $response;
}

function procheck_toggle_btn() {
    $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
    if (isset($_POST['product_id'])) {
        $product_id = intval($_POST['product_id']);
        $query = "SELECT * FROM products WHERE  product_id = $product_id AND toggle='1'";
        $result = $this->db->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $response_data = array('data' => 'success', 'outcome' => $row);
        }
    }
    $response = json_encode($response_data);
    return $response;
}

function usertoggle_checkuncheck() {
    $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');

    if (isset($_POST['ischecked_value']) && isset($_POST['user_id'])) {
        $user_id = intval($_POST['user_id']);
        $ischecked_value = $_POST['ischecked_value'];
         $query = "UPDATE users SET toggle= '$ischecked_value' WHERE user_id = $user_id";
        $result = $this->db->query($query);
        if ($result) {
            $response_data = array('data' => 'success', 'outcome' => "Update successfully");
        } else {
            $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        }
    }

    $response = json_encode($response_data);
    return $response;
}

function usercheck_toggle_btn() {
    $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
    if (isset($_POST['user_id'])) {
        $user_id = intval($_POST['user_id']);
        $query = "SELECT * FROM users WHERE  user_id = $user_id AND toggle='1'";
        $result = $this->db->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $response_data = array('data' => 'success', 'outcome' => $row);
        }
    }
    $response = json_encode($response_data);
    return $response;
}

    function get_categories(){
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $sql = "SELECT * FROM allcategories WHERE status='1'";
            $result = $this->db->query($sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $all_categories = "";
                    $category_names = [];
                    while ($categoryrow = mysqli_fetch_assoc($result)) {
                        if (!in_array($categoryrow['categoies_name'], $category_names)) {
                            $category_names[] = $categoryrow['categoies_name'];
                            $all_categories .= "<option value='" . $categoryrow['categoies_id'] . "'>" . $categoryrow['categoies_name'] . "</option>";
                        }
                    }
                    $response_data = array('data' => 'success', 'outcome' => $all_categories);
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function select_shop(){
        $response_data = array('data' => 'fail', 'outcome' => 'something went wrong');
        if (isset($_SESSION['current_user']['user_id'])) {
            $sql = "SELECT user_id, shop FROM users WHERE status='1'";
            $result = $this->db->query($sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $all_shop = array();
                    while ($shoprows = mysqli_fetch_assoc($result)) {
                        $all_shop[] = array(
                            'user_id' => $shoprows['user_id'],
                            'shop' => $shoprows['shop']
                        );
                    }
                    $response_data = array('data' => 'success', 'outcome' => $all_shop);
                }
            }
        }
        return json_encode($response_data);
    }

    function totalearning() {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_SESSION['current_user']['user_id']) && isset($_SESSION['current_user']['role'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $role = $_SESSION['current_user']['role'];
            $userquery = ($role == 1) ? "AND user_id = $user_id" : "";
            $sql = "SELECT * FROM invoice WHERE status = '1' $userquery";
            $result = $this->db->query($sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $total_amount = 0;
                    while ($invoicedata = mysqli_fetch_assoc($result)) {
                        $total_amount += $invoicedata['total'];
                    }
                    $response_data = array('data' => 'success', 'totalearning' => $total_amount);
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function totalproduct() {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_SESSION['current_user']['user_id']) && isset($_SESSION['current_user']['role'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $role = $_SESSION['current_user']['role'];
            $userquery = ($role == 1) ? "AND user_id = $user_id" : "";
    
            $sql = "SELECT * FROM products WHERE status = '1' $userquery";
            $result = $this->db->query($sql);
    
            if ($result && $result->num_rows > 0) {
                $countproduct = $result->num_rows;
                $response_data = array('data' => 'success', 'totalproduct' => $countproduct);
            } else {
                $response_data['outcome'] = 'No products found.';
            }
        } 
        $response = json_encode($response_data);
        return $response;
    }
    

    function totalclient() {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_SESSION['current_user']['user_id']) && isset($_SESSION['current_user']['role'])) {
            $user_id = "";
            $user_id = $_SESSION['current_user']['user_id'];
            $role = $_SESSION['current_user']['role'];
            $userquery = ($role == 1) ? "AND user_id = $user_id" : "";

            $sql = "SELECT * FROM customer WHERE status='1' $userquery";
            $result = $this->db->query($sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $countclient = $result->num_rows;
                    $response_data = array('data' => 'success', 'countclient' => $countclient);
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function totalitemsale() {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_SESSION['current_user']['user_id']) && isset($_SESSION['current_user']['role'])) {
            $user_id = "";
            $user_id = $_SESSION['current_user']['user_id'];
            $role = $_SESSION['current_user']['role'];
            $userquery = ($role == 1) ? "AND user_id = $user_id" : ""; 
            $sql = "SELECT * FROM invoice  $userquery";
            $result = $this->db->query($sql);
            if ($result) {
                $totalitemsale = $totalamountsale = 0;
                if (mysqli_num_rows($result) > 0) {
                    while ($invoicedata = mysqli_fetch_assoc($result)) {
                        $invoice_id = $invoicedata['invoice_id'];
                        $invoice_item_sql = "SELECT * FROM invoice_item WHERE invoice_id = $invoice_id";
                        $invoice_item_result = $this->db->query($invoice_item_sql);
                        if ($invoice_item_result) {
                            if (mysqli_num_rows($invoice_item_result) > 0) {
                                while ($invoiceitemdata = mysqli_fetch_assoc($invoice_item_result)) {
                                    $quantity = (float)$invoiceitemdata['quantity'];
                                    $amount = (float)$invoiceitemdata['amount'];
                                    $totalitemsale += $quantity;
                                    $totalamountsale += $amount;
                                }
                            }
                        }
                        $response_data = array('data' => 'success', 'totalitemsale' => $totalitemsale, 'totalamountsale' => $totalamountsale);
                    }
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }
    function user_massge() {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = "";
            if (isset($_SESSION['current_user']['role']) && isset($_SESSION['current_user']['role']) == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userquery = "WHERE user_id = $user_id";
            } 
            $sql = "SELECT * FROM users $userquery AND toggle='0' and role='1'";
                $result = $this->db->query($sql); 
                if ($result ) {
                    if (mysqli_num_rows($result) > 0) {
                        $msg= '<div class="alert alert-info">Your profile is currently being reviewed by our team. 
                                    This is a necessary step to verify your details and complete your registration.
                                    <span class="popup-close-button">&times;</span>
                                    </div>';
                        $response_data = array('data' => 'success', 'outcome' => $msg);
                    }else{
                        $response_data = array('data' => 'fail', 'outcome' => '');   
                    }
                }else{
                    $response_data = array('data' => 'fail', 'outcome' => '');   
                } 
        }
        return json_encode($response_data);
    }
    
    function chartdrawer() {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $userquery = "and user_id = $user_id";
            $yearly_totals = [];
            $sql = "SELECT * FROM invoice WHERE status='1' $userquery";
            $result = $this->db->query($sql);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $year = date('Y', $row['created_at']);
                        $yearly_totals[] = [
                            'year' => $year,
                            'total_sales' => $row['total']
                        ];
                    }
                    $response_data = array('data' => 'success', 'outcome' => $yearly_totals);
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function getinvoicepdf() {
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        if (!empty($id)) {
            $query = "SELECT  * from  invoice WHERE invoice_id = $id";
            $result = $this->db->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $item_query = "SELECT * FROM invoice_item WHERE invoice_id = $id";
                $item_result = $this->db->query($item_query);
                $item_data = "";
                while ($invoice_items = $item_result->fetch_assoc()) {
                    $inv_item = $invoice_items['item'];
                    $inv_quantity = $invoice_items['quantity'];
                    $inv_rate = $invoice_items['rate'];
                    $inv_amount = $invoice_items['amount'];
                    $item_data .=  '<tr class="attr">';
                    $item_data .=  '<input type="hidden" name="invoice_item_id[]" value="' . $invoice_items['invoice_item_id'] . '">';
                    $item_data .=  '<td >' . $inv_item . '</td>';
                    $item_data .=  '<td class="text-center">' . $inv_quantity . '</td>';
                    $item_data .=  '<td class="text-center">' . $inv_rate . '</td>';
                    $item_data .=  '<td class="text-center">' . $inv_amount . '</td>';

                }
                $response_data = array('data' => 'success', 'outcome' => $row, 'item_data' => $item_data);
            }
        }
        $response = json_encode($response_data);
        return $response;
    }
}
