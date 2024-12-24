<?php
$myRoot = $_SERVER["DOCUMENT_ROOT"];
if ($_SERVER['SERVER_NAME'] == 'textilemarkethub.com') {
  include($myRoot .'/connection.php');
}else{
  include($myRoot . '/markets/connection.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="main-sec" style="max-width: 1140px;margin: auto;background-color: #ffff;border-radius: 30px;">
        <div class="mail-img"
            style="background-color: #fff;margin: auto;padding: 50px 100px;border-radius: 30px 30px 0px 0px;">
            <img src="<?php echo SITE_ADMIN_URL; ?>assets/img/thankyou.jpg" alt=""
                style="width: 85%;margin: 0 auto;display: flex;">
            <img src="<?php echo SITE_ADMIN_URL; ?>assets/img/welcome.jpg" alt=""
                style="width: 85%;margin: 0 auto;display: flex;">
            <!-- <img src="https://codelocksolutions.in/markets/admin1/assets/img/thankyou.jpg" alt=""
                style="width: 85%;margin: 0 auto;display: flex;">
           
            <img src="https://codelocksolutions.in/markets/admin1/assets/img/welcome.jpg" alt=""
                style="width: 85%;margin: 0 auto;display: flex;"> -->
           
        </div>
    </div>
</body>
</html>