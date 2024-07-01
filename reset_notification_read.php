<?php
session_start();
include('config.php');

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "UPDATE queries SET notification = 1 WHERE user_id = $id";
    mysqli_query($conn, $query);
    echo 'success';
} else {
    echo 'error';
}
?>
