<?php


$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Amount=$_POST['Amount'];
$Phone=$_POST['phone'];
$purpose='Donation';
include 'instamojo.php';
$api = new Instamojo\Instamojo('test_8f34b31623213c559273bf39f08', 'test_355d0bde1ec2f2135c69037e0b9','https://test.instamojo.com/api/1.1/');
try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => $purpose,
        "amount" => $Amount,
        "buyer_name" => $Name,
        "phone" => $Phone,
        "email" => $Email,
        "send_email" => true,
        "send_sms" => true,
        'allow_repeated_payments' => false,
        "redirect_url" => "https://careclub-donation-nation.000webhostapp.com/redirect.php",
        "webhook" => "https://careclub-donation-nation.000webhostapp.com/webhook.php"
        ));
   $pay_ulr = $response['longurl'];
    header("Location: $pay_ulr");
    exit();
    }
    catch (Exception $e) {
    print('Error: ' . $e->getMessage());
    }     
 ?>
