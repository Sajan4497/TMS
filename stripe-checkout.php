<?php
error_reporting(E_ERROR | E_PARSE);

include('config.php');
require 'vendor/autoload.php';

use \Stripe\StripeClient;

$stripe = new StripeClient('sk_test_51PLeLNRqM69andAA8hz5lhqiY6KlvItnV4YACoKFHuZBcWpq4MhskTIy4sE1Z8vWkDlzAlXEEPp08ZMz16ubqKpR00aMlMgKSS');

$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

$priceinusd = $data['priceinusd'];
$packagename = 'Package Purchase'; 
$packageid = $data['packageid']; 
$customerid = $data['customerid']; 
$firstname = $data['firstname'];
$lastname = $data['lastname'];
$country = $data['country'];
$address = $data['address'];
$city = $data['city'];
$state = $data['state'];
$zipcode = $data['zipcode'];
$email = $data['email'];
$phone = $data['phone'];

$sql = "INSERT INTO transaction (packageid, packagename, packageprice, customerid, status, firstname, lastname, country, address, city, state, zipcode, email, phone) 
        VALUES ('$packageid', '$packagename', '$priceinusd', '$customerid', 'pending', '$firstname', '$lastname', '$country', '$address', '$city', '$state', '$zipcode', '$email', '$phone')";

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
        'success_url' => "http://localhost./ManagementSystem/Success.php",
        'cancel_url' =>  "http://localhost./MangementSystem/Cancel.php",
    ]);

    echo json_encode($checkoutSession);
} else {
    error_log("Database insertion failed: " . $conn->error);
    echo json_encode(['error' => 'Failed to insert transaction into the database.']);
}
?>
