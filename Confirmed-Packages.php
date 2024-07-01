<?php
error_reporting(E_ERROR | E_PARSE);

session_start();

include('config.php');
include('extra.php');


if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit();
}


$id = $_SESSION["id"];
$status_sql = "SELECT * FROM `transaction` WHERE status='confirmed'";
$status_result = $conn->query($status_sql);

$confirmed_packages = array(); 

if ($status_result && $status_result->num_rows > 0) {
    $confirmed_packages = $status_result->fetch_all(MYSQLI_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Confirmed Packages</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

        <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: right;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2><center>Confirmed Packages</h2></center>

<?php if (!empty($confirmed_packages)): ?>
    <table>
    <div class="content">
        <table id="myTable" class='content' style="width:100%">
           
        <thead>
            <tr>
                <th>ID</th>
                <th>Package ID</th>
                <th>Package Name</th>
                <th>Package Price</th>
                <th>Customer Id</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($confirmed_packages as $package): ?>
                <tr>
                    <td><?php echo isset($package['id']) ? $package['id'] : ''; ?></td>
                    <td><?php echo isset($package['packageid']) ? $package['packageid'] : ''; ?></td>
                    <td><?php echo isset($package['packagename']) ? $package['packagename'] : ''; ?></td>
                    <td><?php echo isset($package['packageprice']) ? $package['packageprice'] : ''; ?></td>
                    <td><?php echo isset($package['customerid']) ? $package['customerid'] : ''; ?></td>
                    <td><?php echo isset($package['status']) ? $package['status'] : ''; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No confirmed packages found.</p>
<?php endif; ?>

</body>
</html>


   
     
    
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

   <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
            
    </script>
