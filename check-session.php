<?php
error_reporting(E_ERROR | E_PARSE);

include('config.php'); 
require 'vendor/autoload.php'; 

use \Stripe\StripeClient;

$stripe = new StripeClient('sk_test_51POVcYLBMYWzJQEdHqTruH4jpzwgdS44Ld7NLbhvhY8z1FW1ZsmzVzFkpsiUFmaYWi8HP3Xk3kjL1Kh66E1pvUcy00Oe5z3IcJ');
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

//database details
$id = $data['id'];
$priceinusd = $data['priceinusd'];
$status = 'pending'; 
$packagename = $data['packagename'];
$packageid = $data['packageid'];
$packageprice = $data['packageprice'];
$customerid = $data['customerid'];


//$sql = "INSERT INTO transaction (packageid, packagename, packageprice, customerid, `status`) VALUES ('$packageid', '$packagename', '$packageprice', '$customerid', '$status')";

if ($conn->query($sql) === TRUE) {
    
    $checkoutSession = $stripe->checkout->sessions->create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Book-Package',//button name
                ],
                'unit_amount' => $priceinusd * 100, //
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => "http://localhost./managementsystem/Success.php?id=$customerid&PI=$id",
        'cancel_url' =>  "http://localhost./managementsystem/Cancel.php?id=$customerid&PI=$id",
    ]);

 
    echo json_encode($checkoutSession);
} else {
    // If insertion fails, return an error message
    echo json_encode(['error' => 'Failed to insert transaction into the database.']);
}
?>
