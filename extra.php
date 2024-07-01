<?php

error_reporting(E_ERROR | E_PARSE);


session_start();
//if (isset($_SESSION['admin_role'] == 'customer')) {
    //if($_SESSION['admin_role'] =='customer'){

        //include('extra.php');
   // } else {
      // include('admin-sidebar.php');
  // }

    //if ($_SESSION['admin_role'] !== 'Admin') {

       // header("Location: Customer-Dashboard.php");
       // exit();
   // }

//include('Header.php');
//include('Admin-sidebar.php');
//include('extra.php');

// Redirect to login page if user is not logged in
if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit();
}

// Get user ID from session
$_SESSION['user_id'] = $row['id'];

// Fetch data from database
$sql = "SELECT * FROM crud";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Fetch all rows as associative array
    $rows = $result->fetch_all(MYSQLI_ASSOC);
}
    else {
        echo "Failed to fetch user data.";
        exit();
    }
?>
<!DOCTYPE HTML>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
       
        .sidebar {
            height: 100%;
            width: 100px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 60px; /* Adjust this according to your header height */
            padding-left: 10px;
            color: #fff;
        }

        .sidebar a {
            padding: 10px 0;
            display: block;
            color: #fff;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            margin-left: 100px; 
            margin-right:40px;
            padding: 20px;
        }


        .update-button {
        padding: 5px 10px;
        background-color: #dc3545;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }
    .view-button {
        padding: 5px 10px;
        background-color: #808080;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }
    .delete-button {
        padding: 5px 10px;
        background-color: #dc3545;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }
    .add-Package-button {
        padding: 5px 10px;
        background-color: #808080;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }
    .Logout-button{
        padding: 5px 10px;
        background-color: #808080;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }
    .Book-button{
        padding: 5px 10px;
        background-color: #808080;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }
    
    
    </style>
</head>
<body>

    <?php include('Header.php'); ?>
    
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="Customer-Dashboard.php">Customer View</a>
        <a href="Full-packages.php">All Packages</a>
        <a href="Confirmed-packages.php">Booked Packages</a>
        <a href="product.php">Cart Packages</a>
        <a href="Package-Enquiry.php">Packages Enquiries</a>
        <a href="aboutus.php">About US</a></li>
        <a href="Privacy.php">Privacy Policy</a></li>
         <a href="contactus.php">Contact US</a></li>
        <a href="Logout.php">Logout</a>
      
    </div>
    
  <!-- Main Content -->
    
    <!-- Footer -->
    <?php include('Footer.php'); ?>

    <!-- Add your script links here -->

</body>
</html>
