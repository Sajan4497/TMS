<?php

include('config.php');
//include('admin-sidebar.php');

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_POST['id'];
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Address = $_POST['address'];
    $Phonenumber = $_POST['phone'];
    $Reason=$_POST['reason'];


    
 $sql = "UPDATE form SET Name='$Name', Email='$Email', Address='$Address', PhoneNumber='$Phonenumber',Reason='$Reason' WHERE id='$id'";
       
       
 
       
       $result = mysqli_query($conn, $sql);

        var_dump($result);
        
        if($result) {
            header("Location: edit_contact.php");
        } else {
            echo "Error updating contact: " . mysqli_error($conn);
        }
}




?>
