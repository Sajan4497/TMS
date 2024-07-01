<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    display: flex;
    height: 100vh;
}

.dashboard-container {
    display: flex;
    width: 100%;
}

.sidebar {
    width: 250px;
    background-color: #343a40;
    color: white;
    display: flex;
    flex-direction: column;
  height:100%;
}

.sidebar-header {
    padding: 20px;
    text-align: center;
    background-color: #007bff;
}

.sidebar-menu {
    list-style-type: none;
    padding: 0;
}

.sidebar-menu li {
    padding: 15px 20px;
}

.sidebar-menu li a {
    color: white;
    text-decoration: none;
}

.sidebar-menu li:hover {
    background-color: #007bff;
}

.main-content {
    flex: 1;
    display: flex;
    flex-direction: column;
}

.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}

.topbar h1 {
    margin: 0;
}

.user-info {
    display: flex;
    align-items: center;
}

.user-info p {
    margin: 0 10px 0 0;
}

.content {
    padding: 20px;
    flex: 1;
    background-color: #e9ecef;
}









    </style>
    <div class="dashboard-container">
        <nav class="sidebar">
            <div class="sidebar-header">
                <h2>Menu</h2>
            </div>
            <ul class="sidebar-menu">
                <li><a href="About-us.php">About US</a></li>
                <li><a href="Policy.php">Privacy Policy</a></li>
                <li><a href="Contact.php">Contact US</a></li>
                <li><a href="Logout.php">Logout</a></li>
              
            </ul>
        </nav>
        <div class="main-content">
            <header class="topbar">
                <h1>Tour Management</h1>
                <div class="user-info">
                    <p>Welcome</p>
                    <a href="Logout.php">Logout</a>
                </div>
            </header>
            <div class="content">
              
                   
                
                   


            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
