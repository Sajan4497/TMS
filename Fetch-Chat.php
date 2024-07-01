<?php
// Include your database connection file (e.g., config.php)
include('config.php');

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure that enquiryId is set in the POST data
    if (isset($_POST['enquiryId'])) {
        $enquiryId = mysqli_real_escape_string($conn, $_POST['enquiryId']);

        // Fetch existing chats for the enquiry from the database
        $query = "SELECT notes FROM queries WHERE enquiry_id = '$enquiryId'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $chats = json_decode($row['notes'], true);

       
            if (!is_array($chats)) {
                $chats = [];
            }

            // Return JSON response with chats
            header('Content-Type: application/json');
            echo json_encode($notes);
        } else {
            echo "Query failed";
        }
    } else {
        echo "Invalid enquiry ID";
    }
} else {
    echo "Method not allowed";
}
?>
