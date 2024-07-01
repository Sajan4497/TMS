<?php
error_reporting(E_ERROR | E_PARSE);

include('config.php');
//session_start();
//if ($_SESSION['admin_role'] !== 'ADMIN') {

   // header("Location: Customer-Dashboard.php");
   //include('extra.php');
   // exit();
//}
include('extra.php');
//include('admin-sidebar.php');
//include('admin-header.php');



$id = $_GET['id'];
$sql = "SELECT * FROM about where id=1";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $content = $row['content'];

 
    echo "<p>$content</p>";
} else {
    echo "About section not found.";
}
?>

<style>
    .container {
    padding-left: 216px;
}
    </style>








