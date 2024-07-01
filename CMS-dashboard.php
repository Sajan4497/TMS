<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us Form</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    margin-bottom: 20px;
}

form input,
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #0056b3;
}

</style>
</head>
</body>
</html>



<?php

include('config.php');
include('sidebar.php');
include('Header.php');


//error_reporting(E_ERROR | E_PARSE);


//if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    //$Name = $_POST['Name'];
    //$Email = $_POST['Email'];
    //$Phonenumber = $_POST['Phonenumber'];
   // $Reason = $_POST['Reason'];

 
    //$sql = "INSERT INTO form (Name, Email, Phonenumber, Reason) VALUES ('$Name', '$Email', '$Phonenumber', '$Reason')"; 

    // Execute SQL statement
    //if ($conn->query($sql) === TRUE) {
        //echo "Thank you for contacting us!";
    //} else {
     
       // echo "Error: " . $sql . "<br>" . $conn->error;
   // }
//}
?>











