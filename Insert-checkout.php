
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Processing Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
    <form id="checkoutForm" action="process-checkout.php" method="post">
        <?php
        error_reporting(E_ERROR | E_PARSE);
        include('config.php');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
         
            $Firstname = $_POST["Firstname"];

            $Lastname=$_POST["Lastname"];
            $Country=$_POST["Country"];
            $Address=$_POST["Address"];
            $City=$_POST["City"];
            $State=$_POST["State"];
            $Zipcode=$_POST["Zipcode"];
            $Email=$_POST["Email"];
            $Phone=$_POST["Phone"];
            
            $sql = "INSERT INTO checkout (Firstname, Lastname, Country, Address, City, State, Zipcode, Email, Phone) VALUES ('$Firstname', '$Lastname', '$Country', '$Address', '$City', '$State', '$Zipcode','$Email','$Phone')";
            if (mysqli_query($conn, $sql)) {
                //echo "Data is  inserted successfully.";
                header("location:payment-method.php");
            } else {
                header("Location:Checkout-Page.php");
                exit();
            }
            }
    
     ?>
            
            
 </div>
</body>
</html>
