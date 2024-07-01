<?php
session_start();
include('config.php');

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve GET data (assuming these are passed via query parameters)
    if (isset($_GET['user_id']) && isset($_GET['package_id'])) {
        $userId = $_GET['user_id'];
        $packageId = $_GET['package_id'];

        // Fetch queries from 'queries' table based on user_id and package_id
        $sql_fetch_queries = "SELECT * FROM queries WHERE user_id = $userId AND package_id = $packageId";
        $result_fetch_queries = $conn->query($sql_fetch_queries);

        if ($result_fetch_queries === false) {
            echo "Error fetching queries: " . $conn->error;
        } elseif ($result_fetch_queries->num_rows > 0) {
            // Display each query
            while ($row = $result_fetch_queries->fetch_assoc()) {
                echo "<h2>Query Details:</h2>";
                echo "<p>User ID: {$row['user_id']}</p>";
                echo "<p>Package ID: {$row['package_id']}</p>";
                echo "<p>Notes:</p>";
                
                // Decode JSON notes array if necessary
                $notes = json_decode($row['notes'], true);
                if (is_array($notes)) {
                    foreach ($notes as $note) {
                        echo "<p>- {$note['note']} ({$note['key']})</p>";
                    }
                }

                // Display form for admin response
                echo "<form method='post' action='handle_admin_response.php'>";
                echo "<input type='hidden' name='id' value='{$row['id']}'>"; 
                echo "<textarea name='admin_response'></textarea><br>";
                echo "<input type='submit' value='Submit Admin Response'>";
                echo "</form>";
            }
        } else {
            echo "No queries found for user_id: $userId and package_id: $packageId";
        }
    } else {
        echo "User ID and/or Package ID not provided.";
    }
}
?>
