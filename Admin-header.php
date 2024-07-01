<?php
error_reporting(E_ERROR | E_PARSE);

session_start();
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $Id = $_SESSION['id'];
} else {
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        header {
            background-color: #333;
            color: #fff;
            padding: 20px 20px 20px 216px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-direction: row-reverse;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline-block;
            margin-right: 20px;

        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile a {
            color: #fff;
            text-decoration: none;
            border: 1px solid #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <header>

        <nav>

        </nav>
        <div class="user-profile">
            <span>Welcome to DASHBOARD</span>
        </div>
    </header>
</body>

</html>