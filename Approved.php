<?php

include('config.php');
//if ($_SERVER['REQUEST_METHOD'] == "POST") {
//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
///die();
if(isset($_POST['packageid'])) {
    $packageid = $_POST['packageid'];
}

if(isset($_GET['packageid'])) {
    
    $packageid = $_GET['packageid'];

    
    $sql = "UPDATE transaction SET status = 'approved' WHERE id = '$packageid'";
    if ($conn->query($sql) === TRUE) {
    
        echo "Transaction status updated to approved.";
    } else {
        
        echo "Error updating transaction status: " . $conn->error;
    }
} else {
  
    echo "Transaction ID not provided.";
}

?>
