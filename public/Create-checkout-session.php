<?php
require 'vendor/autoload.php';

// Assuming you're using environment variables to store your secret key
$stripe = new \Stripe\StripeClient(getenv('sk_test_51PLeLNRqM69andAA8hz5lhqiY6KlvItnV4YACoKFHuZBcWpq4MhskTIy4sE1Z8vWkDlzAlXEEPp08ZMz16ubqKpR00aMlMgKSS'));

// Retrieve the data sent via POST
$id = $_POST['id']; 
$priceinusd = $_POST['priceinusd']; 

// Set the content type of the response to JSON
header('Content-Type: application/json');

// Define your domain
$YOUR_DOMAIN = 'http://localhost';

// Create a checkout session
$checkout_session = $stripe->checkout->sessions->create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product' => 'sample product',
            'unit_amount' => $priceinusd * 100, // Amount should be in cents
        ],
        'quantity' => 1,
    ]],
    
    'success_url' => $YOUR_DOMAIN . '/success.html', // Redirect URL after successful payment
    'cancel_url' => $YOUR_DOMAIN . '/cancel.html', // Redirect URL if user cancels payment
]);

// Output the response


echo "<pre>";
print_r($checkout_session);
echo "</pre>";
//echo json_encode($checkout_session);
?>