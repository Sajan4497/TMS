<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <form action="submit_contact.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>

        <label for="phonenumber">Phone Number:</label><br>
        <input type="text" id="phone_number" name="phone_number"><br>
        
        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address"><br>
        
        <label for="reason">REASON:</label><br>
        <input type="text" id="reason" name="reason"><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
