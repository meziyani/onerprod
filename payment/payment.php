<?php
session_start();
require_once '../includes/db.php';
        $q = $db->prepare("SELECT * FROM articles WHERE id=?");
        $q->execute([$_POST['id']]);
        $count = $q->rowCount();
        if($count == 0){
        	header('Location: ../index.php');
        }

if(isset($_POST['email']) && !empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $_SESSION['payment']['email'] = $_POST['email'];
    $_SESSION['payment']['id'] = $_POST['id'];
    $q = $db->prepare('SELECT * from articles WHERE id = ?');
    $q->execute([$_POST['id']]);
    $req = $q->fetch();

require_once '../lib/DPayPal.php'; //Import library
$paypal = new DPayPal(); //Create an object
//Now we will call SetExpressCheckout API operation. All available parameters for this method are available here https://developer.paypal.com/docs/classic/api/merchant/SetExpressCheckout_API_Operation_NVP/
$requestParams = array(
    'RETURNURL' => "http://localhost/onerprod/payment/return.php", //Enter your webiste URL here
    'CANCELURL' => "http://localhost/onerprod/payment/cancel.php",//Enter your website URL here
);
$orderParams = array(
    'LOGOIMG' => "https://image.ibb.co/kpAX6Q/logo3.png", //You can paste here your logo image URL
    "MAXAMT" => "100", //Set max transaction amount
    "NOSHIPPING" => "1", //I do not want shipping
    "ALLOWNOTE" => "0", //I do not want to allow notes
    "BRANDNAME" => "OnerProd - Beatmaker & Rapper",
    "GIFTRECEIPTENABLE" => "0",
    "GIFTMESSAGEENABLE" => "0"
);
$item = array(
    'PAYMENTREQUEST_0_AMT' => $req['price'],
    'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',
    'PAYMENTREQUEST_0_ITEMAMT' => $req['price'],
    'L_PAYMENTREQUEST_0_NAME0' => $req['title'],
    'L_PAYMENTREQUEST_0_DESC0' => $req['tags'],
    'L_PAYMENTREQUEST_0_AMT0' => $req['price'],
    'L_PAYMENTREQUEST_0_QTY0' => '1',
        //"PAYMENTREQUEST_0_INVNUM" => $transaction->id - This field is useful if you want to send your internal transaction ID
);
echo "Calling PayPal SetExpressCheckout method<br>";
//Now you will be redirected to the PayPal to enter your customer data
//After that, you will be returned to the RETURN URL 
$response = $paypal->SetExpressCheckout($requestParams + $orderParams + $item);
if (is_array($response) && $response['ACK'] == 'Success') { //Request successful
    //Now we have to redirect user to the PayPal
    $token = $response['TOKEN'];
    header('Location: https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=' . urlencode($token));
} else if (is_array($response) && $response['ACK'] == 'Failure') {
    var_dump($response);
    exit;
}
exit;
} else {
    header('Location: ../index.php');
}
?>