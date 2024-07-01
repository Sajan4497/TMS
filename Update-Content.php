<?php
error_reporting(E_ERROR | E_PARSE);
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $sql = "UPDATE `about` SET content='$content'";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        header("Location:About-Us.php");
        exit(); 
    } else {
      
        echo "Error updating content: " . mysqli_error($conn);
    }
}
?>
