<?php
// Include your database connection file
include('config.php');

// Check if the message content is set and not empty
if(isset($_POST['message_content']) && !empty($_POST['message_content'])) {
    // Sanitize and escape the message content to prevent SQL injection
    $message_content = mysqli_real_escape_string($conn, $_POST['message_content']);

    // Assuming the sender's name is hardcoded for this example
    $sender = "Admin";

    // Insert the new message into the database
    $sql = "INSERT INTO messages (sender, message_content) VALUES ('$sender', '$message_content')";
    
    if ($conn->query($sql) === TRUE) {
        // If insertion is successful, return success message
        echo "Message inserted successfully";
    } else {
        // If insertion fails, return error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    
    echo "Message content is missing";
}


?>
