<?php
error_reporting(E_ALL ^ E_WARNING);
session_start();
include('config.php');
$blank_array = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
if(isset($_POST['packageid'])) { 
    $packageid = $_POST['packageid'];

     $query="UPDATE transaction SET `status`='confirmed' where packageid='$packageid'";
     if (mysqli_query($conn, $query)) {
            $blank_array['status'] = "success";
            $blank_array['msg'] = "Confirmed  successfully";
    }else{
        $blank_array['status'] = "success";
         $blank_array['msg'] = "Data not updated...";
    }
} else {
    $blank_array['status'] = "error";
    $blank_array['msg'] = "Error Found";

}
}   



echo json_encode($blank_array);
?>

