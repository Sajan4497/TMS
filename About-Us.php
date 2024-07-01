<?php
include('config.php');
include('admin-sidebar.php');
include('admin-header.php');

$id = $_GET['id']; 
$sql = "SELECT * FROM about where id=1";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $content = $row['content'];

  
    echo "<div class='container'>";
    echo "<p>$content</p>";
    
    echo "<button class='edit-button'><a href='edit.php'>Edit</a></button>";
    echo "</div>";

} else {
    echo "About section not found.";
}
?>

<style>
    .container {
        padding-left: 216px; 
    }

    .edit-button {
        display: inline-block;
        background-color: #4CAF50; 
        color: #ffffff; 
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-top: 10px;
    }

    .edit-button:hover {
        background-color: #45a049; 
    }
</style>
