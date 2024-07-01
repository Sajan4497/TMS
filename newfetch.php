<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['user_id']) && isset($_GET['package_id'])) {
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $package_id = mysqli_real_escape_string($conn, $_GET['package_id']);

        $query = "SELECT id, notes FROM queries WHERE notification = '1' AND user_id = '$user_id' AND package_id = '$package_id'";
        $result = mysqli_query($conn, $query);

        $response = [];

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $notes = json_decode($row['notes'], true);

                if (is_array($notes)) {
                    $lastAdminMessage = null;

                    foreach ($notes as $note) {
                        if (isset($note['key']) && $note['key'] === 'admin') {
                            $lastAdminMessage = [
                                'key' => $note['key'],
                                'note' => $note['note']
                            ];
                        }
                    }

                    if ($lastAdminMessage !== null) {
                        $response[] = [
                            'id' => $row['id'],
                            'lastAdminMessage' => $lastAdminMessage
                        ];
                    }
                } else {
                    error_log("Error decoding notes for query ID: " . $row['id']);
                }
            }
        }

        echo json_encode($response);
    } else {
        echo json_encode([]);
    }
} 
?>