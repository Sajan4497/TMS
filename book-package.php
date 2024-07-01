<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
include('config.php');
$blank_array = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
   //echo "<pre>";
    //print_r($_POST);
   // echo "</pre>";
    
if(isset($_POST['id'])) {
    $id = $_POST['id'];

     $query="UPDATE crud SET Bookpackage=1 where id='$id'";
     if (mysqli_query($conn, $query)) {
        $blank_array['status'] = "success";
        $blank_array['msg'] = "booked  successfully";
}
} else {
    $blank_array['status'] = "error";
    $blank_array['msg'] = "Error Found";

}
}   



echo json_encode($blank_array);
?>

