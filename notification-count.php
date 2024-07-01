<?php
include('config.php');

if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    $PackageId=$_POST['Package_id'];

// Fetch notification count for the customer
$query = "SELECT COUNT(*) AS notification FROM `queries` WHERE id = '$id' AND `notification` = '1'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $notification_count = $row['notification_count'];
} else {
    $notification_count = 0; 
}
}
echo "Notification Count: " . $notification_count;
?>
