<?php

include('config.php');
//include('admin-sidebar.php');


$id = $_GET['id'];
$sql = "SELECT * FROM form WHERE id=$id";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $Name = $row['Name'];
    $Email = $row['Email'];
    $Phonenumber = $row['Phonenumber'];
    $Address = $row['Address'];
    $Reason = $row['Reason'];
   
} else {
    echo "Contact not found.";
    exit();
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
</head>
<body>
    <h2>Edit Contact</h2>
    <form action="update_contact_submit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $Name; ?>"><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $Email; ?>"><br>
        
        <label for="phonenumber">Phone Number:</label><br>
        <input type="tel" id="phone" name="phone" value="<?php echo $Phonenumber; ?>"><br>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" value="<?php echo $Address; ?>"><br>
        
        <label for="Reason">Reason:</label><br>
        <input type="text" id="reason" name="reason" value="<?php echo $Reason; ?>"><br>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
