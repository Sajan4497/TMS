<?php
session_start();
include('config.php');

if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit();
}

$sql = "SELECT * FROM enquiries";
$result = $conn->query($sql);

$enquiries = [];
if ($result->num_rows > 0) {
    $enquiries = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiries</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .content {
            margin-left: 80px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="content">
        <table id="enquiriesTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>National Park Name</th>
                    <th>Location</th>
                    <th>Details</th>
                    <th>Type</th>
                    <th>Price (USD)</th>
                    <th>Features</th>
                    <th>Note</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($enquiries as $enquiry): ?>
                    <tr>
                        <td><?= $enquiry['id'] ?></td>
                        <td><?= $enquiry['nationalparkname'] ?></td>
                        <td><?= $enquiry['nationalparklocation'] ?></td>
                        <td><?= $enquiry['nationalparkdetails'] ?></td>
                        <td><?= $enquiry['nationalparktype'] ?></td>
                        <td><?= $enquiry['priceinusd'] ?></td>
                        <td><?= $enquiry['nationalparkfeatures'] ?></td>
                        <td><?= $enquiry['note'] ?></td>
                        <td>
                            <button class="chat-button" data-id="<?= $enquiry['id'] ?>">Chat</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div id="chatModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="chatContainer" class="chat-container"></div>
            <form id="chatForm">
                <input type="text" id="chatMessage" name="chatMessage" placeholder="Type a message" required>
                <button type="submit">Send</button>
            </form>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#enquiriesTable').DataTable();

            var currentEnquiryId;

            $('.chat-button').click(function () {
                currentEnquiryId = $(this).data('id');
                $('#chatModal').css('display', 'block');
                loadChatHistory(currentEnquiryId);
            });

            $('.close').click(function () {
                $('#chatModal').css('display', 'none');
            });

            $(window).click(function (event) {
                if (event.target == $('#chatModal')[0]) {
                    $('#chatModal').css('display', 'none');
                }
            });

            $('#chatForm').submit(function (event) {
                event.preventDefault();
                
                var message = $('#chatMessage').val();

                $.ajax({
                    url: 'Submit-Chat.php',
                    type: 'post',
                    data: {
                        enquiry_id: currentEnquiryId,
                        sender: 'user',
                        message: message,
                    },
                    success: function (response) {
                        $('#chatMessage').val('');
                        loadChatHistory(currentEnquiryId);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error occurred while sending message.');
                    }
                });
            });

            function loadChatHistory(enquiryId) {
                $.ajax({
                    url: 'Load-Chat-History.php',
                    type: 'post',
                    data: { enquiry_id: enquiryId },
                    success: function (response) {
                        var res = JSON.parse(response);
                        var chatContainer = $('#chatContainer');
                        chatContainer.empty();
                        res.forEach(function (chat) {
                            var messageClass = chat.sender === 'admin' ? 'admin' : 'user';
                            chatContainer.append(
                                '<div class="chat-message ' + messageClass + '"><strong>' + chat.sender + ':</strong> ' + chat.message + ' <em>' + chat.timestamp + '</em></div>'
                            );
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error occurred while loading chat history.');
                    }
                });
            }
        });
    </script>
</body>
</html>
