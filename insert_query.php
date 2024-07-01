<?php
session_start();
include('config.php');

if (!isset($_SESSION["id"])) {
    exit("Unauthorized access");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $package_id = $_POST['package_id'];
    $nationalparkname = $_POST['nationalparkname'];
    $nationalparklocation = $_POST['nationalparklocation'];
    $nationalparkdetails = $_POST['nationalparkdetails'];
    $nationalparktype = $_POST['nationalparktype'];
    $nationalparkfeatures = $_POST['nationalparkfeatures'];
    $priceinusd = $_POST['priceinusd'];
    $nationalparkimage = $_POST['nationalparkimage'];

    // Insert into queries table
    $insert_sql = "INSERT INTO `queries` (user_id, package_id, nationalparkname, nationalparklocation, nationalparkdetails, nationalparktype, nationalparkfeatures, priceinusd, nationalparkimage) 
                   VALUES ('$user_id', '$package_id', '$nationalparkname', '$nationalparklocation', '$nationalparkdetails', '$nationalparktype', '$nationalparkfeatures', '$priceinusd', '$nationalparkimage')";

    if ($conn->query($insert_sql) === TRUE) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request";
}
?>
