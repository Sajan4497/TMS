<!-- customer_dashboard.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 5px;
            font-size: 12px;
        }

        .fas.fa-bell {
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1>Welcome <?php echo $userData['name']; ?>!</h1>
    <!-- Notification bell icon -->
    <a href="#" id="notificationIcon">
        <i class="fas fa-bell"></i>
        <span id="notificationBadge" class="badge">0</span>
    </a>
    
    <!-- Table and modals as per your existing code -->
    <table class="table">
        <!-- Table content here -->
    </table>

    <!-- Modals for update and view details -->
    <!-- Ensure these modals are correctly linked to your existing JavaScript -->
    <?php include('modals.php'); ?>
</div>

<!-- JavaScript libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Your JavaScript for handling notifications and other functionalities -->
<script src="customer_dashboard.js"></script>

<script>
$(document).ready(function() {
    // Function to update notification count
    function updateNotificationCount() {
        $.ajax({
            url: 'fetch_notifications.php', 
            type: 'GET',
            success: function(response) {
                $('#notificationBadge').text(response); 
            },
            error: function(xhr, status, error) {
                console.error('Error fetching notification count:', error);
            }
        });
    }

    // Call updateNotificationCount initially
    updateNotificationCount();


});
</script>

</body>
</html>
