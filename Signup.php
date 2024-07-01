<?php
error_reporting(E_ALL ^ E_WARNING);
include('config.php');

$blank_array = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $phonenumber = $_POST['phonenumber'];

    // File upload handling
    if (!isset($_FILES['image']) || empty($_FILES['image']['name'])) {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Image is required";
    } else {
        $filename = $_FILES['image']['name'];
        $fileloc = $_FILES['image']['tmp_name'];
        $filesize = $_FILES['image']['size'];
        $filetype = $_FILES['image']['type'];
        $destination = "upload/" . $filename;

        if (move_uploaded_file($fileloc, $destination)) {
            // Image uploaded successfully
        } else {
            $blank_array['status'] = "error";
            $blank_array['msg'] = "Failed to upload image";
        }
    }

    // Validate other fields
    if ($name == '') {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Please enter your name";
    } elseif ($email == '') {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Please enter your email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Invalid email format";
    } elseif ($password == '') {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Please enter your Password";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $_POST['password'])) {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character";
    } elseif ($phonenumber == '') {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Please enter your Phone number";
    } else {
        // Check if email already exists
        $check_query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check_query);
        if (mysqli_num_rows($result) > 0) {
            $blank_array['status'] = "error";
            $blank_array['msg'] = "Email Already exists";
        } else {
            // Insert user into database
            $query = "INSERT INTO users (name, email, password, phonenumber, image) 
                      VALUES ('$name', '$email', '$password', '$phonenumber', '$destination')";

            if (mysqli_query($conn, $query)) {
                $blank_array['status'] = "success";
                $blank_array['msg'] = "User created successfully";
            } else {
                $blank_array['status'] = "error";
                $blank_array['msg'] = "Error Found";
            }
        }
    }
}

echo json_encode($blank_array);
?>