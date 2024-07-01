<?php
include('config.php');

// Fetch the existing notes for the enquiry from the database
$query = "SELECT notes FROM queries";
//$query = "SELECT notes FROM queries ORDER BY timestamp DESC";
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
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }

            .chat-container {
                width: 400px;
                background: #fff;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                overflow-y: auto;
                max-height: 80vh;
            }

            .message {
                padding: 10px;
                margin: 10px 0;
                border-radius: 10px;
                max-width: 70%;
                position: relative;
                clear: both;
            }

            .admin {
                background: #007bff;
                color: white;
                margin-left: auto;
                text-align: right;
            }

            .customer {
                background: #e1e1e1;
                margin-right: auto;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="chat-container">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                $notes = json_decode($row['notes'], true); // Decode the JSON data into an array

                // If decoding was successful and the notes array is not empty
                if ($notes !== null && is_array($notes)) {
                    foreach ($notes as $message) {
                        //print_r($message);
                        // Check if 'key' and 'note' keys exist in the $message array
                        if (isset($message['key']) && isset($message['note'])) {
                            ?>
                            <div class="message <?php echo strtolower($message['key']); ?>">
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
