<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['quantity'])) {
    $id = $_POST['id'];
    $newQuantity = $_POST['quantity'];

   
    $sql = "UPDATE cart SET quantity = $newQuantity WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
      
        $item = $conn->query("SELECT priceinusd FROM cart WHERE id = $id")->fetch_assoc();
        $totalPrice = $item['priceinusd'] * $newQuantity;
        echo $totalPrice;
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request";
}
