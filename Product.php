<?php
error_reporting(E_ERROR | E_PARSE);

session_start();

include('config.php');

if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit();
}

// Assuming $conn is your database connection
$sql = "SELECT * FROM crud";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Failed to fetch user data.";
    exit();
}

// Fetch items already in cart for the current session user
$cartItems = []; // Replace this with your logic to fetch items from the cart

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
    .Logout-button {
        padding: 5px 10px;
        background-color: #808080;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        margin-right: 5px;
    }

    .content {
        margin-left: 80px;
        padding: 20px;
    }
</style>

<body>
    <div class="content">
        <table id="myTable" class='content' style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>National Park Name</th>
                    <th>Location</th>
                    <th>Details</th>
                    <th>Type</th>
                    <th>Price (USD)</th>
                    <th>Features</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $row) : ?>
                    <tr id="row_<?= $row['id'] ?>">
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nationalparkname'] ?></td>
                        <td><?= $row['nationalparklocation'] ?></td>
                        <td><?= $row['nationalparkdetails'] ?></td>
                        <td><?= $row['nationalparktype'] ?></td>
                        <td><?= $row['priceinusd'] ?></td>
                        <td><?= $row['nationalparkfeatures'] ?></td>
                        <td><img src="<?= $row['nationalparkimage'] ?>" width="100px" height="100px" alt="Image"></td>
                        <td>
                            <?php
                            foreach ($numrows as   $numrow) {
                                $status = $numrow['status'];
                                $packageid = $numrow['packageid'];

                                if ($packageid == $row['id']) {
                                    echo "<button class='add-to-cart-button' disabled>$status</button>";
                                    break;
                                }
                            }


                            if ($packageid != $row['id']) {

                                echo "<button class='add-to-cart-button' 
                                        data-id='{$row['id']}'
                                        data-nationalparkname='{$row['nationalparkname']}'
                                        data-nationalparklocation='{$row['nationalparklocation']}'
                                        data-nationalparkdetails='{$row['nationalparkdetails']}'
                                        data-nationalparktype='{$row['nationalparktype']}'
                                        data-priceinusd='{$row['priceinusd']}'
                                        data-nationalparkfeatures='{$row['nationalparkfeatures']}'
                                        data-nationalparkimage='{$row['nationalparkimage']}'>Add to Cart</button>";
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button><a href="Logout.php">Logout</a></button>
        <button><a href="cart-products.php">View Cart</a></button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

            $('.add-to-cart-button').click(function() {
                var button = $(this);
                button.text('Pending...').prop('disabled', true);

                var id = button.data('id');
                var nationalparkname = button.data('nationalparkname');
                var nationalparklocation = button.data('nationalparklocation');
                var nationalparkdetails = button.data('nationalparkdetails');
                var nationalparktype = button.data('nationalparktype');
                var priceinusd = button.data('priceinusd');
                var nationalparkfeatures = button.data('nationalparkfeatures');
                var nationalparkimage = button.data('nationalparkimage');

                var formData = new FormData();
                formData.append('id', id);
                formData.append('nationalparkname', nationalparkname);
                formData.append('nationalparklocation', nationalparklocation);
                formData.append('nationalparkdetails', nationalparkdetails);
                formData.append('nationalparktype', nationalparktype);
                formData.append('priceinusd', priceinusd);
                formData.append('nationalparkfeatures', nationalparkfeatures);
                formData.append('nationalparkimage', nationalparkimage);

                $.ajax({
                    url: 'Cart.php',
                    type: 'post',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        var jsonData = JSON.parse(response);
                        if (jsonData.status === "success") {
                            button.text('Added to Cart').prop('disabled', true);
                            window.location.href = 'cart-products.php';
                        } else {
                            alert('Failed to add product to cart: ' + jsonData.message);
                            button.text('Add to Cart').prop('disabled', false);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('Error occurred while adding product to cart.');
                        button.text('Add to Cart').prop('disabled', false);
                    },
                });
            });
        });
    </script>
</body>

</html>