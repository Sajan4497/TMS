<?php
error_reporting(E_ERROR | E_PARSE);

session_start();

include('config.php');
require 'vendor/autoload.php';

use \Stripe\StripeClient;

$stripe = new StripeClient('sk_test_51PLeLNRqM69andAA8hz5lhqiY6KlvItnV4YACoKFHuZBcWpq4MhskTIy4sE1Z8vWkDlzAlXEEPp08ZMz16ubqKpR00aMlMgKSS'); // Replace with your actual Stripe Secret Key

$id = $_POST['id'];
$priceinusd = $_POST['priceinusd'];
$packagename = $_POST['packagename'];
$packageid = $_POST['packageid'];
$packageprice = $_POST['packageprice'];
$customerid = $_POST['customerid'];
$image = $_POST['image'];
$status = 'pending';


$sql = "INSERT INTO `transaction` (packageid, packagename, packageprice, customerid, `status`) 
        VALUES ('$packageid', '$packagename', '$packageprice', '$customerid', '$status')";

if ($conn->query($sql) === TRUE) {


    $checkoutSession = $stripe->checkout->sessions->create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => $packagename,

                ],
                'unit_amount' => $priceinusd * 100,
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => "http://localhost/managementsystem/Success.php?id=$customerid&PI=$id",
        'cancel_url' => "http://localhost/managementsystem/Cancel.php?id=$customerid&PI=$id",
    ]);
    $sessionurl = $checkoutSession->url;

    // Send session ID back to the client
     echo json_encode(['sessionurl' => $sessionurl]);


} else {

    echo json_encode(['error' => 'Failed to insert transaction into the database.']);
}
?>