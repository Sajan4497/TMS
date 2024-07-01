<?php
include('config.php');

// Fetch the existing notes for the enquiry from the database
$query = "SELECT notes FROM queries";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result && mysqli_num_rows($result) > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Chatbot Interface</title>
        
    </head>
    <body>
        <div class="chat-container">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $notes = json_decode($row['notes'], true); // Decode the JSON data into an array

                // If decoding was successful and the notes array is not empty
                if ($notes !== null && is_array($notes)) {
                    foreach ($notes as $message) {
                        // Check if 'key' is 'customer' and 'note' exists
                        if (isset($message['key']) && $message['key'] === 'customer' && isset($message['note'])) {
                            ?>
                            <div class="message customer">
                                <p><?php echo htmlspecialchars($message['note']); ?></p>
                            </div>
                            <?php
                        }
                    }
                }
            }
            ?>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "No notes found";
}
?>
