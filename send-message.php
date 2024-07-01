<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $messageContent = $_POST['message'];
    $senderType = "customer"; // Flag indicating sender is a customer
    
    // Insert the message into the database
    $sql = "INSERT INTO message (message_content, sender_type) VALUES ('$message_content', '$sender_type')";
    
    if ($conn->query($sql) === TRUE) {
        echo "success"; // Return success message if insertion was successful
    } else {
        echo "error"; // Return error message if insertion failed
    }
} 

?>
