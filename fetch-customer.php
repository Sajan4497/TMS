

<?php
include('config.php');

// Sample query to fetch notification count (adjust as per your actual database structure)
$query = "SELECT COUNT(*) AS notification FROM queries WHERE notification = '1'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row['notification']; 
} else {
    echo '0'; // No notifications found
}
?>
