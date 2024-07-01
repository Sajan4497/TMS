<?php
session_start();
include('config.php');

$blank_array = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving email and password from POST data
    $email = $_POST['email'];
    $password = md5($_POST['password']); 

    // Validating email and password
    if ($email == '') {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Please enter your email";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Invalid email format";
    } else if ($password == '') {
        $blank_array['status'] = "error";
        $blank_array['msg'] = "Please enter your password";
    } else {
        // Checking credentials in the database
        $query = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
        $res = mysqli_query($conn, $query);

        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['id'] = $row['id']; 
            $_SESSION['is_admin'] = $row['is_admin'];

            $blank_array['status'] = "success";
            if ($row['is_admin'] == 1) {
                $blank_array['msg'] = 'Admin Login Successful!';
                $_SESSION['admin_role'] = 'Admin';
            } else {
                $blank_array['msg'] = 'Customer Login Successful!';
                $_SESSION['admin_role'] = 'Customer';
            }
        } else {
            $blank_array['status'] = "error";
            $blank_array['msg'] = "Wrong email or password";
        }
    }
}

// If the user is already logged in, redirect to the appropriate dashboard
if (isset($_SESSION['id'])) {
    if ($_SESSION['is_admin'] == 1) {
        //header("location: admin.dashboard.php");
    } else {
        //header("location: user.dashboard.php");
    }
}

echo json_encode($blank_array);
?>
