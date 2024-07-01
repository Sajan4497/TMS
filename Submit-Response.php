<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['id']) && isset($_POST['user_id']) && isset($_POST['package_id']) && isset($_POST['note'])) {
        $id = $_POST['id'];
        $userId = $_POST['user_id'];
        $packageId = $_POST['package_id'];
        $response = $_POST['note'];

        //$userId = $_SESSION['id'];
        $query = "SELECT notes FROM queries WHERE id=? AND user_id=? AND package_id=?";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_bind_param($stmt, "iii", $id, $userId, $packageId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $notes);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            if ($notes !== null) {
                $existing_notes = json_decode($notes, true);

                // Add the new response note
                $existing_notes[] = array( 'key' => 'Admin','note' => $response, 'time' => date('d-m-Y:H:i:s'));

                // Convert notes back to JSON
                $data = json_encode($existing_notes);

                // Update the notes in the database
                $update_query = "UPDATE queries SET notes=? WHERE id=? AND user_id=? AND package_id=?";
                if ($update_stmt = mysqli_prepare($conn, $update_query)) {
                    mysqli_stmt_bind_param($update_stmt, "siii", $data, $id, $userId, $packageId);
                    $update_result = mysqli_stmt_execute($update_stmt);

                    if ($update_result) {
                        echo json_encode(array("status" => "success", "message" => "Response sent successfully."));
                    } else {
                        echo json_encode(array("status" => "error", "message" => "Failed to update the response."));
                    }

                    mysqli_stmt_close($update_stmt);
                } else {
                    echo json_encode(array("status" => "error", "message" => "Failed to prepare update query."));
                }
            } else {
                echo json_encode(array("status" => "error", "message" => "Enquiry not found."));
            }
        } else {
            echo json_encode(array("status" => "error", "message" => "Failed to prepare select query."));
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Required fields are missing."));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method."));
}
?>