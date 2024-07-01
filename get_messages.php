<?php
// Include your database connection file
include('config.php');

// Fetch chat messages from the database
$sql = "SELECT * FROM messages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $messages = array();
    while ($row = $result->fetch_assoc()) {
        // Add each message to the array
        $messages[] = array(
            'sender' => $row['sender'],
            'message_content' => $row['message_content']
        );
    }
    // Convert the array to JSON format and output it
    echo json_encode($messages);
} else {
    // If no messages found, return an empty array
    echo json_encode(array());
}


?>
