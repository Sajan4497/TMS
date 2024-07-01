<?php
error_reporting(E_ERROR | E_PARSE);

session_start();
include('admin-header.php');
include('config.php');

if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit();
}

$sql = "SELECT * FROM queries";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $enquiries = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $enquiries = [];
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Inquiries</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px;
            display: flex;
        }

        .enquiry-buttons {
            flex: 1;
            margin-right: 10px;
        }

        .enquiry-button {
            margin-bottom: 10px;
        }

        .chatbox-container {
            flex: 1;
            margin-right: 10px;
            position: relative;
        }

        .chatbox {
            border: 1px solid #ccc;
            height: 300px;
            width: 300px;
            overflow-y: auto;
            padding: 10px;
            display: none;
            background-color: #fff;
        }

        .chat-message {
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
        }

        .your-message {
            text-align: right;
            background-color: #d4edda;
        }

        .other-message {
            text-align: left;
            background-color: #cce5ff;
        }

        .chatbox-toggle {
            margin-top: 10px;
            position: absolute;
            bottom: 10px;
            right: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="enquiry-buttons">
            <h2>Customer Enquiries</h2>
            <!-- Enquiry Buttons -->
            <?php foreach ($rows as $row): ?>
                <button class="enquiry-button" 
                    data-nationalparkname="<?= $row['nationalparkname'] ?>"
                    data-nationalparklocation="<?= $row['nationalparklocation'] ?>"
                    data-nationalparkdetails="<?= $row['nationalparkdetails'] ?>"
                    data-nationalparktype="<?= $row['nationalparktype'] ?>"
                    data-priceinusd="<?= $row['priceinusd'] ?>"
                    data-nationalparkfeatures="<?= $row['nationalparkfeatures'] ?>">Enquiry
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Chatbox Popup -->
     <!-- Chatbox Popup -->
<!-- Chatbox Popup -->
<div class="chatbox-container" id="chatRoom">
    <div class="chatbox" id="chatbox"></div>
    <div class="chat-input">
        <textarea id="messageInput" rows="3" class="form-control" placeholder="Type your message..."></textarea>
        <button id="sendButton" class="btn btn-primary">Send</button>
    </div>
</div>


<script>
    <!-- Enquiry Modal -->
    $(document).ready(function () {
    // Handle Enquiry Button Click
    $('.enquiry-button').click(function () {
        var nationalparkname = $(this).data('nationalparkname');
        var nationalparklocation = $(this).data('nationalparklocation');
        var nationalparkdetails = $(this).data('nationalparkdetails');
        var nationalparktype = $(this).data('nationalparktype');
        var priceinusd = $(this).data('priceinusd');
        var nationalparkfeatures = $(this).data('nationalparkfeatures');

        // Format Inquiry Message
        var message = `
            <div class="chat-message your-message">
                <strong>National Park Name:</strong> ${nationalparkname}<br>
                <strong>Location:</strong> ${nationalparklocation}<br>
                <strong>Details:</strong> ${nationalparkdetails}<br>
                <strong>Type:</strong> ${nationalparktype}<br>
                <strong>Price (USD):</strong> ${priceinusd}<br>
                <strong>Features:</strong> ${nationalparkfeatures}<br>
            </div>
        `;

        // Clear previous messages and append new message
        $('#chatbox').empty().append(message);

        // Show Chatbox
        $('#chatRoom').show();

        // Show Enquiry Modal
        $('#myModal').show();
    });

    // Send Button Click Handler
    $('#sendButton').click(function () {
        var message = $('#messageInput').val().trim();
        if (message !== '') {
            // Append the message to the chatbox
            $('#chatbox').append('<div class="chat-message your-message">' + message + '</div>');

            // Clear the input field
            $('#messageInput').val('');

            // Scroll to the bottom of the chatbox
            $('#chatbox').scrollTop($('#chatbox')[0].scrollHeight);
        }
    });

    // Close Modal on Close Button Click
    $('.close').click(function () {
        $('#myModal').hide();
        $('#chatRoom').hide();
    });

    // Close Modal on Click Outside of Modal
    $(window).click(function (event) {
        if (event.target == $('#myModal')[0]) {
            $('#myModal').hide();
            $('#chatRoom').hide();
        }
    });
});
</script>
