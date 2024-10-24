<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

// include_once '../append/Login.php';
include_once '../connection.php';
$NO_IMAGE =  "../admin1/assets/img/image_not_found.png";
class admin_functions
{
    public $cls_errors = array();
    public $msg = array();
    protected $db;
    public function __construct()
    {
        $db_connection = new DB_Class();
        $this->db = $GLOBALS['conn'];
    }

    public function demo_function()
    {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);

        if ($result === false) {
            die("Query failed: " . $this->db->error);
        } else {
            print_r($result);
        }
    }

    function insert_signin() {
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $strongPasswordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/';
        $error_array = array();
        if (empty($email)) {
            $error_array['email'] = "Please enter an email address.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_array['email'] = "Please enter the valid email address";
        }
        if (empty($password)) {
            $error_array['password'] = 'Please enter the password.';
        } elseif (!preg_match($strongPasswordPattern, $password)) {
            $error_array['password'] = 'Password not valid';
        }
        if (empty($error_array)) {
            $query = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
            $result = $this->db->query($query);
            if ($result->num_rows > 0) {
                $userinfo = mysqli_fetch_assoc($result);
                $_SESSION['current_user'] = $userinfo;
                $response_data = array('data' => 'success', 'msg' => 'login successfully');
            } else {
                $error_array['errormsg'] = 'User does not exist! <a href="sign-up.php">Sign Up</a>';
                $response_data = array('data' => 'fail', 'msg' => $error_array);
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array);
        }
        $response = json_encode($response_data);
        return $response;
    }

    function profile_updatedata() {
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

    function profile_imagesave()
    {
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        if ($_SESSION['current_user']['user_id']) {
            $user_id = $_SESSION['current_user']['user_id'];
            $query = "SELECT * FROM users WHERE user_id = '$user_id'";
            $result = $this->db->query($query);

            if ($result) {
                $row = $result->fetch_assoc();
                $image = $row["shop_logo"];
            }

            if (isset($_FILES['shop_logo'])) {
                $maxSize = 5 * 1024 * 1024;
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
                $folder = "assets/img/sigup_img/";
                if (isset($_FILES['shop_logo']['name']) && $_FILES['shop_logo']['name'] != "") {
                    $filename = $_FILES['shop_logo']['name'];
                    $tmpfile = $_FILES['shop_logo']['tmp_name'];
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

                            $query = "UPDATE users SET shop_logo = '$shoplogo'  WHERE user_id  = $user_id";
                            $result = $this->db->query($query);
                            if ($result) {
                                $response_data = array('data' => 'success', 'msg' => 'Profile data updated');
                            }
                        }
                    } else {
                        $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
                    }
                } else {
                    $response_data = array('data' => 'success', 'msg' => 'Profile image updated');
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }
    function insert_signup()
    {
        $error_array = array();
        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
        if (isset($_FILES['shop_img'])) {
            $filename = $_FILES['shop_img']['name'];
            $tmpfile = $_FILES['shop_img']['tmp_name'];
            $fileNameCmps = explode(".", $filename);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFilename = uniqid() . '.' . $fileExtension;
            $folder = "assets/img/sigup_img/";
            $fullpath = $folder . $newFilename;
            $maxSize = 5 * 1024 * 1024;
            if (!in_array($fileExtension, $allowedExtensions)) {
                $error_array['shop_img'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
            }
            if ($_FILES['shop_img']['size'] > $maxSize) {
                $error_array['shop_img'] = "File size must be 5MB or less.";
            }

            if (empty($filename)) {
                $error_array['shop_img'] = "Please select the shop image.";
            }
        }
        if (isset($_FILES['shop_logo'])) {
            $filename = $_FILES['shop_logo']['name'];
            $tmpfile = $_FILES['shop_logo']['tmp_name'];
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
        }
        if (isset($_POST['name']) && $_POST['name'] == '') {
            $error_array['name'] = "Please enter the name.";
        }
        if (isset($_POST['shop']) && $_POST['shop'] == '') {
            $error_array['shop'] = "Please enter the shop name.";
        }
        if (isset($_POST['address']) && $_POST['address'] == '') {
            $error_array['address'] = "Please enter the shop address.";
        }
        if (isset($_POST['business_type']) && $_POST['business_type'] == '') {
            $error_array['business_type'] = "Please select the business type.";
        }
        $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
        $mobilepattern = "/^[789]\d{9}$/";
        if (empty($phone_number)) {
            $error_array['phone_number'] = "Please enter the phone number.";
        } elseif (!preg_match($mobilepattern, $phone_number)) {
            $error_array['phone_number'] = "The mobile number is invalid.";
        }
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $confirmPassword = isset($_POST['Confirm_Password']) ? $_POST['Confirm_Password'] : '';
        $strongPasswordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&#])[A-Za-z\d@$!%*?&#]{8,}$/';
        if (empty($password)) {
            $error_array['password'] = "Please enter the password.";
        } elseif (!preg_match($strongPasswordPattern, $password)) {
            $error_array['password'] = "Password must include an uppercase, lowercase, digit, and special character.";
        }
        if (empty($confirmPassword)) {
            $error_array['Confirm_Password'] = "Please enter the confirm password.";
        } elseif ($password !== $confirmPassword) {
            $error_array['Confirm_Password'] = "Passwords do not match.";
        }
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        if (empty($email)) {
            $error_array['email'] = "Please enter an email address.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_array['email'] = "Please enter the valid email address.";
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
                    $query = "INSERT INTO users (name, shop, address, phone_number, business_type, shop_logo, shop_img, password, email) 
                              VALUES ('$name', '$shop', '$address', '$phone_number', '$business_type', '$shoplogo', '$newFilename', '$password', '$email')";
                    $result = mysqli_query($this->db, $query);
                    if ($result) {
                        return json_encode(array('data' => 'success', 'msg' => 'Data inserted successfully!'));
                    } else {
                        return json_encode(array('data' => 'fail', 'msg' => 'Error inserting data.'));
                    }
                } else {
                    return json_encode(array('data' => 'fail', 'msg' => 'Error uploading files.'));
                }
            }
        } else {
            return json_encode(array('data' => 'fail', 'msg' => $error_array));
        }
    }

    function insert_products()
    {
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $error_array = array();
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

        $is_image_update  = false;
        if (isset($_FILES["p_image"]["name"][0]) && !empty($_FILES["p_image"]["name"][0])) {
            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
            $maxSize = 5 * 1024 * 1024;  // 5MB in bytes
            $folder = "assets/img/product_img/";

            if (!is_dir($folder)) {
                $mkdir = mkdir($folder, 0777, true);
                if (!$mkdir) {
                    $response_data = array('data' => 'fail', 'msg' => 'Failed to create directory for image upload.');
                    return json_encode($response_data);
                }
            }
            $uploadedFiles = [];

            foreach ($_FILES["p_image"]["name"] as $key => $filename) {
                $tmpfile = $_FILES["p_image"]["tmp_name"][$key];
                $file = $_FILES['p_image'];
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
        } else {
            if (empty($product_id)) {
                $error_array['p_image'] = "Please select image";
            }
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

                $query = "INSERT INTO products (title, category, qty, sku, minprice, maxprice, p_image, product_img_alt, p_tag, p_description, user_id) 
                    VALUES ('$product_name', '$select_catagory', '$qty', '$sku', '$min_price', '$max_price', '$newFilename', '$product_image_alt', '$p_tag', '$p_description', '$user_id')";
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
                if ($is_image_update) {
                    $query = "UPDATE products SET title = '$product_name', category = '$select_catagory', qty = '$qty', p_image='$newFilename', sku = '$sku', minprice = '$min_price',
                    maxprice = '$max_price', product_img_alt = '$product_image_alt', p_tag = '$p_tag', p_description = '$p_description'";
                } else {
                    $query = "UPDATE products SET title = '$product_name', category = '$select_catagory', qty = '$qty', sku = '$sku', minprice = '$min_price',
                    maxprice = '$max_price', product_img_alt = '$product_image_alt', p_tag = '$p_tag', p_description = '$p_description'";
                }

                if (!empty($uploadedFiles)) {
                    $uploadedFilenames = implode(',', $uploadedFiles);
                    $query .= ", p_image = '$uploadedFilenames'";
                }

                $query .= " WHERE product_id  = $product_id";
                $result = $this->db->query($query);

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

    function add_customer() {
        $error_array = array();
        $id = (isset($_POST['id']) && $_POST['id'] !== '') ? $_POST['id'] : '';
        $is_image = false;

        if (isset($_FILES["c_image"]) && $_FILES["c_image"]["name"] != "") {
            $allowedExtensions = ['jpg', 'png', 'jpeg', 'gif', 'svg', 'webp'];
            $maxSize = 5 * 1024 * 1024;
            $filename = $_FILES["c_image"]["name"];
            $tmpfile = $_FILES["c_image"]["tmp_name"];
            $file = $_FILES['c_image'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $newFilename = time() . '.' . $extension;
            $folder = "assets/img/customer/";
            $fullpath = $folder . $newFilename;
            if (empty($filename)) {
                $error_array['c_image'] = "Please upload your image.";
            }
            if (!in_array(strtolower($extension), $allowedExtensions)) {
                $error_array['c_image'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
            }
            if ($file['size'] > $maxSize) {
                $error_array['c_image'] = "File size must be 5MB or less.";
            }
            
            $is_image = true;
        } else {
            $error_array['c_image'] = "Please upload your image.";
        }
        
        if (empty($_POST['name'])) {
            $error_array['name'] = "Please enter customer name";
        }
        if (empty($_POST['email'])) {
            $error_array['email'] = "Please enter customer email.";
        }
        if (empty($_POST['contact'])) {
            $error_array['contact'] = "Please enter customer contact number.";
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
        if (empty($error_array)) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];


            if ($id == '') {
                if ($is_image) {
                    if (move_uploaded_file($tmpfile, $fullpath)) {
                        if (isset($_SESSION['current_user']['user_id'])) {
                            $user_id = $_SESSION['current_user']['user_id'];
                            $query = "INSERT INTO customer (`name`,`email`,`contact`,`c_image`,`city`,`state`,`address`,`user_id`) 
                            VALUES ('$name', '$email','$contact', '$newFilename','$city', '$state','$address','$user_id')";
                            $result = $this->db->query($query);
                        }
                    } else {
                        $error_array['c_image'] = "Error moving uploaded file.";
                    }
                }
            } else {
                $query = "UPDATE customer SET name = '$name', email = '$email', contact = '$contact',city='$city', state='$state', address = '$address' WHERE customer_id = $id";

                if ($is_image) {
                    if (move_uploaded_file($tmpfile, $fullpath)) {
                        $query = "UPDATE customer SET name = '$name', email = '$email', contact = '$contact', 
                        c_image = '$newFilename',city='$city', state='$state', address = '$address' WHERE customer_id = $id";
                    } else {
                        $error_array['c_image'] = "Error moving uploaded file.";
                    }
                }

                $result = $this->db->query($query);
            }
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => $id == '' ? 'Customer inserted successfully!' : 'Customer data updated', "updated_customer_id" => $id);
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error inserting/updating in the database");
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong");
        }

        return json_encode($response_data);
    }

    function listgallary() {
        global $NO_IMAGE;
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $userid = '';
            if ($_SESSION['current_user']['role'] == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userid = "WHERE user_id =$user_id";
            }
            $query = "SELECT * FROM products  $userid";
            $result = $this->db->query($query);
            $output = "";
        }
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $image = $row["p_image"];
                    $imagePath = "../admin1/assets/img/product_img/" . $image;
                    $noimagePath = $NO_IMAGE;
                    $decodedPath = htmlspecialchars_decode(
                        (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                    );;
                    $output .= '<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">';
                    $output .= '  <div class="card card-blog card-plain mb-4">';
                    $output .= '    <div class="position-relative">';
                    $output .= '      <a class="d-block border-radius-xl product_imagebox">';
                    $output .= '        <img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg mb-6 product_main_image">';
                    $output .= '      </a>';
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

    function invoice(){
        $response_data = ['data' => 'fail', 'msg' => 'An unknown error occurred'];
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $error_array = [];
        $newFilename = "";
        $is_image = false;
        if (isset($_FILES["i_image"]) && $_FILES["i_image"]["name"] != "") {
            $allowedExtensions = ['jpg', 'png', 'jpeg', 'gif', 'svg', 'webp'];
            $maxSize = 5 * 1024 * 1024;
            $filename = $_FILES["i_image"]["name"];
            $tmpfile = $_FILES["i_image"]["tmp_name"];
            $file = $_FILES['i_image'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $newFilename = time() . '.' . $extension;
            $fileName = $_FILES['i_image']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $folder = "assets/img/invoice_img/";
            $fullpath = $folder . $newFilename;


            if (!is_dir($folder) && !mkdir($folder, 0777, true) && !is_dir($folder)) {
                return json_encode(['data' => 'fail', 'msg' => 'Failed to create directory for image upload.']);
            }
            if (!in_array($fileExtension, $allowedExtensions)) {
                $error_array['i_image'] = "Unsupported file format. Only JPG, JPEG, GIF, SVG, PNG, and WEBP formats are allowed.";
            }
            if ($file['size'] > $maxSize) {
                $error_array['i_image'] = "File size must be 5MB or less.";
            }
            if (empty($filename)) {
                $error_array['i_image'] = "Please upload your image.";
            }
            $is_image = true;
        }else{
            $error_array['i_image'] = "Please upload your image.";
        }
        if (empty($_POST['i_name'])) $error_array['i_name'] = "Please enter invoice name.";
        if (empty($_POST['bill_no'])) $error_array['bill_no'] = "Please enter bill number.";
        if (empty($_POST['ship_to'])) $error_array['ship_to'] = "Please enter shipping address.";
        if (empty($_POST['date'])) $error_array['date'] = "Please enter date.";
        if (empty($_POST['terms'])) $error_array['terms'] = "Please enter payment terms.";
        if (empty($_POST['due_date'])) $error_array['due_date'] = "Please enter due date.";
        if (empty($_POST['po_number'])) $error_array['po_number'] = "Please enter PO number.";


        if (empty($error_array)) {
            $i_name = $_POST['i_name'];
            $bill_no = $_POST['bill_no'];
            $ship_to = $_POST['ship_to'];
            $date = $_POST['date'];
            $terms = $_POST['terms'];
            $due_date = $_POST['due_date'];
            $po_number = $_POST['po_number'];
            $total = isset($_POST['total']) ? $_POST['total'] : 0;
            $amount_paid = isset($_POST['amount_paid']) ? $_POST['amount_paid'] : 0;
            $balance_due = isset($_POST['balance_due']) ? $_POST['balance_due'] : 0;
            $user_id = $_SESSION['current_user']['user_id'];
            if ($is_image && !move_uploaded_file($tmpfile, $fullpath)) {
                $error_array['i_image'] = "Error moving uploaded file.";
            }
            if (empty($error_array)) {
                if (empty($id)) {
                    $query = "INSERT INTO invoice (`i_image`, `i_name`, `bill_no`, `ship_to`, `date`, `terms`, `due_date`, `po_number`, `user_id`, `total`, `amount_paid`, `balance_due`)
                              VALUES ('$newFilename', '$i_name', '$bill_no', '$ship_to', '$date', '$terms', '$due_date', '$po_number', '$user_id', '$total', '$amount_paid', '$balance_due')";
                } else {
                    $query = "UPDATE invoice SET i_name = '$i_name', bill_no = '$bill_no', ship_to = '$ship_to', date = '$date', terms = '$terms', due_date = '$due_date',
                              po_number = '$po_number', total = '$total', amount_paid = '$amount_paid', balance_due = '$balance_due'" .
                        ($is_image ? ", i_image = '$newFilename'" : "") .
                        " WHERE invoice_id = $id";
                }

                $result = $this->db->query($query);
                if ($result) {
                    $last_id = empty($id) ? $this->db->insert_id : $id;
                    $items = $_POST['item'];
                    $quantities = $_POST['quantity'];
                    $rates = $_POST['rate'];
                    $values = [];
                    foreach ($items as $index => $item) {
                        $quantity = !empty($quantities[$index]) ? $quantities[$index] : null;
                        $rate = !empty($rates[$index]) ? $rates[$index] : null;
                        $amount = $quantity * $rate;
                        if (empty($item)) {
                            $error_array[$index]['item'] = "Please enter item.";
                        }
                        if (empty($quantity) || !is_numeric($quantity)) {
                            $error_array[$index]['quantity'] = "Please enter valid quantity.";
                        }
                        if (empty($rate) || !is_numeric($rate)) {
                            $error_array[$index]['rate'] = "Please enter valid rate.";
                        }
                        if ($amount <= 0) {
                            $error_array[$index]['amount'] = "Amount is not valid.";
                        }

                        if (empty($error_array[$index])) {
                            $item = $this->db->real_escape_string($item);
                            $quantity = $this->db->real_escape_string($quantity);
                            $rate = $this->db->real_escape_string($rate);
                            $amount = $this->db->real_escape_string($amount);
                            $user_id = $this->db->real_escape_string($user_id);
                            $last_id = $this->db->real_escape_string($last_id);
                            $values[] = "('$item', '$quantity', '$rate', '$amount', '$user_id', '$last_id')";
                        }
                    }
                    if (!empty($values)) {
                        if (empty($id)) {
                            $sql1 = "INSERT INTO invoice_item (item, quantity, rate, amount, user_id, invoice_id) VALUES " . implode(", ", $values);
                        } else {
                            $sql1 = "UPDATE invoice_item  SET item='$item',quantity='$quantity',rate='$rate',amount='$amount'where  invoice_id =  $id";
                        }
                    }
                    $res1 = $this->db->query($sql1);
                    if ($res1) {
                        $response_data = ['data' => 'success', 'msg' => 'Items successfully added'];
                    } else {
                        $response_data = ['data' => 'fail', 'msg' => 'Failed to add items'];
                    }


                    $response_data = ['data' => 'success', 'msg' => empty($id) ? 'Invoice inserted successfully' : 'Invoice updated successfully'];
                } else {
                    $response_data = ['data' => 'fail', 'msg' => 'Error inserting/updating invoice in database'];
                }
            } else {
                $response_data = ['data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong."];
            }
        } else {
            $response_data = ['data' => 'fail', 'msg' => $error_array];
        }

        return json_encode($response_data);
    }

    function isValidYouTubeURL($url){
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
            $error_array['video_title'] = "Please enter the video title.";
        }
        if (isset($_POST['category']) && $_POST['category'] == '') {
            $error_array['category'] = "Please select the video catagory.";
        }
        if (isset($_POST['youtube_shorts']) && $_POST['youtube_shorts'] == '') {
            $error_array['youtube_shorts'] = "Please enter the youTube shorts link.";
        } elseif (isset($_POST['youtube_shorts']) && !$this->isValidYouTubeURL($_POST['youtube_shorts'])) {
            $error_array['youtube_shorts'] = "Please enter the valid YouTube shorts link.";
        }
        if (isset($_POST['youtube_vlogs']) && $_POST['youtube_vlogs'] == '') {
            $error_array['youtube_vlogs'] = "Please enter the youTube vlogs link.";
        } elseif (isset($_POST['youtube_vlogs']) && !$this->isValidYouTubeURL($_POST['youtube_vlogs'])) {
            $error_array['youtube_vlogs'] = "Please enter the valid YouTube vlogs link.";
        }
        $this->isValidYouTubeURL($_POST['youtube_shorts']);
        if (empty($error_array)) {
            $video_title = (isset($_POST['video_title']) && $_POST['video_title'] !== '') ? $_POST['video_title'] : '';
            $video_title = str_replace("'", "\'", $video_title);
            $category = (isset($_POST['category']) && $_POST['category'] !== '') ? $_POST['category'] : '';
            $youtube_shorts = (isset($_POST['youtube_shorts']) && $_POST['youtube_shorts'] !== '') ? $_POST['youtube_shorts'] : '';
            $youtube_vlogs = (isset($_POST['youtube_vlogs']) && $_POST['youtube_vlogs'] !== '') ? $_POST['youtube_vlogs'] : '';

            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO videos (title,category,short_link,vlog_link,user_id) VALUES ('$video_title', '$category','$youtube_shorts','$youtube_vlogs','$user_id')";
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

        if ($_FILES["blog_image"]["name"] != "" && $id != "" || isset($_FILES["blog_image"]["name"]) && isset($_FILES["blog_image"]["name"]) != '' && $id == "") {

            $allowedExtensions = ['jpg', 'jpeg', 'gif', 'svg', 'png', 'webp'];
            $filename = isset($_FILES["blog_image"]["name"]) ? $_FILES["blog_image"]["name"] : '';
            $tmpfile = isset($_FILES["blog_image"]["tmp_name"]) ? $_FILES["blog_image"]["tmp_name"] : '';
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $newFilename = time() . '.' . $extension;
            $fileName = $_FILES['blog_image']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $folder = "assets/img/blog_img/";
            $fullpath = $folder . $newFilename;
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
            if (empty($filename)) {
                $error_array['blog_image'] = "Please upload the blog image.";
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
        if (isset($_POST['heading']) && $_POST['heading'] == '') {
            $error_array['heading'] = "Please enter the heading.";
        }
        if (isset($_POST['sub_heading']) && $_POST['sub_heading'] == '') {
            $error_array['sub_heading'] = "Please enter the sub heading.";
        }
        if (isset($_POST['banner_text']) && $_POST['banner_text'] == '') {
            $error_array['banner_text'] = "Please enter the banner text.";
        }
        if (isset($_POST['banner_btn_link']) && $_POST['banner_btn_link'] == '') {
            $error_array['banner_btn_link'] = "Please enter the banner button link.";
        } elseif (isset($_POST['banner_btn_link']) && !$this->isValidURL($_POST['banner_btn_link'])) {
            $error_array['banner_btn_link'] = "Please enter the valid banner button link.";
        }
        if (empty($error_array)) {
            if (move_uploaded_file($tmpfile, $fullpath)) {
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
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
        $response = json_encode($response_data);
        return $response;
    }

    function insert_market(){
        $error_array = array();
        if (isset($_POST['shop_name']) && $_POST['shop_name'] == '') {
            $error_array['shop_name'] = "Please select the shop.";
        }

        if (empty($error_array)) {

            $shop_name = (isset($_POST['shop_name']) && $_POST['shop_name'] !== '') ? $_POST['shop_name'] : '';
            $shop_name = str_replace("'", "\'", $shop_name);

            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO famous_markets (shop_name, user_id) VALUES ('$shop_name', '$user_id')";
                $result = $this->db->query($query);
                if ($result) {
                    $response_data = array('data' => 'success', 'msg' => 'Market inserted successfully!');
                } else {
                    $response_data = array('data' => 'fail', 'msg' => "Error inserting market");
                }
            } else {
                $response_data = array('data' => 'fail', 'msg' => "User not logged in");
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong");
        }
        return json_encode($response_data);
    }

    function insert_brousetxt() {
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
                    } else {
                        $response_data = array('data' => 'fail', 'msg' => "Error");
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
                }
                if ($result) {
                    $response_data = array('data' => 'success', 'msg' => 'Offers Form inserted successfully!');
                } else {
                    $response_data = array('data' => 'fail', 'msg' => "Error");
                }
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
        $response = json_encode($response_data);
        return $response;
    }

    function insert_paragraph(){
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
                } else {
                    $response_data = array('data' => 'fail', 'msg' => "Error");
                }
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
        $response = json_encode($response_data);
        return $response;
    }

    function insert_faq(){

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
            }
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'FAQ inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
        $response = json_encode($response_data);
        return $response;
    }

    function insert_review(){

        $error_array = array();

        if (isset($_POST['description']) && $_POST['description'] == '') {
            $error_array['description'] = "Please enter the shop description.";
        }

        if (isset($_POST['shopname']) && $_POST['shopname'] == '') {
            $error_array['shopname'] = "Please enter the shop name.";
        }

        if (isset($_POST['review']) && $_POST['review'] == '') {
            $error_array['review'] = "Please give the review.";
        }
        if (empty($error_array)) {

            $description = (isset($_POST['description']) && $_POST['description'] !== '') ? $_POST['description'] : '';
            $description = str_replace("'", "\'", $description);

            $shopname = (isset($_POST['shopname']) && $_POST['shopname'] !== '') ? $_POST['shopname'] : '';
            $shopname = str_replace("'", "\'", $shopname);

            $review = (isset($_POST['review']) && $_POST['review'] !== '') ? $_POST['review'] : '';

            if (isset($_SESSION['current_user']['user_id'])) {
                $user_id = $_SESSION['current_user']['user_id'];
                $query = "INSERT INTO marketreviews (description,shopname,review,user_id) VALUES ('$description','$shopname','$review','$user_id')";
                $result = $this->db->query($query);
            }
            if ($result) {
                $response_data = array('data' => 'success', 'msg' => 'Data inserted successfully!');
            } else {
                $response_data = array('data' => 'fail', 'msg' => "Error");
            }
        } else {
            $response_data = array('data' => 'fail', 'msg' => $error_array, 'msg_error' => "Oops! Something went wrong ");
        }
        $response = json_encode($response_data);
        return $response;
    }

    function productlisting(){
        global $NO_IMAGE;
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $sort = isset($_POST['sortValue']) ? $_POST['sortValue'] : '';
        if (isset($_SESSION['current_user']) && isset($_SESSION['current_user']['user_id'])) {
            $search_value = isset($_POST['search_text']) ? $_POST['search_text'] : '';
            $limit = 12;
            $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
            $offset = ($page - 1) * $limit;
            $userid_clause = '';
            if ($_SESSION['current_user']['role'] == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userid_clause = "AND user_id = $user_id";
            }
            // Sorting logic using switch case
                $sort_query = '';  // Default no sorting
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
               if ($total_records > $limit) { 
                  $sql = "SELECT * FROM products WHERE title LIKE '%$search_value%' $userid_clause $sort_query LIMIT $offset, $limit";
                } 
               else { 
                  $sql = "SELECT * FROM products WHERE title LIKE '%$search_value%' $userid_clause $sort_query";
                }
                $result = $this->db->query($sql);
                $output = "";
                $pagination = "";
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
                    $output .= '<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">';
                    $output .= '  <div class="card card-blog card-plain image-container mb-4">';
                    $output .= '    <div class="position-relative">';
                    $output .= '      <a class="d-block border-radius-xl mt-5 product_imagebox" data-bs-toggle="modal" data-bs-target="#staticBackdrop-' . $product_id . '">';
                    $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl product_main_image">';
                    $output .= '      </a>';

                    $output .= '<button type="button" class="btn btn-primary mt-4 productallbtn" data-bs-toggle="modal" data-bs-target="#staticBackdrop-' . $product_id . '">view all</button>';

                    $output .= '    </div>';
                    $output .= '    <div class="card-body px-1 pb-0">';
                    $output .= '      <a href="#">';
                    $output .= '        <h5>' . $title . '</h5>';
                    $output .= '      </a>';
                    $output .= '      <div class="d-flex justify-content-between mb-3">';
                    $output .= '         <div class="ms-1 d-inline fs-6">';
                    $output .= '           <span class="text-decoration-line-through price-line-through"><h6 class="fw-normal d-inline fs-6">Rs:</h6>' . $maxPrice . '</span>';
                    $output .= '           <span class="fs-5">&nbsp;<h6 class="fw-normal d-inline fs-5">Rs:</h6>' . $minPrice . '</span>';
                    $output .= '         </div>';
                    $output .= '        <div class="ms-auto text-end">';
                    $output .= '<div class="modal fade" id="staticBackdrop-' . $product_id . '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel-' . $product_id . '" aria-hidden="true">';
                    $output .= ' <div class="modal-dialog">';
                    $output .= ' <div class="modal-content">';
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
                    $output .= '<img src="' . $decodedPath . '" alt="Product Image" class="img-fluid shadow border-radius-xl modal_img">';
                    $output .= '<div class="position-absolute top-50 start-50 translate-middle">';
                    $output .= '<i data-id="' . $row["product_id"] . '" class="fa fa-trash text-secondary delete_shadow me-3 delete btn btn-light shadow-sm rounded-0" data-delete-type="product" aria-hidden="true"></i>';
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

                                $output .= '<button data-id="' . $row_image["product_image_id"] . '" class="btn btn-light position-absolute top-50 start-50 translate-middle cursor-pointer delete" data-delete-type="product_images" aria-label="Delete">';
                                $output .= '<i class="fa fa-trash"></i>';
                                $output .= '</button>';
                                $output .= '</div>';
                            }
                        }
                        $output .= ' </div>';
                    } else {
                        $output .= '<div class="image modalgif ">';
                        $output .= '<img src=" ../admin1/assets/img/noimg.gif" class="modalgif_img">';
                        $output .= '</div>';
                    }
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '<div>';
                    $output .= '<i data-id="' . $row["product_id"] . '" class="fa fa-trash text-secondary  delete_shadow  me-1 delete delete_btn btn-light shadow-sm rounded-0" data-delete-type="product" aria-hidden="true"></i>';
                    $output .= '    <a href="product-form.php?id=' . $row['product_id'] . '" class="edit_btn btn-light shadow-sm rounded-0"><i data-id="' . $row["product_id"] . '" class="fa fa-pen text-secondary delete_shadow icon-size" aria-hidden="true"></i></a>';
                    $output .= '</div>';
                    $output .= '        </div>';
                    $output .= '      </div>';
                    $output .= '    </div>';
                    $output .= '  </div>';
                }
                $response_data = array(
                    'data' => 'success',
                    'outcome' => $output,
                    'pagination' => isset($pagination) ? $pagination : '',
                    'pagination_needed' => ($total_records > $limit) ? true : false // Determine if pagination is needed
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
                        $active_class = ($i == $page) ? 'active' : '';  // Determine active class
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

    function invoicelisting()
    {
        global $NO_IMAGE;
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $output = array();
            $user_id = $_SESSION['current_user']['user_id'];
            $query = "SELECT * FROM invoice WHERE user_id = '$user_id'";
            $result = $this->db->query($query);

            $output = "";
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $image = $row["i_image"];
                        $imagePath = "../admin1/assets/img/invoice_img/" . $image;

                        $noimagePath = $NO_IMAGE;
                        $decodedPath = htmlspecialchars_decode(
                            (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                        );
                        $output .= '<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">';
                        $output .= '  <div class="card card-blog card-plain mb-4">';
                        $output .= '    <div class="position-relative">';
                        $output .= '      <a class="d-block product_imagebox border-radius-xl">';
                        $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl product_main_image">';
                        $output .= '      </a>';
                        $output .= '    </div>';
                        $output .= '    <div class="card-body px-1 pb-0">';
                        $output .= '      <a href="#">';
                        $output .= '      </a>';
                        $output .= '      <div class=" justify-content-between mb-3">';
                        $output  .= '         <div class="ms-1 fs-6"><span class=" "><h6 class="fw-normal d-inline fs-6">invoice name:</h6>' . $row['i_name'] . '</div>';
                        $output  .= '         <div class="ms-1 fs-6"><span class=" "><h6 class="fw-normal d-inline fs-6">Payment Terms :</h6>' . $row['terms'] . '</div>';
                        $output  .= '         <div class="ms-1 fs-6"><span class=" "><h6 class="fw-normal d-inline fs-6">total :</h6>' . $row['total'] . '</div>';
                        $output  .= '         <div class="ms-1 fs-6"><span class=" "><h6 class="fw-normal d-inline fs-6">amount paid :</h6>' . $row['amount_paid'] . '</div>';
                        $output  .= '         <div class="ms-1 fs-6"><span class=" "><h6 class="fw-normal d-inline fs-6">balance :</h6>' . $row['balance_due'] . '</div>';
                        $output .= '<div class="ms-auto text-end">';
                        $output .= '    <div class="" role="">';
                        $output .= '        <i data-id="' . $row["invoice_id"] . '" class="fa fa-trash text-secondary  delete_shadow  me-1 delete delete_btn btn-light shadow-sm rounded-0" data-delete-type="invoice" aria-hidden="true"></i>';
                        $output .= '        <a href="invoice.php?id=' . $row['invoice_id'] . '" class=" edit_btn delete_shadow btn-light shadow-sm rounded-0">';
                        $output .= '            <i data-id="' . $row["invoice_id"] . '" class="fa fa-pen " aria-hidden="true"></i>';
                        $output .= '        </a>';
                        $output .= '    </div>';
                        $output .= '</div>';
                        $output .= '      </div>';
                        $output .= '    </div>';
                        $output .= '  </div>';
                        $output .= '</div>';
                    }
                    $response_data = array('data' => 'success', 'outcome' => $output, 'profiledata' => $row);
                } else {
                    $response_data = array('data' => 'fail', 'outcome' => "No data found");
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }
    function customerlisting(){
        global $NO_IMAGE;
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $query = "SELECT * FROM customer WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            if ($result && $result->num_rows > 0) {
                $output = '<div class="container-fluid p-3 d-flex flex-wrap justify-content-start">';
                while ($row = $result->fetch_assoc()) {
                    $profiledata[] = $row;
                    $image = $row["c_image"];
                    $imagePath = "../admin1/assets/img/customer/" . $image;
                    $noimagePath = $NO_IMAGE;
                    $decodedPath = htmlspecialchars_decode(
                        (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                    );
                    $output .= '<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">';
                    $output .= '  <div class="card card-blog card-plain mb-4 m-3">';
                    $output .= '    <div class="position-relative">';
                    $output .= '      <a class="d-block product_imagebox border-radius-xl">';
                    $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl product_main_image">';
                    $output .= '      </a>';
                    $output .= '    </div>';
                    $output .= '    <div class="card-body px-1 pb-0">';
                    $output .= '      <a href="#">';
                    $output .= '      </a>';
                    $output .= '      <div class=" justify-content-between mb-3">';
                    $output  .= '         <div class="ms-1 fs-6"><span class=" "><h6 class="fw-bold d-inline fs-6"> name:</h6> ' . $row['name'] . '</div>';
                    $output  .= '         <div class="ms-1 fs-6"><span class=" "><h6 class="fw-bold d-inline fs-6">email :</h6> ' . $row['email'] . '</div>';
                    $output  .= '         <div class="ms-1 fs-6"><span class=" "><h6 class="fw-bold d-inline fs-6">contact:</h6> ' . $row['contact'] . '</div>';
                    $output  .= '         <div class="ms-1 fs-6"><span class=" "><h6 class="fw-bold  d-inline fs-6">address :</h6> ' . $row['address'] . '</div>';

                    $output .= '<div class="ms-auto text-end">';
                    $output .= '    <div class="" >';
                    $output .= '        <i data-id="' . $row["customer_id"] . '" class="fa fa-trash text-secondary  delete_shadow  me-1 delete delete_btn btn-light shadow-sm rounded-0" data-delete-type="customer" aria-hidden="true"></i>';
                    $output .= '        <a href="customer.php?id=' . $row['customer_id'] . '" class=" edit_btn delete_shadow btn-light shadow-sm rounded-0">';
                    $output .= '            <i data-id="' . $row["customer_id"] . '" class="fa fa-pen " aria-hidden="true"></i>';
                    $output .= '        </a>';
                    $output .= '    </div>';
                    $output .= '</div>';
                    $output .= '      </div>';
                    $output .= '    </div>';
                    $output .= '  </div>';
                    $output .= '</div>';
                }
                $output .= '</div>';
                $response_data = array('data' => 'success', 'outcome' => $output, 'profiledata' => $profiledata);
            } else {
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
            return json_encode($response_data);
        }
    }

    function listprofile()
    {
        global $NO_IMAGE;
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $output = array();
            $user_id = $_SESSION['current_user']['user_id'];
            $query = "SELECT * FROM users WHERE user_id = '$user_id'";
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
                    '<div class="drop-zone form-control">
                    <span class="pro-zone__prompt" id="dragfile" style="display: none;">Drop File Here Or Click To Upload</span>
                    <input type="file" name="shop_logo" class="drop-zone__input">
                    <div class="drop-zone__thumb">
                        <div class="img-wrapper">
                            <img src="' . $decodedPath . '" class="picture__img">
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
                $output['deatils'] = '<li class="list-group-item border-0 ps-0 pb-0 text-center mt-4">
                    <a class="mb-0 ps-1 pe-2 py-0 mt-3" href="javascript:void(0);">
                        <div class="position-relative">
                            <img src="' . $decodedPath . '" alt="profile_image" class="profile-image border-radius-lg shadow-sm mb-4">
                            <div class="position-absolute top-0 custom-position" data-bs-toggle="modal" data-bs-target="#profileImageUpdate">
                                <i class="fa fa-pen text-primary cursor-pointer mt-3"></i>
                            </div>
                        </div>
                    </a>
                    <div class="modal fade" id="profileImageUpdate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="profileImageUpdate" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="profileUpdate">Product Images</h1>
                                    <button type="button" class="btn-close text-danger fs-2 mb-3" data-bs-dismiss="modal" aria-label="Close">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" id="profileImageSave" enctype="multipart/form-data" method="POST">
                                        <div class="mb-3">
                                            <label for="p-image" class="font-weight-normal">Upload Profile Image</label>
                                            ' . $previewImage . '
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
                <div class="mx-auto text-center">
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
        $response_data = array('data' => 'fail', 'msg' => "Error");
        $sort = isset($_POST['sortValue']) ? $_POST['sortValue'] : '';
        if (isset($_SESSION['current_user']['user_id'])) {
            $limit = 12;
            $page = isset($_POST['page']) ? (int)$_POST['page'] : 1;
            $offset = ($page - 1) * $limit;
            $search_value = isset($_POST['search_text']) ? $_POST['search_text'] : '';
            $userid_clause = '';
            if ($_SESSION['current_user']['role'] == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userid_clause = "AND user_id = $user_id";
            }
                $sort_query = '';  // Default no sorting
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
               if ($total_records > $limit) { 
                  $sql = "SELECT * FROM blogs WHERE title LIKE '%$search_value%' $userid_clause $sort_query LIMIT $offset, $limit";
                } 
               else { 
                  $sql = "SELECT * FROM blogs WHERE title LIKE '%$search_value%' $userid_clause $sort_query";
                }
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
                    $output .= '<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">';
                    $output .= '  <div class="card card-blog card-plain mb-4">';
                    $output .= '    <div class="position-relative">';
                    $output .= '      <a class="d-block  border-radius-xl blog_imagebox" >';
                    $output .= '        <img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-xl mt-3  product_main_image">';
                    $output .= '      </a>';
                    $output .= '    </div>';
                    $output .= '    <div class="card-body px-1 pb-0">';
                    $output .= '      <a href="#">';
                    $output .= '        <h5>' . $title . '</h5>';
                    $output .= '      </a>';
                    $output .= '      <div class="d-flex justify-content-between mb-3">';
                    
                    $output .= '<div class="ms-auto text-end">';
                    $output .= '    <div class="" role="">';
                    $output .= '        <i data-id="' . $row["blog_id"] . '" class="fa fa-trash text-secondary  delete_shadow  me-1 delete delet_btn btn-light shadow-sm rounded-0" data-delete-type="blog" aria-hidden="true"></i>';
                    $output .= '        <a href="blog-form.php?id=' . $row['blog_id'] . '" class="edit_btn delete_shadow btn-light shadow-sm rounded-0">';
                    $output .= '            <i data-id="' . $row["blog_id"] . '" class="fa fa-pen " aria-hidden="true"></i>';
                    $output .= '        </a>';
                    $output .= '    </div>';
                    $output .= '</div>';
                    $output .= '      </div>';
                    $output .= '    </div>';
                    $output .= '  </div>';
                    $output .= '</div>';
                }
                $response_data = array(
                    'data' => 'success',
                    'outcome' => $output,
                    'pagination' => isset($pagination) ? $pagination : '',  // Ensure 'pagination' is always set
                    'pagination_needed' => ($total_records > $limit) ? true : false // Determine if pagination is needed
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
                            $active_class = ($i == $page) ? 'active' : '';  // Determine active class
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

    function videolisting()
    {
        $response_data = array('data' => 'fail', 'msg' => "Error");

        $sort = isset($_POST['sortValue']) ? $_POST['sortValue'] : '';
        if (isset($_SESSION['current_user']) && isset($_SESSION['current_user']['user_id'])) {
            $search_value = isset($_POST['search_text']) ? $_POST['search_text'] : '';
            $limit = 12;
            $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
            $offset = ($page - 1) * $limit;
            $userid_clause = '';
            if ($_SESSION['current_user']['role'] == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userid_clause = "AND user_id = $user_id";
            }


            // Sorting logic
            // Sorting logic using switch case
            $sort_query = '';  // Default no sorting
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
                    // Add featured sorting logic if necessary
                    $sort_query = 'ORDER BY featured DESC';
                    break;
                default:
                    // Default behavior if no sorting option is selected
                    break;
            }
            $query = "SELECT COUNT(*) AS total FROM videos WHERE title LIKE '%$search_value%' $userid_clause";
            $res_count = $this->db->query($query);
            $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
            if ($total_records > $limit) {
                $sql = "SELECT * FROM videos WHERE title LIKE '%$search_value%' $userid_clause $sort_query LIMIT $offset, $limit";
            } else {
                $sql = "SELECT * FROM videos WHERE title LIKE '%$search_value%' $userid_clause $sort_query";
            }
            $result = $this->db->query($sql);
            $output = "";
            $pagination = "";
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
                    $output .= '<iframe width="100%" height="500px" src="' . $link . '" class="border-radius-xl" title="' . $title . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                    $output .= '</a>';
                    $output .= '</div>';
                    $output .= '<div class="card-body px-1 pb-0">';
                    $output .= '<div class="d-flex justify-content-between mb-3">';
                    $output .= '<div class="ms-auto text-end">';
                    $output .= '    <i data-id= "' . $row["video_id"] . '" class="fa fa-trash text-secondary  delete_shadow  me-1 delete delete_btn btn-light shadow-sm rounded-0" data-delete-type="video" aria-hidden="true"></i>';
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
        $query = "SELECT COUNT(*) AS total FROM videos WHERE title LIKE '%$search_value%' $userid_clause";
        $res_count = $this->db->query($query);
        $total_records = $res_count ? $res_count->fetch_assoc()['total'] : 0;
        if ($total_records > $limit) {
            $total_pages = ceil($total_records / $limit);

            $pagination .= '<div class="pagination" id="dataPagination" data-routine="videolisting">';
            for ($i = 1; $i <= $total_pages; $i++) {
                $active_class = ($i == $page) ? 'active' : ''; // Check if the current page is active
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
        if (isset($_SESSION['current_user']['user_id'])) {
            $userid = '';
            if ($_SESSION['current_user']['role'] == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userid = "WHERE user_id = $user_id";
            }
            $query = "SELECT * FROM videos $userid";
            $result = $this->db->query($query);
            $output = "";
        }

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_array($result)) {
                    $link = $row["short_link"];
                    $title = $row['title'];
                    $video_id = $row['video_id'];
                    $toggleactive = ($row['toggle'] == "1") ? "checked" : "";
                    $output .= '<div class="col-xl-3 col-md-6 mb-xl-0 mb-4">';
                    $output .= '<div class="card card-blog card-plain mb-4">';
                    $output .= '<div class="position-relative">';
                    $output .= '<a class="border-radius-xl">';
                    $output .= '<iframe width="100%" height="500px" src="' . $link . '" class="border-radius-xl" title="' . $title . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                    $output .= '</a>';
                    $output .= '</div>';
                    $output .= '<div class="card-body px-1 pb-0">';
                    $output .= '<div class="d-flex justify-content-between mb-3">';
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

        $response = json_encode($response_data);
        return $response;
    }


    function offerlisting(){
        global $NO_IMAGE;
        $response_data = array('data' => 'fail', 'msg' => "Error");
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];

            $query = "SELECT * FROM offers WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output = "";
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
                    $output .= '<div class="col-xl-6 col-md-6 mb-xl-0 mb-2">';
                    $output .= '<div class="card card-blog card-plain mb-4">';
                    $output .= '<div class="position-relative">';
                    $output .= '<a class="d-block border-radius-xl offer_imgbox">';
                    $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg mb-3 mt-3 product_main_image" >';
                    $output .= '</a>';
                    $output .= '</div>';
                    $output .= '<div class="d-flex justify-content-between mb-3">';
                    $output .= '<div class="position-absolute top-2 end-0 mt-3 me-3">';
                    $output .= '    <i data-id= "' . $row["offer_id"] . '" class="fa fa-trash text-secondary  delete_shadow  me-1 delete btn delete_btn btn-light shadow-sm rounded-0" data-delete-type="offer" aria-hidden="true"></i>';
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
        if (isset($_SESSION['current_user']['user_id'])) {
            // $categories = [
            //     "1" => "Armwear",
            //     "2" => "Badges",
            //     "3" => "Belts",
            //     "4" => "Children's clothing",
            //     "5" => "Clothing brands by type",
            //     "6" => "Coats",
            //     "7" => "Dresses",
            //     "8" => "Footwear",
            //     "9" => "Gowns",
            //     "10" => "Handwear",
            //     "11" => "Hosiery",
            //     "12" => "Jackets",
            //     "13" => "Jeans by type",
            //     "14" => "Knee clothing",
            //     "15" => "Masks",
            //     "16" => "Neckwear",
            //     "17" => "One-piece suits",
            //     "18" => "Outerwear",
            //     "19" => "Ponchos",
            //     "20" => "Robes and cloaks",
            //     "21" => "Royal attire",
            //     "22" => "Saris",
            //     "23" => "Sashes",
            //     "24" => "Shawls and wraps",
            //     "25" => "Skirts",
            //     "26" => "Sportswear",
            //     "27" => "Suits",
            //     "28" => "Tops",
            //     "29" => "Trousers and shorts",
            //     "30" => "Undergarments",
            //     "31" => "Wedding clothing"
            // ];

            $user_id = $_SESSION['current_user']['user_id'];
            $query = "SELECT * FROM b_textile_catagorys WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output = "";

            $output .= '<div class="mb-3 form-check-reverse text-right">';
            $output .= '  <div class="container">';
            $output .= '    <div class="btn-group">';
            $output .= '      <div class="btn-group" role="group" aria-label="Basic example">';
            $output .= '        <div class="form-check form-switch ps-0">';
            $output .= '          <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" value="b_textile_catagorys" checked>';
            $output .= '          <input type="hidden" id="toggleStatus" name="status" value="b_textile_catagorys">';
            $output .= '        </div>';
            $output .= '      </div>';
            $output .= '    </div>';
            $output .= '  </div>';
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
                                $output .= '<div class="card card-blog card-plain mb-3">';
                                $output .= '  <div class="d-flex justify-content-between align-items-center">';
                                $output .= '    <div class="d-flex ">';
                                $output .= '      <div class="shop-name text-secondary px-3">' . $categories  . '</div>';
                                $output .= '    </div>';
                                $output .= '    <div class="action-icons ms-auto d-flex align-items-center">'; // Added d-flex and align-items-center
                                $output .= '      <i data-id= "' . $row["b_textile_catagory_id"] . '" class="fa fa-trash cursor-pointer delete" data-delete-type="b_textile_catagory" aria-hidden="true"></i>'; // Removed margin-top for centering
                                $output .= '    </div>';
                                $output .= '  </div>';
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
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            // print_r($user_id);
            $query = "SELECT * FROM faqs WHERE user_id = '$user_id'";
            $result = $this->db->query($query);
            $output = "";
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
            // HTML structure for the header part
            $output .= '<div class="mb-3 form-check-reverse text-right">';
            $output .= '  <div class="container">';
            $output .= '    <div class="btn-group">';
            $output .= '      <div class="btn-group" role="group">';
            $output .= '        <div class="form-check form-switch ps-0 toggle_offon">';
            $output .= '          <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" value="banners" checked>';
            $output .= '          <input type="hidden" id="toggleStatus" name="status" value="banners">';
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

                        $noimagePath = $NO_IMAGE;
                        $decodedPath = htmlspecialchars_decode(
                            (!empty($image) && file_exists($imagePath)) ? $imagePath : $noimagePath
                        );
                        $output .= '<div class="col-xl-6 col-md-6 mb-xl-0 mb-2">';
                        $output .= '<div class="card card-blog card-plain mb-4">';
                        $output .= '<div class="position-relative">';
                        $output .= '<a class="d-block border-radius-xl offer_imgbox">';
                        $output .= '<img src="' . $decodedPath . '" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg mb-3 mt-3 product_main_image">';
                        $output .= '</a>';
                        $output .= '<div class="position-absolute top-2 end-0 mt-3 me-3">';
                        $output .= '    <i data-id= "' . $row["banner_id"] . '" class="fa fa-trash text-secondary  delete_shadow  me-1 delete_btn delete btn btn-light shadow-sm rounded-0" data-delete-type="banner" aria-hidden="true"></i>';
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
            $user_id = $_SESSION['current_user']['user_id'];
            $sql = "select * from famous_markets where status='1'";
            $res = $this->db->query($sql);
            if (mysqli_num_rows($res) > 0) {
                $output = "";
                $output .= '<div class="mb-3 form-check-reverse text-right">';
                $output .= '  <div class="container">';
                $output .= '    <div class="btn-group">';
                $output .= '      <div class="btn-group" role="group" aria-label="Basic example">';
                $output .= '        <div class="form-check form-switch ps-0">';
                $output .= '          <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" value="famous_markets" checked>';
                $output .= '          <input type="hidden" id="toggleStatus" name="status" value="famous_markets">';
                $output .= '        </div>';
                $output .= '      </div>';
                $output .= '    </div>';
                $output .= '  </div>';
                $output .= '</div>';
                while ($row = mysqli_fetch_array($res)) {
                    $input = $row['shop_name'];
                    $query = "SELECT * FROM users WHERE   user_id = '$input'";
                    $result = $this->db->query($query);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                                $output .= '<div class="card card-blog card-plain mb-3">';
                                $output .= '  <div class="d-flex justify-content-between align-items-center">';
                                $output .= '    <div class="d-flex ">';
                                $output .= '      <div class="shop-name text-secondary px-3">' . htmlspecialchars($row['shop']) . '</div>';
                                $output .= '    </div>';
                                $output .= '    <div class="action-icons ms-auto d-flex align-items-center">'; // Added d-flex and align-items-center
                                $output .= '      <i data-id="" class="fa fa-trash cursor-pointer delete" data-delete-type="famous_market" aria-hidden="true"></i>'; // Removed margin-top for centering
                                $output .= '    </div>';
                                $output .= '  </div>';
                                $output .= '</div>';
                            }
                            $response_data = array('data' => 'success', 'outcome' => $output);
                        } else {
                            $response_data = array('data' => 'fail', 'outcome' => "No data found");
                        }
                    }
                }
            }else{
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
        }

        $response = json_encode($response_data);
        return $response;
    }

    function reviewlisting(){
        $response_data = array('data' => 'fail', 'msg' => "Error");

        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $sql = "SELECT * FROM marketreviews WHERE status='1'";
            $res = $this->db->query($sql);

            if ($res && mysqli_num_rows($res) > 0) {
                $output = "";
                $output .= '<div class="mb-3 form-check-reverse text-right">';
                $output .= '  <div class="container">';
                $output .= '    <div class="btn-group">';
                $output .= '      <div class="btn-group" role="group" aria-label="Basic example">';
                $output .= '        <div class="form-check form-switch ps-0">';
                $output .= '          <input class="form-check-input ms-auto" type="checkbox" id="flexSwitchCheckDefault" value="marketreviews" checked>';
                $output .= '          <input type="hidden" id="toggleStatus" name="status" value="marketreviews">';
                $output .= '        </div>';
                $output .= '      </div>';
                $output .= '    </div>';
                $output .= '  </div>';
                $output .= '</div>';

                while ($row = mysqli_fetch_array($res)) {

                    $input = $row['shopname'];
                    $query = "SELECT * FROM users WHERE user_id = '$input'";
                    $result = $this->db->query($query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($user_row = mysqli_fetch_array($result)) {
                            $output .= '<div class="card card-blog card-plain mb-3">';
                            $output .= '  <div class="d-flex justify-content-between align-items-center">';
                            $output .= '    <div class="d-flex ">';
                            $output .= '      <div class="shop-name text-secondary px-3">' . htmlspecialchars($user_row['shop']) . '</div>';
                            $output .= '    </div>';
                            $output .= '    <div class="action-icons ms-auto d-flex align-items-center">';
                            $output .= '      <i data-id="" class="fa fa-trash cursor-pointer delete" data-delete-type="marketreviews" aria-hidden="true"></i>'; // Removed margin-top for centering
                            $output .= '    </div>';
                            $output .= '  </div>';
                            $output .= '</div>';
                        }
                        $response_data = array('data' => 'success', 'outcome' => $output);
                    } else {
                        $response_data = array('data' => 'fail', 'outcome' => "No user data found for review.");
                    }
                }
            } else {
                $response_data = array('data' => 'fail', 'outcome' => "No data found");
            }
        }

        $response = json_encode($response_data);
        return $response;
    }

    function deleteRecord($table, $delete_id){
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

    function invoicedelete(){

        $delete_id = isset($_POST["invoice_id"]) ? $_POST["invoice_id"] : '2';
        return $this->deleteRecord('invoice', $delete_id);
    }
    function multipimgdelete(){
        $delete_id = isset($_POST['product_image_id']) ? $_POST['product_image_id'] : '2';
        return $this->deleteRecord('product_images', $delete_id);
    }

    function customerdelete(){
        $delete_id = isset($_POST['customer_id']) ? $_POST['customer_id'] : '2';
        return $this->deleteRecord('customer', $delete_id);
    }

    function blogdelete(){
        $delete_id = isset($_POST["blog_id"]) ? $_POST["blog_id"] : '2';
        return $this->deleteRecord('blogs', $delete_id);
    }

    function videodelete(){
        $delete_id = isset($_POST["video_id"]) ? $_POST["video_id"] : '2';
        return $this->deleteRecord('videos', $delete_id);
    }

    function bannerdelete()
    {
        $delete_id = isset($_POST["banner_id"]) ? $_POST["banner_id"] : '2';
        return $this->deleteRecord('banners', $delete_id);
    }

    function famousmarketdelete()
    {
        $delete_id = isset($_POST["famous_market_id"]) ? $_POST["famous_market_id"] : '2';
        return $this->deleteRecord('famous_markets', $delete_id);
    }

    function b_textile_catagorysdelete()
    {
        $delete_id = isset($_POST["b_textile_catagory_id"]) ? $_POST["b_textile_catagory_id"] : '2';
        return $this->deleteRecord('b_textile_catagorys', $delete_id);
    }

    function offerdelete()
    {
        $delete_id = isset($_POST["offer_id"]) ? $_POST["offer_id"] : '2';
        return $this->deleteRecord('offers', $delete_id);
    }

    function faqdelete()
    {
        $delete_id = isset($_POST["faq_id"]) ? $_POST["faq_id"] : '2';
        return $this->deleteRecord('faqs', $delete_id);
    }

    function reviewdelete()
    {
        $delete_id = isset($_POST["marketreview_id"]) ? $_POST["marketreview_id"] : '2';
        return $this->deleteRecord('marketreviews', $delete_id);
    }

    function forget_password()
    {
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

    function reset_passwordform()
    {
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

    function getproduct()
    {
        $response_data = array('data' => 'fail', 'msg' => 'Unknown error occurred');
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        if (!empty($id)) {
            $query = "SELECT  * from  products WHERE product_id = $id AND  status = 1";
            $result = $this->db->query($query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $response_data = array('data' => 'success', 'outcome' => $row);
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function getinvoice()
    {
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
                    $item_data .=  '<tr id="attr">';
                    $item_data .=  '<td>';
                    $item_data .=  ' <input type="text" class="form-control mt-1" value="' . $inv_item . '" name="item[]" ">';
                    $item_data .=  '<span class="errormsg item"></span>';
                    $item_data .=  '</td>';
                    $item_data .=  '<td>';
                    $item_data .=  '<input type="number" class="form-control mt-1" value="' . $inv_quantity . '" name="quantity[]" min="1" >';
                    $item_data .=  ' <span class="errormsg quantity"></span>';
                    $item_data .=  '</td>';
                    $item_data .=  '<td>';
                    $item_data .=  ' <input type="text" class="form-control mt-1" value="' . $inv_rate . '" name="rate[]" >';
                    $item_data .=  '<span class="errormsg rate"></span>';
                    $item_data .=  ' </td>';
                    $item_data .=  '<td>';
                    $item_data .=  ' <input type="text" class="form-control mt-1" value="' . $inv_amount . '" name="amount[]" disabled="" >';
                    $item_data .=  '<span class="errormsg item"></span>';
                    $item_data .=  ' </td>';

                    $item_data .=  '<td class="invoice-rowclose"><i class="fa fa-times cursor-pointer remove" aria-hidden="true" style="display: none;"></i></td>';
                    $item_data .=  '</tr>';
                }

                $response_data = array('data' => 'success', 'outcome' => $row, 'item_data' => $item_data);
            }
        }
        $response = json_encode($response_data);
        return $response;
    }
  
    function getcustomer()
    {
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

    function getblog()
    {
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

    function check_toggle_status()
    {
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

    function toggle_enabledisable()
    {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_POST['ischecked_value']) && isset($_POST['table_name'])) {
            $table_name = $_POST['table_name'];
            $ischecked_value = $_POST['ischecked_value'];
            $query = "UPDATE $table_name SET status= '$ischecked_value'";
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

    function toggle_checkuncheck()
    {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');

        if (isset($_POST['ischecked_value']) && isset($_POST['video_id'])) {
            $video_id = intval($_POST['video_id']);
            $ischecked_value = $_POST['ischecked_value'];
            $query = "UPDATE videos SET toggle= '$ischecked_value' WHERE video_id = $video_id";

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

    function check_toggle_btn()
    {
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

    function get_categories()
    {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = $_SESSION['current_user']['user_id'];
            $sql = "SELECT * FROM allcategories WHERE status='1'";
            $result = $this->db->query($sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {

                    $all_categories = ""; // Initialize the variable to store options
                    $category_names = []; // Array to track unique category names

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

    function select_shop()
    {
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

    function totalearning()
    {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = "";
            if (isset($_SESSION['current_user']['role']) && isset($_SESSION['current_user']['role']) == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userquery = "WHERE user_id =$user_id";
            }
            $sql = "SELECT * FROM invoice  $userquery";
            $result = $this->db->query($sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $total_amount = 0;
                    while ($invoicedata = mysqli_fetch_assoc($result)) {
                        $total_amount += $invoicedata['total'];  // Add each 'amount' to the total
                    }
                    $response_data = array('data' => 'success', 'totalearning' => $total_amount);
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }

    function totalproduct()
    {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = "";
            if (isset($_SESSION['current_user']['role']) && isset($_SESSION['current_user']['role']) == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userquery = "and user_id =$user_id";
            }
            $sql = "SELECT * FROM products WHERE  status='1' $userquery";
            $result = $this->db->query($sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $countproduct = $result->num_rows;
                    $response_data = array('data' => 'success', 'totalproduct' => $countproduct);
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }
    function totalclient()
    {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = "";
            if (isset($_SESSION['current_user']['role']) && isset($_SESSION['current_user']['role']) == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userquery = "and user_id = $user_id";
            }
            $sql = "SELECT * FROM customer WHERE status='1' $userquery";
            $result = $this->db->query($sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    $countclient = $result->num_rows;
                    $response_data = array('data' => 'success', 'outcome' => $countclient);
                }
            }
        }
        $response = json_encode($response_data);
        return $response;
    }
    function totalitemsale()
    {
        $response_data = array('data' => 'fail', 'outcome' => 'Something went wrong');
        if (isset($_SESSION['current_user']['user_id'])) {
            $user_id = "";
            if (isset($_SESSION['current_user']['role']) && isset($_SESSION['current_user']['role']) == 1) {
                $user_id = $_SESSION['current_user']['user_id'];
                $userquery = "WHERE user_id = $user_id";
            }
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

    function chartdrawer()
    {
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
}
