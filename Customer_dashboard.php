<?php
// Start session and include database connection
session_start();
include('config.php');

// Check if user is logged in
if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit();
}

// Fetch messages for the logged-in customer
$customerId = $_SESSION["id"];
$sql = "SELECT * FROM message";
$result = $conn->query($sql);

// Store messages in an array
$messages = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Customer Dashboard</h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <h3>Inbox</h3>
                <ul class="list-group">
                    <?php foreach ($messages as $message): ?>
                        <li class="list-group-item">
                            <strong>From: Admin</strong><br>
                            <?php echo $message['message_content']; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Send Message</h3>
                <form id="sendMessageForm">
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // Submit message form via AJAX
            $('#sendMessageForm').submit(function(event) {
                event.preventDefault();
                var message = $('#message').val();

                $.ajax({
                    type: 'POST',
                    url: 'send_message.php',
                    data: {
                        sender: <?php echo $_SESSION["id"]; ?>,
                        recipient_id: 'customer', 
                        message: message
                    },
                    success: function(response) {
                        alert(response); // Display success message
                        $('#message').val(''); // Clear message input
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText); // Log error message
                    }
                });
            });
        });
    </script>
</body>
</html>
