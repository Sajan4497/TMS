<?php
session_start();
include('config.php');

$blank_array = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['nationalparkname']) && isset($_POST['nationalparkimage'])) {
        $nationalparkname = $_POST['nationalparkname'];
        $nationalparklocation = $_POST["nationalparklocation"];
        $nationalparkdetails = $_POST["nationalparkdetails"];
        $nationalparktype = $_POST["nationalparktype"];
        $priceinusd = $_POST["priceinusd"];
        $nationalparkfeatures = $_POST["nationalparkfeatures"];
        $nationalparkimage = $_POST["nationalparkimage"]; 

        $query = "INSERT INTO cart (nationalparkname, nationalparklocation, nationalparkdetails, nationalparktype, priceinusd, nationalparkfeatures, nationalparkimage) 
            VALUES ('$nationalparkname', '$nationalparklocation', '$nationalparkdetails', '$nationalparktype', '$priceinusd', '$nationalparkfeatures', '$nationalparkimage')";

        if ($conn->query($query) === TRUE) {
            $blank_array['status'] = "success";
            $blank_array['message'] = "Item added to cart successfully";
            $blank_array['url'] = "cart-products.php";
        } else {
            $blank_array['status'] = "error";
            $blank_array['message'] = "Error adding item to cart: " . $conn->error;
        }
    } else {
        $blank_array['status'] = "error";
        $blank_array['message'] = "ID, National Park Name, and Image are required";
    }
} else {
    $blank_array['status'] = "error";
    $blank_array['message'] = "Invalid request method";
}

echo json_encode($blank_array);
?>
