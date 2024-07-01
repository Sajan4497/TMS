<?php
error_reporting(E_ERROR | E_PARSE);

include('config.php');

//if(isset($_GET['id']) && isset($_GET['PI'])) {


//$customerid = $_GET['id'];
//$packageid = $_GET['PI'];

//$status = "approved"; 
//$sql = "UPDATE transaction SET status ='$status' WHERE customerid = '$customerid' AND packageid = '$packageid'";

//echo  $sql;

//if ($conn->query($sql) === TRUE) {
///echo "Status updated successfully";
// } else {
// echo "Error updating status: " . $conn->error;
//}
//}



// require 'vendor/autoload.php';

// use \Stripe\StripeClient;

// // Initialize Stripe
// $stripe = new StripeClient('sk_test_51PLeLNRqM69andAA8hz5lhqiY6KlvItnV4YACoKFHuZBcWpq4MhskTIy4sE1Z8vWkDlzAlXEEPp08ZMz16ubqKpR00aMlMgKSS');

// Get customer ID and package ID from URL parameters

$customerid = $_GET['id'];
$packageid = $_GET['PI'];

// Update transaction status to "Approved"
$sql = "UPDATE transaction SET `status` = 'Approved' WHERE customerid = '$customerid' AND packageid = '$packageid'";
if ($conn->query($sql) === TRUE) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TMS</title>
    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: 'Payment Successful!',
                text: 'Click OK to go back.',
                icon: 'success',
                confirmButtonText: 'OK',
                allowOutsideClick: false
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'Full-Package.php';
                }
            });
        </script>
    </body>

    </html>
<?php
} else {
    echo "Error updating status: " . $conn->error;
}
?>