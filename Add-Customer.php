<?php
error_reporting(E_ERROR | E_PARSE);
include('config.php');

$blank_array = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $phonenumber = $_POST['phonenumber'];

    // Check if image is provided
    if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
        $filename = $_FILES['image']['name'];
        $fileloc = $_FILES['image']['tmp_name'];
        $destination = "upload/" . $filename;

        if (move_uploaded_file($fileloc, $destination)) {
            $mysql = "INSERT INTO users (name, email, password, phonenumber, image) VALUES ('$name', '$email', '$password', '$phonenumber', '$destination')";
        } else {
            $blank_array['status'] = false;
            $blank_array['msg'] = "Error uploading image";
            echo json_encode($blank_array);
            exit();
        }
    } else {
        $mysql = "INSERT INTO users (name, email, password, phonenumber) VALUES ('$name', '$email', '$password', '$phonenumber')";
    }

    if (mysqli_query($conn, $mysql)) {
        if (mysqli_affected_rows($conn) > 0) {
            $blank_array['status'] = true;
            $blank_array['msg'] = "Customer record added successfully";
        } else {
            $blank_array['status'] = false;
            $blank_array['msg'] = "Customer record could not be added";
        }
    } else {
        $blank_array['status'] = false;
        $blank_array['msg'] = "Error adding user record: " . mysqli_error($conn);
    }
}

echo json_encode($blank_array);
?>
