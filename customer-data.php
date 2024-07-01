<?php
include('config.php');


if($_SERVER['REQUEST_METHOD'] == "POST"){
   
    $query = "SELECT* notes FROM queries WHERE key = 'Customer'";
    $result = mysqli_query($conn, $query);

    // Check karo k koi data hai ya nahi
    if(mysqli_num_rows($result) > 0){
     
        while($row = mysqli_fetch_assoc($result)){
        
            $id = $row['id'];
            $notes = json_decode($row['note'], true);
            
        }
    } else {
       
        echo "No customer inquiries found";
    }
}
?>
