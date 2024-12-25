<?php
$myRoot = $_SERVER["DOCUMENT_ROOT"];
if ($_SERVER['SERVER_NAME'] == 'textilemarkethub.com') {
    include($myRoot .'/connection.php');
    $thankyou = 'https://textilemarkethub.com/admin1/assets/img/thankyou.jpg';
    $welcome = 'https://textilemarkethub.com/admin1/assets/img/welcome.jpg';
} else {
    include($myRoot . '/markets/connection.php');
    $thankyou = 'https://codelocksolutions.in/markets/admin1/assets/img/thankyou.jpg';
    $welcome = 'https://codelocksolutions.in/markets/admin1/assets/img/welcome.jpg';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin: 0; padding: 0;">
        <tr>
            <td align="center" style="background-color: #f4f4f4; padding: 20px;">
                <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 10px; overflow: hidden;">
                    <tr>
                        <td align="center" style="padding: 20px;">
                            <img src="<?php echo $thankyou ?>" alt="Thank You" style="width: 100%; max-width: 500px; display: block; margin-bottom: 20px;">
                            <img src="<?php echo $welcome ?>" alt="Welcome" style="width: 100%; max-width: 500px; display: block;">
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
