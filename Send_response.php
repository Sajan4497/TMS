<?php
// Include database connection
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the message is set and not empty
    if (isset($_POST["message"]) && !empty($_POST["message_content"])) {
        // Sanitize the message to prevent SQL injection
        $message = mysqli_real_escape_string($conn, $_POST["message_content"]);

        // Insert the admin's response into the database
        $sql = "INSERT INTO message (sender_type, recipient_type, message) VALUES ('admin', 'customer', '$message')";

        if ($conn->query($sql) === TRUE) {
            // Response sent successfully
            echo "Response sent successfully!";
        } else {
            // Error occurred while sending response
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } 
    }



?>
