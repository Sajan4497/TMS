<?php
session_start();
include('config.php');

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    // Update database query
    $query = "UPDATE queries SET notification = 0 WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Notification updated successfully.";
    } else {
        echo "Error updating notification: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
