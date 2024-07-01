<?php
error_reporting(E_ERROR | E_PARSE);
include('config.php');

$blank_array = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
   $phonenumber = $_POST['phonenumber'];

    // Check if image is provided
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $filename = $_FILES['image']['name'];
        $fileloc = $_FILES['image']['tmp_name'];
        $filesize = $_FILES['image']['size'];
        $filetype = $_FILES['image']['type'];
        $destination = "upload/".$filename;

        if (move_uploaded_file($fileloc, $destination)) {
            
            $mysql = "UPDATE users SET name='$name', phonenumber='$phonenumber', image='$destination' WHERE id=$id";
        } else {
            $blank_array['status'] = false;
            $blank_array['msg'] = "Error uploading image";
        }
    } else {
       
        $mysql = "UPDATE users SET name='$name', phonenumber='$phonenumber' WHERE id=$id";
    }

   
    if (isset($mysql)) {
        if (mysqli_query($conn, $mysql)) {
            if (mysqli_affected_rows($conn) > 0) {
                $blank_array['status'] = true;
                $blank_array['msg'] = "Customer Record updated Successfully";
            } else {
                $blank_array['status'] = false;
                $blank_array['msg'] = "Customer Record does not exist";
            }
        } else {
            $blank_array['status'] = false;
            $blank_array['msg'] = "Error updating user record: " . mysqli_error($conn);
        }
    }
}

echo json_encode($blank_array);
?>
