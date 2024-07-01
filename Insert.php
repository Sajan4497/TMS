<?php
include('config.php');
include('Admin-Header.php');
include('Admin-sidebar.php');
include('extra.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $conn->real_escape_string($_POST['Name']);
    $email = $conn->real_escape_string($_POST['Email']);
    $phone = $conn->real_escape_string($_POST['Phonenumber']);
    $reason = $conn->real_escape_string($_POST['Reason']);


    $sql = "INSERT INTO form (Name, Email, Phonenumber, Reason)
            VALUES ('$name', '$email', '$phone', '$reason')";

    if ($conn->query($sql) === TRUE) {
        echo "Thanks for contacting us";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



?>
