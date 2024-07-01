<?php
//error_reporting(E_ALL ^ E_WARNING);
include('config.php');
if(isset($_GET['id'])) {
   $id = $_GET['id'];

$query = "SELECT * FROM crud WHERE id='$id'";
$res = mysqli_query($conn, $query);
if($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($res );
} else {
    echo "Failed to fetch user data.";
    exit();
}


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="content">
      
        <table border="1">
            <tr>
                <th>Id</th>
                <th>NationalParkName</th>
                <th>NationalParkLocation</th>
                <th>NationalParkDetails</th>
                <th>NationalParkType</th>
                <th>PriceInUsd</th>
                <th>NationalParkFeatures</th>
                <th>NationalParkImage</th>
               
            </tr>
            <tr>
                <td><?php echo $row ['id']; ?></td>
                <td><?php echo $row ['nationalparkname']; ?></td>
                <td><?php echo $row ['nationalparklocation']; ?></td>
                <td><?php echo $row ['nationalparkdetails']; ?></td>
                <td><?php echo $row ['nationalparktype']; ?></td>
                <td><?php echo $row ['priceinusd']; ?></td>
                <td><?php echo $row ['nationalparkfeatures']; ?></td>
                <td><img src="<?php echo $row ['nationalparkimage']; ?>" width="100px" height="100px" alt="National Park Image"></td>
                
            </tr>
        </table>
    </div>
</body>
</html>