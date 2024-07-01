<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 200px;
            background-color: #333;
            padding-top: 20px;
            color: #fff;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            padding: 10px;
        }

        .sidebar li a {
            color: #fff;
            text-decoration: none;
        }

        .sidebar li a:hover {
            background-color: #555;
        }

        .content {
            margin-left: 100px;
            padding: 20px;
        }

        .user-profile {
            margin-top: 20px;
            padding: 10px;
            border-top: 1px solid #fff;
        }

        .user-profile span {
            display: block;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <ul>
            <li><a href="Admin-dashboard.php">Admin View</a></li>
            <li><a href="All-Customers.php">Customer View</a></li>
            <li><a href="All-Package.php">Packages</a></li>
            <li><a href="admin-data.php">Booked Packages</a></li>
            <li><a href="view-Enquiry.php">All Enquiries</a></li>
            <li><a href="About-Us.php">About US</a></li>
            <li><a href="Policy.php">Privacy Policy</a></li>
            <li><a href="edit_contact.php">Contact US</a></li>

            <li><a href="Logout.php">Logout</a></li>
        </ul>
        <div class="user-profile">
            <span>Welcome <?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : 'Admin'; ?></span>
        </div>
    </div>
</body>

</html>