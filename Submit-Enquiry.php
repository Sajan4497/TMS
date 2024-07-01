<?php
session_start();
include('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $userId = mysqli_real_escape_string($conn, $_POST['user_id']);
    $packageId = mysqli_real_escape_string($conn, $_POST['package_id']);
    $note = mysqli_real_escape_string($conn, $_POST['note']);

    $noteArray = array(
        'note' => $note,
        'key' => 'Customer',
        // 'user_id' => $userId,
        'package_id' => $packageId,
        'time' => date('d-m-Y h:i:s')
    );

    $noteJSON = json_encode($noteArray);
    $userId = $_SESSION['id'];
    $sql_check = "SELECT * FROM queries WHERE user_id = $userId AND package_id = $packageId";
    $res_check = $conn->query($sql_check);

    if ($res_check && $res_check->num_rows > 0) {
        $row = $res_check->fetch_assoc();
        $existing_notes = json_decode($row['notes'], true);

        if (is_array($existing_notes)) {
            $existing_notes[] = $noteArray;
            $data = json_encode($existing_notes);

            $update_query = "UPDATE queries SET notes = '$data' WHERE user_id = $userId AND package_id = $packageId";
            $update_result = mysqli_query($conn, $update_query);

            if ($update_result) {
                echo json_encode(['status' => 'success', 'message' => 'Notes updated successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error updating notes: ' . mysqli_error($conn)]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Existing notes format is invalid.']);
        }
    } else {
        $sql_select_package = "SELECT * FROM crud WHERE id = $packageId";
        $result_package = $conn->query($sql_select_package);

        if ($result_package->num_rows > 0) {
            $package = $result_package->fetch_assoc();

            $nationalParkName = mysqli_real_escape_string($conn, $package['nationalparkname']);
            $nationalParkLocation = mysqli_real_escape_string($conn, $package['nationalparklocation']);
            $nationalParkDetails = mysqli_real_escape_string($conn, $package['nationalparkdetails']);
            $nationalParkType = mysqli_real_escape_string($conn, $package['nationalparktype']);
            $priceInUSD = $package['priceinusd'];
            $nationalParkFeatures = mysqli_real_escape_string($conn, $package['nationalparkfeatures']);
            $nationalParkImage = mysqli_real_escape_string($conn, $package['nationalparkimage']);

            $sql_insert = "INSERT INTO queries (user_id, package_id, notes, nationalparkname, nationalparklocation, nationalparkdetails, nationalparktype, priceinusd, nationalparkfeatures, nationalparkimage) 
                           VALUES ($userId, $packageId, '$noteJSON', '$nationalParkName', '$nationalParkLocation', '$nationalParkDetails', '$nationalParkType', $priceInUSD, '$nationalParkFeatures', '$nationalParkImage')";

            if ($conn->query($sql_insert) === TRUE) {
                echo json_encode(['status' => 'success', 'message' => 'New record inserted successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error inserting record: ' . $conn->error]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Package details not found.']);
        }
    }
}
?>