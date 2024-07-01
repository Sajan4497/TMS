<?php
error_reporting(E_ERROR | E_PARSE);

include('config.php');
$blank_array = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Delete user record
    $mysql = "DELETE FROM `cart` WHERE id='$id'";

    if (mysqli_query($conn, $mysql)) {
        
        if (mysqli_affected_rows($conn) > 0) {
            $blank_array['status'] = true;
            $blank_array['msg'] = "Customer Record Deleted Successfully";
        } else  {
            $blank_array['status'] = false;
            $blank_array['msg'] = "Customer Record does not exist";
        }
    } else {
        $blank_array['status'] = false;
        $blank_array['msg'] = "Error deleting user record: " . mysqli_error($conn);
    }
}

echo json_encode($blank_array);
?>
