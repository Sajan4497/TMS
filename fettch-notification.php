<?php
include('config.php');


$query = "SELECT id, user_id, package_id, notes FROM queries WHERE notification = '1'";
$result = mysqli_query($conn, $query);

$notifications = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $notifications[] = [
            'id' => $row['id'],
            'user_id' => $row['user_id'],
            'package_id' => $row['package_id'],
            'notes' => json_decode($row['notes'], true),
        ];
    }

    echo json_encode([
        'status' => 'success',
        'notifications' => $notifications
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to fetch notifications.'
    ]);
}
?>
