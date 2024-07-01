<?php

include('config.php');


$name = $_POST['Name'];
$email = $_POST['Email'];
$address=$_POST['Address'];
$phonenumber = $_POST['Phonenumber'];
$reason = $_POST['Reason'];


$sql = "INSERT INTO form (Name, Email, Phonenumber, Address,Reason,) VALUES ('$name', '$email', '$phonenumber','$reason')";
$result = mysqli_query($conn, $sql);

if($result) {
    echo "Contact information submitted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


?>
