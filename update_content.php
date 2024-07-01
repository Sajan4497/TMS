<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $sql = "UPDATE `policy` SET content='$content'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header("Location: Policy.php");
        exit(); 
    } else {
      
        echo "Error updating content: " . mysqli_error($conn);
    }
}
?>
