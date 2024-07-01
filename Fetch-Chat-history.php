
<?php
session_start();
include('config.php');

if (isset($_GET['user_id'], $_GET['package_id'])) {
    $user_id = $_GET['user_id'];
    $package_id = $_GET['package_id'];

    $query = "SELECT `notes` FROM `queries` WHERE user_id='$user_id' AND package_id='$package_id'";
    $result = mysqli_query($conn, $query);

    $chatData = [];
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $chatData = json_decode($row['notes'], true);
    }

    echo json_encode($chatData);
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Chatbot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        .chat-container {
            width: 400px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow-y: auto;
            max-height: 60vh;
        }

        .input-area {
            width: 400px;
            display: flex;
            margin-top: 20px;
        }

        .input-area input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .input-area button {
            padding: 10px;
            border: none;
            background: #007bff;
            color: white;
            border-radius: 5px;
            margin-left: 10px;
        }

        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 10px;
            max-width: 70%;
            position: relative;
            clear: both;
        }

        .customer {
            background: #e1e1e1;
            text-align: left;
            float: left;
            border-bottom-left-radius: 0;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin-left: 0;
        }


        .customer {
            background: #007bff;
            margin-right: auto;
            text-align: right;
            float: right;
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body>
    <div class="chat-container">
        <?php
        
        include('config.php');


        $user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';
        $package_id = isset($_GET['packageid']) ? $_GET['packageid'] : '';

        if (!empty($user_id) && !empty($package_id)) {
            $query = "SELECT `notes` FROM `queries` WHERE user_id='$user_id' AND package_id='$package_id'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $notes = json_decode($row['notes'], true);

                    if ($notes !== null && is_array($notes)) {
                        foreach ($notes as $message) {
                            if (isset($message['key']) && isset($message['note'])) {
                                $messageClass = strtolower($message['key']) === 'admin' ? 'admin' : 'customer';
        ?>
                                <div class="message <?php echo $messageClass; ?>">
                                    <p><?php echo htmlspecialchars($message['note']); ?></p>
                                </div>
        <?php
                            }
                        }
                    }
                }
            } else {
                echo "No chat history found.";
            }
        }
        ?>
    </div>

    <div class="input-area">
        <form id="sendMessageForm">

            <input type="hidden" name="user_id" id="user_id" value="<?php echo htmlspecialchars($_GET['user_id']); ?>">
            <input type="hidden" name="package_id" id="package_id" value="<?php echo htmlspecialchars($_GET['packageid']); ?>">
            <input type="text" id="userMessage" name="note" placeholder="Type your message...">
            <button type="submit" id="sendMessageForm">Send</button>
        </form>
    </div>

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sendMessageForm').submit(function(event) {
                event.preventDefault();
                var message = $('#userMessage').val().trim();
                if (message === '') {
                    return; // Do not send an empty message
                }

                var formData = $(this).serialize();



                $.ajax({
                    type: 'POST',
                    url: 'Submit-Enquiry.php',
                    data: formData,
                    success: function(response) {
                        console.log(response); 
                       
                        $('.chat-container').append('<div class="message customer"><p>' + $('<div>').text($('#userMessage').val()).html() + '</p></div>');
                        $('#userMessage').val('');

                        // Scroll to bottom of chat container
                        $('.chat-container').scrollTop($('.chat-container')[0].scrollHeight);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>

</html>