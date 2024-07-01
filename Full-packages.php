<?php
error_reporting(E_ERROR | E_PARSE);

session_start();

include('config.php');
include('extra.php');

if (!isset($_SESSION["id"])) {
    header("Location: Login.php");
    exit();
}

// Fetch data from the 'crud' table
$sql = "SELECT * FROM crud";
$result = $conn->query($sql);

// Check if there are any results
if ($result->num_rows > 0) {
    // Fetch all rows as associative array
    $rows = $result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "Failed to fetch user data.";
    exit();
}

$id = $_SESSION["id"];
//$_SESSION['user_id'] = $_SESSION['email']; 

$status_sql = "SELECT * FROM `transaction` WHERE customerid = '$id' ";
$status_result = $conn->query($status_sql);
$package_status = array();
if ($status_result->num_rows > 0) {
    // Fetch all rows as associative array
    $numrows = $status_result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
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
                            <button type='button' class='book-button' data-id='<?= $row['id'] ?>' data-priceinusd='<?= $row['priceinusd'] ?>' data-nationalparkname='<?= $row['nationalparkname'] ?>' data-packagename='<?= $row['nationalparkname'] ?>' data-packageid='<?= $row['id'] ?>' data-packageprice='<?= $row['priceinusd'] ?>' data-customerid='<?= $_SESSION['id'] ?>' data-image='<?= $row['nationalparkimage'] ?>' data-target='#BookModal'>Book Now</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button><a href="Logout.php">Logout</a></button>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();

        });

        const stripe = Stripe('pk_test_51PLeLNRqM69andAANgXcXOQLKFLsSKOmMmfViVPs7VD0Vnh5TKGR8L3lzxncosoZ6eWcyb848HG9MLLhB4ucsogd00jByUByVO');

        $('.book-button').on('click', function() {
            const id = $(this).data('id');
            const priceinusd = $(this).data('priceinusd');
            const packagename = $(this).data('packagename');
            const packageid = $(this).data('packageid');
            const packageprice = $(this).data('packageprice');
            const customerid = $(this).data('customerid');
            //const image = $(this).data('image');

            const formData = {
                id: id,
                priceinusd: priceinusd,
                packagename: packagename,
                packageid: packageid,
                packageprice: packageprice,
                customerid: customerid
                //image:image
            };


            $.ajax({
                type: 'POST',
                url: 'Create-Checkout-Session.php',
                data: formData,
                  success: function(response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        var result = JSON.parse(response);
                        console.log(result);
                        //stripe.redirectToCheckout({
                        //sessionId: response.id
                        //  });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', error);
                    alert('Failed to create checkout session.');
                }

            });
        });
    </script>
</body>

</html>