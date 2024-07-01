<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Notes</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="notificationTable">

            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            function fetchNotifications(userId, packageId) {
                $.ajax({
                    url: 'newfetch.php',
                    type: 'GET',
                    data: {
                        user_id: userId,
                        package_id: packageId
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('#notificationTable').empty();
                        if (response.length === 0) {
                            $('#notificationTable').append('<tr><td colspan="3">No notifications found</td></tr>');
                        } else {
                            $.each(response, function(index, item) {
                                var notesHtml = '<ul>';
                                notesHtml += '<li>' + (item.lastAdminMessage.note || 'No notes') + '</li>';
                                notesHtml += '</ul>';

                                var row = '<tr>' +
                                    '<td>' + item.id + '</td>' +
                                    '<td>' + notesHtml + '</td>' +
                                    '<td><button class="btn btn-primary view-chatbot" data-id="' + item.id + '">View Chatbot</button></td>' +
                                    '</tr>';

                                $('#notificationTable').append(row);
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching notifications:', error);
                    }
                });
            }

            function markAsRead(id) {
                return $.ajax({
                    url: 'mark-read.php',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            fetchNotifications();
                        } else {
                            console.error('Error marking as read:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error marking as read:', error);
                    }
                });
            }

            // Initial fetch of notifications
            fetchNotifications();

            // Event handler for clicking "View Chatbot" button
            $(document).on('click', '.view-chatbot', function() {
                var id = $(this).data('id');
                markAsRead(id).done(function() {

                    window.location.href = 'chatbot.php?id=' + id;
                });
            });

        });
    </script>