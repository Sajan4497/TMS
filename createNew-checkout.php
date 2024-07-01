<?php
error_reporting(E_ERROR | E_PARSE);
include('config.php');
require 'vendor/autoload.php';

use \Stripe\StripeClient;

$stripe = new StripeClient('sk_test_51PLeLNRqM69andAA8hz5lhqiY6KlvItnV4YACoKFHuZBcWpq4MhskTIy4sE1Z8vWkDlzAlXEEPp08ZMz16ubqKpR00aMlMgKSS');


$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);


$id = $data['id'];
$priceinusd = $data['priceinusd'];
//$Cardholdername = $data['Cardholdername'];
//$Email = $data['Email'];
$status = 'pending';
$packagename=$data['packagename'];
$packageid=$data['packageid'];
$packageprice=$data['packageprice'];
$customerid=$data['customerid'];

$sql ="INSERT INTO transaction (packageid, packagename, packageprice, customerid, status) VALUES ('$packageid', '$packagename', '$packageprice', '$customerid', '$status')";

if ($conn->query($sql) === TRUE) {
  echo "hello";
    $checkoutNew = $stripe->checkout->sessions->create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Book-Package',
                ],
                'unit_amount' => $priceinusd * 100,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => "http://localhost./managementsystem/Success.php?id=$customerid&PI=$id",
        'cancel_url' =>  "http://localhost./managementsystem/Cancel.php?id=$customerid&PI=$id",
    ]);

   
    echo json_encode($checkoutNew);
} else {
  
    echo "Error: " . $sql . "<br>" . $conn->error;
}


?>
